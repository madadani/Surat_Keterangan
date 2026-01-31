\pard\sl276\slmult1\fs20\pard\trowd\trgaph108\trleft-108\clvertalt\cellx1800\clvertalt\cellx2100\clvertalt\cellx5000\clvertalt\cellx6800\clvertalt\cellx7100\clvertalt\cellx9800\pard\intbl\sl360\slmult1\ql
Nama\cell :\cell\b {!! $pendaftar->nama_lengkap !!}\b0\cell No. Reg\cell :\cell\b
{!! ($pendaftar->no_registrasi ?? '-') !!}\b0\cell\row\trowd\trgaph108\trleft-108\clvertalt\cellx1800\clvertalt\cellx2100\clvertalt\cellx5000\clvertalt\cellx6800\clvertalt\cellx7100\clvertalt\cellx9800\pard\intbl\sl360\slmult1\ql
No. KTP/NIK\cell :\cell {!! $pendaftar->nik ?? ($surat->mcu_data['nik'] ?? '-') !!}\cell Tempat Periksa\cell :\cell RSUD dr.
Soeratno\cell\row\trowd\trgaph108\trleft-108\clvertalt\cellx1800\clvertalt\cellx2100\clvertalt\cellx5000\clvertalt\cellx6800\clvertalt\cellx7100\clvertalt\cellx9800\pard\intbl\sl360\slmult1\ql
Jenis Kelamin\cell :\cell {!! $pendaftar->jenis_kelamin !!}\cell Tanggal\cell :\cell
{!! $tanggal_cetak !!}\cell\row\trowd\trgaph108\trleft-108\clvertalt\cellx1800\clvertalt\cellx2100\clvertalt\cellx5000\clvertalt\cellx6800\clvertalt\cellx7100\clvertalt\cellx9800\pard\intbl\sl360\slmult1\ql
TTL\cell :\cell {!! $pendaftar->tempat_lahir !!}, {!! $tanggal_lahir !!}\cell Dokter\cell :\cell
{!! $dokter->nama_dokter !!}\cell\row\trowd\trgaph108\trleft-108\clvertalt\cellx1800\clvertalt\cellx2100\clvertalt\cellx5000\clvertalt\cellx6800\clvertalt\cellx7100\clvertalt\cellx9800\pard\intbl\sl360\slmult1\ql
Pekerjaan\cell :\cell {!! ($surat->pekerjaan ?? '-') !!}\cell NIP\cell :\cell
{!! ($dokter->nip ?? '-') !!}\cell\row\pard\fs20\par\pard\sl276\slmult1\ql\b\fs20 I. ANAMNESIS\b0\par\pard\sl276\slmult1\li360 Keluhan Saat Ini\tab : {!! ($surat->mcu_data['keluhan_saat_ini'] ?? '-') !!}\par\pard\sl276\slmult1\ql\b 1. Riwayat Kesehatan Sekarang\b0\par
@php $skrng = ['Hipertensi', 'Diabetes Mellitus', 'Gangguan Jiwa', 'HIV/AIDS', 'Kanker (Keganasan)', 'Penyakit Hati', 'Penyakit Alergi']; @endphp
@foreach($skrng as $idx => $item)@php $val = $surat->mcu_data['riwayat_skrng_' . \Illuminate\Support\Str::slug($item)] ?? 'Tidak'; @endphp\trowd\trgaph108\trleft360\cellx5500\cellx9800\pard\intbl\sl276\slmult1 {!! ($idx + 1) !!}. {!! $item !!}\cell [ {!! ($val == 'Ya' ? '\u10003?' : '  ') !!} ] Ya  [ {!! ($val == 'Tidak' ? '\u10003?' : '  ') !!} ] Tidak\cell\row @endforeach
@php $v_jant = $surat->mcu_data['riwayat_skrng_penyakit-jantung'] ?? 'Tidak'; @endphp\trowd\trgaph108\trleft360\cellx5500\cellx9800\pard\intbl\sl276\slmult1 8. Penyakit Jantung\cell [ {!! ($v_jant == 'Ya' ? '\u10003?' : '  ') !!} ] Ya  [ {!! ($v_jant == 'Tidak' ? '\u10003?' : '  ') !!} ] Tidak\cell\row
\trowd\trgaph108\trleft360\cellx9800\pard\intbl\sl276\slmult1\fs18      Jika Ya : Kapan serangan jantung berakhir ..... bulan\fs20\cell\row
@php $v_ginjal = $surat->mcu_data['riwayat_skrng_gagal-ginjal'] ?? 'Tidak'; @endphp\trowd\trgaph108\trleft360\cellx5500\cellx9800\pard\intbl\sl276\slmult1 9. Gagal Ginjal\cell [ {!! ($v_ginjal == 'Ya' ? '\u10003?' : '  ') !!} ] Ya  [ {!! ($v_ginjal == 'Tidak' ? '\u10003?' : '  ') !!} ] Tidak\cell\row
\trowd\trgaph108\trleft360\cellx9800\pard\intbl\sl276\slmult1\fs18      Jika Ya: Haemodialisis/Peritoneal Dialisis: Ya / Tidak\fs20\cell\row
\trowd\trgaph108\trleft360\cellx9800\pard\intbl\sl276\slmult1 10. Lainnya : ................................\cell\row
\pard\sl276\slmult1\par\pard\sl276\slmult1\ql\b 2. Riwayat Kesehatan Dahulu\b0\par
@php $dahulu = ['Tuberkulosis', 'COVID-19', 'Operasi']; @endphp
@foreach($dahulu as $idx => $item)@php $val = $surat->mcu_data['riwayat_dahulu_' . \Illuminate\Support\Str::slug($item)] ?? 'Tidak'; @endphp\trowd\trgaph108\trleft360\cellx5500\cellx9800\pard\intbl\sl276\slmult1 {!! ($idx + 1) !!}. {!! $item !!}\cell [ {!! ($val == 'Ya' ? '\u10003?' : '  ') !!} ] Ya  [ {!! ($val == 'Tidak' ? '\u10003?' : '  ') !!} ] Tidak\cell\row @endforeach
\trowd\trgaph108\trleft360\cellx9800\pard\intbl\sl276\slmult1 4. Lainnya : ................................\cell\row
\pard\sl276\slmult1\par\pard\sl276\slmult1\ql\b 3. Riwayat Penyakit Keluarga\b0\par
@php $keluarga = ['Hipertensi', 'Penyakit Jantung', 'Gangguan Jiwa', 'Penyakit Alergi', 'Gagal Ginjal', 'Diabetes Melitus']; @endphp
@foreach($keluarga as $idx => $item)@php $val = $surat->mcu_data['riwayat_keluarga_' . \Illuminate\Support\Str::slug($item)] ?? 'Tidak'; @endphp\trowd\trgaph108\trleft360\cellx5500\cellx9800\pard\intbl\sl276\slmult1 {!! ($idx + 1) !!}. {!! $item !!}\cell [ {!! ($val == 'Ya' ? '\u10003?' : '  ') !!} ] Ya  [ {!! ($val == 'Tidak' ? '\u10003?' : '  ') !!} ] Tidak\cell\row @endforeach
\trowd\trgaph108\trleft360\cellx9800\pard\intbl\sl276\slmult1 7. Lainnya : ................................\cell\row
\pard\sl276\slmult1\par\pard\sl276\slmult1\ql\b 4. Riwayat Sosial/Kebiasaan\b0\par
@php $sosial = ['Merokok', 'Terpapar Zat Berbahaya', 'Minum Alkohol', 'Penyalahgunaan Obat', 'Minum Kopi']; @endphp
@foreach($sosial as $idx => $item)@php $val = $surat->mcu_data['riwayat_sosial_' . \Illuminate\Support\Str::slug($item)] ?? 'Tidak'; @endphp\trowd\trgaph108\trleft360\cellx5500\cellx9800\pard\intbl\sl276\slmult1 {!! ($idx + 1) !!}. {!! $item !!}\cell [ {!! ($val == 'Ya' ? '\u10003?' : '  ') !!} ] Ya  [ {!! ($val == 'Tidak' ? '\u10003?' : '  ') !!} ] Tidak\cell\row @endforeach
\trowd\trgaph108\trleft360\cellx9800\pard\intbl\sl276\slmult1 6. Lainnya : ................................\cell\row
\pard\sl276\slmult1\par


\page
\pard\sl276\slmult1\ql\b II. PEMERIKSAAN FISIK\b0\par
\pard\sl276\slmult1\ql\b 1. Tanda Vital\b0\par
@php $tensi_parts = explode('/', $surat->tensi); @endphp
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx1800\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx3600\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5400\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9000
\pard\intbl\sl360\slmult1\qc Sistol (mmHg)\cell Diastol (mmHg)\cell Nadi (x/mnt)\cell RR (x/mnt)\cell Suhu (C)\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx1800\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx3600\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5400\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9000
\pard\intbl\sl360\slmult1\qc {!! ($tensi_parts[0] ?? '-') !!}\cell {!! ($tensi_parts[1] ?? '-') !!}\cell
{!! $surat->nadi !!}\cell {!! $surat->respirasi !!}\cell {!! $surat->suhu !!}\cell\row
\pard\sl276\slmult1\par
\pard\sl276\slmult1\ql\b 2. Postur Tubuh\b0\par
@php $imt = $surat->tinggi_badan > 0 ? number_format($surat->berat_badan / (($surat->tinggi_badan / 100) ** 2), 1) : '-'; @endphp
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx2200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4400\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx6600\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx8800
\pard\intbl\sl360\slmult1\qc Tinggi (cm)\cell Berat (kg)\cell Perut (cm)\cell IMT\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx2200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4400\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx6600\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx8800
\pard\intbl\sl360\slmult1\qc {!! $surat->tinggi_badan !!}\cell {!! $surat->berat_badan !!}\cell
{!! ($surat->mcu_data['lk_perut'] ?? '-') !!}\cell {!! $imt !!}\cell\row
\pard\sl276\slmult1\par
\pard\sl276\slmult1\ql\b 3. Pemeriksaan Inspeksi dan Palpasi\b0\par
@php $inspeksi = ['Kulit', 'Kepala', 'Mata', 'Telinga', 'Hidung', 'Mulut dan Tenggorokan', 'Leher dan Getah Bening']; @endphp
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx3500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5000\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx6500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\qc Bagian Tubuh\cell Tidak\cell Ada\cell Keterangan Kelainan\cell\row
@foreach($inspeksi as $idx => $p)@php $slug = \Illuminate\Support\Str::slug($p);
    $val = $surat->mcu_data['fisik_' . $slug] ?? 'Tidak'; @endphp\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx3500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5000\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx6500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800\pard\intbl\sl360\slmult1
    {!! ($idx + 1) !!}. {!! $p !!}\cell\qc {!! ($val == 'Tidak' ? '\u10003?' : '') !!}\cell\qc
    {!! ($val == 'Ada' ? '\u10003?' : '') !!}\cell {!! ($surat->mcu_data['ket_fisik_' . $slug] ?? '-') !!}\cell\row
@endforeach
\pard\sl276\slmult1\par
\pard\sl276\slmult1\ql\b 4. Pemeriksaan Dada (Thoraks)\b0\par
@php $dada = ['Dada', 'Paru', 'Jantung']; @endphp
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx3500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5000\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx6500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\qc Bagian Tubuh\cell Tidak\cell Ada\cell Keterangan Kelainan\cell\row
@foreach($dada as $idx => $p)@php $slug = \Illuminate\Support\Str::slug($p);
    $val = $surat->mcu_data['fisik_dada_' . $slug] ?? 'Tidak'; @endphp\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx3500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5000\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx6500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800\pard\intbl\sl360\slmult1
    {!! ($idx + 1) !!}. {!! $p !!}\cell\qc {!! ($val == 'Tidak' ? '\u10003?' : '') !!}\cell\qc
    {!! ($val == 'Ada' ? '\u10003?' : '') !!}\cell {!! ($surat->mcu_data['ket_fisik_dada_' . $slug] ?? '-') !!}\cell\row
@endforeach
\pard\sl276\slmult1\par
\pard\sl276\slmult1\ql\b 5. Pemeriksaan Perut (Abdomen)\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx3500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5000\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx6500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\qc Bagian Tubuh\cell Tidak\cell Ada\cell Keterangan Kelainan\cell\row
@php $val_perut = $surat->mcu_data['fisik_perut'] ?? 'Tidak'; @endphp\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx3500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5000\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx6500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800\pard\intbl\sl360\slmult1
Perut (Abdomen)\cell\qc {!! ($val_perut == 'Tidak' ? '\u10003?' : '') !!}\cell\qc
{!! ($val_perut == 'Ada' ? '\u10003?' : '') !!}\cell {!! ($surat->mcu_data['ket_fisik_perut'] ?? '-') !!}\cell\row
\pard\sl276\slmult1\par
\pard\sl276\slmult1\ql\b 6. Pemeriksaan Ekstremitas\b0\par
\pard\sl276\slmult1\li360 Kekuatan Otot Tangan Kanan : {!! ($surat->mcu_data['ekst_tangan_kanan'] ?? '5') !!} /
5\tab\tab Refleks : {!! ($surat->mcu_data['ekst_refleks'] ?? '+') !!} / -\par
\pard\sl276\slmult1\li360 Kekuatan Otot Tangan Kiri : {!! ($surat->mcu_data['ekst_tangan_kiri'] ?? '5') !!} / 5\tab\tab
Patologis : {!! ($surat->mcu_data['ekst_patologis'] ?? '-') !!}\par
\pard\sl276\slmult1\li360 Kekuatan Otot Kaki Kanan : {!! ($surat->mcu_data['ekst_kaki_kanan'] ?? '5') !!} / 5\par
\pard\sl276\slmult1\li360 Kekuatan Otot Kaki Kiri : {!! ($surat->mcu_data['ekst_kaki_kiri'] ?? '5') !!} / 5\par
\pard\sl276\slmult1\li360 Disabilitas Tangan : {!! ($surat->mcu_data['ekst_dis_tangan'] ?? 'Tidak') !!}\par
\pard\sl276\slmult1\li360 Disabilitas Kaki : {!! ($surat->mcu_data['ekst_dis_kaki'] ?? 'Tidak') !!}\par\par
\pard\sl276\slmult1\ql\b 7. Pemeriksaan Rectum dan Urogenital\b0\par
@php $uro = ['Rectum', 'Urogenital']; @endphp
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx3500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5000\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx6500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\qc Bagian Tubuh\cell Tidak\cell Ada\cell Keterangan Kelainan\cell\row
@foreach($uro as $idx => $p)@php $slug = \Illuminate\Support\Str::slug($p);
    $val = $surat->mcu_data['fisik_uro_' . $slug] ?? 'Tidak'; @endphp\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx3500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5000\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx6500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800\pard\intbl\sl360\slmult1
    {!! ($idx + 1) !!}. {!! $p !!}\cell\qc {!! ($val == 'Tidak' ? '\u10003?' : '') !!}\cell\qc
    {!! ($val == 'Ada' ? '\u10003?' : '') !!}\cell {!! ($surat->mcu_data['fisik_uro_ket_' . $slug] ?? '-') !!}\cell\row
@endforeach
\pard\sl276\slmult1\par
\pard\sl276\slmult1\ql\b III. PEMERIKSAAN PENUNJANG\b0\par
\pard\sl276\slmult1\ql\b 1. Laboratorium\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx2200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\qc\b Jenis Pemeriksaan\cell Komponen Pemeriksaan\cell Hasil\cell Nilai Normal\cell\b0\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\clvmgf\cellx2200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\b Darah lengkap\cell\b0 Hemoglobin\cell\qc {!! ($surat->mcu_data['lab_hb'] ?? '-') !!}\cell L:13-16; P:12-14\cell\row
@foreach([['Lekosit', 'lab_lekosit', '5.000-10.000'], ['Trombosit', 'lab_trombosit', '150.000-400.000'], ['Eritrosit', 'lab_eritrosit', 'L:4.5-5.5j; P:4.0-5.0j'], ['Hematokrit', 'lab_hematokrit', 'L:45-55%; P:40-50%']] as $i)\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\clvmrg\cellx2200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800\pard\intbl\sl360\slmult1\cell {!! $i[0] !!}\cell\qc {!! ($surat->mcu_data[$i[1]] ?? '-') !!}\cell {!! $i[2] !!}\cell\row @endforeach
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\clvmrg\cellx2200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\cell\b Hitung jenis:\b0\cell\cell\cell\row
@foreach([['1. Basofil', 'lab_hj_basofil', '0-1%'], ['2. Eosinophil', 'lab_hj_eosinophil', '1-3%'], ['3. Monosit', 'lab_hj_monosit', '2-8%'], ['4. Limfosit', 'lab_hj_limfosit', '20-40%'], ['5. Netrofil', 'lab_hj_netrofil', '50-75%'], ['6. LED', 'lab_hj_led', 'L:<10; P:<15']] as $i)\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\clvmrg\cellx2200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800\pard\intbl\sl360\slmult1\cell {!! $i[0] !!}\cell\qc {!! ($surat->mcu_data[$i[1]] ?? '-') !!}\cell {!! $i[2] !!}\cell\row @endforeach
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\b Golongan Darah dan Rhesus\cell\qc\b0 {!! ($surat->mcu_data['lab_golda'] ?? '-') !!}\cell\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\clvmgf\cellx2200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\b Kimia Darah\cell\b0 GDP\cell\qc {!! ($surat->mcu_data['lab_gdp'] ?? '-') !!}\cell 70-100 mg/dL\cell\row
@foreach([['GD2PP', 'lab_gd2pp', '<140 mg/dL'], ['HbA1c', 'lab_hba1c', '<5,7%'], ['Cholesterol', 'lab_cholesterol', '150-200 mg/dL'], ['Trigliserida', 'lab_trigliserida', '120-190 mg/dL'], ['SGOT', 'lab_sgot', 'L:<25; P:<21'], ['SGPT', 'lab_sgpt', 'L:<30; P:<23'], ['Ureum', 'lab_ureum', '20-40 mg/dL'], ['Kreatinin', 'lab_kreatinin', '0,5-1,5 mg/dL'], ['HDL', 'lab_hdl', '>40 mg/dL'], ['LDL', 'lab_ldl', '<100 mg/dL']] as $i)\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\clvmrg\cellx2200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800\pard\intbl\sl360\slmult1\cell {!! $i[0] !!}\cell\qc {!! ($surat->mcu_data[$i[1]] ?? '-') !!}\cell {!! $i[2] !!}\cell\row @endforeach
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\clvmgf\cellx2200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\b Urine Lengkap\cell\b0 Warna\cell\qc {!! ($surat->mcu_data['lab_urine_warna'] ?? '-') !!}\cell Kuning muda-tua\cell\row
@foreach([['Kejernihan', 'lab_urine_kejernihan', 'Jernih'], ['Bau', 'lab_urine_bau', 'Tdk menyengat'], ['Sedimen', 'lab_urine_sedimen', 'Negatif'], ['Lekosit', 'lab_urine_lekosit', '0-5/lpb'], ['Eritrosit', 'lab_urine_eritrosit', '0-3/lpb'], ['Glukosa Urin', 'lab_urine_glukosa', 'Negatif'], ['Protein Urin', 'lab_urine_protein', 'Negatif']] as $i)\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\clvmrg\cellx2200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800\pard\intbl\sl360\slmult1\cell {!! $i[0] !!}\cell\qc {!! ($surat->mcu_data[$i[1]] ?? '-') !!}\cell {!! $i[2] !!}\cell\row @endforeach
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\b Tes Kehamilan (WUS)\cell\qc\b0 {!! ($surat->mcu_data['lab_tes_kehamilan'] ?? '-') !!}\cell\cell\row
\pard\sl276\slmult1\par

\pard\sl276\slmult1\ql\b 2. Radiologi Thoraks PA\b0\par
\pard\sl276\slmult1\li360 Hasil Radiologi : {!! ($surat->mcu_data['rad_hasil'] ?? 'Tidak ada kelainan') !!}\par
\pard\sl276\slmult1\li360 Keterangan:\par
@php $rads = [['Kesan Normal', 'TB Kesan Fibrosis', 'Kesan Tumor/Ca'], ['Kardiomegali', 'Kesan PPOK', '']]; @endphp
@foreach($rads as $row)\trowd\trgaph108\trleft360\cellx3000\cellx6000\cellx9000 @foreach($row as $item) @if($item)
    @php $chk = ($surat->mcu_data['rad_' . \Illuminate\Support\Str::slug($item)] ?? '') == 'Ya' ? '\u10003?' : ' '; @endphp
\pard\intbl\sl360\slmult1 [ {!! $chk !!} ] {!! $item !!}\cell @else \cell @endif @endforeach \row @endforeach
\pard\sl276\slmult1\li360 Lainnya : .....................................................................\par
\pard\sl276\slmult1\ql\b 3. EKG\b0\par
\pard\sl276\slmult1\li360 Hasil EKG : {!! ($surat->mcu_data['ekg_hasil'] ?? 'Tidak ada kelainan') !!}\par
\pard\sl276\slmult1\li360 Keterangan:\par
\trowd\trgaph108\trleft360\cellx3000\cellx6000\cellx9000 @foreach(['Iskemik', 'Infark', 'Aritmia'] as $e)
    @php $chk = ($surat->mcu_data['ekg_' . \Illuminate\Support\Str::slug($e)] ?? '') == 'Ya' ? '\u10003?' : ' '; @endphp
\pard\intbl\sl360\slmult1 [ {!! $chk !!} ] {!! $e !!}\cell @endforeach \row\pard\sl276\slmult1\par
\pard\sl276\slmult1\qc\b KESIMPULAN HASIL MCU\b0\par
\pard\trowd\trqc\trgaph108\clbrdrt\brdrs\brdrw30\clbrdrb\brdrs\brdrw30\clbrdrl\brdrs\brdrw30\clbrdrr\brdrs\brdrw30\cellx6000
\pard\intbl\sl360\slmult1\qc\b\fs24 {!! ($surat->hasil_pemeriksaan ?? 'Aman') !!}\b0\fs20\cell\row
\pard\sl276\slmult1\par
\pard\trowd\trgaph108\trleft4000\clvertalt\cellx10200\pard\intbl\sl276\slmult1\qc Sragen,
{!! $tanggal_cetak !!}\cell\row
\trowd\trgaph108\trleft4000\clvertalt\cellx10200\pard\intbl\sl276\slmult1\qc Dokter Pemeriksa\cell\row
\trowd\trgaph108\trleft4000\clvertalt\cellx10200\pard\intbl\sl276\slmult1\qc\par\par\par\par\b\ul
{!! $surat->dokter->nama_dokter !!}\ulnone\b0\line NIP. {!! ($surat->dokter->nip ?? '-') !!}\cell\row
\page
\pard\sl276\slmult1\ql\b IV. Pemeriksaan Narkotika dan Zat Adiktif (NAPZA)\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx800\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\qc\b No.\cell Parameter Pemeriksaan\cell Hasil\cell Nilai Normal\cell\row
@php
    $napzaItems = [
        ['comp' => 'Morphine / Opiate', 'key' => 'napza_morphine'],
        ['comp' => 'THC / Ganja', 'key' => 'napza_thc-marijuana'],
        ['comp' => 'Amphetamine', 'key' => 'napza_amphetamine'],
        ['comp' => 'Methamphetamine', 'key' => 'napza_methampetamine'],
        ['comp' => 'Cocaine', 'key' => 'napza_cocaine'],
        ['comp' => 'Benzodiazepine', 'key' => 'napza_benzodiazepine'],
    ];
@endphp
@foreach($napzaItems as $idx => $item)\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx800\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800\pard\intbl\sl360\slmult1\qc
    {!! ($idx + 1) !!}\cell\ql {!! $item['comp'] !!}\cell\qc
{!! strtoupper($surat->mcu_data[$item['key']] ?? 'Negatif') !!}\cell\qc NEGATIF\cell\row @endforeach
\pard\sl276\slmult1\ql\par KESIMPULAN NAPZA : \b\ul NEGATIF\ulnone\b0\par
\pard\trowd\trgaph108\trleft4000\clvertalt\cellx10200\pard\intbl\sl360\slmult1\qc Sragen,
{!! $tanggal_cetak !!}\cell\row
\trowd\trgaph108\trleft4000\clvertalt\cellx10200\pard\intbl\sl360\slmult1\qc Dokter Pemeriksa\cell\row
\trowd\trgaph108\trleft4000\clvertalt\cellx10200\pard\intbl\sl360\slmult1\qc\par\par\par\par\b\ul
{!! $surat->dokter->nama_dokter !!}\ulnone\b0\line NIP. {!! ($surat->dokter->nip ?? '-') !!}\cell\row
\page
\pard\sl276\slmult1\ql\b V. Pemeriksaan Jiwa Sederhana\b0\par
\pard\sl276\slmult1\qc\b FORM PEMERIKSAAN JIWA\b0\par
\pard\sl276\slmult1\ql Pendaftar PPIH Arab Saudi Bidang Kesehatan dan TKH\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx1200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\qc\b No.\cell Jenis Pemeriksaaan\cell Hasil Pemeriksaan\cell\row
@php
    $jiwaItems = [
        "Penampilan umum ditunjukkan melalui sikap, perilaku dan psikomotor;",
        "Mood/afek (suasana perasaan/ekspresi wajah);",
        "a. Mood (eutim/normal, sedih, senang berlebihan, labil, iritabel dll); b. Afek (luas, terbatas, tumpul, mendatar).",
        "Pembicaraan: spontan/tidak; pelan/keras; jelas/tidak; banyak/sedikit; meloncat-loncat/tidak; lambat/cepat dan sebagainya;",
        "Persepsi: halusinasi visual/audimotorik(penglihatan, pendengaran);",
        "Proses dan isi pikir: waham, ide meloncat-loncat dan sebagainya;",
        "Pengendalian impuls: verbal/motorik;",
        "Fungsi kognitif: kesadaran, memori, konsentrasi, visuospatial;",
        "Kemampuan dalam menilai realitas terganggu/tidak."
    ];
@endphp
@foreach($jiwaItems as $idx => $item)\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx1200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800\pard\intbl\sl360\slmult1\qc
{!! ($idx + 1) !!}\cell\ql {!! $item !!}\cell\qc NORMAL\cell\row @endforeach
\pard\sl276\slmult1\qc\b\par KESIMPULAN HASIL PEMERIKSAAN JIWA\b0\par
\trowd\trqc\trgaph108\clbrdrt\brdrs\brdrw30\clbrdrb\brdrs\brdrw30\clbrdrl\brdrs\brdrw30\clbrdrr\brdrs\brdrw30\cellx4000
\pard\intbl\sl360\slmult1\qc\b Direkomendasikan\b0\cell\row
\pard\sl276\slmult1\par
\trowd\trgaph108\trleft-108\clvertalt\cellx5100\clvertalt\cellx10200\pard\intbl\sl276\slmult1\qc Mengetahui\cell\qc
Sragen, {!! $tanggal_cetak !!}\cell\row
\trowd\trgaph108\trleft-108\clvertalt\cellx5100\clvertalt\cellx10200\pard\intbl\sl276\slmult1\qc
{!! $m_jabatan_fmt !!}\cell\qc Dokter Pemeriksa\cell\row
\trowd\trgaph108\trleft-108\clvertalt\cellx5100\clvertalt\cellx10200\pard\intbl\sl276\slmult1\qc\par\par\par\par\b\ul
{!! $m_nama !!}\ulnone\b0\line NIP. {!! $m_nip !!}\cell\qc\par\par\par\par\b\ul
{!! $surat->dokter->nama_dokter !!}\ulnone\b0\line NIP. {!! $surat->dokter->nip ?? '-' !!}\cell\row
\pard\sl276\slmult1\par