\pard\sl276\slmult1\ql\b DATA PASIEN\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4900\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2400\ql Nama\tab : {!! $pendaftar->nama_lengkap !!}\cell\pard\intbl\sl360\slmult1\tx2400\ql
No. Lab\tab : {!! ($surat->no_lab ?? '-') !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4900\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2400\ql Tgl Lahir\tab : {!! $tanggal_lahir !!}\cell\pard\intbl\sl360\slmult1\tx2400\ql Jenis
Kelamin\tab : {!! $pendaftar->jenis_kelamin !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2400\ql Alamat\tab : {!! $pendaftar->alamat !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4900\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2400\ql No. Registrasi\tab : \b
{!! ($pendaftar->no_registrasi ?? '-') !!}\b0\cell\pard\intbl\sl360\slmult1\tx2400\ql Perusahaan\tab :
{!! ($surat->perusahaan ?? '-') !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2400\ql Tgl Medical\tab : {!! $tanggal_cetak !!}\cell\row
\pard\par
\pard\sl276\slmult1\ql\b A. PEMERIKSAAN FISIK :\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx3200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx6500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2000\ql Tinggi badan\tab : {!! $surat->tinggi_badan !!}
cm\cell\pard\intbl\sl360\slmult1\tx2000\ql BMI\tab : {!! ($surat->mcu_data['bmi'] ?? '-') !!}
Kg/m2\cell\pard\intbl\sl360\slmult1\tx2000\ql Lk. Dada\tab : {!! ($surat->mcu_data['lk_dada'] ?? '-') !!} cm\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx3200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx6500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2000\ql Berat badan\tab : {!! $surat->berat_badan !!}
kg\cell\pard\intbl\sl360\slmult1\tx2000\ql BMI Kategori\tab :
{!! ($surat->mcu_data['bmi_kat'] ?? '-') !!}\cell\pard\intbl\sl360\slmult1\tx2000\ql Lk. Perut\tab :
{!! ($surat->mcu_data['lk_perut'] ?? '-') !!} cm\cell\row
\pard\i\fs18 Keterangan : BMI Kategori kosong sama dengan Normal\i0\fs20\par
\pard\sl276\slmult1\ql\b Tekanan darah\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4900\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2400\ql Systolic/Diastolic\tab : {!! $surat->tensi !!}
mmHg\cell\pard\intbl\sl360\slmult1\tx2400\ql RR\tab : {!! $surat->respirasi !!} x/menit\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4900\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2400\ql HR\tab : {!! $surat->nadi !!} x/menit\cell\pard\intbl\sl360\slmult1\tx2400\ql
Suhu\tab : {!! $surat->suhu !!} C\cell\row
\pard\par
\pard\sl276\slmult1\ql\b B. PEMERIKSAAN FUNGSI PENGLIHATAN (VISUS)\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4900\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2800\ql OD tanpa kacamata\tab :
{!! ($surat->mcu_data['od_tanpa'] ?? '-') !!}\cell\pard\intbl\sl360\slmult1\tx2800\ql OD dengan kacamata\tab :
{!! ($surat->mcu_data['od_kaca'] ?? '-') !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4900\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2800\ql OS tanpa kacamata\tab :
{!! ($surat->mcu_data['os_tanpa'] ?? '-') !!}\cell\pard\intbl\sl360\slmult1\tx2800\ql OS dengan kacamata\tab :
{!! ($surat->mcu_data['os_kaca'] ?? '-') !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2800\ql Buta Warna\tab : {!! $surat->buta_warna !!}\cell\row
\pard\par
\pard\sl276\slmult1\ql\b C. PEMERIKSAAN ORGAN SUPERFISIAL :\b0\par
@php
    $sParts = ['Mata', 'Telinga', 'Hidung', 'Mulut', 'Faring/laring', 'Konsil', 'Tyroid', 'Lymp Node', 'Dada', 'Perut', 'Hernia', 'Anus', 'Payudara', 'Varises/Hemorid'];
@endphp
@for($i = 0; $i < count($sParts); $i += 2)
    @php
        $p1 = $sParts[$i];
        $v1 = $surat->mcu_data['super_' . \Illuminate\Support\Str::slug($p1)] ?? 'DBN';
        $p2 = $sParts[$i + 1] ?? '';
        $v2 = $p2 ? ($surat->mcu_data['super_' . \Illuminate\Support\Str::slug($p2)] ?? 'DBN') : '';
    @endphp
    \trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4900\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
    \pard\intbl\sl360\slmult1\tx2400\ql {!! $p1 !!}\tab : {!! $v1 !!}\cell\pard\intbl\sl360\slmult1\tx2400\ql
    {!! ($p2 ? $p2 . "\tab : " . $v2 : "") !!}\cell\row
@endfor
\pard\par
\page
\pard\sl276\slmult1\ql\b D. PEMERIKSAAN ORGAN VISCERAL\b0\par
@php
    $vItems = ['PARU DAN SISTEM PERNAFASAN' => 'visc_paru', 'JANTUNG DAN SISTEM CARDIOVASCULAR' => 'visc_jantung', 'HATI, LIMPA, DAN SISTEM GIT' => 'visc_hati', 'GINJAL DAN SISTEM UROGENETAL' => 'visc_ginjal', 'SISTEM REPRODUKSI' => 'visc_reproduksi'];
@endphp
@foreach($vItems as $lbl => $key)
    \trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
    \pard\intbl\sl360\slmult1\tx5000\ql \b {!! $lbl !!}\b0\tab : {!! ($surat->mcu_data[$key] ?? 'DBN/Normal') !!}\cell\row
@endforeach
\pard\par
\pard\sl276\slmult1\ql\b E. PEMERIKSAAN EXTREMITAS OTOT DAN TULANG :\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl276\slmult1\ql
{!! ($surat->mcu_data['extremitas'] ?? 'Akral Hangat, Edema (-/-), Motorik Normal') !!}\cell\row
\pard\par
\pard\sl276\slmult1\ql\b F. PEMERIKSAAN MULUT DAN GIGI :\b0\par
\pard\qc\b Kelainan Mulut dan Gigi\b0\par
\trowd\trgaph30\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx1200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx2000
@for($x = 1; $x <= 13; $x++) \clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx{!! (2000 + ($x * 600)) !!}
@endfor
\pard\intbl\sl240\slmult1\qc\b GIGI\line ATAS\cell Pos\cell M3\cell M2\cell M1\cell P2\cell P1\cell C\cell I2\cell
I1\cell I1\cell I2\cell C\cell P1\cell P2\cell\row
\trowd\trgaph30\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx2000
@for($x = 1; $x <= 13; $x++) \clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx{!! (2000 + ($x * 600)) !!}
@endfor
\pard\intbl\sl240\slmult1\ql\b Kelainan\cell
@for($x = 1; $x <= 13; $x++){!! ($surat->mcu_data['gigi_atas_' . $x] ?? '') !!}\cell @endfor\row
\trowd\trgaph30\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx1200\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx2000
@for($x = 1; $x <= 13; $x++) \clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx{!! (2000 + ($x * 600)) !!}
@endfor
\pard\intbl\sl240\slmult1\qc\b GIGI\line BAWAH\cell Pos\cell M3\cell M2\cell M1\cell P2\cell P1\cell C\cell I2\cell
I1\cell I1\cell I2\cell C\cell P1\cell P2\cell\row
\trowd\trgaph30\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx2000
@for($x = 1; $x <= 13; $x++) \clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx{!! (2000 + ($x * 600)) !!}
@endfor
\pard\intbl\sl240\slmult1\ql\b Kelainan\cell
@for($x = 1; $x <= 13; $x++){!! ($surat->mcu_data['gigi_bawah_' . $x] ?? '') !!}\cell @endfor\row
\pard\par
\pard\sl276\slmult1\ql\b G. PEMERIKSAAN SYARAF DAN SISTEM KOORDINASI :\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4900\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2800\ql Ref. Patologis\tab :
{!! ($surat->mcu_data['saraf_ref'] ?? '-') !!}\cell\pard\intbl\sl360\slmult1\tx2800\ql Lassague/Patrick\tab :
{!! ($surat->mcu_data['saraf_lass'] ?? '-') !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4900\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2800\ql Romberg Test\tab :
{!! ($surat->mcu_data['saraf_romb'] ?? '-') !!}\cell\pard\intbl\sl360\slmult1\tx2800\ql Finger To Finger\tab :
{!! ($surat->mcu_data['saraf_ftf'] ?? '-') !!}\cell\row
\pard\par
\pard\sl276\slmult1\qc\b KESIMPULAN PEMERIKSAAN FISIK DAN REKOMENDASI\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2500\ql Pemeriksaan Fisik\tab :
{!! ($surat->mcu_data['kesimpulan_fisik'] ?? 'DBN') !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2500\ql Kesimp. Fisik\tab : {!! ($surat->hasil_pemeriksaan) !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2500\ql Saran\tab : {!! ($surat->saran) !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2500\ql Rekomendasi\tab : {!! ($surat->mcu_data['rekomendasi'] ?? '-') !!}\cell\row
\pard\par
\page
\pard\sl276\slmult1\qc\b\fs24 RIWAYAT KESEHATAN\b0\fs20\par
\pard\sl276\slmult1\ql\b DATA PASIEN\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4900\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2400\ql Nama\tab : {!! $pendaftar->nama_lengkap !!}\cell\pard\intbl\sl360\slmult1\tx2400\ql
No. Lab\tab : {!! ($surat->no_lab ?? '-') !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4900\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2400\ql Tgl Lahir\tab : {!! $tanggal_lahir !!}\cell\pard\intbl\sl360\slmult1\tx2400\ql Jenis
Kelamin\tab : {!! $pendaftar->jenis_kelamin !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2400\ql Alamat\tab : {!! $pendaftar->alamat !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4900\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2400\ql Perusahaan\tab :
{!! ($surat->perusahaan ?? '-') !!}\cell\pard\intbl\sl360\slmult1\tx2400\ql Tanggal Medical\tab :
{!! $tanggal_cetak !!}\cell\row
\pard\par
\pard\sl276\slmult1\ql\b A. RIWAYAT KESEHATAN PRIBADI\b0\par
@php
    $histories = [
        ['Darah Tinggi', 'Sakit Ginjal'],
        ['Nyeri Dada Kiri', 'Kencing Darah'],
        ['Sering Berdebar-debar', 'Kencing Manis'],
        ['Rematik', 'Sakit Liver/Hepatitis'],
        ['Batuk lama/kronis/berdarah', 'Benjolan/Tumor di tubuh'],
        ['TBC/Paru-paru', 'Alergi Udara/Makanan/Obat'],
        ['Maag', 'Mata tdk normal/ggn mata'],
        ['Berak Darah/Ambien', 'Kecelakaan/Benturan kepala'],
        ['Ashma', 'Keluar nanah dari telinga'],
        ['Gondok', 'Lain-lain']
    ];
@endphp
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx3500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4900\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx8400\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\qc\b Penyakit/Keluhan\cell Ya/Tidak\cell Penyakit/Keluhan\cell Ya/Tidak\cell\b0\row
@foreach($histories as $row)@php $v1 = ($surat->mcu_data['hist_' . \Illuminate\Support\Str::slug($row[0])] ?? '') == 'Ya' ? 'YA' : 'TIDAK';
    $v2 = ($surat->mcu_data['hist_' . \Illuminate\Support\Str::slug($row[1])] ?? '') == 'Ya' ? 'YA' : 'TIDAK'; @endphp\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx3500\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4900\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx8400\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800\pard\intbl\sl360\slmult1
{!! $row[0] !!}\cell\qc {!! $v1 !!}\cell {!! $row[1] !!}\cell\qc {!! $v2 !!}\cell\row @endforeach
\pard\par
\pard\sl276\slmult1\li360 \bullet Pernahkah Anda Kejang-kejang / Pingsan :
{!! ($surat->mcu_data['hist_kejang'] ?? '-') !!}\par
\pard\sl276\slmult1\li720 Penyebab Pingsan : {!! ($surat->mcu_data['hist_kejang_ket'] ?? '-') !!}\par
\pard\sl276\slmult1\li360 \bullet Pernahkah Anda dirawat di rumah sakit :
{!! ($surat->mcu_data['hist_rawat'] ?? '-') !!}\par
\pard\sl276\slmult1\li720 Sakit apa, Tahun berapa : {!! ($surat->mcu_data['hist_rawat_ket'] ?? '-') !!}\par\par
\pard\sl276\slmult1\ql\b Kebiasaan Sehari-hari\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7000\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\qc\b Jenis\cell Ya/Tidak\cell\b0\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7000\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1 Sering minum-minum beralkohol\cell\qc
{!! ($surat->mcu_data['habit_alkohol'] ?? 'TIDAK') !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7000\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1 Apakah anda merokok\cell\qc {!! ($surat->mcu_data['habit_rokok'] ?? 'TIDAK') !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7000\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1 Apakah anda mengkonsumsi Narkoba\cell\qc
{!! ($surat->mcu_data['habit_narkoba'] ?? 'TIDAK') !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7000\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1 Apakah anda sering minum obat tertentu\cell\qc
{!! ($surat->mcu_data['habit_obat'] ?? 'TIDAK') !!}\cell\row
\pard\par
\pard\sl276\slmult1\ql\b RIWAYAT KESEHATAN ORANG TUA\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7000\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\qc\b Penyakit/Keluhan\cell Ya/Tidak\cell\b0\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx7000\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1 Riwayat Penyakit Kronis (Penyakit Jantung, Ginjal, dll)\cell\qc
{!! ($surat->mcu_data['hist_ortu'] ?? 'TIDAK') !!}\cell\row
\pard\par
\page
\pard\sl276\slmult1\qc\b\fs24 RESUME HASIL PEMERIKSAAN\b0\fs20\par
\pard\sl276\slmult1\ql\b DATA PASIEN\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4900\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2400\ql Nama\tab : {!! $pendaftar->nama_lengkap !!}\cell\pard\intbl\sl360\slmult1\tx2400\ql
No. Lab\tab : {!! ($surat->no_lab ?? '-') !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4900\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2400\ql Tanggal Lahir\tab : {!! $tanggal_lahir !!}\cell\pard\intbl\sl360\slmult1\tx2400\ql
Jenis Kelamin\tab : {!! $pendaftar->jenis_kelamin !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2400\ql Alamat\tab : {!! $pendaftar->alamat !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx4900\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2400\ql Perusahaan\tab :
{!! ($surat->perusahaan ?? '-') !!}\cell\pard\intbl\sl360\slmult1\tx2400\ql Tanggal Medical\tab :
{!! $tanggal_cetak !!}\cell\row
\pard\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2800\ql Laboratorium\tab : {!! ($surat->mcu_data['resume_lab'] ?? '-') !!}\cell\row
\pard\intbl\sl360\slmult1\tx2800\ql Fisik Dokter\tab : {!! ($surat->mcu_data['resume_fisik'] ?? '-') !!}\cell\row
\pard\intbl\sl360\slmult1\tx2800\ql Radiologi\tab : {!! ($surat->mcu_data['resume_radiologi'] ?? '-') !!}\cell\row
\pard\intbl\sl360\slmult1\tx2800\ql Pemerik. Tambahan\tab :
{!! ($surat->mcu_data['resume_tambahan'] ?? '-') !!}\cell\row
\pard\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\clbrdrl\brdrs\clbrdrb\brdrs\clbrdrr\brdrs\cellx9800
\pard\intbl\sl360\slmult1\tx2800\ql Kesimpulan\tab : {!! ($surat->hasil_pemeriksaan) !!}\cell\row
\pard\intbl\sl360\slmult1\tx2800\ql Saran\tab : {!! ($surat->saran) !!}\cell\row
\pard\par
\trowd\trgaph108\trleft-108\clvertalt\cellx5100\clvertalt\cellx10200
\pard\intbl\sl276\slmult1\qc Mengetahui\cell\qc Sragen, {!! $tanggal_cetak !!}\cell\row
\pard\intbl\sl276\slmult1\qc {!! $m_jabatan_fmt !!}\cell\qc Dokter yang memeriksa\cell\row
\trowd\trgaph108\trleft-108\clvertalt\cellx5100\clvertalt\cellx10200
\pard\intbl\sl276\slmult1\qc\par\par\par\par\b\ul {!! $m_nama !!}\ulnone\b0\line NIP.
{!! $m_nip !!}\cell\qc\par\par\par\par\b\ul {!! ($surat->dokter->nama_dokter) !!}\ulnone\b0\line NIP.
{!! ($surat->dokter->nip ?? '-') !!}\cell\row\pard\par