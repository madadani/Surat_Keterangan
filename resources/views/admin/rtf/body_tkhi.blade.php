\pard\sl276\slmult1\fs20\pard\trowd\trgaph108\trleft-108\clvertalt\cellx1800\clvertalt\cellx2100\clvertalt\cellx5000\clvertalt\cellx6800\clvertalt\cellx7100\clvertalt\cellx9800\pard\intbl\sl360\slmult1\ql Nama\cell :\cell\b {!! $pendaftar->nama_lengkap !!}\b0\cell No. Reg\cell :\cell\b {!! ($pendaftar->no_registrasi ?? '-') !!}\b0\cell\row\trowd\trgaph108\trleft-108\clvertalt\cellx1800\clvertalt\cellx2100\clvertalt\cellx5000\clvertalt\cellx6800\clvertalt\cellx7100\clvertalt\cellx9800\pard\intbl\sl360\slmult1\ql No. KTP/NIK\cell :\cell {!! $pendaftar->nik !!}\cell Tempat Periksa\cell :\cell RSUD dr. Soeratno\cell\row\trowd\trgaph108\trleft-108\clvertalt\cellx1800\clvertalt\cellx2100\clvertalt\cellx5000\clvertalt\cellx6800\clvertalt\cellx7100\clvertalt\cellx9800\pard\intbl\sl360\slmult1\ql Jenis Kelamin\cell :\cell {!! $pendaftar->jenis_kelamin !!}\cell Tanggal\cell :\cell {!! $tanggal_cetak !!}\cell\row\trowd\trgaph108\trleft-108\clvertalt\cellx1800\clvertalt\cellx2100\clvertalt\cellx5000\clvertalt\cellx6800\clvertalt\cellx7100\clvertalt\cellx9800\pard\intbl\sl360\slmult1\ql TTL\cell :\cell {!! $pendaftar->tempat_lahir !!}, {!! $tanggal_lahir !!}\cell Dokter\cell :\cell {!! $dokter->nama_dokter !!}\cell\row\trowd\trgaph108\trleft-108\clvertalt\cellx1800\clvertalt\cellx2100\clvertalt\cellx5000\clvertalt\cellx6800\clvertalt\cellx7100\clvertalt\cellx9800\pard\intbl\sl360\slmult1\ql Pekerjaan\cell :\cell {!! ($surat->pekerjaan ?? '-') !!}\cell NIP\cell :\cell {!! ($dokter->nip ?? '-') !!}\cell\row\pard\fs20\par\pard\sl276\slmult1\ql\b\fs20 I. ANAMNESIS\b0\par\pard\sl276\slmult1\li360 Keluhan Saat Ini\tab : {!! ($surat->mcu_data['keluhan_saat_ini'] ?? '-') !!}\par\pard\sl276\slmult1\ql\b 1. Riwayat Kesehatan Sekarang\b0\par
@php $skrng = ['Hipertensi', 'Diabetes Mellitus', 'Gangguan Jiwa', 'HIV/AIDS', 'Kanker', 'Penyakit Hati', 'Penyakit Alergi', 'Penyakit Jantung', 'Gagal Ginjal']; @endphp
@foreach($skrng as $idx => $item)@php $val = $surat->mcu_data['riwayat_skrng_' . \Illuminate\Support\Str::slug($item)] ?? 'Tidak'; @endphp\trowd\trgaph108\trleft360\clvertalt\cellx1000\clvertalt\cellx6000\clvertalt\cellx9800\pard\intbl\sl240\slmult1 {!! ($idx + 1) !!}.\cell {!! $item !!}\cell [ {!! ($val == 'Ya' ? '\u10003?' : '  ') !!} ] Ya [ {!! ($val == 'Tidak' ? '\u10003?' : '  ') !!} ] Tidak\cell\row @endforeach\pard\sl276\slmult1\par\pard\sl276\slmult1\ql\b 2. Riwayat Kesehatan Dahulu\b0\par
@php $dahulu = ['Tuberkulosis', 'COVID-19', 'Operasi']; @endphp
@foreach($dahulu as $idx => $item)@php $val = $surat->mcu_data['riwayat_dahulu_' . \Illuminate\Support\Str::slug($item)] ?? 'Tidak'; @endphp\trowd\trgaph108\trleft360\clvertalt\cellx1000\clvertalt\cellx6000\clvertalt\cellx9800\pard\intbl\sl240\slmult1 {!! ($idx + 1) !!}.\cell {!! $item !!}\cell [ {!! ($val == 'Ya' ? '\u10003?' : '  ') !!} ] Ya [ {!! ($val == 'Tidak' ? '\u10003?' : '  ') !!} ] Tidak\cell\row @endforeach\pard\sl276\slmult1\par\pard\sl276\slmult1\ql\b 3. Riwayat Penyakit Keluarga\b0\par
@php $keluarga = ['Hipertensi', 'Penyakit Jantung', 'Gangguan Jiwa', 'Penyakit Alergi', 'Gagal Ginjal', 'Diabetes Melitus']; @endphp
@foreach($keluarga as $idx => $item)@php $val = $surat->mcu_data['riwayat_keluarga_' . \Illuminate\Support\Str::slug($item)] ?? 'Tidak'; @endphp\trowd\trgaph108\trleft360\clvertalt\cellx1000\clvertalt\cellx6000\clvertalt\cellx9800\pard\intbl\sl240\slmult1 {!! ($idx + 1) !!}.\cell {!! $item !!}\cell [ {!! ($val == 'Ya' ? '\u10003?' : '  ') !!} ] Ya [ {!! ($val == 'Tidak' ? '\u10003?' : '  ') !!} ] Tidak\cell\row @endforeach\pard\sl276\slmult1\par\pard\sl276\slmult1\ql\b 4. Riwayat Sosial/Kebiasaan\b0\par
@php $sosial = ['Merokok', 'Terpapar Zat Berbahaya', 'Minum Alkohol', 'Penyalahgunaan Obat', 'Minum Kopi']; @endphp
@foreach($sosial as $idx => $item)@php $val = $surat->mcu_data['riwayat_sosial_' . \Illuminate\Support\Str::slug($item)] ?? 'Tidak'; @endphp\trowd\trgaph108\trleft360\clvertalt\cellx1000\clvertalt\cellx6000\clvertalt\cellx9800\pard\intbl\sl240\slmult1 {!! ($idx + 1) !!}.\cell {!! $item !!}\cell [ {!! ($val == 'Ya' ? '\u10003?' : '  ') !!} ] Ya [ {!! ($val == 'Tidak' ? '\u10003?' : '  ') !!} ] Tidak\cell\row @endforeach\pard\sl276\slmult1\par
\page
\pard\sl276\slmult1\ql\b II. PEMERIKSAAN FISIK\b0\par
\pard\sl276\slmult1\ql\b 1. Tanda Vital\b0\par
@php $tensi_parts = explode('/', $surat->tensi); @endphp
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx1800\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx3600\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5400\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9000
\pard\intbl\sl360\slmult1\qc Sistol (mmHg)\cell Diastol (mmHg)\cell Nadi (x/mnt)\cell RR (x/mnt)\cell Suhu (C)\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx1800\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx3600\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5400\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9000
\pard\intbl\sl360\slmult1\qc {!! ($tensi_parts[0] ?? '-') !!}\cell {!! ($tensi_parts[1] ?? '-') !!}\cell {!! $surat->nadi !!}\cell {!! $surat->respirasi !!}\cell {!! $surat->suhu !!}\cell\row
\pard\sl276\slmult1\par
\pard\sl276\slmult1\ql\b 2. Postur Tubuh\b0\par
@php $imt = $surat->tinggi_badan > 0 ? number_format($surat->berat_badan / (($surat->tinggi_badan / 100) ** 2), 1) : '-'; @endphp
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx2200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4400\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx6600\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx8800
\pard\intbl\sl360\slmult1\qc Tinggi (cm)\cell Berat (kg)\cell Perut (cm)\cell IMT\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx2200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4400\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx6600\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx8800
\pard\intbl\sl360\slmult1\qc {!! $surat->tinggi_badan !!}\cell {!! $surat->berat_badan !!}\cell {!! ($surat->mcu_data['lk_perut'] ?? '-') !!}\cell {!! $imt !!}\cell\row
\pard\sl276\slmult1\par
\pard\sl276\slmult1\ql\b 3. Pemeriksaan Organ\b0\par
@php $parts = ['Kulit', 'Kepala', 'Mata', 'Telinga', 'Hidung', 'Mulut', 'Leher', 'Dada', 'Paru', 'Jantung', 'Abdomen']; @endphp
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx2500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4300\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx6100\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\qc Bagian Tubuh\cell Tak (Normal)\cell Ada (Kelainan)\cell Keterangan\cell\row
@foreach($parts as $p) @php $slug = \Illuminate\Support\Str::slug($p);
$val = $surat->mcu_data['organ_' . $slug] ?? 'Normal'; @endphp\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx2500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4300\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx6100\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800\pard\intbl\sl360\slmult1 {!! $p !!}\cell\qc {!! ($val == 'Normal' ? '\u10003?' : '') !!}\cell\qc {!! ($val == 'Kelainan' ? '\u10003?' : '') !!}\cell {!! ($surat->mcu_data['organ_' . $slug . '_ket'] ?? '-') !!}\cell\row @endforeach
\pard\sl276\slmult1\par
\pard\sl276\slmult1\ql\b 4. Pemeriksaan Ekstremitas dan Neurologi\b0\par
@php $exts = ['Ekstremitas Atas', 'Ekstremitas Bawah', 'Sendi', 'Kekuatan Otot', 'Neurologi/Reflek']; @endphp
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx2500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4300\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx6100\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\qc Bagian Tubuh\cell Tak (Normal)\cell Ada (Kelainan)\cell Keterangan\cell\row
@foreach($exts as $p) @php $slug = \Illuminate\Support\Str::slug($p);
$val = $surat->mcu_data['organ_' . $slug] ?? 'Normal'; @endphp\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx2500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4300\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx6100\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800\pard\intbl\sl360\slmult1 {!! $p !!}\cell\qc {!! ($val == 'Normal' ? '\u10003?' : '') !!}\cell\qc {!! ($val == 'Kelainan' ? '\u10003?' : '') !!}\cell {!! ($surat->mcu_data['organ_' . $slug . '_ket'] ?? '-') !!}\cell\row @endforeach
\pard\sl276\slmult1\par
\page
\pard\sl276\slmult1\ql\b III. PEMERIKSAAN PENUNJANG (LABORATORIUM)\b0\par
\pard\sl276\slmult1\ql\b 1. Laboratorium Rutin\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx800\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\qc\b No.\cell Parameter Pemeriksaan\cell Hasil\cell Nilai Normal\cell\row
@php
    $labItems = [
        ['comp' => 'Hemoglobin', 'key' => 'lab_hb', 'norm' => 'L: 13.5-17.5, P: 12-16'],
        ['comp' => 'Leukosit', 'key' => 'lab_leukosit', 'norm' => '4.800 - 10.800'],
        ['comp' => 'Laju Endap Darah (LED)', 'key' => 'lab_led', 'norm' => 'L: <15, P: <20'],
        ['comp' => 'Hitung Jenis Leukosit', 'key' => 'lab_hitung_jenis', 'norm' => 'E: 1-3, B: 0-1, N: 50-70, L: 20-40, M: 2-8'],
        ['comp' => 'Golongan Darah', 'key' => 'lab_gol_darah', 'norm' => '-'],
        ['comp' => 'Glukosa Sewaktu', 'key' => 'lab_gds', 'norm' => '< 140'],
    ];
@endphp
@foreach($labItems as $idx => $item)\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx800\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800\pard\intbl\sl360\slmult1\qc {!! ($idx + 1) !!}\cell\ql {!! $item['comp'] !!}\cell\qc {!! ($surat->mcu_data[$item['key']] ?? '-') !!}\cell\qc {!! $item['norm'] !!}\cell\row @endforeach
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5600\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7100\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1 \b Tes Kehamilan (WUS)\b0\cell\qc {!! ($surat->mcu_data['lab_tes_kehamilan'] ?? '-') !!}\cell\cell\row
\pard\sl276\slmult1\par
\pard\sl276\slmult1\ql\b 2. Radiologi Thoraks PA\b0\par
\pard\sl276\slmult1\li360 Hasil Radiologi : {!! ($surat->mcu_data['rad_hasil'] ?? 'Tidak ada kelainan') !!}\par
\pard\sl276\slmult1\li360 Keterangan:\par
@php $rads = [['Kesan Normal', 'TB Kesan Fibrosis', 'Kesan Tumor/Ca'], ['Kardiomegali', 'Kesan PPOK', '']]; @endphp
@foreach($rads as $row)\trowd\trgaph108\trleft360\cellx3000\cellx6000\cellx9000 @foreach($row as $item) @if($item) @php $chk = ($surat->mcu_data['rad_' . \Illuminate\Support\Str::slug($item)] ?? '') == 'Ya' ? '\u10003?' : ' '; @endphp \pard\intbl\sl360\slmult1 [ {!! $chk !!} ] {!! $item !!}\cell @else \cell @endif @endforeach \row @endforeach
\pard\sl276\slmult1\li360 Lainnya : .....................................................................\par
\pard\sl276\slmult1\ql\b 3. EKG\b0\par
\pard\sl276\slmult1\li360 Hasil EKG : {!! ($surat->mcu_data['ekg_hasil'] ?? 'Tidak ada kelainan') !!}\par
\pard\sl276\slmult1\li360 Keterangan:\par
\trowd\trgaph108\trleft360\cellx3000\cellx6000\cellx9000 @foreach(['Iskemik', 'Infark', 'Aritmia'] as $e) @php $chk = ($surat->mcu_data['ekg_' . \Illuminate\Support\Str::slug($e)] ?? '') == 'Ya' ? '\u10003?' : ' '; @endphp \pard\intbl\sl360\slmult1 [ {!! $chk !!} ] {!! $e !!}\cell @endforeach \row\pard\sl276\slmult1\par
\pard\sl276\slmult1\qc\b KESIMPULAN HASIL MCU\b0\par
\pard\trowd\trqc\trgaph108\clbrdrt\brdrs\brdrw30\clbrdrb\brdrs\brdrw30\clbrdrl\brdrs\brdrw30\clbrdrr\brdrs\brdrw30\cellx6000
\pard\intbl\sl360\slmult1\qc\b\fs24 {!! ($surat->hasil_pemeriksaan ?? 'Aman') !!}\b0\fs20\cell\row
\pard\sl276\slmult1\par
\pard\trowd\trgaph108\trleft4000\clvertalt\cellx10200\pard\intbl\sl276\slmult1\qc Sragen, {!! $tanggal_cetak !!}\cell\row
\trowd\trgaph108\trleft4000\clvertalt\cellx10200\pard\intbl\sl276\slmult1\qc Dokter Pemeriksa\cell\row
\trowd\trgaph108\trleft4000\clvertalt\cellx10200\pard\intbl\sl276\slmult1\qc\par\par\par\par\b\ul {!! $surat->dokter->nama_dokter !!}\ulnone\b0\line NIP. {!! ($surat->dokter->nip ?? '-') !!}\cell\row
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
@foreach($napzaItems as $idx => $item)\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx800\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx5500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800\pard\intbl\sl360\slmult1\qc {!! ($idx + 1) !!}\cell\ql {!! $item['comp'] !!}\cell\qc {!! strtoupper($surat->mcu_data[$item['key']] ?? 'Negatif') !!}\cell\qc NEGATIF\cell\row @endforeach
\pard\sl276\slmult1\ql\par KESIMPULAN NAPZA : \b\ul NEGATIF\ulnone\b0\par
\pard\trowd\trgaph108\trleft4000\clvertalt\cellx10200\pard\intbl\sl360\slmult1\qc Sragen, {!! $tanggal_cetak !!}\cell\row
\trowd\trgaph108\trleft4000\clvertalt\cellx10200\pard\intbl\sl360\slmult1\qc Dokter Pemeriksa\cell\row
\trowd\trgaph108\trleft4000\clvertalt\cellx10200\pard\intbl\sl360\slmult1\qc\par\par\par\par\b\ul {!! $surat->dokter->nama_dokter !!}\ulnone\b0\line NIP. {!! ($surat->dokter->nip ?? '-') !!}\cell\row
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
@foreach($jiwaItems as $idx => $item)\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx1200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800\pard\intbl\sl360\slmult1\qc {!! ($idx + 1) !!}\cell\ql {!! $item !!}\cell\qc NORMAL\cell\row @endforeach
\pard\sl276\slmult1\qc\b\par KESIMPULAN HASIL PEMERIKSAAN JIWA\b0\par
\trowd\trqc\trgaph108\clbrdrt\brdrs\brdrw30\clbrdrb\brdrs\brdrw30\clbrdrl\brdrs\brdrw30\clbrdrr\brdrs\brdrw30\cellx4000
\pard\intbl\sl360\slmult1\qc\b Direkomendasikan\b0\cell\row
\pard\sl276\slmult1\par
\trowd\trgaph108\trleft-108\clvertalt\cellx5100\clvertalt\cellx10200\pard\intbl\sl276\slmult1\qc Mengetahui\cell\qc Sragen, {!! $tanggal_cetak !!}\cell\row
\trowd\trgaph108\trleft-108\clvertalt\cellx5100\clvertalt\cellx10200\pard\intbl\sl276\slmult1\qc {!! $m_jabatan_fmt !!}\cell\qc Dokter Pemeriksa\cell\row
\trowd\trgaph108\trleft-108\clvertalt\cellx5100\clvertalt\cellx10200\pard\intbl\sl276\slmult1\qc\par\par\par\par\b\ul {!! $m_nama !!}\ulnone\b0\line NIP. {!! $m_nip !!}\cell\qc\par\par\par\par\b\ul {!! $surat->dokter->nama_dokter !!}\ulnone\b0\line NIP. {!! $surat->dokter->nip ?? '-' !!}\cell\row
\pard\sl276\slmult1\par