{{-- Content: Surat Keterangan Kesehatan Mata --}}
<style>
    .hasil-mata {
        margin-left: 0px;
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .hasil-item {
        margin-bottom: 5px;
    }
</style>

<div style="text-align: center; margin-bottom: 20px;">
    <div
        style="display: inline-block; border-bottom: 1.5px solid #000; padding-bottom: 0px; line-height: 1; font-weight: bold; font-size: 14pt; text-transform: uppercase;">
        SURAT KETERANGAN KESEHATAN MATA</div>
    <div style="margin-top: 5px; font-size: 12pt; text-decoration: underline;">
        No. {{ $surat->nomor_surat }}
    </div>
</div>

<div class="content">
    <p>Yang bertanda tangan di bawah ini,<br>
        Dokter Pemeriksa RSUD dr. Soeratno Gemolong, dengan ini menerangkan bahwa :</p>

    <div class="field-container">
        <div class="field">
            <span class="label">Nama</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->pendaftar->nama_lengkap }}</span>
        </div>
        <div class="field">
            <span class="label">Umur</span>
            <span class="dots">:</span>
            <span class="value">{{ \Carbon\Carbon::parse($surat->pendaftar->tanggal_lahir)->age }} Tahun</span>
        </div>
        <div class="field">
            <span class="label">Jenis Kelamin</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->pendaftar->jenis_kelamin }}</span>
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
    </div>

    <p>Berdasarkan pemeriksaan kesehatan mata terdapat :</p>
    <div class="hasil-mata">
        <div class="hasil-item">
            1. Mata <strong>Normal / Tidak Normal</strong>
        </div>
        <div class="hasil-item">
            2. <strong>Buta Warna / Tidak Buta Warna</strong>
        </div>
        <div class="hasil-item" style="display: block;">
            3. Visus Mata Kanan : <strong>{{ $surat->visus_kanan ?? '.....................' }}</strong><br>
            &nbsp;&nbsp;&nbsp; Visus Mata Kiri &nbsp;&nbsp; :
            <strong>{{ $surat->visus_kiri ?? '.....................' }}</strong>
        </div>
        <div class="hasil-item">
            4. Segmen Anterior Mata kanan dan kiri :
            <strong>{{ $surat->segmen_anterior ?? '.....................' }}</strong>
        </div>
    </div>

    <div class="field" style="margin-top: 20px;">
        <span class="label" style="width: auto; margin-right: 10px;">Keperluan :</span>
        <span class="value" style="font-weight: bold; text-transform: uppercase;">{{ $surat->keperluan }}</span>
    </div>

    <p style="margin-top: 20px;">Demikian surat keterangan ini dapat dipergunakan sebagaimana mestinya.</p>
</div>