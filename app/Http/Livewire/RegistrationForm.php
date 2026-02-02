<?php

namespace App\Http\Livewire;

use App\Models\Pendaftar;
use App\Models\Price;
use Livewire\Component;

class RegistrationForm extends Component
{
    public $nama_lengkap;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $gender;
    public $no_hp;
    public $tinggi_badan;
    public $berat_badan;
    public $pekerjaan;
    public $pendidikan;
    public $keperluan;
    public $alamat;
    public $jenis_test = [];
    public $total_price = 0;

    protected $rules = [
        'nama_lengkap' => 'required|min:3',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required|date',
        'gender' => 'required',
        'no_hp' => 'required|numeric',
        'tinggi_badan' => 'required|numeric',
        'berat_badan' => 'required|numeric',
        'pekerjaan' => 'required',
        'pendidikan' => 'required',
        'keperluan' => 'required',
        'alamat' => 'required',
        'jenis_test' => 'required|array|min:1',
    ];

    public function calculateTotal()
    {
        $prices = Price::whereIn('test_name', $this->jenis_test)->pluck('price');
        $this->total_price = $prices->sum();
    }

    public function simpan()
    {
        $this->validate();

        // Generate Registration Number
        $today = now()->format('Y-m-d');
        $lastReg = Pendaftar::whereDate('created_at', $today)->latest()->first();
        $suffix = 1;

        if ($lastReg) {
            $lastSuffix = (int) substr($lastReg->no_registrasi, -3);
            $suffix = $lastSuffix + 1;
        }

        $noRegistrasi = 'RSUD-' . now()->format('Ymd') . '-' . str_pad($suffix, 3, '0', STR_PAD_LEFT);

        Pendaftar::create([
            'no_registrasi' => $noRegistrasi,
            'nama_lengkap' => $this->nama_lengkap,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->gender,
            'no_hp' => $this->no_hp,
            'tinggi_badan' => $this->tinggi_badan,
            'berat_badan' => $this->berat_badan,
            'pekerjaan' => $this->pekerjaan,
            'pendidikan' => $this->pendidikan,
            'keperluan' => $this->keperluan,
            'alamat' => $this->alamat,
            'jenis_test' => implode(', ', $this->jenis_test),
        ]);

        session()->flash('success', 'Pendaftaran Anda telah berhasil dikirim ke sistem.');

        return redirect()->to('/');
    }

    public function render()
    {
        $this->calculateTotal();
        $prices_data = Price::all()->sortBy(function ($price) {
            return $price->test_name === 'Kesehatan' ? 0 : 1;
        });
        return view('livewire.registration-form', [
            'prices_list' => $prices_data
        ]);
    }
}
