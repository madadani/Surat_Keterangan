\pard\sl276\slmult1\ql Yang bertanda tangan di bawah ini :\par\par
\li360\tx3000 Nama Dokter\tab : \b {!! $dokter->nama_dokter !!}\b0\par
No. SIP\tab : \b {!! ($dokter->sip ?? '-') !!}\b0\par
Jabatan\tab : \b Dokter Gigi\b0\par
Instansi\tab : \b Poliklinik Gigi dan Mulut RSUD dr. Soeratno Gemolong\b0\par\par
\pard\sl276\slmult1\ql Dengan ini menerangkan bahwa :\par\par
\pard\sl276\slmult1\ql\li360\tx3000 Nama Pasien\tab : \b {!! $pendaftar->nama_lengkap !!}\b0\par
Umur / JK\tab : \b {!! $umur !!} Tahun / {!! $pendaftar->jenis_kelamin !!}\b0\par
Alamat\tab : \b {!! $pendaftar->alamat !!}\b0\par
No. RM\tab : \b {!! ($pendaftar->no_rm ?? '................') !!}\b0\par\par
\pard\sl276\slmult1\ql Telah dilakukan pemeriksaan kesehatan gigi dan mulut pada tanggal \b {!! $pada_tanggal !!}\b0
dengan hasil dan tindakan sebagai berikut:\par\par
\b A. PEMERIKSAAN MULUT DAN GIGI (ODONTOGRAM)\b0\par
@php
    $toothNames = ['M3', 'M2', 'M1', 'P2', 'P1', 'C', 'I2', 'I1', 'I1', 'I2', 'C', 'P1', 'P2', 'M1', 'M2', 'M3'];
    // Border shorthand
    $bd = "\\clbrdrt\\brdrs\\brdrw10\\clbrdrl\\brdrs\\brdrw10\\clbrdrb\\brdrs\\brdrw10\\clbrdrr\\brdrs\\brdrw10";
    // Kolom: Rahang(900) + Status(1300) + 16 gigi x 450 = 7200 => total 9400
    $odonRow = "\\trowd\\trgaph50\\trleft360{$bd}\\cellx900{$bd}\\cellx1700";
    for ($t = 1; $t <= 16; $t++) {
        $odonRow .= "{$bd}\\cellx" . (1700 + ($t * 481));
    }
@endphp
{{-- Header Odontogram --}}
{!! $odonRow !!}
\pard\intbl\qc\fs16\b RAHANG\cell STATUS\cell
@foreach($toothNames as $tooth){!! $tooth !!}\cell
@endforeach\b0\fs20\row
{{-- Baris ATAS --}}
{!! $odonRow !!}
\pard\intbl\qc\fs16 ATAS\cell {!! $surat->mcu_data['odontogram_atas_status'] ?? 'Normal' !!}\cell
@for($i = 1; $i <= 16; $i++){!! $surat->mcu_data['odontogram_atas_g' . $i] ?? '-' !!}\cell @endfor\fs20\row
{{-- Baris BAWAH --}}
{!! $odonRow !!}
\pard\intbl\qc\fs16 BAWAH\cell {!! $surat->mcu_data['odontogram_bawah_status'] ?? 'Normal' !!}\cell
@for($i = 1; $i <= 16; $i++){!! $surat->mcu_data['odontogram_bawah_g' . $i] ?? '-' !!}\cell @endfor\fs20\row
\pard\sl276\slmult1\ql\par

\li360\b Hasil Pemeriksaan :\b0 {!! ($surat->hasil_pemeriksaan ?? '-') !!}\par\par
\b B. PERAWATAN YANG TELAH DILAKUKAN\b0\par
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
    \li360 [ {!! in_array($t, $tindakan_saved) ? 'X' : '  ' !!} ] {!! $t !!}\par
@endforeach
\par
\b C. RENCANA / PEMERIKSAAN LANJUTAN\b0\par
\li360 Pasien disarankan untuk menjalani pemeriksaan dan/atau perawatan lanjutan, berupa:\par
\li360 Kontrol ulang pada tanggal :
{!! $surat->kontrol_ulang ? \Carbon\Carbon::parse($surat->kontrol_ulang)->translatedFormat('d F Y') : '................' !!}\par
\li360 Perawatan lanjutan : \b {!! ($surat->saran ?? '-') !!}\b0\par\par
\pard\sl276\slmult1\ql Demikian surat keterangan ini dibuat dengan sebenar-benarnya untuk dapat dipergunakan sebagaimana
mestinya @if($surat->keperluan) untuk \b {!! strtoupper($surat->keperluan) !!}\b0 @endif.\par\par