@php
    $getVal = function ($key, $default = '') use ($surat) {
        return $surat->mcu_data[$key] ?? $default;
    };
    $check = function ($key) use ($getVal) {
        $val = $getVal($key);
        return ($val == 'Ya' || $val == 'Ada' || $val == 'Positif') ? '[X]' : '[  ]';
    };
    $checkNo = function ($key) use ($getVal) {
        $val = $getVal($key);
        return ($val == 'Tidak' || $val == 'Normal' || $val == 'Negatif') ? '[X]' : '[  ]';
    };

    $bmi = $surat->tinggi_badan > 0 ? number_format($surat->berat_badan / (($surat->tinggi_badan / 100) ** 2), 1) : '-';

    $is_positif_napza = false;
    foreach (['morphine', 'canabinoid', 'amphetamine', 'metamfetamin', 'cocaine', 'benzodiazepine'] as $k) {
        if (($surat->mcu_data['napza_' . $k] ?? '') == 'Positif') {
            $is_positif_napza = true;
            break;
        }
    }

    // Gunakan double backslash untuk semua tag RTF di dalam string PHP
    $sigBlock = "
        \\trowd\\trgaph108\\trleft4000\\cellx9500
        \\pard\\intbl\\ql Sragen, " . $tanggal_cetak . "\\par Dokter Pemeriksa :\\cell\\row
        \\trowd\\trgaph108\\trleft4000\\cellx9500
        \\pard\\intbl\\ql \\par\\par\\par \\b ( " . $surat->dokter->nama_dokter . " )\\b0\\par NIP. " . ($surat->dokter->nip ?? '-') . "\\cell\\row
        ";
@endphp

{{-- HALAMAN 1: DATA PASIEN & ANAMNESIS --}}
{{-- Jangan pakai judul lagi, sudah ada di main.blade.php --}}
\trowd\trgaph108\trleft0\cellx2500\cellx5500\cellx7500\cellx9500
\pard\intbl\ql Nama\cell : \b {!! $surat->pendaftar->nama_lengkap !!}\b0\cell Tempat Periksa\cell : RSUD dr.
Soeratno\cell\row
\trowd\trgaph108\trleft0\cellx2500\cellx5500\cellx7500\cellx9500
\pard\intbl\ql NIK / No. KTP\cell : {!! $surat->pendaftar->nik ?? $getVal('nik', '-') !!}\cell Tgl Periksa\cell :
{!! $tanggal_cetak !!}\cell\row
\trowd\trgaph108\trleft0\cellx2500\cellx5500\cellx7500\cellx9500
\pard\intbl\ql Jenis Kelamin\cell : {!! $surat->pendaftar->jenis_kelamin !!}\cell Dokter Pemeriksa\cell :
{!! $surat->dokter->nama_dokter !!}\cell\row
\trowd\trgaph108\trleft0\cellx2500\cellx5500\cellx7500\cellx9500
\pard\intbl\ql TTL\cell : {!! $surat->pendaftar->tempat_lahir !!}, {!! $tanggal_lahir !!}\cell NIP/NRP\cell :
{!! $surat->dokter->nip ?? '-' !!}\cell\row
\trowd\trgaph108\trleft0\cellx2500\cellx5500\cellx7500\cellx9500
\pard\intbl\ql Umur / HP\cell : {!! $umur !!} Thn / {!! $surat->pendaftar->no_hp !!}\cell Pekerjaan\cell :
{!! $surat->pekerjaan !!}\cell\row
\pard\par

\b I. ANAMNESIS (RIWAYAT KESEHATAN)\b0\par
\pard\li360 Keluhan Saat Ini : {!! $getVal('keluhan_saat_ini', '-') !!}\par\par
\b 1. Riwayat Kesehatan Sekarang :\b0\par
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 1. Hipertensi \cell {!! $check('riwayat_skrng_hipertensi') !!} Ya
{!! $checkNo('riwayat_skrng_hipertensi') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 2. Diabetes Mellitus \cell {!! $check('riwayat_skrng_diabetes-mellitus') !!} Ya
{!! $checkNo('riwayat_skrng_diabetes-mellitus') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 3. Gangguan Jiwa \cell {!! $check('riwayat_skrng_gangguan-jiwa') !!} Ya
{!! $checkNo('riwayat_skrng_gangguan-jiwa') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 4. HIV/AIDS \cell {!! $check('riwayat_skrng_hivaids') !!} Ya {!! $checkNo('riwayat_skrng_hivaids') !!}
Tidak\cell\row
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 5. Kanker/Keganasan \cell {!! $check('riwayat_skrng_kanker-keganasan') !!} Ya
{!! $checkNo('riwayat_skrng_kanker-keganasan') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 6. Penyakit Hati \cell {!! $check('riwayat_skrng_penyakit-hati') !!} Ya
{!! $checkNo('riwayat_skrng_penyakit-hati') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 7. Penyakit Alergi \cell {!! $check('riwayat_skrng_penyakit-alergi') !!} Ya
{!! $checkNo('riwayat_skrng_penyakit-alergi') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 8. Jantung \cell {!! $check('riwayat_skrng_jantung') !!} Ya {!! $checkNo('riwayat_skrng_jantung') !!}
Tidak\cell\row
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 9. Gagal Ginjal \cell {!! $check('riwayat_skrng_ginjal') !!} Ya {!! $checkNo('riwayat_skrng_ginjal') !!}
Tidak\cell\row
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 10. Lainnya : {!! $getVal('anamnesis_lainnya', '-') !!}\cell\cell\row

\par\b 2. Riwayat Penyakit Dahulu :\b0\par
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 1. TB Paru \cell {!! $check('riwayat_dahulu_tuberkulosis') !!} Ya
{!! $checkNo('riwayat_dahulu_tuberkulosis') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 2. Covid-19 \cell {!! $check('riwayat_dahulu_covid-19') !!} Ya
{!! $checkNo('riwayat_dahulu_covid-19') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 3. Pernah Operasi \cell {!! $check('riwayat_dahulu_operasi') !!} Ya
{!! $checkNo('riwayat_dahulu_operasi') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 4. Lainnya : {!! $getVal('riwayat_dahulu_lainnya', '-') !!}\cell\cell\row

\par\b 3. Riwayat Penyakit Keluarga :\b0\par
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 1. Hipertensi \cell {!! $check('riwayat_keluarga_hipertensi') !!} Ya
{!! $checkNo('riwayat_keluarga_hipertensi') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 2. Penyakit Jantung \cell {!! $check('riwayat_keluarga_jantung') !!} Ya
{!! $checkNo('riwayat_keluarga_jantung') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 3. Gangguan Jiwa \cell {!! $check('riwayat_keluarga_gangguan-jiwa') !!} Ya
{!! $checkNo('riwayat_keluarga_gangguan-jiwa') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 4. Penyakit Alergi \cell {!! $check('riwayat_keluarga_penyakit-alergi') !!} Ya
{!! $checkNo('riwayat_keluarga_penyakit-alergi') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 5. Diabetes Mellitus \cell {!! $check('riwayat_keluarga_diabetes-melitus') !!} Ya
{!! $checkNo('riwayat_keluarga_diabetes-melitus') !!} Tidak\cell\row

\par\b 4. Riwayat Kebiasaan :\b0\par
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 1. Merokok \cell {!! $check('riwayat_sosial_merokok') !!} Ya {!! $checkNo('riwayat_sosial_merokok') !!}
Tidak\cell\row
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 2. Zat Berbahaya \cell {!! $check('riwayat_sosial_terpapar-zat-berbahaya') !!} Ya
{!! $checkNo('riwayat_sosial_terpapar-zat-berbahaya') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx5500\cellx9500
\pard\intbl\ql 3. Alkohol \cell {!! $check('riwayat_sosial_minum-alkohol') !!} Ya
{!! $checkNo('riwayat_sosial_minum-alkohol') !!} Tidak\cell\row
\par\page

{{-- HALAMAN 2: PEMERIKSAAN FISIK --}}
\b II. PEMERIKSAAN FISIK\b0\par
\b 1. Tanda Vital\b0\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx3000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4600\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7800\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl\qc Sistol/Diastol\cell Nadi (x/m)\cell Respirasi (x/m)\cell Suhu\cell LP\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx3000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4600\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7800\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl\qc {!! $surat->tensi !!}\cell {!! $surat->nadi !!}\cell {!! $surat->respirasi !!}\cell
{!! $surat->suhu !!}\cell {!! $getVal('lk_perut', '-') !!}\cell\row
\par
\b 2. Postur Tubuh\b0\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2350\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7050\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl\qc TB (cm)\cell BB (kg)\cell BMI (kg/m2)\cell Kategori BMI\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2350\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7050\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl\qc {!! $surat->tinggi_badan !!}\cell {!! $surat->berat_badan !!}\cell {!! $bmi !!}\cell
{!! $getVal('mcu_bmi_kat', '-') !!}\cell\row
\par
\b 3. Inspeksi dan Palpasi\b0\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx3600\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4800\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl\ql Bagian Tubuh\cell\qc Tid\cell\qc Ada\cell Keterangan\cell\row
@foreach(['Kulit', 'Kepala', 'Mata', 'Telinga', 'Hidung', 'Mulut-dan-Tenggorokan', 'Leher-dan-Getah-Bening'] as $p)
    \trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx3600\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4800\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
    \pard\intbl\ql {!! str_replace('-', ' ', $p) !!}\cell\qc
    {!! $getVal('fisik_' . Str::lower($p)) == 'Tidak' ? 'X' : '' !!}\cell\qc
    {!! $getVal('fisik_' . Str::lower($p)) == 'Ada' ? 'X' : '' !!}\cell
    {!! $getVal('ket_fisik_' . Str::lower($p), '-') !!}\cell\row
@endforeach
\par
\b 4. Pemeriksaan Organ Interna dan Ekstremitas\b0\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx3600\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4800\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl\ql Dada / Jantung / Paru\cell\qc {!! $checkNo('fisik_dada_dada') !!}\cell\qc
{!! $check('fisik_dada_dada') !!}\cell {!! $getVal('fisik_dada_jantung', '-') !!}\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx3600\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4800\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl\ql Perut / Abdomen\cell\qc {!! $checkNo('fisik_perut') !!}\cell\qc {!! $check('fisik_perut') !!}\cell
{!! $getVal('ket_fisik_perut', '-') !!}\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx3600\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4800\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl\ql Ekstremitas Atas/Bawah\cell\qc\cell\qc\cell T :
{!! $getVal('ekst_tangan_kanan', 5) !!}/{!! $getVal('ekst_tangan_kiri', 5) !!} , K :
{!! $getVal('ekst_kaki_kanan', 5) !!}/{!! $getVal('ekst_kaki_kiri', 5) !!}\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx3600\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4800\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl\ql Rectum / Genital\cell\qc {!! $checkNo('fisik_uro_rectum') !!}\cell\qc
{!! $check('fisik_uro_rectum') !!}\cell {!! $getVal('fisik_uro_urogenital', '-') !!}\cell\row
\par\page

{{-- HALAMAN 3: LABORATORIUM --}}
\b III. LABORATORIUM & PENUNJANG\b0\par
\b 1. Laboratorium Darah Lengkap\b0\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl\ql Hemoglobin\cell\qc {!! $getVal('lab_hb') !!}\cell 13-16 g/dL\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl\ql Lekosit\cell\qc {!! $getVal('lab_lekosit') !!}\cell 5.000-10.000 /uL\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl\ql Trombosit\cell\qc {!! $getVal('lab_trombosit') !!}\cell 150.000-400.000 /uL\cell\row
\par
\b 2. Laboratorium Kimia Darah\b0\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl\ql Gula Darah Puasa (GDP)\cell\qc {!! $getVal('lab_gdp') !!}\cell < 100 mg/dL\cell\row
    \trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
    \pard\intbl\ql Gula Darah 2 Jam PP\cell\qc {!! $getVal('lab_gd2pp') !!}\cell < 140 mg/dL\cell\row
        \trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
        \pard\intbl\ql SGOT / SGPT\cell\qc {!! $getVal('lab_sgot') !!} / {!! $getVal('lab_sgpt') !!}\cell L:<37, P:<31
        U/L\cell\row \par\page {{-- HALAMAN 4: URINE, RADIOLOGI & EKG --}} \b 3. Laboratorium Urine / Tes
        Kehamilan\b0\par
        \trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
        \pard\intbl\ql Warna / Kejernihan\cell\qc {!! $getVal('lab_urine_warna') !!} / {!! $getVal('lab_urine_kejernihan') !!}\cell Kuning / Jernih\cell\row
        \trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
        \pard\intbl\ql Protein / Glukosa\cell\qc {!! $getVal('lab_urine_micro_protein_urin') !!} / {!! $getVal('lab_urine_micro_glukosa_urin') !!}\cell Neg / Neg\cell\row \par \b 4. Radiologi & EKG\b0\par
        \pard\li360 Radiologi Thorax : \b {!! $getVal('rad_hasil', 'Normal') !!}\b0\par \pard\li360 EKG (Rekam Jantung)
        : \b {!! $getVal('ekg_hasil', 'Normal') !!}\b0\par \par \qc\b KESIMPULAN HASIL MEDICAL CHECK-UP\b0\fs24\par
        \qc\b {!! strtoupper($surat->hasil_pemeriksaan) !!}\b0\fs20\par {!! $sigBlock !!} \par\page {{-- HALAMAN 5:
        SCREENING NAPZA --}} \b IV. PEMERIKSAAN NARKOTIKA (NAPZA)\b0\par
        \trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx1200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
        \pard\intbl\qc No\cell Parameter Pemeriksaan\cell Hasil\cell\row @php $nx = 1; @endphp @foreach(['morphine' => 'Morphine / Opiat', 'canabinoid' => 'THC / Ganja / Canabinoid', 'amphetamine' => 'Amphetamine', 'metamfetamin' => 'Methamphetamine'] as $k => $l)
            \trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx1200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
        \pard\intbl\qc {!! $nx++ !!}\cell {!! $l !!}\cell\qc {!! strtoupper($getVal('napza_' . $k, 'Negatif')) !!}\cell\row @endforeach \par \b KESIMPULAN NAPZA : \ul {!! $is_positif_napza ? 'TERINDIKASI POSITIF' : 'NEGATIF' !!}\ulnone\b0\par {!! $sigBlock !!} \par\page {{-- HALAMAN 6: PEMERIKSAAN JIWA --}} \b V. PEMERIKSAAN
        JIWA SEDERHANA\b0\par
        \trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx1200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7400\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
        \pard\intbl\qc No\cell Parameter Pemeriksaan Jiwa\cell Hasil\cell\row @php $jx = 1; @endphp @foreach([
                'jiwa_1' => 'Penampilan umum (sikap, perilaku, psikomotor)',
                'jiwa_2' => 'Mood / Afek (suasana perasaan)',
                'jiwa_3' => 'Pembicaraan (spontan, jelas, relevan)',
                'jiwa_4' => 'Proses Pikir (relevan, waham, dll)',
                'jiwa_5' => 'Persepsi (halusinasi visual / auditorik)',
                'jiwa_8' => 'Daya Nilai Realitas',
                'jiwa_9' => 'Fungsi Kognitif / Konsentrasi'
            ] as $k => $l)
            \trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx1200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7400\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
            \pard\intbl\qc {!! $jx++ !!}\cell {!! $l !!}\cell\qc {!! strtoupper($getVal($k, 'Normal')) !!}\cell\row
        @endforeach \par \qc\b KESIMPULAN PEMERIKSAAN KESEHATAN JIWA\b0\par
        \trowd\trgaph108\trleft1200\clbrdrt\brdrs\brdrw20\clbrdrl\brdrs\brdrw20\clbrdrb\brdrs\brdrw20\clbrdrr\brdrs\brdrw20\cellx8200
        \pard\intbl\qc\b {!! strtoupper($getVal('jiwa_kesimpulan', 'NORMAL / DIREKOMENDASIKAN')) !!}\b0\cell\row \par