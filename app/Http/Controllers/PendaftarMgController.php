<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Price;
use Illuminate\Http\Request;

class PendaftarMgController extends Controller
{
    public function index()
    {
        $search = request('search');
        $status = request('status');
        $query = Pendaftar::query();

        if ($status) {
            if ($status == 'Queue') {
                $query->whereIn('status', ['Pending', 'Proses']);
            } else {
                $query->where('status', $status);
            }
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'LIKE', "%{$search}%")
                    ->orWhere('no_registrasi', 'LIKE', "%{$search}%");
            });
        }

        $pendaftar = $query->latest()->paginate(10);
        $prices = Price::all()->pluck('price', 'test_name');

        return view('admin.data_pendaftar', compact('pendaftar', 'prices'));
    }

    public function create()
    {
        return view('admin.tambah_pendaftar');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'no_hp' => 'required',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'alamat' => 'required',
            'keperluan' => 'required',
            'gender' => 'required',
            'jenis_test' => 'required|array|min:1'
        ]);

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
            'no_rm' => $request->no_rm,
            'nama_lengkap' => $request->nama_lengkap,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pekerjaan' => $request->pekerjaan,
            'pendidikan' => $request->pendidikan,
            'perusahaan' => $request->perusahaan,
            'no_hp' => $request->no_hp,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'alamat' => $request->alamat,
            'keperluan' => $request->keperluan,
            'jenis_kelamin' => $request->gender,
            'jenis_test' => implode(', ', $request->jenis_test),
            'status' => 'Pending'
        ]);

        return redirect('/admin/data-pendaftar')->with('success', 'Data pendaftar berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        return view('admin.edit_pendaftar', compact('pendaftar'));
    }

    public function update(Request $request, $id)
    {
        $pendaftar = Pendaftar::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required',
            'no_rm' => 'nullable',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'no_hp' => 'required',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'alamat' => 'required',
            'keperluan' => 'required',
            'gender' => 'required',
            'jenis_test' => 'required|array|min:1'
        ]);

        $pendaftar->update([
            'nama_lengkap' => $request->nama_lengkap,
            'no_rm' => $request->no_rm,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pekerjaan' => $request->pekerjaan,
            'pendidikan' => $request->pendidikan,
            'perusahaan' => $request->perusahaan,
            'no_hp' => $request->no_hp,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'alamat' => $request->alamat,
            'keperluan' => $request->keperluan,
            'jenis_kelamin' => $request->gender,
            'jenis_test' => implode(', ', $request->jenis_test),
        ]);

        return redirect('/admin/data-pendaftar')->with('success', 'Data pendaftar berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->delete();

        return redirect('/admin/data-pendaftar')->with('success', 'Data pendaftar berhasil dihapus!');
    }
}
