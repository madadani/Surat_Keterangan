@php
    // Helper to get value securely
    $getVal = function ($key, $default = '') use ($surat) {
        return $surat->mcu_data[$key] ?? $default;
    };
@endphp

<!-- HEADER & VITALS -->
<tr>
    <td class="pt-6" colspan="3">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">I. ADMINISTRASI & TANDA VITAL</h3>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Admin</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <input type="text" name="no_lab" value="{{ $surat->no_lab ?? '' }}" placeholder="No. Lab"
            class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <input type="text" name="mcu_nik" value="{{ $getVal('nik') }}" placeholder="NIK Pasien"
            class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <input type="text" name="perusahaan" value="{{ $surat->perusahaan ?? '' }}" placeholder="Nama Perusahaan"
            class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Antropometri</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-2 lg:grid-cols-6 gap-3">
        <div class="space-y-1"><label class="text-[9px] font-black text-gray-400 uppercase">Tinggi (cm)</label><input
                type="number" name="mcu_tinggi" id="mcu_tinggi" value="{{ $surat->tinggi_badan }}"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold"></div>
        <div class="space-y-1"><label class="text-[9px] font-black text-gray-400 uppercase">Berat (kg)</label><input
                type="number" step="0.1" name="mcu_berat" id="mcu_berat" value="{{ $surat->berat_badan }}"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold"></div>
        <div class="space-y-1"><label class="text-[9px] font-black text-gray-400 uppercase">BMI</label><input
                type="text" id="mcu_bmi" name="mcu_bmi" value="{{ $getVal('bmi') }}"
                class="w-full bg-gray-50 border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        </div>
        <div class="space-y-1"><label class="text-[9px] font-black text-gray-400 uppercase">Lk. Perut</label><input
                type="number" name="mcu_lk_perut" value="{{ $getVal('lk_perut') }}"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold"></div>
        <div class="space-y-1"><label class="text-[9px] font-black text-gray-400 uppercase">Lk. Dada</label><input
                type="number" name="mcu_lk_dada" value="{{ $getVal('lk_dada') }}"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold"></div>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Vital Signs</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-2 lg:grid-cols-5 gap-3">
        @php $tensi = explode('/', $surat->tensi ?? '/'); @endphp
        <div class="space-y-1"><label class="text-[9px] font-black text-gray-400 uppercase">Sistol</label><input
                type="number" name="mcu_sistol" value="{{ $tensi[0] ?? '' }}"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold"></div>
        <div class="space-y-1"><label class="text-[9px] font-black text-gray-400 uppercase">Diastol</label><input
                type="number" name="mcu_diastol" value="{{ $tensi[1] ?? '' }}"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold"></div>
        <div class="space-y-1"><label class="text-[9px] font-black text-gray-400 uppercase">Nadi (x/m)</label><input
                type="number" name="mcu_nadi" value="{{ $surat->nadi }}"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold"></div>
        <div class="space-y-1"><label class="text-[9px] font-black text-gray-400 uppercase">Pernapasan</label><input
                type="number" name="mcu_respirasi" value="{{ $surat->respirasi }}"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold"></div>
        <div class="space-y-1"><label class="text-[9px] font-black text-gray-400 uppercase">Suhu (°C)</label><input
                type="number" step="0.1" name="mcu_suhu" value="{{ $surat->suhu }}"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold"></div>
    </td>
</tr>

<!-- PEMERIKSAAN VISUS -->
<tr>
    <td class="pt-6" colspan="3">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">II. PEMERIKSAAN FUNGSI PENGLIHATAN (VISUS)
        </h3>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Visus Mata</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-2 lg:grid-cols-5 gap-3">
        <input type="text" name="mcu_od_tanpa" value="{{ $getVal('od_tanpa') }}" placeholder="OD Tanpa Kacamata"
            class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <input type="text" name="mcu_od_kaca" value="{{ $getVal('od_kaca') }}" placeholder="OD Kacamata"
            class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <input type="text" name="mcu_os_tanpa" value="{{ $getVal('os_tanpa') }}" placeholder="OS Tanpa Kacamata"
            class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <input type="text" name="mcu_os_kaca" value="{{ $getVal('os_kaca') }}" placeholder="OS Kacamata"
            class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <select name="mcu_buta_warna" class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
            <option value="Tidak Buta Warna" {{ $surat->buta_warna == 'Tidak Buta Warna' ? 'selected' : '' }}>Normal
            </option>
            <option value="Buta Warna Total" {{ $surat->buta_warna == 'Buta Warna Total' ? 'selected' : '' }}>Buta Warna
                Total</option>
            <option value="Buta Warna Parsial" {{ $surat->buta_warna == 'Buta Warna Parsial' ? 'selected' : '' }}>Buta
                Warna Parsial</option>
        </select>
    </td>
</tr>

<!-- PEMERIKSAAN ORGAN SUPERFISIAL -->
<tr>
    <td class="pt-6" colspan="3">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">III. PEMERIKSAAN ORGAN SUPERFISIAL</h3>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest align-top pt-2">Organ Sup.</td>
    <td class="text-center font-bold text-gray-300 align-top pt-2">:</td>
    <td>
        @php
            $superfisial = [
                'super_mata' => 'Mata',
                'super_telinga' => 'Telinga',
                'super_hidung' => 'Hidung',
                'super_mulut' => 'Mulut',
                'super_faring' => 'Faring/Laring',
                'super_konsil' => 'Konsil',
                'super_tyroid' => 'Tyroid',
                'super_lymp' => 'Lymp Node',
                'super_dada' => 'Dada',
                'super_perut' => 'Perut',
                'super_hernia' => 'Hernia',
                'super_anus' => 'Anus',
                'super_payudara' => 'Payudara',
                'super_varises' => 'Varises/Hemorid',
            ];
        @endphp
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-16 gap-y-4">
            @foreach($superfisial as $key => $label)
                <div class="flex items-center gap-3">
                    <span class="w-40 text-[10px] font-bold text-gray-600 uppercase whitespace-nowrap">{{ $label }}</span>
                    <select name="mcu_{{ $key }}"
                        class="w-24 bg-white border border-gray-400 rounded-lg px-2 py-2 text-xs font-bold focus:border-brand-blue outline-none transition-colors">
                        <option value="DBN" {{ $getVal($key) == 'DBN' ? 'selected' : '' }}>DBN</option>
                        <option value="Kelainan" {{ $getVal($key) == 'Kelainan' ? 'selected' : '' }}>Kelainan</option>
                    </select>
                    <input type="text" name="mcu_ket_{{ $key }}" value="{{ $getVal('ket_' . $key) }}" placeholder="Ket..."
                        class="w-28 bg-white border border-gray-400 rounded-lg px-2 py-2 text-xs focus:border-brand-blue outline-none transition-colors">
                </div>
            @endforeach
        </div>
    </td>
</tr>

<!-- PEMERIKSAAN ORGAN VISCERAL -->
<tr>
    <td class="pt-6" colspan="3">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">IV. PEMERIKSAAN ORGAN VISCERAL</h3>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest align-top pt-2">Organ Visceral</td>
    <td class="text-center font-bold text-gray-300 align-top pt-2">:</td>
    <td class="space-y-3">
        <div class="flex items-center gap-3 border-b border-gray-50 pb-2">
            <span class="w-56 text-[10px] font-bold uppercase text-gray-600">Paru dan Sistem Pernafasan</span>
            <input type="text" name="mcu_visc_paru"
                value="{{ $getVal('visc_paru', 'Vesikuler (+/+), Rhonki (-/-), Wheezing (-/-)') }}"
                class="flex-1 bg-white border border-gray-400 rounded px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none">
        </div>
        <div class="flex items-center gap-3 border-b border-gray-50 pb-2">
            <span class="w-56 text-[10px] font-bold uppercase text-gray-600">Jantung dan Sistem Cardiovascular</span>
            <input type="text" name="mcu_visc_jantung"
                value="{{ $getVal('visc_jantung', 'Bunyi Jantung I/II Murni Reguler') }}"
                class="flex-1 bg-white border border-gray-400 rounded px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none">
        </div>
        <div class="flex items-center gap-3 border-b border-gray-50 pb-2">
            <span class="w-56 text-[10px] font-bold uppercase text-gray-600">Hati, Limpa, dan Sistem GIT</span>
            <input type="text" name="mcu_visc_hati" value="{{ $getVal('visc_hati', 'Tidak Teraba Pembesaran') }}"
                class="flex-1 bg-white border border-gray-400 rounded px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none">
        </div>
        <div class="flex items-center gap-3 border-b border-gray-50 pb-2">
            <span class="w-56 text-[10px] font-bold uppercase text-gray-600">Ginjal dan Sistem Urogenetal</span>
            <input type="text" name="mcu_visc_ginjal" value="{{ $getVal('visc_ginjal', 'Nyeri Ketok CVA (-/-)') }}"
                class="flex-1 bg-white border border-gray-400 rounded px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none">
        </div>
        <div class="flex items-center gap-3 border-b border-gray-50 pb-2">
            <span class="w-56 text-[10px] font-bold uppercase text-gray-600">Sistem Reproduksi</span>
            <input type="text" name="mcu_visc_reproduksi" value="{{ $getVal('visc_reproduksi', 'Normal') }}"
                class="flex-1 bg-white border border-gray-400 rounded px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none">
        </div>
    </td>
</tr>

<!-- PEMERIKSAAN EKSTREMITAS -->
<tr>
    <td class="pt-6" colspan="3">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">V. PEMERIKSAAN EXTREMITAS OTOT DAN TULANG</h3>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest align-top pt-2">Ekstremitas</td>
    <td class="text-center font-bold text-gray-300 align-top pt-2">:</td>
    <td>
        <textarea name="mcu_extremitas" rows="2" placeholder="Contoh: Akral Hangat, Edema (-/-), Motorik Normal"
            class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none">{{ $getVal('extremitas', 'Akral Hangat, Edema (-/-), Motorik Normal') }}</textarea>
    </td>
</tr>

<!-- PEMERIKSAAN GIGI -->
<tr>
    <td class="pt-6" colspan="3">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">VI. PEMERIKSAAN MULUT DAN GIGI</h3>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest align-top pt-2">Gigi Atas</td>
    <td class="text-center font-bold text-gray-300 align-top pt-2">:</td>
    <td>
        <div class="flex flex-wrap justify-center gap-1 mb-2 bg-gray-50 p-2 rounded-xl border border-gray-100">
            @php $gigi_list = ['M3', 'M2', 'M1', 'P2', 'P1', 'C', 'I2', 'I1', 'I1', 'I2', 'C', 'P1', 'P2', 'M1', 'M2', 'M3']; @endphp
            @foreach($gigi_list as $i => $pos)
                <div class="text-center flex-1 min-w-[30px] max-w-[50px]">
                    <span class="text-[8px] font-bold text-gray-400 block mb-1">{{ $pos }}</span>
                    <input type="text" name="mcu_gigi_atas_{{ $i + 1 }}" value="{{ $getVal('gigi_atas_' . ($i + 1)) }}"
                        class="w-full bg-white border border-gray-400 rounded px-1 py-1 text-[10px] text-center font-bold focus:border-brand-blue outline-none hover:border-brand-blue transition-colors"
                        maxlength="3">
                </div>
                @if($i == 7)
                <div class="w-px bg-gray-300 mx-2 h-8 self-end"></div> @endif
            @endforeach
        </div>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest align-top pt-2">Gigi Bawah</td>
    <td class="text-center font-bold text-gray-300 align-top pt-2">:</td>
    <td>
        <div class="flex flex-wrap justify-center gap-1 bg-gray-50 p-2 rounded-xl border border-gray-100">
            @foreach($gigi_list as $i => $pos)
                <div class="text-center flex-1 min-w-[30px] max-w-[50px]">
                    <span class="text-[8px] font-bold text-gray-400 block mb-1">{{ $pos }}</span>
                    <input type="text" name="mcu_gigi_bawah_{{ $i + 1 }}" value="{{ $getVal('gigi_bawah_' . ($i + 1)) }}"
                        class="w-full bg-white border border-gray-400 rounded px-1 py-1 text-[10px] text-center font-bold focus:border-brand-blue outline-none hover:border-brand-blue transition-colors"
                        maxlength="3">
                </div>
                @if($i == 7)
                <div class="w-px bg-gray-300 mx-2 h-8 self-end"></div> @endif
            @endforeach
        </div>
    </td>
</tr>

<!-- PEMERIKSAAN SYARAF -->
<tr>
    <td class="pt-6" colspan="3">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">VII. PEMERIKSAAN SYARAF DAN SISTEM KOORDINASI
        </h3>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Syaraf</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-2 lg:grid-cols-3 gap-3">
        <div class="space-y-1">
            <label class="text-[9px] font-black text-gray-400 uppercase">Ref. Patologis</label>
            <input type="text" name="mcu_saraf_ref" value="{{ $getVal('saraf_ref', 'Normal') }}"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        </div>
        <div class="space-y-1">
            <label class="text-[9px] font-black text-gray-400 uppercase">Parastesia</label>
            <input type="text" name="mcu_saraf_para" value="{{ $getVal('saraf_para', '-') }}"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        </div>
        <div class="space-y-1">
            <label class="text-[9px] font-black text-gray-400 uppercase">Parese</label>
            <input type="text" name="mcu_saraf_parese" value="{{ $getVal('saraf_parese', 'Tidak Ada') }}"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        </div>
        <div class="space-y-1">
            <label class="text-[9px] font-black text-gray-400 uppercase">Lassague/Patrick</label>
            <input type="text" name="mcu_saraf_lass" value="{{ $getVal('saraf_lass', '-/-') }}"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        </div>
        <div class="space-y-1">
            <label class="text-[9px] font-black text-gray-400 uppercase">Contra Patrick Sign</label>
            <input type="text" name="mcu_saraf_contra" value="{{ $getVal('saraf_contra', '-/-') }}"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        </div>
    </td>
</tr>

<!-- RIWAYAT KESEHATAN PRIBADI -->
<tr>
    <td class="pt-6" colspan="3">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">VIII. RIWAYAT KESEHATAN PRIBADI</h3>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Riwayat Penyakit</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td
        class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 p-4 border border-gray-100 rounded-xl bg-gray-50/50">
        @php
            $histPribadi = [
                'hist_darah-tinggi' => 'Darah Tinggi',
                'hist_nyeri-dada-kiri' => 'Nyeri Dada Kiri',
                'hist_sering-berdebar-debar' => 'Sering Berdebar-debar',
                'hist_rematik' => 'Rematik',
                'hist_batuk-lamakronisberdarah' => 'Batuk lama/kronis/berdarah',
                'hist_tbcparu-paru' => 'TBC/Paru-paru',
                'hist_maag' => 'Maag',
                'hist_berak-darahambien' => 'Berak Darah/Ambien',
                'hist_ashma' => 'Ashma',
                'hist_gondok' => 'Gondok',
                'hist_sakit-ginjal' => 'Sakit Ginjal',
                'hist_kencing-darah' => 'Kencing Darah',
                'hist_kencing-manis' => 'Kencing Manis',
                'hist_sakit-liverhepatitissakit-kuning' => 'Sakit Liver/Hepatitis',
                'hist_benjolantumor-di-tubuh' => 'Benjolan/Tumor di tubuh',
                'hist_alergi-udaramakanano bat-obatan' => 'Alergi Udara/Makanan/Obat',
                'hist_mata-tdk-normalgangguan-pada-mata' => 'Mata tdk normal',
                'hist_kecelakaanbenturan-keras-pada-kepala' => 'Kecelakaan/Benturan kepala',
                'hist_keluar-nanah-dari-telinga' => 'Keluar nanah dari telinga',
                'hist_lain-lain' => 'Lain-lain',
            ];
        @endphp
        @foreach($histPribadi as $key => $label)
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="mcu_{{ $key }}" value="Ya" {{ $getVal($key) == 'Ya' ? 'checked' : '' }}
                    class="rounded border-gray-300 text-brand-blue">
                <span class="text-[10px] font-bold uppercase">{{ $label }}</span>
            </label>
        @endforeach
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Kejang/Pingsan</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-1 md:grid-cols-2 gap-3">
        <div class="flex items-center gap-3">
            <select name="mcu_hist_kejang" class="bg-white border border-gray-400 rounded px-2 py-1 text-xs font-bold">
                <option value="Tidak" {{ $getVal('hist_kejang') != 'Ya' ? 'selected' : '' }}>Tidak</option>
                <option value="Ya" {{ $getVal('hist_kejang') == 'Ya' ? 'selected' : '' }}>Ya</option>
            </select>
            <input type="text" name="mcu_hist_kejang_ket" value="{{ $getVal('hist_kejang_ket') }}"
                placeholder="Penyebab Pingsan..."
                class="flex-1 bg-white border border-gray-400 rounded px-2 py-1 text-xs">
        </div>
        <div class="flex items-center gap-3">
            <span class="text-[10px] font-bold">Pernah dirawat RS:</span>
            <select name="mcu_hist_rawat" class="bg-white border border-gray-400 rounded px-2 py-1 text-xs font-bold">
                <option value="Tidak" {{ $getVal('hist_rawat') != 'Ya' ? 'selected' : '' }}>Tidak</option>
                <option value="Ya" {{ $getVal('hist_rawat') == 'Ya' ? 'selected' : '' }}>Ya</option>
            </select>
            <input type="text" name="mcu_hist_rawat_ket" value="{{ $getVal('hist_rawat_ket') }}"
                placeholder="Sakit apa, tahun..."
                class="flex-1 bg-white border border-gray-400 rounded px-2 py-1 text-xs">
        </div>
    </td>
</tr>

<!-- KEBIASAAN SEHARI-HARI -->
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest align-top pt-2">Kebiasaan</td>
    <td class="text-center font-bold text-gray-300 align-top pt-2">:</td>
    <td
        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 p-4 border border-gray-100 rounded-xl bg-gray-50/50">
        @foreach(['alkohol' => 'Minum Alkohol', 'rokok' => 'Merokok', 'narkoba' => 'Mengkonsumsi Narkoba', 'obat' => 'Minum Obat Tertentu'] as $hab => $label)
            <div class="flex flex-col gap-1.5">
                <span class="text-[9px] font-black text-gray-400 uppercase tracking-tight">{{ $label }}</span>
                <select name="mcu_habit_{{ $hab }}"
                    class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none transition-all shadow-sm">
                    <option value="TIDAK" {{ $getVal('habit_' . $hab) != 'YA' ? 'selected' : '' }}>TIDAK</option>
                    <option value="YA" {{ $getVal('habit_' . $hab) == 'YA' ? 'selected' : '' }}>YA</option>
                </select>
            </div>
        @endforeach
    </td>
</tr>

<!-- RIWAYAT KESEHATAN ORANG TUA -->
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Riwayat Orang Tua</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="flex items-center gap-3">
        <span class="text-[10px] font-bold">Riwayat Penyakit Kronis (Jantung, Ginjal, dll):</span>
        <select name="mcu_hist_ortu" class="bg-white border border-gray-400 rounded px-2 py-1 text-xs font-bold">
            <option value="TIDAK" {{ $getVal('hist_ortu') != 'YA' ? 'selected' : '' }}>TIDAK</option>
            <option value="YA" {{ $getVal('hist_ortu') == 'YA' ? 'selected' : '' }}>YA</option>
        </select>
    </td>
</tr>

<!-- LABORATORIUM -->
<tr>
    <td class="pt-6" colspan="3">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">IX. LABORATORIUM</h3>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Darah Lengkap</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-2 md:grid-cols-4 gap-3">
        <input type="number" step="any" name="mcu_lab_hb" value="{{ $getVal('lab_hb') }}" placeholder="Hemoglobin"
            class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <input type="number" name="mcu_lab_lekosit" value="{{ $getVal('lab_lekosit') }}" placeholder="Lekosit"
            class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <input type="number" name="mcu_lab_trombosit" value="{{ $getVal('lab_trombosit') }}" placeholder="Trombosit"
            class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <input type="number" step="any" name="mcu_lab_eritrosit" value="{{ $getVal('lab_eritrosit') }}"
            placeholder="Eritrosit" class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Kimia Darah</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-2 md:grid-cols-4 gap-3">
        <input type="number" step="any" name="mcu_lab_gdp" value="{{ $getVal('lab_gdp') }}"
            placeholder="Gula Darah Puasa"
            class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <input type="number" step="any" name="mcu_lab_gd2pp" value="{{ $getVal('lab_gd2pp') }}" placeholder="GD2PP"
            class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <input type="number" step="any" name="mcu_lab_kolesterol" value="{{ $getVal('lab_kolesterol') }}"
            placeholder="Kolesterol Total"
            class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <input type="number" step="any" name="mcu_lab_ureum" value="{{ $getVal('lab_ureum') }}" placeholder="Ureum"
            class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <input type="number" step="any" name="mcu_lab_creatinin" value="{{ $getVal('lab_creatinin') }}"
            placeholder="Creatinin" class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <input type="number" step="any" name="mcu_lab_sgot" value="{{ $getVal('lab_sgot') }}" placeholder="SGOT"
            class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <input type="number" step="any" name="mcu_lab_sgpt" value="{{ $getVal('lab_sgpt') }}" placeholder="SGPT"
            class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <input type="number" step="any" name="mcu_lab_uric_acid" value="{{ $getVal('lab_uric_acid') }}"
            placeholder="Asam Urat" class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Urine Lengkap</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-2 md:grid-cols-4 gap-3">
        <input type="number" step="any" name="mcu_lab_ur_protein" value="{{ $getVal('lab_ur_protein') }}"
            placeholder="Protein Urine" class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <input type="number" step="any" name="mcu_lab_ur_reduksi" value="{{ $getVal('lab_ur_reduksi') }}"
            placeholder="Reduksi Urine" class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <input type="number" step="any" name="mcu_lab_ur_leukosit" value="{{ $getVal('lab_ur_leukosit') }}"
            placeholder="Sedimen Leukosit"
            class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <input type="number" step="any" name="mcu_lab_ur_eritrosit" value="{{ $getVal('lab_ur_eritrosit') }}"
            placeholder="Sedimen Eritrosit"
            class="bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
    </td>
</tr>

<!-- KESIMPULAN -->
<tr>
    <td class="pt-6" colspan="3">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">X. KESIMPULAN & RESUME</h3>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Resume</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="space-y-2">
        <input type="text" name="mcu_resume_lab" value="{{ $getVal('resume_lab') }}" placeholder="Resume Laboratorium"
            class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <input type="text" name="mcu_resume_fisik" value="{{ $getVal('resume_fisik') }}"
            placeholder="Resume Fisik (Normal/Kelainan...)"
            class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <input type="text" name="mcu_resume_radiologi" value="{{ $getVal('resume_radiologi') }}"
            placeholder="Resume Radiologi"
            class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <input type="text" name="mcu_resume_tambahan" value="{{ $getVal('resume_tambahan') }}"
            placeholder="Pemeriksaan Tambahan"
            class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Kesimpulan Fisik</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <input type="text" name="mcu_kesimpulan_fisik" value="{{ $getVal('kesimpulan_fisik', 'DBN') }}"
            placeholder="Pemeriksaan Fisik: DBN/Kelainan..."
            class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Kesimpulan Akhir</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <textarea name="mcu_hasil_pemeriksaan" rows="2"
            class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold"
            placeholder="Contoh: FIT / UNFIT / FIT WITH NOTE...">{{ $surat->hasil_pemeriksaan }}</textarea>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Saran / Rekomendasi</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="space-y-2">
        <textarea name="mcu_saran" rows="2"
            class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold"
            placeholder="Saran...">{{ $surat->saran }}</textarea>
        <input type="text" name="mcu_rekomendasi" value="{{ $getVal('rekomendasi') }}"
            placeholder="Rekomendasi Akhir..."
            class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
    </td>
</tr>