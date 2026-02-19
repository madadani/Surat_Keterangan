<!-- Section: POLI MATA -->
<tbody id="section_mata" class="hidden animate__animated animate__fadeIn">
    <tr class="border-t border-gray-100">
        <td colspan="3" class="pt-10 pb-4">
            <h3 class="text-sm font-black text-brand-blue uppercase tracking-widest">Pemeriksaan Kesehatan Mata</h3>
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Pemeriksaan Visus</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <input type="text" name="visus_kanan" placeholder="Mata Kanan"
                class="bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            <input type="text" name="visus_kiri" placeholder="Mata Kiri"
                class="bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Temuan Medis</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td class="space-y-4">
            <input type="text" name="segmen_anterior" placeholder="Segmen Anterior..."
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            <div class="flex flex-col gap-4 bg-gray-50/50 p-4 rounded-xl border border-gray-100">
                <div class="flex items-center justify-between">
                    <span class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Status Mata (Digital)</span>
                    <span class="text-[8px] font-bold text-brand-blue uppercase italic">* PDF/Word akan menampilkan "Normal / Tidak Normal"</span>
                </div>
                <div class="flex items-center gap-10">
                    <div class="flex items-center gap-4">
                        <label class="flex items-center gap-2 cursor-pointer font-black text-xs text-gray-700"><input
                                type="radio" name="hasil_mata" value="Normal" checked class="w-4 h-4 text-brand-blue">
                            NORMAL</label>
                        <label class="flex items-center gap-2 cursor-pointer font-black text-xs text-gray-700"><input
                                type="radio" name="hasil_mata" value="Tidak Normal" class="w-4 h-4 text-brand-blue"> TIDAK
                            NORMAL</label>
                    </div>
                </div>
                <hr class="border-gray-200">
                <div class="flex items-center justify-between">
                    <span class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Status Buta Warna (Digital)</span>
                    <span class="text-[8px] font-bold text-brand-blue uppercase italic">* PDF/Word akan menampilkan "Buta Warna / Tidak Buta Warna"</span>
                </div>
                <select name="buta_warna_mata"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
                    <option value="Tidak">TIDAK BUTA WARNA</option>
                    <option value="Ya">BUTA WARNA</option>
                </select>
            </div>
        </td>
    </tr>
</tbody>

<!-- Section: POLI THT -->
<tbody id="section_tht" class="hidden animate__animated animate__fadeIn">
    <tr class="border-t border-gray-100">
        <td colspan="3" class="pt-10 pb-4">
            <h3 class="text-sm font-black text-brand-blue uppercase tracking-widest">Pemeriksaan Otolaringologi (THT-KL)
            </h3>
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Kondisi Telinga</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td class="grid grid-cols-2 gap-4">
            <input type="text" name="telinga_kanan" placeholder="AD (Kanan)"
                class="bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            <input type="text" name="telinga_kiri" placeholder="AS (Kiri)"
                class="bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Hidung & Tenggorokan</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td class="grid grid-cols-2 gap-4">
            <input type="text" name="hidung" placeholder="Kavum Nasi..."
                class="bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            <input type="text" name="tenggorokan" placeholder="Faring/Laring..."
                class="bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Tanda Vital & Fisik</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td class="space-y-3">
            <div class="flex gap-4">
                <input type="text" name="tekanan_darah_tht" placeholder="TD (mmHg)"
                    class="flex-1 bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
                <input type="text" name="golongan_darah_tht" placeholder="Gol. Darah"
                    class="flex-1 bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
            <div class="flex gap-4">
                <input type="number" name="tinggi_tht" id="tinggi_tht_input" placeholder="TB (cm)"
                    class="flex-1 bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
                <input type="number" step="0.1" name="berat_tht" id="berat_tht_input" placeholder="BB (kg)"
                    class="flex-1 bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Tes Bisik</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td>
            <input type="text" name="tes_bisik" placeholder="Hasil Tes Bisik..."
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Hasil Pemeriksaan</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td>
            <textarea name="hasil_pemeriksaan_detail_tht" rows="3"
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none"
                placeholder="Detail hasil pemeriksaan di bawah gambar (Contoh: Serumen minimal, Membran timpani intak, dll)..."></textarea>
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Kesimpulan THT</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td>
            <textarea name="hasil_tht" rows="2"
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none"
                placeholder="Kesimpulan pemeriksaan... (contoh: SEHAT / TIDAK SEHAT)">SEHAT THT</textarea>
        </td>
    </tr>
</tbody>


<!-- Section: POLI GIGI -->
<tbody id="section_gigi" class="hidden animate__animated animate__fadeIn">
    <tr class="border-t border-gray-100">
        <td colspan="3" class="pt-10 pb-4">
            <h3 class="text-sm font-black text-brand-blue uppercase tracking-widest">Pemeriksaan Odontologi (Gigi &
                Mulut)</h3>
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Identitas Medis</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td>
            <div class="flex items-center gap-4">
                <div class="flex-1 space-y-1.5">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">No. RM</label>
                    <input type="text" name="no_rm_gigi" id="no_rm_gigi_input"
                        class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
                </div>
                <div class="flex-1 space-y-1.5">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Keperluan</label>
                    <input type="text" name="keperluan_gigi" id="keperluan_gigi_input" placeholder="Contoh: Perawatan Rutin..."
                        class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Pemeriksaan Odontogram</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td>
            <div class="overflow-x-auto bg-gray-50/50 p-4 rounded-2xl border border-gray-100 shadow-inner">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="text-[8px] font-black text-gray-400 uppercase tracking-tighter">
                            <th class="p-1 text-left w-16">RAHANG</th>
                            <th class="p-1 text-center w-20">STATUS</th>
                            @foreach(['M3', 'M2', 'M1', 'P2', 'P1', 'C', 'I2', 'I1'] as $tooth)
                                <th class="p-1 text-center border-x border-gray-200">{{ $tooth }}</th>
                            @endforeach
                            @foreach(['I1', 'I2', 'C', 'P1', 'P2', 'M1', 'M2', 'M3'] as $tooth)
                                <th class="p-1 text-center border-x border-gray-200">{{ $tooth }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="text-[9px]">
                        @foreach(['atas', 'bawah'] as $rahang)
                            <tr class="border-t border-gray-200">
                                <td class="p-1 font-black text-brand-darkblue uppercase">{{ $rahang }}</td>
                                <td class="p-1">
                                    <input type="text" name="odontogram_{{ $rahang }}_status" placeholder="Status..." 
                                        class="w-full bg-white border border-gray-300 rounded-md px-1 py-1 text-[9px] font-bold text-center">
                                </td>
                                @for($i = 1; $i <= 16; $i++)
                                    <td class="p-1 border-x border-gray-100">
                                        <input type="text" name="odontogram_{{ $rahang }}_g{{ $i }}" 
                                            class="w-full min-w-[30px] bg-white border border-gray-200 rounded-md px-1 py-1 text-[9px] font-bold text-center focus:border-brand-blue outline-none transition-all">
                                    </td>
                                @endfor
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p class="mt-2 text-[8px] font-bold text-gray-400 italic uppercase">
                    * Input: M3 s/d I1 (Rahang Kanan) dan I1 s/d M3 (Rahang Kiri). Kosongkan jika normal.
                </p>
            </div>
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">1. Hasil Pemeriksaan</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td>
            <div class="space-y-4">
                <textarea name="hasil_gigi" rows="2"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none"
                    placeholder="Hasil Pemeriksaan Gigi & Mulut..."></textarea>
            </div>
        </td>
    </tr>

    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">2. Perawatan yang Dilakukan</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 p-6 bg-gray-50/50 rounded-2xl border border-gray-100">
                @foreach([
                        'Pembersihan karang gigi (scaling)',
                        'Penambalan gigi',
                        'Pencabutan gigi',
                        'Pemberian medikasi',
                        'Konsultasi dan edukasi kesehatan gigi'
                    ] as $tindakan)
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" name="tindakan_gigi_list[]" value="{{ $tindakan }}" class="w-4 h-4 rounded border-gray-300 text-brand-blue focus:ring-brand-blue">
                            <span class="text-[10px] font-bold text-gray-600 uppercase tracking-tight group-hover:text-brand-blue transition-colors">{{ $tindakan }}</span>
                        </label>
                @endforeach
            </div>
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">3. Rencana Lanjutan</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td>

            <div class="space-y-4">

                                       <div class="space-y-1.5">

                       
                                           <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Kontrol Ulang Pada Tanggal</label>
                    <input type="date" name="kontrol_ulang_gigi" id="kontrol_ulang_gigi_input" class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
                </div>
                <div class="space-y-1.5">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Perawatan Lanjutan</label>
                    <textarea name="saran_gigi" rows="2" class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none" placeholder="Rencana perawatan selanjutnya..."></textarea>
                </div>
            </div>
        </td>
    </tr>
</tbody>

<!-- Section: POLI JANTUNG -->
<tbody id="section_jantung" class="hidden animate__animated animate__fadeIn">
    <tr class="border-t border-gray-100">
        <td colspan="3" class="pt-10 pb-4">
            <h3 class="text-sm font-black text-brand-blue uppercase tracking-widest">Pemeriksaan Kardiovaskular</h3>
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest leading-relaxed">1. Kesimpulan EKG</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td>
            <textarea name="jantung_ekg" rows="2"
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none">Sinus ritme, HR: 60-100 bpm, Normal</textarea>
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest leading-relaxed">2. Kesimpulan Treadmill</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td>
            <textarea name="jantung_treadmill" rows="2"
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none">Negatif Iskemik / Normal</textarea>
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest leading-relaxed">3. Kesimpulan Echo</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td>
            <textarea name="jantung_echo" rows="2"
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none">-</textarea>
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Kesimpulan Akhir</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td><textarea name="hasil_jantung" rows="2"
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none" placeholder="Hasil kesimpulan pemeriksaan jantung...">SEHAT JANTUNG</textarea>
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Saran / Keterangan</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td><textarea name="saran_jantung" rows="2"
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none" placeholder="Saran atau keterangan tambahan..."></textarea>
        </td>
    </tr>
</tbody>


<!-- Section: POLI LAIN (Paru, Dalam, Ortho) -->
<tbody id="section_poli_spesialis" class="hidden animate__animated animate__fadeIn">
    <tr class="border-t border-gray-100">
        <td colspan="3" class="pt-10 pb-4">
            <h3 id="title_poli" class="text-sm font-black text-brand-blue uppercase tracking-widest">Pemeriksaan
                Spesialis</h3>
        </td>
    </tr>
    <tr id="row_fisik_poli">
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Antropometri</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">TB (cm)</label>
                <input type="number" name="tinggi_badan_poli" id="tinggi_poli_input" placeholder="TB"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">BB (kg)</label>
                <input type="number" step="0.1" name="berat_badan_poli" id="berat_poli_input" placeholder="BB"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
        </td>
    </tr>
    <tr>
        <td id="label_hasil_poli" class="text-xs font-black text-gray-400 uppercase tracking-widest">Hasil Pemeriksaan
        </td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td><textarea name="hasil_poli" id="hasil_poli_input" rows="4"
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none"
                placeholder="Hasil pemeriksaan medis..."></textarea></td>
    </tr>
    <tr>
        <td id="label_saran_poli" class="text-xs font-black text-gray-400 uppercase tracking-widest">Saran / Terapi</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td><textarea name="saran_poli" id="saran_poli_input" rows="3"
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none"
                placeholder="Saran atau terapi dokter..."></textarea></td>
    </tr>
</tbody>

@include('admin.partials.sections.dalam')
@include('admin.partials.sections.orthopedi')

<!-- Section: TKHI -->
<tbody id="section_tkhi" class="hidden animate__animated animate__fadeIn">
    @php
        // Dummy object for create form to prevent errors in tkhi_form
        $surat = $surat ?? new \App\Models\SuratKeterangan();
        $surat->mcu_data = $surat->mcu_data ?? []; 
    @endphp
    @include('admin.partials.edit_sections.tkhi', ['surat' => $surat])
</tbody>

<!-- Section: RESUME MCU -->
@include('admin.partials.resume_mcu', ['surat' => $surat ?? new \App\Models\SuratKeterangan()])

