@php
    $resmcu = $surat->mcu_data ?? [];
    $rp = function ($key) use ($resmcu) {
        return ($resmcu['rp_' . $key] ?? 'Tidak') == 'Ya' ? 'YA' : 'TIDAK';
    };
    $keb = function ($key) use ($resmcu) {
        return ($resmcu['keb_' . $key] ?? 'Tidak') == 'Ya' ? 'YA' : 'TIDAK';
    };
@endphp

<div class="paper">
    @include('admin.cetak.partials.header')

    <div class="content" style="font-family: Arial, sans-serif; font-size: 11pt;">
        <h2 style="text-align: center; text-decoration: underline; margin-bottom: 20px;">RESUME PEMERIKSAAN FISIK</h2>

        <h3 style="margin-top: 30px;">I. DATA PASIEN</h3>
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <tr>
                <td style="width: 20%;">Nama</td>
                <td style="width: 2%;">:</td>
                <td style="width: 28%; border-bottom: 1px dotted #000;">{{ $surat->pendaftar->nama_lengkap }}</td>
                <td style="width: 20%; padding-left: 20px;">No. Lab</td>
                <td style="width: 2%;">:</td>
                <td style="width: 28%; border-bottom: 1px dotted #000;">{{ $resmcu['no_lab'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td style="border-bottom: 1px dotted #000;">
                    {{ \Carbon\Carbon::parse($surat->pendaftar->tanggal_lahir)->translatedFormat('d F Y') }}
                </td>
                <td style="padding-left: 20px;">Jenis Kelamin</td>
                <td>:</td>
                <td style="border-bottom: 1px dotted #000;">{{ $surat->pendaftar->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td colspan="4" style="border-bottom: 1px dotted #000;">{{ $surat->pendaftar->alamat }}</td>
            </tr>
            <tr>
                <td>Perusahaan</td>
                <td>:</td>
                <td style="border-bottom: 1px dotted #000;">{{ $resmcu['perusahaan'] ?? '-' }}</td>
                <td style="padding-left: 20px;">Tanggal Periksa</td>
                <td>:</td>
                <td style="border-bottom: 1px dotted #000;">
                    {{ \Carbon\Carbon::parse($surat->tanggal_cetak)->translatedFormat('d F Y') }}
                </td>
            </tr>
        </table>

        <h3 style="margin-top: 30px;">II. RIWAYAT KESEHATAN</h3>

        <div style="margin-left: 10px;">
            <h4>A. RIWAYAT KESEHATAN PRIBADI</h4>
            <table style="width: 100%; border: 1px solid #000; border-collapse: collapse;">
                <tr style="background: #f0f0f0;">
                    <th style="border: 1px solid #000; padding: 4px; width: 35%;">Penyakit/Keluhan</th>
                    <th style="border: 1px solid #000; padding: 4px; width: 15%;">Ya/Tidak</th>
                    <th style="border: 1px solid #000; padding: 4px; width: 35%;">Penyakit/Keluhan</th>
                    <th style="border: 1px solid #000; padding: 4px; width: 15%;">Ya/Tidak</th>
                </tr>
                @php
                    $rp_pairs = [
                        ['darah_tinggi' => 'Darah Tinggi', 'ginjal' => 'Sakit Ginjal'],
                        ['nyeri_dada' => 'Nyeri Dada Kiri', 'kencing_darah' => 'Kencing Darah'],
                        ['jantung' => 'Sering Berdebar-debar', 'diabetes' => 'Kencing Manis'],
                        ['rematik' => 'Rematik', 'liver' => 'Sakit Liver/Hepatitis/Kuning'],
                        ['batuk_darah' => 'Batuk Lama/Kronis/Berdarah', 'tumor' => 'Benjolan/Tumor di tubuh'],
                        ['tbc' => 'TBC / Paru-paru', 'alergi' => 'Alergi Udara/Mkn/Obat'],
                        ['maag' => 'Maag', 'mata' => 'Gangguan Mata'],
                        ['ambeien' => 'Berak Darah / Ambeien', 'kepala' => 'Kecelakaan/Benturan Kepala'],
                        ['asthma' => 'Asthma', 'telinga' => 'Keluar nanah dari telinga'],
                        ['gondok' => 'Gondok', 'lainly' => 'Lain-lain'],
                    ];
                @endphp
                @foreach($rp_pairs as $pair)
                    @php
                        $k1 = key($pair);
                        $v1 = current($pair);
                        next($pair);
                        $k2 = key($pair);
                        $v2 = current($pair);
                    @endphp
                    <tr>
                        <td style="border: 1px solid #000; padding: 4px;">{{ $v1 }}</td>
                        <td style="border: 1px solid #000; padding: 4px; text-align: center;">{{ $rp($k1) }}</td>
                        <td style="border: 1px solid #000; padding: 4px;">{{ $v2 }}</td>
                        <td style="border: 1px solid #000; padding: 4px; text-align: center;">{{ $rp($k2) }}</td>
                    </tr>
                @endforeach
            </table>

            <div style="margin-top: 10px;">
                <p>• Pernahkah Anda Kejang-kejang / Pingsan : <span
                        style="border-bottom: 1px dotted #000;">{{ $resmcu['kejang_pingsan'] ?? 'Tidak' }}</span></p>
                <p>• Pernahkah Anda dirawat di rumah sakit : <span
                        style="border-bottom: 1px dotted #000;">{{ $resmcu['dirawat_rs'] ?? 'Tidak' }}</span></p>
            </div>

            <div style="page-break-inside: avoid; margin-top: 20px;">
                <table style="width: 100%; border: 1px solid #000; border-collapse: collapse;">
                    <tr style="background: #f0f0f0;">
                        <th style="border: 1px solid #000; padding: 4px; width: 50%;">Kebiasaan Sehari-hari</th>
                        <th style="border: 1px solid #000; padding: 4px; width: 50%;">Ya/Tidak</th>
                    </tr>
                    @foreach(['alkohol' => 'Sering Minum Beralkohol', 'merokok' => 'Apakah Anda Merokok', 'narkoba' => 'Apakah Anda Mengonsumsi Narkoba', 'obat' => 'Apakah Anda Sering Minum Obat Tertentu'] as $key => $lbl)
                        <tr>
                            <td style="border: 1px solid #000; padding: 4px;">{{ $lbl }}</td>
                            <td style="border: 1px solid #000; padding: 4px; text-align: center;">{{ $keb($key) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td style="border: 1px solid #000; padding: 4px;">Lain-lain</td>
                        <td style="border: 1px solid #000; padding: 4px;">{{ $resmcu['keb_lain'] ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="paper">
    <div class="content" style="font-family: Arial, sans-serif; font-size: 11pt;">
        <div style="page-break-inside: avoid; margin-top: 10px;">
            <h4 style="margin-top: 10px;">B. RIWAYAT KESEHATAN ORANG TUA</h4>
            <table style="width: 100%; border: 1px solid #000; border-collapse: collapse;">
                <tr style="background: #f0f0f0;">
                    <th style="border: 1px solid #000; padding: 4px; width: 50%;">Penyakit / Keluhan</th>
                    <th style="border: 1px solid #000; padding: 4px; width: 50%;">Ya/Tidak</th>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 4px;">Riwayat Penyakit Kronis yang diderita (Penyakit
                        Jantung, DM, dll)</td>
                    <td style="border: 1px solid #000; padding: 4px;">{{ $resmcu['riwayat_ortu'] ?? 'Tidak Ada' }}</td>
                </tr>
            </table>
        </div>

        <h3 style="margin-top: 25px;">III. PEMERIKSAAN FISIK</h3>
        <p><strong>Keadaan umum :</strong> <span
                style="border-bottom: 1px dotted #000;">{{ $resmcu['keadaan_umum'] ?? 'Baik' }}</span></p>

        <div style="page-break-inside: avoid;">
            <h4>Antropometri :</h4>
            <table style="width: 100%; border: 1px solid #000; border-collapse: collapse; margin-bottom: 15px;">
                <tr>
                    <td style="border: 1px solid #000; padding: 4px; width: 20%;">Tinggi Badan</td>
                    <td style="border: 1px solid #000; padding: 4px; width: 30%;">: {{ $resmcu['tb'] ?? '-' }} cm</td>
                    <td style="border: 1px solid #000; padding: 4px; width: 20%;">BMI</td>
                    <td style="border: 1px solid #000; padding: 4px; width: 30%;">: {{ $resmcu['bmi'] ?? '-' }}
                        kg/m<sup>2</sup>
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 4px;">Berat Badan</td>
                    <td style="border: 1px solid #000; padding: 4px;">: {{ $resmcu['bb'] ?? '-' }} kg</td>
                    <td style="border: 1px solid #000; padding: 4px;">BMI Kategori</td>
                    <td style="border: 1px solid #000; padding: 4px;">: {{ $resmcu['bmi_kat'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 4px;">Lk. Dada</td>
                    <td style="border: 1px solid #000; padding: 4px;">: {{ $resmcu['lk_dada'] ?? '-' }} cm</td>
                    <td style="border: 1px solid #000; padding: 4px;">Lk. Perut</td>
                    <td style="border: 1px solid #000; padding: 4px;">: {{ $resmcu['lk_perut'] ?? '-' }} cm</td>
                </tr>
            </table>
        </div>

        <div style="page-break-inside: avoid;">
            <h4>Tekanan darah :</h4>
            <table style="width: 100%; border: 1px solid #000; border-collapse: collapse; margin-bottom: 15px;">
                <tr>
                    <td style="border: 1px solid #000; padding: 4px; width: 20%;">Systolic</td>
                    <td style="border: 1px solid #000; padding: 4px; width: 30%;">: {{ $resmcu['systolic'] ?? '-' }}
                        mmHg
                    </td>
                    <td style="border: 1px solid #000; padding: 4px; width: 20%;">Diastolic</td>
                    <td style="border: 1px solid #000; padding: 4px; width: 30%;">: {{ $resmcu['diastolic'] ?? '-' }}
                        mmHg
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 4px;">HR</td>
                    <td style="border: 1px solid #000; padding: 4px;">: {{ $resmcu['hr'] ?? '-' }} x/menit</td>
                    <td style="border: 1px solid #000; padding: 4px;">RR</td>
                    <td style="border: 1px solid #000; padding: 4px;">: {{ $resmcu['rr'] ?? '-' }} x/menit</td>
                </tr>
            </table>
        </div>

        <div style="page-break-inside: avoid;">
            <h4>A. PEMERIKSAAN FUNGSI PENGLIHATAN (VISUS)</h4>
            <table style="width: 100%; border: 1px solid #000; border-collapse: collapse; margin-bottom: 15px;">
                <tr>
                    <td style="border: 1px solid #000; padding: 4px; width: 25%;">OD tanpa kacamata</td>
                    <td style="border: 1px solid #000; padding: 4px; width: 25%;">:
                        {{ $resmcu['visus_od_tanpa'] ?? '-' }}
                    </td>
                    <td style="border: 1px solid #000; padding: 4px; width: 25%;">OD dengan kacamata</td>
                    <td style="border: 1px solid #000; padding: 4px; width: 25%;">:
                        {{ $resmcu['visus_od_dengan'] ?? '-' }}
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 4px;">OS tanpa kacamata</td>
                    <td style="border: 1px solid #000; padding: 4px;">: {{ $resmcu['visus_os_tanpa'] ?? '-' }}</td>
                    <td style="border: 1px solid #000; padding: 4px;">OS dengan kacamata</td>
                    <td style="border: 1px solid #000; padding: 4px;">: {{ $resmcu['visus_os_dengan'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 4px;">Buta Warna</td>
                    <td colspan="3" style="border: 1px solid #000; padding: 4px;">:
                        {{ $resmcu['buta_warna'] ?? 'Tidak' }}
                    </td>
                </tr>
            </table>
        </div>

        <div style="page-break-inside: avoid;">
            <h4>B. PEMERIKSAAN ORGAN SUPERFISIAL :</h4>
            <table style="width: 100%; border: 1px solid #000; border-collapse: collapse; margin-bottom: 15px;">
                @php
                    $sup_pairs = [
                        ['mata' => 'Mata', 'lymp_node' => 'Lymp Node'],
                        ['telinga' => 'Telinga', 'dada' => 'Dada'],
                        ['hidung' => 'Hidung', 'perut' => 'Perut'],
                        ['mulut' => 'Mulut', 'hernia' => 'Hernia'],
                        ['tenggorokan' => 'Faring/Laring', 'anus' => 'Anus'],
                        ['konsil' => 'Konsil', 'payudara' => 'Payudara'],
                        ['tyroid' => 'Tyroid', 'varises' => 'Varises/Hemoroid'],
                    ];
                @endphp
                @foreach($sup_pairs as $pair)
                    @php
                        $k1 = key($pair);
                        $v1 = current($pair);
                        next($pair);
                        $k2 = key($pair);
                        $v2 = current($pair);
                    @endphp
                    <tr>
                        <td style="border: 1px solid #000; padding: 4px; width: 20%;">{{ $v1 }}</td>
                        <td style="border: 1px solid #000; padding: 4px; width: 30%;">:
                            {{ $resmcu['sup_' . $k1] ?? 'Normal' }}
                        </td>
                        <td style="border: 1px solid #000; padding: 4px; width: 20%;">{{ $v2 }}</td>
                        <td style="border: 1px solid #000; padding: 4px; width: 30%;">:
                            {{ $resmcu['sup_' . $k2] ?? 'Normal' }}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div style="page-break-inside: avoid;">
            <h4>C. PEMERIKSAAN ORGAN VISCERAL</h4>
            <div>
                <p>PARU DAN SISTEM PERNAFASAN : <span
                        style="border-bottom: 1px dotted #000;">{{ $resmcu['vis_pernafasan'] ?? 'Normal' }}</span></p>
                <p>JANTUNG DAN SISTEM KARDIOVASKULAR : <span
                        style="border-bottom: 1px dotted #000;">{{ $resmcu['vis_kardiovaskular'] ?? 'Normal' }}</span>
                </p>
                <p>HATI, LIMPA, DAN SISTEM GIT : <span
                        style="border-bottom: 1px dotted #000;">{{ $resmcu['vis_git'] ?? 'Normal' }}</span></p>
                <p>GINJAL DAN SISTEM UROGENETAL : <span
                        style="border-bottom: 1px dotted #000;">{{ $resmcu['vis_urogenital'] ?? 'Normal' }}</span></p>
                <p>SISTEM REPRODUKSI : <span
                        style="border-bottom: 1px dotted #000;">{{ $resmcu['vis_reproduksi'] ?? 'Normal' }}</span></p>
            </div>
        </div>
    </div>
</div>

<div class="paper">
    <div class="content" style="font-family: Arial, sans-serif; font-size: 11pt;">
        <div style="page-break-inside: avoid;">
            <h4 style="margin-top: 15px;">D. PEMERIKSAAN EXTRIMITAS OTOT DAN TULANG :</h4>
            <p style="margin-left: 10px; border-bottom: 1px dotted #000;">
                {{ $resmcu['extrimitas'] ?? 'Normal' }}
            </p>
        </div>

        <div style="page-break-inside: avoid; margin-top: 15px;">
            <h4 style="margin-top: 15px;">E. PEMERIKSAAN MULUT DAN GIGI :</h4>
            <div style="margin-bottom: 10px; border: 1px solid #000; padding: 4px;">
                Kelainan Mulut dan Gigi: {{ $resmcu['gigi_mulut'] ?? 'Normal' }}
            </div>

            @php
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
            @endphp
            <table
                style="width: 100%; border: 1px solid #000; border-collapse: collapse; font-size: 8px; text-align: center;">
                <tr style="background: #f0f0f0; font-weight: bold;">
                    <th style="border: 1px solid #000; padding: 4px;">RAHANG</th>
                    <th style="border: 1px solid #000; padding: 4px;">STATUS</th>
                    @foreach(['M3', 'M2', 'M1', 'P2', 'P1', 'C', 'I2', 'I1', 'I1', 'I2', 'C', 'P1', 'P2', 'M1', 'M2', 'M3'] as $p)
                        <th style="border: 1px solid #000; padding: 4px;">{{ $p }}</th>
                    @endforeach
                </tr>
                <!-- Gigi Atas -->
                <tr>
                    <td style="border: 1px solid #000; font-weight: bold; background: #fafafa;">ATAS</td>
                    <td style="border: 1px solid #000; color: #666;">Kelainan</td>
                    @php $occ_map = []; @endphp
                    @foreach(['M3', 'M2', 'M1', 'P2', 'P1', 'C', 'I2', 'I1', 'I1', 'I2', 'C', 'P1', 'P2', 'M1', 'M2', 'M3'] as $p)
                        @php $occ_map[$p] = ($occ_map[$p] ?? 0) + 1; @endphp
                        <td style="border: 1px solid #000;">{{ getGigi($resmcu['matrix_atas'] ?? '', $p, $occ_map[$p]) }}
                        </td>
                    @endforeach
                </tr>
                <!-- Gigi Bawah -->
                <tr>
                    <td style="border: 1px solid #000; font-weight: bold; background: #fafafa;">BAWAH</td>
                    <td style="border: 1px solid #000; color: #666;">Kelainan</td>
                    @php $occ_map_b = []; @endphp
                    @foreach(['M3', 'M2', 'M1', 'P2', 'P1', 'C', 'I2', 'I1', 'I1', 'I2', 'C', 'P1', 'P2', 'M1', 'M2', 'M3'] as $p)
                        @php $occ_map_b[$p] = ($occ_map_b[$p] ?? 0) + 1; @endphp
                        <td style="border: 1px solid #000;">{{ getGigi($resmcu['matrix_bawah'] ?? '', $p, $occ_map_b[$p]) }}
                        </td>
                    @endforeach
                </tr>
            </table>
        </div>

        <div style="page-break-inside: avoid; margin-top: 20px;">
            <h4 style="margin-top: 15px;">F. PEMERIKSAAN SYARAF DAN SISTEM KOORDINASI :</h4>
            <table style="width: 100%; border: 1px solid #000; border-collapse: collapse; margin-bottom: 20px;">
                @if(($resmcu['tampilkan_patologis'] ?? 'Ada') == 'Ada')
                <tr>
                    <td style="border: 1px solid #000; padding: 4px; width: 25%;">Refleks Patologis</td>
                    <td style="border: 1px solid #000; padding: 4px; width: 25%;">:
                        {{ $resmcu['sya_patologis'] ?? 'Normal' }}
                    </td>
                    <td style="border: 1px solid #000; padding: 4px; width: 25%;">Lassaque/Patrick sign</td>
                    <td style="border: 1px solid #000; padding: 4px; width: 25%;">:
                        {{ $resmcu['sya_lassaque'] ?? 'Normal' }}
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 4px;">Parestesia</td>
                    <td style="border: 1px solid #000; padding: 4px;">: {{ $resmcu['sya_parestesia'] ?? 'Normal' }}</td>
                    <td style="border: 1px solid #000; padding: 4px;">Contra Patrick Sign</td>
                    <td style="border: 1px solid #000; padding: 4px;">: {{ $resmcu['sya_contra'] ?? 'Normal' }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 4px;">Parese</td>
                    <td colspan="3" style="border: 1px solid #000; padding: 4px;">:
                        {{ $resmcu['sya_parese'] ?? 'Normal' }}
                    </td>
                </tr>
                @else
                <tr>
                    <td style="border: 1px solid #000; padding: 4px; width: 25%;">Parestesia</td>
                    <td style="border: 1px solid #000; padding: 4px; width: 25%;">: {{ $resmcu['sya_parestesia'] ?? 'Normal' }}</td>
                    <td style="border: 1px solid #000; padding: 4px; width: 25%;">Lassaque/Patrick sign</td>
                    <td style="border: 1px solid #000; padding: 4px; width: 25%;">:
                        {{ $resmcu['sya_lassaque'] ?? 'Normal' }}
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 4px;">Parese</td>
                    <td style="border: 1px solid #000; padding: 4px;">: {{ $resmcu['sya_parese'] ?? 'Normal' }}</td>
                    <td style="border: 1px solid #000; padding: 4px;">Contra Patrick Sign</td>
                    <td style="border: 1px solid #000; padding: 4px;">: {{ $resmcu['sya_contra'] ?? 'Normal' }}</td>
                </tr>
                @endif
            </table>
        </div>

        <div style="page-break-inside: avoid;">
            <h3 style="margin-top: 25px;">IV. PEMERIKSAAN PENUNJANG</h3>
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="width: 20%; padding: 5px;"><strong>Radiologi</strong></td>
                    <td style="width: 2%;">:</td>
                    <td style="border-bottom: 1px dotted #000;">{{ $resmcu['penun_radiologi'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td style="padding: 5px;"><strong>Laboratorium</strong></td>
                    <td>:</td>
                    <td style="border-bottom: 1px dotted #000;">{{ $resmcu['penun_laboratorium'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td style="padding: 5px;"><strong>EKG</strong></td>
                    <td>:</td>
                    <td style="border-bottom: 1px dotted #000;">{{ $resmcu['penun_ekg'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td style="padding: 5px;"><strong>Lainnya</strong></td>
                    <td>:</td>
                    <td style="border-bottom: 1px dotted #000;">{{ $resmcu['penun_lainnya'] ?? '-' }}</td>
                </tr>
            </table>
        </div>

        <div style="page-break-inside: avoid;">
            <h3 style="margin-top: 30px; text-align: center; text-decoration: underline;">KESIMPULAN PEMERIKSAAN FISIK
                DAN
                REKOMENDASI</h3>
            <table style="width: 100%; border: 1px solid #000; border-collapse: collapse; margin-top: 10px;">
                <tr>
                    <td style="border: 1px solid #000; padding: 8px; width: 30%;">Pemeriksaan Fisik</td>
                    <td style="border: 1px solid #000; padding: 8px;">:
                        {{ $resmcu['kesimpulan_fisik'] ?? 'SEHAT UNTUK BEKERJA' }}
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 8px;">Rekomendasi / Saran</td>
                    <td style="border: 1px solid #000; padding: 8px;">: {{ $resmcu['rekomendasi'] ?? '-' }}</td>
                </tr>
            </table>
        </div>

        {{-- Manual Signature Block because Footer is sometimes hidden or pushed --}}
        <div style="page-break-inside: avoid;">
            <table style="width: 100%; margin-top: 40px; border-collapse: collapse; font-size: 11pt;">
                <tr>
                    <td style="width: 50%; text-align: center; vertical-align: top;">
                        Mengetahui<br>
                        @if($mengetahui)
                            {!! str_replace(['Pelayanan ', 'Kabupaten Sragen'], ['Pelayanan<br>', '<br>Kabupaten Sragen'], e($mengetahui->jabatan)) !!}
                        @else
                            Kepala Bidang Pelayanan<br>
                            RSUD dr. Soeratno Gemolong<br>
                            Kabupaten Sragen
                        @endif
                    </td>
                    <td style="width: 50%; text-align: center; vertical-align: top;">
                        Sragen, {{ \Carbon\Carbon::parse($surat->tanggal_cetak)->translatedFormat('d F Y') }}<br>
                        {{ $jabatan_dokter ?? 'Dokter Pemeriksa' }}
                    </td>
                </tr>
                <tr>
                    <td style="height: 100px; position: relative; text-align: center;">
                        @if($mengetahui && str_contains($mengetahui->nama_dokter, 'Mayasari Ayu Hendrawati'))
                            <img src="{{ asset('images/ttd_dr_maya.png') }}"
                                style="height: 100px; width: auto; position: absolute; left: 50%; transform: translateX(-50%); top: -5px; z-index: 1;">
                        @elseif(!$mengetahui)
                            <img src="{{ asset('images/ttd_dr_maya.png') }}"
                                style="height: 100px; width: auto; position: absolute; left: 50%; transform: translateX(-50%); top: -5px; z-index: 1;">
                        @endif
                    </td>
                    <td style="height: 100px; position: relative; text-align: center;">
                        @if(str_contains($surat->dokter->nama_dokter, 'Mayasari Ayu Hendrawati'))
                            <img src="{{ asset('images/ttd_dr_maya.png') }}"
                                style="height: 100px; width: auto; position: absolute; left: 50%; transform: translateX(-50%); top: -5px; z-index: 1;">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; vertical-align: top;">
                        <div style="position: relative; z-index: 2;">
                            @if($mengetahui)
                                <strong><u>{{ $mengetahui->nama_dokter }}</u></strong><br>
                                NIP. {{ $mengetahui->nip }}
                            @else
                                <strong><u>dr. Mayasari Ayu Hendrawati, MM</u></strong><br>
                                NIP. 198105172010012026
                            @endif
                        </div>
                    </td>
                    <td style="text-align: center; vertical-align: top;">
                        <div style="position: relative; z-index: 2;">
                            <strong><u>{{ $surat->dokter->nama_dokter }}</u></strong><br>
                            @if(isset($use_sip) && $use_sip)
                                SIP. {{ $surat->dokter->sip ?? '-' }}
                            @else
                                NIP. {{ $surat->dokter->nip ?? '-' }}
                            @endif
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>