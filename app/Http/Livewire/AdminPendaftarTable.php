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

    protected $updatesQueryString = ['search', 'status'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['search', 'status']);
        $this->resetPage();
    }

    public function render()
    {
        $query = Pendaftar::query();

        if ($this->status) {
            if ($this->status == 'Queue') {
                $query->whereIn('status', ['Pending', 'Proses']);
            } else {
                $query->where('status', $this->status);
            }
        }

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('nama_lengkap', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('no_registrasi', 'LIKE', '%' . $this->search . '%');
            });
        }

        return view('livewire.admin-pendaftar-table', [
            'pendaftar' => $query->latest()->paginate(10),
            'prices' => Price::all()->pluck('price', 'test_name')
        ]);
    }
}
