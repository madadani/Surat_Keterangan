<!-- SECTION: KESEHATAN UMUM -->
<tr>
    <td class="pt-6">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">Data Pemeriksaan Fisik</h3>
    </td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Tinggi / Berat Badan</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="flex items-center gap-4">
        <input type="number" name="tinggi_badan" value="{{ $surat->tinggi_badan }}" placeholder="Tinggi"
            class="flex-1 bg-white border border-gray-400 rounded-xl px-4 py-3 text-sm font-bold focus:border-brand-blue outline-none">
        <span class="font-bold text-gray-300">/</span>
        <input type="number" step="0.1" name="berat_badan" value="{{ $surat->berat_badan }}" placeholder="Berat"
            class="flex-1 bg-white border border-gray-400 rounded-xl px-4 py-3 text-sm font-bold focus:border-brand-blue outline-none">
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Vitals (BP/HR/T/RR)</td>
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
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Kondisi & Buta Warna</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="flex flex-wrap gap-8">
        <div class="flex items-center gap-6">
            <label class="flex items-center gap-2 cursor-pointer font-bold text-xs"><input type="radio"
                    name="hasil_kondisi" value="Sehat" {{ $surat->hasil_pemeriksaan != 'Tidak Sehat' ? 'checked' : '' }}
                    class="w-4 h-4 text-brand-blue"> SEHAT</label>
            <label class="flex items-center gap-2 cursor-pointer font-bold text-xs"><input type="radio"
                    name="hasil_kondisi" value="Tidak Sehat" {{ $surat->hasil_pemeriksaan == 'Tidak Sehat' ? 'checked' : '' }} class="w-4 h-4 text-brand-blue"> TIDAK SEHAT</label>
        </div>
        <div class="flex-1"><select name="buta_warna"
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-2.5 text-xs font-bold">
                <option value="Tidak" {{ $surat->buta_warna == 'Tidak' ? 'selected' : '' }}>TIDAK BUTA WARNA</option>
                <option value="Ya" {{ $surat->buta_warna == 'Ya' ? 'selected' : '' }}>BUTA WARNA</option>
            </select></div>
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