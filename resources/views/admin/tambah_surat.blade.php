@extends('layouts.admin')

@section('title', 'Tambah Berkas Surat')

@section('content')
    <!-- Header -->
    <header
        class="h-20 lg:h-24 bg-white/80 backdrop-blur-md border-b border-gray-100 flex items-center justify-between px-4 lg:px-8 z-10 sticky top-0 transition-all duration-300">
        <div class="flex items-center gap-3 lg:gap-4 flex-1">
            <button id="sidebarToggle"
                class="w-10 h-10 lg:w-12 lg:h-12 flex items-center justify-center rounded-2xl bg-gray-50 text-brand-darkblue hover:bg-brand-blue hover:text-white transition-all shadow-sm border border-gray-100 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div class="truncate">
                <h2 class="text-sm lg:text-2xl font-black text-brand-darkblue tracking-tight truncate uppercase">Tambah Data
                    Berkas</h2>
                <p class="text-[8px] lg:text-xs text-brand-gray font-medium truncate uppercase tracking-widest mt-0.5">Input
                    hasil pemeriksaan kesehatan pasien</p>
            </div>
        </div>

        <a href="{{ url('/admin/buat-surat') }}"
            class="w-10 h-10 lg:w-12 lg:h-12 flex items-center justify-center rounded-2xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all shadow-sm border border-red-100 shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 lg:h-6 lg:w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </a>
    </header>

    <!-- Content Body -->
    <div class="flex-1 overflow-y-auto p-4 lg:p-10 bg-[#fbfcfd]">
        <div class="max-w-5xl mx-auto">
            <form action="{{ url('/admin/buat-surat/tambah') }}" method="POST"
                class="bg-white rounded-[2.5rem] shadow-2xl shadow-blue-900/5 border border-gray-100 overflow-hidden mb-20 animate__animated animate__fadeIn">
                @csrf

                <div class="p-8 lg:p-12">
                    <table class="w-full border-separate border-spacing-y-6">
                        <!-- Patient Selection -->
                        <tr id="row_existing_patient">
                            <td class="w-1/3 text-xs font-black text-gray-400 uppercase tracking-widest">Pilih Nama Pemohon
                            </td>
                            <td class="w-4 text-center font-bold text-gray-300">:</td>
                            <td>
                                <div class="relative group">
                                    <select name="pendaftar_id" id="pendaftar_select"
                                        class="w-full bg-gray-50 border border-gray-400 rounded-2xl px-5 py-4 font-black text-brand-darkblue focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue focus:bg-white transition-all outline-none appearance-none cursor-pointer">
                                        <option value="">-- Pilih Nama Pasien --</option>
                                        @foreach($pendaftar as $p)
                                            <option value="{{ $p->id }}" {{ (isset($selected_id) && $selected_id == $p->id) ? 'selected' : '' }} data-gender="{{ $p->jenis_kelamin }}"
                                                data-tempat="{{ $p->tempat_lahir }}" data-tanggal="{{ $p->tanggal_lahir }}"
                                                data-alamat="{{ $p->alamat }}" data-hp="{{ $p->no_hp ?? '' }}"
                                                data-pekerjaan="{{ $p->pekerjaan ?? '' }}"
                                                data-pendidikan="{{ $p->pendidikan ?? '' }}"
                                                data-tinggi="{{ $p->tinggi_badan ?? '' }}"
                                                data-berat="{{ $p->berat_badan ?? '' }}"
                                                data-perusahaan="{{ $p->perusahaan ?? '' }}"
                                                data-keperluan="{{ $p->keperluan ?? '' }}" data-tests="{{ $p->jenis_test }}"
                                                data-existing="{{ $p->suratKeterangan->pluck('tipe_berkas')->implode(', ') }}"
                                                data-no-rm="{{ $p->no_rm ?? '' }}"
                                                data-nomor-surat="{{ $p->suratKeterangan->isNotEmpty() ? $p->suratKeterangan->first()->nomor_surat : '' }}">
                                                [{{ $row_num = $p->no_registrasi }}] {{ $p->nama_lengkap }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div
                                        class="absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400 group-focus-within:text-brand-blue transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Tipe Berkas (Dynamic) -->
                        <tr id="row_tipe_berkas" class="hidden">
                            <td
                                class="text-xs font-black text-brand-blue uppercase tracking-[0.15em] animate__animated animate__fadeInLeft">
                                Jenis Surat Diterbitkan</td>
                            <td class="text-center font-bold text-gray-300">:</td>
                            <td>
                                <div class="relative group animate__animated animate__fadeInRight">
                                    <select name="tipe_berkas" id="tipe_berkas_select"
                                        class="w-full bg-brand-blue/5 border border-brand-blue/20 rounded-2xl px-5 py-4 font-black text-brand-blue focus:ring-4 focus:ring-brand-blue/20 focus:border-brand-blue transition-all outline-none appearance-none cursor-pointer">
                                        <option value="">-- Pilih Tipe Surat --</option>
                                    </select>
                                    <div
                                        class="absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none text-brand-blue/40">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                                <p
                                    class="text-[10px] text-brand-blue/60 mt-2 font-bold italic tracking-wide flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Otomatis mendeteksi riwayat pendaftaran online pasien
                                </p>
                            </td>
                        </tr>

                        <!-- Common Display Fields (Readonly) -->
                        <tr class="border-t border-gray-50 border-spacing-y-2">
                            <td class="pt-6 text-xs font-black text-gray-400 uppercase tracking-widest">Profil Singkat
                                Pasien</td>
                            <td class="pt-6 text-center font-bold text-gray-300">:</td>
                            <td class="pt-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="space-y-1.5">
                                        <label
                                            class="text-[9px] font-black text-gray-400 uppercase tracking-tighter ml-1">Jenis
                                            Kelamin</label>
                                        <input type="text" id="display_gender" readonly
                                            class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-2.5 text-xs font-bold text-gray-500">
                                    </div>
                                    <div class="space-y-1.5">
                                        <label
                                            class="text-[9px] font-black text-gray-400 uppercase tracking-tighter ml-1">Pendidikan
                                            Terakhir</label>
                                        <input type="text" name="pendidikan" id="display_pendidikan"
                                            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-2.5 text-xs font-bold text-brand-darkblue focus:border-brand-blue outline-none transition-all">
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Tempat, Tgl Lahir /
                                Pekerjaan</td>
                            <td class="text-center font-bold text-gray-300">:</td>
                            <td class="space-y-4">
                                <div class="flex items-center gap-3">
                                    <input type="text" id="display_tempat" readonly
                                        class="flex-1 bg-gray-50 border border-gray-100 rounded-xl px-4 py-2.5 text-xs font-bold text-gray-500">
                                    <span class="text-gray-300">/</span>
                                    <input type="text" id="display_tanggal" readonly
                                        class="flex-1 bg-gray-50 border border-gray-100 rounded-xl px-4 py-2.5 text-xs font-bold text-gray-500">
                                </div>
                                <input type="text" name="pekerjaan" id="display_pekerjaan"
                                    placeholder="Update pekerjaan jika perlu..."
                                    class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black text-brand-darkblue focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue outline-none transition-all">
                            </td>
                        </tr>

                        <tr>
                            <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Alamat Lengkap & HP</td>
                            <td class="text-center font-bold text-gray-300">:</td>
                            <td class="space-y-4">
                                <textarea id="display_alamat" readonly rows="2"
                                    class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-xs font-bold text-gray-500 outline-none resize-none"></textarea>
                                <div class="relative group w-max min-w-[200px]">
                                    <input type="text" id="display_hp" readonly
                                        class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 pl-10 pr-4 text-xs font-bold text-gray-500">
                                    <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Section: KESEHATAN UMUM -->
                        <tbody id="section_kesehatan" class="hidden animate__animated animate__fadeIn">
                            <tr class="border-t border-gray-100">
                                <td colspan="3" class="pt-10 pb-4">
                                    <div class="flex items-center gap-4">
                                        <h3 class="text-sm font-black text-brand-blue uppercase tracking-widest">Data
                                            Pemeriksaan Fisik</h3>
                                        <div class="flex-1 h-px bg-brand-blue/10"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Antropometri</td>
                                <td class="text-center font-bold text-gray-300">:</td>
                                <td class="flex items-center gap-4">
                                    <div class="flex-1 space-y-1.5">
                                        <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">TB
                                            (cm)</label>
                                        <input type="number" name="tinggi_badan" id="display_tinggi"
                                            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black text-brand-darkblue focus:border-brand-blue">
                                    </div>
                                    <div class="flex-1 space-y-1.5">
                                        <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">BB
                                            (kg)</label>
                                        <input type="number" name="berat_badan" id="display_berat"
                                            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black text-brand-darkblue focus:border-brand-blue">
                                    </div>
                                    <div class="flex-1 space-y-1.5">
                                        <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">BMI
                                            (IMT)</label>
                                        <input type="text" name="bmi" id="bmi_input" placeholder="Auto/Manual"
                                            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black text-brand-darkblue focus:border-brand-blue">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Vital Signs</td>
                                <td class="text-center font-bold text-gray-300">:</td>
                                <td class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                                    <div class="space-y-1.5">
                                        <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Tensi
                                            (mmhg)</label>
                                        <input type="text" name="tensi"
                                            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black text-brand-darkblue">
                                    </div>
                                    <div class="space-y-1.5">
                                        <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Nadi
                                            (x/mnt)</label>
                                        <input type="number" name="nadi"
                                            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black text-brand-darkblue">
                                    </div>
                                    <div class="space-y-1.5">
                                        <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Suhu
                                            (celcius)</label>
                                        <input type="number" step="0.1" name="suhu"
                                            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black text-brand-darkblue">
                                    </div>
                                    <div class="space-y-1.5">
                                        <label class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Resp
                                            (x/mnt)</label>
                                        <input type="number" name="respirasi"
                                            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black text-brand-darkblue">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Pemeriksaan Lain</td>
                                <td class="text-center font-bold text-gray-300">:</td>
                                <td class="space-y-4">
                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                                        <div class="space-y-1.5">
                                            <label
                                                class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Gangguan
                                                Motorik</label>
                                            <div class="flex items-center gap-4 mt-2">
                                                <label class="flex items-center gap-2 cursor-pointer group">
                                                    <input type="radio" name="gangguan_motorik" value="Ada"
                                                        class="w-4 h-4 text-brand-blue focus:ring-brand-blue border-gray-300">
                                                    <span
                                                        class="text-xs font-bold text-gray-700 group-hover:text-brand-blue">ADA</span>
                                                </label>
                                                <label class="flex items-center gap-2 cursor-pointer group">
                                                    <input type="radio" name="gangguan_motorik" value="Tidak" checked
                                                        class="w-4 h-4 text-brand-blue focus:ring-brand-blue border-gray-300">
                                                    <span
                                                        class="text-xs font-bold text-gray-700 group-hover:text-brand-blue">TIDAK</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="space-y-1.5">
                                            <label
                                                class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Disabilitas</label>
                                            <div class="flex items-center gap-4 mt-2">
                                                <label class="flex items-center gap-2 cursor-pointer group">
                                                    <input type="radio" name="disabilitas" value="Ada"
                                                        class="w-4 h-4 text-brand-blue focus:ring-brand-blue border-gray-300">
                                                    <span
                                                        class="text-xs font-bold text-gray-700 group-hover:text-brand-blue">ADA</span>
                                                </label>
                                                <label class="flex items-center gap-2 cursor-pointer group">
                                                    <input type="radio" name="disabilitas" value="Tidak" checked
                                                        class="w-4 h-4 text-brand-blue focus:ring-brand-blue border-gray-300">
                                                    <span
                                                        class="text-xs font-bold text-gray-700 group-hover:text-brand-blue">TIDAK</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="space-y-1.5">
                                        <label
                                            class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Keterangan
                                            Lainnya</label>
                                        <input type="text" name="keterangan_lainnya"
                                            placeholder="Catatan tambahan (opsional)..."
                                            class="w-full bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black text-brand-darkblue focus:border-brand-blue">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Kesimpulan & Buta
                                    Warna
                                </td>
                                <td class="text-center font-bold text-gray-300">:</td>
                                <td>
                                    <div
                                        class="w-full bg-blue-50 border border-blue-100 rounded-xl px-4 py-3 text-xs font-bold text-blue-600 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Kesimpulan Klinis (Sehat/Tidak) dan Status Buta Warna diisi manual oleh Dokter
                                        Pemeriksa pada lembar cetak (Coret yang tidak perlu).
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Judul Cetak</td>
                                <td class="text-center font-bold text-gray-300">:</td>
                                <td>
                                    <div class="flex flex-wrap gap-6">
                                        @foreach(['Sehat' => 'SURAT KET. SEHAT', 'Sehat Fisik' => 'KET. SEHAT FISIK', 'Sehat Jasmani' => 'KET. SEHAT JASMANI'] as $val => $lbl)
                                            <label class="flex items-center gap-2.5 cursor-pointer group">
                                                <input type="checkbox" name="format_cetak[]" value="{{ $val }}" {{ $val == 'Sehat' ? 'checked' : '' }}
                                                    class="w-4 h-4 rounded text-brand-blue focus:ring-brand-blue border-gray-300">
                                                <span
                                                    class="text-[10px] font-black text-gray-500 uppercase tracking-widest group-hover:text-brand-blue transition-colors">{{ $lbl }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                    <p
                                        class="text-[10px] text-brand-orange mt-2 font-bold italic tracking-wide flex items-center gap-2 animate__animated animate__fadeInUp">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Anda dapat memilih lebih dari satu judul untuk menerbitkan beberapa surat sekaligus.
                                    </p>
                                </td>
                            </tr>
                        </tbody>

                        <!-- Section: JIWA / NARKOBA / OTHER (Sama seperti sebelumnya tapi dibersihkan) -->
                        <tbody id="section_jiwa" class="hidden animate__animated animate__fadeIn">
                            <tr class="border-t border-gray-100">
                                <td colspan="3" class="pt-10 pb-4">
                                    <h3 class="text-sm font-black text-brand-blue uppercase tracking-widest">Pemeriksaan
                                        Kesehatan Jiwa</h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Tanggal Periksa</td>
                                <td class="text-center font-bold text-gray-300">:</td>
                                <td><input type="date" name="pada_tanggal_jiwa" value="{{ date('Y-m-d') }}"
                                        class="w-full bg-white border border-gray-400 rounded-xl px-5 py-3.5 text-sm font-bold">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Hasil Diagnostik</td>
                                <td class="text-center font-bold text-gray-300">:</td>
                                <td><textarea name="hasil_jiwa" rows="3"
                                        class="w-full bg-white border border-gray-400 rounded-xl px-5 py-3.5 text-sm font-bold focus:border-brand-blue outline-none resize-none"
                                        placeholder="Tuliskan hasil evaluasi psikologis..."></textarea></td>
                            </tr>
                            <tr>
                                <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Saran Dokter</td>
                                <td class="text-center font-bold text-gray-300">:</td>
                                <td><textarea name="saran_jiwa" rows="2"
                                        class="w-full bg-white border border-gray-400 rounded-xl px-5 py-3.5 text-sm font-bold focus:border-brand-blue outline-none resize-none"
                                        placeholder="Anjuran tindak lanjut..."></textarea></td>
                            </tr>
                        </tbody>

                        <tbody id="section_narkoba" class="hidden animate__animated animate__fadeIn">
                            <tr class="border-t border-gray-100">
                                <td colspan="3" class="pt-10 pb-4">
                                    <h3 class="text-sm font-black text-brand-blue uppercase tracking-widest">Evaluasi Bebas
                                        Narkoba (Toxicology)</h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Panel 6-Parameter
                                </td>
                                <td class="text-center font-bold text-gray-300">:</td>
                                <td
                                    class="grid grid-cols-2 lg:grid-cols-3 gap-6 p-8 bg-gray-50/50 rounded-3xl border border-gray-100">
                                    @foreach(['morphine', 'canabinoid', 'amphetamine', 'benzodiazepine', 'metamfetamin', 'cocaine'] as $drug)
                                        <div class="flex flex-col gap-2.5">
                                            <span
                                                class="text-[9px] font-black text-gray-400 uppercase tracking-widest">{{ $drug }}</span>
                                            <div class="flex gap-4">
                                                <label
                                                    class="flex items-center gap-2 cursor-pointer text-[10px] font-black text-gray-600"><input
                                                        type="radio" name="{{ $drug }}" value="Positif"
                                                        class="w-3 h-3 text-red-500"> POSITIF</label>
                                                <label
                                                    class="flex items-center gap-2 cursor-pointer text-[10px] font-black text-gray-600"><input
                                                        type="radio" name="{{ $drug }}" value="Negatif" checked
                                                        class="w-3 h-3 text-green-500"> NEGATIF</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Keperluan Khusus</td>
                                <td class="text-center font-bold text-gray-300">:</td>
                                <td><input type="text" name="dipergunakan_untuk" placeholder="Instansi / Tujuan..."
                                        class="w-full bg-white border border-gray-400 rounded-xl px-5 py-4 text-sm font-bold">
                                </td>
                            </tr>
                        </tbody>

                        <!-- POLI SPESIALIS (Mata, THT, Gigi, Jantung, Paru, Dalam, Ortho) -->
                        @include('admin.partials.form_poli')

                        <!-- Shared Administration Section -->
                        <tr class="border-t border-gray-100">
                            <td colspan="3" class="pt-12 pb-4">
                                <div class="flex items-center gap-4">
                                    <h3 class="text-sm font-black text-gray-400 uppercase tracking-widest">Administrasi &
                                        Pengesahan</h3>
                                    <div class="flex-1 h-px bg-gray-100"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Input Keperluan</td>
                            <td class="text-center font-bold text-gray-300">:</td>
                            <td>
                                <input type="text" name="keperluan" id="input_keperluan"
                                    placeholder="Misal: Persyaratan mendaftar CPNS..."
                                    class="w-full bg-white border border-gray-400 rounded-2xl px-5 py-4 text-sm font-bold text-brand-darkblue focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue outline-none transition-all">
                            </td>
                        </tr>

                        <tr>
                            <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Validasi Dokumen</td>
                            <td class="text-center font-bold text-gray-300">:</td>
                            <td class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <div class="space-y-3">
                                    <div class="flex items-center gap-2 ml-1">
                                        <input type="checkbox" id="use_nomor" checked
                                            class="w-4 h-4 rounded-md border-gray-300 text-brand-blue focus:ring-brand-blue transition-all cursor-pointer">
                                        <label for="use_nomor"
                                            class="text-[10px] font-black text-gray-500 uppercase tracking-widest cursor-pointer select-none">Otomatis
                                            Nomor Surat</label>
                                    </div>
                                    <input type="text" name="nomor_surat" id="nomor_surat_input" value="{{ $next_nomor }}"
                                        class="w-full bg-white border border-gray-400 rounded-2xl px-5 py-4 text-xs font-black text-brand-darkblue focus:border-brand-blue outline-none transition-all tracking-wider">
                                </div>
                                <div class="space-y-3">
                                    <label
                                        class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Tanggal
                                        Terbit</label>
                                    <input type="date" name="tanggal_cetak" value="{{ date('Y-m-d') }}"
                                        class="w-full bg-white border border-gray-400 rounded-2xl px-5 py-4 text-sm font-bold text-brand-darkblue focus:border-brand-blue outline-none transition-all">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Dokter Pemeriksa</td>
                            <td class="text-center font-bold text-gray-300">:</td>
                            <td>
                                <div class="flex flex-col gap-4">
                                    <div class="relative group">
                                        <select name="dokter_id" id="dokter_select"
                                            class="w-full bg-white border border-gray-400 rounded-2xl px-5 py-4 font-black text-brand-darkblue focus:border-brand-blue outline-none appearance-none cursor-pointer">
                                            @foreach($dokters as $d)
                                                <option value="{{ $d->id }}" data-spesialis="{{ $d->spesialis }}">
                                                    {{ $d->nama_dokter }} ({{ $d->spesialis }})
                                                </option>
                                            @endforeach
                                        </select>
                                        <div
                                            class="absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400 group-focus-within:text-brand-blue">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-6 ml-1">
                                        <label class="flex items-center gap-2.5 cursor-pointer group">
                                            <input type="radio" name="identitas_pemeriksa" value="NIP" checked
                                                class="identitas_radio w-4 h-4 text-brand-blue focus:ring-brand-blue border-gray-300">
                                            <span
                                                class="text-[10px] font-black text-gray-500 uppercase tracking-widest group-hover:text-brand-blue transition-colors">Tampilkan
                                                NIP</span>
                                        </label>
                                        <label class="flex items-center gap-2.5 cursor-pointer group">
                                            <input type="radio" name="identitas_pemeriksa" value="SIP"
                                                class="identitas_radio w-4 h-4 text-brand-blue focus:ring-brand-blue border-gray-300">
                                            <span
                                                class="text-[10px] font-black text-gray-500 uppercase tracking-widest group-hover:text-brand-blue transition-colors">Tampilkan
                                                SIP</span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <div class="pt-12 border-t border-gray-50 flex gap-6 mt-12">
                        <button type="submit"
                            class="flex-1 bg-brand-blue text-white py-5 rounded-2xl font-black uppercase tracking-[0.2em] shadow-xl shadow-brand-blue/20 hover:bg-brand-darkblue hover:-translate-y-1 transition-all duration-300">
                            SIMPAN & TERBITKAN
                        </button>
                        <a href="{{ url('/admin/buat-surat') }}"
                            class="px-12 bg-gray-100 text-gray-500 py-5 rounded-2xl font-black uppercase tracking-[0.2em] hover:bg-gray-200 transition-all">
                            BATAL
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <script>
            document.querySelector('form').addEventListener('submit', function (e) {
                const btn = this.querySelector('button[type="submit"]');
                btn.innerHTML = `
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                MENYIMPAN...
                            `;
                btn.classList.add('opacity-75', 'cursor-not-allowed');
                btn.setAttribute('disabled', 'true');
            });
        </script>
    </div>
@endsection

@push('scripts')
    <script>
        window.suratConfig = {
            nextNomor: "{{ $next_nomor }}",
            selectedId: "{{ $selected_id ?? '' }}",
            isEdit: false
        };

        // Handle validation errors via SweetAlert
        @if ($errors->any())
            document.addEventListener('DOMContentLoaded', function () {
                const errorHtml = `@foreach($errors->all() as $error)<p class="text-red-600 mb-2 flex items-center gap-2"><span class="w-1.5 h-1.5 bg-red-500 rounded-full shrink-0"></span> {{ $error }}</p>@endforeach`;
                showErrorAlert('Gagal Menyimpan', errorHtml);
            });
        @endif
    </script>
    <script src="{{ asset('js/admin/surat-form.js') }}"></script>
@endpush