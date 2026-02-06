\pard\sl276\slmult1\ql\qj Yang bertandatangan dibawah ini dokter Spesialis Kedokteran Jiwa di RSUD dr. Soeratno Gemolong
Sragen, menerangkan bahwa :\par\par
\pard\sl276\slmult1\ql\li360{!! $tab_set !!} Nama Lengkap\tab : \b {!! $pendaftar->nama_lengkap !!}\b0\par
Tempat / Tanggal Lahir\tab : {!! $pendaftar->tempat_lahir !!} / {!! $tanggal_lahir !!}\par
Pekerjaan\tab : {!! $surat->pekerjaan ?? '-' !!}\par
Pendidikan\tab : {!! $surat->pendidikan ?? '-' !!}\par
Jenis Kelamin\tab : {!! $pendaftar->jenis_kelamin !!}\par
Alamat\tab : {!! $pendaftar->alamat !!}\par
Pemeriksaan\tab : MCU\par
Pada Tanggal\tab : {!! $pada_tanggal !!}\par\par
\b A. Hasil Pemeriksaan Fisik :\b0\par
\pard\sl276\slmult1\ql\li360\tx2800
TB : \b {!! ($surat->tinggi_badan) !!}\b0 Cm, BB : \b {!! ($surat->berat_badan) !!}\b0 Kg, Gol Darah : \b
{!! ($surat->golongan_darah) !!}\b0 , Tek.\b {!! ($surat->tensi) !!}\b0 mmHg, Nadi : \b {!! ($surat->nadi) !!}\b0
x/menit, Suhu : \b {!! ($surat->suhu) !!}\b0 \u176?C, Respi : \b {!! ($surat->respirasi) !!}\b0 x/menit\par
Buta Warna : \b {!! ($surat->buta_warna) !!}\b0\par
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
\pard\par
\b B. Kesimpulan :\b0\par
\li360 Pada saat ini yang bersangkutan dinyatakan \b {!! strtoupper($surat->kesimpulan ?? 'SEHAT') !!}\b0\par\par
\b C. Saran :\b0\par
\li360 \b Dapat / Tidak dapat\b0 dipergunakan sebagai \b {!! strtoupper($surat->keperluan) !!}\b0\par
\li360 Dan tidak dapat dipergunakan untuk kepentingan lainnya.\par
\trowd\trgaph108\trleft-108\clvertalt\cellx5000\clvertalt\cellx10000
\pard\intbl\qc @if($isMayaMengetahui) {!! $ttdMaya !!}\par @else \par\par\par\par\par @endif
\pard\intbl\qc\b\ul {!! trim($m_nama) !!}\ulnone\b0\par
\pard\intbl\qc NIP. {!! trim($m_nip) !!}\cell
\pard\intbl\qc @if($isMayaPemeriksa) {!! $ttdMaya !!}\par @else \par\par\par @endif
\pard\intbl\qc\b\ul{\expndtw-15 {!! trim($surat->dokter->nama_dokter) !!}\expndtw0}\ulnone\b0\par
\pard\intbl\qc NIP. {!! trim(preg_replace('/\s+/', ' ', $surat->dokter->nip ?? '-')) !!}\cell\row\pard\par