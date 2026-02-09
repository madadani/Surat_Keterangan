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
            <div class="flex items-center gap-10">
                <div class="flex items-center gap-4">
                    <label class="flex items-center gap-2 cursor-pointer font-black text-xs text-gray-700"><input
                            type="radio" name="hasil_mata" value="Normal" checked class="w-4 h-4 text-brand-blue">
                        NORMAL</label>
                    <label class="flex items-center gap-2 cursor-pointer font-black text-xs text-gray-700"><input
                            type="radio" name="hasil_mata" value="Tidak Normal" class="w-4 h-4 text-brand-blue"> TIDAK
                        NORMAL</label>
                </div>
                <select name="buta_warna_mata"
                    class="flex-1 bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
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
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Kesimpulan THT</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td>
            <textarea name="hasil_tht" rows="2"
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none"
                placeholder="Kesimpulan pemeriksaan... (contoh: SEHAT / TIDAK SEHAT)"></textarea>
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
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">1. Hasil Pemeriksaan</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td>
            <textarea name="hasil_gigi" rows="3"
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none"
                placeholder="Keluhan / Temuan Klinis..."></textarea>
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
         
                      <td class="text-xs font-black text-gray-400 uppercase tr
       a                cking-widest">3. Rencana Lanjutan</td>
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
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Penunjang (EKG/TM)</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <textarea name="jantung_ekg" rows="3"
                class="bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none">Sinus ritme, HR: 60-100 bpm, Normal</textarea>
            <textarea name="jantung_treadmill" rows="3"
                class="bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none">Negatif Iskemik / Normal</textarea>
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Kesimpulan</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td><textarea name="hasil_jantung" rows="2"
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none" placeholder="Hasil kesimpulan pemeriksaan jantung...">SEHAT JANTUNG</textarea>
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Detail Parameter EKG</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td>
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 p-6 bg-gray-50/50 rounded-2xl border border-gray-100">
                <div class="space-y-1.5">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter ml-1">Irama</label>
                    <input type="text" name="jantung_irama" value="-" class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
                </div>
                <div class="space-y-1.5">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter ml-1">Heart Rate (HR)</label>
                    <input type="text" name="jantung_hr" value="-" class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
                </div>
                <div class="space-y-1.5">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter ml-1">Gelombang P</label>
                    <input type="text" name="jantung_p_wave" value="-" class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
                </div>
                <div class="space-y-1.5">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter ml-1">Interval PR</label>
                    <input type="text" name="jantung_pr_interval" value="-" class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
                </div>
                <div class="space-y-1.5">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter ml-1">Kompleks QRS</label>
                    <input type="text" name="jantung_qrs_complex" value="-" class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
                </div>
                <div class="space-y-1.5">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter ml-1">Gelombang T</label>
                    <input type="text" name="jantung_t_wave" value="-" class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
                </div>
            </div>
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
        <td class="flex gap-4"><input type="number" name="tinggi_badan_poli" id="tinggi_poli_input" placeholder="TB (cm)"
                class="flex-1 bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black"><input
                type="number" step="0.1" name="berat_badan_poli" id="berat_poli_input" placeholder="BB (kg)"
                class="flex-1 bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black"></td>
    </tr>
    <tr>
        <td id="label_hasil_poli" class="text-xs font-black text-gray-400 uppercase tracking-widest">Hasil Pemeriksaan
        </td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td><textarea name="hasil_poli" rows="4"
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none"></textarea>
        </td>
    </tr>
    <tr>
        <td id="label_saran_poli" class="text-xs font-black text-gray-400 uppercase tracking-widest">Saran / Terapi</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td><textarea name="saran_poli" rows="3"
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none"></textarea>
        </td>
    </tr>
</tbody>

<!-- Section: TKHI -->
<tbody id="section_tkhi" class="hidden animate__animated animate__fadeIn">
    @php
        // Dummy object for create form to prevent errors in tkhi_form
        $surat = $surat ?? new \App\Models\SuratKeterangan();
        $surat->mcu_data = $surat->mcu_data ?? []; 
    @endphp
    @include('admin.partials.edit_sections.tkhi', ['surat' => $surat])
</tbody>

