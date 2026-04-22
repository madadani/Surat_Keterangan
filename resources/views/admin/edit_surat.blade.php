@extends('layouts.admin')

@section('title', 'Edit Berkas Surat')

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
                <h2 class="text-sm lg:text-2xl font-black text-brand-darkblue tracking-tight truncate uppercase">Edit Data
                    Berkas</h2>
                <p class="text-[8px] lg:text-xs text-brand-gray font-medium truncate uppercase tracking-widest mt-0.5">
                    Perbarui hasil pemeriksaan medisp pasien</p>
            </div>
        </div>

        <a href="{{ url('/admin/data-surat') }}"
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
            <form action="{{ url('/admin/buat-surat/update/' . $surat->id) }}" method="POST"
                class="bg-white rounded-[2.5rem] shadow-2xl shadow-blue-900/5 border border-gray-100 overflow-hidden mb-20 animate__animated animate__fadeIn">
                @csrf
                <input type="hidden" name="redirect_to" value="{{ $redirect_to ?? '' }}">

                <div class="p-8 lg:p-12">
                    <table class="w-full border-separate border-spacing-y-6">
                        <!-- Identitas Pasien (Readonly in Edit) -->
                        <tr>
                            <td class="w-1/3 text-xs font-black text-gray-400 uppercase tracking-widest">Data Pemohon</td>
                            <td class="w-4 text-center font-bold text-gray-300">:</td>
                            <td>
                                <div
                                    class="bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4 flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-10 h-10 bg-brand-blue rounded-xl flex items-center justify-center text-white font-black uppercase shadow-lg shadow-brand-blue/20">
                                            {{ substr($surat->pendaftar->nama_lengkap, 0, 1) }}
                                        </div>
                                        <div>
                                            <span
                                                class="font-black text-brand-darkblue uppercase block leading-none">{{ $surat->pendaftar->nama_lengkap }}</span>
                                            <span
                                                class="text-[10px] font-black text-brand-blue uppercase tracking-widest">REG:
                                                #{{ $surat->pendaftar->no_registrasi }}</span>
                                        </div>
                                    </div>
                                    <input type="hidden" name="pendaftar_id" value="{{ $surat->pendaftar_id }}">
                                </div>
                            </td>
                        </tr>

                        <!-- Tipe Berkas -->
                        <tr>
                            <td class="text-xs font-black text-brand-blue uppercase tracking-widest">Jenis Surat</td>
                            <td class="text-center font-bold text-gray-300">:</td>
                            <td>
                                <div class="bg-brand-blue/5 border border-brand-blue/10 rounded-2xl px-5 py-4">
                                    <span class="text-sm font-black text-brand-blue uppercase tracking-wider">SURAT
                                        KETERANGAN {{ $surat->tipe_berkas }}</span>
                                    <input type="hidden" name="tipe_berkas" value="{{ $surat->tipe_berkas }}">
                                </div>
                            </td>
                        </tr>

                        <!-- Identitas Detail (Readonly) -->
                        <tr>
                            <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Detail Identitas</td>
                            <td class="text-center font-bold text-gray-300">:</td>
                            <td class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="space-y-1.5">
                                    <label
                                        class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">TTL</label>
                                    <div
                                        class="bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-xs font-bold text-gray-500 uppercase">
                                        {{ $surat->pendaftar->tempat_lahir }},
                                        {{ \Carbon\Carbon::parse($surat->pendaftar->tanggal_lahir)->format('d F Y') }}
                                    </div>
                                </div>
                                <div class="space-y-1.5">
                                    <label
                                        class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Gender</label>
                                    <div
                                        class="bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-xs font-bold text-gray-500 uppercase">
                                        {{ $surat->pendaftar->jenis_kelamin }}
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Editable Personal Data -->
                        <tr>
                            <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Pekerjaan & Pendidikan
                            </td>
                            <td class="text-center font-bold text-gray-300">:</td>
                            <td class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" name="pekerjaan" value="{{ $surat->pekerjaan }}"
                                    class="bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black text-brand-darkblue focus:border-brand-blue outline-none transition-all">
                                <input type="text" name="pendidikan" value="{{ $surat->pendidikan }}"
                                    class="bg-white border border-gray-400 rounded-xl px-4 py-3 text-xs font-black text-brand-darkblue focus:border-brand-blue outline-none transition-all">
                            </td>
                        </tr>

                        <!-- DYNAMIC SECTIONS BASED ON TYPE -->
                        @if($surat->tipe_berkas == 'Kesehatan')
                            @include('admin.partials.edit_sections.kesehatan')
                        @elseif($surat->tipe_berkas == 'Dalam')
                            @include('admin.partials.edit_sections.dalam')
                        @elseif(in_array($surat->tipe_berkas, ['Orthopedi', 'Ortopedi']))
                            @include('admin.partials.edit_sections.orthopedi')
                        @elseif($surat->tipe_berkas == 'Kesehatan Jiwa')
                            @include('admin.partials.edit_sections.jiwa')
                        @elseif($surat->tipe_berkas == 'Bebas Narkoba')
                            @include('admin.partials.edit_sections.narkoba')
                        @elseif(str_contains($surat->tipe_berkas, 'Mata'))
                            @include('admin.partials.edit_sections.mata')
                        @elseif(str_contains($surat->tipe_berkas, 'THT'))
                            @include('admin.partials.edit_sections.tht')
                        @elseif(str_contains($surat->tipe_berkas, 'Gigi'))
                            @include('admin.partials.edit_sections.gigi')
                        @elseif(str_contains($surat->tipe_berkas, 'Jantung'))
                            @include('admin.partials.edit_sections.jantung')
                        @elseif($surat->tipe_berkas == 'Kesehatan TKHI')
                            @include('admin.partials.edit_sections.tkhi')
                        @elseif($surat->tipe_berkas == 'Resume MCU')
                            @include('admin.partials.edit_sections.resume_mcu')
                        @elseif(str_contains($surat->tipe_berkas, 'Kesehatan ') || in_array($surat->tipe_berkas, ['Paru']))
                            @include('admin.partials.edit_sections.spesialis')
                        @endif

                        <!-- Common Admin Section -->
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
                            <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Keperluan</td>
                            <td class="text-center font-bold text-gray-300">:</td>
                            <td>
                                <input type="text" name="keperluan" id="input_keperluan" value="{{ $surat->keperluan }}"
                                    class="w-full bg-white border border-gray-400 rounded-2xl px-5 py-4 text-sm font-bold text-brand-darkblue focus:border-brand-blue outline-none transition-all">
                            </td>
                        </tr>

                        <tr>
                            <td class="text-xs font-black text-gray-400 uppercase tracking-widest">Validasi Dokumen</td>
                            <td class="text-center font-bold text-gray-300">:</td>
                            <td class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <div class="space-y-1.5">
                                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-widest ml-1">Nomor
                                        Surat</label>
                                    <input type="text" name="nomor_surat" value="{{ $surat->nomor_surat }}"
                                        class="w-full bg-yellow-50/50 border border-yellow-100 rounded-2xl px-5 py-4 text-xs font-black text-yellow-700 focus:border-yellow-400 outline-none transition-all tracking-wider">
                                </div>
                                <div class="space-y-1.5">
                                    <label
                                        class="text-[9px] font-black text-gray-400 uppercase tracking-widest ml-1">Tanggal
                                        Terbit</label>
                                    <input type="date" name="tanggal_cetak" value="{{ $surat->tanggal_cetak }}"
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
                                        <select name="dokter_id" id="dokter_select" required
                                            class="w-full bg-white border border-gray-400 rounded-2xl px-5 py-4 font-black text-brand-darkblue focus:border-brand-blue outline-none appearance-none cursor-pointer">
                                            @foreach($dokters as $d)
                                                <option value="{{ $d->id }}" {{ $surat->dokter_id == $d->id ? 'selected' : '' }}
                                                    data-spesialis="{{ $d->spesialis }}">
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
                                            <input type="radio" name="identitas_pemeriksa" value="NIP" {{ ($surat->identitas_pemeriksa ?? 'NIP') == 'NIP' ? 'checked' : '' }}
                                                class="identitas_radio w-4 h-4 text-brand-blue focus:ring-brand-blue border-gray-300">
                                            <span
                                                class="text-[10px] font-black text-gray-500 uppercase tracking-widest group-hover:text-brand-blue transition-colors">Tampilkan
                                                NIP</span>
                                        </label>
                                        <label class="flex items-center gap-2.5 cursor-pointer group">
                                            <input type="radio" name="identitas_pemeriksa" value="SIP" {{ ($surat->identitas_pemeriksa ?? '') == 'SIP' ? 'checked' : '' }}
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
                            SIMPAN PERUBAHAN
                        </button>
                        <a href="{{ url('/admin/data-surat') }}"
                            class="px-12 bg-gray-100 text-gray-500 py-5 rounded-2xl font-black uppercase tracking-[0.2em] hover:bg-gray-200 transition-all text-center">
                            BATAL
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        window.suratConfig = {
            nextNomor: "{{ $surat->nomor_surat }}",
            selectedId: "{{ $surat->pendaftar_id }}",
            isEdit: true
        };
    </script>
    <script src="{{ asset('js/admin/surat-form.js') }}"></script>
    <script>
        // Force sync for Jiwa Saran on Edit Page
        document.addEventListener('DOMContentLoaded', function() {
            const inputKeperluan = document.getElementById('input_keperluan');
            const saranJiwa = document.getElementById('saran_jiwa_input');
            
            if (inputKeperluan && saranJiwa) {
                const sync = function() {
                    // Di halaman edit, kita tetap izinkan update saran jika user mengubah keperluan
                    const necessity = inputKeperluan.value;
                    const currentSaran = saranJiwa.value;
                    const marker = "dipergunakan sebagai ";
                    const pos = currentSaran.toLowerCase().indexOf(marker.toLowerCase());
                    
                    if (pos !== -1) {
                        saranJiwa.value = currentSaran.substring(0, pos + marker.length) + necessity;
                    } else if (currentSaran.includes('(keperluan)')) {
                        saranJiwa.value = currentSaran.replace('(keperluan)', necessity);
                    }
                };
                
                inputKeperluan.addEventListener('input', sync);
                inputKeperluan.addEventListener('keyup', sync);
                inputKeperluan.addEventListener('change', sync);
            }
        });
    </script>
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const errorHtml = `@foreach($errors->all() as $error)<p class="text-red-600 mb-2 flex items-center gap-2"><span class="w-1.5 h-1.5 bg-red-500 rounded-full shrink-0"></span> {{ $error }}</p>@endforeach`;
                showErrorAlert('Gagal Memperbarui', errorHtml);
            });
        </script>
    @endif
@endpush