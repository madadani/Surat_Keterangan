\pard\sl276\slmult1\ql\qj Yang Bertandatangan dibawah ini, dokter Spesialis THTKL bertugas di RSUD dr. Soeratno,
Gemolong, Kabupaten Sragen menerangkan dengan sesungguhnya bahwa :\par\par
\pard\sl276\slmult1\ql\li360 {!! $tab_set !!} Nama\tab : \b {!! $pendaftar->nama_lengkap !!}\b0\par
{!! $tab_set !!} Jenis Kelamin\tab : \b {!! $pendaftar->jenis_kelamin !!}\b0\par
{!! $tab_set !!} Umur\tab : \b {!! $umur !!} Tahun\b0\par
{!! $tab_set !!} Alamat\tab : \b {!! $pendaftar->alamat !!}\b0\par
{!! $tab_set !!} Tinggi/Berat Badan\tab : \b {!! $surat->tinggi_badan ?? '-' !!} cm / {!! $surat->berat_badan ?? '-' !!}
kg\b0\par
{!! $tab_set !!} Tekanan Darah\tab : \b {!! $surat->tensi ?? '-' !!} mmHg\b0\par
{!! $tab_set !!} Golongan Darah\tab : \b {!! $surat->golongan_darah ?? '-' !!}\b0\par\par
\pard\sl276\slmult1\ql Test pendengaran kuantitatif (bisik) : \b {!! $surat->tes_bisik ?? '-' !!}\b0\par\par
@php
    $bd = "\\clbrdrt\\brdrs\\brdrw10\\clbrdrl\\brdrs\\brdrw10\\clbrdrb\\brdrs\\brdrw10\\clbrdrr\\brdrs\\brdrw10";
@endphp
\trowd\trgaph108\trleft360{!! $bd !!}\cellx2800{!! $bd !!}\cellx5200{!! $bd !!}\cellx7300{!! $bd !!}\cellx9400
\pard\intbl\ql\b Telinga Kanan\b0\cell {!! $surat->telinga_kanan ?? '-' !!}\cell\b Hidung\b0\cell
{!! $surat->hidung ?? '-' !!}\cell\row
\trowd\trgaph108\trleft360{!! $bd !!}\cellx2800{!! $bd !!}\cellx5200{!! $bd !!}\cellx7300{!! $bd !!}\cellx9400
\pard\intbl\ql\b Telinga Kiri\b0\cell {!! $surat->telinga_kiri ?? '-' !!}\cell\b Tenggorokan\b0\cell
{!! $surat->tenggorokan ?? '-' !!}\cell\row
\pard\sl276\slmult1\ql\par
@if(isset($surat->mcu_data['hasil_pemeriksaan_detail_tht']) && $surat->mcu_data['hasil_pemeriksaan_detail_tht'])
    \b Hasil Pemeriksaan Detail :\b0 {!! $surat->mcu_data['hasil_pemeriksaan_detail_tht'] !!}\par\par
@endif
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