\pard\sl360\slmult1\ql\tx600\tx2400\tx2750\f1\fs24
1.\tab Nama\tab :\tab {!! strtoupper($pendaftar->nama_lengkap) !!}\par
2.\tab Umur\tab :\tab {!! $umur !!} Tahun\par
3.\tab Alamat\tab :\tab {!! $pendaftar->alamat !!}\par
4.\tab Hasil Pemeriksaan Mata\tab :\par
\pard\sl360\slmult1\ql\li360\tx2400\tx2750 - Visus OD (Kanan)\tab :\tab {!! $surat->visus_kanan ?? '-' !!}\par
- Visus OS (Kiri)\tab :\tab {!! $surat->visus_kiri ?? '-' !!}\par
- Segmen Anterior\tab :\tab {!! $surat->segmen_anterior ?? '-' !!}\par
- Buta Warna\tab :\tab \b BUTA WARNA / TIDAK BUTA WARNA\b0\par
\pard\sl360\slmult1\ql\tx600\tx2400\tx2750 5.\tab Kesimpulan\tab :\tab
\b NORMAL / TIDAK NORMAL\b0\par
\par
\pard\sl360\slmult1\ql\f1\fs24 Demikian surat keterangan ini dibuat untuk dapat dipergunakan seperlunya.\par\par