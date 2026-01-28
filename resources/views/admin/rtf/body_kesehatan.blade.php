\pard\sl276\slmult1\ql\qj Yang bertandatangan dibawah ini dokter penguji kesehatan Rumah Sakit Umum Daerah dr. Soeratno
Gemolong Kabupaten Sragen, mengingat sumpah/janji jabatan, dengan ini menerangkan dengan sesungguhnya bahwa :\par\par
\pard\sl276\slmult1\ql\li360{!! $tab_set !!} Nama Lengkap\tab : \b {!! $pendaftar->nama_lengkap !!}\b0\par
Umur\tab : {!! $umur !!} Tahun\par
Tempat / Tanggal Lahir\tab : {!! $pendaftar->tempat_lahir !!}, {!! $tanggal_lahir !!}\par
Jenis Kelamin\tab : {!! $pendaftar->jenis_kelamin !!}\par
Pekerjaan\tab : {!! $surat->pekerjaan ?? '-' !!}\par
Alamat\tab : {!! $pendaftar->alamat !!}\par
@if($surat->tinggi_badan || $surat->berat_badan)
    Tinggi / Berat Badan\tab : {!! $surat->tinggi_badan ?? '-' !!} cm / {!! $surat->berat_badan ?? '-' !!} kg\par
@endif
Keperluan\tab : {!! $surat->keperluan ?? '-' !!}\par
Keterangan\tab : {!! $surat->saran ?? '-' !!}\par
\par
\pard\sl276\slmult1\ql\qj Telah diperiksa dengan teliti dan berpendapat bahwa yang diperiksa, ternyata \b
{!! strtoupper($surat->hasil_pemeriksaan) !!}\b0 @if($surat->buta_warna), Buta warna \b
{!! ($surat->buta_warna == 'Ya' ? 'YA' : 'TIDAK') !!}\b0 @endif \par\par
Demikian surat keterangan ini dibuat untuk dapat dipergunakan seperlunya.\par\par