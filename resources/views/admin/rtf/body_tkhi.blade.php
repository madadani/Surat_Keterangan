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

    $sigBlock = "
\trowd\trgaph108\trleft5000\cellx10000
\pard\intbl\ql Sragen, " . $tanggal_cetak . "\par Dokter Pemeriksa :\cell\row
\trowd\trgaph108\trleft5000\cellx10000
\pard\intbl\ql \par\par\par \b ( " . $surat->dokter->nama_dokter . " )\b0\par NIP. " . ($surat->dokter->nip ?? '-') . "\cell\row
";
@endphp

{{-- HALAMAN 1: DATA PASIEN & ANAMNESIS --}}
\trowd\trgaph108\trleft0\cellx2500\cellx5000\cellx7500\cellx10000
\pard\intbl\ql Nama\cell : \b {!! $surat->pendaftar->nama_lengkap !!}\b0\cell Tempat Periksa\cell : RSUD dr. Soeratno\cell\row
\trowd\trgaph108\trleft0\cellx2500\cellx5000\cellx7500\cellx10000
\pard\intbl\ql No. KTP / NIK\cell : {!! $surat->pendaftar->nik ?? $getVal('nik', '-') !!}\cell Tgl Periksa\cell : {!! $tanggal_cetak !!}\cell\row
\trowd\trgaph108\trleft0\cellx2500\cellx5000\cellx7500\cellx10000
\pard\intbl\ql Jenis Kelamin\cell : {!! $surat->pendaftar->jenis_kelamin !!}\cell Dokter Pemeriksa\cell : {!! $surat->dokter->nama_dokter !!}\cell\row
\trowd\trgaph108\trleft0\cellx2500\cellx5000\cellx7500\cellx10000
\pard\intbl\ql TTL\cell : {!! $surat->pendaftar->tempat_lahir !!}, {!! $tanggal_lahir !!}\cell NIP/NRP\cell : {!! $surat->dokter->nip ?? '-' !!}\cell\row
\trowd\trgaph108\trleft0\cellx2500\cellx5000\cellx7500\cellx10000
\pard\intbl\ql Umur / HP\cell : {!! $umur !!} Thn / {!! $surat->pendaftar->no_hp !!}\cell Pekerjaan\cell : {!! $surat->pekerjaan !!}\cell\row
\pard\par

\b I. ANAMNESIS (RIWAYAT KESEHATAN)\b0\par
\pard\sl276\slmult1\ql\li360 Keluhan Saat Ini : {!! $getVal('keluhan_saat_ini', '-') !!}\par
\b 1. Riwayat Kesehatan Sekarang :\b0\par
\trowd\trgaph108\trleft360\cellx3500\cellx6500\cellx9500
\pard\intbl\ql 1. Hipertensi\cell {!! $check('riwayat_skrng_hipertensi') !!} Ya  {!! $checkNo('riwayat_skrng_hipertensi') !!} Tidak\cell 2. DM\cell {!! $check('riwayat_skrng_diabetes-mellitus') !!} Ya  {!! $checkNo('riwayat_skrng_diabetes-mellitus') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx3500\cellx6500\cellx9500
\pard\intbl\ql 3. Ggn Jiwa\cell {!! $check('riwayat_skrng_gangguan-jiwa') !!} Ya  {!! $checkNo('riwayat_skrng_gangguan-jiwa') !!} Tidak\cell 4. HIV/AIDS\cell {!! $check('riwayat_skrng_hivaids') !!} Ya  {!! $checkNo('riwayat_skrng_hivaids') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx3500\cellx6500\cellx9500
\pard\intbl\ql 5. Kanker\cell {!! $check('riwayat_skrng_kanker-keganasan') !!} Ya  {!! $checkNo('riwayat_skrng_kanker-keganasan') !!} Tidak\cell 6. Peny. Hati\cell {!! $check('riwayat_skrng_penyakit-hati') !!} Ya  {!! $checkNo('riwayat_skrng_penyakit-hati') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx3500\cellx6500\cellx9500
\pard\intbl\ql 7. Peny. Alergi\cell {!! $check('riwayat_skrng_penyakit-alergi') !!} Ya  {!! $checkNo('riwayat_skrng_penyakit-alergi') !!} Tidak\cell 8. Jantung\cell {!! $check('riwayat_skrng_jantung') !!} Ya  {!! $checkNo('riwayat_skrng_jantung') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx3500\cellx6500\cellx9500
\pard\intbl\ql 9. Gagal Ginjal\cell {!! $check('riwayat_skrng_ginjal') !!} Ya  {!! $checkNo('riwayat_skrng_ginjal') !!} Tidak\cell 10. Lainnya\cell {!! $getVal('anamnesis_lainnya', '-') !!}\cell\row

\b 2. Riwayat Penyakit Dahulu :\b0\par
\trowd\trgaph108\trleft360\cellx3500\cellx6500\cellx9500
\pard\intbl\ql 1. TB Paru\cell {!! $check('riwayat_dahulu_tuberkulosis') !!} Ya  {!! $checkNo('riwayat_dahulu_tuberkulosis') !!} Tidak\cell 2. Covid-19\cell {!! $check('riwayat_dahulu_covid-19') !!} Ya  {!! $checkNo('riwayat_dahulu_covid-19') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx3500\cellx6500\cellx9500
\pard\intbl\ql 3. Operasi\cell {!! $check('riwayat_dahulu_operasi') !!} Ya  {!! $checkNo('riwayat_dahulu_operasi') !!} Tidak\cell 4. Lainnya\cell {!! $getVal('riwayat_dahulu_lainnya', '-') !!}\cell\row

\b 3. Riwayat Penyakit Keluarga :\b0\par
\trowd\trgaph108\trleft360\cellx3500\cellx6500\cellx9500
\pard\intbl\ql 1. Hipertensi\cell {!! $check('riwayat_keluarga_hipertensi') !!} Ya  {!! $checkNo('riwayat_keluarga_hipertensi') !!} Tidak\cell 2. Jantung\cell {!! $check('riwayat_keluarga_jantung') !!} Ya  {!! $checkNo('riwayat_keluarga_jantung') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx3500\cellx6500\cellx9500
\pard\intbl\ql 3. Ggn Jiwa\cell {!! $check('riwayat_keluarga_gangguan-jiwa') !!} Ya  {!! $checkNo('riwayat_keluarga_gangguan-jiwa') !!} Tidak\cell 4. Alergi\cell {!! $check('riwayat_keluarga_penyakit-alergi') !!} Ya  {!! $checkNo('riwayat_keluarga_penyakit-alergi') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx3500\cellx6500\cellx9500
\pard\intbl\ql 5. Gagal Ginjal\cell {!! $check('riwayat_keluarga_gagal-ginjal') !!} Ya  {!! $checkNo('riwayat_keluarga_gagal-ginjal') !!} Tidak\cell 6. DM\cell {!! $check('riwayat_keluarga_diabetes-melitus') !!} Ya  {!! $checkNo('riwayat_keluarga_diabetes-melitus') !!} Tidak\cell\row

\b 4. Riwayat Sosial/Kebiasaan :\b0\par
\trowd\trgaph108\trleft360\cellx3500\cellx6500\cellx9500
\pard\intbl\ql 1. Merokok\cell {!! $check('riwayat_sosial_merokok') !!} Ya  {!! $checkNo('riwayat_sosial_merokok') !!} Tidak\cell 2. Zat Berbahaya\cell {!! $check('riwayat_sosial_terpapar-zat-berbahaya') !!} Ya  {!! $checkNo('riwayat_sosial_terpapar-zat-berbahaya') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx3500\cellx6500\cellx9500
\pard\intbl\ql 3. Alkohol\cell {!! $check('riwayat_sosial_minum-alkohol') !!} Ya  {!! $checkNo('riwayat_sosial_minum-alkohol') !!} Tidak\cell 4. Penyalahgunaan Obat\cell {!! $check('riwayat_sosial_obat') !!} Ya  {!! $checkNo('riwayat_sosial_obat') !!} Tidak\cell\row
\trowd\trgaph108\trleft360\cellx3500\cellx6500\cellx9500
\pard\intbl\ql 5. Minum Kopi\cell {!! $check('riwayat_sosial_minum-kopi') !!} Ya  {!! $checkNo('riwayat_sosial_minum-kopi') !!} Tidak\cell 6. Obat Rutin\cell {!! $check('riwayat_sosial_obat_rutin') !!} Ya  {!! $checkNo('riwayat_sosial_obat_rutin') !!} Tidak\cell\row
\par\page

{{-- HALAMAN 2: PEMERIKSAAN FISIK --}}
\b II. PEMERIKSAAN FISIK\b0\par
\b 1. Tanda Vital\b0\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx8000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\qc Sistol (mmHg)\cell Diastol (mmHg)\cell Nadi (x/m)\cell Respirasi (x/m)\cell Suhu (C)\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx8000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\qc {!! explode('/', $surat->tensi)[0] ?? '-' !!}\cell {!! explode('/', $surat->tensi)[1] ?? '-' !!}\cell {!! $surat->nadi !!}\cell {!! $surat->respirasi !!}\cell {!! $surat->suhu !!}\cell\row
\par
\b 2. Postur Tubuh\b0\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\qc Tinggi Badan (cm)\cell Berat Badan (kg)\cell LP (cm)\cell BMI (kg/m2)\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\qc {!! $surat->tinggi_badan !!}\cell {!! $surat->berat_badan !!}\cell {!! $getVal('lk_perut', '-') !!}\cell {!! $bmi !!}\cell\row
\par
\b 3. Inspeksi dan Palpasi\b0\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\ql Bagian Tubuh\cell Tidak\cell Ada\cell Keterangan\cell\row
@foreach(['Kulit', 'Kepala', 'Mata', 'Telinga', 'Hidung', 'Mulut-dan-Tenggorokan', 'Leher-dan-Getah-Bening'] as $p)
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\ql {!! str_replace('-', ' ', $p) !!}\cell\qc {!! $getVal('fisik_'.Str::lower($p)) == 'Tidak' ? 'X' : '' !!}\cell\qc {!! $getVal('fisik_'.Str::lower($p)) == 'Ada' ? 'X' : '' !!}\cell {!! $getVal('ket_fisik_'.Str::lower($p), '-') !!}\cell\row
@endforeach
\par
\b 4. Pemeriksaan Dada, Perut, Ekstremitas\b0\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\ql Dada / Paru / Jantung\cell\qc {!! $checkNo('fisik_dada_dada') !!}\cell\qc {!! $check('fisik_dada_dada') !!}\cell {!! $getVal('fisik_dada_jantung', '-') !!}\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\ql Perut (Abdomen)\cell\qc {!! $checkNo('fisik_perut') !!}\cell\qc {!! $check('fisik_perut') !!}\cell {!! $getVal('ket_fisik_perut', '-') !!}\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\ql Ekstremitas\cell\qc -\cell\qc -\cell T:{!! $getVal('ekst_tangan_kanan',5) !!}/{!! $getVal('ekst_tangan_kanan',5) !!}, K:{!! $getVal('ekst_kaki_kanan',5) !!}/{!! $getVal('ekst_kaki_kiri',5) !!}\cell\row
\par\page

{{-- HALAMAN 3: LABORATORIUM --}}
\b III. LABORATORIUM & PENUNJANG\b0\par
\b 1. Laboratorium Darah Lengkap\b0\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\ql Hemoglobin / Lekosit\cell\qc {!! $getVal('lab_hb') !!} / {!! $getVal('lab_lekosit') !!}\cell Hb: 13-16, Leko: 5-10rb\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\ql Trombosit / HT\cell\qc {!! $getVal('lab_trombosit') !!} / {!! $getVal('lab_hematokrit') !!}\cell Trom: 150-400k, HT: 40-50%\cell\row
\par
\b 2. Laboratorium Kimia Darah\b0\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\ql GDP / GD2PP\cell\qc {!! $getVal('lab_gdp') !!} / {!! $getVal('lab_gd2pp') !!}\cell GDP <100, GD2PP <140\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\ql Kolesterol / Trigliserida\cell\qc {!! $getVal('lab_cholesterol') !!} / {!! $getVal('lab_trigliserida') !!}\cell Chol <200, Trig <150\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\ql SGOT / SGPT\cell\qc {!! $getVal('lab_sgot') !!} / {!! $getVal('lab_sgpt') !!}\cell L:<37, P:<31 U/L\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\ql Ureum / Kreatinin\cell\qc {!! $getVal('lab_ureum') !!} / {!! $getVal('lab_kreatinin') !!}\cell Ur: 20-40, Kr: 0.6-1.1\cell\row
\par\page

{{-- HALAMAN 4: URINE, RADIOLOGI & EKG --}}
\b 3. Laboratorium Urine / Tes Hamil\b0\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\ql Warna / Kejernihan\cell\qc {!! $getVal('lab_urine_warna') !!} / {!! $getVal('lab_urine_kejernihan') !!}\cell Kuning / Jernih\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\ql Protein / Glukosa\cell\qc {!! $getVal('lab_urine_micro_protein_urin') !!} / {!! $getVal('lab_urine_micro_glukosa_urin') !!}\cell Neg / Neg\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\ql Tes Kehamilan (WUS)\cell\qc {!! $getVal('lab_tes_kehamilan', '-') !!}\cell Negatif\cell\row
\par
\b 4. Radiologi & EKG\b0\par
\pard\li360 Radiologi : \b {!! $getVal('rad_hasil', 'Normal') !!}\b0\par
\pard\li360 EKG : \b {!! $getVal('ekg_hasil', 'Normal') !!}\b0\par
\par
\qc\b KESIMPULAN HASIL MCU\b0\fs24\par
\qc\b {!! strtoupper($surat->hasil_pemeriksaan) !!}\b0\fs20\par
{!! $sigBlock !!}
\par\page

{{-- HALAMAN 5: SCREENING NAPZA --}}
\b IV. PEMERIKSAAN NAPZA\b0\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx1000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\qc No\cell Parameter Pemeriksaan\cell Hasil\cell\row
@php $nx=1; @endphp
@foreach(['morphine' => 'Morphine', 'canabinoid' => 'THC / Ganja', 'amphetamine' => 'Amphetamine', 'metamfetamin' => 'Methamphetamine'] as $k => $l)
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx1000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\qc {!! $nx++ !!}\cell {!! $l !!}\cell\qc {!! strtoupper($getVal('napza_'.$k, 'Negatif')) !!}\cell\row
@endforeach
\par
\b KESIMPULAN NAPZA : \ul {!! $is_positif_napza ? 'TERINDIKASI POSITIF' : 'NEGATIF' !!}\ulnone\b0\par
{!! $sigBlock !!}
\par\page

{{-- HALAMAN 6: PEMERIKSAAN JIWA --}}
\b V. PEMERIKSAAN JIWA SEDERHANA\b0\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx1000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\qc No\cell Parameter Pemeriksaan Jiwa\cell Hasil\cell\row
@php $jx=1; @endphp
@foreach([
    'jiwa_1' => 'Penampilan umum (sikap, perilaku)',
    'jiwa_2' => 'Mood / Afek (suasana perasaan)',
    'jiwa_3' => 'Pembicaraan (spontan, jelas)',
    'jiwa_4' => 'Proses Pikir (waham, dll)',
    'jiwa_5' => 'Persepsi (halusinasi)',
    'jiwa_8' => 'Daya Nilai Realitas',
    'jiwa_9' => 'Fungsi Kognitif'
] as $k => $l)
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx1000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9500
\pard\intbl\qc {!! $jx++ !!}\cell {!! $l !!}\cell\qc {!! strtoupper($getVal($k, 'Normal')) !!}\cell\row
@endforeach
\par
\qc\b KESIMPULAN PEMERIKSAAN JIWA\b0\par
\trowd\trgaph108\trleft2500\clbrdrt\brdrs\brdrw20\clbrdrl\brdrs\brdrw20\clbrdrb\brdrs\brdrw20\clbrdrr\brdrs\brdrw20\cellx7500
\pard\intbl\qc\b {!! strtoupper($getVal('jiwa_kesimpulan', 'NORMAL')) !!}\b0\cell\row
\par
{{-- Halaman terakhir ini akan dilanjutkan dengan tanda tangan Mengetahui + Dokter di main.blade.php jika logicnya aktif --}}