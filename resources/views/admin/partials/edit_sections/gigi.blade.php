<!-- SECTION: POLI GIGI -->
<tr>
    <td class="pt-6">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">Pemeriksaan Gigi & Mulut</h3>
    </td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Identitas Medis</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <div class="flex items-center gap-4">
            <div class="flex-1 space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">No. RM</label>
                <input type="text" name="no_rm_gigi" value="{{ $surat->pendaftar->no_rm }}"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
            <div class="flex-1 space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Keperluan</label>
                <input type="text" name="keperluan_gigi" value="{{ $surat->keperluan }}"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
        </div>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Pemeriksaan Odontogram</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <div class="overflow-x-auto bg-gray-50/50 p-4 rounded-2xl border border-gray-100 shadow-inner">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="text-[8px] font-black text-gray-400 uppercase tracking-tighter">
                        <th class="p-1 text-left w-16">RAHANG</th>
                        <th class="p-1 text-center w-20">STATUS</th>
                        @foreach(['M3', 'M2', 'M1', 'P2', 'P1', 'C', 'I2', 'I1'] as $tooth)
                            <th class="p-1 text-center border-x border-gray-200">{{ $tooth }}</th>
                        @endforeach
                        @foreach(['I1', 'I2', 'C', 'P1', 'P2', 'M1', 'M2', 'M3'] as $tooth)
                            <th class="p-1 text-center border-x border-gray-200">{{ $tooth }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="text-[9px]">
                    @foreach(['atas', 'bawah'] as $rahang)
                        <tr class="border-t border-gray-200">
                            <td class="p-1 font-black text-brand-darkblue uppercase">{{ $rahang }}</td>
                            <td class="p-1">
                                <input type="text" name="odontogram_{{ $rahang }}_status" 
                                    value="{{ $surat->mcu_data['odontogram_'.$rahang.'_status'] ?? '' }}"
                                    placeholder="Status..." 
                                    class="w-full bg-white border border-gray-300 rounded-md px-1 py-1 text-[9px] font-bold text-center">
                            </td>
                            @for($i = 1; $i <= 16; $i++)
                                <td class="p-1 border-x border-gray-100">
                                    <input type="text" name="odontogram_{{ $rahang }}_g{{ $i }}" 
                                        value="{{ $surat->mcu_data['odontogram_'.$rahang.'_g'.$i] ?? '' }}"
                                        class="w-full min-w-[30px] bg-white border border-gray-200 rounded-md px-1 py-1 text-[9px] font-bold text-center focus:border-brand-blue outline-none transition-all">
                                </td>
                            @endfor
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p class="mt-2 text-[8px] font-bold text-gray-400 italic uppercase">
                * Input: M3 s/d I1 (Rahang Kanan) dan I1 s/d M3 (Rahang Kiri). Kosongkan jika normal.
            </p>
        </div>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">1. Hasil Pemeriksaan</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <div class="space-y-4">
            <textarea name="hasil_gigi" rows="2"
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none"
                placeholder="Hasil Pemeriksaan Gigi & Mulut...">{{ $surat->hasil_pemeriksaan }}</textarea>
        </div>
    </td>
</tr>

<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">2. Perawatan yang Dilakukan</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        @php
            $tindakanSelected = explode(', ', $surat->tindakan_gigi ?? '');
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 p-6 bg-gray-50/50 rounded-2xl border border-gray-100">
            @foreach([
                    'Pembersihan karang gigi (scaling)',
                    'Penambalan gigi',
                    'Pencabutan gigi',
                    'Pemberian medikasi',
                    'Konsultasi dan edukasi kesehatan gigi'
                ] as $tindakan)
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" name="tindakan_gigi_list[]" value="{{ $tindakan }}" {{ in_array($tindakan, $tindakanSelected) ? 'checked' : '' }} class="w-4 h-4 rounded border-gray-300 text-brand-blue focus:ring-brand-blue">
                        <span class="text-[10px] font-bold text-gray-600 uppercase tracking-tight group-hover:text-brand-blue transition-colors">{{ $tindakan }}</span>
                    </label>
            @endforeach
        </div>
    </td>
</tr>
<tr>
         
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">3. Rencana Lanjutan</td>

    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <div class="space-y-4">
            <div class="space-y-1.5">
        
           
                                   <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Kontrol Ulang Pada Tanggal</label>
                <input type="date" name="kontrol_ulang_gigi" value="{{ $surat->kontrol_ulang }}" class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Perawatan Lanjutan</label>
                <textarea name="saran_gigi" rows="2" class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none" placeholder="Rencana perawatan selanjutnya...">{{ $surat->saran }}</textarea>
            </div>
        </div>
    </td>
</tr>