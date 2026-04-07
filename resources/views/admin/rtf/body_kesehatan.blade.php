\pard\sl276\slmult1\ql\qj Yang bertandatangan dibawah ini dokter penguji kesehatan Rumah Sakit Umum Daerah dr. Soeratno
Gemolong Kabupaten Sragen, mengingat sumpah/janji jabatan, dengan ini menerangkan dengan sesungguhnya bahwa :\par\par
\pard\sl276\slmult1\ql\li360{!! $tab_set !!} Nama Lengkap\tab : \b {!! $pendaftar->nama_lengkap !!}\b0\par
Tempat / Tanggal Lahir\tab : {!! $pendaftar->tempat_lahir !!}, {!! $tanggal_lahir !!}\par
Jenis Kelamin\tab : {!! $pendaftar->jenis_kelamin !!}\par
Pekerjaan\tab : {!! $surat->pekerjaan ?? '-' !!}\par
Alamat\tab : {!! $pendaftar->alamat !!}\par
Tinggi / Berat Badan\tab : {!! $surat->tinggi_badan ?? '-' !!} cm / {!! $surat->berat_badan ?? '-' !!} kg
@if(isset($surat->mcu_data['bmi']))(IMT: {!! $surat->mcu_data['bmi'] !!})@endif\par
Tekanan Darah\tab : {!! $surat->tensi ?? '-' !!} mmHg\par
Nadi / Suhu / RR\tab : {!! $surat->nadi ?? '-' !!} x/mnt / {!! $surat->suhu ?? '-' !!} 'C /
{!! $surat->respirasi ?? '-' !!} x/mnt\par
@php
    $show_motorik = isset($surat->mcu_data['tampilkan_motorik']) && $surat->mcu_data['tampilkan_motorik'] == 'Ya';
    $show_disabilitas = isset($surat->mcu_data['tampilkan_disabilitas']) && $surat->mcu_data['tampilkan_disabilitas'] == 'Ya';
    
    $show_fisik_manual = isset($surat->mcu_data['tampilkan_fisik']) && $surat->mcu_data['tampilkan_fisik'] == 'Ya';
    $fisik_manual = $surat->mcu_data['pemeriksaan_fisik_manual'] ?? '';
    
    $show_penunjang = isset($surat->mcu_data['tampilkan_penunjang']) && $surat->mcu_data['tampilkan_penunjang'] == 'Ya';
    $penunjang_manual = $surat->mcu_data['pemeriksaan_penunjang_manual'] ?? '';
@endphp

@if($show_motorik || $show_disabilitas || $show_fisik_manual)
Pemeriksaan Fisik\tab : @if($show_motorik)Gangguan Motorik : {!! isset($surat->mcu_data['gangguan_motorik']) ? ($surat->mcu_data['gangguan_motorik'] == 'Tidak' ? 'TIDAK ADA' : strtoupper($surat->mcu_data['gangguan_motorik'])) : '-' !!}@endif @if($show_disabilitas){!! $show_motorik ? ', ' : '' !!}Disabilitas : {!! isset($surat->mcu_data['disabilitas']) ? ($surat->mcu_data['disabilitas'] == 'Tidak' ? 'TIDAK ADA' : strtoupper($surat->mcu_data['disabilitas'])) : '-' !!}@endif @if($show_motorik || $show_disabilitas)\par\tab @endif @if($show_fisik_manual){!! ($show_motorik || $show_disabilitas) ? '\par\tab ' : '' !!}{!! $fisik_manual !!}@endif\par
@endif

@if($show_penunjang)
Pemeriksaan Penunjang\tab : {!! $penunjang_manual !!}\par
@endif
\par
\pard\sl276\slmult1\ql\qj Telah diperiksa dengan teliti dan berpendapat bahwa yang diperiksa, ternyata :\par
\pard\li720\b
1. SEHAT / TIDAK SEHAT *)\par
2. TIDAK BUTA WARNA / BUTA WARNA *)\par
\b0\pard\li0\i\fs20 *) Coret yang tidak perlu\i0\fs24\par\par
\pard\sl276\slmult1\ql Keperluan : \b {!! strtoupper($surat->keperluan) !!}\b0\par\par
Demikian surat keterangan ini dibuat untuk dapat dipergunakan seperlunya.\par\par