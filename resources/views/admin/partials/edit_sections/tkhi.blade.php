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
    <td class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
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
                type="number" name="mcu_tinggi" id="mcu_tinggi" value="{{ $surat->tinggi_badan ?? $surat->pendaftar->tinggi_badan ?? '' }}"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold"></div>
        <div class="space-y-1"><label class="text-[9px] font-black text-gray-400 uppercase">Berat (kg)</label><input
                type="number" step="0.1" name="mcu_berat" id="mcu_berat" value="{{ $surat->berat_badan ?? $surat->pendaftar->berat_badan ?? '' }}"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold"></div>
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

<!-- ANAMNESIS TKHI -->
<tr>
    <td class="pt-6" colspan="3">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">II. ANAMNESIS (RIWAYAT KESEHATAN)</h3>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Keluhan Saat Ini</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <input type="text" name="mcu_keluhan_saat_ini" value="{{ $getVal('keluhan_saat_ini') }}" placeholder="Keluhan saat ini..."
            class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Riwayat Kes. Sekarang</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 p-4 border border-gray-100 rounded-xl bg-gray-50/50">
        @php
            $riwayatSkrng = [
                'riwayat_skrng_hipertensi' => 'Hipertensi',
                'riwayat_skrng_diabetes-mellitus' => 'Diabetes Mellitus',
                'riwayat_skrng_gangguan-jiwa' => 'Gangguan Jiwa',
                'riwayat_skrng_hivaids' => 'HIV/AIDS',
                'riwayat_skrng_kanker-keganasan' => 'Kanker (Keganasan)',
                'riwayat_skrng_penyakit-hati' => 'Penyakit Hati',
                'riwayat_skrng_penyakit-alergi' => 'Penyakit Alergi',
                'riwayat_skrng_jantung' => 'Penyakit Jantung',
                'riwayat_skrng_ginjal' => 'Gagal Ginjal',
            ];
        @endphp
        @foreach ($riwayatSkrng as $key => $label)
            <div class="flex flex-col gap-1.5">
                <span class="text-[9px] font-black text-gray-400 uppercase tracking-tight">{{ $label }}</span>
                <select name="mcu_{{ $key }}"
                    class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none transition-all shadow-sm">
                    <option value="Tidak" {{ $getVal($key) != 'Ya' ? 'selected' : '' }}>Tidak</option>
                    <option value="Ya" {{ $getVal($key) == 'Ya' ? 'selected' : '' }}>Ya</option>
                </select>
            </div>
        @endforeach
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Riwayat Peny. Dahulu</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 p-4 border border-gray-100 rounded-xl bg-gray-50/50">
        @foreach (['riwayat_dahulu_tuberkulosis' => 'Tuberkulosis', 'riwayat_dahulu_covid-19' => 'COVID-19', 'riwayat_dahulu_operasi' => 'Operasi'] as $key => $label)
            <div class="flex flex-col gap-1.5">
                <span class="text-[9px] font-black text-gray-400 uppercase tracking-tight">{{ $label }}</span>
                <select name="mcu_{{ $key }}"
                    class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none transition-all shadow-sm">
                    <option value="Tidak" {{ $getVal($key) != 'Ya' ? 'selected' : '' }}>Tidak</option>
                    <option value="Ya" {{ $getVal($key) == 'Ya' ? 'selected' : '' }}>Ya</option>
                </select>
            </div>
        @endforeach
        <div class="flex flex-col gap-1.5 sm:col-span-2 lg:col-span-1">
            <span class="text-[9px] font-black text-gray-400 uppercase tracking-tight">Lainnya</span>
            <input type="text" name="mcu_riwayat_dahulu_lainnya" value="{{ $getVal('riwayat_dahulu_lainnya') }}"
                placeholder="Lainnya..."
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none transition-all shadow-sm">
        </div>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Riwayat Peny. Keluarga</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 p-4 border border-gray-100 rounded-xl bg-gray-50/50">
        @php
            $riwayatKel = [
                'riwayat_keluarga_hipertensi' => 'Hipertensi',
                'riwayat_keluarga_penyakit-jantung' => 'Penyakit Jantung',
                'riwayat_keluarga_gangguan-jiwa' => 'Gangguan Jiwa',
                'riwayat_keluarga_penyakit-alergi' => 'Penyakit Alergi',
                'riwayat_keluarga_gagal-ginjal' => 'Gagal Ginjal',
                'riwayat_keluarga_diabetes-melitus' => 'Diabetes Melitus',
            ];
        @endphp
        @foreach ($riwayatKel as $key => $label)
            <div class="flex flex-col gap-1.5">
                <span class="text-[9px] font-black text-gray-400 uppercase tracking-tight">{{ $label }}</span>
                <select name="mcu_{{ $key }}"
                    class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none transition-all shadow-sm">
                    <option value="Tidak" {{ $getVal($key) != 'Ya' ? 'selected' : '' }}>Tidak</option>
                    <option value="Ya" {{ $getVal($key) == 'Ya' ? 'selected' : '' }}>Ya</option>
                </select>
            </div>
        @endforeach
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest align-top pt-2">Riwayat Sosial/Kebiasaan</td>
    <td class="text-center font-bold text-gray-300 align-top pt-2">:</td>
    <td class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-4 border border-gray-100 rounded-xl bg-gray-50/50">
        @php
            $riwayatSosial = [
                'riwayat_sosial_merokok' => 'Merokok',
                'riwayat_sosial_terpapar-zat-berbahaya' => 'Terpapar Zat Berbahaya',
                'riwayat_sosial_minum-alkohol' => 'Minum Alkohol',
                'riwayat_sosial_penyalahgunaan-obat' => 'Penyalahgunaan Obat',
                'riwayat_sosial_minum-kopi' => 'Minum Kopi',
                'riwayat_sosial_obat' => 'Konsumsi Obat Rutin',
            ];
        @endphp
        @foreach($riwayatSosial as $key => $label)
            <div class="flex flex-col gap-1.5">
                <span class="text-[9px] font-black text-gray-400 uppercase tracking-tight">{{ $label }}</span>
                <select name="mcu_{{ $key }}" class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none transition-all shadow-sm">
                    <option value="Tidak" {{ $getVal($key) != 'Ya' ? 'selected' : '' }}>Tidak</option>
                    <option value="Ya" {{ $getVal($key) == 'Ya' ? 'selected' : '' }}>Ya</option>
                </select>
            </div>
        @endforeach
    </td>
</tr>

<!-- PEMERIKSAAN VISUS -->
<tr>
    <td class="pt-6" colspan="3">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">III. PEMERIKSAAN FUNGSI PENGLIHATAN (VISUS)</h3>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Visus Mata</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
        @php
            $visusFields = [
                'od_tanpa' => 'OD Tanpa Kacamata',
                'od_kaca' => 'OD Kacamata',
                'os_tanpa' => 'OS Tanpa Kacamata',
                'os_kaca' => 'OS Kacamata',
            ];
        @endphp
        @foreach ($visusFields as $key => $label)
            <div class="flex flex-col gap-1.5">
                <span class="text-[9px] font-black text-gray-400 uppercase tracking-tight">{{ $label }}</span>
                <input type="text" name="mcu_{{ $key }}" value="{{ $getVal($key) }}"
                    placeholder="{{ $label }}"
                    class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none transition-all shadow-sm">
            </div>
        @endforeach
        <div class="flex flex-col gap-1.5">
            <span class="text-[9px] font-black text-gray-400 uppercase tracking-tight">Buta Warna</span>
            <select name="mcu_buta_warna"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none transition-all shadow-sm">
                <option value="Tidak Buta Warna" {{ $surat->buta_warna == 'Tidak Buta Warna' ? 'selected' : '' }}>Normal
                </option>
                <option value="Buta Warna Total" {{ $surat->buta_warna == 'Buta Warna Total' ? 'selected' : '' }}>Buta Warna
                    Total</option>
                <option value="Buta Warna Parsial" {{ $surat->buta_warna == 'Buta Warna Parsial' ? 'selected' : '' }}>Buta
                    Warna Parsial</option>
            </select>
        </div>
    </td>
</tr>

<!-- PEMERIKSAAN FISIK INSPEKSI & PALPASI -->
<tr>
    <td class="pt-6" colspan="3">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">IV. PEMERIKSAAN FISIK</h3>
        <p class="text-[10px] text-gray-400 italic">Pemeriksaan Inspeksi dan Palpasi per bagian tubuh</p>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest align-top pt-2">Inspeksi & Palpasi</td>
    <td class="text-center font-bold text-gray-300 align-top pt-2">:</td>
    <td class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @php
            $fisikParts = [
                'fisik_kulit' => 'Kulit',
                'fisik_kepala' => 'Kepala',
                'fisik_mata' => 'Mata',
                'fisik_telinga' => 'Telinga',
                'fisik_hidung' => 'Hidung',
                'fisik_mulut-dan-tenggorokan' => 'Mulut & Tenggorokan',
                'fisik_leher-dan-getah-bening' => 'Leher & Getah Bening',
            ];
        @endphp
        @foreach ($fisikParts as $key => $label)
            <div class="flex flex-col gap-2 p-3 border border-gray-100 rounded-xl bg-gray-50/30">
                <span class="text-[10px] font-black text-gray-400 uppercase tracking-tight">{{ $label }}</span>
                <div class="flex gap-2">
                    <select name="mcu_{{ $key }}"
                        class="w-32 bg-white border border-gray-400 rounded-lg px-2 py-2 text-xs font-bold focus:border-brand-blue outline-none transition-colors shadow-sm">
                        <option value="Tidak" {{ $getVal($key) == 'Tidak' ? 'selected' : '' }}>Normal</option>
                        <option value="Ada" {{ $getVal($key) == 'Ada' ? 'selected' : '' }}>Kelainan</option>
                    </select>
                    <input type="text" name="mcu_ket_{{ $key }}" value="{{ $getVal('ket_' . $key) }}"
                        placeholder="Keterangan..."
                        class="flex-1 bg-white border border-gray-400 rounded-lg px-2 py-2 text-xs focus:border-brand-blue outline-none transition-colors shadow-sm">
                </div>
            </div>
        @endforeach
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest align-top pt-2">Thoraks (Dada)</td>
    <td class="text-center font-bold text-gray-300 align-top pt-2">:</td>
    <td class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        @foreach (['fisik_dada_dada' => 'Dada', 'fisik_dada_paru' => 'Paru', 'fisik_dada_jantung' => 'Jantung'] as $key => $label)
            <div class="flex flex-col gap-2 p-3 border border-gray-100 rounded-xl bg-gray-50/30">
                <span class="text-[10px] font-black text-gray-400 uppercase tracking-tight">{{ $label }}</span>
                <select name="mcu_{{ $key }}"
                    class="w-full bg-white border border-gray-400 rounded-lg px-2 py-2 text-xs font-bold focus:border-brand-blue outline-none transition-all shadow-sm">
                    <option value="Tidak" {{ $getVal($key) == 'Tidak' ? 'selected' : '' }}>Normal</option>
                    <option value="Ada" {{ $getVal($key) == 'Ada' ? 'selected' : '' }}>Kelainan</option>
                </select>
                <input type="text" name="mcu_ket_{{ $key }}" value="{{ $getVal('ket_' . $key) }}"
                    placeholder="Keterangan..."
                    class="w-full bg-white border border-gray-400 rounded-lg px-2 py-2 text-xs focus:border-brand-blue outline-none transition-all shadow-sm">
            </div>
        @endforeach
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Ekstremitas</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
        @php
            $ekstFields = [
                'ekst_tangan_kanan' => 'Otot Tangan Kanan (0-5)',
                'ekst_tangan_kiri' => 'Otot Tangan Kiri (0-5)',
                'ekst_kaki_kanan' => 'Otot Kaki Kanan (0-5)',
                'ekst_kaki_kiri' => 'Otot Kaki Kiri (0-5)',
                'ekst_refleks' => 'Refleks',
                'ekst_patologis' => 'Patologis',
            ];
        @endphp
        @foreach ($ekstFields as $key => $label)
            <div class="flex flex-col gap-1.5">
                <span class="text-[9px] font-black text-gray-400 uppercase tracking-tight">{{ $label }}</span>
                <input type="text" name="mcu_{{ $key }}"
                    value="{{ $getVal($key, in_array($key, ['ekst_refleks', 'ekst_patologis']) ? ($key == 'ekst_refleks' ? '+' : '-') : '5') }}"
                    class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none transition-all shadow-sm">
            </div>
        @endforeach
        <div class="flex flex-col gap-1.5">
            <span class="text-[9px] font-black text-gray-400 uppercase tracking-tight">Disabilitas Tangan</span>
            <select name="mcu_ekst_dis_tangan"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none transition-all shadow-sm">
                <option value="Tidak" {{ $getVal('ekst_dis_tangan') != 'Ya' ? 'selected' : '' }}>Tidak</option>
                <option value="Ya" {{ $getVal('ekst_dis_tangan') == 'Ya' ? 'selected' : '' }}>Ya</option>
            </select>
        </div>
        <div class="flex flex-col gap-1.5">
            <span class="text-[9px] font-black text-gray-400 uppercase tracking-tight">Disabilitas Kaki</span>
            <select name="mcu_ekst_dis_kaki"
                class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none transition-all shadow-sm">
                <option value="Tidak" {{ $getVal('ekst_dis_kaki') != 'Ya' ? 'selected' : '' }}>Tidak</option>
                <option value="Ya" {{ $getVal('ekst_dis_kaki') == 'Ya' ? 'selected' : '' }}>Ya</option>
            </select>
        </div>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest align-top pt-2">Rectum & Urogenital</td>
    <td class="text-center font-bold text-gray-300 align-top pt-2">:</td>
    <td class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        @foreach (['fisik_uro_rectum' => 'Rectum', 'fisik_uro_urogenital' => 'Urogenital'] as $key => $label)
            <div class="flex flex-col gap-2 p-3 border border-gray-100 rounded-xl bg-gray-50/30">
                <span class="text-[10px] font-black text-gray-400 uppercase tracking-tight">{{ $label }}</span>
                <div class="flex gap-2">
                    <select name="mcu_{{ $key }}"
                        class="w-32 bg-white border border-gray-400 rounded-lg px-2 py-2 text-xs font-bold focus:border-brand-blue outline-none transition-colors shadow-sm">
                        <option value="Tidak" {{ $getVal($key) == 'Tidak' ? 'selected' : '' }}>Normal</option>
                        <option value="Ada" {{ $getVal($key) == 'Ada' ? 'selected' : '' }}>Kelainan</option>
                    </select>
                    <input type="text" name="mcu_fisik_uro_ket_{{ str_replace('fisik_uro_', '', $key) }}"
                        value="{{ $getVal('fisik_uro_ket_' . str_replace('fisik_uro_', '', $key)) }}" placeholder="Keterangan..."
                        class="flex-1 bg-white border border-gray-400 rounded-lg px-2 py-2 text-xs focus:border-brand-blue outline-none transition-colors shadow-sm">
                </div>
            </div>
        @endforeach
    </td>
</tr>

<!-- LABORATORIUM LENGKAP -->
<tr>
    <td class="pt-6" colspan="3">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">V. LABORATORIUM</h3>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Darah Lengkap</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        @php
            $darahLengkap = [
                'lab_hb' => 'Hemoglobin',
                'lab_lekosit' => 'Lekosit',
                'lab_trombosit' => 'Trombosit',
                'lab_eritrosit' => 'Eritrosit',
            ];
        @endphp
        @foreach ($darahLengkap as $key => $label)
            <div class="flex flex-col gap-1.5">
                <span class="text-[9px] font-black text-gray-400 uppercase tracking-tight">{{ $label }}</span>
                <input type="{{ in_array($key, ['lab_hb', 'lab_eritrosit']) ? 'number' : 'number' }}"
                    @if (in_array($key, ['lab_hb', 'lab_eritrosit'])) step="any" @endif name="mcu_{{ $key }}"
                    value="{{ $getVal($key) }}" placeholder="{{ $label }}"
                    class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none transition-all shadow-sm">
            </div>
        @endforeach
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Hitung Jenis</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
        @php
            $hitungJenis = [
                'lab_hematokrit' => 'Hematokrit',
                'lab_hj_basofil' => 'Basofil',
                'lab_hj_eosinophil' => 'Eosinophil',
                'lab_hj_monosit' => 'Monosit',
                'lab_hj_limfosit' => 'Limfosit',
                'lab_hj_netrofil' => 'Netrofil',
                'lab_hj_led' => 'LED',
                'lab_golda' => 'Gol. Darah & Rhesus',
            ];
        @endphp
        @foreach ($hitungJenis as $key => $label)
            <div class="flex flex-col gap-1.5">
                <span class="text-[9px] font-black text-gray-400 uppercase tracking-tight">{{ $label }}</span>
                <input type="{{ $key == 'lab_golda' ? 'text' : 'number' }}"
                    @if ($key != 'lab_golda' && $key != 'lab_hj_led') step="any" @endif name="mcu_{{ $key }}"
                    value="{{ $getVal($key) }}" placeholder="{{ $label }}"
                    class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none transition-all shadow-sm">
            </div>
        @endforeach
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Kimia Darah</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
        @php
            $kimiaDarah = [
                'lab_gdp' => 'Gula Darah Puasa',
                'lab_gd2pp' => 'GD2PP',
                'lab_hba1c' => 'HbA1c',
                'lab_cholesterol' => 'Cholesterol',
                'lab_trigliserida' => 'Trigliserida',
                'lab_hdl' => 'HDL',
                'lab_ldl' => 'LDL',
                'lab_ureum' => 'Ureum',
                'lab_kreatinin' => 'Kreatinin',
                'lab_sgot' => 'SGOT',
                'lab_sgpt' => 'SGPT',
                'lab_uric_acid' => 'Asam Urat',
            ];
        @endphp
        @foreach ($kimiaDarah as $key => $label)
            <div class="flex flex-col gap-1.5">
                <span class="text-[9px] font-black text-gray-400 uppercase tracking-tight">{{ $label }}</span>
                <input type="number" step="any" name="mcu_{{ $key }}" value="{{ $getVal($key) }}"
                    placeholder="{{ $label }}"
                    class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none transition-all shadow-sm">
            </div>
        @endforeach
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Urine</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
        @php
            $urineFields = [
                'lab_urine_warna' => 'Warna',
                'lab_urine_kejernihan' => 'Kejernihan',
                'lab_urine_bau' => 'Bau',
                'lab_urine_micro_sedimen' => 'Sedimen',
                'lab_urine_micro_glukosa_urin' => 'Glukosa Urin',
                'lab_urine_micro_protein_urin' => 'Protein Urin',
                'lab_tes_kehamilan' => 'Tes Kehamilan (WUS)',
            ];
        @endphp
        @foreach ($urineFields as $key => $label)
            <div class="flex flex-col gap-1.5">
                <span class="text-[9px] font-black text-gray-400 uppercase tracking-tight">{{ $label }}</span>
                <input type="text" name="mcu_{{ $key }}" value="{{ $getVal($key) }}"
                    placeholder="{{ $label }}"
                    class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none transition-all shadow-sm">
            </div>
        @endforeach
    </td>
</tr>

<!-- RADIOLOGI -->
<tr>
    <td class="pt-6" colspan="3">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">VI. RADIOLOGI THORAKS PA</h3>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Hasil Radiologi</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="space-y-3">
        <input type="text" name="mcu_rad_hasil" value="{{ $getVal('rad_hasil', 'Tidak ada kelainan') }}" placeholder="Hasil Radiologi..."
            class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <div class="grid grid-cols-3 gap-3 p-3 border border-gray-100 rounded-xl bg-gray-50/50">
            @foreach(['kesan-normal' => 'Kesan Normal', 'tb-kesan-fibrosis' => 'TB Kesan Fibrosis', 'kesan-tumorca' => 'Kesan Tumor/Ca', 'kardiomegali' => 'Kardiomegali', 'kesan-ppok' => 'Kesan PPOK'] as $key => $label)
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="mcu_rad_{{ $key }}" value="Ya" {{ $getVal('rad_' . $key) == 'Ya' ? 'checked' : '' }}
                        class="rounded border-gray-300 text-brand-blue">
                    <span class="text-[10px] font-bold">{{ $label }}</span>
                </label>
            @endforeach
        </div>
    </td>
</tr>

<!-- EKG -->
<tr>
    <td class="pt-6" colspan="3">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">VII. ELEKTROKARDIOGRAM (EKG)</h3>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Hasil EKG</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="space-y-3">
        <input type="text" name="mcu_ekg_hasil" value="{{ $getVal('ekg_hasil', 'Tidak ada kelainan') }}" placeholder="Hasil EKG..."
            class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
        <div class="grid grid-cols-3 gap-3 p-3 border border-gray-100 rounded-xl bg-gray-50/50">
            @foreach(['iskemik' => 'Iskemik', 'infark' => 'Infark', 'aritmia' => 'Aritmia'] as $key => $label)
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="mcu_ekg_{{ $key }}" value="Ya" {{ $getVal('ekg_' . $key) == 'Ya' ? 'checked' : '' }}
                        class="rounded border-gray-300 text-brand-blue">
                    <span class="text-[10px] font-bold">{{ $label }}</span>
                </label>
            @endforeach
        </div>
    </td>
</tr>

<!-- NAPZA -->
<tr>
    <td class="pt-6" colspan="3">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">VIII. PEMERIKSAAN NAPZA</h3>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Skrining NAPZA</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-3 gap-4 p-4 border border-gray-100 rounded-xl bg-gray-50/50">
        @php
            $napzaList = [
                'napza_morphine' => 'Morphine / Opiate',
                'napza_canabinoid' => 'THC / Ganja',
                'napza_amphetamine' => 'Amphetamine',
                'napza_metamfetamin' => 'Methamphetamine',
                'napza_cocaine' => 'Cocaine',
                'napza_benzodiazepine' => 'Benzodiazepine',
            ];
        @endphp
        @foreach ($napzaList as $key => $label)
            <div class="flex flex-col gap-1.5">
                <span class="text-[9px] font-black text-gray-400 uppercase tracking-tight">{{ $label }}</span>
                <select name="mcu_{{ $key }}"
                    class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold focus:border-brand-blue outline-none transition-all shadow-sm">
                    <option value="Negatif" {{ $getVal($key) != 'Positif' ? 'selected' : '' }}>NEGATIF</option>
                    <option value="Positif" {{ $getVal($key) == 'Positif' ? 'selected' : '' }}>POSITIF</option>
                </select>
            </div>
        @endforeach
    </td>
</tr>

<!-- PEMERIKSAAN JIWA -->
<tr>
    <td class="pt-6" colspan="3">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">IX. PEMERIKSAAN JIWA SEDERHANA</h3>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Jiwa TKHI</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @php
            $jiwaList = [
                'jiwa_1' => 'Penampilan umum (sikap, perilaku, psikomotor)',
                'jiwa_2' => 'Mood/afek (suasana perasaan)',
                'jiwa_3' => 'Afek (luas, terbatas, tumpul, mendatar)',
                'jiwa_4' => 'Pembicaraan (spontan, jelas, dll)',
                'jiwa_5' => 'Persepsi (halusinasi visual/audimotorik)',
                'jiwa_6' => 'Proses dan isi pikir (waham, dll)',
                'jiwa_7' => 'Pengendalian impuls (verbal/motorik)',
                'jiwa_8' => 'Fungsi kognitif (kesadaran, memori)',
                'jiwa_9' => 'Kemampuan menilai realitas',
            ];
        @endphp
        @foreach ($jiwaList as $key => $label)
            <div class="flex flex-col gap-2 p-3 border border-gray-100 rounded-xl bg-gray-50/20">
                <span class="text-[10px] font-black text-gray-400 uppercase tracking-tight">{{ $label }}</span>
                <div class="flex gap-2">
                    <select name="mcu_{{ $key }}"
                        class="w-32 bg-white border border-gray-400 rounded-lg px-2 py-2 text-xs font-bold focus:border-brand-blue outline-none transition-colors shadow-sm">
                        <option value="Normal" {{ $getVal($key) == 'Normal' || $getVal($key) == '' ? 'selected' : '' }}>NORMAL
                        </option>
                        <option value="Kelainan" {{ $getVal($key) == 'Kelainan' ? 'selected' : '' }}>KELAINAN</option>
                    </select>
                    <input type="text" name="mcu_{{ $key }}_ket" value="{{ $getVal($key . '_ket') }}"
                        placeholder="Keterangan..."
                        class="flex-1 bg-white border border-gray-400 rounded-lg px-2 py-2 text-xs focus:border-brand-blue outline-none transition-colors shadow-sm">
                </div>
            </div>
        @endforeach
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Kesimpulan Jiwa</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <select name="mcu_jiwa_kesimpulan" class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold">
            <option value="Direkomendasikan" {{ $getVal('jiwa_kesimpulan') != 'Tidak Direkomendasikan' ? 'selected' : '' }}>DIREKOMENDASIKAN</option>
            <option value="Tidak Direkomendasikan" {{ $getVal('jiwa_kesimpulan') == 'Tidak Direkomendasikan' ? 'selected' : '' }}>TIDAK DIREKOMENDASIKAN</option>
        </select>
    </td>
</tr>

<!-- KESIMPULAN -->
<tr>
    <td class="pt-6" colspan="3">
        <h3 class="text-brand-blue font-black uppercase tracking-tighter">X. KESIMPULAN & RESUME</h3>
    </td>
</tr>
<tr>
    <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Kesimpulan Akhir</td>
    <td class="text-center font-bold text-gray-300">:</td>
    <td>
        <textarea name="mcu_hasil_pemeriksaan" rows="2"
            class="w-full bg-white border border-gray-400 rounded-lg px-3 py-2 text-xs font-bold"
            placeholder="Contoh: MEMENUHI SYARAT / TIDAK MEMENUHI SYARAT...">{{ $surat->hasil_pemeriksaan }}</textarea>
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