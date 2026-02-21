@php
    $getVal = function ($key, $default = '-') use ($surat) {
        return $surat->mcu_data[$key] ?? $default;
    };
    
    // Simbol centang menggunakan font Wingdings (\f3 yang sudah didefinisikan di main.blade.php)
    $checkmark = "{\\f3\\'fc}"; 

    $isYa = function ($key) use ($getVal) {
        $v = $getVal($key);
        return ($v == 'Ya' || $v == 'Ada' || $v == 'Positif');
    };
    $isTidak = function ($key) use ($getVal) {
        $v = $getVal($key);
        return ($v == 'Tidak' || $v == 'Normal' || $v == 'Negatif');
    };
    
    $check = function ($key) use ($isYa, $checkmark) {
        return $isYa($key) ? "[ $checkmark ]" : "[   ]";
    };
    $checkNo = function ($key) use ($isTidak, $checkmark) {
        return $isTidak($key) ? "[ $checkmark ]" : "[   ]";
    };
    
    // Shorthand untuk line spacing 1.15
    $sp = "\\sl276\\slmult1";
    
    $bmi = $surat->tinggi_badan > 0 ? number_format($surat->berat_badan / (($surat->tinggi_badan / 100) ** 2), 1) : '-';

    $is_positif_napza = false;
    foreach (['morphine', 'canabinoid', 'amphetamine', 'metamfetamin', 'cocaine', 'benzodiazepine'] as $k) {
        if (($surat->mcu_data['napza_' . $k] ?? '') == 'Positif') {
            $is_positif_napza = true;
            break;
        }
    }
@endphp

{{-- HALAMAN 1: DATA PASIEN & ANAMNESIS --}}
\trowd\trgaph108\trleft0\cellx1800\cellx5500\cellx7400\cellx9500
\pard\intbl{!! $sp !!}\ql Nama\cell : \b {!! $surat->pendaftar->nama_lengkap !!}\b0\cell Tempat Periksa\cell : RSUD dr. Soeratno\cell\row
\trowd\trgaph108\trleft0\cellx1800\cellx5500\cellx7400\cellx9500
\pard\intbl{!! $sp !!}\ql NIK / No. KTP\cell : {!! $surat->pendaftar->nik ?? $getVal('nik', '-') !!}\cell Tgl Periksa\cell : {!! $tanggal_cetak !!}\cell\row
\trowd\trgaph108\trleft0\cellx1800\cellx5500\cellx7400\cellx9500
\pard\intbl{!! $sp !!}\ql Jenis Kelamin\cell : {!! $surat->pendaftar->jenis_kelamin !!}\cell Dokter Pemeriksa\cell : {!! $surat->dokter->nama_dokter !!}\cell\row
\trowd\trgaph108\trleft0\cellx1800\cellx5500\cellx7400\cellx9500
\pard\intbl{!! $sp !!}\ql TTL\cell : {!! $surat->pendaftar->tempat_lahir !!}, {!! $tanggal_lahir !!}\cell NIP/NRP\cell : {!! $surat->dokter->nip ?? '-' !!}\cell\row
\trowd\trgaph108\trleft0\cellx1800\cellx5500\cellx7400\cellx9500
\pard\intbl{!! $sp !!}\ql Umur / HP\cell : {!! $umur !!} Thn / {!! $surat->pendaftar->no_hp !!}\cell Pekerjaan\cell : {!! $surat->pekerjaan !!}\cell\row
\pard\ql{!! $sp !!}\par

\pard\ql{!! $sp !!}\b I. ANAMNESIS (RIWAYAT KESEHATAN)\b0\par
\pard\ql{!! $sp !!}\li360 Keluhan Saat Ini : {!! $getVal('keluhan_saat_ini', '-') !!}\par\par
\pard\ql{!! $sp !!}\b 1. Riwayat Kesehatan Sekarang :\b0\par
@php
    $anamnesis_items = [
        'riwayat_skrng_hipertensi' => '1. Hipertensi',
        'riwayat_skrng_diabetes-mellitus' => '2. Diabetes Mellitus',
        'riwayat_skrng_gangguan-jiwa' => '3. Gangguan Jiwa',
        'riwayat_skrng_hivaids' => '4. HIV/AIDS',
        'riwayat_skrng_kanker-keganasan' => '5. Kanker / Keganasan',
        'riwayat_skrng_penyakit-hati' => '6. Penyakit Hati',
        'riwayat_skrng_penyakit-alergi' => '7. Penyakit Alergi',
        'riwayat_skrng_jantung' => '8. Penyakit Jantung',
        'riwayat_skrng_ginjal' => '9. Gagal Ginjal'
    ];
@endphp
@foreach($anamnesis_items as $key => $label)
\trowd\trgaph108\trleft360\cellx6000\cellx8000\cellx9500
\pard\intbl{!! $sp !!}\ql {!! $label !!}\cell\qr {!! $check($key) !!} Ya\cell\ql {!! $checkNo($key) !!} Tidak\cell\row
@endforeach
\trowd\trgaph108\trleft360\cellx3000\cellx9500
\pard\intbl{!! $sp !!}\ql 10. Lainnya :\cell {!! $getVal('anamnesis_lainnya', '-') !!}\cell\row
\pard\ql{!! $sp !!}\par

\pard\ql{!! $sp !!}\b 2. Riwayat Penyakit Dahulu :\b0\par
@foreach([
    'riwayat_dahulu_tuberkulosis' => '1. TB Paru',
    'riwayat_dahulu_covid-19' => '2. Pernah Covid-19',
    'riwayat_dahulu_operasi' => '3. Pernah Operasi'
] as $key => $label)
\trowd\trgaph108\trleft360\cellx6000\cellx8000\cellx9500
\pard\intbl{!! $sp !!}\ql {!! $label !!}\cell\qr {!! $check($key) !!} Ya\cell\ql {!! $checkNo($key) !!} Tidak\cell\row
@endforeach
\trowd\trgaph108\trleft360\cellx3000\cellx9500
\pard\intbl{!! $sp !!}\ql 4. Lainnya :\cell {!! $getVal('riwayat_dahulu_lainnya', '-') !!}\cell\row
\pard\ql{!! $sp !!}\par

\pard\ql{!! $sp !!}\b 3. Riwayat Penyakit Keluarga :\b0\par
@foreach([
    'riwayat_keluarga_hipertensi' => '1. Hipertensi',
    'riwayat_keluarga_jantung' => '2. Penyakit Jantung',
    'riwayat_keluarga_gangguan-jiwa' => '3. Gangguan Jiwa',
    'riwayat_keluarga_penyakit-alergi' => '4. Penyakit Alergi',
    'riwayat_keluarga_diabetes-melitus' => '5. Diabetes Mellitus'
] as $key => $label)
\trowd\trgaph108\trleft360\cellx6000\cellx8000\cellx9500
\pard\intbl{!! $sp !!}\ql {!! $label !!}\cell\qr {!! $check($key) !!} Ya\cell\ql {!! $checkNo($key) !!} Tidak\cell\row
@endforeach
\pard\ql{!! $sp !!}\par

\pard\ql{!! $sp !!}\b 4. Riwayat Kebiasaan :\b0\par
@foreach([
    'riwayat_sosial_merokok' => '1. Merokok',
    'riwayat_sosial_terpapar-zat-berbahaya' => '2. Zat Berbahaya',
    'riwayat_sosial_minum-alkohol' => '3. Alkohol'
] as $key => $label)
\trowd\trgaph108\trleft360\cellx6000\cellx8000\cellx9500
\pard\intbl{!! $sp !!}\ql {!! $label !!}\cell\qr {!! $check($key) !!} Ya\cell\ql {!! $checkNo($key) !!} Tidak\cell\row
@endforeach
\pard\ql{!! $sp !!}\page

{{-- HALAMAN 2: PEMERIKSAAN FISIK --}}
\pard\ql{!! $sp !!}\b II. PEMERIKSAAN FISIK\b0\par
\par
\pard\ql{!! $sp !!}\b 1. Tanda Vital\b0\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2400\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl{!! $sp !!}\qc Sistol / Diastol\cell Nadi (x/m)\cell Respirasi (x/m)\cell Suhu\cell LP (cm)\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2400\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl{!! $sp !!}\qc {!! $surat->tensi !!}\cell {!! $surat->nadi !!}\cell {!! $surat->respirasi !!}\cell {!! $surat->suhu !!}\cell {!! $getVal('lk_perut', '-') !!}\cell\row
\pard\ql{!! $sp !!}\par

\pard\ql{!! $sp !!}\b 2. Postur Tubuh\b0\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2400\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4800\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl{!! $sp !!}\qc TB (cm)\cell BB (kg)\cell BMI (kg/m2)\cell Kategori BMI\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2400\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4800\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl{!! $sp !!}\qc {!! $surat->tinggi_badan !!}\cell {!! $surat->berat_badan !!}\cell {!! $bmi !!}\cell {!! $getVal('mcu_bmi_kat', '-') !!}\cell\row
\pard\ql{!! $sp !!}\par

\pard\ql{!! $sp !!}\b 3. Inspeksi dan Palpasi\b0\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl{!! $sp !!}\ql Bagian Tubuh\cell\qc Tid\cell\qc Ada\cell Keterangan\cell\row
@foreach(['Kulit', 'Kepala', 'Mata', 'Telinga', 'Hidung', 'Mulut-dan-Tenggorokan', 'Leher-dan-Getah-Bening'] as $p)
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl{!! $sp !!}\ql {!! str_replace('-', ' ', $p) !!}\cell\qc {!! $getVal('fisik_'.Str::lower($p)) == 'Tidak' ? $checkmark : '' !!}\cell\qc {!! $getVal('fisik_'.Str::lower($p)) == 'Ada' ? $checkmark : '' !!}\cell {!! $getVal('ket_fisik_'.Str::lower($p), '-') !!}\cell\row
@endforeach
\pard\ql{!! $sp !!}\par

\pard\ql{!! $sp !!}\b 4. Pemeriksaan Organ Interna dan Ekstremitas\b0\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl{!! $sp !!}\ql Organ / Ekstremitas\cell\qc Tid\cell\qc Ada\cell Keterangan\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl{!! $sp !!}\ql Dada (Paru / Jantung)\cell\qc {!! $isTidak('fisik_dada_dada') ? $checkmark : ' ' !!}\cell\qc {!! $isYa('fisik_dada_dada') ? $checkmark : ' ' !!}\cell {!! $getVal('fisik_dada_jantung', '-') !!}\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl{!! $sp !!}\ql Perut / Abdomen\cell\qc {!! $isTidak('fisik_perut') ? $checkmark : ' ' !!}\cell\qc {!! $isYa('fisik_perut') ? $checkmark : ' ' !!}\cell {!! $getVal('ket_fisik_perut', '-') !!}\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl{!! $sp !!}\ql Ekstremitas\cell\qc\cell\qc\cell T : {!! $getVal('ekst_tangan_kanan',5) !!}/{!! $getVal('ekst_tangan_kiri',5) !!} , K : {!! $getVal('ekst_kaki_kanan',5) !!}/{!! $getVal('ekst_kaki_kiri',5) !!}\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl{!! $sp !!}\ql Rectum / Genitalia\cell\qc {!! $isTidak('fisik_uro_rectum') ? $checkmark : ' ' !!}\cell\qc {!! $isYa('fisik_uro_rectum') ? $checkmark : ' ' !!}\cell {!! $getVal('fisik_uro_urogenital', '-') !!}\cell\row
\pard\ql{!! $sp !!}\page

{{-- HALAMAN 3: PEMERIKSAAN PENUNJANG --}}
\pard\ql{!! $sp !!}\b III. Pemeriksaan Penunjang\b0\par
\pard\ql{!! $sp !!}\b 1. Laboratorium\b0\par
@php
    // Border shorthand
    $b = "\\clbrdrt\\brdrs\\brdrw10\\clbrdrl\\brdrs\\brdrw10\\clbrdrb\\brdrs\\brdrw10\\clbrdrr\\brdrs\\brdrw10";
    // Definisi kolom: Jenis | Komponen | Hasil | Nilai Normal
    $labRow = "\\trowd\\trgaph108\\trleft360{$b}\\cellx2400{$b}\\cellx5200{$b}\\cellx7000{$b}\\cellx9400";
@endphp
{{-- Header tabel --}}
{!! $labRow !!}
\pard\intbl{!! $sp !!}\qc\b Jenis Pemeriksaan\b0\cell\qc\b Komponen\b0\cell\qc\b Hasil\b0\cell\qc\b Nilai Normal\b0\cell\row
{{-- DARAH LENGKAP --}}
{!! $labRow !!}
\pard\intbl{!! $sp !!}\ql\b Darah Lengkap\b0\cell Hemoglobin\cell\qc {!! $getVal('lab_hb') !!}\cell L:13-16; P:12-14 g/dL\cell\row
@foreach([
    'lab_lekosit' => ['Lekosit', '5.000-10.000 /uL'],
    'lab_trombosit' => ['Trombosit', '150.000-400.000 /uL'],
    'lab_eritrosit' => ['Eritrosit', 'L:4,5-5,5; P:4,0-5,0 jt/uL'],
    'lab_hematokrit' => ['Hematokrit', 'L:45-55%; P:40-50%']
] as $dKey => $dVal)
{!! $labRow !!}
\pard\intbl{!! $sp !!}\ql \cell {!! $dVal[0] !!}\cell\qc {!! $getVal($dKey) !!}\cell {!! $dVal[1] !!}\cell\row
@endforeach
{{-- Hitung Jenis --}}
{!! $labRow !!}
\pard\intbl{!! $sp !!}\ql \cell\b Hitung jenis:\b0\cell \cell \cell\row
@foreach([
    'lab_hj_basofil' => ['Basofil', '0-1%'],
    'lab_hj_eosinophil' => ['Eosinophil', '1-3%'],
    'lab_hj_monosit' => ['Monosit', '2-8%'],
    'lab_hj_limfosit' => ['Limfosit', '20-40%'],
    'lab_hj_netrofil' => ['Netrofil', '50-75%'],
    'lab_hj_led' => ['LED', 'L:<10mm/j; P:<15mm/j']
] as $hjKey => $hjVal)
{!! $labRow !!}
\pard\intbl{!! $sp !!}\ql \cell {!! $hjVal[0] !!}\cell\qc {!! $getVal($hjKey) !!}\cell {!! $hjVal[1] !!}\cell\row
@endforeach
{{-- Golongan Darah --}}
{!! $labRow !!}
\pard\intbl{!! $sp !!}\ql\b Gol. Darah & Rhesus\b0\cell \cell\qc {!! $getVal('lab_golda') !!}\cell \cell\row
{{-- KIMIA DARAH --}}
{!! $labRow !!}
\pard\intbl{!! $sp !!}\ql\b Kimia Darah\b0\cell GDP\cell\qc {!! $getVal('lab_gdp') !!}\cell 70-100 mg/dL\cell\row
@foreach([
    'lab_gd2pp' => ['GD2PP', '< 140 mg/dL'],
    'lab_hba1c' => ['HbA1c', '< 5,7%'],
    'lab_cholesterol' => ['Cholesterol', '150-200 mg/dL'],
    'lab_trigliserida' => ['Trigliserida', '120-190 mg/dL'],
    'lab_sgot' => ['SGOT', 'L:<25; P:<21'],
    'lab_sgpt' => ['SGPT', 'L:<30; P:<23'],
    'lab_ureum' => ['Ureum', '20-40 mg/dL'],
    'lab_kreatinin' => ['Kreatinin', '0,5-1,5 mg/dL'],
    'lab_hdl' => ['HDL', '>40'],
    'lab_ldl' => ['LDL', '<100']
] as $kKey => $kVal)
{!! $labRow !!}
\pard\intbl{!! $sp !!}\ql \cell {!! $kVal[0] !!}\cell\qc {!! $getVal($kKey) !!}\cell {!! $kVal[1] !!}\cell\row
@endforeach
{{-- URINE LENGKAP --}}
{!! $labRow !!}
\pard\intbl{!! $sp !!}\ql\b Urine Lengkap\b0\cell Warna\cell\qc {!! $getVal('lab_urine_warna') !!}\cell Kuning muda-tua\cell\row
@foreach([
    'lab_urine_kejernihan' => ['Kejernihan', 'Jernih'],
    'lab_urine_micro_protein_urin' => ['Protein Urin', 'Negatif'],
    'lab_urine_micro_glukosa_urin' => ['Glukosa Urin', 'Negatif']
] as $uKey => $uVal)
{!! $labRow !!}
\pard\intbl{!! $sp !!}\ql \cell {!! $uVal[0] !!}\cell\qc {!! $getVal($uKey) !!}\cell {!! $uVal[1] !!}\cell\row
@endforeach
{{-- TES KEHAMILAN --}}
{!! $labRow !!}
\pard\intbl{!! $sp !!}\ql\b Tes Kehamilan (WUS)\b0\cell \cell\qc {!! $getVal('lab_tes_kehamilan', '-') !!}\cell Negatif\cell\row
\pard\ql{!! $sp !!}\par

@php
    $radCheck = function ($key) use ($getVal, $checkmark) {
        return ($getVal('rad_' . $key, '') == 'Ya') ? "[ $checkmark ]" : "[   ]";
    };
    $ekgCheck = function ($key) use ($getVal, $checkmark) {
        return ($getVal('ekg_' . $key, '') == 'Ya') ? "[ $checkmark ]" : "[   ]";
    };
@endphp
\pard\ql{!! $sp !!}\b 2. Radiologi Thoraks PA\b0\par
\pard\ql{!! $sp !!}\li360 Hasil Radiologi : {!! $getVal('rad_hasil', 'Tidak ada kelainan') !!}\par
\pard\ql{!! $sp !!}\li360 Keterangan:\par
\trowd\trgaph108\trleft360\cellx3600\cellx6500\cellx9400
\pard\intbl{!! $sp !!}\ql {!! $radCheck('kesan-normal') !!} Kesan Normal\cell {!! $radCheck('tb-kesan-fibrosis') !!} TB Kesan Fibrosis\cell {!! $radCheck('kesan-tumor-ca') !!} Kesan Tumor/Ca\cell\row
\trowd\trgaph108\trleft360\cellx3600\cellx6500\cellx9400
\pard\intbl{!! $sp !!}\ql {!! $radCheck('kardiomegali') !!} Kardiomegali\cell {!! $radCheck('kesan-ppok') !!} Kesan PPOK\cell \cell\row
\pard\ql{!! $sp !!}\li360\b Lainnya\b0  : .....................................................................\par
\par

\pard\ql{!! $sp !!}\b 3. EKG\b0\par
\pard\ql{!! $sp !!}\li360 Hasil EKG : {!! $getVal('ekg_hasil', 'Tidak ada kelainan') !!}\par
\pard\ql{!! $sp !!}\li360 Keterangan:\par
\trowd\trgaph108\trleft360\cellx3600\cellx6500\cellx9400
\pard\intbl{!! $sp !!}\ql {!! $ekgCheck('iskemik') !!} Iskemik\cell {!! $ekgCheck('infark') !!} Infark\cell {!! $ekgCheck('aritmia') !!} Aritmia\cell\row
\pard\ql{!! $sp !!}\par

\pard\qc{!! $sp !!}\b KESIMPULAN HASIL MCU\b0\par
\trowd\trgaph108\trleft1500\clbrdrt\brdrs\brdrw15\clbrdrl\brdrs\brdrw15\clbrdrb\brdrs\brdrw15\clbrdrr\brdrs\brdrw15\cellx8000
\pard\intbl{!! $sp !!}\qc\par\b\fs24 {!! $surat->hasil_pemeriksaan !!}\b0\fs20\par\cell\row
\pard\ql{!! $sp !!}\par
\trowd\trgaph108\trleft4000\cellx9500
\pard\intbl{!! $sp !!}\ql Tanggal : {!! $tanggal_cetak !!}\par Tanda tangan,\par\par\par\par Dokter Pemeriksa :\par\b ( {!! $surat->dokter->nama_dokter !!} )\b0\par NIP. {!! $surat->dokter->nip ?? '-' !!}\cell\row
\pard\ql{!! $sp !!}\page

{{-- HALAMAN 5: SCREENING NAPZA --}}
\pard\ql{!! $sp !!}\b IV. PEMERIKSAAN NARKOTIKA (NAPZA)\b0\par
\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx1200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl{!! $sp !!}\qc No\cell Parameter Pemeriksaan\cell Hasil\cell\row
@php $nx=1; @endphp
@foreach(['morphine' => 'Morphine / Opiat', 'canabinoid' => 'THC / Ganja / Canabinoid', 'amphetamine' => 'Amphetamine', 'metamfetamin' => 'Methamphetamine'] as $k => $l)
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx1200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl{!! $sp !!}\qc {!! $nx++ !!}\cell {!! $l !!}\cell\qc {!! strtoupper($getVal('napza_'.$k, 'Negatif')) !!}\cell\row
@endforeach
\pard\ql{!! $sp !!}\par

\pard\qc{!! $sp !!}\b KESIMPULAN NAPZA : {!! $is_positif_napza ? 'TERINDIKASI POSITIF' : 'NEGATIF' !!}\b0\par
\par
\trowd\trgaph108\trleft4000\cellx9500
\pard\intbl{!! $sp !!}\qc Sragen, {!! $tanggal_cetak !!}\par Dokter Pemeriksa :\par\par\par\par\b ( {!! $surat->dokter->nama_dokter !!} )\b0\par NIP. {!! $surat->dokter->nip ?? '-' !!}\cell\row
\pard\ql{!! $sp !!}\page

{{-- HALAMAN 6: PEMERIKSAAN JIWA --}}
\pard\ql{!! $sp !!}\b V. PEMERIKSAAN JIWA SEDERHANA\b0\par
\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx1200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7400\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl{!! $sp !!}\qc No\cell Parameter Pemeriksaan Jiwa\cell Hasil\cell\row
@php $jx=1; @endphp
@foreach([
    'jiwa_1' => 'Penampilan umum (sikap, perilaku, psikomotor)',
    'jiwa_2' => 'Mood / Afek (suasana perasaan)',
    'jiwa_3' => 'Pembicaraan (spontan, jelas, relevan)',
    'jiwa_4' => 'Proses Pikir (relevan, waham, dll)',
    'jiwa_5' => 'Persepsi (halusinasi visual / auditorik)',
    'jiwa_8' => 'Daya Nilai Realitas',
    'jiwa_9' => 'Fungsi Kognitif / Konsentrasi'
] as $k => $l)
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx1200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7400\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9400
\pard\intbl{!! $sp !!}\qc {!! $jx++ !!}\cell {!! $l !!}\cell\qc {!! strtoupper($getVal($k, 'Normal')) !!}\cell\row
@endforeach
\pard\ql{!! $sp !!}\par

\pard\qc{!! $sp !!}\b KESIMPULAN PEMERIKSAAN KESEHATAN JIWA\b0\par
\trowd\trgaph108\trleft1200\clbrdrt\brdrs\brdrw15\clbrdrl\brdrs\brdrw15\clbrdrb\brdrs\brdrw15\clbrdrr\brdrs\brdrw15\cellx8200
\pard\intbl{!! $sp !!}\qc\b {!! strtoupper($getVal('jiwa_kesimpulan', 'NORMAL / DIREKOMENDASIKAN')) !!}\b0\cell\row
\pard\ql{!! $sp !!}\par
\trowd\trgaph108\trleft-108\clvertalt\cellx5000\clvertalt\cellx10000
\pard\intbl{!! $sp !!}\qc Mengetahui\par Kepala Bidang Pelayanan RSUD dr. Soeratno\par Gemolong Kabupaten Sragen\cell
\pard\intbl{!! $sp !!}\qc Sragen, {!! $tanggal_cetak !!}\par Dokter Pemeriksa\cell\row
\trowd\trgaph108\trleft-108\clvertalt\cellx5000\clvertalt\cellx10000
\pard\intbl{!! $sp !!}\qc \par\par\par\par\par\b\ul {!! trim($m_nama) !!}\ulnone\b0\par NIP. {!! trim($m_nip) !!}\cell
\pard\intbl{!! $sp !!}\qc \par\par\par\par\par\b\ul {!! trim($surat->dokter->nama_dokter) !!}\ulnone\b0\par NIP. {!! $surat->dokter->nip ?? '-' !!}\cell\row
\pard\ql{!! $sp !!}\par