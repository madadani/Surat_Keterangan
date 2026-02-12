<!-- SECTION: POLI THT -->
<tr>
    <td class="pt-6">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">Pemeriksaan Kesehatan THT</h3>
    </td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Telinga (AD/AS)</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="flex gap-4"><input type="text" name="telinga_kanan" value="{{ $surat->telinga_kanan }}"
            class="flex-1 bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black"><input type="text"
            name="telinga_kiri" value="{{ $surat->telinga_kiri }}"
            class="flex-1 bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black"></td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Tes Bisik</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td><input type="text" name="tes_bisik" value="{{ $surat->tes_bisik }}"
            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black"></td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Hidung/Tenggorokan</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="flex gap-4"><input type="text" name="hidung" value="{{ $surat->hidung }}"
            class="flex-1 bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black"><input type="text"
            name="tenggorokan" value="{{ $surat->tenggorokan }}"
            class="flex-1 bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black"></td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Hasil Pemeriksaan</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <textarea name="hasil_pemeriksaan_detail_tht" rows="3"
            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none"
            placeholder="Detail hasil pemeriksaan di bawah gambar...">{{ $surat->mcu_data['hasil_pemeriksaan_detail_tht'] ?? '' }}</textarea>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Kesimpulan</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <textarea name="hasil_tht" rows="2"
            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none"
            placeholder="Kesimpulan pemeriksaan...">{{ $surat->hasil_pemeriksaan }}</textarea>
    </td>
</tr>