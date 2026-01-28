<!-- SECTION: POLI JANTUNG -->
<tr>
    <td class="pt-6">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">Pemeriksaan Kardiovaskular</h3>
    </td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Penunjang (EKG/TM)</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <textarea name="jantung_ekg" rows="3"
            class="bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none">{{ $surat->mcu_data['jantung_ekg'] ?? 'Sinus ritme, HR: 60-100 bpm, Normal' }}</textarea>
        <textarea name="jantung_treadmill" rows="3"
            class="bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none">{{ $surat->mcu_data['jantung_treadmill'] ?? 'Negatif Iskemik / Normal' }}</textarea>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Kesimpulan</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td><textarea name="hasil_jantung" rows="2"
            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none">{{ $surat->hasil_pemeriksaan }}</textarea>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Detail Parameter EKG</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 p-6 bg-gray-50/50 rounded-2xl border border-gray-100">
            @php
                $heartData = $surat->mcu_data ?? [];
            @endphp
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter ml-1">Irama</label>
                <input type="text" name="jantung_irama" value="{{ $heartData['jantung_irama'] ?? '-' }}"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter ml-1">Heart Rate
                    (HR)</label>
                <input type="text" name="jantung_hr" value="{{ $heartData['jantung_hr'] ?? '-' }}"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter ml-1">Gelombang P</label>
                <input type="text" name="jantung_p_wave" value="{{ $heartData['jantung_p_wave'] ?? '-' }}"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter ml-1">Interval PR</label>
                <input type="text" name="jantung_pr_interval" value="{{ $heartData['jantung_pr_interval'] ?? '-' }}"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter ml-1">Kompleks QRS</label>
                <input type="text" name="jantung_qrs_complex" value="{{ $heartData['jantung_qrs_complex'] ?? '-' }}"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter ml-1">Gelombang T</label>
                <input type="text" name="jantung_t_wave" value="{{ $heartData['jantung_t_wave'] ?? '-' }}"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
        </div>
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