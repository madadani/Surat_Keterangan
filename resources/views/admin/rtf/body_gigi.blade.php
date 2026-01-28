\pard\sl276\slmult1\ql Yang bertanda tangan di bawah ini :\par\par
\li360\tx3000 Nama Dokter\tab : \b {!! $dokter->nama_dokter !!}\b0\par
No. SIP\tab : \b {!! ($dokter->sip ?? '-') !!}\b0\par
Jabatan\tab : \b Dokter Gigi\b0\par
Instansi\tab : \b Poliklinik Gigi dan Mulut RSUD dr. Soeratno Gemolong\b0\par\par
\pard\sl276\slmult1\ql Dengan ini menerangkan bahwa :\par\par
\pard\sl276\slmult1\ql\li360\tx3000 Nama Pasien\tab : \b {!! $pendaftar->nama_lengkap !!}\b0\par
Umur / JK\tab : \b {!! $umur !!} Tahun / {!! $pendaftar->jenis_kelamin !!}\b0\par
Alamat\tab : \b {!! $pendaftar->alamat !!}\b0\par
No. RM\tab : \b {!! ($pendaftar->no_rm ?? '........................................') !!}\b0\par\par
\pard\sl276\slmult1\ql Telah dilakukan pemeriksaan kesehatan gigi dan mulut pada tanggal \b {!! $pada_tanggal !!}\b0
dengan hasil dan tindakan sebagai berikut:\par\par
\b 1. Hasil Pemeriksaan\b0\par
\li360 Keadaan gigi dan jaringan sekitar gigi telah dilakukan pemeriksaan klinis :\par
\li360\b Keluhan/Temuan :\b0\par
\li720 {!! ($surat->hasil_pemeriksaan ?? '-') !!}\par\par
\b 2. Perawatan yang Telah Dilakukan\b0\par
@php
    $tindakan_saved = explode(', ', $surat->tindakan_gigi ?? '');
    $tindakan_list = [
        'Pembersihan karang gigi (scaling)',
        'Penambalan gigi',
        'Pencabutan gigi',
        'Pemberian medikasi',
        'Konsultasi dan edukasi kesehatan gigi'
    ];
@endphp
@foreach($tindakan_list as $t)
    \li360 [ {!! in_array($t, $tindakan_saved) ? '\u10003?' : ' ' !!} ] {!! $t !!}\par
@endforeach
\par
\b 3. Rencana / Pemeriksaan Lanjutan\b0\par
\li360 Pasien disarankan untuk menjalani pemeriksaan dan/atau perawatan lanjutan, berupa:\par
\li360 Kontrol ulang pada tanggal ................................\par
\li360 Perawatan lanjutan : \b {!! ($surat->saran ?? '-') !!}\b0\par\par
\pard\sl276\slmult1\ql Demikian surat keterangan ini dibuat dengan sebenar-benarnya untuk dapat dipergunakan sebagaimana
mestinya.\par\par
\pard\trowd\trgaph108\trleft-108\clvertalt\cellx5100\clvertalt\cellx10200
\pard\intbl\sl276\slmult1\qc Mengetahui\line Kepala Bidang Pelayanan RSUD dr. Soeratno\line Gemolong Kabupaten
Sragen\cell\qc Sragen, {!! $tanggal_cetak !!}\line Dokter Gigi Pemeriksa\cell\row
\pard\trowd\trgaph108\trleft-108\clvertalt\cellx5100\clvertalt\cellx10200
\pard\intbl\sl276\slmult1\qc\par\par\par\par\b\ul {!! $m_nama !!}\ulnone\b0\line NIP.
{!! $m_nip !!}\cell\qc\par\par\par\par\b\ul {!! ($surat->dokter->nama_dokter) !!}\ulnone\b0\line No. SIP:
{!! ($surat->dokter->sip ?? '-') !!}\cell\row\pard\par