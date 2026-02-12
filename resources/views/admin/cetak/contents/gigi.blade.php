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
    <p style="margin-left: 20px; margin-top: 0;">Keadaan gigi dan jaringan sekitar gigi telah dilakukan pemeriksaan
        klinis</p>

    <div style="margin-left: 20px; margin-bottom: 25px; display: flex; gap: 30px; align-items: start;">
        <div style="flex: 1;">
            <div
                style="font-weight: bold; font-size: 10pt; text-transform: uppercase; border-bottom: 2px solid #000; display: inline-block; margin-bottom: 10px;">
                A. DATA PEMERIKSAAN MULUT DAN GIGI (ODONTOGRAM) :</div>

            <table
                style="width: 100%; border-collapse: collapse; font-size: 8pt; text-align: center; font-family: 'Courier New', Courier, monospace;">
                <thead>
                    <tr style="background: #f9f9f9;">
                        <th style="border: 1px solid #000; padding: 4px; width: 60px;">RAHANG</th>
                        <th style="border: 1px solid #000; padding: 4px; width: 80px;">STATUS</th>
                        @foreach(['M3', 'M2', 'M1', 'P2', 'P1', 'C', 'I2', 'I1', 'I1', 'I2', 'C', 'P1', 'P2', 'M1', 'M2', 'M3'] as $tooth)
                            <th style="border: 1px solid #000; padding: 4px;">{{ $tooth }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach(['atas' => 'ATAS', 'bawah' => 'BAWAH'] as $key => $label)
                        <tr>
                            <td style="border: 1px solid #000; padding: 6px; font-weight: bold; background: #fdfdfd;">
                                {{ $label }}
                            </td>
                            <td style="border: 1px solid #000; padding: 4px;">
                                {{ $surat->mcu_data['odontogram_' . $key . '_status'] ?? '-' }}
                            </td>
                            @for($i = 1; $i <= 16; $i++)
                                <td style="border: 1px solid #000; padding: 4px; color: #333; font-weight: bold;">
                                    {{ $surat->mcu_data['odontogram_' . $key . '_g' . $i] ?? '' }}
                                </td>
                            @endfor
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="margin-top: 5px; font-size: 7.5pt; color: #666; font-style: italic;"> * Posisi data: Baris
                Rahang
                (Kanan ke Kiri untuk M3-I1, Kiri ke Kanan untuk I1-M3) </div>
        </div>

        <div style="width: 250px; min-width: 200px;">
            <div
                style="margin-bottom: 5px; font-weight: bold; font-size: 11pt; border-bottom: 2px solid #000; display: inline-block;">
                Hasil Pemeriksaan :</div>
            <div style="padding: 5px 0; font-size: 10pt; line-height: 1.5;">
                {{ $surat->hasil_pemeriksaan }}
            </div>
        </div>
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