<!-- Section: POLI ORTHOPEDI -->
<tbody id="section_orthopedi" class="hidden animate__animated animate__fadeIn">
    <tr class="border-t border-gray-100">
        <td colspan="3" class="pt-10 pb-4">
            <div class="flex items-center gap-4">
                <h3 class="text-sm font-black text-brand-blue uppercase tracking-widest">Pemeriksaan Poli Orthopedi</h3>
                <div class="flex-1 h-px bg-brand-blue/10"></div>
            </div>
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Antropometri</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td class="flex items-center gap-4">
            <div class="flex-1 space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">TB (cm)</label>
                <input type="number" name="tinggi_badan_orthopedi" id="tinggi_orthopedi_input"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black text-brand-darkblue focus:border-brand-blue">
            </div>
            <div class="flex-1 space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">BB (kg)</label>
                <input type="number" step="0.1" name="berat_badan_orthopedi" id="berat_orthopedi_input"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black text-brand-darkblue focus:border-brand-blue">
            </div>
            <div class="flex-1 space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">BMI (IMT)</label>
                <input type="text" name="bmi_orthopedi" id="bmi_orthopedi_input" placeholder="Auto"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black text-brand-darkblue focus:border-brand-blue">
            </div>
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Vital Signs</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Tensi (mmhg)</label>
                <input type="text" name="tensi_orthopedi"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black text-brand-darkblue">
            </div>
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Nadi (x/mnt)</label>
                <input type="number" name="nadi_orthopedi"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black text-brand-darkblue">
            </div>
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Suhu (celcius)</label>
                <input type="number" step="0.1" name="suhu_orthopedi"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black text-brand-darkblue">
            </div>
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Resp (x/mnt)</label>
                <input type="number" name="respirasi_orthopedi"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black text-brand-darkblue">
            </div>
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Pemeriksaan Fisik</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td class="space-y-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Gangguan
                        Motorik</label>
                    <div class="flex items-center gap-4 mt-2">
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="radio" name="gangguan_motorik_orthopedi" value="Ada"
                                class="w-4 h-4 text-brand-blue focus:ring-brand-blue border-gray-300">
                            <span class="text-xs font-bold text-gray-700 group-hover:text-brand-blue">ADA</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="radio" name="gangguan_motorik_orthopedi" value="Tidak" checked
                                class="w-4 h-4 text-brand-blue focus:ring-brand-blue border-gray-300">
                            <span class="text-xs font-bold text-gray-700 group-hover:text-brand-blue">TIDAK</span>
                        </label>
                    </div>
                </div>
                <div class="space-y-1.5">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Disabilitas</label>
                    <div class="flex items-center gap-4 mt-2">
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="radio" name="disabilitas_orthopedi" value="Ada"
                                class="w-4 h-4 text-brand-blue focus:ring-brand-blue border-gray-300">
                            <span class="text-xs font-bold text-gray-700 group-hover:text-brand-blue">ADA</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="radio" name="disabilitas_orthopedi" value="Tidak" checked
                                class="w-4 h-4 text-brand-blue focus:ring-brand-blue border-gray-300">
                            <span class="text-xs font-bold text-gray-700 group-hover:text-brand-blue">TIDAK</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Keterangan Lainnya</label>
                <input type="text" name="keterangan_lainnya_orthopedi" placeholder="Catatan tambahan (opsional)..."
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black text-brand-darkblue focus:border-brand-blue">
            </div>
        </td>
    </tr>
    <tr>
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Kesimpulan & Buta Warna</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td>
            <div
                class="w-full bg-blue-50 border border-blue-100 rounded-xl px-4 py-3 text-xs font-bold text-blue-600 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Kesimpulan Klinis dan Buta Warna diisi manual pada lembar cetak.
            </div>
        </td>
    </tr>
</tbody>