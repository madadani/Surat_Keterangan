@php
    $judul_surat = strtoupper($surat->tipe_berkas);
    if ($surat->tipe_berkas == 'Kesehatan') {
        if ($surat->hasil_pemeriksaan == 'Sehat Fisik') {
            $judul_surat = 'SURAT KETERANGAN SEHAT FISIK';
        } elseif ($surat->hasil_pemeriksaan == 'Sehat Jasmani') {
            $judul_surat = 'SURAT KETERANGAN SEHAT JASMANI';
        } else {
            $judul_surat = 'SURAT KETERANGAN SEHAT';
        }
    } elseif (str_contains($surat->tipe_berkas, 'Jiwa')) {
        $judul_surat = 'SURAT KETERANGAN KESEHATAN JIWA';
    } elseif (str_contains($surat->tipe_berkas, 'Narkoba')) {
        $judul_surat = 'SURAT KETERANGAN BEBAS NARKOBA';
    } elseif (str_contains($surat->tipe_berkas, 'TKHI')) {
        $judul_surat = 'LEMBAR BANTU\\par PEMERIKSAAN KESEHATAN TAHUN ' . date('Y');
    } elseif (str_contains($surat->tipe_berkas, 'THT')) {
        $judul_surat = 'SURAT KETERANGAN DOKTER';
    } elseif (str_contains($surat->tipe_berkas, 'Dalam') || str_contains($surat->tipe_berkas, 'Orthopedi') || str_contains($surat->tipe_berkas, 'Ortopedi')) {
        $judul_surat = 'SURAT KETERANGAN SEHAT';
    } elseif (str_contains($surat->tipe_berkas, 'Paru')) {
        $judul_surat = 'SURAT KETERANGAN DOKTER';
    } else {
        $judul_surat = 'SURAT KETERANGAN ' . strtoupper($surat->tipe_berkas);
    }

    $isModern = str_contains($surat->tipe_berkas, 'TKHI');
    $fontCode = $isModern ? "\\f0\\fs20" : "\\f1\\fs24";
    $titleSize = $isModern ? "\\fs24" : "\\fs28";
    $tab_set = "\\tx3300";

    $isMayaMengetahui = str_contains($m_nama, 'Mayasari Ayu Hendrawati');
    $isMayaPemeriksa = str_contains($surat->dokter->nama_dokter, 'Mayasari Ayu Hendrawati');
@endphp
{\rtf1\ansi\ansicpg1252\deff0{\fonttbl{\f0\fswiss\fcharset0 Arial;}{\f1\froman\fcharset0 Times New
Roman;}{\f2\fnil\fcharset128 MS Gothic;}}
\paperw11906\paperh16838\margl992\margr1134\margt567\margb709
{\colortbl ;\red0\green0\blue0;\red211\green227\blue253;}
{\header\pard\trowd\trgaph108\trleft-108
\clvertalc\cellx1200\clvertalc\cellx8800\clvertalc\cellx10200
\pard\intbl\qc {!! $logoSragen !!} \cell
\pard\intbl\qc\f1\fs24 PEMERINTAH KABUPATEN SRAGEN\par
\fs32\b RSUD dr. SOERATNO GEMOLONG\par
\b0\fs20 Jl. R. Ngt. Tjitrosantjoko 10, Gemolong, Sragen, Jawa Tengah 57274\par
\fs18 Telp. (0271) 6811839, Laman: rsudgemolong.sragenkab.go.id, Pos-el: rsudgemolong@gmail.com\cell
\pard\intbl\qc {!! $logoRS !!} \cell\row
\pard\sb0\sa0\sl-20\slmult0\brdrb\brdrs\brdrw15\fs1\par
\pard\sb0\sa0\sl-20\slmult0\brdrb\brdrs\brdrw45\fs1\par\fs24\par}
\pard\sl276\slmult1\qc\b{!! $titleSize !!} @if(!str_contains($judul_surat, 'LEMBAR BANTU'))\ul
{!! $judul_surat !!}\ulnone\par @else {!! $judul_surat !!}\par @endif
\b0{!! $fontCode !!} No. {!! $surat->nomor_surat !!}\par\par
@if($surat->tipe_berkas == 'Kesehatan Mata' || str_contains($surat->tipe_berkas, 'Mata'))
    @include('admin.rtf.body_mata')
@elseif($surat->tipe_berkas == 'Dalam')
    @include('admin.rtf.body_dalam')
@elseif(str_contains($surat->tipe_berkas, 'Ortho'))
    @include('admin.rtf.body_orthopedi')
@elseif($surat->tipe_berkas == 'Kesehatan' || str_contains($surat->tipe_berkas, 'Poli'))
    @include('admin.rtf.body_kesehatan')
@elseif(str_contains($surat->tipe_berkas, 'Paru'))
    @include('admin.rtf.body_paru')
@elseif($surat->tipe_berkas == 'Kesehatan Jiwa')
    @include('admin.rtf.body_jiwa')
@elseif($surat->tipe_berkas == 'Bebas Narkoba')
    @include('admin.rtf.body_narkoba')
@elseif(str_contains($surat->tipe_berkas, 'THT'))
    @include('admin.rtf.body_tht')
@elseif($surat->tipe_berkas == 'Kesehatan Gigi')
    @include('admin.rtf.body_gigi')
@elseif($surat->tipe_berkas == 'Kesehatan Jantung')
    @include('admin.rtf.body_jantung')
@elseif($surat->tipe_berkas === 'Kesehatan TKHI')
    @include('admin.rtf.body_tkhi')
@elseif($surat->tipe_berkas === 'Resume MCU')
    @include('admin.rtf.body_resume_mcu')
@endif
@php
    $isDualSig = str_contains($surat->tipe_berkas, 'Jantung') ||
        $surat->tipe_berkas == 'Kesehatan' ||
        str_contains($surat->tipe_berkas, 'Jasmani') ||
        str_contains($surat->tipe_berkas, 'Fisik') ||
        str_contains($surat->tipe_berkas, 'Orthopedi') ||
        str_contains($surat->tipe_berkas, 'Ortopedi') ||
        str_contains($surat->tipe_berkas, 'Gigi') ||
        str_contains($surat->tipe_berkas, 'Jiwa') ||
        str_contains($surat->tipe_berkas, 'Dalam') ||
        str_contains($surat->tipe_berkas, 'Mata') ||
        str_contains($surat->tipe_berkas, 'Paru') ||
        $surat->tipe_berkas == 'Resume MCU' ||
        str_contains($surat->tipe_berkas, 'TKHI') ||
        str_contains($surat->tipe_berkas, 'Poli');
@endphp
@if(
        str_contains($surat->tipe_berkas, 'Jantung') ||
        $surat->tipe_berkas == 'Kesehatan' ||
        str_contains($surat->tipe_berkas, 'Jasmani') ||
        str_contains($surat->tipe_berkas, 'Fisik') ||
        str_contains($surat->tipe_berkas, 'Orthopedi') ||
        str_contains($surat->tipe_berkas, 'Ortopedi') ||
        str_contains($surat->tipe_berkas, 'Gigi') ||
        str_contains($surat->tipe_berkas, 'Jiwa') ||
        str_contains($surat->tipe_berkas, 'Dalam') ||
        str_contains($surat->tipe_berkas, 'Mata') ||
        str_contains($surat->tipe_berkas, 'Paru') ||
        $surat->tipe_berkas == 'Resume MCU' ||
        str_contains($surat->tipe_berkas, 'TKHI') ||
        str_contains($surat->tipe_berkas, 'Poli')
    )
    @if(!str_contains($surat->tipe_berkas, 'Gigi') && !str_contains($surat->tipe_berkas, 'THT'))
        \trowd\trgaph108\trleft-108\clvertalt\cellx5000\clvertalt\cellx10000
        \pard\intbl\qc Mengetahui\par Kepala Bidang Pelayanan RSUD dr. Soeratno\par Gemolong Kabupaten Sragen\cell
        \pard\intbl\qc Sragen, {!! $tanggal_cetak !!}\par Dokter Pemeriksa\cell\row
        \trowd\trgaph108\trleft-108\clvertalt\cellx5000\clvertalt\cellx10000
        \pard\intbl\qc @if($isMayaMengetahui) {!! $ttdMaya !!}\par @else \par\par\par\par\par @endif
        \pard\intbl\qc\b\ul {!! trim($m_nama) !!}\ulnone\b0\par
        \pard\intbl\qc NIP. {!! trim($m_nip) !!}\cell
        \pard\intbl\qc @if($isMayaPemeriksa) {!! $ttdMaya !!}\par @else \par\par\par @endif
        \pard\intbl\qc\b\ul{\expndtw-15 {!! trim($surat->dokter->nama_dokter) !!}\expndtw0}\ulnone\b0\par
        \pard\intbl\qc {!! ($surat->identitas_pemeriksa ?? 'NIP') !!}.
        {!! trim(preg_replace('/\s+/', ' ', ($surat->identitas_pemeriksa === 'SIP' ? ($surat->dokter->sip ?? '-') : ($surat->dokter->nip ?? '-')))) !!}\cell\row\pard\par
    @endif
@endif
@if(!str_contains($surat->tipe_berkas, 'TKHI') && !$isDualSig)
    \pard\intbl\trowd\trgaph108\trleft-108\clvertalt\cellx4800\clvertalt\cellx10200
    \pard\intbl\sl360\slmult1\cell\ql Gemolong, {!! $tanggal_cetak !!}\cell\row
    \trowd\trgaph108\trleft-108\clvertalt\cellx4800\clvertalt\cellx10200
    \pard\intbl\sl360\slmult1\cell\ql Tanda tangan,\cell\row
    \trowd\trgaph108\trleft-108\clvertalt\cellx4800\clvertalt\cellx10200
    \pard\intbl\sl360\slmult1\cell\ql @if($isMayaPemeriksa) {!! $ttdMaya !!} @else \par\par\par\par @endif \cell\row
    \trowd\trgaph108\trleft-108\clvertalt\cellx4800\clvertalt\cellx10200
    \pard\intbl\sl360\slmult1\cell\ql Dokter Pemeriksa :\cell\row
    \trowd\trgaph108\trleft-108\clvertalt\cellx4800\clvertalt\cellx10200
    \pard\intbl\sl360\slmult1\cell\ql \b ( {!! $surat->dokter->nama_dokter !!} )\b0\cell\row
@endif
}