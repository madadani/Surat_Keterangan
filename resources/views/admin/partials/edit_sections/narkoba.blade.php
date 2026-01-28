<!-- SECTION: BEBAS NARKOBA -->
<tr>
    <td class="pt-6">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">Panel Tes Narkoba (6 Parameter)</h3>
    </td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Tanggal Periksa</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td><input type="date" name="pada_tanggal_narkoba" value="{{ $surat->pada_tanggal }}"
            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-sm font-bold"></td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Hasil Parameter</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-6 p-6 bg-gray-50 rounded-2xl border border-gray-100">
            @foreach(['morphine', 'canabinoid', 'amphetamine', 'benzodiazepine', 'metamfetamin', 'cocaine'] as $drug)
                <div class="flex flex-col gap-2">
                    <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest">{{ $drug }}</span>
                    <div class="flex gap-4">
                        <label class="flex items-center gap-2 cursor-pointer text-[10px] font-black"><input type="radio"
                                name="{{ $drug }}" value="Positif" {{ $surat->$drug == 'Positif' ? 'checked' : '' }}
                                class="w-3.5 h-3.5 text-red-500"> Positif</label>
                        <label class="flex items-center gap-2 cursor-pointer text-[10px] font-black"><input type="radio"
                                name="{{ $drug }}" value="Negatif" {{ $surat->$drug == 'Negatif' ? 'checked' : '' }}
                                class="w-3.5 h-3.5 text-green-500"> Negatif</label>
                    </div>
                </div>
            @endforeach
        </div>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Kesimpulan</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td><textarea name="kesimpulan_narkoba" rows="2"
            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-bold resize-none">{{ $surat->kesimpulan }}</textarea>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Saran</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td><textarea name="saran_narkoba" rows="2"
            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-bold resize-none">{{ $surat->saran }}</textarea>
    </td>
</tr>