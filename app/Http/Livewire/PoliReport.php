<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\SuratKeterangan;
use Carbon\Carbon;

class PoliReport extends Component
{
    use WithPagination;

    public $type;
    public $search = '';
    public $startDate;
    public $endDate;

    protected $queryString = ['search', 'startDate', 'endDate'];

    public function mount($type)
    {
        $this->type = $type;
        $this->startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->endDate = Carbon::now()->format('Y-m-d');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStartDate()
    {
        $this->resetPage();
    }

    public function updatingEndDate()
    {
        $this->resetPage();
    }

    public function exportCsv()
    {
        $query = SuratKeterangan::with('pendaftar', 'dokter')->latest();

        if ($this->type == 'Spesialis') {
            $query->where(function ($q) {
                $q->where('tipe_berkas', 'LIKE', 'Kesehatan %')
                    ->whereNotIn('tipe_berkas', ['Kesehatan', 'Kesehatan Jiwa'])
                    ->orWhere('tipe_berkas', 'LIKE', 'Poli %');
            });
        } else {
            $variations = [$this->type];
            $alt = strpos($this->type, 'Kesehatan ') === 0 ? str_replace('Kesehatan ', '', $this->type) : 'Kesehatan ' . $this->type;
            $variations[] = $alt;
            if ($this->type == 'Resume MCU')
                $variations[] = 'MCU';

            $query->whereIn('tipe_berkas', array_unique($variations));
        }

        if ($this->startDate && $this->endDate) {
            $query->whereBetween('tanggal_cetak', [$this->startDate, $this->endDate]);
        }

        if ($this->search) {
            $query->whereHas('pendaftar', function ($q) {
                $q->where('nama_lengkap', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('no_registrasi', 'LIKE', '%' . $this->search . '%');
            });
        }

        $reports = $query->get();
        $filename = "Laporan_" . str_replace(' ', '_', $this->type) . "_" . date('Ymd_His') . ".csv";

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
                    Carbon::parse($row->tanggal_cetak)->format('Y-m-d'),
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

    public function render()
    {
        $query = SuratKeterangan::with('pendaftar', 'dokter')->latest();

        if ($this->type == 'Spesialis') {
            $query->where(function ($q) {
                $q->where('tipe_berkas', 'LIKE', 'Kesehatan %')
                    ->whereNotIn('tipe_berkas', ['Kesehatan', 'Kesehatan Jiwa'])
                    ->orWhere('tipe_berkas', 'LIKE', 'Poli %');
            });
        } else {
            $variations = [$this->type];
            $alt = strpos($this->type, 'Kesehatan ') === 0 ? str_replace('Kesehatan ', '', $this->type) : 'Kesehatan ' . $this->type;
            $variations[] = $alt;
            if ($this->type == 'Resume MCU')
                $variations[] = 'MCU';

            $query->whereIn('tipe_berkas', array_unique($variations));
        }

        if ($this->startDate && $this->endDate) {
            $query->whereBetween('tanggal_cetak', [$this->startDate, $this->endDate]);
        }

        if ($this->search) {
            $query->whereHas('pendaftar', function ($q) {
                $q->where('nama_lengkap', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('no_registrasi', 'LIKE', '%' . $this->search . '%');
            });
        }

        return view('livewire.poli-report', [
            'reports' => $query->paginate(15)
        ]);
    }
}
