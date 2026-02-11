@php
    $resmcu = $surat->mcu_data ?? [];
    $rp = function ($key) use ($resmcu) {
        return ($resmcu['rp_' . $key] ?? 'Tidak') == 'Ya' ? 'YA' : 'TIDAK';
    };
    $keb = function ($key) use ($resmcu) {
        return ($resmcu['keb_' . $key] ?? 'Tidak') == 'Ya' ? 'YA' : 'TIDAK';
    };
    $sup = function ($key) use ($resmcu) {
        return $resmcu['sup_' . $key] ?? 'Normal';
    };
    $vis = function ($key) use ($resmcu) {
        return $resmcu['vis_' . $key] ?? 'Normal';
    };
    $sya = function ($key) use ($resmcu) {
        return $resmcu['sya_' . $key] ?? 'Normal';
    };
    $pen = function ($key) use ($resmcu) {
        return $resmcu['penun_' . $key] ?? '-';
    };

    if (!function_exists('getGigi')) {
        function getGigi($matrix, $pos, $occ = 1)
        {
            if (!$matrix)
                return '';
            $items = explode(',', $matrix);
            $found_occ = 0;
            foreach ($items as $item) {
                $parts = explode(':', $item);
                if (count($parts) >= 2 && trim($parts[0]) === $pos) {
                    $found_occ++;
                    if ($found_occ == $occ) {
                        return trim($parts[1]);
                    }
                }
            }
            return '';
        }
    }
@endphp

\pard\sl276\slmult1\b\fs24 I. DATA PASIEN\b0\par
\trowd\trgaph108\trleft-108\clvertalt\cellx2000\clvertalt\cellx5000\clvertalt\cellx7000\clvertalt\cellx10000
\pard\intbl\ql Nama\cell\pard\intbl\ql : {!! $pendaftar->nama_lengkap !!}\cell\pard\intbl\ql No. Lab\cell\pard\intbl\ql
: {!! $resmcu['no_lab'] ?? '-' !!}\cell\row
\trowd\trgaph108\trleft-108\clvertalt\cellx2000\clvertalt\cellx5000\clvertalt\cellx7000\clvertalt\cellx10000
\pard\intbl\ql Tgl Lahir\cell\pard\intbl\ql : {!! $tanggal_lahir !!}\cell\pard\intbl\ql Jenis Kelamin\cell\pard\intbl\ql
: {!! $pendaftar->jenis_kelamin !!}\cell\row
\trowd\trgaph108\trleft-108\clvertalt\cellx2000\clvertalt\cellx10000
\pard\intbl\ql Alamat\cell\pard\intbl\ql : {!! $pendaftar->alamat !!}\cell\row
\trowd\trgaph108\trleft-108\clvertalt\cellx2000\clvertalt\cellx5000\clvertalt\cellx7000\clvertalt\cellx10000
\pard\intbl\ql Perusahaan\cell\pard\intbl\ql : {!! $resmcu['perusahaan'] ?? '-' !!}\cell\pard\intbl\ql Tgl
Periksa\cell\pard\intbl\ql : {!! $tanggal_cetak !!}\cell\row
\pard\par

\b II. RIWAYAT KESEHATAN\b0\par
\b A. RIWAYAT KESEHATAN PRIBADI\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx3500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx8500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10000
\pard\intbl\ql\b Penyakit/Keluhan\cell\pard\intbl\qc Ya/Tidak\cell\pard\intbl\ql Penyakit/Keluhan\cell\pard\intbl\qc
Ya/Tidak\b0\cell\row
@php
    $rp_list = [
        ['darah_tinggi' => 'Darah Tinggi', 'ginjal' => 'Sakit Ginjal'],
        ['nyeri_dada' => 'Nyeri Dada Kiri', 'kencing_darah' => 'Kencing Darah'],
        ['jantung' => 'Sering Berdebar', 'diabetes' => 'Kencing Manis'],
        ['rematik' => 'Rematik', 'liver' => 'Sakit Liver/Hepa'],
        ['batuk_darah' => 'Batuk Lama', 'tumor' => 'Benjolan/Tumor'],
        ['tbc' => 'TBC / Paru', 'alergi' => 'Alergi'],
        ['maag' => 'Maag', 'mata' => 'Gangguan Mata'],
        ['ambeien' => 'Ambeien', 'kepala' => 'Benturan Kepala'],
        ['asthma' => 'Asthma', 'telinga' => 'Nanah Telinga'],
        ['gondok' => 'Gondok', 'lainly' => 'Lain-lain'],
    ];
@endphp
@foreach($rp_list as $pair)
    @php
        $k1 = key($pair);
        $v1 = current($pair);
        next($pair);
        $k2 = key($pair);
        $v2 = current($pair);
    @endphp
    \trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx3500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx8500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10000
    \pard\intbl\ql {!! $v1 !!}\cell\pard\intbl\qc {!! $rp($k1) !!}\cell\pard\intbl\ql {!! $v2 !!}\cell\pard\intbl\qc
    {!! $rp($k2) !!}\cell\row
@endforeach
\pard\par
\pard\ql • Pernah Kejang/Pingsan : {!! $resmcu['kejang_pingsan'] ?? 'Tidak' !!}\par
\pard\ql • Pernah Dirawat di RS : {!! $resmcu['dirawat_rs'] ?? 'Tidak' !!}\par\par

\b B. KEBIASAAN SEHARI-HARI\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10000
\pard\intbl\ql\b Jenis Kebiasaan\cell\pard\intbl\qc Ya/Tidak\b0\cell\row
@foreach(['alkohol' => 'Minum Alkohol', 'merokok' => 'Merokok', 'narkoba' => 'Konsumsi Narkoba', 'obat' => 'Minum Obat Tertentu'] as $k => $l)
    \trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10000
    \pard\intbl\ql {!! $l !!}\cell\pard\intbl\qc {!! $keb($k) !!}\cell\row
@endforeach
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10000
\pard\intbl\ql Lain-lain\cell\pard\intbl\qc {!! $resmcu['keb_lain'] ?? '-' !!}\cell\row
\pard\par

\b III. PEMERIKSAAN FISIK\b0\par
\pard\ql Keadaan Umum : {!! $resmcu['keadaan_umum'] ?? 'Baik' !!}\par\par
\b Antropometri :\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10000
\pard\intbl\ql Tinggi Badan\cell\pard\intbl\ql : {!! $resmcu['tb'] ?? '-' !!} cm\cell\pard\intbl\ql
BMI\cell\pard\intbl\ql : {!! $resmcu['bmi'] ?? '-' !!} kg/m2\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10000
\pard\intbl\ql Berat Badan\cell\pard\intbl\ql : {!! $resmcu['bb'] ?? '-' !!} kg\cell\pard\intbl\ql Kategori
BMI\cell\pard\intbl\ql : {!! $resmcu['bmi_kat'] ?? '-' !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10000
\pard\intbl\ql Lk. Dada\cell\pard\intbl\ql : {!! $resmcu['lk_dada'] ?? '-' !!} cm\cell\pard\intbl\ql Lk.
Perut\cell\pard\intbl\ql : {!! $resmcu['lk_perut'] ?? '-' !!} cm\cell\row
\pard\par

\b Tekanan Darah :\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10000
\pard\intbl\ql Systolic\cell\pard\intbl\ql : {!! $resmcu['systolic'] ?? '-' !!} mmHg\cell\pard\intbl\ql
Diastolic\cell\pard\intbl\ql : {!! $resmcu['diastolic'] ?? '-' !!} mmHg\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10000
\pard\intbl\ql HR\cell\pard\intbl\ql : {!! $resmcu['hr'] ?? '-' !!} x/m\cell\pard\intbl\ql RR\cell\pard\intbl\ql :
{!! $resmcu['rr'] !!} x/m\cell\row
\pard\par

\b A. VISUS\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10000
\pard\intbl\ql OD Tanpa\cell\pard\intbl\ql : {!! $resmcu['visus_od_tanpa'] ?? '-' !!}\cell\pard\intbl\ql OD
Dengan\cell\pard\intbl\ql : {!! $resmcu['visus_od_dengan'] ?? '-' !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10000
\pard\intbl\ql OS Tanpa\cell\pard\intbl\ql : {!! $resmcu['visus_os_tanpa'] ?? '-' !!}\cell\pard\intbl\ql OS
Dengan\cell\pard\intbl\ql : {!! $resmcu['visus_os_dengan'] ?? '-' !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10000
\pard\intbl\ql Buta Warna\cell\pard\intbl\ql : {!! $resmcu['buta_warna'] ?? 'Tidak' !!}\cell\row
\pard\par

\b B. ORGAN SUPERFISIAL\b0\par
\trowd\trgaph108\trleft-108\@php
    $sup_list = [
        ['mata' => 'Mata', 'lymp_node' => 'Lymp Node'],
        ['telinga' => 'Telinga', 'dada' => 'Dada'],
        ['hidung' => 'Hidung', 'perut' => 'Perut'],
        ['mulut' => 'Mulut', 'hernia' => 'Hernia'],
        ['tenggorokan' => 'Faring/Laring', 'anus' => 'Anus'],
    ];
@endphp
@foreach($sup_list as $pair)
    @php $k1 = key($pair);
        $v1 = current($pair);
        next($pair);
        $k2 = key($pair);
    $v2 = current($pair); @endphp
        \trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10000
        \pard\intbl\ql {!! $v1 !!}\cell\pard\intbl\ql : {!! $sup($k1) !!}\cell\pard\intbl\ql {!! $v2 !!}\cell\pard\intbl\ql :
        {!! $sup($k2) !!}\cell\row
@endforeach
\pard\par

\b C. ORGAN VISCERAL\b0\par
\pard\ql Paru : {!! $vis('pernafasan') !!}\par
\pard\ql Jantung : {!! $vis('kardiovaskular') !!}\par
\pard\ql GIT : {!! $vis('git') !!}\par
\pard\ql Urogenital : {!! $vis('urogenital') !!}\par\par

\b D. PEMERIKSAAN EXTRIMITAS OTOT DAN TULANG :\b0\space {!! $resmcu['extrimitas'] ?? 'Normal' !!}\par\par

\b E. PEMERIKSAAN MULUT DAN GIGI :\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10200
\pard\intbl\ql Kelainan Mulut dan Gigi: {!! $resmcu['gigi_mulut'] ?? 'Normal' !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx1200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx3200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx3700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx8200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx8700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10200
\pard\intbl\qc\b\fs16 RAHANG\cell STATUS\cell M3\cell M2\cell M1\cell P2\cell P1\cell C\cell I2\cell I1\cell I1\cell I2\cell C\cell P1\cell P2\cell M1\cell M2\cell M3\b0\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx1200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx3200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx3700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx8200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx8700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10200
\pard\intbl\qc\fs16\b ATAS\cell Kelainan\cell {!! getGigi($resmcu['matrix_atas'] ?? '', 'M3', 1) !!}\cell {!! getGigi($resmcu['matrix_atas'] ?? '', 'M2', 1) !!}\cell {!! getGigi($resmcu['matrix_atas'] ?? '', 'M1', 1) !!}\cell {!! getGigi($resmcu['matrix_atas'] ?? '', 'P2', 1) !!}\cell {!! getGigi($resmcu['matrix_atas'] ?? '', 'P1', 1) !!}\cell {!! getGigi($resmcu['matrix_atas'] ?? '', 'C', 1) !!}\cell {!! getGigi($resmcu['matrix_atas'] ?? '', 'I2', 1) !!}\cell {!! getGigi($resmcu['matrix_atas'] ?? '', 'I1', 1) !!}\cell {!! getGigi($resmcu['matrix_atas'] ?? '', 'I1', 2) !!}\cell {!! getGigi($resmcu['matrix_atas'] ?? '', 'I2', 2) !!}\cell {!! getGigi($resmcu['matrix_atas'] ?? '', 'C', 2) !!}\cell {!! getGigi($resmcu['matrix_atas'] ?? '', 'P1', 2) !!}\cell {!! getGigi($resmcu['matrix_atas'] ?? '', 'P2', 2) !!}\cell {!! getGigi($resmcu['matrix_atas'] ?? '', 'M1', 2) !!}\cell {!! getGigi($resmcu['matrix_atas'] ?? '', 'M2', 2) !!}\cell {!! getGigi($resmcu['matrix_atas'] ?? '', 'M3', 2) !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx1200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx2700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx3200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx3700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx4700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx6700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx7700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx8200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx8700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9200\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx9700\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10200
\pard\intbl\qc\fs16\b BAWAH\cell Kelainan\cell {!! getGigi($resmcu['matrix_bawah'] ?? '', 'M3', 1) !!}\cell {!! getGigi($resmcu['matrix_bawah'] ?? '', 'M2', 1) !!}\cell {!! getGigi($resmcu['matrix_bawah'] ?? '', 'M1', 1) !!}\cell {!! getGigi($resmcu['matrix_bawah'] ?? '', 'P2', 1) !!}\cell {!! getGigi($resmcu['matrix_bawah'] ?? '', 'P1', 1) !!}\cell {!! getGigi($resmcu['matrix_bawah'] ?? '', 'C', 1) !!}\cell {!! getGigi($resmcu['matrix_bawah'] ?? '', 'I2', 1) !!}\cell {!! getGigi($resmcu['matrix_bawah'] ?? '', 'I1', 1) !!}\cell {!! getGigi($resmcu['matrix_bawah'] ?? '', 'I1', 2) !!}\cell {!! getGigi($resmcu['matrix_bawah'] ?? '', 'I2', 2) !!}\cell {!! getGigi($resmcu['matrix_bawah'] ?? '', 'C', 2) !!}\cell {!! getGigi($resmcu['matrix_bawah'] ?? '', 'P1', 2) !!}\cell {!! getGigi($resmcu['matrix_bawah'] ?? '', 'P2', 2) !!}\cell {!! getGigi($resmcu['matrix_bawah'] ?? '', 'M1', 2) !!}\cell {!! getGigi($resmcu['matrix_bawah'] ?? '', 'M2', 2) !!}\cell {!! getGigi($resmcu['matrix_bawah'] ?? '', 'M3', 2) !!}\cell\row
\pard\par\fs24
\b F. PEMERIKSAAN SYARAF DAN SISTEM KOORDINASI :\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx3500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx8000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10000
\pard\intbl\ql Refleks Patologis\cell\pard\intbl\ql : {!! $sya('patologis') !!}\cell\pard\intbl\ql Lassaque/Patrick sign\cell\pard\intbl\ql : {!! $sya('lassaque') !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx3500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx8000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10000
\pard\intbl\ql Parestesia\cell\pard\intbl\ql : {!! $sya('parestesia') !!}\cell\pard\intbl\ql Contra Patrick Sign\cell\pard\intbl\ql : {!! $sya('contra') !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx3500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx5500\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx8000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10000
\pard\intbl\ql Parese\cell\pard\intbl\ql : {!! $sya('parese') ?? 'Normal' !!}\cell\pard\intbl\ql\cell\pard\intbl\ql\cell\row
\pard\par

\b III. PEMERIKSAAN PENUNJANG\b0\par
\pard\ql Radiologi : {!! $pen('radiologi') !!}\par
\pard\ql Lab : {!! $pen('laboratorium') !!}\par
\pard\ql EKG : {!! $pen('ekg') !!}\par\par

\b KESIMPULAN & REKOMENDASI\b0\par
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx3000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10000
\pard\intbl\ql Pemeriksaan Fisik\cell\pard\intbl\ql : {!! $resmcu['kesimpulan_fisik'] ?? 'SEHAT' !!}\cell\row
\trowd\trgaph108\trleft-108\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx3000\clbrdrt\brdrs\brdrw10\clbrdrl\brdrs\brdrw10\clbrdrb\brdrs\brdrw10\clbrdrr\brdrs\brdrw10\cellx10000
\pard\intbl\ql Rekomendasi/Saran\cell\pard\intbl\ql : {!! $resmcu['rekomendasi'] ?? '-' !!}\cell\row
\pard\par