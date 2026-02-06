<!DOCTYPE html>
<html lang="id">
@php
    \Carbon\Carbon::setLocale('id');
@endphp

<head>
    <meta charset="UTF-8">
    <title>Hasil Pemeriksaan MCU - {{ $surat->pendaftar->nama_lengkap }}</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f1f5f9;
            margin: 0;
            padding: 0;
            line-height: 1.4;
            color: #000;
            font-size: 10pt;
        }

        .paper {
            width: 210mm;
            min-height: 297mm;
            padding: 10mm 20mm 12.5mm 17.5mm;
            margin: 20px auto;
            background: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            position: relative;
        }

        @media print {
            body {
                background: none;
            }

            .paper {
                margin: 0;
                box-shadow: none;
                width: 100%;
                min-height: auto;
                padding: 10mm 15mm;
            }

            .no-print {
                display: none !important;
            }
        }

        @page {
            size: auto;
            margin: 0;
        }

        .kop h2 {
            margin: 0;
            text-transform: uppercase;
            font-size: 18px;
        }

        .kop p {
            margin: 0;
            font-size: 12px;
        }

        .title {
            text-align: center;
            font-size: 12pt;
            font-weight: bold;
            text-decoration: underline;
            margin: 15px 0 10px 0;
            text-transform: uppercase;
        }

        .section-title {
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 5px;
            text-transform: uppercase;
            page-break-after: avoid;
        }

        .title {
            text-align: center;
            font-size: 12pt;
            font-weight: bold;
            text-decoration: underline;
            margin: 15px 0 10px 0;
            text-transform: uppercase;
            page-break-after: avoid;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px;
            table-layout: fixed;
            page-break-inside: auto;
        }

        table.bordered td,
        table.bordered th {
            border: 1px solid #000;
            padding: 4px 8px;
            vertical-align: middle;
        }

        .text-center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }

        .page-break {
            page-break-before: always;
            clear: both;
        }

        .footer {
            margin-top: 30px;
            width: 100%;
        }

        .footer-table td {
            width: 50%;
            vertical-align: top;
            text-align: center;
        }

        /* Inline Label for colon alignment */
        .inline-label {
            display: inline-block;
            width: 90px;
        }

        .inline-label-wide {
            display: inline-block;
            width: 120px;
        }

        .inline-label-vwide {
            display: inline-block;
            width: 250px;
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
        <a href="{{ url('/admin/buat-surat/rtf/' . $surat->id) }}" class="btn-print-action btn-unduh">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            Unduh RTF
        </a>
        <button onclick="window.close(); if(!window.closed) history.back();" class="btn-print-action btn-tutup">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Tutup
        </button>
    </div>

    <div class="paper">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width: 80px; text-align: center; padding-bottom: 5px;">
                    <img src="{{ asset('images/logo-sragen.png') }}" alt="Logo Sragen"
                        style="height: 80px; width: auto;" width="80">
                </td>
                <td style="text-align: center; padding-bottom: 5px;">
                    <h3
                        style="margin: 0; font-size: 13pt; font-weight: normal; font-family: 'Times New Roman', Times, serif;">
                        PEMERINTAH KABUPATEN SRAGEN</h3>
                    <h1
                        style="margin: 0; font-size: 17pt; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                        RSUD dr. SOERATNO GEMOLONG</h1>
                    <p style="margin: 0; font-size: 10pt; font-family: 'Times New Roman', Times, serif;">Jl. R. Ngt.
                        Tjitrosantjoko 10, Gemolong, Sragen, Jawa Tengah 57274</p>
                    <p style="margin: 0; font-size: 9pt; font-family: 'Times New Roman', Times, serif;">
                        Telp. (0271) 6811839, Laman: rsudgemolong.sragenkab.go.id, Pos-el: rsudgemolong@gmail.com</p>
                </td>
                <td style="width: 80px; text-align: center; padding-bottom: 5px;">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo RSUD" style="height: 80px; width: auto;"
                        width="80">
                </td>
            </tr>
        </table>

        <!-- Garis Ganda: Atas Tipis (1.5pt), Bawah Tebal (3pt) -->
        <div style="border-top: 1.5pt solid #000; margin-bottom: 2pt; margin-top: 2pt;"></div>
        <div style="border-top: 3.5pt solid #000; margin-bottom: 15pt;"></div>

        <div class="title">PEMERIKSAAN FISIK</div>
        <div class="text-center" style="margin-top: -5px; margin-bottom: 20px; font-weight: bold; font-size: 11pt;">
            No. {{ $surat->nomor_surat }}
        </div>

        <div class="bold" style="margin-bottom: 2px;">DATA PASIEN</div>
        <table class="bordered">
            <tr>
                <td style="width: 50%"><span class="inline-label">Nama</span>: {{ $surat->pendaftar->nama_lengkap }}
                </td>
                <td style="width: 50%"><span class="inline-label">No. Lab</span>: {{ $surat->no_lab }}</td>
            </tr>
            <tr>
                <td><span class="inline-label">Tanggal Lahir</span>:
                    {{ \Carbon\Carbon::parse($surat->pendaftar->tanggal_lahir)->translatedFormat('d F Y') }}
                </td>
                <td><span class="inline-label">Jenis kelamin</span>: {{ $surat->pendaftar->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td colspan="2"><span class="inline-label">Alamat</span>: {{ $surat->pendaftar->alamat }}</td>
            </tr>
            <tr>
                <td><span class="inline-label">Perusahaan</span>: {{ $surat->perusahaan }}</td>
                <td><span class="inline-label-wide">Tanggal Medical</span>:
                    {{ \Carbon\Carbon::parse($surat->tanggal_cetak)->translatedFormat('d F Y') }}
                </td>
            </tr>
        </table>

        <div class="section-title">A. PEMERIKSAAN FISIK :</div>
        <table class="bordered">
            <tr>
                <td style="width: 33%"><span class="inline-label">Tinggi badan</span>: {{ $surat->tinggi_badan }} cm
                </td>
                <td style="width: 34%"><span class="inline-label">BMI</span>: {{ $surat->mcu_data['bmi'] ?? '-' }} Kg/m2
                </td>
                <td style="width: 33%"><span class="inline-label">Lk. Dada</span>:
                    {{ $surat->mcu_data['lk_dada'] ?? '-' }} cm
                </td>
            </tr>
            <tr>
                <td><span class="inline-label">Berat badan</span>: {{ $surat->berat_badan }} kg</td>
                <td><span class="inline-label">BMI Kategori</span>: {{ $surat->mcu_data['bmi_kat'] ?? '-' }}</td>
                <td><span class="inline-label">Lk. Perut</span>: {{ $surat->mcu_data['lk_perut'] ?? '-' }} cm</td>
            </tr>
        </table>
        <div style="font-style: italic; margin-bottom: 10px; font-size: 9pt;">Keterangan : BMI Kategori kosong sama
            dengan Normal</div>

        <div class="bold" style="margin-bottom: 5px;">Tekanan darah</div>
        <table class="bordered">
            <tr>
                <td style="width: 50%"><span class="inline-label-wide">Systolic/Diastolic</span>: {{ $surat->tensi }}
                    mmHg</td>
                <td style="width: 50%"><span class="inline-label">RR</span>: {{ $surat->respirasi }} x/menit</td>
            </tr>
            <tr>
                <td><span class="inline-label">HR</span>: {{ $surat->nadi }} x/menit</td>
                <td><span class="inline-label">Suhu</span>: {{ $surat->suhu }} °C</td>
            </tr>
        </table>

        <div class="section-title">B. PEMERIKSAAN FUNGSI PENGLIHATAN (VISUS)</div>
        <table class="bordered">
            <tr>
                <td style="width: 50%"><span class="inline-label-wide">OD tanpa kacamata</span>:
                    {{ $surat->mcu_data['od_tanpa'] ?? '-' }}
                </td>
                <td style="width: 50%"><span class="inline-label-wide">OD dengan kacamata</span>:
                    {{ $surat->mcu_data['od_kaca'] ?? '-' }}
                </td>
            </tr>
            <tr>
                <td><span class="inline-label-wide">OS tanpa kacamata</span>: {{ $surat->mcu_data['os_tanpa'] ?? '-' }}
                </td>
                <td><span class="inline-label-wide">OS dengan kacamata</span>: {{ $surat->mcu_data['os_kaca'] ?? '-' }}
                </td>
            </tr>
            <tr>
                <td colspan="2"><span class="inline-label-wide">Buta Warna</span>: {{ $surat->buta_warna }}</td>
            </tr>
        </table>

        <div class="section-title">C. PEMERIKSAAN ORGAN SUPERFISIAL :</div>
        <table class="bordered">
            <tr>
                <td style="width: 50%"><span class="inline-label">Mata</span>:
                    {{ $surat->mcu_data['super_mata'] ?? 'DBN' }}
                </td>
                <td style="width: 50%"><span class="inline-label">Lymp Node</span>:
                    {{ $surat->mcu_data['super_lymp'] ?? 'DBN' }}
                </td>
            </tr>
            <tr>
                <td><span class="inline-label">Telinga</span>: {{ $surat->mcu_data['super_telinga'] ?? 'DBN' }}</td>
                <td><span class="inline-label">Dada</span>: {{ $surat->mcu_data['super_dada'] ?? 'DBN' }}</td>
            </tr>
            <tr>
                <td><span class="inline-label">Hidung</span>: {{ $surat->mcu_data['super_hidung'] ?? 'DBN' }}</td>
                <td><span class="inline-label">Perut</span>: {{ $surat->mcu_data['super_perut'] ?? 'DBN' }}</td>
            </tr>
            <tr>
                <td><span class="inline-label">Mulut</span>: {{ $surat->mcu_data['super_mulut'] ?? 'DBN' }}</td>
                <td><span class="inline-label">Hernia</span>: {{ $surat->mcu_data['super_hernia'] ?? 'DBN' }}</td>
            </tr>
            <tr>
                <td><span class="inline-label">Faring/laring</span>: {{ $surat->mcu_data['super_faring'] ?? 'DBN' }}
                </td>
                <td><span class="inline-label">Anus</span>: {{ $surat->mcu_data['super_anus'] ?? 'DBN' }}</td>
            </tr>
            <tr>
                <td><span class="inline-label">Konsil</span>: {{ $surat->mcu_data['super_konsil'] ?? 'DBN' }}</td>
                <td><span class="inline-label">Payudara</span>: {{ $surat->mcu_data['super_payudara'] ?? 'DBN' }}</td>
            </tr>
            <tr>
                <td><span class="inline-label">Tyroid</span>: {{ $surat->mcu_data['super_tyroid'] ?? 'DBN' }}</td>
                <td><span class="inline-label">Varises/Hemorid</span>: {{ $surat->mcu_data['super_varises'] ?? 'DBN' }}
                </td>
            </tr>
        </table>
    </div>

    <!-- PAGE 2: VISCERAL -->
    <div class="paper" style="page-break-before: always;">
        <div class="kop" style="display: flex; align-items: center; padding-bottom: 5px; margin-bottom: 2px;">
            <div style="flex: 0 0 80px; text-align: center;">
                <img src="{{ asset('images/logo-sragen.png') }}" alt="Logo Pemkab" style="height: 70px; width: auto;">
            </div>
            <div style="flex: 1; text-align: center;">
                <h3
                    style="margin: 0; font-size: 12pt; font-weight: normal; font-family: 'Times New Roman', Times, serif;">
                    PEMERINTAH KABUPATEN SRAGEN</h3>
                <h1
                    style="margin: 0; font-size: 16pt; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                    RSUD dr. SOERATNO GEMOLONG</h1>
                <p style="margin: 0; font-size: 10pt; font-family: 'Times New Roman', Times, serif;">Jl. R. Ngt.
                    Tjitrosantjoko 10, Gemolong, Sragen, Jawa Tengah 57274
                </p>
                <p
                    style="margin: 0; font-size: 9pt; font-family: 'Times New Roman', Times, serif; white-space: nowrap;">
                    Telp. (0271) 6811839, Laman: rsudgemolong.sragenkab.go.id, Pos-el: rsudgemolong@gmail.com
                </p>
            </div>
            <div style="flex: 0 0 80px; text-align: center;">
                <img src="{{ asset('images/logo.png') }}" alt="Logo RSUD" style="height: 75px; width: auto;">
            </div>
        </div>
        <div style="margin-top: -5px; margin-bottom: 25px;">
            <div style="border-top: 2px solid #000; margin-bottom: 2px;"></div>
            <div style="border-top: 4px solid #000;"></div>
        </div>

        <div class="section-title">D. PEMERIKSAAN ORGAN VISCERAL</div>
        <table class="bordered">
            <tr>
                <td><span class="inline-label-vwide">PARU DAN SISTEM PERNAFASAN</span>:
                    {{ $surat->mcu_data['visc_paru'] ?? 'Vesikuler (+/+), Rhonki (-/-), Wheezing (-/-)' }}
                </td>
            </tr>
            <tr>
                <td><span class="inline-label-vwide">JANTUNG DAN SISTEM CARDIOVASCULAR</span>:
                    {{ $surat->mcu_data['visc_jantung'] ?? 'Bunyi Jantung I/II Murni Reguler' }}
                </td>
            </tr>
            <tr>
                <td><span class="inline-label-vwide">HATI, LIMPA, DAN SISTEM GIT</span>:
                    {{ $surat->mcu_data['visc_hati'] ?? 'Tidak Teraba Pembesaran' }}
                </td>
            </tr>
            <tr>
                <td><span class="inline-label-vwide">GINJAL DAN SISTEM UROGENETAL</span>:
                    {{ $surat->mcu_data['visc_ginjal'] ?? 'Nyeri Ketok CVA (-/-)' }}
                </td>
            </tr>
            <tr>
                <td><span class="inline-label-vwide">SISTEM REPRODUKSI</span>:
                    {{ $surat->mcu_data['visc_reproduksi'] ?? 'Normal' }}
                </td>
            </tr>
        </table>

        <div class="section-title">E. PEMERIKSAAN EXTREMITAS OTOT DAN TULANG :</div>
        <table class="bordered">
            <tr>
                <td>{{ $surat->mcu_data['extremitas'] ?? 'Akral Hangat, Edema (-/-), Motorik Normal' }}</td>
            </tr>
        </table>

        <div class="section-title">F. PEMERIKSAAN MULUT DAN GIGI :</div>
        <p style="text-align: center; font-weight: bold; margin-bottom: 5px;">Kelainan Mulut dan Gigi</p>
        <table class="bordered" style="text-align: center; font-size: 8pt;">
            <tr>
                <th rowspan="2" style="width: 10%">GIGI ATAS</th>
                <th style="width: 10%">Posisi Gigi</th>
                @foreach(['M3', 'M2', 'M1', 'P2', 'P1', 'C', 'I2', 'I1', 'I1', 'I2', 'C', 'P1', 'P2'] as $pos)
                    <th style="width: 5%">{{ $pos }}</th>
                @endforeach
            </tr>
            <tr>
                <th>Kelainan</th>
                @for($i = 1; $i <= 13; $i++)
                <td>{{ $surat->mcu_data['gigi_atas_' . $i] ?? '' }}</td> @endfor
            </tr>
            <tr>
                <th rowspan="2">GIGI BAWAH</th>
                <th>Posisi Gigi</th>
                @foreach(['M3', 'M2', 'M1', 'P2', 'P1', 'C', 'I2', 'I1', 'I1', 'I2', 'C', 'P1', 'P2'] as $pos)
                    <th>{{ $pos }}</th>
                @endforeach
            </tr>
            <tr>
                <th>Kelainan</th>
                @for($i = 1; $i <= 13; $i++)
                <td>{{ $surat->mcu_data['gigi_bawah_' . $i] ?? '' }}</td> @endfor
            </tr>
        </table>

        <div class="section-title">G. PEMERIKSAAN SYARAF DAN SISTEM KOORDINASI :</div>
        <table class="bordered">
            <tr>
                <td style="width: 50%"><span class="inline-label">Ref. Patologis</span>:
                    {{ $surat->mcu_data['saraf_ref'] ?? '-' }}
                </td>
                <td style="width: 50%"><span class="inline-label-wide">Lassague/Patrick/</span>:
                    {{ $surat->mcu_data['saraf_lass'] ?? '-' }}
                </td>
            </tr>
            <tr>
                <td><span class="inline-label">Parastesia</span>: {{ $surat->mcu_data['saraf_para'] ?? '-' }}</td>
                <td><span class="inline-label-wide">Contra Patrick Sign</span>:
                    {{ $surat->mcu_data['saraf_contra'] ?? '-' }}
                </td>
            </tr>
            <tr>
                <td colspan="2"><span class="inline-label">Parese</span>: {{ $surat->mcu_data['saraf_parese'] ?? '-' }}
                </td>
            </tr>
        </table>

        <div class="title" style="margin-top: 25px;">KESIMPULAN PEMERIKSAAN FISIK DAN REKOMENDASI</div>
        <table class="bordered">
            <tr>
                <td><span class="inline-label-wide">Pemeriksaan Fisik</span>:
                    {{ $surat->mcu_data['kesimpulan_fisik'] ?? 'DBN' }}
                </td>
            </tr>
            <tr>
                <td><span class="inline-label-wide">Kesimp. Fisik</span>: {{ $surat->hasil_pemeriksaan }}</td>
            </tr>
            <tr>
                <td><span class="inline-label-wide">Saran</span>: {{ $surat->saran }}</td>
            </tr>
            <tr>
                <td><span class="inline-label-wide">Rekomendasi</span>: {{ $surat->mcu_data['rekomendasi'] ?? '-' }}
                </td>
            </tr>
        </table>
    </div>

    <!-- PAGE 3: RIWAYAT KESEHATAN -->
    <div class="paper" style="page-break-before: always;">
        <div class="kop" style="display: flex; align-items: center; padding-bottom: 5px; margin-bottom: 2px;">
            <div style="flex: 0 0 80px; text-align: center;">
                <img src="{{ asset('images/logo-sragen.png') }}" alt="Logo Pemkab" style="height: 70px; width: auto;">
            </div>
            <div style="flex: 1; text-align: center;">
                <h3
                    style="margin: 0; font-size: 12pt; font-weight: normal; font-family: 'Times New Roman', Times, serif;">
                    PEMERINTAH KABUPATEN SRAGEN</h3>
                <h1
                    style="margin: 0; font-size: 16pt; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                    RSUD dr. SOERATNO GEMOLONG</h1>
                <p style="margin: 0; font-size: 10pt; font-family: 'Times New Roman', Times, serif;">Jl. R. Ngt.
                    Tjitrosantjoko 10, Gemolong, Sragen, Jawa Tengah 57274
                </p>
                <p
                    style="margin: 0; font-size: 9pt; font-family: 'Times New Roman', Times, serif; white-space: nowrap;">
                    Telp. (0271) 6811839, Laman: rsudgemolong.sragenkab.go.id, Pos-el: rsudgemolong@gmail.com
                </p>
            </div>
            <div style="flex: 0 0 80px; text-align: center;">
                <img src="{{ asset('images/logo.png') }}" alt="Logo RSUD" style="height: 75px; width: auto;">
            </div>
        </div>
        <div style="margin-top: -5px; margin-bottom: 25px;">
            <div style="border-top: 2px solid #000; margin-bottom: 2px;"></div>
            <div style="border-top: 4px solid #000;"></div>
        </div>

        <div class="title">RIWAYAT KESEHATAN</div>
        <div class="bold" style="margin-bottom: 2px;">DATA PASIEN</div>
        <table class="bordered">
            <tr>
                <td style="width: 50%"><span class="inline-label">Nama</span>: {{ $surat->pendaftar->nama_lengkap }}
                </td>
                <td style="width: 50%"><span class="inline-label">No. Lab</span>: {{ $surat->no_lab }}</td>
            </tr>
            <tr>
                <td><span class="inline-label">Tanggal Lahir</span>:
                    {{ \Carbon\Carbon::parse($surat->pendaftar->tanggal_lahir)->translatedFormat('d F Y') }}
                </td>
                <td><span class="inline-label">Jenis kelamin</span>: {{ $surat->pendaftar->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td colspan="2"><span class="inline-label">Alamat</span>: {{ $surat->pendaftar->alamat }}</td>
            </tr>
            <tr>
                <td><span class="inline-label">Perusahaan</span>: {{ $surat->perusahaan }}</td>
                <td><span class="inline-label-wide">Tanggal Medical</span>:
                    {{ \Carbon\Carbon::parse($surat->tanggal_cetak)->translatedFormat('d F Y') }}
                </td>
            </tr>
        </table>

        <div class="section-title">A. RIWAYAT KESEHATAN PRIBADI</div>
        <table class="bordered" style="font-size: 9pt;">
            <tr>
                <th style="width: 35%">Penyakit/keluhan</th>
                <th style="width: 15%">Ya/Tidak</th>
                <th style="width: 35%">Penyakit/keluhan</th>
                <th style="width: 15%">Ya/Tidak</th>
            </tr>
            @php
                $histories = [
                    ['Darah Tinggi', 'Sakit Ginjal'],
                    ['Nyeri Dada Kiri', 'Kencing Darah'],
                    ['Sering Berdebar-debar', 'Kencing Manis'],
                    ['Rematik', 'Sakit Liver/Hepatitis/Sakit Kuning'],
                    ['Batuk lama/kronis/berdarah', 'Benjolan/Tumor di tubuh'],
                    ['TBC/Paru-paru', 'Alergi Udara/Makanan/Obat-obatan'],
                    ['Maag', 'Mata tdk normal/gangguan pada mata'],
                    ['Berak Darah/Ambien', 'Kecelakaan/Benturan keras pada kepala'],
                    ['Ashma', 'Keluar nanah dari telinga'],
                    ['Gondok', 'Lain-lain']
                ];
            @endphp
            @foreach($histories as $row)
                <tr>
                    <td>{{ $row[0] }}</td>
                    <td class="text-center">
                        {{ isset($surat->mcu_data['hist_' . Str::slug($row[0])]) && $surat->mcu_data['hist_' . Str::slug($row[0])] == 'Ya' ? 'YA' : 'TIDAK' }}
                    </td>
                    <td>{{ $row[1] }}</td>
                    <td class="text-center">
                        {{ isset($surat->mcu_data['hist_' . Str::slug($row[1])]) && $surat->mcu_data['hist_' . Str::slug($row[1])] == 'Ya' ? 'YA' : 'TIDAK' }}
                    </td>
                </tr>
            @endforeach
        </table>

        <div style="margin-top: 10px;">
            <p>• Pernahkah Anda Kejang-kejang / Pingsan : {{ $surat->mcu_data['hist_kejang'] ?? '-' }}</p>
            <p>&nbsp;&nbsp;Penyebab Pingsan : {{ $surat->mcu_data['hist_kejang_ket'] ?? '-' }}</p>
            <p>• Pernahkah Anda dirawat di rumah sakit : {{ $surat->mcu_data['hist_rawat'] ?? '-' }}</p>
            <p>&nbsp;&nbsp;Sakit apa, Tahun berapa : {{ $surat->mcu_data['hist_rawat_ket'] ?? '-' }}</p>
        </div>

        <div class="section-title">Kebiasaan Sehari-hari</div>
        <table class="bordered">
            <tr>
                <th style="width: 70%">Jenis</th>
                <th style="width: 30%">Ya/Tidak</th>
            </tr>
            <tr>
                <td>Sering minum-minum beralkohol</td>
                <td class="text-center">{{ $surat->mcu_data['habit_alkohol'] ?? 'TIDAK' }}</td>
            </tr>
            <tr>
                <td>Apakah anda merokok</td>
                <td class="text-center">{{ $surat->mcu_data['habit_rokok'] ?? 'TIDAK' }}</td>
            </tr>
            <tr>
                <td>Apakah anda mengkonsumsi Narkoba</td>
                <td class="text-center">{{ $surat->mcu_data['habit_narkoba'] ?? 'TIDAK' }}</td>
            </tr>
            <tr>
                <td>Apakah anda sering minum obat tertentu</td>
                <td class="text-center">{{ $surat->mcu_data['habit_obat'] ?? 'TIDAK' }}</td>
            </tr>
        </table>

        <div class="section-title">RIWAYAT KESEHATAN ORANG TUA</div>
        <table class="bordered">
            <tr>
                <th style="width: 70%">Penyakit/Keluhan</th>
                <th style="width: 30%">Ya/Tidak</th>
            </tr>
            <tr>
                <td>Riwayat Penyakit Kronis yang diderita (Penyakit Jantung, Ginjal, dll)</td>
                <td class="text-center">{{ $surat->mcu_data['hist_ortu'] ?? 'TIDAK' }}</td>
            </tr>
        </table>
    </div>

    <!-- PAGE 4: RESUME -->
    <div class="paper" style="page-break-before: always;">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width: 80px; text-align: center; padding-bottom: 5px;">
                    <img src="{{ asset('images/logo-sragen.png') }}" alt="Logo Sragen"
                        style="height: 80px; width: auto;" width="80">
                </td>
                <td style="text-align: center; padding-bottom: 5px;">
                    <h3
                        style="margin: 0; font-size: 13pt; font-weight: normal; font-family: 'Times New Roman', Times, serif;">
                        PEMERINTAH KABUPATEN SRAGEN</h3>
                    <h1
                        style="margin: 0; font-size: 17pt; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                        RSUD dr. SOERATNO GEMOLONG</h1>
                    <p style="margin: 0; font-size: 10pt; font-family: 'Times New Roman', Times, serif;">Jl. R. Ngt.
                        Tjitrosantjoko 10, Gemolong, Sragen, Jawa Tengah 57274</p>
                    <p style="margin: 0; font-size: 9pt; font-family: 'Times New Roman', Times, serif;">
                        Telp. (0271) 6811839, Laman: rsudgemolong.sragenkab.go.id, Pos-el: rsudgemolong@gmail.com</p>
                </td>
                <td style="width: 80px; text-align: center; padding-bottom: 5px;">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo RSUD" style="height: 80px; width: auto;"
                        width="80">
                </td>
            </tr>
        </table>

        <!-- Garis Ganda: Atas Tipis (1.5pt), Bawah Tebal (3pt) -->
        <div style="border-top: 1.5pt solid #000; margin-bottom: 2pt; margin-top: 2pt;"></div>
        <div style="border-top: 3.5pt solid #000; margin-bottom: 15pt;"></div>

        <div class="title" style="text-decoration: underline; margin-top: 0;">RESUME HASIL PEMERIKSAAN</div>
        <div class="bold" style="margin-bottom: 2px;">DATA PASIEN</div>
        <table class="bordered">
            <tr>
                <td style="width: 50%"><span class="inline-label">Nama</span>: {{ $surat->pendaftar->nama_lengkap }}
                </td>
                <td style="width: 50%"><span class="inline-label">No. Lab</span>: {{ $surat->no_lab }}</td>
            </tr>
            <tr>
                <td><span class="inline-label">Tanggal Lahir</span>:
                    {{ \Carbon\Carbon::parse($surat->pendaftar->tanggal_lahir)->translatedFormat('d F Y') }}
                </td>
                <td><span class="inline-label">Jenis kelamin</span>: {{ $surat->pendaftar->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td colspan="2"><span class="inline-label">Alamat</span>: {{ $surat->pendaftar->alamat }}</td>
            </tr>
            <tr>
                <td><span class="inline-label">Perusahaan</span>: {{ $surat->perusahaan }}</td>
                <td><span class="inline-label-wide">Tanggal Medical</span>:
                    {{ \Carbon\Carbon::parse($surat->tanggal_cetak)->translatedFormat('d F Y') }}
                </td>
            </tr>
        </table>
        <table class="bordered">
            <tr>
                <td><span class="inline-label-wide">Laboratorium</span>: {{ $surat->mcu_data['resume_lab'] ?? '' }}</td>
            </tr>
            <tr>
                <td><span class="inline-label-wide">Fisik Dokter</span>: {{ $surat->mcu_data['resume_fisik'] ?? '' }}
                </td>
            </tr>
            <tr>
                <td><span class="inline-label-wide">Radiologi</span>: {{ $surat->mcu_data['resume_radiologi'] ?? '' }}
                </td>
            </tr>
            <tr>
                <td><span class="inline-label-wide">Pemerik. Tambahan</span>:
                    {{ $surat->mcu_data['resume_tambahan'] ?? '' }}
                </td>
            </tr>
        </table>

        <table class="bordered" style="margin-top: 10px;">
            <tr>
                <td><span class="inline-label-wide">Kesimpulan</span>: {{ $surat->hasil_pemeriksaan }}</td>
            </tr>
            <tr>
                <td><span class="inline-label-wide">Saran</span>: {{ $surat->saran }}</td>
            </tr>
        </table>

        <div class="footer">
            <table class="footer-table">
                <tr>
                <td style="width: 50%; text-align: center; vertical-align: top;">
                    Mengetahui<br>
                    @if($mengetahui)
                        {{ $mengetahui->jabatan }}
                    @else
                        Kepala Bidang Pelayanan<br>
                        RSUD dr. Soeratno Gemolong
                    @endif
                </td>
                    <td style="width: 50%; text-align: center; vertical-align: top;">
                        Sragen, {{ \Carbon\Carbon::parse($surat->tanggal_cetak)->translatedFormat('d F Y') }}<br>
                        Dokter Pemeriksa
                    </td>
                </tr>
                <tr>
                    <td style="height: 80px; position: relative;">
                        @if((isset($mengetahui) && $mengetahui && str_contains($mengetahui->nama_dokter, 'Mayasari Ayu Hendrawati')) || (!isset($mengetahui) || !$mengetahui))
                            <img src="{{ asset('images/ttd_dr_maya.png') }}"
                                style="height: 100px; width: auto; position: absolute; left: 50%; transform: translateX(-50%); top: -10px; z-index: 1;">
                        @endif
                    </td>
                    <td style="height: 80px; position: relative;">
                        @if(str_contains($surat->dokter->nama_dokter, 'Mayasari Ayu Hendrawati'))
                            <img src="{{ asset('images/ttd_dr_maya.png') }}"
                                style="height: 100px; width: auto; position: absolute; left: 50%; transform: translateX(-50%); top: -10px; z-index: 1;">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%; text-align: center; vertical-align: top;">
                        @if(isset($mengetahui) && $mengetahui)
                            <span class="bold"><u>{{ $mengetahui->nama_dokter }}</u></span><br>
                            NIP. {{ $mengetahui->nip }}
                        @else
                            <span class="bold"><u>dr. Mayasari Ayu Hendrawati, MM</u></span><br>
                            NIP. 198105172010012026
                        @endif
                    </td>
                    <td style="width: 50%; text-align: center; vertical-align: top;">
                        <span class="bold"><u>{{ $surat->dokter->nama_dokter }}</u></span><br>
                        NIP. {{ $surat->dokter->nip }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>