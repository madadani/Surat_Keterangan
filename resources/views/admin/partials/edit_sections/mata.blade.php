<!-- SECTION: POLI MATA -->
<tr>
    <td class="pt-6">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">Pemeriksaan Kesehatan Mata</h3>
    </td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Visus</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="flex gap-4"><input type="text" name="visus_kanan" value="{{ $surat->visus_kanan }}" placeholder="OD"
            class="flex-1 bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black"><input type="text"
            name="visus_kiri" value="{{ $surat->visus_kiri }}" placeholder="OS"
            class="flex-1 bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black"></td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Temuan</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="space-y-4"><input type="text" name="segmen_anterior" value="{{ $surat->segmen_anterior }}"
            placeholder="Segmen Anterior..."
            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
        <div class="flex items-center gap-10">
            <div class="flex items-center gap-4"><label
                    class="flex items-center gap-2 cursor-pointer font-black text-xs"><input type="radio"
                        name="hasil_mata" value="Normal" {{ $surat->hasil_pemeriksaan == 'Normal' ? 'checked' : '' }}
                        class="w-4 h-4 text-brand-blue"> NORMAL</label><label
                    class="flex items-center gap-2 cursor-pointer font-black text-xs"><input type="radio"
                        name="hasil_mata" value="Tidak Normal" {{ $surat->hasil_pemeriksaan == 'Tidak Normal' ? 'checked' : '' }} class="w-4 h-4 text-brand-blue"> TIDAK NORMAL</label></div><select
                name="buta_warna_mata"
                class="flex-1 bg-white border border-gray-400 rounded-xl px-4 py-2.5 text-xs font-black">
                <option value="Tidak" {{ $surat->buta_warna == 'Tidak' ? 'selected' : '' }}>TIDAK BUTA WARNA</option>
                <option value="Ya" {{ $surat->buta_warna == 'Ya' ? 'selected' : '' }}>BUTA WARNA</option>
            </select>
        </div>
    </td>
</tr>