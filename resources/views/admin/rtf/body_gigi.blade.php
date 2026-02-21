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
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx1200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2200
@for($i = 1; $i <= 16; $i++)\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx{!! 2200 + ($i * 450) !!}@endfor
\pard\intbl\qc\b RAHANG\cell STATUS\cell
@foreach(['M3', 'M2', 'M1', 'P2', 'P1', 'C', 'I2', 'I1', 'I1', 'I2', 'C', 'P1', 'P2', 'M1', 'M2', 'M3'] as $tooth){!! $tooth !!}\cell
@endforeach\b0\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx1200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2200
@for($i = 1; $i <= 16; $i++)\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx{!! 2200 + ($i * 450) !!}@endfor
\pard\intbl\qc ATAS\cell {!! $surat->mcu_data['odontogram_atas_status'] ?? '-' !!}\cell
@for($i = 1; $i <= 16; $i++){!! $surat->mcu_data['odontogram_atas_g' . $i] ?? '' !!}\cell @endfor\row
\trowd\trgaph108\trleft360\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx1200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2200
@for($i = 1; $i <= 16; $i++)\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx{!! 2200 + ($i * 450) !!}@endfor
\pard\intbl\qc BAWAH\cell {!! $surat->mcu_data['odontogram_bawah_status'] ?? '-' !!}\cell
@for($i = 1; $i <= 16; $i++){!! $surat->mcu_data['odontogram_bawah_g' . $i] ?? '' !!}\cell @endfor\row
\par
\li360\b Hasil Pemeriksaan :\b0\space {!! ($surat->hasil_pemeriksaan ?? '-') !!}\par\par
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
    \li360 [ {!! in_array($t, $tindakan_saved) ? 'X' : '  ' !!} ] {!! $t !!}\par
@endforeach
\par
\b 3. Rencana / Pemeriksaan Lanjutan\b0\par
\li360 Pasien disarankan untuk menjalani pemeriksaan dan/atau perawatan lanjutan, berupa:\par
\li360 Kontrol ulang pada tanggal :
{!! $surat->kontrol_ulang ? \Carbon\Carbon::parse($surat->kontrol_ulang)->translatedFormat('d F Y') : '................' !!}\par
\li360 Perawatan lanjutan : \b {!! ($surat->saran ?? '-') !!}\b0\par\par
\pard\sl276\slmult1\ql Demikian surat keterangan ini dibuat dengan sebenar-benarnya untuk dapat dipergunakan sebagaimana
mestinya @if($surat->keperluan) untuk \b {!! strtoupper($surat->keperluan) !!}\b0 @endif.\par\par