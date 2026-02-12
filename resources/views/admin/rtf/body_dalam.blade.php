\pard\sl276\slmult1\ql\qj Yang bertandatangan dibawah ini dokter penguji kesehatan Rumah Sakit Umum Daerah dr. Soeratno
Gemolong Kabupaten Sragen, mengingat sumpah/janji jabatan, dengan ini menerangkan dengan sesungguhnya bahwa :\par\par
\pard\sl276\slmult1\ql\li360{!! $tab_set !!} Nama Lengkap\tab : \b {!! $pendaftar->nama_lengkap !!}\b0\par
Umur\tab : {!! $umur !!} Tahun\par
Tempat / Tanggal Lahir\tab : {!! $pendaftar->tempat_lahir !!}, {!! $tanggal_lahir !!}\par
Jenis Kelamin\tab : {!! $pendaftar->jenis_kelamin !!}\par
Pekerjaan\tab : {!! $surat->pekerjaan ?? '-' !!}\par
Alamat\tab : {!! $pendaftar->alamat !!}\par
@if($surat->tinggi_badan || $surat->berat_badan)
    Tinggi / Berat Badan\tab : {!! $surat->tinggi_badan ?? '-' !!} cm / {!! $surat->berat_badan ?? '-' !!} kg
    @if(isset($surat->mcu_data['bmi']))(IMT: {!! $surat->mcu_data['bmi'] !!})@endif\par
@endif
@if($surat->tensi)
    Tekanan Darah\tab : {!! $surat->tensi !!} mmHg\par
@endif
@if($surat->nadi || $surat->suhu || $surat->respirasi)
    Nadi / Suhu / RR\tab : {!! $surat->nadi ?? '-' !!} x/mnt / {!! $surat->suhu ?? '-' !!} 'C /
    {!! $surat->respirasi ?? '-' !!} x/mnt\par
@endif
@if(isset($surat->mcu_data['gangguan_motorik']) || isset($surat->mcu_data['disabilitas']))
    Pemeriksaan Fisik\tab : Gangguan Motorik :
    {!! isset($surat->mcu_data['gangguan_motorik']) ? ($surat->mcu_data['gangguan_motorik'] == 'Tidak' ? 'TIDAK ADA' : strtoupper($surat->mcu_data['gangguan_motorik'])) : '-' !!}\par
    \tab Disabilitas :
    {!! isset($surat->mcu_data['disabilitas']) ? ($surat->mcu_data['disabilitas'] == 'Tidak' ? 'TIDAK ADA' : strtoupper($surat->mcu_data['disabilitas'])) : '-' !!}\par
    @if(isset($surat->mcu_data['keterangan_lainnya']) && $surat->mcu_data['keterangan_lainnya'])
        \tab Catatan : {!! $surat->mcu_data['keterangan_lainnya'] !!}\par
    @endif
@endif
Keperluan\tab : {!! $surat->keperluan ?? '-' !!}\par
\par
\pard\sl276\slmult1\ql\qj Telah diperiksa dengan teliti dan berpendapat bahwa yang diperiksa, ternyata \b
:\par
\pard\li720\sa100 1. SEHAT / TIDAK SEHAT *)\par
2. TIDAK BUTA WARNA / BUTA WARNA *)\par
\pard\li0\i\fs20 *) Coret yang tidak perlu\i0\fs24
Demikian surat keterangan ini dibuat untuk dapat dipergunakan seperlunya.\par\par