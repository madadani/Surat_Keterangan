<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\SuratKeterangan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik Pendaftaran
        $total_pendaftar = Pendaftar::count();
        $pending = Pendaftar::where('status', 'Pending')->count();

        // Statistik Berkas (Berdasarkan Tipe)
        $sehat = SuratKeterangan::where('tipe_berkas', 'Kesehatan')->count();
        $jiwa = SuratKeterangan::where('tipe_berkas', 'Kesehatan Jiwa')->count();
        $narkoba = SuratKeterangan::where('tipe_berkas', 'Bebas Narkoba')->count();
        $spesialis = SuratKeterangan::where(function ($q) {
            $q->where('tipe_berkas', 'LIKE', 'Kesehatan %')
                ->whereNotIn('tipe_berkas', ['Kesehatan', 'Kesehatan Jiwa']);
        })->orWhere('tipe_berkas', 'LIKE', 'Poli %')->count();

        // Data untuk Grafik (6 bulan terakhir)
        $monthly_data = [];
        $labels = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $labels[] = $date->format('M');
            $monthly_data[] = SuratKeterangan::whereMonth('tanggal_cetak', $date->month)
                ->whereYear('tanggal_cetak', $date->year)
                ->count();
        }

        $recent_pendaftar = Pendaftar::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'total_pendaftar',
            'pending',
            'sehat',
            'jiwa',
            'narkoba',
            'spesialis',
            'labels',
            'monthly_data',
            'recent_pendaftar'
        ));
    }

    public function getStatsApi()
    {
        return response()->json([
            'sehat' => SuratKeterangan::where('tipe_berkas', 'Kesehatan')->count(),
            'jiwa' => SuratKeterangan::where('tipe_berkas', 'Kesehatan Jiwa')->count(),
            'narkoba' => SuratKeterangan::where('tipe_berkas', 'Bebas Narkoba')->count(),
            'spesialis' => SuratKeterangan::where(function ($q) {
                $q->where('tipe_berkas', 'LIKE', 'Kesehatan %')
                    ->whereNotIn('tipe_berkas', ['Kesehatan', 'Kesehatan Jiwa']);
            })->orWhere('tipe_berkas', 'LIKE', 'Poli %')->count(),
            'total_pendaftar' => Pendaftar::count(),
            'pending' => Pendaftar::where('status', 'Pending')->count(),
        ]);
    }
}
