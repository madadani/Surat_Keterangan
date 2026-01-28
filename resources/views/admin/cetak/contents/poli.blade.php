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
        @if($surat->tinggi_badan || $surat->berat_badan)
            <div class="field">
                <span class="label">Tinggi/Berat Badan</span>
                <span class="dots">:</span>
                <span class="value">{{ $surat->tinggi_badan ?? '-' }} cm / {{ $surat->berat_badan ?? '-' }} kg</span>
            </div>
        @endif
    </div>

    <p style="text-align: justify; margin-top: 20px;">
        Telah diperiksa dengan teliti dan berpendapat bahwa yang diperiksa, ternyata
        <strong>{{ strtoupper($surat->hasil_pemeriksaan) }}</strong>@if($surat->buta_warna),
            <strong>{{ $surat->buta_warna == 'Ya' ? 'BUTA WARNA' : 'TIDAK BUTA WARNA' }}</strong>
        @endif
    </p>

    @if($surat->keperluan)
        <div class="field" style="margin-top: 20px;">
            <span class="label" style="width: auto; margin-right: 10px;">Keperluan Untuk :</span>
            <span class="value" style="font-weight: bold; text-transform: uppercase;">{{ $surat->keperluan }}</span>
        </div>
    @endif

    <p style="margin-top: 20px;">Demikian Surat keterangan ini dibuat untuk dapat dipergunakan seperlunya.</p>
</div>