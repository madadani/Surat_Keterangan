\pard\sl276\slmult1\ql\qj Yang bertanda tangan dibawah ini dokter di RSUD dr. Soeratno Gemolong menerangkan bahwa :\par
\pard\sl276\slmult1\ql\li360 {!! $tab_set !!} Nama Lengkap\tab : \b {!! $pendaftar->nama_lengkap !!}\b0\par
{!! $tab_set !!} Tempat/Tgl Lahir\tab : {!! $pendaftar->tempat_lahir !!} / {!! $tanggal_lahir !!}\par
{!! $tab_set !!} Jenis Kelamin\tab : {!! $pendaftar->jenis_kelamin !!}\par
{!! $tab_set !!} Alamat\tab : {!! $pendaftar->alamat !!}\par\par
\pard\sl276\slmult1\ql Pada tanggal \b {!! $pada_tanggal !!}\b0 pemeriksaan THTKL saat ini dalam keadaan : \b
{!! strtoupper($surat->hasil_pemeriksaan) !!}\b0\par
Surat keterangan ini dipergunakan sebagai : \b {!! $surat->keperluan !!}\b0\par
Demikian surat keterangan ini agar dapat digunakan sebagaimana mestinya\par\par
\trowd\trgaph108\trleft-108\clvertalt\cellx5000\clvertalt\cellx10000
\pard\intbl\qc Mengetahui\par Kepala Bidang Pelayanan RSUD dr. Soeratno\par Gemolong Kabupaten Sragen\cell
\pard\intbl\qc Sragen, {!! $tanggal_cetak !!}\par Dokter Pemeriksa\cell\row
\trowd\trgaph108\trleft-108\clvertalt\cellx5000\clvertalt\cellx10000
\pard\intbl\qc @if($isMayaMengetahui) {!! $ttdMaya !!}\par @else \par\par\par\par\par @endif
\pard\intbl\qc\b\ul {!! trim($m_nama) !!}\ulnone\b0\par
\pard\intbl\qc NIP. {!! trim($m_nip) !!}\cell
\pard\intbl\qc @if($isMayaPemeriksa) {!! $ttdMaya !!}\par @else \par\par\par\par @endif
\pard\intbl\qc\b\ul{\expndtw-15 {!! trim($surat->dokter->nama_dokter) !!}\expndtw0}\ulnone\b0\par
\pard\intbl\qc {!! ($surat->identitas_pemeriksa ?? 'NIP') !!}.
{!! trim(preg_replace('/\s+/', ' ', ($surat->identitas_pemeriksa === 'SIP' ? ($surat->dokter->sip ?? '-') : ($surat->dokter->nip ?? '-')))) !!}\cell\row\pard\par