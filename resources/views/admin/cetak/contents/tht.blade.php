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

    <div class="diagram-container" style="border: none; height: auto; text-align: center;">
        <img src="{{ asset('images/diagram_tht.png') }}" class="diagram-image" style="max-height: 180px;">
    </div>

    <table style="width: 100%; border-collapse: collapse; margin-top: 5px; font-size: 10pt;">
        <tr>
            <td style="width: 25%; font-weight: bold; border: 1px solid #ccc; padding: 5px; background: #f9f9f9;">
                Telinga Kanan</td>
            <td style="width: 25%; border: 1px solid #ccc; padding: 5px;">{{ $surat->telinga_kanan ?? '-' }}</td>
            <td style="width: 25%; font-weight: bold; border: 1px solid #ccc; padding: 5px; background: #f9f9f9;">Hidung
            </td>
            <td style="width: 25%; border: 1px solid #ccc; padding: 5px;">{{ $surat->hidung ?? '-' }}</td>
        </tr>
        <tr>
            <td style="font-weight: bold; border: 1px solid #ccc; padding: 5px; background: #f9f9f9;">Telinga Kiri</td>
            <td style="border: 1px solid #ccc; padding: 5px;">{{ $surat->telinga_kiri ?? '-' }}</td>
            <td style="font-weight: bold; border: 1px solid #ccc; padding: 5px; background: #f9f9f9;">Tenggorokan</td>
            <td style="border: 1px solid #ccc; padding: 5px;">{{ $surat->tenggorokan ?? '-' }}</td>
        </tr>
    </table>

    <div style="margin-top: 15px; font-size: 11pt;">
        <strong style="border-bottom: 1px solid #eee; padding-bottom: 2px;">Hasil Pemeriksaan Detail :</strong>
        <span style="font-size: 10.5pt; color: #333; margin-left: 5px;">
            {!! nl2br(e($surat->mcu_data['hasil_pemeriksaan_detail_tht'] ?? '-')) !!}
        </span>
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