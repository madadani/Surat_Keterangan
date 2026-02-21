\pard\sl276\slmult1\ql\qj Yang bertandatangan dibawah ini dokter penguji kesehatan Rumah Sakit Umum Daerah dr. Soeratno
Gemolong Kabupaten Sragen, mengingat sumpah/janji jabatan, dengan ini menerangkan dengan sesungguhnya bahwa :\par\par
\pard\sl276\slmult1\ql\li360{!! $tab_set !!} Nama Lengkap\tab : \b {!! $pendaftar->nama_lengkap !!}\b0\par
{!! $tab_set !!} Tempat/Tanggal Lahir\tab : \b {!! $pendaftar->tempat_lahir !!}, {!! $tanggal_lahir !!}\b0\par
{!! $tab_set !!} Pekerjaan\tab : \b {!! $surat->pekerjaan ?? '-' !!}\b0\par
{!! $tab_set !!} Alamat\tab : \b {!! $pendaftar->alamat !!}\b0\par
{!! $tab_set !!} Tinggi/Berat Badan\tab : \b {!! $surat->tinggi_badan ?? '-' !!} cm / {!! $surat->berat_badan ?? '-' !!}
kg @if(isset($surat->mcu_data['bmi']))(IMT: {!! $surat->mcu_data['bmi'] !!})@endif\b0\par
{!! $tab_set !!} Tekanan Darah\tab : \b {!! $surat->tensi ?? '-' !!} mmHg\b0\par
{!! $tab_set !!} Nadi / Suhu / RR\tab : \b {!! $surat->nadi ?? '-' !!} x/mnt / {!! $surat->suhu ?? '-' !!} 'C /
{!! $surat->respirasi ?? '-' !!} x/mnt\b0\par
{!! $tab_set !!} Pemeriksaan Fisik\tab : \b Gangguan Motorik :
{!! isset($surat->mcu_data['gangguan_motorik']) ? ($surat->mcu_data['gangguan_motorik'] == 'Tidak' ? 'TIDAK ADA' : strtoupper($surat->mcu_data['gangguan_motorik'])) : '-' !!}\b0\par
\tab\b Disabilitas :
{!! isset($surat->mcu_data['disabilitas']) ? ($surat->mcu_data['disabilitas'] == 'Tidak' ? 'TIDAK ADA' : strtoupper($surat->mcu_data['disabilitas'])) : '-' !!}\b0\par
@if(isset($surat->mcu_data['keterangan_lainnya']) && $surat->mcu_data['keterangan_lainnya'])
    \tab\b Catatan : {!! $surat->mcu_data['keterangan_lainnya'] !!}\b0\par
@endif
\par
\pard\sl276\slmult1\ql\qj Telah diperiksa dengan teliti dan berpendapat bahwa yang diperiksa, ternyata \b :\par
\pard\sl276\slmult1\li720\sa100\b 1. SEHAT / TIDAK SEHAT *)\par
2. TIDAK BUTA WARNA / BUTA WARNA *)\b0\par
\pard\sl276\slmult1\li0\i\fs20 *) Coret yang tidak perlu\i0\fs24\par\par
\pard\sl276\slmult1\ql Keperluan : \b {!! strtoupper($surat->keperluan ?? '-') !!}\b0\par\par
\pard\sl276\slmult1\ql\qj Demikian Surat keterangan ini dibuat untuk dapat dipergunakan seperlunya.\par\par