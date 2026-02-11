<!-- SECTION: KESEHATAN UMUM -->
<tr>
    <td class="pt-6">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">Data Pemeriksaan Fisik</h3>
    </td>
    <td></td>
    <td></td>
</tr>
<tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Antropometri</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="flex items-center gap-4">
        <div class="flex-1 space-y-1.5">
            <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">TB</label>
            <input type="number" name="tinggi_badan" id="edit_tinggi_badan" value="{{ $surat->tinggi_badan }}"
                placeholder="Tinggi"
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-sm font-bold focus:border-brand-blue outline-none">
        </div>
        <div class="flex-1 space-y-1.5">
            <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">BB</label>
            <input type="number" step="0.1" name="berat_badan" id="edit_berat_badan" value="{{ $surat->berat_badan }}"
                placeholder="Berat"
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-sm font-bold focus:border-brand-blue outline-none">
        </div>
        <div class="flex-1 space-y-1.5">
            <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">BMI (IMT)</label>
            <input type="text" name="bmi" id="edit_bmi" value="{{ $surat->mcu_data['bmi'] ?? '' }}" placeholder="BMI"
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-sm font-bold focus:border-brand-blue outline-none">
        </div>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Vital Signs</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="space-y-1"><label class="text-[9px] font-black text-gray-400 uppercase">Tensi</label><input
                type="text" name="tensi" value="{{ $surat->tensi }}"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold"></div>
        <div class="space-y-1"><label class="text-[9px] font-black text-gray-400 uppercase">Nadi</label><input
                type="number" name="nadi" value="{{ $surat->nadi }}"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold"></div>
        <div class="space-y-1"><label class="text-[9px] font-black text-gray-400 uppercase">Suhu</label><input
                type="number" step="0.1" name="suhu" value="{{ $surat->suhu }}"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold"></div>
        <div class="space-y-1"><label class="text-[9px] font-black text-gray-400 uppercase">Resp</label><input
                type="number" name="respirasi" value="{{ $surat->respirasi }}"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold"></div>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Pemeriksaan Lain</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="space-y-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Gangguan Motorik</label>
                <div class="flex items-center gap-4 mt-2">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="radio" name="gangguan_motorik" value="Ada" {{ ($surat->mcu_data['gangguan_motorik'] ?? '') == 'Ada' ? 'checked' : '' }}
                            class="w-4 h-4 text-brand-blue focus:ring-brand-blue border-gray-300">
                        <span class="text-xs font-bold text-gray-700 group-hover:text-brand-blue">ADA</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="radio" name="gangguan_motorik" value="Tidak" {{ ($surat->mcu_data['gangguan_motorik'] ?? 'Tidak') == 'Tidak' ? 'checked' : '' }}
                            class="w-4 h-4 text-brand-blue focus:ring-brand-blue border-gray-300">
                        <span class="text-xs font-bold text-gray-700 group-hover:text-brand-blue">TIDAK</span>
                    </label>
                </div>
            </div>
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Disabilitas</label>
                <div class="flex items-center gap-4 mt-2">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="radio" name="disabilitas" value="Ada" {{ ($surat->mcu_data['disabilitas'] ?? '') == 'Ada' ? 'checked' : '' }}
                            class="w-4 h-4 text-brand-blue focus:ring-brand-blue border-gray-300">
                        <span class="text-xs font-bold text-gray-700 group-hover:text-brand-blue">ADA</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="radio" name="disabilitas" value="Tidak" {{ ($surat->mcu_data['disabilitas'] ?? 'Tidak') == 'Tidak' ? 'checked' : '' }}
                            class="w-4 h-4 text-brand-blue focus:ring-brand-blue border-gray-300">
                        <span class="text-xs font-bold text-gray-700 group-hover:text-brand-blue">TIDAK</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="space-y-1.5">
            <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Keterangan Lainnya</label>
            <input type="text" name="keterangan_lainnya" value="{{ $surat->mcu_data['keterangan_lainnya'] ?? '' }}"
                placeholder="Catatan tambahan (opsional)..."
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
            Kesimpulan Klinis (Sehat/Tidak) dan Status Buta Warna diisi manual oleh Dokter Pemeriksa pada lembar cetak
            (Coret yang tidak perlu).
        </div>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Judul Cetak</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <div class="flex flex-wrap gap-6">
            @foreach(['Sehat' => 'SURAT KET. SEHAT', 'Sehat Fisik' => 'KET. SEHAT FISIK', 'Sehat Jasmani' => 'KET. SEHAT JASMANI'] as $val => $lbl)
                <label class="flex items-center gap-2.5 cursor-pointer group">
                    <input type="radio" name="format_cetak" value="{{ $val }}" {{ $surat->hasil_pemeriksaan == $val ? 'checked' : '' }} class="w-4 h-4 text-brand-blue">
                    <span
                        class="text-[10px] font-black {{ $surat->hasil_pemeriksaan == $val ? 'text-brand-blue' : 'text-gray-500' }} uppercase tracking-widest group-hover:text-brand-blue transition-colors">{{ $lbl }}</span>
                </label>
            @endforeach
        </div>
    </td>
</tr>