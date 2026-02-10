<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Poli {{ $type }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 18px;
            margin: 0;
            text-transform: uppercase;
        }

        .header p {
            margin: 2px 0;
            font-size: 11px;
        }

        .report-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .report-title h2 {
            font-size: 14px;
            text-transform: uppercase;
            margin: 0;
        }

        .report-title p {
            margin: 5px 0;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            text-transform: uppercase;
            font-size: 10px;
        }

        .footer {
            margin-top: 50px;
            float: right;
            width: 250px;
            text-align: center;
        }

        .signature-space {
            height: 80px;
        }

        @media print {
            .no-print {
                display: none;
            }

            body {
                padding: 0;
            }
        }

        .btn-print {
            background: #1e293b;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="no-print" style="text-align: center;">
        <button class="btn-print" onclick="window.print()">Cetak Sekarang</button>
    </div>

    <!-- Kop Surat -->
    <div class="header">
        <h1>RSUD Gemolong</h1>
        <p>Jl. Gatot Subroto No.10, Gemolong, Sragen</p>
        <p>Telp: (0271) 681122 | Email: rsudgemolong@sragenkab.go.id</p>
    </div>

    <!-- Judul Laporan -->
    <div class="report-title">
        <h2>Laporan Data Surat Keterangan</h2>
        <p>Poli / Unit: {{ $type }}</p>
        <p>Periode:
            @if($startDate && $endDate)
                {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }} -
                {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}
            @else
                Hingga {{ date('d/m/Y') }}
            @endif
        </p>
    </div>

    <!-- Tabel Data -->
    <table>
        <thead>
            <tr>
                <th style="width: 30px; text-align: center;">No</th>
                <th style="width: 80px;">Tanggal</th>
                <th style="width: 120px;">No. Registrasi</th>
                <th>Nama Pasien</th>
                <th style="width: 150px;">Nomor Surat</th>
                <th>Tipe Berkas</th>
                <th>Dokter Pemeriksa</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reports as $index => $row)
                <tr>
                    <td style="text-align: center;">{{ $index + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($row->tanggal_cetak)->format('d/m/Y') }}</td>
                    <td>{{ $row->pendaftar->no_registrasi }}</td>
                    <td>{{ $row->pendaftar->nama_lengkap }}</td>
                    <td>{{ $row->nomor_surat }}</td>
                    <td>{{ $row->tipe_berkas }}</td>
                    <td>{{ $row->dokter->nama_dokter }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 50px;">Tidak ada data ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Tanda Tangan -->
    <div class="footer">
        <p>Sragen, {{ date('d F Y') }}</p>
        <p>Mengetahui,</p>
        <p><strong>Admin RSUD Gemolong</strong></p>
        <div class="signature-space"></div>
        <p>( __________________________ )</p>
    </div>

    <script>
        // Auto print logic can be added here if desired
    </script>
</body>

</html>