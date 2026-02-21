@php
    $getVal = function ($key, $default = '') use ($surat) {
        return $surat->mcu_data[$key] ?? $default;
    };
    $check = function ($key) use ($getVal) {
        return $getVal($key) == 'Ya' ? '[X]' : '[  ]';
    };
    $checkNapza = function ($key) use ($getVal) {
        return $getVal('napza_' . $key) == 'Positif' ? '[X]' : '[  ]';
    };
@endphp

\b I. ANAMNESIS (RIWAYAT KESEHATAN)\b0\par
\pard\sl276\slmult1\ql\li360 Keluhan Saat Ini : {!! $getVal('keluhan_saat_ini', '-') !!}\par
\b 1. Riwayat Kesehatan Sekarang :\b0\par
\trowd\trgaph108\trleft360\cellx2500\cellx4500\cellx7000\cellx9000
\pard\intbl\ql {!! $check('riwayat_skrng_hipertensi') !!} Hipertensi\cell
{!! $check('riwayat_skrng_diabetes-mellitus') !!} DM\cell {!! $check('riwayat_skrng_gangguan-jiwa') !!} Ggn Jiwa\cell
{!! $check('riwayat_skrng_hivaids') !!} HIV/AIDS\cell\row
\trowd\trgaph108\trleft360\cellx2500\cellx4500\cellx7000\cellx9000
\pard\intbl\ql {!! $check('riwayat_skrng_kanker-keganasan') !!} Kanker\cell
{!! $check('riwayat_skrng_penyakit-hati') !!} Peny. Hati\cell {!! $check('riwayat_skrng_penyakit-alergi') !!}
Alergi\cell {!! $check('riwayat_skrng_jantung') !!} Jantung\cell\row
\trowd\trgaph108\trleft360\cellx2500\cellx9000
\pard\intbl\ql {!! $check('riwayat_skrng_ginjal') !!} Gagal Ginjal\cell
{!! $getVal('riwayat_dahulu_lainnya') ? 'Lainnya: ' . $getVal('riwayat_dahulu_lainnya') : '' !!}\cell\row

\b 2. Riwayat Kesehatan Dahulu & Keluarga :\b0\par
\trowd\trgaph108\trleft360\cellx2500\cellx4500\cellx7000\cellx9000
\pard\intbl\ql {!! $check('riwayat_dahulu_tuberkulosis') !!} TB Paru\cell {!! $check('riwayat_dahulu_covid-19') !!}
Covid-19\cell {!! $check('riwayat_keluarga_hipertensi') !!} R.Kel Hiper\cell
{!! $check('riwayat_keluarga_diabetes-melitus') !!} R.Kel DM\cell\row

\b 3. Riwayat Sosial/Kebiasaan :\b0\par
\trowd\trgaph108\trleft360\cellx2500\cellx4500\cellx7000\cellx9000
\pard\intbl\ql {!! $check('riwayat_sosial_merokok') !!} Merokok\cell {!! $check('riwayat_sosial_minum-alkohol') !!}
Alkohol\cell {!! $check('riwayat_sosial_obat') !!} Obat Rutin\cell\cell\row
\par

\b II. PEMERIKSAAN FISIK\b0\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx8000
\pard\intbl\ql Tinggi : {!! $surat->tinggi_badan !!} cm\cell Berat : {!! $surat->berat_badan !!} kg\cell TD :
{!! $surat->tensi !!} mmHg\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx8000
\pard\intbl\ql Nadi : {!! $surat->nadi !!} x/m\cell Suhu : {!! $surat->suhu !!} C\cell RR : {!! $surat->respirasi !!}
x/m\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx8000
\pard\intbl\ql Lk.Perut : {!! $getVal('lk_perut') !!} cm\cell Lk.Dada : {!! $getVal('lk_dada') !!} cm\cell BMI :
{!! $surat->tinggi_badan > 0 ? number_format($surat->berat_badan / (($surat->tinggi_badan / 100) ** 2), 1) : '-' !!}\cell\row

\b Inspeksi & Palpasi :\b0\par
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9000
\pard\intbl\ql Mata (Visus)\cell OD: {!! $getVal('od_tanpa') !!} / {!! $getVal('od_kaca') !!}, OS:
{!! $getVal('os_tanpa') !!} / {!! $getVal('os_kaca') !!}, Buta Warna: {!! $surat->buta_warna !!}\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9000
\pard\intbl\ql Kulit/Kepala\cell
{!! $getVal('fisik_kulit') == 'Ada' ? 'Kelainan: ' . $getVal('ket_fisik_kulit') : 'Normal' !!} /
{!! $getVal('fisik_kepala') == 'Ada' ? 'Kelainan: ' . $getVal('ket_fisik_kepala') : 'Normal' !!}\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9000
\pard\intbl\ql THT/Mulut\cell {!! $getVal('fisik_telinga') == 'Ada' ? 'Telinga Kelainan' : 'Telinga Normal' !!},
{!! $getVal('fisik_hidung') == 'Ada' ? 'Hidung Kelainan' : 'Hidung Normal' !!},
{!! $getVal('fisik_mulut-dan-tenggorokan') == 'Ada' ? 'Mulut Kelainan' : 'Mulut Normal' !!}\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9000
\pard\intbl\ql Thoraks/Dada\cell Dada: {!! $getVal('fisik_dada_dada') !!}, Paru: {!! $getVal('fisik_dada_paru') !!},
Jantung: {!! $getVal('fisik_dada_jantung') !!}\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9000
\pard\intbl\ql Ekstremitas\cell Tangan: {!! $getVal('ekst_tangan_kanan') !!}/{!! $getVal('ekst_tangan_kiri') !!}, Kaki:
{!! $getVal('ekst_kaki_kanan') !!}/{!! $getVal('ekst_kaki_kiri') !!}, Refleks: {!! $getVal('ekst_refleks') !!},
Patologis: {!! $getVal('ekst_patologis') !!}\cell\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9000
\pard\intbl\ql Abdomen/Uro\cell Perut: {!! $getVal('fisik_perut') !!}, Rectum: {!! $getVal('fisik_uro_rectum') !!},
Urogenital: {!! $getVal('fisik_uro_urogenital') !!}\cell\row
\par

\b III. LABORATORIUM & PENUNJANG\b0\par
\trowd\trgaph108\trleft360\cellx2500\cellx5500\cellx9000
\pard\intbl\ql Darah Lengkap\cell Hb: {!! $getVal('lab_hb') !!}, Lekosit: {!! $getVal('lab_lekosit') !!}\cell Trombosit:
{!! $getVal('lab_trombosit') !!}, HT: {!! $getVal('lab_hematokrit') !!}\cell\row
\trowd\trgaph108\trleft360\cellx2500\cellx5500\cellx9000
\pard\intbl\ql Kimia Darah\cell GDP: {!! $getVal('lab_gdp') !!}, GD2PP: {!! $getVal('lab_gd2pp') !!}\cell Chol:
{!! $getVal('lab_cholesterol') !!}, Triger: {!! $getVal('lab_trigliserida') !!}\cell\row
\trowd\trgaph108\trleft360\cellx2500\cellx5500\cellx9000
\pard\intbl\ql Fungsi Ginjal/Hati\cell Ureum: {!! $getVal('lab_ureum') !!}, Kreat: {!! $getVal('lab_kreatinin') !!}\cell
SGOT: {!! $getVal('lab_sgot') !!}, SGPT: {!! $getVal('lab_sgpt') !!}\cell\row
\trowd\trgaph108\trleft360\cellx2500\cellx9000
\pard\intbl\ql Urine/Lainnya\cell Urine: {!! $getVal('lab_urine_warna') !!}/{!! $getVal('lab_urine_kejernihan') !!}, Tes
Hamil (WUS): {!! $getVal('lab_tes_kehamilan') !!}\cell\row
\trowd\trgaph108\trleft360\cellx2500\cellx9000
\pard\intbl\ql Rad / EKG\cell Rad: {!! $getVal('rad_hasil') !!}, EKG: {!! $getVal('ekg_hasil') !!}\cell\row
\par

\b IV. PEMERIKSAAN NAPZA & JIWA\b0\par
\pard\sl276\slmult1\ql\li360 NAPZA : Morphine:{!! $getVal('napza_morphine') !!},
Ganja:{!! $getVal('napza_canabinoid') !!}, Amphet:{!! $getVal('napza_amphetamine') !!},
Meth:{!! $getVal('napza_metamfetamin') !!}.\par
\pard\sl276\slmult1\ql\li360 JIWA : {!! $getVal('jiwa_kesimpulan', 'NORMAL') !!} ({!! $getVal('jiwa_1', 'Normal') !!},
{!! $getVal('jiwa_2', 'Normal') !!}, {!! $getVal('jiwa_5', 'Normal') !!}, {!! $getVal('jiwa_9', 'Normal') !!})\par
\par

\b V. KESIMPULAN AKHIR :\b0\par
\pard\ql {!! strtoupper($surat->hasil_pemeriksaan) !!}\par
\i Resume: {!! $surat->mcu_data['hasil_pemeriksaan'] ?? '-' !!}\i0\par\par