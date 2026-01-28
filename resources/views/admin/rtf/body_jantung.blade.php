\pard\sl276\slmult1\ql Yang bertandatangan dibawah ini, Dokter spesialis Jantung Rumah Sakit Umum Daerah dr. Soeratno
Gemolong Kabupaten Sragen, dengan ini menerangkan bahwa :\par\par
\pard\sl360\slmult1\ql\li720\fi-720\tx720\tx2800\tx3100\f1\fs24 Nama Lengkap\tab : \tab \b
{!! strtoupper($pendaftar->nama_lengkap) !!}\b0\par
Umur\tab : \tab \b {!! $umur !!} Tahun\b0\par
Jenis Kelamin\tab : \tab \b {!! $pendaftar->jenis_kelamin !!}\b0\par
Pekerjaan\tab : \tab \b {!! ($surat->pekerjaan ?? '-') !!}\b0\par
Alamat\tab : \tab \b {!! $pendaftar->alamat !!}\b0\par\par
\b I. PEMERIKSAAN PENUNJANG\b0\par
\li360\tx2800 Hasil EKG\tab : {!! ($surat->mcu_data['jantung_ekg'] ?? '-') !!}\par
\li360\tx2800 Hasil Treadmill Stress\tab : {!! ($surat->mcu_data['jantung_treadmill'] ?? '-') !!}\par\par
\b II. DETAIL PARAMETER EKG\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4000\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
@php
    $ekgParams = [
        'Irama' => $surat->mcu_data['jantung_irama'] ?? '-',
        'Heart Rate (HR)' => $surat->mcu_data['jantung_hr'] ?? '-',
        'Gelombang P' => $surat->mcu_data['jantung_p_wave'] ?? '-',
        'Interval PR' => $surat->mcu_data['jantung_pr_interval'] ?? '-',
        'Kompleks QRS' => $surat->mcu_data['jantung_qrs_complex'] ?? '-',
        'Gelombang T' => $surat->mcu_data['jantung_t_wave'] ?? '-',
    ];
@endphp
@foreach($ekgParams as $label => $val)
    \pard\intbl\sl360\slmult1\ql {!! $label !!}\cell {!! $val !!}\cell\row
@endforeach
\pard\par
\b III. KESIMPULAN\b0\par
\li360 Telah diperiksa dengan teliti dan berpendapat bahwa yang diperiksa :\par
\li360 \b {!! strtoupper($surat->hasil_pemeriksaan) !!}\b0\par
\li360 Keterangan / Saran : {!! $surat->saran ?? 'Tidak Ada' !!}\par\par
\pard\sl276\slmult1\ql Demikian surat keterangan ini dibuat untuk dapat dipergunakan seperlunya.\par\par