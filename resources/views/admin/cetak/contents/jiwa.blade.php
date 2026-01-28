{{-- Content: Surat Keterangan Kesehatan Jiwa --}}
<div style="text-align: center; margin-bottom: 20px;">
    <div
        style="display: inline-block; border-bottom: 1.5px solid #000; padding-bottom: 0px; line-height: 1; font-weight: bold; font-size: 14pt; text-transform: uppercase;">
        SURAT KETERANGAN KESEHATAN JIWA</div>
    <div style="margin-top: 5px; font-size: 12pt; text-decoration: underline;">
        No. {{ $surat->nomor_surat }}
    </div>
</div>

<div class="content">
    <p>Yang bertanda tangan di bawah ini, Dokter Pemerintah pada RSUD dr. Soeratno Gemolong, menerangkan bahwa:</p>

    <div class="field-container">
        <div class="field">
            <span class="label">Nama Lengkap</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->pendaftar->nama_lengkap }}</span>
        </div>
        <div class="field">
            <span class="label">Tempat/Tgl Lahir</span>
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
            <span class="label">Pendidikan</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->pendidikan ?? '-' }}</span>
        </div>
        <div class="field">
            <span class="label">Jenis Kelamin</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->pendaftar->jenis_kelamin }}</span>
        </div>
        <div class="field">
            <span class="label">Alamat</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->pendaftar->alamat }}</span>
        </div>
    </div>

    <div class="field-container">
        <div class="field">
            <span class="label">Pada Tanggal</span>
            <span class="dots">:</span>
            <span class="value">{{ \Carbon\Carbon::parse($surat->pada_tanggal)->translatedFormat('d F Y') }}</span>
        </div>
    </div>

    <div class="field" style="margin-top: 10px;">
        <span class="label" style="min-width: 180px; vertical-align: top;">Hasil Pemeriksaan</span>
        <span class="dots" style="vertical-align: top; width: 15px;">:</span>
        <span class="value" style="display: block; text-align: justify;">
            {!! nl2br(e($surat->hasil_pemeriksaan)) !!}
        </span>
    </div>

    <div class="field" style="margin-top: 10px;">
        <span class="label">Saran</span>
        <span class="dots">:</span>
        <span class="value" style="font-weight: bold;">{{ $surat->saran }}</span>
    </div>

    <div class="field" style="margin-top: 10px;">
        <span class="label">Keperluan</span>
        <span class="dots">:</span>
        <span class="value">{{ $surat->keperluan }}</span>
    </div>

    <p style="margin-top: 30px; text-align: justify;">
        Surat keterangan ini berlaku 1 (satu) bulan sejak diterbitkan dan tidak dapat digunakan untuk kepentingan hukum
        lain.
    </p>
</div>