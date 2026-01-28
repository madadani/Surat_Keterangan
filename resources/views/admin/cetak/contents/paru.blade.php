{{-- Content: Surat Keterangan Paru - Format Khusus --}}
<div style="text-align: center; margin-bottom: 25px;">
    <div
        style="display: inline-block; border-bottom: 1.5px solid #000; padding-bottom: 0px; line-height: 1; font-weight: bold; font-size: 14pt; text-transform: uppercase;">
        SURAT KETERANGAN DOKTER</div>
    <div style="margin-top: 5px; font-size: 12pt;">
        No. <span style="text-decoration: underline;">{{ $surat->nomor_surat }}</span>
    </div>
</div>

<div class="content">
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 25px;">
        <tr>
            <td style="width: 20px; padding: 8px 0; vertical-align: top;">1.</td>
            <td style="width: 100px; padding: 8px 0; vertical-align: top;">Nama</td>
            <td style="width: 15px; padding: 8px 0; vertical-align: top;">:</td>
            <td style="padding: 8px 0; border-bottom: 1px dotted #000; text-transform: uppercase; font-weight: bold;">
                {{ $surat->pendaftar->nama_lengkap }}</td>
        </tr>
        <tr>
            <td style="padding: 8px 0; vertical-align: top;">2.</td>
            <td style="padding: 8px 0; vertical-align: top;">Umur</td>
            <td style="padding: 8px 0; vertical-align: top;">:</td>
            <td style="padding: 8px 0; border-bottom: 1px dotted #000;">
                {{ \Carbon\Carbon::parse($surat->pendaftar->tanggal_lahir)->age }} Tahun</td>
        </tr>
        <tr>
            <td style="padding: 8px 0; vertical-align: top;">3.</td>
            <td style="padding: 8px 0; vertical-align: top;">Alamat</td>
            <td style="padding: 8px 0; vertical-align: top;">:</td>
            <td style="padding: 8px 0; border-bottom: 1px dotted #000;">{{ $surat->pendaftar->alamat }}</td>
        </tr>
        <tr>
            <td colspan="4" style="height: 15px;"></td>
        </tr>
        <tr>
            <td style="padding: 8px 0; vertical-align: top;">4.</td>
            <td style="padding: 8px 0; vertical-align: top;">Diagnosa</td>
            <td style="padding: 8px 0; vertical-align: top;">:</td>
            <td style="padding: 8px 0; border-bottom: 1px dotted #000;">{{ $surat->hasil_pemeriksaan ?? '-' }}</td>
        </tr>
        <tr>
            <td colspan="4" style="height: 15px;"></td>
        </tr>
        <tr>
            <td style="padding: 8px 0; vertical-align: top;">5.</td>
            <td style="padding: 8px 0; vertical-align: top;">Keterangan</td>
            <td style="padding: 8px 0; vertical-align: top;">:</td>
            <td style="padding: 8px 0; border-bottom: 1px dotted #000;">{{ $surat->saran ?? '-' }}</td>
        </tr>
    </table>

    <p style="margin-top: 30px; margin-bottom: 40px;">Sekiranya surat keterangan ini dapat digunakan sebagaimana
        mestinya.</p>
</div>