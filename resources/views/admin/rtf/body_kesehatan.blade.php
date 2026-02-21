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
Pemeriksaan Fisik\tab : Gangguan Motorik :
{!! isset($surat->mcu_data['gangguan_motorik']) ? ($surat->mcu_data['gangguan_motorik'] == 'Tidak' ? 'TIDAK ADA' : strtoupper($surat->mcu_data['gangguan_motorik'])) : '-' !!}\par
\tab Disabilitas :
{!! isset($surat->mcu_data['disabilitas']) ? ($surat->mcu_data['disabilitas'] == 'Tidak' ? 'TIDAK ADA' : strtoupper($surat->mcu_data['disabilitas'])) : '-' !!}\par
@if(isset($surat->mcu_data['keterangan_lainnya']) && $surat->mcu_data['keterangan_lainnya'])
    \tab Catatan : {!! $surat->mcu_data['keterangan_lainnya'] !!}\par
@endif
\par
\pard\sl276\slmult1\ql\qj Telah diperiksa dengan teliti dan berpendapat bahwa yang diperiksa, ternyata :\par
\pard\li720\b
1. SEHAT / TIDAK SEHAT *)\par
2. TIDAK BUTA WARNA / BUTA WARNA *)\par
\b0\pard\li0\i\fs20 *) Coret yang tidak perlu\i0\fs24\par\par
\pard\sl276\slmult1\ql Keperluan : \b {!! strtoupper($surat->keperluan) !!}\b0\par\par
Demikian surat keterangan ini dibuat untuk dapat dipergunakan seperlunya.\par\par