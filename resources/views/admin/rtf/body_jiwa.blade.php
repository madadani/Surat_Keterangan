\pard\sl276\slmult1\ql\qj Yang bertanda tangan di bawah ini, Dokter Pemerintah pada RSUD dr. Soeratno Gemolong, dengan
ini menerangkan bahwa :\par\par
\pard\sl276\slmult1\ql\li360{!! $tab_set !!} Nama Lengkap\tab : \b {!! $pendaftar->nama_lengkap !!}\b0\par
Tempat / Tanggal Lahir\tab : {!! $pendaftar->tempat_lahir !!}, {!! $tanggal_lahir !!} ({!! $umur !!} Th)\par
Jenis Kelamin\tab : {!! $pendaftar->jenis_kelamin !!}\par
Pekerjaan\\Pendidikan\tab : {!! $surat->pekerjaan ?? '-' !!} / {!! $surat->pendidikan ?? '-' !!}\par
Alamat\tab : {!! $pendaftar->alamat !!}\par
\pard\sl276\slmult1\ql\qj Berdasarkan pemeriksaan kesehatan jiwa pada tanggal \b {!! $pada_tanggal !!}\b0 , yang
bersangkutan pada saat ini dinyatakan :\par
\pard\sl276\slmult1\qc\b\fs28 {!! strtoupper($surat->hasil_pemeriksaan) !!}\b0\fs24\par
@if($surat->saran)\pard\sl276\slmult1\ql Keterangan / Saran : {!! $surat->saran !!}\par\par @endif
\pard\sl276\slmult1\ql\qj Demikian surat keterangan ini dipergunakan sebagaimana mestinya sebagai \b
{!! strtoupper($surat->keperluan) !!}\b0.\par
Surat keterangan ini berlaku 1 (satu) bulan sejak diterbitkan dan tidak dapat digunakan untuk kepentingan hukum
lain.\par\par