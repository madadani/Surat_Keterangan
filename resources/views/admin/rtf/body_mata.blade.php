\pard\sl276\slmult1\ql\qj\f1\fs24 Yang bertanda tangan di bawah ini, Dokter Pemeriksa RSUD dr. Soeratno Gemolong, dengan
ini
menerangkan bahwa :\par\par
\pard\sl276\slmult1\ql\li360\f1\fs24 {!! $tab_set !!} Nama\tab : \b
{!! \App\Services\RtfService::escape($pendaftar->nama_lengkap) !!}\b0\par
{!! $tab_set !!} Umur\tab : {!! $umur !!} Tahun\par
{!! $tab_set !!} Jenis Kelamin\tab : {!! $pendaftar->jenis_kelamin !!}\par
{!! $tab_set !!} Pekerjaan\tab : {!! \App\Services\RtfService::escape($surat->pekerjaan ?? '-') !!}\par
{!! $tab_set !!} Alamat\tab : {!! \App\Services\RtfService::escape($pendaftar->alamat) !!}\par\par
\pard\sl276\slmult1\ql\f1\fs24 Berdasarkan pemeriksaan kesehatan mata terdapat :\par
\pard\sl276\slmult1\ql\li360\f1\fs24 1. Mata \b NORMAL / TIDAK NORMAL\b0\par
2. \b BUTA WARNA / TIDAK BUTA WARNA\b0\par
3. Visus Mata Kanan\tab : \b
{!! \App\Services\RtfService::escape($surat->visus_kanan ?? '.....................') !!}\b0\par
Visus Mata Kiri\tab : \b
{!! \App\Services\RtfService::escape($surat->visus_kiri ?? '.....................') !!}\b0\par
4. Segmen Anterior Mata kanan dan kiri : \b
{!! \App\Services\RtfService::escape($surat->segmen_anterior ?? '.....................') !!}\b0\par\par
\pard\sl276\slmult1\ql\f1\fs24 Keperluan : \b
{!! \App\Services\RtfService::escape(strtoupper($surat->keperluan)) !!}\b0\par\par
\pard\sl276\slmult1\ql\f1\fs24 Demikian surat keterangan ini dapat dipergunakan sebagaimana mestinya.\par\par