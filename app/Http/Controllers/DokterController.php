<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\SuratKeterangan;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        return view('admin.dokter.index', compact('dokters'));
    }

    public function create()
    {
        return view('admin.dokter.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dokter' => 'required',
            'nip' => 'nullable|unique:dokters,nip',
            'spesialis' => 'required',
        ]);

        Dokter::create($request->all());

        return redirect('/admin/data-dokter')->with('success', 'Data dokter berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('admin.dokter.edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        $dokter = Dokter::findOrFail($id);

        $request->validate([
            'nama_dokter' => 'required',
            'nip' => 'nullable|unique:dokters,nip,' . $id,
            'spesialis' => 'required',
        ]);

        $dokter->update($request->all());

        return redirect('/admin/data-dokter')->with('success', 'Data dokter berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);

        // Cek apakah dokter memiliki relasi dengan surat_keterangan
        $hasRelation = SuratKeterangan::where('dokter_id', $id)->exists();

        if ($hasRelation) {
            return redirect('/admin/data-dokter')->with('error', 'Gagal menghapus! Dokter ini sudah terdaftar di beberapa surat keterangan. Silakan hapus atau ubah surat terkait terlebih dahulu.');
        }

        $dokter->delete();

        return redirect('/admin/data-dokter')->with('success', 'Data dokter berhasil dihapus!');
    }
}
