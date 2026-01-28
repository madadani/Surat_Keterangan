<!-- SECTION: KESEHATAN JIWA -->
<tr>
    <td class="pt-6">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">Pemeriksaan Kesehatan Jiwa</h3>
    </td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Tanggal Periksa</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td><input type="date" name="pada_tanggal_jiwa" value="{{ $surat->pada_tanggal }}"
            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-sm font-bold"></td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Hasil Pemeriksaan</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td><textarea name="hasil_jiwa" rows="3"
            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-sm font-bold resize-none">{{ $surat->hasil_pemeriksaan }}</textarea>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Saran</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td><textarea name="saran_jiwa" rows="3"
            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-sm font-bold resize-none">{{ $surat->saran }}</textarea>
    </td>
</tr>