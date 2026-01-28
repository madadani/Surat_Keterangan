{{-- Content: Surat Keterangan THT --}}
<style>
    .diagram-container {
        position: relative;
        width: 100%;
        height: 200px;
        margin: 20px 0;
        border: 1px solid #eee;
        background: #fff;
    }

    .diagram-image {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .diagram-value {
        position: absolute;
        font-weight: bold;
        font-size: 10pt;
        background: rgba(255, 255, 255, 0.7);
        padding: 2px 5px;
        border-radius: 3px;
    }

    .val-telinga-kiri {
        top: 40%;
        left: 15%;
    }

    .val-telinga-kanan {
        top: 40%;
        right: 15%;
    }

    .val-hidung {
        top: 30%;
        left: 50%;
        transform: translateX(-50%);
    }

    .val-tenggorokan {
        bottom: 20%;
        left: 50%;
        transform: translateX(-50%);
    }
</style>

<div style="text-align: center; margin-bottom: 20px;">
    <div
        style="display: inline-block; border-bottom: 1.5px solid #000; padding-bottom: 0px; line-height: 1; font-weight: bold; font-size: 14pt; text-transform: uppercase;">
        SURAT KETERANGAN DOKTER</div>
    <div style="margin-top: 5px; font-size: 12pt; text-decoration: underline;">
        No. {{ $surat->nomor_surat }}
    </div>
</div>

<div class="content">
    <p style="text-align: justify; margin-bottom: 10px;">
        Yang Bertandatangan dibawah ini, dokter Spesialis THTKL bertugas di RSUD dr. Soeratno, Gemolong, Kabupaten
        Sragen menerangkan dengan sesungguhnya bahwa :
    </p>

    <div class="field-container">
        <div class="field">
            <span class="label">Nama</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->pendaftar->nama_lengkap }}</span>
        </div>
        <div class="field">
            <span class="label">Jenis Kelamin</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->pendaftar->jenis_kelamin }}</span>
        </div>
        <div class="field">
            <span class="label">Umur</span>
            <span class="dots">:</span>
            <span class="value">{{ \Carbon\Carbon::parse($surat->pendaftar->tanggal_lahir)->age }} Tahun</span>
        </div>
        <div class="field">
            <span class="label">Alamat</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->pendaftar->alamat }}</span>
        </div>
        <div class="field">
            <span class="label">Tinggi/Berat Badan</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->tinggi_badan }} cm / {{ $surat->berat_badan }} kg</span>
        </div>
        <div class="field">
            <span class="label">Tekanan Darah</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->tensi ?? '-' }} mmhg</span>
        </div>
        <div class="field">
            <span class="label">Golongan Darah</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->golongan_darah ?? '-' }}</span>
        </div>
    </div>

    <p>Test pendengaran kuantitatif (bisik) : <strong>{{ $surat->tes_bisik ?? '' }}</strong></p>

    <div class="diagram-container">
        <img src="{{ asset('img/diagram_tht.png') }}" class="diagram-image">
        <div class="diagram-value val-telinga-kiri">{{ $surat->telinga_kiri ?? '' }}</div>
        <div class="diagram-value val-telinga-kanan">{{ $surat->telinga_kanan ?? '' }}</div>
        <div class="diagram-value val-hidung">{{ $surat->hidung ?? '' }}</div>
        <div class="diagram-value val-tenggorokan">{{ $surat->tenggorokan ?? '' }}</div>
    </div>

    <p style="margin-top: 15px;">
        Pada tanggal <strong>{{ \Carbon\Carbon::parse($surat->pada_tanggal)->translatedFormat('d F Y') }}</strong>
        pemeriksaan THTKL saat ini dalam keadaan :
        <strong>{{ strtoupper($surat->hasil_pemeriksaan) }}</strong>
    </p>

    <p style="margin-top: 5px;">
        Surat keterangan ini dipergunakan sebagai : <strong>{{ $surat->keperluan }}</strong>
    </p>

    <p style="margin-top: 5px;">Demikian surat keterangan ini agar dapat digunakan sebagaimana mestinya</p>
</div>