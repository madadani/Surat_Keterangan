\pard\sl276\slmult1\ql Yang bertandatangan dibawah ini, Dokter spesialis Jantung Rumah Sakit Umum Daerah dr. Soeratno
Gemolong Kabupaten Sragen, dengan ini menerangkan bahwa :\par\par
\pard\sl360\slmult1\ql\li720\fi-720\tx720\tx2800\tx3100\f1\fs24 Nama Lengkap\tab : \tab \b
{!! strtoupper($pendaftar->nama_lengkap) !!}\b0\par
Umur\tab : \tab \b {!! $umur !!} Tahun\b0\par
Jenis Kelamin\tab : \tab \b {!! $pendaftar->jenis_kelamin !!}\b0\par
Pekerjaan\tab : \tab \b {!! ($surat->pekerjaan ?? '-') !!}\b0\par
Alamat\tab : \tab \b {!! $pendaftar->alamat !!}\b0\par\par
\b I. PEMERIKSAAN PENUNJANG\b0\par
\li360\tx3200 1. Kesimpulan EKG\tab : {!! ($surat->mcu_data['jantung_ekg'] ?? '-') !!}\par
\li360\tx3200 2. Kesimpulan Treadmill Stress\tab : {!! ($surat->mcu_data['jantung_treadmill'] ?? '-') !!}\par
\li360\tx3200 3. Kesimpulan Echocardiografi\tab : {!! ($surat->mcu_data['jantung_echo'] ?? '-') !!}\par\par
\b II. KESIMPULAN\b0\par
\li360 Telah diperiksa dengan teliti dan berpendapat bahwa yang diperiksa :\par
\li360 \b {!! strtoupper($surat->hasil_pemeriksaan) !!}\b0\par
\li360 Keterangan / Saran : {!! $surat->saran ?? 'Tidak Ada' !!}\par\par
\pard\sl276\slmult1\ql Demikian surat keterangan ini dibuat untuk dapat dipergunakan seperlunya.\par\par