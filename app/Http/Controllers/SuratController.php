<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\SuratKeterangan;
use App\Models\Dokter;
use App\Services\RtfService;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function index()
    {
        $search = request('search');
        $type = request('type');
        $startDate = request('start_date');
        $endDate = request('end_date');

        if ($type) {
            // VIEW FLAT (List semua surat berdasarkan tipe)
            $query = SuratKeterangan::with(['pendaftar', 'dokter'])->latest();

            if ($type == 'Spesialis') {
                $query->where(function ($q) {
                    $q->where('tipe_berkas', 'LIKE', 'Kesehatan %')
                        ->whereNotIn('tipe_berkas', ['Kesehatan', 'Kesehatan Jiwa'])
                        ->orWhere('tipe_berkas', 'LIKE', 'Poli %');
                });
            } else {
                $query->where('tipe_berkas', $type);
            }

            if ($startDate && $endDate) {
                $query->whereBetween('tanggal_cetak', [$startDate, $endDate]);
            }

            if ($search) {
                $query->whereHas('pendaftar', function ($q) use ($search) {
                    $q->where('nama_lengkap', 'LIKE', "%{$search}%")
                        ->orWhere('no_registrasi', 'LIKE', "%{$search}%");
                });
            }

            $surat = $query->paginate(15);
            return view('admin.buat_surat', compact('surat'));
        }

        // VIEW GRUP (Default: Grouped by Pendaftar)
        $query = Pendaftar::has('suratKeterangan')->with([
            'suratKeterangan' => function ($q) use ($startDate, $endDate) {
                $q->latest()->with('dokter');
                if ($startDate && $endDate) {
                    $q->whereBetween('tanggal_cetak', [$startDate, $endDate]);
                }
            }
        ]);

        if ($startDate && $endDate) {
            $query->whereHas('suratKeterangan', function ($q) use ($startDate, $endDate) {
                $q->whereBetween('tanggal_cetak', [$startDate, $endDate]);
            });
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'LIKE', "%{$search}%")
                    ->orWhere('no_registrasi', 'LIKE', "%{$search}%");
            });
        }

        $pendaftar = $query->latest()->paginate(10);
        return view('admin.buat_surat', compact('pendaftar'));
    }

    public function redirectToCreate()
    {
        return redirect('/admin/buat-surat/tambah');
    }

    public function create()
    {
        $selected_id = request('pendaftar_id');
        $pendaftar = Pendaftar::with('suratKeterangan')
            ->whereIn('status', ['Pending', 'Proses'])
            ->get();
        $dokters = Dokter::all();

        // Generate nomor surat otomatis (Urutan/RSUD/GML/Bulan/Tahun)
        $month = date('m');
        $year = date('Y');
        $suffix = '/' . $month . '/' . $year;

        $latest = SuratKeterangan::where('nomor_surat', 'LIKE', '%' . $suffix)
            ->orderByRaw('CAST(SUBSTRING_INDEX(nomor_surat, "/", 1) AS UNSIGNED) DESC')
            ->first();

        if ($latest) {
            $last_number = (int) explode('/', $latest->nomor_surat)[0];
            $count = $last_number + 1;
        } else {
            $count = 1;
        }

        $next_nomor = str_pad($count, 3, '0', STR_PAD_LEFT) . '/RSUD/GML/' . $month . '/' . $year;

        return view('admin.tambah_surat', compact('pendaftar', 'dokters', 'next_nomor', 'selected_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pendaftar_id' => 'required',
            'tipe_berkas' => 'required',
            'nomor_surat' => [
                'required',
                $request->nomor_surat === '-'
                ? ''
                : \Illuminate\Validation\Rule::unique('surat_keterangan')->where(function ($query) use ($request) {
                    return $query->where('pendaftar_id', '!=', $request->pendaftar_id);
                }),
            ],
            'dokter_id' => 'required',
            'tanggal_cetak' => 'required|date',
        ]);

        $pendaftarId = $request->pendaftar_id;
        $pendaftar = Pendaftar::findOrFail($pendaftarId);

        $tipeBerkas = $request->tipe_berkas;
        $formatCetaks = ($tipeBerkas == 'Kesehatan') ? (array) $request->format_cetak : [null];

        if (empty($formatCetaks)) {
            $formatCetaks = ['Sehat'];
        }

        $baseNomor = $request->nomor_surat;
        $createdCount = 0;

        foreach ($formatCetaks as $index => $format) {
            $data = [
                'pendaftar_id' => $pendaftarId,
                'tipe_berkas' => $tipeBerkas,
                'dokter_id' => $request->dokter_id,
                'tanggal_cetak' => $request->tanggal_cetak,
                'pekerjaan' => $request->pekerjaan,
                'pendidikan' => $request->pendidikan,
                'keperluan' => $request->keperluan,
            ];

            if ($baseNomor !== '-' && $index > 0) {
                $parts = explode('/', $baseNomor);
                if (count($parts) > 0 && is_numeric($parts[0])) {
                    $num = (int) $parts[0] + $index;
                    $parts[0] = str_pad($num, 3, '0', STR_PAD_LEFT);
                    $data['nomor_surat'] = implode('/', $parts);
                } else {
                    $data['nomor_surat'] = $baseNomor;
                }
            } else {
                $data['nomor_surat'] = $baseNomor;
            }

            // Map fields based on tipe_berkas
            $this->mapDataByType($data, $request, $tipeBerkas, $format, $pendaftar);

            SuratKeterangan::create($data);
            $createdCount++;
        }

        // Update pendaftar status
        $this->updatePendaftarStatus($pendaftarId);

        $msg = ($createdCount > 1) ? "$createdCount Surat Keterangan berhasil dibuat!" : "Surat Keterangan berhasil dibuat!";
        return back()->with('success', $msg);
    }

    public function edit($id)
    {
        $surat = SuratKeterangan::findOrFail($id);
        $pendaftar = Pendaftar::all();
        $dokters = Dokter::all();
        return view('admin.edit_surat', compact('surat', 'pendaftar', 'dokters'));
    }

    public function update(Request $request, $id)
    {
        $surat = SuratKeterangan::findOrFail($id);

        $request->validate([
            'pendaftar_id' => 'required',
            'nomor_surat' => [
                'required',
                $request->nomor_surat === '-'
                ? ''
                : \Illuminate\Validation\Rule::unique('surat_keterangan')
                    ->ignore($id)
                    ->where(function ($query) use ($request) {
                        return $query->where('pendaftar_id', '!=', $request->pendaftar_id);
                    }),
            ],
            'dokter_id' => 'required',
            'tanggal_cetak' => 'required|date',
        ]);

        $data = $request->all();
        $this->mapUpdateDataByType($data, $request, $surat);

        $surat->update($data);

        return redirect('/admin/data-surat')->with('success', 'Surat Keterangan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $surat = SuratKeterangan::findOrFail($id);
        $surat->delete();

        return redirect('/admin/buat-surat')->with('success', 'Surat Keterangan berhasil dihapus!');
    }

    public function cetak($id)
    {
        $surat = SuratKeterangan::with(['pendaftar', 'dokter'])->findOrFail($id);

        $tipe = $surat->tipe_berkas;
        $content_view = 'poli';
        $judul_surat = 'Surat Keterangan Dokter';
        $jabatan_dokter = 'Dokter Pemeriksa';
        $use_sip = false;

        if ($tipe == 'Kesehatan') {
            $content_view = 'sehat';
            $judul_surat = 'Surat Keterangan Sehat';
        } elseif ($tipe == 'Kesehatan Jiwa') {
            $content_view = 'jiwa';
            $judul_surat = 'Surat Keterangan Kesehatan Jiwa';
        } elseif ($tipe == 'Bebas Narkoba') {
            $content_view = 'narkoba';
            $judul_surat = 'Surat Keterangan Bebas Narkoba';
        } elseif (str_contains($tipe, 'Mata')) {
            $content_view = 'mata';
            $judul_surat = 'Surat Keterangan Kesehatan Mata';
        } elseif (str_contains($tipe, 'Paru')) {
            $content_view = 'paru';
            $judul_surat = 'Surat Keterangan Dokter';
        } elseif (str_contains($tipe, 'THT')) {
            $content_view = 'tht';
            $judul_surat = 'Surat Keterangan Dokter';
            $use_sip = true;
        } elseif (str_contains($tipe, 'Dalam')) {
            $content_view = 'poli';
            $judul_surat = 'Surat Keterangan Sehat';
        } elseif (str_contains($tipe, 'Gigi')) {
            $content_view = 'gigi';
            $judul_surat = 'Surat Keterangan Pemeriksaan Gigi';
            $jabatan_dokter = 'Dokter Gigi Pemeriksa';
            $use_sip = true;
        } elseif (str_contains($tipe, 'Orthopedi') || str_contains($tipe, 'Ortopedi')) {
            $content_view = 'poli';
            $judul_surat = 'Surat Keterangan Sehat';
        } elseif (str_contains($tipe, 'Jantung')) {
            $content_view = 'jantung';
            $judul_surat = 'Surat Keterangan Sehat Jantung';
        } elseif ($tipe == 'Medical Check Up' || $tipe == 'Kesehatan TKHI') {
            $mengetahui = Dokter::where('jabatan', 'LIKE', '%Kepala Bidang Pelayanan%')->first();
            $view = ($tipe == 'Kesehatan TKHI') ? 'admin.cetak.tkhi' : 'admin.cetak.mcu';
            return view($view, compact('surat', 'mengetahui'));
        }

        $mengetahui = Dokter::where('jabatan', 'LIKE', '%Kepala Bidang Pelayanan%')->first();

        return view('admin.cetak.main', compact('surat', 'mengetahui', 'content_view', 'judul_surat', 'jabatan_dokter', 'use_sip'));
    }

    public function downloadRTF($id, RtfService $rtfService)
    {
        $surat = SuratKeterangan::findOrFail($id);
        $rtfContent = $rtfService->generate($surat);

        $filename = "Surat_" . str_replace([' ', '/', '\\'], '_', $surat->tipe_berkas) . "_" . str_replace([' ', '/', '\\'], '_', $surat->pendaftar->nama_lengkap) . ".rtf";

        return response($rtfContent)
            ->header('Content-Type', 'application/rtf')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    // Private helper methods
    private function mapDataByType(&$data, $request, $tipeBerkas, $format, $pendaftar)
    {
        if ($tipeBerkas == 'Kesehatan') {
            if ($request->hasil_kondisi == 'Tidak Sehat') {
                $data['hasil_pemeriksaan'] = 'Tidak Sehat';
            } else {
                $data['hasil_pemeriksaan'] = $format ?? 'Sehat';
            }
            $data['buta_warna'] = $request->buta_warna;
            $data['tinggi_badan'] = $request->tinggi_badan;
            $data['berat_badan'] = $request->berat_badan;
            $data['tensi'] = $request->tensi;
            $data['nadi'] = $request->nadi;
            $data['suhu'] = $request->suhu;
            $data['respirasi'] = $request->respirasi;
        } elseif ($tipeBerkas == 'Kesehatan Jiwa') {
            $data['pada_tanggal'] = $request->pada_tanggal_jiwa;
            $data['hasil_pemeriksaan'] = $request->hasil_jiwa ?? '-';
            $data['saran'] = $request->saran_jiwa ?? '-';
        } elseif ($tipeBerkas == 'Bebas Narkoba') {
            $data['pada_tanggal'] = $request->pada_tanggal_narkoba;
            $data['hasil_pemeriksaan'] = 'Bebas Narkoba';
            $data['saran'] = $request->saran_narkoba;
            $data['kesimpulan'] = $request->kesimpulan_narkoba;
            $data['keperluan'] = $request->dipergunakan_untuk;
            $data['morphine'] = $request->morphine;
            $data['canabinoid'] = $request->canabinoid;
            $data['amphetamine'] = $request->amphetamine;
            $data['benzodiazepine'] = $request->benzodiazepine;
            $data['metamfetamin'] = $request->metamfetamin;
            $data['cocaine'] = $request->cocaine;
        } elseif ($tipeBerkas == 'Kesehatan Mata') {
            $data['visus_kanan'] = $request->visus_kanan ?? '-';
            $data['visus_kiri'] = $request->visus_kiri ?? '-';
            $data['segmen_anterior'] = $request->segmen_anterior ?? '-';
            $data['hasil_pemeriksaan'] = $request->hasil_mata ?? 'Normal';
            $data['buta_warna'] = $request->buta_warna_mata ?? 'Tidak';
            $data['keperluan'] = $request->keperluan_mata;
        } elseif ($tipeBerkas == 'Kesehatan THT') {
            $data['tensi'] = $request->tekanan_darah_tht;
            $data['golongan_darah'] = $request->golongan_darah_tht;
            $data['tinggi_badan'] = $request->tinggi_tht;
            $data['berat_badan'] = $request->berat_tht;
            $data['tes_bisik'] = $request->tes_bisik ?? '-';
            $data['telinga_kanan'] = $request->telinga_kanan ?? 'Normal';
            $data['telinga_kiri'] = $request->telinga_kiri ?? 'Normal';
            $data['hidung'] = $request->hidung ?? 'Normal';
            $data['tenggorokan'] = $request->tenggorokan ?? 'Normal';
            $data['hasil_pemeriksaan'] = $request->hasil_tht ?? 'SEHAT THT';
            $data['pada_tanggal'] = date('Y-m-d');
        } elseif ($tipeBerkas == 'Kesehatan Gigi') {
            $data['hasil_pemeriksaan'] = $request->hasil_gigi ?? 'SEHAT GIGI';
            $data['saran'] = $request->saran_gigi ?? '-';
            $data['tindakan_gigi'] = $request->tindakan_gigi_list ? implode(', ', $request->tindakan_gigi_list) : null;
            $data['kontrol_ulang'] = $request->kontrol_ulang_gigi;
            $data['keperluan'] = $request->keperluan_gigi;
            $data['pada_tanggal'] = date('Y-m-d');
            if ($request->no_rm_gigi) {
                $pendaftar->update(['no_rm' => $request->no_rm_gigi]);
            }
        } elseif ($tipeBerkas == 'Kesehatan Jantung') {
            $data['hasil_pemeriksaan'] = $request->hasil_jantung ?? 'SEHAT JANTUNG';
            $data['saran'] = $request->saran_jantung ?? '-';
            $data['pada_tanggal'] = date('Y-m-d');
            $heartData = [];
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'jantung_') === 0) {
                    $heartData[$key] = $value;
                }
            }
            $data['mcu_data'] = $heartData;
        } elseif ($tipeBerkas === 'Medical Check Up' || $tipeBerkas === 'Kesehatan TKHI') {
            $data['no_lab'] = $request->no_lab;
            $data['perusahaan'] = $request->perusahaan;
            $data['tinggi_badan'] = $request->mcu_tinggi;
            $data['berat_badan'] = $request->mcu_berat;
            $data['tensi'] = $request->mcu_sistol . '/' . $request->mcu_diastol;
            $data['respirasi'] = $request->mcu_respirasi;
            $data['nadi'] = $request->mcu_nadi;
            $data['suhu'] = $request->mcu_suhu;
            $data['buta_warna'] = $request->mcu_buta_warna ?? 'Tidak';
            $data['hasil_pemeriksaan'] = $request->mcu_hasil_pemeriksaan ?? 'SEHAT / FIT';
            $data['saran'] = $request->mcu_saran ?? '-';

            $mcuData = [];
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'mcu_') === 0 && !in_array($key, ['mcu_tinggi', 'mcu_berat', 'mcu_sistol', 'mcu_diastol', 'mcu_respirasi', 'mcu_nadi', 'mcu_suhu', 'mcu_buta_warna', 'mcu_hasil_pemeriksaan', 'mcu_saran'])) {
                    $mcuData[str_replace('mcu_', '', $key)] = $value;
                }
            }
            $data['mcu_data'] = $mcuData;
        } elseif (strpos($tipeBerkas, 'Kesehatan') !== false) {
            $data['tinggi_badan'] = $request->tinggi_badan_poli;
            $data['berat_badan'] = $request->berat_badan_poli;
            $data['hasil_pemeriksaan'] = $request->hasil_poli ?? 'SEHAT';
            $data['saran'] = $request->saran_poli ?? '-';
        }
    }

    private function mapUpdateDataByType(&$data, $request, $surat)
    {
        if ($surat->tipe_berkas == 'Kesehatan') {
            if ($request->hasil_kondisi == 'Tidak Sehat') {
                $data['hasil_pemeriksaan'] = 'Tidak Sehat';
            } else {
                $data['hasil_pemeriksaan'] = $request->format_cetak ?? 'Sehat';
            }
            $data['buta_warna'] = $request->buta_warna;
            $data['tinggi_badan'] = $request->tinggi_badan;
            $data['berat_badan'] = $request->berat_badan;
            $data['tensi'] = $request->tensi;
            $data['nadi'] = $request->nadi;
            $data['suhu'] = $request->suhu;
            $data['respirasi'] = $request->respirasi;
        } elseif ($surat->tipe_berkas == 'Kesehatan Jiwa') {
            $data['pada_tanggal'] = $request->pada_tanggal_jiwa;
            $data['hasil_pemeriksaan'] = $request->hasil_jiwa;
            $data['saran'] = $request->saran_jiwa;
        } elseif ($surat->tipe_berkas == 'Bebas Narkoba') {
            $data['pada_tanggal'] = $request->pada_tanggal_narkoba;
            $data['hasil_pemeriksaan'] = 'Bebas Narkoba';
            $data['saran'] = $request->saran_narkoba;
            $data['kesimpulan'] = $request->kesimpulan_narkoba;
            $data['keperluan'] = $request->dipergunakan_untuk;
            $data['morphine'] = $request->morphine;
            $data['canabinoid'] = $request->canabinoid;
            $data['amphetamine'] = $request->amphetamine;
            $data['benzodiazepine'] = $request->benzodiazepine;
            $data['metamfetamin'] = $request->metamfetamin;
            $data['cocaine'] = $request->cocaine;
        } elseif ($surat->tipe_berkas == 'Kesehatan Mata') {
            $data['visus_kanan'] = $request->visus_kanan;
            $data['visus_kiri'] = $request->visus_kiri;
            $data['segmen_anterior'] = $request->segmen_anterior;
            $data['hasil_pemeriksaan'] = $request->hasil_mata;
            $data['buta_warna'] = $request->buta_warna_mata;
        } elseif ($surat->tipe_berkas == 'Kesehatan THT') {
            $data['tensi'] = $request->tekanan_darah_tht;
            $data['golongan_darah'] = $request->golongan_darah_tht;
            $data['tinggi_badan'] = $request->tinggi_tht;
            $data['berat_badan'] = $request->berat_tht;
            $data['tes_bisik'] = $request->tes_bisik;
            $data['telinga_kanan'] = $request->telinga_kanan ?? 'Normal';
            $data['telinga_kiri'] = $request->telinga_kiri ?? 'Normal';
            $data['hidung'] = $request->hidung ?? 'Normal';
            $data['tenggorokan'] = $request->tenggorokan ?? 'Normal';
            $data['hasil_pemeriksaan'] = $request->hasil_tht ?? 'SEHAT THT';
        } elseif ($surat->tipe_berkas == 'Kesehatan Gigi') {
            $data['hasil_pemeriksaan'] = $request->hasil_gigi;
            $data['saran'] = $request->saran_gigi;
            $data['tindakan_gigi'] = $request->tindakan_gigi_list ? implode(', ', $request->tindakan_gigi_list) : null;
            $data['kontrol_ulang'] = $request->kontrol_ulang_gigi;
            $data['keperluan'] = $request->keperluan_gigi;
            if ($request->no_rm_gigi) {
                $surat->pendaftar->update(['no_rm' => $request->no_rm_gigi]);
            }
        } elseif ($surat->tipe_berkas == 'Kesehatan Jantung') {
            $data['hasil_pemeriksaan'] = $request->hasil_jantung;
            $data['saran'] = $request->saran_jantung;
            $heartData = [];
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'jantung_') === 0) {
                    $heartData[$key] = $value;
                }
            }
            $data['mcu_data'] = $heartData;
        } elseif ($surat->tipe_berkas === 'Medical Check Up' || $surat->tipe_berkas === 'Kesehatan TKHI') {
            $data['no_lab'] = $request->no_lab;
            $data['perusahaan'] = $request->perusahaan;
            $data['tinggi_badan'] = $request->mcu_tinggi;
            $data['berat_badan'] = $request->mcu_berat;
            $data['tensi'] = $request->mcu_sistol . '/' . $request->mcu_diastol;
            $data['respirasi'] = $request->mcu_respirasi;
            $data['nadi'] = $request->mcu_nadi;
            $data['suhu'] = $request->mcu_suhu;
            $data['buta_warna'] = $request->mcu_buta_warna ?? 'Tidak';
            $data['hasil_pemeriksaan'] = $request->mcu_hasil_pemeriksaan ?? 'SEHAT / FIT';
            $data['saran'] = $request->mcu_saran ?? '-';
            $data['kesimpulan'] = $request->mcu_kesimpulan ?? '-';

            $mcuData = [];
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'mcu_') === 0 && !in_array($key, ['mcu_tinggi', 'mcu_berat', 'mcu_sistol', 'mcu_diastol', 'mcu_respirasi', 'mcu_nadi', 'mcu_suhu', 'mcu_buta_warna', 'mcu_hasil_pemeriksaan', 'mcu_saran', 'mcu_kesimpulan'])) {
                    $mcuData[str_replace('mcu_', '', $key)] = $value;
                }
            }
            $data['mcu_data'] = $mcuData;
        } elseif (strpos($surat->tipe_berkas, 'Kesehatan') !== false) {
            $data['tinggi_badan'] = $request->tinggi_badan_poli;
            $data['berat_badan'] = $request->berat_badan_poli;
            $data['hasil_pemeriksaan'] = $request->hasil_poli ?? 'SEHAT';
            $data['saran'] = $request->saran_poli ?? '-';
        }
    }

    private function updatePendaftarStatus($pendaftarId)
    {
        $pendaftar = Pendaftar::find($pendaftarId);
        if ($pendaftar) {
            $requested_tests = explode(', ', $pendaftar->jenis_test);
            $total_requested = count($requested_tests);
            $total_created = SuratKeterangan::where('pendaftar_id', $pendaftar->id)->count();

            if ($total_created >= $total_requested) {
                $pendaftar->update(['status' => 'Selesai']);
            } else {
                $pendaftar->update(['status' => 'Proses']);
            }
        }
    }
}
