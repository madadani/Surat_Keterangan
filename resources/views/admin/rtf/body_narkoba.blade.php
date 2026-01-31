\pard\sl276\slmult1\ql\qj Yang bertandatangan dibawah ini dokter Spesialis Kedokteran Jiwa di RSUD dr. Soeratno Gemolong
Sragen, menerangkan bahwa :\par\par
\pard\sl276\slmult1\ql\li360{!! $tab_set !!} Nama Lengkap\tab : \b {!! $pendaftar->nama_lengkap !!}\b0\par
Tempat / Tanggal Lahir\tab : {!! $pendaftar->tempat_lahir !!} / {!! $tanggal_lahir !!}\par
Pekerjaan\tab : {!! $surat->pekerjaan ?? '-' !!}\par
Pendidikan\tab : {!! $surat->pendidikan ?? '-' !!}\par
Jenis Kelamin\tab : {!! $pendaftar->jenis_kelamin !!}\par
Alamat\tab : {!! $pendaftar->alamat !!}\par
Pemeriksaan\tab : NAPZA\par
Pada Tanggal\tab : {!! $pada_tanggal !!}\par\par
\b A. Hasil Pemeriksaan :\b0\par
\pard\sl276\slmult1\ql\li360\tx2800
@php
    $narkobaItems = [
        'Morphine' => $surat->morphine,
        'Canabinoid' => $surat->canabinoid,
        'Amphetamine' => $surat->amphetamine,
        'Benzodiazepine' => $surat->benzodiazepine,
        'Metamfetamin' => $surat->metamfetamin,
        'Cocaine' => $surat->cocaine
    ];
@endphp
@foreach($narkobaItems as $label => $val)
    - {!! $label !!}\tab : \b {!! ($val ?? '-') !!}\b0\par
@endforeach
\pard\par
\b B. Kesimpulan :\b0\par
\li360 Pada saat ini dari hasil pemeriksaan lab urine \b {!! strtoupper($surat->kesimpulan ?? 'NEGATIF') !!}\b0 dan
tidak ditemukan adanya tanda-tanda perubahan perilaku sehubungan dengan penggunaan narkoba.\par\par
\b C. Saran :\b0\par
\li360 \b Dapat / Tidak dapat\b0 dipergunakan sebagai \b {!! strtoupper($surat->keperluan) !!}\b0\par
\li360 Dan tidak dapat dipergunakan untuk kepentingan lainnya.\par
\trowd\trgaph108\trleft-108\clvertalt\cellx5100\clvertalt\cellx10200
\pard\intbl\sl276\slmult1\qc Mengetahui\cell\qc Sragen, {!! $tanggal_cetak !!}\cell\row
\pard\intbl\sl276\slmult1\qc {!! $m_jabatan_fmt !!}\cell\qc Dokter Pemeriksa\cell\row
\trowd\trgaph108\trleft-108\clvertalt\cellx5100\clvertalt\cellx10200
\pard\intbl\sl276\slmult1\qc\par\par\par\par\b\ul {!! $m_nama !!}\ulnone\b0\line NIP.
{!! $m_nip !!}\cell\qc\par\par\par\par\b\ul {!! ($surat->dokter->nama_dokter) !!}\ulnone\b0\line NIP.
{!! ($surat->dokter->nip ?? '-') !!}\cell\row\pard\par