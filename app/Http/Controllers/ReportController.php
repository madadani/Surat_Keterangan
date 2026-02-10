<?php

namespace App\Http\Controllers;

use App\Models\SuratKeterangan;
use App\Models\Pendaftar;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $prices = Price::where('test_name', '!=', 'MCU')->get();

        $query = SuratKeterangan::select('tipe_berkas', DB::raw('count(*) as total'));

        if ($startDate && $endDate) {
            $query->whereBetween('tanggal_cetak', [$startDate, $endDate]);
        }

        $stats = $query->groupBy('tipe_berkas')
            ->get()
            ->pluck('total', 'tipe_berkas');

        return view('admin.reports.index', compact('prices', 'stats', 'startDate', 'endDate'));
    }

    public function detail($type)
    {
        $type = str_replace('-', ' ', $type);
        return view('admin.reports.detail', compact('type'));
    }

    public function print(Request $request, $type)
    {
        $type = str_replace('-', ' ', $type);
        $search = $request->search;
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $query = SuratKeterangan::with('pendaftar', 'dokter')->latest();

        if ($type == 'All') {
            // No specific type filter
        } elseif ($type == 'Spesialis') {
            $prices = Price::pluck('test_name')->toArray();
            $query->whereNotIn('tipe_berkas', $prices);
        } else {
            $query->where('tipe_berkas', $type);
        }

        if ($startDate && $endDate) {
            $query->whereBetween('tanggal_cetak', [$startDate, $endDate]);
        }

        if ($search) {
            $query->whereHas('pendaftar', function ($q) use ($search) {
                $q->where('nama_lengkap', 'LIKE', '%' . $search . '%')
                    ->orWhere('no_registrasi', 'LIKE', '%' . $search . '%');
            });
        }

        $reports = $query->get();

        return view('admin.reports.print', compact('reports', 'type', 'startDate', 'endDate'));
    }

    public function export(Request $request, $type)
    {
        $type = str_replace('-', ' ', $type);
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $query = SuratKeterangan::with('pendaftar', 'dokter')->latest();

        if ($type == 'All') {
            // No type filter
        } elseif ($type == 'Spesialis') {
            $prices = Price::pluck('test_name')->toArray();
            $query->whereNotIn('tipe_berkas', $prices);
        } else {
            $query->where('tipe_berkas', $type);
        }

        if ($startDate && $endDate) {
            $query->whereBetween('tanggal_cetak', [$startDate, $endDate]);
        }

        $reports = $query->get();
        $filename = "Laporan_" . str_replace(' ', '_', $type) . "_" . date('Ymd_His') . ".csv";

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = ['No', 'Tanggal Cetak', 'No Registrasi', 'Nama Lengkap', 'Nomor Surat', 'Tipe Berkas', 'Dokter'];

        $callback = function () use ($reports, $columns) {
            $file = fopen('php://output', 'w');
            // Add UTF-8 BOM for Excel
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

            fputcsv($file, $columns, ';');

            foreach ($reports as $index => $row) {
                fputcsv($file, [
                    $index + 1,
                    \Carbon\Carbon::parse($row->tanggal_cetak)->format('Y-m-d'),
                    $row->pendaftar->no_registrasi,
                    $row->pendaftar->nama_lengkap,
                    $row->nomor_surat,
                    $row->tipe_berkas,
                    $row->dokter->nama_dokter
                ], ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
