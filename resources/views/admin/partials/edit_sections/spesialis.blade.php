<!-- SECTION: POLI SPESIALIS -->
<tr>
    <td class="pt-6">
        <h3 id="title_poli" class="text-brand-blue font-black uppercase tracking-widest text-sm">HASIL PEMERIKSAAN
            {{ strtoupper($surat->tipe_berkas) }}
        </h3>
    </td>
    <td></td>
    <td></td>
</tr>
@if(!str_contains($surat->tipe_berkas, 'Paru'))
    <tr id="row_fisik_poli">
        <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Antropometri</td>
        <td class="text-center font-bold text-gray-300">:</td>
        <td class="flex gap-4"><input type="number" name="tinggi_badan_poli" value="{{ $surat->tinggi_badan }}"
                class="flex-1 bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black"><input type="number"
                step="0.1" name="berat_badan_poli" value="{{ $surat->berat_badan }}"
                class="flex-1 bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black"></td>
    </tr>
@endif
<tr>
    <td id="label_hasil_poli" class="text-xs font-black text-gray-400 uppercase tracking-widest">
        {{ str_contains($surat->tipe_berkas, 'Paru') ? 'Diagnosa' : 'Hasil Pemeriksaan' }}
    </td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td><textarea name="hasil_poli" rows="4"
            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none">{{ $surat->hasil_pemeriksaan }}</textarea>
    </td>
</tr>
<tr>
    <td id="label_saran_poli" class="text-xs font-black text-gray-400 uppercase tracking-widest">
        {{ str_contains($surat->tipe_berkas, 'Orthopedi') || str_contains($surat->tipe_berkas, 'Paru') ? 'Keterangan' : 'Saran / Terapi' }}
    </td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td><textarea name="saran_poli" rows="3"
            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none">{{ $surat->saran }}</textarea>
    </td>
</tr>