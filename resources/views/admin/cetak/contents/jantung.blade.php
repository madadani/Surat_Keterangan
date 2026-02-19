<style>
    .section-title {
        font-weight: bold;
        text-decoration: underline;
        margin-top: 20px;
        margin-bottom: 8px;
        font-size: 11pt;
    }

    table.bordered {
        width: 100%;
        border-collapse: collapse;
        margin-top: 8px;
        font-size: 10pt;
    }

    table.bordered th,
    table.bordered td {
        border: 1px solid #000;
        padding: 6px 10px;
    }

    .field-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .field-table td {
        padding: 4px 0;
        vertical-align: top;
        font-size: 11pt;
    }

    .label-col {
        width: 160px;
    }

    .dots-col {
        width: 20px;
        text-align: center;
    }

    .value-col {
        font-weight: bold;
    }
</style>

<div style="text-align: center; margin-bottom: 25px;">
    <div
        style="display: inline-block; border-bottom: 1.5px solid #000; padding-bottom: 1px; font-weight: bold; font-size: 14pt; text-transform: uppercase; letter-spacing: 0.5px;">
        SURAT KETERANGAN SEHAT JANTUNG
    </div>
    <div style="margin-top: 5px; font-size: 11pt; text-decoration: underline;">
        No. {{ $surat->nomor_surat }}
    </div>
</div>

<div class="content">
    <p style="text-align: justify; line-height: 1.5; margin-bottom: 15px;">Yang bertanda tangan dibawah ini Dokter
        spesialis Jantung Rumah Sakit Umum Daerah dr. Soeratno Gemolong Kabupaten Sragen, dengan ini menerangkan bahwa :
    </p>

    <table class="field-table">
        <tr>
            <td class="label-col">Nama Lengkap</td>
            <td class="dots-col">:</td>
            <td class="value-col">{{ strtoupper($surat->pendaftar->nama_lengkap) }}</td>
        </tr>
        <tr>
            <td class="label-col">Umur</td>
            <td class="dots-col">:</td>
            <td class="value-col">{{ \Carbon\Carbon::parse($surat->pendaftar->tanggal_lahir)->age }} Tahun</td>
        </tr>
        <tr>
            <td class="label-col">Jenis Kelamin</td>
            <td class="dots-col">:</td>
            <td class="value-col">{{ $surat->pendaftar->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td class="label-col">Pekerjaan</td>
            <td class="dots-col">:</td>
            <td class="value-col">{{ $surat->pekerjaan ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label-col">Alamat</td>
            <td class="dots-col">:</td>
            <td class="value-col">{{ $surat->pendaftar->alamat }}</td>
        </tr>
    </table>

    <div class="section-title">I. PEMERIKSAAN PENUNJANG</div>
    <table class="field-table" style="margin-top: 0;">
        <tr>
            <td style="width: 250px;">1. Kesimpulan EKG</td>
            <td class="dots-col">:</td>
            <td>{{ $surat->mcu_data['jantung_ekg'] ?? '-' }}</td>
        </tr>
        <tr>
            <td style="width: 250px;">2. Kesimpulan Treadmill Stress</td>
            <td class="dots-col">:</td>
            <td>{{ $surat->mcu_data['jantung_treadmill'] ?? '-' }}</td>
        </tr>
        <tr>
            <td style="width: 250px;">3. Kesimpulan Echocardiografi</td>
            <td class="dots-col">:</td>
            <td>{{ $surat->mcu_data['jantung_echo'] ?? '-' }}</td>
        </tr>
    </table>

    <div class="section-title" style="margin-top: 15px;">II. KESIMPULAN</div>
    <p style="text-align: justify; margin: 5px 0; line-height: 1.4;">
        Telah diperiksa dengan teliti dan berpendapat bahwa yang diperiksa :<br>
        <span style="font-weight: bold; font-size: 11pt;">{{ strtoupper($surat->hasil_pemeriksaan) }}</span>
    </p>

    <div style="margin-top: 10px; display: table; width: 100%;">
        <div style="display: table-cell; width: 160px;">Keterangan / Saran :</div>
        <div style="display: table-cell; border-bottom: 1px dotted #000; padding-bottom: 2px;">
            {{ $surat->saran ?? 'Tidak Ada' }}
        </div>
    </div>

    <p style="margin-top: 20px;">Demikian surat keterangan ini dibuat untuk dapat dipergunakan seperlunya.</p>
</div>