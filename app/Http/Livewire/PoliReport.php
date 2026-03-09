<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\SuratKeterangan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        // Read from both possible param formats (start_date from index page, or startDate from Livewire queryString)
        $this->startDate = request('startDate') ?? request('start_date') ?? Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->endDate = request('endDate') ?? request('end_date') ?? Carbon::now()->format('Y-m-d');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function applyFilter()
    {
        $this->resetPage();
    }

    private function buildQuery()
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

            // Tambahkan variasi MCU secara dua arah
            if (strtolower($this->type) === 'mcu' || strtolower($this->type) === 'resume mcu' || strtolower($this->type) === 'medical check up') {
                $variations[] = 'MCU';
                $variations[] = 'Resume MCU';
                $variations[] = 'Medical Check Up';
            }

            $query->whereIn(DB::raw('LOWER(tipe_berkas)'), array_map('strtolower', array_unique($variations)));
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

        return $query;
    }

    public function exportCsv()
    {
        $reports = $this->buildQuery()->get();
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
        return view('livewire.poli-report', [
            'reports' => $this->buildQuery()->paginate(15)
        ]);
    }
}
