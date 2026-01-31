@php
    $isNarkoba = isset($surat) && $surat->tipe_berkas == 'Bebas Narkoba';
    $marginTop = $isNarkoba ? '20px' : '40px';
    $spacerHeight = $isNarkoba ? '60px' : '100px';
@endphp
<table style="width: 100%; margin-top: {{ $marginTop }}; border-collapse: collapse;">
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
            {{ $jabatan_dokter ?? 'Dokter Pemeriksa' }}
        </td>
    </tr>
    <tr>
        <td style="height: {{ $spacerHeight }};"></td>
        <td style="height: {{ $spacerHeight }};"></td>
    </tr>
    <tr>
        <td style="text-align: center; vertical-align: top;">
            @if($mengetahui)
                <strong><u>{{ $mengetahui->nama_dokter }}</u></strong><br>
                NIP. {{ $mengetahui->nip }}
            @else
                <strong><u>dr. Mayasari Ayu Hendrawati, MM</u></strong><br>
                NIP. 198105172010012026
            @endif
        </td>
        <td style="text-align: center; vertical-align: top;">
            <strong><u>{{ $surat->dokter->nama_dokter }}</u></strong><br>
            @if(isset($use_sip) && $use_sip && $surat->dokter->sip)
                No. SIP: {{ $surat->dokter->sip }}
            @else
                NIP. {{ $surat->dokter->nip }}
            @endif
        </td>
    </tr>
</table>