{{-- Content: Surat Keterangan Poli Spesialis (Paru, Dalam, Ortho) - Format Sederhana --}}
<div style="text-align: center; margin-bottom: 20px;">
    <div
        style="display: inline-block; border-bottom: 1.5px solid #000; padding-bottom: 0px; line-height: 1; font-weight: bold; font-size: 14pt; text-transform: uppercase;">
        SURAT KETERANGAN SEHAT</div>
    <div style="margin-top: 5px; font-size: 12pt; text-decoration: underline;">
        No. {{ $surat->nomor_surat }}
    </div>
</div>

<div class="content">
    <p style="text-align: justify;">Yang bertandatangan dibawah ini dokter penguji kesehatan Rumah Sakit Umum Daerah
        dr. Soeratno Gemolong Kabupaten Sragen, mengingat sumpah/janji jabatan, dengan ini menerangkan dengan
        sesungguhnya bahwa :</p>

    <div class="field-container">
        <div class="field">
            <span class="label">Nama Lengkap</span>
            <span class="dots">:</span>
            <span class="value" style="text-transform: uppercase;">{{ $surat->pendaftar->nama_lengkap }}</span>
        </div>
        <div class="field">
            <span class="label">Tempat/Tanggal Lahir</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->pendaftar->tempat_lahir }},
                {{ \Carbon\Carbon::parse($surat->pendaftar->tanggal_lahir)->translatedFormat('d F Y') }}</span>
        </div>
        <div class="field">
            <span class="label">Pekerjaan</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->pekerjaan ?? '-' }}</span>
        </div>
        <div class="field">
            <span class="label">Alamat</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->pendaftar->alamat }}</span>
        </div>
        @php
            $extraFields = str_contains($surat->tipe_berkas, 'Dalam') || str_contains($surat->tipe_berkas, 'Orthopedi') || str_contains($surat->tipe_berkas, 'Ortopedi');
        @endphp

        <div class="field">
            <span class="label">Tinggi/Berat Badan</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->tinggi_badan ?? '-' }} cm / {{ $surat->berat_badan ?? '-' }} kg
                @if($extraFields) (IMT: {{ $surat->mcu_data['bmi_poli'] ?? '-' }} kg/m<sup>2</sup>) @endif
            </span>
        </div>

        @if($extraFields)
            <div class="field">
                <span class="label">Tekanan Darah</span>
                <span class="dots">:</span>
                <span class="value">{{ $surat->tensi ?? '-' }} mmHg</span>
            </div>
            <div class="field">
                <span class="label">Nadi / Suhu / RR</span>
                <span class="dots">:</span>
                <span class="value">{{ $surat->nadi ?? '-' }} x/mnt / {{ $surat->suhu ?? '-' }} &deg;C /
                    {{ $surat->respirasi ?? '-' }} x/mnt</span>
            </div>
            <div class="field">
                <span class="label">Pemeriksaan Fisik</span>
                <span class="dots">:</span>
                <span class="value">
                    <strong>Gangguan Motorik : {{ $surat->mcu_data['motorik_poli'] ?? '-' }}</strong>
                </span>
            </div>
            <div class="field" style="margin-top: -5px;">
                <span class="label">&nbsp;</span>
                <span class="dots">&nbsp;</span>
                <span class="value">
                    <strong>Disabilitas : {{ $surat->mcu_data['disabilitas_poli'] ?? '-' }}</strong>
                </span>
            </div>
        @endif
    </div>

    @if($extraFields)
        <p style="text-align: justify; margin-top: 20px;">
            Telah diperiksa dengan teliti dan berpendapat bahwa yang diperiksa, ternyata :
        </p>
        <div style="margin-left: 25px; line-height: 1.6;">
            <strong>
                1. {{ strtoupper($surat->hasil_pemeriksaan) }} /
                {{ strtoupper($surat->hasil_pemeriksaan) == 'SEHAT' ? 'TIDAK SEHAT' : 'SEHAT' }} *)<br>
                2.
                {{ ($surat->buta_warna == 'BUTA WARNA' || ($surat->mcu_data['buta_warna_poli'] ?? '') == 'BUTA WARNA') ? 'BUTA WARNA' : 'TIDAK BUTA WARNA' }}
                /
                {{ ($surat->buta_warna == 'BUTA WARNA' || ($surat->mcu_data['buta_warna_poli'] ?? '') == 'BUTA WARNA') ? 'TIDAK BUTA WARNA' : 'BUTA WARNA' }}
                *)
            </strong>
        </div>
        <p style="font-size: 9pt; font-style: italic; margin-top: 10px;">*) Coret yang tidak perlu</p>
    @else
        <p style="text-align: justify; margin-top: 20px;">
            Telah diperiksa dengan teliti dan berpendapat bahwa yang diperiksa, ternyata
            <strong>{{ strtoupper($surat->hasil_pemeriksaan) }}</strong>@if($surat->buta_warna),
                <strong>{{ $surat->buta_warna == 'Ya' ? 'BUTA WARNA' : 'TIDAK BUTA WARNA' }}</strong>
            @endif
        </p>
    @endif

    @if($surat->keperluan)
        <div class="field" style="margin-top: 20px;">
            <span class="label" style="width: auto; margin-right: 10px;">Keperluan :</span>
            <span class="value" style="font-weight: bold; text-transform: uppercase;">{{ $surat->keperluan }}</span>
        </div>
    @endif

    <p style="margin-top: 20px;">Demikian Surat keterangan ini dibuat untuk dapat dipergunakan seperlunya.</p>

</div>