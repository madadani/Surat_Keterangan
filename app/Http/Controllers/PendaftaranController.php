<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Price;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $prices = Price::all()->sortBy(function ($price) {
            return $price->test_name === 'Kesehatan' ? 0 : 1;
        });
        return view('index', compact('prices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'gender' => 'required',
            'keperluan' => 'required',
            'no_hp' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'jenis_test' => 'required|array|min:1',
        ]);

        // Generate Registration Number
        $todayStr = date('Ymd');
        $latest = Pendaftar::where('no_registrasi', 'LIKE', "RSUD-{$todayStr}%")
            ->latest('id')
            ->first();

        if ($latest) {
            $last_number = (int) substr($latest->no_registrasi, -3);
            $count = $last_number + 1;
        } else {
            $count = 1;
        }

        $no_registrasi = 'RSUD-' . $todayStr . '-' . str_pad($count, 3, '0', STR_PAD_LEFT);

        Pendaftar::create([
            'no_registrasi' => $no_registrasi,
            'nama_lengkap' => $request->nama_lengkap,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pekerjaan' => $request->pekerjaan,
            'pendidikan' => $request->pendidikan,
            'jenis_kelamin' => $request->gender,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'keperluan' => $request->keperluan,
            'jenis_test' => implode(', ', $request->jenis_test),
            'status' => 'Pending',
        ]);

        return redirect('/')->with('success', 'Pendaftaran Anda telah berhasil dikirim ke sistem.');
    }
}
