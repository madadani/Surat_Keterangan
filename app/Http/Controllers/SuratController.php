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
        $startDate = request('start_date') ?? \Carbon\Carbon::now()->startOfMonth()->format('Y-m-d');
        $endDate = request('end_date') ?? \Carbon\Carbon::now()->format('Y-m-d');

        // Kueri dasar: Ambil pendaftar yang memiliki surat keterangan
        $query = Pendaftar::whereHas('suratKeterangan')->with([
            'suratKeterangan' => function ($q) use ($startDate, $endDate) {
                $q->with('dokter')->latest();
                $q->whereBetween('tanggal_cetak', [$startDate, $endDate]);
            }
        ]);

        // Filter berdasarkan pencarian (Nama, No Registrasi, NIK, atau Nomor Surat)
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'LIKE', "%{$search}%")
                    ->orWhere('no_registrasi', 'LIKE', "%{$search}%")
                    ->orWhere('no_registrasi', 'LIKE', "%{$search}%")
                    ->orWhereHas('suratKeterangan', function ($sq) use ($search) {
                        $sq->where('nomor_surat', 'LIKE', "%{$search}%");
                    });
            });
        }

        // Filter pendaftar yang memiliki surat dalam rentang tanggal tertentu (jika filter tanggal aktif)
        if ($startDate && $endDate) {
            $query->whereHas('suratKeterangan', function ($q) use ($startDate, $endDate) {
                $q->whereBetween('tanggal_cetak', [$startDate, $endDate]);
            });
        }

        $pendaftar = $query->latest()->paginate(10);
        $totalSurat = SuratKeterangan::count();

        return view('admin.data_surat', compact('pendaftar', 'totalSurat'));
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
        \Illuminate\Support\Facades\Log::info('SuratController@store initiated', $request->all());

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
                'identitas_pemeriksa' => $request->identitas_pemeriksa ?? 'NIP',
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

        return redirect('/admin/data-surat')->with('success', 'Surat Keterangan berhasil dihapus!');
    }

    public function cetak($id)
    {
        $surat = SuratKeterangan::with(['pendaftar', 'dokter'])->findOrFail($id);

        $tipe = $surat->tipe_berkas;
        $content_view = 'poli';
        $judul_surat = 'Surat Keterangan Dokter';
        $jabatan_dokter = 'Dokter Pemeriksa';
        $use_sip = ($surat->identitas_pemeriksa === 'SIP');

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
        } elseif (str_contains($tipe, 'Dalam')) {
            $content_view = 'dalam';
            $judul_surat = 'Surat Keterangan Sehat';
        } elseif (str_contains($tipe, 'Gigi')) {
            $content_view = 'gigi';
            $judul_surat = 'Surat Keterangan Pemeriksaan Gigi';
            $jabatan_dokter = 'Dokter Gigi Pemeriksa';
        } elseif (str_contains($tipe, 'Orthopedi') || str_contains($tipe, 'Ortopedi')) {
            $content_view = 'orthopedi';
            $judul_surat = 'Surat Keterangan Sehat';
        } elseif (str_contains($tipe, 'Jantung')) {
            $content_view = 'jantung';
            $judul_surat = 'Surat Keterangan Sehat Jantung';
        } elseif ($tipe == 'Resume MCU') {
            $content_view = 'resume_mcu';
            $judul_surat = 'Resume Pemeriksaan Fisik';
        } elseif ($tipe == 'Kesehatan TKHI') {
            $mengetahui = Dokter::where('jabatan', 'LIKE', '%Kepala Bidang Pelayanan%')->first();
            return view('admin.cetak.tkhi', compact('surat', 'mengetahui'));
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
            // Defaulted to Sehat/Tidak per standard request, but doctor marks manually on paper
            // We keep rudimentary data here for database completeness if needed, or defaults
            $data['hasil_pemeriksaan'] = 'Sehat';
            $data['buta_warna'] = 'Tidak';

            $data['tinggi_badan'] = $request->tinggi_badan;
            $data['berat_badan'] = $request->berat_badan;
            $data['tensi'] = $request->tensi;
            $data['nadi'] = $request->nadi;
            $data['suhu'] = $request->suhu;
            $data['respirasi'] = $request->respirasi;

            // Store extra fields in mcu_data
            $data['mcu_data'] = [
                'bmi' => $request->bmi,
                'gangguan_motorik' => $request->gangguan_motorik,
                'disabilitas' => $request->disabilitas,
                'keterangan_lainnya' => $request->keterangan_lainnya,
            ];
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
        } elseif (str_contains($tipeBerkas, 'Mata')) {
            $data['visus_kanan'] = $request->visus_kanan ?? '-';
            $data['visus_kiri'] = $request->visus_kiri ?? '-';
            $data['segmen_anterior'] = $request->segmen_anterior ?? '-';
            $data['hasil_pemeriksaan'] = $request->hasil_mata ?? 'Normal';
            $data['buta_warna'] = $request->buta_warna_mata ?? 'Tidak';
            $data['keperluan'] = $request->keperluan_mata;
        } elseif (str_contains($tipeBerkas, 'THT')) {
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
            $data['mcu_data'] = [
                'hasil_pemeriksaan_detail_tht' => $request->hasil_pemeriksaan_detail_tht,
            ];
            $data['pada_tanggal'] = date('Y-m-d');
        } elseif (str_contains($tipeBerkas, 'Gigi')) {
            $data['hasil_pemeriksaan'] = $request->hasil_gigi ?? 'SEHAT GIGI';
            $data['saran'] = $request->saran_gigi ?? '-';
            $data['tindakan_gigi'] = $request->tindakan_gigi_list ? implode(', ', $request->tindakan_gigi_list) : null;
            $data['kontrol_ulang'] = $request->kontrol_ulang_gigi;
            $data['keperluan'] = $request->keperluan_gigi;
            $data['pada_tanggal'] = date('Y-m-d');

            // Store odontogram and kelainan in mcu_data
            $gigiData = [
                'kelainan_mulut_gigi' => $request->kelainan_mulut_gigi,
            ];
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'odontogram_') === 0 && !empty($value)) {
                    $gigiData[$key] = $value;
                }
            }
            $data['mcu_data'] = $gigiData;

            if ($request->no_rm_gigi) {
                $pendaftar->update(['no_rm' => $request->no_rm_gigi]);
            }

        } elseif (str_contains($tipeBerkas, 'Jantung')) {
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
        } elseif ($tipeBerkas == 'Kesehatan') {
            $data['tinggi_badan'] = $request->tinggi_badan;
            $data['berat_badan'] = $request->berat_badan;
            $data['tensi'] = $request->tensi;
            $data['nadi'] = $request->nadi;
            $data['suhu'] = $request->suhu;
            $data['respirasi'] = $request->respirasi;
            $data['hasil_pemeriksaan'] = $request->hasil_pemeriksaan ?? 'Sehat';
            $data['mcu_data'] = [
                'bmi' => $request->bmi,
                'gangguan_motorik' => $request->gangguan_motorik,
                'disabilitas' => $request->disabilitas,
                'keterangan_lainnya' => $request->keterangan_lainnya,
            ];
        } elseif ($tipeBerkas == 'Dalam') {
            $data['tinggi_badan'] = $request->tinggi_badan_dalam;
            $data['berat_badan'] = $request->berat_badan_dalam;
            $data['tensi'] = $request->tensi_dalam;
            $data['nadi'] = $request->nadi_dalam;
            $data['suhu'] = $request->suhu_dalam;
            $data['respirasi'] = $request->respirasi_dalam;
            $data['hasil_pemeriksaan'] = 'Sehat';
            $data['mcu_data'] = [
                'bmi' => $request->bmi_dalam,
                'gangguan_motorik' => $request->gangguan_motorik_dalam,
                'disabilitas' => $request->disabilitas_dalam,
                'keterangan_lainnya' => $request->keterangan_lainnya_dalam,
            ];
        } elseif ($tipeBerkas == 'Orthopedi' || $tipeBerkas == 'Ortopedi') {
            $data['tinggi_badan'] = $request->tinggi_badan_orthopedi;
            $data['berat_badan'] = $request->berat_badan_orthopedi;
            $data['tensi'] = $request->tensi_orthopedi;
            $data['nadi'] = $request->nadi_orthopedi;
            $data['suhu'] = $request->suhu_orthopedi;
            $data['respirasi'] = $request->respirasi_orthopedi;
            $data['hasil_pemeriksaan'] = 'Sehat';
            $data['mcu_data'] = [
                'bmi' => $request->bmi_orthopedi,
                'gangguan_motorik' => $request->gangguan_motorik_orthopedi,
                'disabilitas' => $request->disabilitas_orthopedi,
                'keterangan_lainnya' => $request->keterangan_lainnya_orthopedi,
            ];
        } elseif ($tipeBerkas === 'Kesehatan TKHI') {
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
        } elseif ($tipeBerkas === 'Resume MCU') {
            $data['no_lab'] = $request->resmcu_no_lab;
            $data['perusahaan'] = $request->resmcu_perusahaan;
            $data['tinggi_badan'] = $request->resmcu_tb;
            $data['berat_badan'] = $request->resmcu_bb;
            $data['tensi'] = ($request->resmcu_systolic && $request->resmcu_diastolic) ? $request->resmcu_systolic . '/' . $request->resmcu_diastolic : null;
            $data['nadi'] = $request->resmcu_hr;
            $data['respirasi'] = $request->resmcu_rr;
            $data['buta_warna'] = $request->resmcu_buta_warna ?? 'Tidak';
            $data['hasil_pemeriksaan'] = $request->resmcu_kesimpulan_fisik ?? 'SEHAT UNTUK BEKERJA';
            $data['saran'] = $request->resmcu_rekomendasi ?? '-';

            $mcuData = [];
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'resmcu_') === 0) {
                    $mcuData[str_replace('resmcu_', '', $key)] = $value;
                }
            }
            $data['mcu_data'] = $mcuData;
        } elseif (str_contains($tipeBerkas, 'Paru')) {
            $data['tinggi_badan'] = $request->tinggi_badan_poli;
            $data['berat_badan'] = $request->berat_badan_poli;
            $data['hasil_pemeriksaan'] = $request->hasil_poli ?? 'SEHAT';
            $data['saran'] = $request->saran_poli ?? '-';
        }
    }

    private function mapUpdateDataByType(&$data, $request, $surat)
    {
        if ($surat->tipe_berkas == 'Kesehatan') {
            $data['tinggi_badan'] = $request->tinggi_badan;
            $data['berat_badan'] = $request->berat_badan;
            $data['tensi'] = $request->tensi;
            $data['nadi'] = $request->nadi;
            $data['suhu'] = $request->suhu;
            $data['respirasi'] = $request->respirasi;

            $currentMcuData = $surat->mcu_data ?? [];
            $newMcuData = [
                'bmi' => $request->bmi,
                'gangguan_motorik' => $request->gangguan_motorik,
                'disabilitas' => $request->disabilitas,
                'keterangan_lainnya' => $request->keterangan_lainnya,
            ];
            $data['mcu_data'] = array_merge($currentMcuData, $newMcuData);

        } elseif ($surat->tipe_berkas == 'Dalam') {
            $data['tinggi_badan'] = $request->tinggi_badan;
            $data['berat_badan'] = $request->berat_badan;
            $data['tensi'] = $request->tensi;
            $data['nadi'] = $request->nadi;
            $data['suhu'] = $request->suhu;
            $data['respirasi'] = $request->respirasi;

            $currentMcuData = $surat->mcu_data ?? [];
            $data['mcu_data'] = array_merge($currentMcuData, [
                'bmi' => $request->bmi,
                'gangguan_motorik' => $request->gangguan_motorik,
                'disabilitas' => $request->disabilitas,
                'keterangan_lainnya' => $request->keterangan_lainnya,
            ]);

        } elseif (in_array($surat->tipe_berkas, ['Orthopedi', 'Ortopedi'])) {
            $data['tinggi_badan'] = $request->tinggi_badan;
            $data['berat_badan'] = $request->berat_badan;
            $data['tensi'] = $request->tensi;
            $data['nadi'] = $request->nadi;
            $data['suhu'] = $request->suhu;
            $data['respirasi'] = $request->respirasi;

            $currentMcuData = $surat->mcu_data ?? [];
            $data['mcu_data'] = array_merge($currentMcuData, [
                'bmi' => $request->bmi,
                'gangguan_motorik' => $request->gangguan_motorik,
                'disabilitas' => $request->disabilitas,
                'keterangan_lainnya' => $request->keterangan_lainnya,
            ]);

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
        } elseif (str_contains($surat->tipe_berkas, 'Mata')) {
            $data['visus_kanan'] = $request->visus_kanan;
            $data['visus_kiri'] = $request->visus_kiri;
            $data['segmen_anterior'] = $request->segmen_anterior;
            $data['hasil_pemeriksaan'] = $request->hasil_mata;
            $data['buta_warna'] = $request->buta_warna_mata;
        } elseif (str_contains($surat->tipe_berkas, 'THT')) {
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
            $currentMcuData = $surat->mcu_data ?? [];
            $data['mcu_data'] = array_merge($currentMcuData, [
                'hasil_pemeriksaan_detail_tht' => $request->hasil_pemeriksaan_detail_tht,
            ]);
        } elseif (str_contains($surat->tipe_berkas, 'Gigi')) {
            $data['hasil_pemeriksaan'] = $request->hasil_gigi;
            $data['saran'] = $request->saran_gigi;
            $data['tindakan_gigi'] = $request->tindakan_gigi_list ? implode(', ', $request->tindakan_gigi_list) : null;
            $data['kontrol_ulang'] = $request->kontrol_ulang_gigi;
            $data['keperluan'] = $request->keperluan_gigi;

            // Update odontogram and kelainan in mcu_data
            $gigiData = [
                'kelainan_mulut_gigi' => $request->kelainan_mulut_gigi,
            ];
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'odontogram_') === 0 && !empty($value)) {
                    $gigiData[$key] = $value;
                }
            }
            $data['mcu_data'] = $gigiData;

            if ($request->no_rm_gigi) {
                $surat->pendaftar->update(['no_rm' => $request->no_rm_gigi]);
            }

        } elseif (str_contains($surat->tipe_berkas, 'Jantung')) {
            $data['hasil_pemeriksaan'] = $request->hasil_jantung;
            $data['saran'] = $request->saran_jantung;
            $heartData = [];
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'jantung_') === 0) {
                    $heartData[$key] = $value;
                }
            }
            $data['mcu_data'] = $heartData;
        } elseif ($surat->tipe_berkas == 'Kesehatan' || str_contains($surat->tipe_berkas, 'Dalam') || str_contains($surat->tipe_berkas, 'Orthopedi') || str_contains($surat->tipe_berkas, 'Ortopedi')) {
            $data['tinggi_badan'] = $request->tinggi_badan;
            $data['berat_badan'] = $request->berat_badan;
            $data['tensi'] = $request->tensi;
            $data['nadi'] = $request->nadi;
            $data['suhu'] = $request->suhu;
            $data['respirasi'] = $request->respirasi;
            $data['hasil_pemeriksaan'] = $request->hasil_pemeriksaan;

            $data['mcu_data'] = [
                'bmi' => $request->bmi,
                'gangguan_motorik' => $request->gangguan_motorik,
                'disabilitas' => $request->disabilitas,
                'keterangan_lainnya' => $request->keterangan_lainnya,
            ];
        } elseif ($surat->tipe_berkas === 'Kesehatan TKHI') {
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
        } elseif ($surat->tipe_berkas === 'Resume MCU') {
            $data['no_lab'] = $request->resmcu_no_lab;
            $data['perusahaan'] = $request->resmcu_perusahaan;
            $data['tinggi_badan'] = $request->resmcu_tb;
            $data['berat_badan'] = $request->resmcu_bb;
            $data['tensi'] = ($request->resmcu_systolic && $request->resmcu_diastolic) ? $request->resmcu_systolic . '/' . $request->resmcu_diastolic : null;
            $data['nadi'] = $request->resmcu_hr;
            $data['respirasi'] = $request->resmcu_rr;
            $data['buta_warna'] = $request->resmcu_buta_warna ?? 'Tidak';
            $data['hasil_pemeriksaan'] = $request->resmcu_kesimpulan_fisik ?? 'SEHAT UNTUK BEKERJA';
            $data['saran'] = $request->resmcu_rekomendasi ?? '-';

            $mcuData = [];
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'resmcu_') === 0) {
                    $mcuData[str_replace('resmcu_', '', $key)] = $value;
                }
            }
            $data['mcu_data'] = $mcuData;
        } elseif (str_contains($surat->tipe_berkas, 'Paru')) {
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
