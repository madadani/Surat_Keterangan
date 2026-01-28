{{-- Content: Surat Keterangan Bebas Narkoba --}}
<style>
    .list-hasil { margin-left: 20px; margin-bottom: 5px; }
    .hasil-item { display: flex; margin-bottom: 0px; }
    .hasil-label { width: 140px; }
</style>

<div style="text-align: center; margin-bottom: 10px;">
    <div style="display: inline-block; border-bottom: 1.5px solid #000; padding-bottom: 0px; line-height: 1; font-weight: bold; font-size: 14pt; text-transform: uppercase;">
        SURAT KETERANGAN BEBAS NARKOBA</div>
    <div style="margin-top: 5px; font-size: 12pt; text-decoration: underline;">
        No. {{ $surat->nomor_surat }}
    </div>
</div>

<div class="content">
    <p style="text-align: justify;">Yang bertandatangan dibawah ini dokter Spesialis Kedokteran Jiwa di RSUD dr. Soeratno Gemolong Sragen, menerangkan bahwa :</p>

    <div class="field-container">
        <div class="field">
            <span class="label">Nama</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->pendaftar->nama_lengkap }}</span>
        </div>
        <div class="field">
            <span class="label">Tempat/Tanggal Lahir</span>
            <span class="dots">:</span>
            <span class="value">{{ $surat->pendaftar->tempat_lahir }} / {{ \Carbon\Carbon::parse($surat->pendaftar->tanggal_lahir)->translatedFormat('d F Y') }}</span>
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
        <div class="field">
            <span class="label">Pemeriksaan</span>
            <span class="dots">:</span>
            <span class="value">NAPZA</span>
        </div>
        <div class="field">
            <span class="label">Pada Tanggal</span>
            <span class="dots">:</span>
            <span class="value">{{ \Carbon\Carbon::parse($surat->pada_tanggal)->translatedFormat('d F Y') }}</span>
        </div>
    </div>

    <div style="font-weight: bold; margin-bottom: 5px;">A. Hasil Pemeriksaan :</div>
    <div class="list-hasil">
        @foreach([
            'morphine' => 'Morphine',
            'canabinoid' => 'Canabinoid',
            'amphetamine' => 'Amphetamine',
            'benzodiazepine' => 'Benzodiazepine',
            'metamfetamin' => 'Metamfetamin',
            'cocaine' => 'Cocaine'
        ] as $key => $label)
            <div class="hasil-item">
                <span style="width: 15px;">-</span>
                <span class="hasil-label">{{ $label }}</span>
                <span style="width: 15px;">:</span>
                <span style="font-weight: bold;">{{ ucfirst($surat->$key) }}</span>
            </div>
        @endforeach
    </div>

    <div style="font-weight: bold; margin-bottom: 5px;">B. Kesimpulan :</div>
    <p style="text-align: justify; margin-left: 20px; margin-top: 0;">
        Pada saat ini dari hasil pemeriksaan lab urine <strong>{{ strtoupper($surat->kesimpulan ?? 'NEGATIF') }}</strong> dan tidak ditemukan adanya tanda-tanda perubahan perilaku sehubungan dengan penggunaan narkoba.
    </p>

    <div style="font-weight: bold; margin-bottom: 5px;">C. Saran :</div>
    <p style="text-align: justify; margin-left: 20px; margin-top: 0;">
        <strong>Dapat / <span style="text-decoration: line-through;">Tidak dapat</span></strong> dipergunakan sebagai <strong>{{ strtoupper($surat->keperluan) }}</strong><br>
        Dan tidak dapat dipergunakan untuk kepentingan lainnya
    </p>
</div>
