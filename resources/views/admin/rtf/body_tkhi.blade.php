\pard\sl276\slmult1\ql\qj Berkaitan dengan hal tersebut diatas, maka yang bertanda tangan dibawah ini dokter di RSUD dr.
Soeratno Gemolong menerangkan bahwa :\par
\pard\sl276\slmult1\ql\li360 {!! $tab_set !!} Nama Lengkap\tab : \b {!! $pendaftar->nama_lengkap !!}\b0\par
{!! $tab_set !!} Tempat/Tgl Lahir\tab : {!! $pendaftar->tempat_lahir !!} / {!! $tanggal_lahir !!}\par
{!! $tab_set !!} Jenis Kelamin\tab : {!! $pendaftar->jenis_kelamin !!}\par
{!! $tab_set !!} Status Perkawinan\tab : {!! $surat->status_perkawinan ?? '-' !!}\par
{!! $tab_set !!} Pekerjaan\tab : {!! $surat->pekerjaan ?? '-' !!}\par
{!! $tab_set !!} Alamat\tab : {!! $pendaftar->alamat !!}\par\par
\pard\sl276\slmult1\ql Berdasarkan pemeriksaan fisik saat ini yang bersangkutan dalam keadaan : \b
{!! strtoupper($surat->hasil_pemeriksaan) !!}\b0\par
\pard\sl276\slmult1\ql TB : \b {!! ($surat->tinggi_badan) !!}\b0 Cm, BB : \b {!! ($surat->berat_badan) !!}\b0 Kg, Gol
Darah : \b {!! ($surat->golongan_darah) !!}\b0 , Tek.\b {!! ($surat->tensi) !!}\b0 mmHg,\par
Nadi : \b {!! ($surat->nadi) !!}\b0 x/menit, Suhu : \b {!! ($surat->suhu) !!}\b0 \u176?C, Respi : \b
{!! ($surat->respirasi) !!}\b0 x/menit\par
Amnanesa : \b {!! ($surat->amnanesa) !!}\b0\par
Visus : OD \b {!! ($surat->visus_od) !!}\b0 OS \b {!! ($surat->visus_os) !!}\b0 , Buta Warna : \b
{!! ($surat->buta_warna) !!}\b0\par
@if($surat->is_jantung)
    Jantung : \b {!! ($surat->jantung) !!}\b0\par
@endif
@if($surat->is_paru)
    Paru : \b {!! ($surat->paru) !!}\b0\par
@endif
@if($surat->is_perut)
    Perut : \b {!! ($surat->perut) !!}\b0\par
@endif
@if($surat->is_anggota_gerak)
    Anggota Gerak : \b {!! ($surat->anggota_gerak) !!}\b0\par
@endif
@if($surat->is_bekas_luka)
    Bekas Luka : \u176?\b {!! ($surat->bekas_luka) !!}\b0\par
@endif
@if($surat->is_catatan_khusus)
    Catatan khusus : \b {!! ($surat->catatan_khusus) !!}\b0\par
@endif
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2800\ql Kesimpulan\tab : {!! ($surat->hasil_pemeriksaan) !!}\cell\row
\pard\intbl\sl360\slmult1\tx2800\ql Saran\tab : {!! ($surat->saran) !!}\cell\row
\pard\par
\trowd\trgaph108\trleft-108\clvertalt\cellx5000\clvertalt\cellx10000
\pard\intbl\qc @if($isMayaMengetahui) {!! $ttdMaya !!}\par @else \par\par\par\par\par @endif
\pard\intbl\qc\b\ul {!! trim($m_nama) !!}\ulnone\b0\par
\pard\intbl\qc NIP. {!! trim($m_nip) !!}\cell
\pard\intbl\qc @if($isMayaPemeriksa) {!! $ttdMaya !!}\par @else \par\par\par @endif
\pard\intbl\qc\b\ul{\expndtw-15 {!! trim($surat->dokter->nama_dokter) !!}\expndtw0}\ulnone\b0\par
\pard\intbl\qc NIP. {!! trim(preg_replace('/\s+/', ' ', $surat->dokter->nip ?? '-')) !!}\cell\row\pard\par