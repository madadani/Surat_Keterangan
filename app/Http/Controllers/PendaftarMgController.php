<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Price;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;

class PendaftarMgController extends Controller
{
    public function json(Request $request)
    {
        $query = Pendaftar::query();

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $status = $request->status;
            if ($status == 'Queue') {
                $query->whereIn('status', ['Pending', 'Proses']);
            } else {
                $query->where('status', $status);
            }
        }

        // Search by name or registration number
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'LIKE', "%{$search}%")
                    ->orWhere('no_registrasi', 'LIKE', "%{$search}%");
            });
        }

        $query->latest();

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('estimasi_biaya', function ($row) {
                // Get price from database based on keperluan
                $price = Price::where('test_name', $row->keperluan)->first();
                return $price ? $price->price : 0;
            })
            ->addColumn('status_badge', function ($row) {
                $color = 'gray';
                if ($row->status == 'Pending')
                    $color = 'yellow';
                elseif ($row->status == 'Proses')
                    $color = 'blue';
                elseif ($row->status == 'Selesai')
                    $color = 'green';

                return '<span class="px-2 py-1 text-[10px] font-bold uppercase rounded bg-' . $color . '-50 text-' . $color . '-600 border border-' . $color . '-100">' . $row->status . '</span>';
            })
            ->addColumn('action', function ($row) {
                $editUrl = url('/admin/data-pendaftar/edit/' . $row->id);
                $deleteUrl = url('/admin/data-pendaftar/delete/' . $row->id);
                $csrf = csrf_field();
                $method = method_field('DELETE');

                return '
                    <div class="flex items-center gap-2">
                        <a href="' . $editUrl . '" class="w-8 h-8 flex items-center justify-center rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                        </a>
                        <form action="' . $deleteUrl . '" method="POST" onsubmit="return confirm(\'Yakin ingin menghapus data ini?\')">
                            ' . $csrf . $method . '
                            <button type="submit" class="w-8 h-8 flex items-center justify-center rounded-xl bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                            </button>
                        </form>
                    </div>
                ';
            })
            ->rawColumns(['status_badge', 'action'])
            ->make(true);
    }

    public function index()
    {
        // View sekarang akan load DataTable via AJAX
        return view('admin.data_pendaftar');
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
