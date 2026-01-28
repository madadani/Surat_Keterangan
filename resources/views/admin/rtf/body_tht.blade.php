\pard\sl276\slmult1\ql\qj Yang Bertandatangan dibawah ini, dokter Spesialis THTKL bertugas di RSUD dr. Soeratno, Gemolong, Kabupaten Sragen menerangkan dengan sesungguhnya bahwa :\par\par 
\pard\sl276\slmult1\ql\li360{!! $tab_set !!} Nama\tab : \b {!! $pendaftar->nama_lengkap !!}\b0\par 
Jenis Kelamin\tab : {!! $pendaftar->jenis_kelamin !!}\par 
Umur\tab : {!! $umur !!} Tahun\par 
Alamat\tab : {!! $pendaftar->alamat !!}\par 
Tinggi/Berat Badan\tab : {!! $surat->tinggi_badan !!} cm / {!! $surat->berat_badan !!} kg\par 
Tekanan Darah\tab : {!! ($surat->tensi ?? '-') !!} mmhg\par 
Golongan Darah\tab : {!! ($surat->golongan_darah ?? '-') !!}\par\par 
\pard\sl276\slmult1\ql Test pendengaran kuantitatif (bisik) : \b {!! ($surat->tes_bisik ?? '-') !!}\b0\par\par 
@php
$diagramPath = public_path('img/diagram_tht.png');
@endphp
@if(file_exists($diagramPath))
@php
$data = @file_get_contents($diagramPath);
$hex = bin2hex($data);
$size = @getimagesize($diagramPath);
$w_orig = $size[0];
$h_orig = $size[1];
$width_px = 450;
$h_px = ($h_orig / $w_orig) * $width_px;
$picwgoal = round($width_px * 20); 
$pichgoal = round($h_px * 20);
@endphp
\pard\qc {\pict\pngblip\picw{!! $w_orig !!}\pich{!! $h_orig !!}\picwgoal{!! $picwgoal !!}\pichgoal{!! $pichgoal !!} {!! $hex !!}}\par 
@endif
\pard\sl276\slmult1\qc Telinga Kiri: \b {!! ($surat->telinga_kiri ?? '-') !!}\b0  | Telinga Kanan: \b {!! ($surat->telinga_kanan ?? '-') !!}\b0  | Hidung: \b {!! ($surat->hidung ?? '-') !!}\b0  | Tenggorokan: \b {!! ($surat->tenggorokan ?? '-') !!}\b0 \par\par 
\pard\sl276\slmult1\ql Pada tanggal \b {!! $pada_tanggal !!}\b0  pemeriksaan THTKL saat ini dalam keadaan : \b {!! strtoupper($surat->hasil_pemeriksaan) !!}\b0\par 
Surat keterangan ini dipergunakan sebagai : \b {!! $surat->keperluan !!}\b0\par 
Demikian surat keterangan ini agar dapat digunakan sebagaimana mestinya\par\par 
\trowd\trgaph108\trleft-108\clvertalt\cellx5100\clvertalt\cellx10200
\pard\intbl\sl276\slmult1\qc Mengetahui\cell\qc Gemolong, {!! $tanggal_cetak !!}\cell\row 
\pard\intbl\sl276\slmult1\qc {!! $m_jabatan_fmt !!}\cell\qc Dokter Pemeriksa\cell\row 
\trowd\trgaph108\trleft-108\clvertalt\cellx5100\clvertalt\cellx10200
\pard\intbl\sl276\slmult1\qc\par\par\par\par\b\ul {!! $m_nama !!}\ulnone\b0\line NIP. {!! $m_nip !!}\cell\qc\par\par\par\par\b\ul {!! ($surat->dokter->nama_dokter) !!}\ulnone\b0\line SIP No. {!! ($surat->dokter->sip ?? $surat->dokter->nip ?? '-') !!}\cell\row\pard\par 
