@php
    $isNarkoba = isset($surat) && $surat->tipe_berkas == 'Bebas Narkoba';
    $marginTop = $isNarkoba ? '20px' : '40px';
    $spacerHeight = $isNarkoba ? '60px' : '100px';

    $isMayaMengetahui = ($mengetahui && str_contains($mengetahui->nama_dokter, 'Mayasari Ayu Hendrawati'));
    $isMayaPemeriksa = str_contains($surat->dokter->nama_dokter, 'Mayasari Ayu Hendrawati');
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
        <td style="height: {{ $spacerHeight }}; position: relative; text-align: center;">
            @if($isMayaMengetahui)
                <img src="{{ asset('images/ttd_dr_maya.png') }}"
                    style="height: 100px; width: auto; position: absolute; left: 50%; transform: translateX(-50%); top: -10px; z-index: 1;">
            @endif
        </td>
        <td style="height: {{ $spacerHeight }}; position: relative; text-align: center;">
            @if($isMayaPemeriksa)
                <img src="{{ asset('images/ttd_dr_maya.png') }}"
                    style="height: 100px; width: auto; position: absolute; left: 50%; transform: translateX(-50%); top: -10px; z-index: 1;">
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
                @if(isset($use_sip) && $use_sip && $surat->dokter->sip)
                    No. SIP: {{ $surat->dokter->sip }}
                @else
                    NIP. {{ $surat->dokter->nip }}
                @endif
            </div>
        </td>
    </tr>
</table>