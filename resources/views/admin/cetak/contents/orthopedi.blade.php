{{-- Content: Surat Keterangan Poli Orthopedi --}}
<div style="text-align: center; margin-bottom: 20px;">
    <div
        style="display: inline-block; border-bottom: 1.5px solid #000; padding-bottom: 0px; line-height: 1; font-weight: bold; font-size: 14pt; text-transform: uppercase;">
        SURAT KETERANGAN SEHAT
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
                {{ $surat->mcu_data['bmi'] ?? '-' }})</span>
        </div>
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
        <div class="field">
            <span class="label" style="vertical-align: top;">Pemeriksaan Fisik</span>
            <span class="dots" style="vertical-align: top;">:</span>
            <span class="value">
                Gangguan Motorik :
                {{ isset($surat->mcu_data['gangguan_motorik']) ? ($surat->mcu_data['gangguan_motorik'] == 'Tidak' ? 'TIDAK ADA' : strtoupper($surat->mcu_data['gangguan_motorik'])) : '-' }}<br>
                Disabilitas :
                {{ isset($surat->mcu_data['disabilitas']) ? ($surat->mcu_data['disabilitas'] == 'Tidak' ? 'TIDAK ADA' : strtoupper($surat->mcu_data['disabilitas'])) : '-' }}
                @if(isset($surat->mcu_data['keterangan_lainnya']) && $surat->mcu_data['keterangan_lainnya'])
                    <br>Catatan : {{ $surat->mcu_data['keterangan_lainnya'] }}
                @endif
            </span>
        </div>
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