<!DOCTYPE html>
<html lang="id">
@php
    \Carbon\Carbon::setLocale('id');
@endphp

<head>
    <meta charset="UTF-8">
    <title>Hasil Pemeriksaan Kesehatan TKHI - {{ $surat->pendaftar->nama_lengkap }}</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            line-height: 1.15;
            color: #000;
            font-size: 10pt;
        }

        .paper {
            width: 210mm;
            min-height: 330mm;
            /* F4 height */
            padding: 10mm 20mm 12.5mm 20mm;
            /* Symmetrical left/right 20mm */
            margin: 20px auto;
            position: relative;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        @media print {
            body {
                background: none;
            }

            .paper {
                margin: 0;
                box-shadow: none;
                width: 100%;
                /* Box-sizing will handle the padding */
                min-height: 330mm;
                padding: 10mm 20mm 12.5mm 20mm;
                /* Symmetrical left/right 20mm for print */
                /* Let @page handle global margins */
            }

            .no-print {
                display: none !important;
            }
        }

        @page {
            size: 210mm 330mm;
            margin: 0;
            /* Hides browser headers/footers */
        }

        .page-break {
            page-break-after: always;
        }

        /* Standardized title and section styles */
        .title {
            text-align: center;
            font-size: 12pt;
            font-weight: bold;
            margin: 0;
            line-height: 1.2;
            page-break-after: avoid;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px;
            page-break-inside: auto;
        }

        table.bordered td,
        table.bordered th {
            border: 1px solid #000;
            padding: 4px 6px;
            vertical-align: top;
        }

        table.bordered th {
            background-color: #f2f2f2;
            text-align: center;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .bold {
            font-weight: bold;
        }

        .section-title {
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 5px;
            font-size: 11pt;
            page-break-after: avoid;
        }

        .bold {
            font-weight: bold;
        }

        .page-break {
            page-break-before: always;
            clear: both;
        }

        .vital-box {
            border: 1px solid #000;
            width: 80px;
            height: 25px;
            display: inline-block;
            margin-top: 5px;
            text-align: center;
            line-height: 25px;
        }

        .checkbox-rect {
            display: inline-block;
            width: 25px;
            height: 15px;
            border: 1px solid #000;
            vertical-align: middle;
            margin-right: 5px;
        }

        .kop-table td {
            vertical-align: middle;
        }

        .kop-header {
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 2px;
        }

        .signature-block {
            margin-top: 20px;
            float: right;
            width: 250px;
            text-align: left;
            page-break-inside: avoid;
        }
    </style>
</head>

<body>
    <style>
        .no-print {
            background: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(10px);
            padding: 15px !important;
            border-bottom: 1px solid rgba(226, 232, 240, 0.8) !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            animation: slideDown 0.5s ease-out;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .btn-print-action {
            padding: 12px 24px;
            cursor: pointer;
            border: none;
            border-radius: 12px;
            font-weight: 800;
            font-family: sans-serif;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-size: 11px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .btn-print-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .btn-print-action:active {
            transform: translateY(0);
        }

        .btn-cetak {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            box-shadow: 0 4px 14px 0 rgba(16, 185, 129, 0.3);
        }

        .btn-unduh {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            box-shadow: 0 4px 14px 0 rgba(59, 130, 246, 0.3);
        }

        .btn-tutup {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            box-shadow: 0 4px 14px 0 rgba(239, 68, 68, 0.3);
        }

        .btn-print-action svg {
            width: 18px;
            height: 18px;
            transition: transform 0.3s ease;
        }

        .btn-print-action:hover svg {
            transform: scale(1.1);
        }
    </style>

    <div class="no-print"
        style="text-align: center; position: sticky; top: 0; z-index: 100; display: flex; justify-content: center; gap: 15px; align-items: center;">
        <button onclick="window.print()" class="btn-print-action btn-cetak">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                    d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
            </svg>
            Cetak Surat
        </button>
        <a href="{{ url('/admin/buat-surat/rtf/' . $surat->id) }}" class="btn-print-action btn-unduh"
            style="background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            RTF
        </a>

        <button onclick="window.close(); if(!window.closed) history.back();" class="btn-print-action btn-tutup">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Tutup
        </button>
    </div>

    <!-- PAGE 1: LEMBAR BANTU & ANAMNESIS -->
    <div class="paper">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width: 80px; text-align: center; padding-bottom: 5px;">
                    <img src="{{ asset('images/logo-sragen.png') }}" alt="Logo Sragen"
                        style="height: 80px; width: auto;" width="80">
                </td>
                <td style="text-align: center; padding-bottom: 5px;">
                    <h3 style="margin: 0; font-size: 13pt; font-weight: normal;">
                        PEMERINTAH KABUPATEN SRAGEN</h3>
                    <h1 style="margin: 0; font-size: 17pt; font-weight: bold;">
                        RSUD dr. SOERATNO GEMOLONG</h1>
                    <p style="margin: 0; font-size: 10pt;">Jl. R. Ngt.
                        Tjitrosantjoko 10, Gemolong, Sragen, Jawa Tengah 57274</p>
                    <p style="margin: 0; font-size: 9pt;">
                        Telp. (0271) 6811839, Laman: rsudgemolong.sragenkab.go.id, Pos-el: rsudgemolong@gmail.com</p>
                </td>
                <td style="width: 80px; text-align: center; padding-bottom: 5px;">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo RSUD" style="height: 80px; width: auto;"
                        width="80">
                </td>
            </tr>
        </table>
        <div style="border-top: 1.5pt solid #000; margin-bottom: 2pt; margin-top: 2pt;"></div>
        <div style="border-top: 3.5pt solid #000; margin-bottom: 15pt;"></div>

        <div class="title">LEMBAR BANTU</div>
        <div class="title">PEMERIKSAAN KESEHATAN TAHUN {{ date('Y') }}</div>
        <div class="text-center" style="margin-top: 5px; font-weight: bold; font-size: 11pt;">
            No. {{ $surat->nomor_surat }}
        </div>
        <br>

        <table style="width: 100%;">
            <tr>
                <td style="width: 20%;">Nama</td>
                <td style="width: 2%;">:</td>
                <td style="width: 35%;" class="bold text-underline">{{ $surat->pendaftar->nama_lengkap }}</td>
                <td style="width: 20%;">Tempat Pemeriksaan</td>
                <td style="width: 2%;">:</td>
                <td style="width: 21%;">RSUD dr. Soeratno</td>
            </tr>
            <tr>
                <td>No. KTP/NIK</td>
                <td>:</td>
                <td>{{ $surat->pendaftar->nik ?? $surat->mcu_data['nik'] ?? '-' }}</td>
                <td>Tanggal Pemeriksaan</td>
                <td>:</td>
                <td>{{ \Carbon\Carbon::parse($surat->tanggal_cetak)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $surat->pendaftar->jenis_kelamin }}</td>
                <td>Dokter Pemeriksa</td>
                <td>:</td>
                <td>{{ $surat->dokter->nama_dokter }}</td>
            </tr>
            <tr>
                <td>Tempat Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $surat->pendaftar->tempat_lahir }},
                    {{ \Carbon\Carbon::parse($surat->pendaftar->tanggal_lahir)->translatedFormat('d F Y') }}
                </td>
                <td>NIP/NRP</td>
                <td>:</td>
                <td>{{ $surat->dokter->nip ?? '-' }}</td>
            </tr>
            <tr>
                <td>Umur</td>
                <td>:</td>
                <td>{{ \Carbon\Carbon::parse($surat->pendaftar->tanggal_lahir)->age }} tahun</td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{ $surat->pekerjaan }}</td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td>:</td>
                <td>{{ $surat->pendaftar->no_hp }}</td>
                <td colspan="3"></td>
            </tr>
        </table>

        <div class="section-title">I. Anamnesis</div>
        <div style="margin-left: 15px; margin-bottom: 10px; display: flex; align-items: flex-end;">
            <div class="bold" style="white-space: nowrap; margin-right: 5px;">Keluhan Saat Ini :</div>
            <div style="flex: 1; border-bottom: 1px dotted #000; min-height: 18px;">
                {{ $surat->mcu_data['keluhan_saat_ini'] ?? '' }}
            </div>
        </div>

        <div class="bold" style="margin-bottom: 5px;">1. Riwayat Kesehatan Sekarang</div>
        <table style="width: 100%; margin-left: 15px; margin-bottom: 10px;">
            @php
                $skrng = [
                    'Hipertensi',
                    'Diabetes Mellitus',
                    'Gangguan Jiwa',
                    'HIV/AIDS',
                    'Kanker (Keganasan)',
                    'Penyakit Hati',
                    'Penyakit Alergi'
                ];
            @endphp
            @foreach($skrng as $i => $item)
                @php $val = $surat->mcu_data['riwayat_skrng_' . Str::slug($item)] ?? 'Tidak'; @endphp
                <tr>
                    <td style="width: 30px; vertical-align: top;">{{ $i + 1 }}.</td>
                    <td style="vertical-align: top;">{{ $item }}</td>
                    <td style="width: 150px; text-align: left; vertical-align: top;">[ {{ $val == 'Ya' ? '✓' : ' ' }} ] Ya
                        &nbsp; [ {{ $val == 'Tidak' ? '✓' : ' ' }}
                        ] Tidak</td>
                </tr>
            @endforeach
            @php $v_jant = $surat->mcu_data['riwayat_skrng_jantung'] ?? 'Tidak'; @endphp
            <tr>
                <td style="vertical-align: top;">8.</td>
                <td style="vertical-align: top;">Penyakit Jantung</td>
                <td style="width: 150px; text-align: left; vertical-align: top;">[ {{ $v_jant == 'Ya' ? '✓' : ' ' }} ]
                    Ya &nbsp; [
                    {{ $v_jant == 'Tidak' ? '✓' : ' ' }} ] Tidak
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2" style="font-size: 9pt; padding-left: 10px;">Jika Ya : Kapan serangan jantung berakhir
                    ..... bulan</td>
            </tr>
            @php $v_ginjal = $surat->mcu_data['riwayat_skrng_ginjal'] ?? 'Tidak'; @endphp
            <tr>
                <td style="vertical-align: top;">9.</td>
                <td style="vertical-align: top;">Gagal Ginjal</td>
                <td style="width: 150px; text-align: left; vertical-align: top;">[ {{ $v_ginjal == 'Ya' ? '✓' : ' ' }} ]
                    Ya &nbsp; [
                    {{ $v_ginjal == 'Tidak' ? '✓' : ' ' }} ] Tidak
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2" style="font-size: 9pt; padding-left: 10px;">Jika Ya: Haemodialisis/Peritoneal Dialisis:
                    Ya / Tidak</td>
            </tr>
            <tr>
                <td style="vertical-align: top;">10.</td>
                <td style="vertical-align: top;">Lainnya : ..............</td>
                <td style="width: 150px; text-align: left; vertical-align: top;"></td>
            </tr>
        </table>

        <div class="bold" style="margin-bottom: 5px;">2. Riwayat Penyakit Dahulu</div>
        <table style="width: 100%; margin-left: 15px; margin-bottom: 10px;">
            @php $dahulu = ['Tuberkulosis', 'COVID-19', 'Operasi']; @endphp
            @foreach($dahulu as $i => $item)
                @php $val = $surat->mcu_data['riwayat_dahulu_' . Str::slug($item)] ?? 'Tidak'; @endphp
                <tr>
                    <td style="width: 30px; vertical-align: top;">{{ $i + 1 }}.</td>
                    <td style="vertical-align: top;">{{ $item }}</td>
                    <td style="width: 150px; text-align: left; vertical-align: top;">[ {{ $val == 'Ya' ? '✓' : ' ' }} ] Ya
                        &nbsp; [ {{ $val == 'Tidak' ? '✓' : ' ' }}
                        ] Tidak</td>
                </tr>
            @endforeach
            <tr>
                <td style="vertical-align: top;">4.</td>
                <td style="vertical-align: top;">Lainnya : .....................</td>
                <td style="width: 150px; text-align: left; vertical-align: top;"></td>
            </tr>
        </table>

        <!-- Riwayat Keluarga & Sosial tetap di Hal 1 jika F4 -->
        <div class="bold" style="margin-top: 10px; margin-bottom: 5px;">3. Riwayat Penyakit Keluarga</div>
        <table style="width: 100%; margin-left: 15px; margin-bottom: 10px;">
            @php $keluarga = ['Hipertensi', 'Penyakit Jantung', 'Gangguan Jiwa', 'Penyakit Alergi', 'Gagal Ginjal', 'Diabetes Melitus']; @endphp
            @foreach($keluarga as $i => $item)
                @php $val = $surat->mcu_data['riwayat_keluarga_' . Str::slug($item)] ?? 'Tidak'; @endphp
                <tr>
                    <td style="width: 30px; vertical-align: top;">{{ $i + 1 }}.</td>
                    <td style="vertical-align: top;">{{ $item }}</td>
                    <td style="width: 150px; text-align: left; vertical-align: top;">[ {{ $val == 'Ya' ? '✓' : ' ' }} ] Ya
                        &nbsp; [ {{ $val == 'Tidak' ? '✓' : ' ' }}
                        ] Tidak</td>
                </tr>
            @endforeach
            <tr>
                <td style="vertical-align: top;">7.</td>
                <td style="vertical-align: top;">Lainnya : .....................</td>
                <td style="width: 150px; text-align: left; vertical-align: top;"></td>
            </tr>
        </table>

        <div class="bold" style="margin-bottom: 5px;">4. Riwayat Sosial/Kebiasaan</div>
        <table style="width: 100%; margin-left: 15px; margin-bottom: 10px;">
            @php $sosial = ['Merokok', 'Terpapar Zat Berbahaya', 'Minum Alkohol', 'Penyalahgunaan Obat', 'Minum Kopi']; @endphp
            @foreach($sosial as $i => $item)
                @php $val = $surat->mcu_data['riwayat_sosial_' . Str::slug($item)] ?? 'Tidak'; @endphp
                <tr>
                    <td style="width: 30px; vertical-align: top;">{{ $i + 1 }}.</td>
                    <td style="vertical-align: top;">{{ $item }}</td>
                    <td style="width: 150px; text-align: left; vertical-align: top;">[ {{ $val == 'Ya' ? '✓' : ' ' }} ] Ya
                        &nbsp; [ {{ $val == 'Tidak' ? '✓' : ' ' }}
                        ] Tidak</td>
                </tr>
            @endforeach
            @php $v_obat = $surat->mcu_data['riwayat_sosial_obat'] ?? 'Tidak'; @endphp
            <tr>
                <td style="vertical-align: top;">6.</td>
                <td style="vertical-align: top;">Konsumsi Obat Rutin</td>
                <td style="width: 150px; text-align: left; vertical-align: top;">[ {{ $v_obat == 'Ya' ? '✓' : ' ' }} ]
                    Ya &nbsp; [
                    {{ $v_obat == 'Tidak' ? '✓' : ' ' }} ] Tidak
                </td>
            </tr>
        </table>
    </div>

    <!-- PAGE 2: PEMERIKSAAN FISIK -->
    <div class="paper">
        <div class="section-title">II. Pemeriksaan Fisik</div>

        <div class="bold">1. Tanda Vital</div>
        <table style="margin-bottom: 15px;">
            <tr class="text-center" style="font-size: 9pt;">
                <td>Sistol (mmHg)</td>
                <td>Diastol (mmHg)</td>
                <td>Nadi (kali/menit)</td>
                <td>Pernapasan (kali/menit)</td>
                <td>Suhu (&deg;C)</td>
            </tr>
            <tr class="text-center">
                <td>
                    <div class="vital-box">{{ explode('/', $surat->tensi)[0] ?? '' }}</div>
                </td>
                <td>
                    <div class="vital-box">{{ explode('/', $surat->tensi)[1] ?? '' }}</div>
                </td>
                <td>
                    <div class="vital-box">{{ $surat->nadi }}</div>
                </td>
                <td>
                    <div class="vital-box">{{ $surat->respirasi }}</div>
                </td>
                <td>
                    <div class="vital-box">{{ $surat->suhu }}</div>
                </td>
            </tr>
        </table>

        <div class="bold">2. Postur Tubuh</div>
        <table style="margin-bottom: 15px;">
            <tr class="text-center" style="font-size: 9pt;">
                <td>Tinggi Badan (cm)</td>
                <td>Berat Badan (kg)</td>
                <td>Lingkar Perut (cm)</td>
                <td>IMT (kg/m&sup2;)</td>
            </tr>
            <tr class="text-center">
                <td>
                    <div class="vital-box">{{ $surat->tinggi_badan }}</div>
                </td>
                <td>
                    <div class="vital-box">{{ $surat->berat_badan }}</div>
                </td>
                <td>
                    <div class="vital-box">{{ $surat->mcu_data['lk_perut'] ?? '' }}</div>
                </td>
                <td>
                    <div class="vital-box">
                        {{ $surat->tinggi_badan > 0 ? number_format($surat->berat_badan / (($surat->tinggi_badan / 100) ** 2), 1) : '-' }}
                    </div>
                </td>
            </tr>
        </table>

        <div class="bold">3. Pemeriksaan Inspeksi dan Palpasi</div>
        <table class="bordered">
            <thead>
                <tr>
                    <th rowspan="2" style="width: 40%;">Bagian Tubuh</th>
                    <th colspan="2">Kelainan</th>
                    <th rowspan="2">Keterangan Kelainan</th>
                </tr>
                <tr>
                    <th style="width: 10%;">Tidak</th>
                    <th style="width: 10%;">Ada</th>
                </tr>
            </thead>
            <tbody>
                @php $parts = ['Kulit', 'Kepala', 'Mata', 'Telinga', 'Hidung', 'Mulut dan Tenggorokan', 'Leher dan Getah Bening']; @endphp
                @foreach($parts as $i => $p)
                    <tr>
                        <td>{{ $i + 1 }}. {{ $p }}</td>
                        <td class="text-center">
                            {{ ($surat->mcu_data['fisik_' . Str::slug($p)] ?? 'Tidak') == 'Tidak' ? '✓' : '' }}
                        </td>
                        <td class="text-center">{{ ($surat->mcu_data['fisik_' . Str::slug($p)] ?? '') == 'Ada' ? '✓' : '' }}
                        </td>
                        <td>{{ $surat->mcu_data['ket_fisik_' . Str::slug($p)] ?? '' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="bold">4. Pemeriksaan Dada (Thoraks)</div>
        <table class="bordered">
            <thead>
                <tr>
                    <th rowspan="2" style="width: 40%;">Bagian Tubuh</th>
                    <th colspan="2">Kelainan</th>
                    <th rowspan="2">Keterangan Kelainan</th>
                </tr>
                <tr>
                    <th style="width: 10%;">Tidak</th>
                    <th style="width: 10%;">Ada</th>
                </tr>
            </thead>
            <tbody>
                @php $dada = ['Dada', 'Paru', 'Jantung']; @endphp
                @foreach($dada as $i => $p)
                    <tr>
                        <td>{{ $i + 1 }}. {{ $p }}</td>
                        <td class="text-center">
                            {{ ($surat->mcu_data['fisik_dada_' . Str::slug($p)] ?? 'Tidak') == 'Tidak' ? '✓' : '' }}
                        </td>
                        <td class="text-center">
                            {{ ($surat->mcu_data['fisik_dada_' . Str::slug($p)] ?? '') == 'Ada' ? '✓' : '' }}
                        </td>
                        <td>{{ $surat->mcu_data['ket_fisik_dada_' . Str::slug($p)] ?? '' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="bold">5. Pemeriksaan Perut (Abdomen)</div>
        <table class="bordered">
            <thead>
                <tr>
                    <th rowspan="2" style="width: 40%;">Bagian Tubuh</th>
                    <th colspan="2">Kelainan</th>
                    <th rowspan="2">Keterangan Kelainan</th>
                </tr>
                <tr>
                    <th style="width: 10%;">Tidak</th>
                    <th style="width: 10%;">Ada</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Perut (Abdomen)</td>
                    <td class="text-center">{{ ($surat->mcu_data['fisik_perut'] ?? 'Tidak') == 'Tidak' ? '✓' : '' }}
                    </td>
                    <td class="text-center">{{ ($surat->mcu_data['fisik_perut'] ?? '') == 'Ada' ? '✓' : '' }}</td>
                    <td>{{ $surat->mcu_data['ket_fisik_perut'] ?? '' }}</td>
                </tr>
            </tbody>
        </table>

        <div class="bold">6. Pemeriksaan Ekstremitas</div>
        <table style="width: 100%; border: none;">
            <tr>
                <td style="width: 50%; vertical-align: top;">
                    Kekuatan Otot Tangan Kanan : {{ $surat->mcu_data['ekst_tangan_kanan'] ?? '5' }} / 5 <br>
                    Kekuatan Otot Tangan Kiri : {{ $surat->mcu_data['ekst_tangan_kiri'] ?? '5' }} / 5 <br>
                    Kekuatan Otot Kaki Kanan : {{ $surat->mcu_data['ekst_kaki_kanan'] ?? '5' }} / 5 <br>
                    Kekuatan Otot Kaki Kiri : {{ $surat->mcu_data['ekst_kaki_kiri'] ?? '5' }} / 5 <br><br>
                    Disabilitas Tangan : {{ ($surat->mcu_data['ekst_dis_tangan'] ?? 'Tidak') }} <br>
                    Disabilitas Kaki : {{ ($surat->mcu_data['ekst_dis_kaki'] ?? 'Tidak') }}
                </td>
                <td style="width: 50%; vertical-align: top;">
                    Refleks : {{ $surat->mcu_data['ekst_refleks'] ?? '+' }} / - <br>
                    Patologis : {{ $surat->mcu_data['ekst_patologis'] ?? '-' }}
                </td>
            </tr>
        </table>

        <div class="bold">7. Pemeriksaan Rectum dan Urogenital</div>
        <table class="bordered">
            <thead>
                <tr>
                    <th rowspan="2" style="width: 40%;">Bagian Tubuh</th>
                    <th colspan="2">Kelainan</th>
                    <th rowspan="2">Keterangan Kelainan</th>
                </tr>
                <tr>
                    <th style="width: 10%;">Tidak</th>
                    <th style="width: 10%;">Ada</th>
                </tr>
            </thead>
            <tbody>
                @php $uro = ['Rectum', 'Urogenital']; @endphp
                @foreach($uro as $i => $p)
                    <tr>
                        <td>{{ $i + 1 }}. {{ $p }}</td>
                        <td class="text-center">
                            {{ ($surat->mcu_data['fisik_uro_' . Str::slug($p)] ?? 'Tidak') == 'Tidak' ? '✓' : '' }}
                        </td>
                        <td class="text-center">
                            {{ ($surat->mcu_data['fisik_uro_' . Str::slug($p)] ?? '') == 'Ada' ? '✓' : '' }}
                        </td>
                        <td>{{ $surat->mcu_data['fisik_uro_ket_' . Str::slug($p)] ?? '' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- PAGE 3: PEMERIKSAAN PENUNJANG (LAB) -->
    <div class="paper">
        <div class="section-title">III. Pemeriksaan Penunjang</div>
        <div class="bold">1. Laboratorium</div>
        <table class="bordered" style="font-size: 9pt;">
            <thead>
                <tr>
                    <th style="width: 20%;">Jenis Pemeriksaan</th>
                    <th style="width: 30%;">Komponen pemeriksaan</th>
                    <th style="width: 20%;">Hasil</th>
                    <th style="width: 30%;">Nilai Normal</th>
                </tr>
            </thead>
            <tbody>
                <!-- Darah Lengkap -->
                <tr>
                    <td rowspan="12" class="bold">Darah lengkap</td>
                    <td>Hemoglobin</td>
                    <td class="text-center">{{ $surat->mcu_data['lab_hb'] ?? '' }}</td>
                    <td>L:13 - 16g/dL; P:12 - 14g/dL.</td>
                </tr>
                <tr>
                    <td>Lekosit</td>
                    <td class="text-center">{{ $surat->mcu_data['lab_lekosit'] ?? '' }}</td>
                    <td>5.000 - 10.000µl</td>
                </tr>
                <tr>
                    <td>Trombosit</td>
                    <td class="text-center">{{ $surat->mcu_data['lab_trombosit'] ?? '' }}</td>
                    <td>150.000 - 400.000µl</td>
                </tr>
                <tr>
                    <td>Eritrosit</td>
                    <td class="text-center">{{ $surat->mcu_data['lab_eritrosit'] ?? '' }}</td>
                    <td>L:4,5 - 5,5 juta/ µl; P:4,0 - 5,0 juta/ µl.</td>
                </tr>
                <tr>
                    <td>Hematokrit</td>
                    <td class="text-center">{{ $surat->mcu_data['lab_hematokrit'] ?? '' }}</td>
                    <td>L:45 - 55%; P:40 - 50%</td>
                </tr>
                <tr>
                    <td colspan="3" class="bold">Hitung jenis:</td>
                </tr>
                @php $hj = ['Basofil' => '0 - 1%', 'Eosinophil' => '1 - 3%', 'monosit' => '2 - 8%', 'Limfosit' => '20 - 40%', 'Netrofil' => '50 - 75%', 'LED' => 'L:<10mm/jam; P:<15mm/j']; @endphp
                @foreach($hj as $comp => $norm)
                    <tr>
                        <td>{{ $comp }}</td>
                        <td class="text-center">{{ $surat->mcu_data['lab_hj_' . Str::slug($comp)] ?? '' }}</td>
                        <td>{{ $norm }}</td>
                    </tr>
                @endforeach

                <!-- Golongan Darah -->
                <tr>
                    <td colspan="2" class="bold">Golongan Darah dan Rhesus</td>
                    <td class="text-center">{{ $surat->mcu_data['lab_golda'] ?? '-' }}</td>
                    <td></td>
                </tr>

                <!-- Kimia Darah -->
                <tr>
                    <td rowspan="11" class="bold">Kimia Darah</td>
                    <td>GDP</td>
                    <td class="text-center">{{ $surat->mcu_data['lab_gdp'] ?? '' }}</td>
                    <td>70 – 100 mg/dL</td>
                </tr>
                <tr>
                    <td>GD2PP</td>
                    <td class="text-center">{{ $surat->mcu_data['lab_gd2pp'] ?? '' }}</td>
                    <td>
                        < 140 mg/dL</td>
                </tr>
                <tr>
                    <td>HbA1c</td>
                    <td class="text-center">{{ $surat->mcu_data['lab_hba1c'] ?? '' }}</td>
                    <td>
                        < 5,7%</td>
                </tr>
                <tr>
                    <td>cholesterol</td>
                    <td class="text-center">{{ $surat->mcu_data['lab_cholesterol'] ?? '' }}</td>
                    <td>150 – 200 mg/dL</td>
                </tr>
                <tr>
                    <td>trigliserida</td>
                    <td class="text-center">{{ $surat->mcu_data['lab_trigliserida'] ?? '' }}</td>
                    <td>120 – 190 mg/dL</td>
                </tr>
                <tr>
                    <td>SGOT</td>
                    <td class="text-center">{{ $surat->mcu_data['lab_sgot'] ?? '' }}</td>
                    <td>L: < 25; P: <21</td>
                </tr>
                <tr>
                    <td>SGPT</td>
                    <td class="text-center">{{ $surat->mcu_data['lab_sgpt'] ?? '' }}</td>
                    <td>L: < 30; P: <23</td>
                </tr>
                <tr>
                    <td>ureum</td>
                    <td class="text-center">{{ $surat->mcu_data['lab_ureum'] ?? '' }}</td>
                    <td>20 – 40 mg/dL</td>
                </tr>
                <tr>
                    <td>kreatinin</td>
                    <td class="text-center">{{ $surat->mcu_data['lab_kreatinin'] ?? '' }}</td>
                    <td>0,5 – 1,5 mg/dL</td>
                </tr>
                <tr>
                    <td>HDL</td>
                    <td class="text-center">{{ $surat->mcu_data['lab_hdl'] ?? '' }}</td>
                    <td>>40</td>
                </tr>
                <tr>
                    <td>LDL</td>
                    <td class="text-center">{{ $surat->mcu_data['lab_ldl'] ?? '' }}</td>
                    <td>
                        < 100</td>
                </tr>

                <!-- Urine Lengkap Consolidated -->
                <tr>
                    <td rowspan="9" class="bold">Urine Lengkap</td>
                    <td>Makroskopis: Warna</td>
                    <td class="text-center">{{ $surat->mcu_data['lab_urine_warna'] ?? '' }}</td>
                    <td>Kuning muda - tua</td>
                </tr>
                <tr>
                    <td>Kejernihan</td>
                    <td class="text-center">{{ $surat->mcu_data['lab_urine_kejernihan'] ?? '' }}</td>
                    <td>Jernih</td>
                </tr>
                <tr>
                    <td>Bau</td>
                    <td class="text-center">{{ $surat->mcu_data['lab_urine_bau'] ?? '' }}</td>
                    <td>Bau tidak menyengat</td>
                </tr>
                <tr>
                    <td colspan="3" class="bold">Mikroskopis:</td>
                </tr>
                @php
                    $micro = ['sedimen', 'lekosit', 'eritrosit', 'glukosa_urin', 'protein_urin'];
                    $norms = [
                        'sedimen' => 'Negatif/sedikit',
                        'lekosit' => '0 – 5/LP',
                        'eritrosit' => '0 – 3/LP',
                        'glukosa_urin' => 'Negatif',
                        'protein_urin' => 'Negatif'
                    ];
                @endphp
                @foreach($micro as $comp)
                    <tr>
                        <td>{{ str_replace('_', ' ', $comp) }}</td>
                        <td class="text-center">{{ $surat->mcu_data['lab_urine_micro_' . $comp] ?? '' }}</td>
                        <td>{{ $norms[$comp] }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td class="bold" colspan="2">Tes Kehamilan (WUS)</td>
                    <td colspan="2">
                        Hasil Tes : {{ $surat->mcu_data['lab_tes_kehamilan'] ?? '-' }} <br>
                        <span style="font-size: 8pt; font-style: italic;">jika hasil tes positif tidak lanjut ketahapan
                            berikutnya.</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="paper">
        <!-- PAGE 4: RADIOLOGI + EKG + KESIMPULAN -->

        <div class="bold" style="margin-top: 15px;">2. Radiologi Thoraks PA</div>
        <div style="margin-left: 15px;">
            Hasil Radiologi : {{ ($surat->mcu_data['rad_hasil'] ?? 'Tidak ada kelainan') }} <br>
            Keterangan: <br>
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 5px; font-size: 9pt;">
                @php $rads = ['Kesan Normal', 'TB Kesan Fibrosis', 'Kesan Tumor/Ca', 'Kardiomegali', 'Kesan PPOK']; @endphp
                @foreach($rads as $r)
                    <div>{{ ($surat->mcu_data['rad_' . Str::slug($r)] ?? '') == 'Ya' ? '[ ✓ ]' : '[   ]' }} {{ $r }}</div>
                @endforeach
            </div>
            Lainnya : .....................................................................
        </div>

        <div class="bold" style="margin-top: 15px;">3. EKG</div>
        <div style="margin-left: 15px;">
            Hasil EKG : {{ ($surat->mcu_data['ekg_hasil'] ?? 'Tidak ada kelainan') }} <br>
            Keterangan: <br>
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 5px; font-size: 9pt;">
                @php $ekgs = ['Iskemik', 'Infark', 'Aritmia']; @endphp
                @foreach($ekgs as $e)
                    <div>{{ ($surat->mcu_data['ekg_' . Str::slug($e)] ?? '') == 'Ya' ? '[ ✓ ]' : '[   ]' }} {{ $e }}</div>
                @endforeach
            </div>
        </div>

        <div style="margin-top: 30px; text-align: center;">
            <div class="bold">KESIMPULAN HASIL MCU</div>
            <div
                style="border: 2px solid #000; padding: 10px; width: 350px; margin: 10px auto; font-weight: bold; font-size: 12pt;">
                {{ $surat->hasil_pemeriksaan ?? 'FIT TO WORK' }}
            </div>
        </div>

        <div class="signature-block">
            Tanggal : {{ \Carbon\Carbon::parse($surat->tanggal_cetak)->translatedFormat('d F Y') }}<br>
            Tanda tangan,<br><br><br><br>
            Dokter Pemeriksa :<br>
            <span class="bold"> ( {{ $surat->dokter->nama_dokter }} )</span>
        </div>
    </div>

    <!-- PAGE 5: SCREENING NAPZA -->
    <div class="paper">
        <div class="section-title">IV. Pemeriksaan Narkotika dan Zat Adiktif (NAPZA)</div>
        <table class="bordered">
            <thead>
                <tr>
                    <th style="width: 10%;">No.</th>
                    <th style="width: 50%;">Parameter Pemeriksaan</th>
                    <th style="width: 20%;">Hasil</th>
                    <th style="width: 20%;">Nilai Normal</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $napza_list = [
                        'morphine' => 'Morphine / Opiate',
                        'canabinoid' => 'THC / Ganja',
                        'amphetamine' => 'Amphetamine',
                        'metamfetamin' => 'Methamphetamine',
                        'cocaine' => 'Cocaine',
                        'benzodiazepine' => 'Benzodiazepine'
                    ];
                    $j = 1;
                @endphp
                @foreach($napza_list as $key => $label)
                    <tr>
                        <td class="text-center">{{ $j++ }}</td>
                        <td>{{ $label }}</td>
                        <td class="text-center">
                            @php $val = $surat->mcu_data['napza_' . $key] ?? 'Negatif'; @endphp
                            {{ $val == 'Negatif' ? 'NEGATIF' : 'POSITIF' }}
                        </td>
                        <td class="text-center">NEGATIF</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top: 15px;">
            KESIMPULAN NAPZA :
            <span class="bold" style="border-bottom: 2px solid #000;">
                @php
                    $is_positif = false;
                    foreach ($napza_list as $key => $l) {
                        if (($surat->mcu_data['napza_' . $key] ?? '') == 'Positif') {
                            $is_positif = true;
                            break;
                        }
                    }
                @endphp
                {{ $is_positif ? 'TERINDIKASI POSITIF' : 'NEGATIF' }}
            </span>
        </div>

        <div class="signature-block">
            Tanggal : {{ \Carbon\Carbon::parse($surat->tanggal_cetak)->format('d F Y') }}<br>
            Tanda tangan,<br><br><br><br>
            Dokter Pemeriksa :<br>
            <span class="bold"> ( {{ $surat->dokter->nama_dokter }} )</span>
        </div>
    </div>

    <!-- PAGE 6: PEMERIKSAAN JIWA -->
    <div class="paper">
        <div class="section-title">V. Pemeriksaan Jiwa Sederhana</div>
        <div class="title">FORM PEMERIKSAAN JIWA</div>
        <div class="subtitle">Pendaftar PPIH Arab Saudi Bidang Kesehatan dan TKH</div>

        <table class="bordered">
            <thead>
                <tr>
                    <th style="width: 10%;">No.</th>
                    <th style="width: 60%;">Jenis Pemeriksaaan</th>
                    <th style="width: 30%;">Hasil Pemeriksaan</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $jiwa = [
                        'jiwa_1' => 'Penampilan umum ditunjukkan melalui sikap, perilaku dan psikomotor;',
                        'jiwa_2' => 'Mood/afek (suasana perasaan/ekspresi wajah);',
                        'jiwa_3' => 'a. Mood (eutim/normal, sedih, senang berlebihan, labil, iritabel dll); b. Afek (luas, terbatas, tumpul, mendatar).',
                        'jiwa_4' => 'Pembicaraan: spontan/tidak; pelan/keras; jelas/tidak; banyak/sedikit; meloncat-loncat/tidak; lambat/cepat dan sebagainya;',
                        'jiwa_5' => 'Persepsi: halusinasi visual/audimotorik(penglihatan, pendengaran);',
                        'jiwa_6' => 'Proses dan isi pikir: waham, ide meloncat-loncat dan sebagainya;',
                        'jiwa_7' => 'Pengendalian impuls: verbal/motorik;',
                        'jiwa_8' => 'Fungsi kognitif: kesadaran, memori, konsentrasi, visuospatial;',
                        'jiwa_9' => 'Kemampuan dalam menilai realitas terganggu/tidak.'
                    ];
                    $i = 1;
                @endphp
                @foreach($jiwa as $key => $label)
                    <tr>
                        <td class="text-center">{{ $i++ }}</td>
                        <td>{{ $label }}</td>
                        <td class="text-center">{{ strtoupper($surat->mcu_data[$key] ?? 'NORMAL') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top: 20px; text-align: center;">
            <div class="bold">KESIMPULAN HASIL PEMERIKSAAN JIWA</div>
            <div
                style="border: 2px solid #000; padding: 10px; width: 350px; margin: 10px auto; font-weight: bold; font-size: 11pt;">
                {{ $surat->mcu_data['jiwa_kesimpulan'] ?? 'Direkomendasikan' }}
            </div>
        </div>

        <table style="width: 100%; margin-top: 40px; border-collapse: collapse; page-break-inside: avoid;">
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
                <td style="width: 50%; text-align: center; vertical-align: top; font-size: 10pt;">
                    Sragen, {{ \Carbon\Carbon::parse($surat->tanggal_cetak)->translatedFormat('d F Y') }}<br>
                    Dokter Pemeriksa
                </td>
            </tr>
            <tr>
                <td style="height: 100px; position: relative; text-align: center;">
                    @if($mengetahui && str_contains($mengetahui->nama_dokter, 'Mayasari Ayu Hendrawati'))
                        <img src="{{ asset('images/ttd_dr_maya.png') }}"
                            style="height: 100px; width: auto; position: absolute; left: 50%; transform: translateX(-50%); top: -10px; z-index: 1;">
                    @elseif(!$mengetahui)
                        {{-- Default Mengetahui is Dr. Maya --}}
                        <img src="{{ asset('images/ttd_dr_maya.png') }}"
                            style="height: 100px; width: auto; position: absolute; left: 50%; transform: translateX(-50%); top: -10px; z-index: 1;">
                    @endif
                </td>
                <td style="height: 100px; position: relative; text-align: center;">
                    @if(str_contains($surat->dokter->nama_dokter, 'Mayasari Ayu Hendrawati'))
                        <img src="{{ asset('images/ttd_dr_maya.png') }}"
                            style="height: 100px; width: auto; position: absolute; left: 50%; transform: translateX(-50%); top: -10px; z-index: 1;">
                    @endif
                </td>
            </tr>
            <tr>
                <td style="text-align: center; vertical-align: top; font-size: 10pt;">
                    @if($mengetahui)
                        <strong><u>{{ $mengetahui->nama_dokter }}</u></strong><br>
                        NIP. {{ $mengetahui->nip }}
                    @else
                        <strong><u>dr. Mayasari Ayu Hendrawati, MM</u></strong><br>
                        NIP. 198105172010012026
                    @endif
                </td>
                <td style="text-align: center; vertical-align: top; font-size: 10pt;">
                    <strong><u>{{ $surat->dokter->nama_dokter }}</u></strong><br>
                    NIP. {{ $surat->dokter->nip }}
                </td>
            </tr>
        </table>
    </div>

</body>

</html>