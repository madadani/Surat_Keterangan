\pard\sl276\slmult1\ql\qj Yang bertandatangan dibawah ini dokter Spesialis Kedokteran Jiwa di RSUD dr. Soeratno Gemolong
Sragen, menerangkan bahwa :\par\par
\pard\sl276\slmult1\ql\li360 {!! $tab_set !!} Nama\tab : \b {!! $pendaftar->nama_lengkap !!}\b0\par
{!! $tab_set !!} Tempat/Tanggal Lahir\tab : \b {!! $pendaftar->tempat_lahir !!} / {!! $tanggal_lahir !!}\b0\par
{!! $tab_set !!} Pekerjaan\tab : \b {!! $surat->pekerjaan ?? '-' !!}\b0\par
{!! $tab_set !!} Pendidikan\tab : \b {!! $surat->pendidikan ?? '-' !!}\b0\par
{!! $tab_set !!} Jenis Kelamin\tab : \b {!! $pendaftar->jenis_kelamin !!}\b0\par
{!! $tab_set !!} Alamat\tab : \b {!! $pendaftar->alamat !!}\b0\par
{!! $tab_set !!} Pemeriksaan\tab : \b NAPZA\b0\par
{!! $tab_set !!} Pada Tanggal\tab : \b {!! $pada_tanggal !!}\b0\par\par
\pard\sl276\slmult1\ql\b A. Hasil Pemeriksaan :\b0\par
@php
    $narkobaItems = [
        'morphine' => 'Morphine',
        'canabinoid' => 'Canabinoid',
        'amphetamine' => 'Amphetamine',
        'benzodiazepine' => 'Benzodiazepine',
        'metamfetamin' => 'Metamfetamin',
        'cocaine' => 'Cocaine'
    ];
@endphp
@foreach($narkobaItems as $nKey => $nLabel)
    \pard\sl276\slmult1\ql\li720\tx2700 - {!! $nLabel !!}\tab : \b {!! ucfirst($surat->$nKey ?? 'Negatif') !!}\b0\par
@endforeach
\par
\pard\sl276\slmult1\ql\b B. Kesimpulan :\b0\par
\pard\sl276\slmult1\ql\qj\li360 Pada saat ini dari hasil pemeriksaan lab urine \b
{!! strtoupper($surat->kesimpulan ?? 'NEGATIF') !!}\b0 dan tidak ditemukan adanya tanda-tanda perubahan perilaku
sehubungan dengan penggunaan narkoba.\par\par
\pard\sl276\slmult1\ql\b C. Saran :\b0\par
\pard\sl276\slmult1\ql\li360\b Dapat / \strike Tidak dapat\strike0\b0 dipergunakan sebagai \b
{!! strtoupper($surat->keperluan) !!}\b0\par
\li360 Dan tidak dapat dipergunakan untuk kepentingan lainnya\par\par
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