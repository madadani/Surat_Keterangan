<!-- SECTION: POLI JANTUNG -->
<tr>
    <td class="pt-6">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">Pemeriksaan Kardiovaskular</h3>
    </td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest leading-relaxed">1. Kesimpulan EKG</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <textarea name="jantung_ekg" rows="2"
            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none">{{ $surat->mcu_data['jantung_ekg'] ?? 'Sinus ritme, HR: 60-100 bpm, Normal' }}</textarea>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest leading-relaxed">2. Kesimpulan Treadmill</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <textarea name="jantung_treadmill" rows="2"
            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none">{{ $surat->mcu_data['jantung_treadmill'] ?? 'Negatif Iskemik / Normal' }}</textarea>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest leading-relaxed">3. Kesimpulan Echo</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <textarea name="jantung_echo" rows="2"
            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none">{{ $surat->mcu_data['jantung_echo'] ?? '-' }}</textarea>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Kesimpulan Akhir</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td><textarea name="hasil_jantung" rows="2"
            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none">{{ $surat->hasil_pemeriksaan }}</textarea>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Saran / Keterangan</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td><textarea name="saran_jantung" rows="2"
            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none"
            placeholder="Saran atau keterangan tambahan...">{{ $surat->saran }}</textarea>
    </td>
</tr>