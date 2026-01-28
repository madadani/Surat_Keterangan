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
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">1. Hasil Pemeriksaan</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <textarea name="hasil_gigi" rows="3"
            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none"
            placeholder="Keluhan / Temuan Klinis...">{{ $surat->hasil_pemeriksaan }}</textarea>
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
         
              <td class="text-xs font-black text-gray-400 uppercase tracking-widest">3. Rencana Lanjutan</
   t                d>
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