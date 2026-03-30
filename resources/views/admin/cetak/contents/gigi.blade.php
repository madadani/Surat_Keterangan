{{-- Content: Surat Keterangan Pemeriksaan Gigi --}}
<style>
    /* Specific overrides for dental certificates to fit one page */
    .content {
        font-size: 11pt !important;
        line-height: 1.25 !important;
    }
    .field-container {
        margin-bottom: 12px !important;
    }
    .field {
        margin-bottom: 2px !important;
    }
    .section-title {
        margin-top: 10px !important;
        margin-bottom: 4px !important;
        font-size: 11.5pt !important;
    }
    .checkbox-list {
        margin-bottom: 8px !important;
    }
    p {
        margin-top: 6px !important;
        margin-bottom: 6px !important;
    }
</style>
<div style="text-align: center; margin-bottom: 15px;">
    <div
        style="display: inline-block; border-bottom: 1.5px solid #000; padding-bottom: 0px; line-height: 1; font-weight: bold; font-size: 14pt; text-transform: uppercase;">
        SURAT KETERANGAN PEMERIKSAAN GIGI</div>
    <div style="margin-top: 3px; font-size: 11pt; text-decoration: underline;">
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

    <div class="section-title">A. PEMERIKSAAN MULUT DAN GIGI (ODONTOGRAM) </div>

    <div style="margin-left: 20px; margin-bottom: 12px;">
        <table
            style="width: 100%; border-collapse: collapse; font-size: 7.5pt; text-align: center; font-family: 'Courier New', Courier, monospace;">
            <thead>
                <tr style="background: #f9f9f9;">
                    <th style="border: 1px solid #000; padding: 2px; width: 60px;">RAHANG</th>
                    <th style="border: 1px solid #000; padding: 2px; width: 70px;">STATUS</th>
                    @foreach(['M3', 'M2', 'M1', 'P2', 'P1', 'C', 'I2', 'I1', 'I1', 'I2', 'C', 'P1', 'P2', 'M1', 'M2', 'M3'] as $tooth)
                        <th style="border: 1px solid #000; padding: 2px;">{{ $tooth }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach(['atas' => 'ATAS', 'bawah' => 'BAWAH'] as $key => $label)
                    <tr>
                        <td style="border: 1px solid #000; padding: 3px; font-weight: bold; background: #fdfdfd;">
                            {{ $label }}
                        </td>
                        <td style="border: 1px solid #000; padding: 2px;">
                            {{ $surat->mcu_data['odontogram_' . $key . '_status'] ?? '-' }}
                        </td>
                        @for($i = 1; $i <= 16; $i++)
                            <td style="border: 1px solid #000; padding: 2px; color: #333; font-weight: bold;">
                                {{ $surat->mcu_data['odontogram_' . $key . '_g' . $i] ?? '' }}
                            </td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="margin-left: 20px; margin-bottom: 15px; display: flex; align-items: baseline; gap: 8px;">
        <div style="font-weight: bold; font-size: 11pt; border-bottom: 1.5px solid #000; white-space: nowrap;">
            Hasil Pemeriksaan :</div>
        <div style="font-size: 11pt; line-height: 1.2;">
            {{ $surat->hasil_pemeriksaan }}
        </div>
    </div>


    <div class="section-title">2. Perawatan yang Telah Dilakukan</div>
    <ul class="checkbox-list" style="margin-bottom: 10px;">
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
    <p style="margin-left: 20px; margin-top: 3px; margin-bottom: 3px;">Pasien disarankan untuk perawatan lanjutan, berupa:</p>
    <div style="margin-left: 20px; margin-bottom: 8px;">
        Kontrol ulang:
        <strong>{{ $surat->kontrol_ulang ? \Carbon\Carbon::parse($surat->kontrol_ulang)->translatedFormat('d F Y') : '-' }}</strong><br>
        Rencana:
        <strong>{{ $surat->saran }}</strong>
    </div>

    <p style="margin-bottom: 0px;">Demikian surat keterangan ini dibuat dengan sebenar-benarnya untuk dapat dipergunakan
        @if ($surat->keperluan)
            untuk <strong>{{ $surat->keperluan }}</strong>.
        @else
            sebagaimana mestinya.
        @endif
    </p>
</div>