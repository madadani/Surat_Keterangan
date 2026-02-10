<?php

namespace App\Http\Livewire;

use App\Models\Pendaftar;
use App\Models\Price;
use Livewire\Component;
use Livewire\WithPagination;

class AdminPendaftarTable extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $unit = '';

    protected $queryString = ['search', 'status', 'unit'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function updatingUnit()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['search', 'status', 'unit']);
        $this->resetPage();
    }

    public function render()
    {
        $query = Pendaftar::query();

        if ($this->status) {
            $status = $this->status;
            if ($status == 'Queue') {
                $query->whereIn('status', ['Pending', 'Proses', 'pending', 'proses', 'PENDING', 'PROSES']);
            } else {
                $query->where(function ($q) use ($status) {
                    $q->where('status', $status)
                        ->orWhere('status', strtolower($status))
                        ->orWhere('status', strtoupper($status));
                });
            }
        }

        if ($this->unit) {
            $query->where('jenis_test', 'LIKE', '%' . $this->unit . '%');
        }

        if ($this->search) {
            $search = $this->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'LIKE', '%' . $search . '%')
                    ->orWhere('no_registrasi', 'LIKE', '%' . $search . '%')
                    ->orWhere('jenis_test', 'LIKE', '%' . $search . '%');
            });
        }

        return view('livewire.admin-pendaftar-table', [
            'pendants' => $query->latest()->paginate(10),
            'prices' => Price::all()->pluck('price', 'test_name'),
            'price_list' => Price::where('test_name', '!=', 'MCU')->get()
        ]);
    }
}
