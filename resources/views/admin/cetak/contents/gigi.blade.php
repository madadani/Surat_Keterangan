{{-- Content: Surat Keterangan Pemeriksaan Gigi --}}
<div style="text-align: center; margin-bottom: 20px;">
    <div
        style="display: inline-block; border-bottom: 1.5px solid #000; padding-bottom: 0px; line-height: 1; font-weight: bold; font-size: 14pt; text-transform: uppercase;">
        SURAT KETERANGAN PEMERIKSAAN GIGI</div>
    <div style="margin-top: 5px; font-size: 12pt; text-decoration: underline;">
        No. {{ $surat->nomor_surat }}
    </div>
</div>

<div class="content">
    <p>Yang bertanda tangan di bawah ini :</p>

    <div class="field-container">
        <div class="field">
            <span class="label">Nama Dokter</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->dokter->nama_dokter }}</span>
        </div>
        <div class="field">
            <span class="label">No. SIP</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->dokter->sip ?? '-' }}</span>
        </div>
        <div class="field">
            <span class="label">Jabatan</span>
            <span class="dots">:</span>
            <span class="value">Dokter Gigi</span>
        </div>
        <div class="field">
            <span class="label">Instansi</span>
            <span class="dots">:</span>
            <span class="value">Poliklinik Gigi dan Mulut RSUD dr. Soeratno Gemolong</span>
        </div>
    </div>

    <p>Dengan ini menerangkan bahwa :</p>

    <div class="field-container">
        <div class="field">
            <span class="label">Nama Pasien</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->pendaftar->nama_lengkap }}</span>
        </div>
        <div class="field">
            <span class="label">Umur / JK</span>
            <span class="dots">:</span>
            <span class="value">{{ \Carbon\Carbon::parse($surat->pendaftar->tanggal_lahir)->age }} Tahun /
                {{ $surat->pendaftar->jenis_kelamin }}</span>
        </div>
        <div class="field">
            <span class="label">Alamat</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->pendaftar->alamat }}</span>
        </div>
        <div class="field">
            <span class="label">No. RM</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->pendaftar->no_rm ?? '' }}</span>
        </div>
    </div>

    <p>Telah dilakukan pemeriksaan kesehatan gigi dan mulut pada tanggal
        <strong>{{ \Carbon\Carbon::parse($surat->pada_tanggal)->translatedFormat('d F Y') }}</strong> dengan hasil dan
        tindakan sebagai berikut:
    </p>

    <div class="section-title">1. Hasil Pemeriksaan</div>
    <p style="margin-left: 20px; margin-top: 0;">Keadaan gigi dan jaringan sekitar gigi telah dilakukan
        pemeriksaan klinis</p>
    <div style="margin-left: 20px; border: 1px solid #ccc; padding: 10px; min-height: 40px; margin-bottom: 10px;">
        <strong>Keluhan/Temuan :</strong><br>
        {{ $surat->hasil_pemeriksaan }}
    </div>

    <div class="section-title">2. Perawatan yang Telah Dilakukan</div>
    <ul class="checkbox-list">
        @php $tindakan_saved = explode(', ', $surat->tindakan_gigi ?? ''); @endphp
        <li class="checkbox-item">
            {{ in_array('Pembersihan karang gigi (scaling)', $tindakan_saved) ? '☑' : '☐' }} Pembersihan karang gigi
            (scaling)
        </li>
        <li class="checkbox-item">{{ in_array('Penambalan gigi', $tindakan_saved) ? '☑' : '☐' }} Penambalan gigi</li>
        <li class="checkbox-item">{{ in_array('Pencabutan gigi', $tindakan_saved) ? '☑' : '☐' }} Pencabutan gigi</li>
        <li class="checkbox-item">{{ in_array('Pemberian medikasi', $tindakan_saved) ? '☑' : '☐' }} Pemberian medikasi
        </li>
        <li class="checkbox-item">{{ in_array('Konsultasi dan edukasi kesehatan gigi', $tindakan_saved) ? '☑' : '☐' }}
            Konsultasi dan edukasi kesehatan gigi</li>
    </ul>

    <div class="section-title">3. Rencana / Pemeriksaan Lanjutan</div>
    <p style="margin-left: 20px; margin-top: 5px;">Pasien disarankan untuk menjalani pemeriksaan dan/atau
        perawatan lanjutan, berupa:</p>
    <div style="margin-left: 20px; margin-bottom: 10px;">
        Kontrol ulang pada tanggal
        {{ $surat->kontrol_ulang ? \Carbon\Carbon::parse($surat->kontrol_ulang)->translatedFormat('d F Y') : '' }}<br>
        Perawatan lanjutan:<br>
        <strong>{{ $surat->saran }}</strong>
    </div>

    <p>Demikian surat keterangan ini dibuat dengan sebenar-benarnya untuk dapat dipergunakan sebagaimana mestinya
        @if ($surat->keperluan)
            untuk <strong>{{ $surat->keperluan }}</strong>.
        @else
            .
        @endif
    </p>
</div>