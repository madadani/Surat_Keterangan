@php
    $resmcu = $surat->mcu_data ?? [];
@endphp

<tr class="border-t border-gray-100">
    <td colspan="3" class="pt-10 pb-4">
        <h3 class="text-sm font-black text-brand-blue uppercase tracking-widest">Resume Pemeriksaan Fisik (MCU)</h3>
    </td>
</tr>

<!-- I. DATA PASIEN TAMBAHAN -->
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Informasi Tambahan</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <div class="grid grid-cols-2 gap-4">
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">No. Lab</label>
                <input type="text" name="resmcu_no_lab" value="{{ $resmcu['no_lab'] ?? '' }}"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Perusahaan</label>
                <input type="text" name="resmcu_perusahaan" id="resmcu_perusahaan_input"
                    value="{{ $resmcu['perusahaan'] ?? '' }}"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
        </div>
    </td>
</tr>

<!-- II. RIWAYAT KESEHATAN PRIBADI -->
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Riwayat Kesehatan Pribadi</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <div
            class="p-6 bg-gray-50/50 rounded-2xl border border-gray-100 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-3">
            @php
                $riwayat_list = [
                    'darah_tinggi' => 'Darah Tinggi',
                    'nyeri_dada' => 'Nyeri Dada Kiri',
                    'jantung' => 'Sering Berdebar-debar',
                    'rematik' => 'Rematik',
                    'batuk_darah' => 'Batuk Lama/Kronis/Berdarah',
                    'tbc' => 'TBC / Paru-paru',
                    'maag' => 'Maag',
                    'ambeien' => 'Berak Darah / Ambeien',
                    'asthma' => 'Asthma',
                    'gondok' => 'Gondok',
                    'ginjal' => 'Sakit Ginjal',
                    'kencing_darah' => 'Kencing Darah',
                    'diabetes' => 'Kencing Manis',
                    'liver' => 'Sakit Liver/Hepatitis/Sakit Kuning',
                    'tumor' => 'Benjolan/Tumor di tubuh',
                    'alergi' => 'Alergi Udara/Makanan/Obat',
                    'mata' => 'Mata tdk normal/gangguan mata',
                    'kepala' => 'Kecelakaan/Benturan keras kepala',
                    'telinga' => 'Keluar nanah dari telinga',
                ];
            @endphp
            @foreach($riwayat_list as $key => $label)
                <div class="flex items-center justify-between py-1 border-b border-gray-100 last:border-0">
                    <span class="text-[10px] font-bold text-gray-600 uppercase">{{ $label }}</span>
                    <div class="flex gap-4">
                        <label class="flex items-center gap-1.5 cursor-pointer">
                            <input type="radio" name="resmcu_rp_{{ $key }}" value="Tidak" {{ ($resmcu['rp_' . $key] ?? 'Tidak') == 'Tidak' ? 'checked' : '' }} class="w-3 h-3 text-brand-blue">
                            <span class="text-[9px] font-black">TIDAK</span>
                        </label>
                        <label class="flex items-center gap-1.5 cursor-pointer">
                            <input type="radio" name="resmcu_rp_{{ $key }}" value="Ya" {{ ($resmcu['rp_' . $key] ?? '') == 'Ya' ? 'checked' : '' }} class="w-3 h-3 text-brand-blue">
                            <span class="text-[9px] font-black text-red-500">YA</span>
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4 grid grid-cols-1 gap-4">
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Pernah Kejang/Pingsan?
                    (Sebutkan Sebabnya jika Ya)</label>
                <input type="text" name="resmcu_kejang_pingsan" value="{{ $resmcu['kejang_pingsan'] ?? '' }}"
                    placeholder="Contoh: Tidak / Ya, karena kelelahan"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Pernah Dirawat di RS?
                    (Sakit Apa & Tahun Berapa)</label>
                <input type="text" name="resmcu_dirawat_rs" value="{{ $resmcu['dirawat_rs'] ?? '' }}"
                    placeholder="Contoh: Pernah, Tipus (2020)"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
        </div>
    </td>
</tr>

<!-- KEBIASAAN SEHARI-HARI -->
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Kebiasaan Sehari-hari</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <div class="p-6 bg-gray-50/50 rounded-2xl border border-gray-100 space-y-3">
            @php
                $kebiasaan = [
                    'alkohol' => 'Minum Alkohol',
                    'merokok' => 'Merokok',
                    'narkoba' => 'Konsumsi Narkoba',
                    'obat' => 'Minum Obat Tertentu',
                ];
            @endphp
            @foreach($kebiasaan as $key => $label)
                <div class="flex items-center justify-between py-1 border-b border-gray-100 last:border-0">
                    <span class="text-[10px] font-bold text-gray-600 uppercase">{{ $label }}</span>
                    <div class="flex gap-4">
                        <label class="flex items-center gap-1.5 cursor-pointer">
                            <input type="radio" name="resmcu_keb_{{ $key }}" value="Tidak" {{ ($resmcu['keb_' . $key] ?? 'Tidak') == 'Tidak' ? 'checked' : '' }} class="w-3 h-3 text-brand-blue">
                            <span class="text-[9px] font-black">TIDAK</span>
                        </label>
                        <label class="flex items-center gap-1.5 cursor-pointer">
                            <input type="radio" name="resmcu_keb_{{ $key }}" value="Ya" {{ ($resmcu['keb_' . $key] ?? '') == 'Ya' ? 'checked' : '' }} class="w-3 h-3 text-brand-blue">
                            <span class="text-[9px] font-black text-red-500">YA</span>
                        </label>
                    </div>
                </div>
            @endforeach
            <div class="pt-2">
                <input type="text" name="resmcu_keb_lain" value="{{ $resmcu['keb_lain'] ?? '' }}"
                    placeholder="Kebiasaan Lainnya..."
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-2 text-[10px] font-bold">
            </div>
        </div>
    </td>
</tr>

<!-- RIWAYAT KESEHATAN ORANG TUA -->
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Riwayat ORANG TUA</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <div class="space-y-1.5">
            <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Penyakit Kronis / Jantung
                / Diabetes dll</label>
            <textarea name="resmcu_riwayat_ortu" rows="2"
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none">{{ $resmcu['riwayat_ortu'] ?? 'Tidak Ada' }}</textarea>
        </div>
    </td>
</tr>

<!-- III. PEMERIKSAAN FISIK -->
<tr class="border-t border-gray-100">
    <td colspan="3" class="pt-10 pb-4">
        <h3 class="text-sm font-black text-brand-blue uppercase tracking-widest">III. PEMERIKSAAN FISIK</h3>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Umum & Antropometri</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <div class="space-y-4">
            <input type="text" name="resmcu_keadaan_umum" value="{{ $resmcu['keadaan_umum'] ?? 'Baik' }}"
                placeholder="Keadaan Umum..."
                class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="space-y-1.5">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">TB (cm)</label>
                    <input type="number" name="resmcu_tb" id="resmcu_tb_input" value="{{ $resmcu['tb'] ?? '' }}"
                        class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
                </div>
                <div class="space-y-1.5">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">BB (kg)</label>
                    <input type="number" step="0.1" name="resmcu_bb" id="resmcu_bb_input"
                        value="{{ $resmcu['bb'] ?? '' }}"
                        class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
                </div>
                <div class="space-y-1.5">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">BMI</label>
                    <input type="text" name="resmcu_bmi" id="resmcu_bmi_input" value="{{ $resmcu['bmi'] ?? '' }}"
                        class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
                </div>
                <div class="space-y-1.5">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Kategori
                        BMI</label>
                    <input type="text" name="resmcu_bmi_kat" id="resmcu_bmi_kat_input"
                        value="{{ $resmcu['bmi_kat'] ?? '' }}"
                        class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
                </div>
                <div class="space-y-1.5">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Lk. Dada
                        (cm)</label>
                    <input type="text" name="resmcu_lk_dada" value="{{ $resmcu['lk_dada'] ?? '' }}"
                        class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
                </div>
                <div class="space-y-1.5">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Lk. Perut
                        (cm)</label>
                    <input type="text" name="resmcu_lk_perut" value="{{ $resmcu['lk_perut'] ?? '' }}"
                        class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
                </div>
            </div>
        </div>
    </td>
</tr>

<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Vital Sign</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Systolic
                    (mmHg)</label>
                <input type="text" name="resmcu_systolic" value="{{ $resmcu['systolic'] ?? '' }}"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Diastolic
                    (mmHg)</label>
                <input type="text" name="resmcu_diastolic" value="{{ $resmcu['diastolic'] ?? '' }}"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">HR (x/menit)</label>
                <input type="text" name="resmcu_hr" value="{{ $resmcu['hr'] ?? '' }}"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">RR (x/menit)</label>
                <input type="text" name="resmcu_rr" value="{{ $resmcu['rr'] ?? '' }}"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
        </div>
    </td>
</tr>

<!-- VISUS -->
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">A. Penglihatan (Visus)</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <div class="grid grid-cols-2 gap-4">
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">OD Tanpa
                    Kacamata</label>
                <input type="text" name="resmcu_visus_od_tanpa" value="{{ $resmcu['visus_od_tanpa'] ?? '' }}"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">OD Dengan
                    Kacamata</label>
                <input type="text" name="resmcu_visus_od_dengan" value="{{ $resmcu['visus_od_dengan'] ?? '' }}"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">OS Tanpa
                    Kacamata</label>
                <input type="text" name="resmcu_visus_os_tanpa" value="{{ $resmcu['visus_os_tanpa'] ?? '' }}"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">OS Dengan
                    Kacamata</label>
                <input type="text" name="resmcu_visus_os_dengan" value="{{ $resmcu['visus_os_dengan'] ?? '' }}"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black">
            </div>
        </div>
        <div class="mt-3 flex items-center gap-4">
            <span class="text-[9px] font-black text-gray-400 uppercase">Buta Warna :</span>
            <label class="flex items-center gap-2 cursor-pointer font-black text-xs text-gray-700">
                <input type="radio" name="resmcu_buta_warna" value="Tidak" {{ ($resmcu['buta_warna'] ?? 'Tidak') == 'Tidak' ? 'checked' : '' }} class="w-4 h-4 text-brand-blue"> TIDAK
            </label>
            <label class="flex items-center gap-2 cursor-pointer font-black text-xs text-gray-700">
                <input type="radio" name="resmcu_buta_warna" value="Ya" {{ ($resmcu['buta_warna'] ?? '') == 'Ya' ? 'checked' : '' }} class="w-4 h-4 text-brand-blue"> YA
            </label>
        </div>
    </td>
</tr>

<!-- B. ORGAN SUPERFISIAL -->
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">B. Organ Superfisial</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <div class="p-4 bg-gray-50/50 rounded-2xl border border-gray-100 grid grid-cols-2 lg:grid-cols-2 gap-4">
            @php
                $superficial = [
                    'mata' => 'Mata',
                    'telinga' => 'Telinga',
                    'hidung' => 'Hidung',
                    'mulut' => 'Mulut',
                    'tenggorokan' => 'Faring/Laring',
                    'konsil' => 'Konsil',
                    'tyroid' => 'Tyroid',
                    'lymp_node' => 'Lymp Node',
                    'dada' => 'Dada',
                    'perut' => 'Perut',
                    'hernia' => 'Hernia',
                    'anus' => 'Anus',
                    'payudara' => 'Payudara',
                    'varises' => 'Varises/Hemoroid',
                ];
            @endphp
            @foreach($superficial as $key => $label)
                <div class="space-y-1">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">{{ $label }}</label>
                    <input type="text" name="resmcu_sup_{{ $key }}" value="{{ $resmcu['sup_' . $key] ?? 'Normal' }}"
                        class="w-full bg-white border border-gray-400 rounded-xl px-3 py-2 text-[10px] font-bold">
                </div>
            @endforeach
        </div>
    </td>
</tr>

<!-- C. ORGAN VISCERAL -->
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">C. Organ Visceral</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <div class="space-y-3">
            @php
                $visceral = [
                    'pernafasan' => 'Paru dan Sistem Pernafasan',
                    'kardiovaskular' => 'Jantung dan Sistem Kardiovaskular',
                    'git' => 'Hati, Limpa, dan Sistem GIT',
                    'urogenital' => 'Ginjal dan Sistem Urogenital',
                    'reproduksi' => 'Sistem Reproduksi',
                ];
            @endphp
            @foreach($visceral as $key => $label)
                <div class="space-y-1">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">{{ $label }}</label>
                    <input type="text" name="resmcu_vis_{{ $key }}" value="{{ $resmcu['vis_' . $key] ?? 'Normal' }}"
                        class="w-full bg-white border border-gray-400 rounded-xl px-3 py-2 text-[10px] font-bold">
                </div>
            @endforeach
        </div>
    </td>
</tr>

<!-- D & E: MUSKULO & GIGI -->
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">D & E: Otot/Gigi</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <div class="space-y-4">
            <div class="space-y-1">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Extrimitas Otot dan
                    Tulang</label>
                <input type="text" name="resmcu_extrimitas" value="{{ $resmcu['extrimitas'] ?? 'Normal' }}"
                    class="w-full bg-white border border-gray-400 rounded-xl px-3 py-2 text-[10px] font-bold">
            </div>
            <div class="space-y-1">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Pemeriksaan Mulut dan
                    Gigi (Kelainan)</label>
                <textarea name="resmcu_gigi_mulut" rows="2"
                    class="w-full bg-white border border-gray-400 rounded-xl px-3 py-2 text-[10px] font-bold resize-none">{{ $resmcu['gigi_mulut'] ?? 'Normal' }}</textarea>
            </div>
        </div>
    </td>
</tr>

@php
    if (!function_exists('getGigiLocal')) {
        function getGigiLocal($matrix, $pos, $occ = 1)
        {
            if (!$matrix) return '';
            $items = explode(',', $matrix);
            $found_occ = 0;
            foreach ($items as $item) {
                $parts = explode(':', $item);
                if (count($parts) >= 2 && trim($parts[0]) === $pos) {
                    $found_occ++;
                    if ($found_occ == $occ) return trim($parts[1]);
                }
            }
            return '';
        }
    }
    $positions = ['M3', 'M2', 'M1', 'P2', 'P1', 'C', 'I2', 'I1', 'I1', 'I2', 'C', 'P1', 'P2', 'M1', 'M2', 'M3'];
    $statuses = ['Normal', 'Karies', 'Protesa', 'Masalah', 'Pencabutan', 'Sisa Akar'];
@endphp

<!-- MATRIX GIGI (Interactive Table) -->
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Matrix Gigi</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <div class="overflow-x-auto rounded-3xl border border-gray-200 shadow-sm bg-white p-1">
            <table class="w-full border-collapse text-[10px]">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="border-b border-r border-gray-100 p-2 text-gray-400 uppercase font-black text-[8px]" rowspan="2">Rahang</th>
                        <th class="border-b border-r border-gray-100 p-2 text-gray-400 uppercase font-black text-[8px]" rowspan="2">Status</th>
                        @foreach($positions as $p)
                            <th class="border-b border-r border-gray-100 p-2 font-black text-brand-blue">{{ $p }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <!-- Gigi Atas -->
                    <tr class="border-b border-gray-50">
                        <td class="border-r border-gray-100 p-2 font-black text-center text-gray-500 uppercase text-[9px]">ATAS</td>
                        <td class="border-r border-gray-100 p-2 text-gray-400 font-bold uppercase text-[7px]">Kelainan</td>
                        @php $occ_map = []; @endphp
                        @foreach($positions as $index => $p)
                            @php 
                                $occ_map[$p] = ($occ_map[$p] ?? 0) + 1; 
                                $val = getGigiLocal($resmcu['matrix_atas'] ?? '', $p, $occ_map[$p]);
                            @endphp
                            <td class="border-r border-gray-50 p-0 hover:bg-brand-blue/5 transition-colors">
                                <select data-rahang="atas" data-pos="{{ $p }}" class="dental-select w-full border-0 bg-transparent py-3 font-bold text-center focus:ring-2 focus:ring-brand-blue/20 outline-none cursor-pointer appearance-none {{ $val ? 'text-brand-blue font-black' : 'text-gray-300' }}">
                                    <option value="">-</option>
                                    @foreach($statuses as $opt)
                                        <option value="{{ $opt }}" {{ $val == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                    @endforeach
                                    @if($val && !in_array($val, $statuses))
                                        <option value="{{ $val }}" selected>{{ $val }}</option>
                                    @endif
                                    <option value="CUSTOM_VALUE" class="font-black text-red-500">Lainnya...</option>
                                </select>
                            </td>
                        @endforeach
                    </tr>
                    <!-- Gigi Bawah -->
                    <tr>
                        <td class="border-r border-gray-100 p-2 font-black text-center text-gray-500 uppercase text-[9px]">BAWAH</td>
                        <td class="border-r border-gray-100 p-2 text-gray-400 font-bold uppercase text-[7px]">Kelainan</td>
                        @php $occ_map_b = []; @endphp
                        @foreach($positions as $index => $p)
                            @php 
                                $occ_map_b[$p] = ($occ_map_b[$p] ?? 0) + 1; 
                                $val_b = getGigiLocal($resmcu['matrix_bawah'] ?? '', $p, $occ_map_b[$p]);
                            @endphp
                            <td class="border-r border-gray-50 p-0 hover:bg-brand-blue/5 transition-colors">
                                <select data-rahang="bawah" data-pos="{{ $p }}" class="dental-select w-full border-0 bg-transparent py-3 font-bold text-center focus:ring-2 focus:ring-brand-blue/20 outline-none cursor-pointer appearance-none {{ $val_b ? 'text-brand-blue font-black' : 'text-gray-300' }}">
                                    <option value="">-</option>
                                    @foreach($statuses as $opt)
                                        <option value="{{ $opt }}" {{ $val_b == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                    @endforeach
                                    @if($val_b && !in_array($val_b, $statuses))
                                        <option value="{{ $val_b }}" selected>{{ $val_b }}</option>
                                    @endif
                                    <option value="CUSTOM_VALUE" class="font-black text-red-500">Lainnya...</option>
                                </select>
                            </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Hidden Inputs for Sync -->
        <input type="hidden" name="resmcu_matrix_atas" value="{{ $resmcu['matrix_atas'] ?? '' }}">
        <input type="hidden" name="resmcu_matrix_bawah" value="{{ $resmcu['matrix_bawah'] ?? '' }}">

        <p class="mt-4 text-[9px] font-bold text-gray-400 uppercase italic flex items-center justify-center gap-2">
            <svg class="w-3 h-3 text-brand-blue" fill="currentColor" viewBox="0 0 20 20"><path d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"></path></svg>
            Sisi Kiri tabel adalah Gigi Kanan Pasien, Sisi Kanan tabel adalah Gigi Kiri Pasien (Simetris).
        </p>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const selects = document.querySelectorAll('.dental-select');
                const fieldAtas = document.querySelector('input[name="resmcu_matrix_atas"]');
                const fieldBawah = document.querySelector('input[name="resmcu_matrix_bawah"]');

                function updateFields() {
                    let dataAtas = [];
                    let dataBawah = [];

                    selects.forEach(sel => {
                        if (sel.value && sel.value !== 'CUSTOM_VALUE') {
                            const entry = sel.dataset.pos + ':' + sel.value;
                            if (sel.dataset.rahang === 'atas') {
                                dataAtas.push(entry);
                            } else {
                                dataBawah.push(entry);
                            }
                        }
                    });

                    fieldAtas.value = dataAtas.join(', ');
                    fieldBawah.value = dataBawah.join(', ');
                }

                function refreshStyling(sel) {
                    const hasValue = sel.value !== '' && sel.value !== 'CUSTOM_VALUE';
                    sel.classList.toggle('text-brand-blue', hasValue);
                    sel.classList.toggle('font-black', hasValue);
                    sel.classList.toggle('text-gray-300', !hasValue);
                }

                selects.forEach(sel => {
                    sel.addEventListener('change', function() {
                        const self = this;
                        if (self.value === 'CUSTOM_VALUE') {
                            Swal.fire({
                                title: '<span class="text-sm font-black uppercase tracking-widest text-brand-darkblue">Status Gigi Lainnya</span>',
                                input: 'text',
                                inputPlaceholder: 'Masukkan status gigi...',
                                showCancelButton: true,
                                confirmButtonText: 'SIMPAN',
                                cancelButtonText: 'BATAL',
                                confirmButtonColor: '#1e293b',
                                cancelButtonColor: '#f1f5f9',
                                customClass: {
                                    popup: 'rounded-[1.5rem] border-0',
                                    confirmButton: 'rounded-xl font-black text-[10px] px-6 py-3',
                                    cancelButton: 'rounded-xl font-black text-[10px] px-6 py-3 text-slate-400',
                                    input: 'rounded-xl border-slate-200 font-bold text-sm'
                                },
                                inputValidator: (value) => {
                                    if (!value) {
                                        return 'Status tidak boleh kosong!'
                                    }
                                }
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    const trimCustom = result.value.trim();
                                    let exists = Array.from(self.options).find(o => o.value === trimCustom);
                                    if (!exists) {
                                        const newOpt = new Option(trimCustom, trimCustom);
                                        self.add(newOpt, self.options[self.options.length - 1]);
                                        self.value = trimCustom;
                                    } else {
                                        self.value = trimCustom;
                                    }
                                } else {
                                    self.value = '';
                                }
                                refreshStyling(self);
                                updateFields();
                            });
                        } else {
                            refreshStyling(self);
                            updateFields();
                        }
                    });
                });
            });
        </script>
    </td>
</tr>

<!-- F: SYARAF -->
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">F. Syaraf & Koordinasi</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <div class="grid grid-cols-2 gap-4">
            @php
                $syaraf = [
                    'patologis' => 'Refleks Patologis',
                    'parestesia' => 'Parestesia',
                    'parese' => 'Parese',
                    'lassaque' => 'Lassaque/Patrick sign',
                    'contra' => 'Contra Patrick Sign',
                ];
            @endphp
            @foreach($syaraf as $key => $label)
                <div class="space-y-1">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">{{ $label }}</label>
                    <input type="text" name="resmcu_sya_{{ $key }}" value="{{ $resmcu['sya_' . $key] ?? 'Normal' }}"
                        class="w-full bg-white border border-gray-400 rounded-xl px-3 py-2 text-[10px] font-bold">
                </div>
            @endforeach
        </div>
    </td>
</tr>

<!-- PENUNJANG -->
<tr class="border-t border-gray-100">
    <td colspan="3" class="pt-10 pb-4">
        <h3 class="text-sm font-black text-brand-blue uppercase tracking-widest">IV. PEMERIKSAAN PENUNJANG</h3>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Penunjang</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <div class="space-y-3">
            @php
                $penunjang = [
                    'radiologi' => 'Radiologi',
                    'laboratorium' => 'Laboratorium',
                    'ekg' => 'EKG',
                    'lainnya' => 'Lainnya',
                ];
            @endphp
            @foreach($penunjang as $key => $label)
                <div class="space-y-1">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">{{ $label }}</label>
                    <input type="text" name="resmcu_penun_{{ $key }}" value="{{ $resmcu['penun_' . $key] ?? '-' }}"
                        class="w-full bg-white border border-gray-400 rounded-xl px-3 py-2 text-[10px] font-bold">
                </div>
            @endforeach
        </div>
    </td>
</tr>

<!-- KESIMPULAN -->
<tr class="border-t border-gray-100">
    <td colspan="3" class="pt-10 pb-4">
        <h3 class="text-sm font-black text-brand-blue uppercase tracking-widest">KESIMPULAN & REKOMENDASI</h3>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Hasil Akhir</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <div class="space-y-4">
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Kesimpulan Pemeriksaan
                    Fisik</label>
                <textarea name="resmcu_kesimpulan_fisik" rows="2"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none">{{ $resmcu['kesimpulan_fisik'] ?? 'SEHAT UNTUK BEKERJA' }}</textarea>
            </div>
            <div class="space-y-1.5">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Saran /
                    Rekomendasi</label>
                <textarea name="resmcu_rekomendasi" rows="3"
                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black resize-none">{{ $resmcu['rekomendasi'] ?? '-' }}</textarea>
            </div>
        </div>
    </td>
</tr>