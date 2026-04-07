{{-- Content: Surat Keterangan Sehat --}}
<div style="text-align: center; margin-bottom: 20px;">
    <div
        style="display: inline-block; border-bottom: 1.5px solid #000; padding-bottom: 0px; line-height: 1; font-weight: bold; font-size: 14pt; text-transform: uppercase;">
        @if($surat->hasil_pemeriksaan == 'Sehat Fisik')
            SURAT KETERANGAN SEHAT FISIK
        @elseif($surat->hasil_pemeriksaan == 'Sehat Jasmani')
            SURAT KETERANGAN SEHAT JASMANI
        @else
            SURAT KETERANGAN SEHAT
        @endif
    </div>
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
            <span class="value">{{ $surat->pendaftar->nama_lengkap }}</span>
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
        <div class="field">
            <span class="label">Tinggi/Berat Badan</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->tinggi_badan }} cm / {{ $surat->berat_badan }} kg &nbsp;&nbsp;(IMT:
                {{ $surat->mcu_data['bmi'] ?? '-' }} kg/m<sup>2</sup>)</span>
        </div>
        @if(isset($surat->mcu_data['golongan_darah']) && $surat->mcu_data['golongan_darah'])
            <div class="field">
                <span class="label">Golongan Darah</span>
                <span class="dots">:</span>
                <span class="value">{{ $surat->mcu_data['golongan_darah'] }}</span>
            </div>
        @endif
        <div class="field">
            <span class="label">Tekanan Darah</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->tensi }} mmHg</span>
        </div>
        <div class="field">
            <span class="label">Nadi / Suhu / RR</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->nadi }} x/mnt &nbsp;/&nbsp; {{ $surat->suhu }} °C &nbsp;/&nbsp;
                {{ $surat->respirasi }} x/mnt</span>
        </div>
        @php
            $show_motorik = isset($surat->mcu_data['tampilkan_motorik']) && $surat->mcu_data['tampilkan_motorik'] == 'Ya';
            $show_disabilitas = isset($surat->mcu_data['tampilkan_disabilitas']) && $surat->mcu_data['tampilkan_disabilitas'] == 'Ya';
            $show_fisik_manual = isset($surat->mcu_data['tampilkan_fisik']) && $surat->mcu_data['tampilkan_fisik'] == 'Ya';
            $show_penunjang = isset($surat->mcu_data['tampilkan_penunjang']) && $surat->mcu_data['tampilkan_penunjang'] == 'Ya';
        @endphp
        
        @if($show_motorik || $show_disabilitas || $show_fisik_manual)
        <div class="field">
            <span class="label" style="vertical-align: top;">Pemeriksaan Fisik</span>
            <span class="dots" style="vertical-align: top;">:</span>
            <span class="value">
                @if($show_motorik)
                    Gangguan Motorik :
                    {{ isset($surat->mcu_data['gangguan_motorik']) ? ($surat->mcu_data['gangguan_motorik'] == 'Tidak' ? 'TIDAK ADA' : strtoupper($surat->mcu_data['gangguan_motorik'])) : '-' }}
                @endif
                @if($show_disabilitas)
                    {!! $show_motorik ? '<br>' : '' !!}
                    Disabilitas :
                    {{ isset($surat->mcu_data['disabilitas']) ? ($surat->mcu_data['disabilitas'] == 'Tidak' ? 'TIDAK ADA' : strtoupper($surat->mcu_data['disabilitas'])) : '-' }}
                @endif
                @if($show_fisik_manual)
                    {!! ($show_motorik || $show_disabilitas) ? '<br>' : '' !!}
                    {{ $surat->mcu_data['pemeriksaan_fisik_manual'] ?? '' }}
                @endif
            </span>
        </div>
        @endif

        @if($show_penunjang)
        <div class="field">
            <span class="label" style="vertical-align: top;">Pemeriksaan Penunjang</span>
            <span class="dots" style="vertical-align: top;">:</span>
            <span class="value">{{ $surat->mcu_data['pemeriksaan_penunjang_manual'] ?? '' }}</span>
        </div>
        @endif
    </div>

    <p style="text-align: justify; margin-top: 20px;">
        Telah diperiksa dengan teliti dan berpendapat bahwa yang diperiksa, ternyata :
    </p>

    <div style="margin: 10px 0 20px 40px; font-weight: bold;">
        1. SEHAT / TIDAK SEHAT *)<br>
        2. TIDAK BUTA WARNA / BUTA WARNA *)
    </div>

    <div style="font-size: 10pt; font-style: italic; margin-bottom: 10px;">
        *) Coret yang tidak perlu
    </div>

    <div class="field" style="margin-top: 20px;">
        <span class="label" style="width: auto; margin-right: 10px;">Keperluan :</span>
        <span class="value" style="font-weight: bold; text-transform: uppercase;">{{ $surat->keperluan }}</span>
    </div>

    <p style="margin-top: 20px;">Demikian Surat keterangan ini dibuat untuk dapat dipergunakan seperlunya.</p>
</div>