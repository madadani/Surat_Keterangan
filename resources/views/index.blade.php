@extends('layouts.public')

@section('content')
    <div class="relative bg-brand-darkblue overflow-hidden">
        <!-- Animated Background Decor -->
        <div class="absolute inset-0 z-0 opacity-50">
            <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-brand-green/10 blur-[60px] rounded-full">
            </div>
            <div class="absolute bottom-0 right-[-10%] w-[50%] h-[50%] bg-brand-blue/10 blur-[80px] rounded-full"></div>
            <div class="absolute top-[20%] right-[10%] w-[30%] h-[30%] bg-brand-orange/5 blur-[40px] rounded-full"></div>
            <div
                class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10 mix-blend-overlay">
            </div>
        </div>

        <!-- Hero Header -->
        <div class="relative z-10 pt-16 pb-10 px-4">
            <div class="max-w-4xl mx-auto text-center">

                <h1
                    class="text-3xl md:text-5xl font-outfit font-black text-white mb-4 uppercase tracking-tight animate__animated animate__zoomIn animate__faster">
                    Form <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-brand-green via-brand-blue to-brand-orange">Pendaftaran
                        Surat</span>
                    Keterangan
                </h1>
                <p
                    class="text-white/60 text-base md:text-lg font-medium max-w-2xl mx-auto leading-relaxed animate__animated animate__fadeInUp animate__faster uppercase tracking-wide">
                    Silahkan isi data anda dengan benar (data akan tercetak di surat keterangan) dan pilih jenis test yang
                    akan anda ikuti (bisa memilih lebih dari satu).
                </p>
            </div>
        </div>

        <!-- Main Card Container -->
        <div class="relative z-10 max-w-4xl mx-auto px-4 pb-4">
            <div
                class="bg-white/[0.04] border border-white/10 rounded-[3rem] p-1 shadow-2xl overflow-hidden animate__animated animate__fadeInUp animate__faster">
                <div class="bg-white/90 rounded-[2.8rem] overflow-hidden shadow-inner">
                    <!-- Card Header -->
                    <div class="p-6 md:p-10 bg-gradient-to-br from-brand-darkblue to-brand-blue relative">
                        <div
                            class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/asfalt-dark.png')] opacity-10">
                        </div>
                        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-14 h-14 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/20 shadow-xl group hover:scale-110 transition-transform duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-brand-green" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-2xl font-black text-white uppercase tracking-tight">Formulir Pasien</h2>
                                    <p class="text-brand-green font-bold text-[10px] uppercase tracking-[0.2em] mt-0.5">
                                        Lengkapi data
                                        sesuai KTP</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Content -->
                    <form action="{{ url('/pendaftaran/simpan') }}" method="POST" class="p-5 md:p-8">
                        @csrf
                        <div class="grid grid-cols-1 gap-7">
                            <!-- Section 1: Identitas -->
                            <div class="space-y-5">
                                <div class="flex items-center gap-4">
                                    <span
                                        class="w-8 h-8 rounded-full bg-brand-green/10 text-brand-green flex items-center justify-center font-black text-sm">01</span>
                                    <h3 class="font-black text-brand-darkblue uppercase tracking-widest text-sm">Informasi
                                        Identitas
                                    </h3>
                                    <div class="flex-1 h-[1px] bg-slate-100"></div>
                                </div>

                                <div class="space-y-2 group">
                                    <label
                                        class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1 transition-colors group-focus-within:text-brand-green">Nama
                                        Lengkap Pasien</label>
                                    <div class="relative">
                                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required
                                            class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-5 py-3 font-bold text-brand-darkblue focus:bg-white focus:border-brand-green focus:shadow-xl focus:shadow-brand-green/10 outline-none transition-all duration-200 @error('nama_lengkap') border-red-500 @enderror"
                                            placeholder="NAMA LENGKAP SESUAI KTP">
                                        <div class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                    </div>
                                    @error('nama_lengkap') <span
                                        class="text-red-500 text-[9px] font-bold uppercase ml-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <label
                                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Tempat
                                            Lahir</label>
                                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required
                                            class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-5 py-3 font-bold text-brand-darkblue focus:bg-white focus:border-brand-green outline-none transition-all duration-300 shadow-sm focus:shadow-md @error('tempat_lahir') border-red-500 @enderror"
                                            placeholder="CONTOH: SRAGEN">
                                        @error('tempat_lahir') <span
                                            class="text-red-500 text-[9px] font-bold uppercase ml-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="space-y-2">
                                        <label
                                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Tanggal
                                            Lahir</label>
                                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                                            class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-5 py-3 font-bold text-brand-darkblue focus:bg-white focus:border-brand-green outline-none transition-all duration-300 shadow-sm focus:shadow-md @error('tanggal_lahir') border-red-500 @enderror">
                                        @error('tanggal_lahir') <span
                                            class="text-red-500 text-[9px] font-bold uppercase ml-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <label
                                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Jenis
                                            Kelamin</label>
                                        <input type="hidden" name="gender" id="gender-hidden" value="{{ old('gender') }}">
                                        <div class="flex gap-4">
                                            <button type="button" id="btn-laki" onclick="setGenderVal('Laki-laki')"
                                                class="btn-gender flex-1 py-3 px-4 flex items-center justify-center gap-2 border-2 rounded-2xl font-bold text-[10px] transition-all shadow-sm uppercase tracking-wider active:scale-95">
                                                <div
                                                    class="w-4 h-4 rounded-full border flex items-center justify-center transition-all duration-200 gender-icon bg-white text-slate-300 border-slate-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-2.5 w-2.5" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="4" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <span>LAKI-LAKI</span>
                                            </button>
                                            <button type="button" id="btn-perempuan" onclick="setGenderVal('Perempuan')"
                                                class="btn-gender flex-1 py-3 px-4 flex items-center justify-center gap-2 border-2 rounded-2xl font-bold text-[10px] transition-all shadow-sm uppercase tracking-wider active:scale-95">
                                                <div
                                                    class="w-4 h-4 rounded-full border flex items-center justify-center transition-all duration-200 gender-icon bg-white text-slate-300 border-slate-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-2.5 w-2.5" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="4" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <span>PEREMPUAN</span>
                                            </button>
                                        </div>
                                        @error('gender') <span
                                            class="text-red-500 text-[9px] font-bold uppercase ml-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="space-y-2">
                                        <label
                                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nomor
                                            WhatsApp Aktif</label>
                                        <div class="relative">
                                            <input type="tel" name="no_hp" value="{{ old('no_hp') }}" required
                                                class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-5 py-3 font-bold text-brand-darkblue focus:bg-white focus:border-brand-green outline-none transition-all duration-300 pl-12 shadow-sm focus:shadow-md @error('no_hp') border-red-500 @enderror"
                                                placeholder="08XXXXXXXXXX">
                                            <div
                                                class="absolute left-5 top-1/2 -translate-y-1/2 font-black text-brand-green text-sm">
                                                +62</div>
                                        </div>
                                        @error('no_hp') <span
                                            class="text-red-500 text-[9px] font-bold uppercase ml-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Section 2: Fisik & Profesi -->
                            <div class="space-y-5 pt-2">
                                <div class="flex items-center gap-4">
                                    <span
                                        class="w-8 h-8 rounded-full bg-brand-blue/10 text-brand-blue flex items-center justify-center font-black text-sm">02</span>
                                    <h3 class="font-black text-brand-darkblue uppercase tracking-widest text-sm">Fisik &
                                        Profesi</h3>
                                    <div class="flex-1 h-[1px] bg-slate-100"></div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <div class="space-y-2">
                                        <label
                                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Tinggi
                                            Badan
                                            (cm)</label>
                                        <input type="number" name="tinggi_badan" value="{{ old('tinggi_badan') }}" required
                                            class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-6 py-3 font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue outline-none transition-all duration-300 shadow-sm focus:shadow-md @error('tinggi_badan') border-red-500 @enderror">
                                        @error('tinggi_badan') <span
                                            class="text-red-500 text-[9px] font-bold uppercase ml-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="space-y-2">
                                        <label
                                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Berat
                                            Badan
                                            (kg)</label>
                                        <input type="number" name="berat_badan" value="{{ old('berat_badan') }}" required
                                            class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-6 py-3 font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue outline-none transition-all duration-300 shadow-sm focus:shadow-md @error('berat_badan') border-red-500 @enderror">
                                        @error('berat_badan') <span
                                            class="text-red-500 text-[9px] font-bold uppercase ml-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <div class="space-y-2">
                                        <label
                                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Pekerjaan</label>
                                        <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" required
                                            class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-6 py-3 font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue outline-none transition-all duration-300 shadow-sm focus:shadow-md @error('pekerjaan') border-red-500 @enderror">
                                        @error('pekerjaan') <span
                                            class="text-red-500 text-[9px] font-bold uppercase ml-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="space-y-2">
                                        <label
                                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Pendidikan
                                            Terakhir</label>
                                        <input type="text" name="pendidikan" value="{{ old('pendidikan') }}" required
                                            class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-6 py-3 font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue outline-none transition-all duration-300 shadow-sm focus:shadow-md @error('pendidikan') border-red-500 @enderror">
                                        @error('pendidikan') <span
                                            class="text-red-500 text-[9px] font-bold uppercase ml-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Section 3: Keperluan & Alamat -->
                            <div class="space-y-5 pt-2">
                                <div class="flex items-center gap-4">
                                    <span
                                        class="w-8 h-8 rounded-full bg-brand-orange/10 text-brand-orange flex items-center justify-center font-black text-sm">03</span>
                                    <h3 class="font-black text-brand-darkblue uppercase tracking-widest text-sm">Alamat &
                                        Keperluan</h3>
                                    <div class="flex-1 h-[1px] bg-slate-100"></div>
                                </div>

                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Keperluan
                                        Pembuatan Surat</label>
                                    <input type="text" name="keperluan" value="{{ old('keperluan') }}" required
                                        class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-6 py-3 font-bold text-brand-darkblue focus:bg-white focus:border-brand-orange outline-none transition-all duration-300 shadow-sm focus:shadow-md @error('keperluan') border-red-500 @enderror"
                                        placeholder="CONTOH: MELAMAR PEKERJAAN">
                                    @error('keperluan') <span
                                        class="text-red-500 text-[9px] font-bold uppercase ml-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Alamat
                                        Lengkap
                                        Sesuai KTP</label>
                                    <textarea name="alamat" rows="2" required
                                        class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-6 py-3 font-bold text-brand-darkblue focus:bg-white focus:border-brand-orange outline-none transition-all duration-300 shadow-sm focus:shadow-md resize-none @error('alamat') border-red-500 @enderror">{{ old('alamat') }}</textarea>
                                    @error('alamat') <span
                                        class="text-red-500 text-[9px] font-bold uppercase ml-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Section 4: Pemeriksaan -->
                            <div class="space-y-5 pt-2">
                                <div
                                    class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-brand-darkblue p-6 rounded-[2rem] border border-white/5 shadow-xl relative overflow-hidden">
                                    <div class="absolute inset-0 bg-gradient-to-r from-brand-green/20 to-transparent"></div>
                                    <div class="relative z-10">
                                        <h3 class="font-black text-white uppercase tracking-widest text-sm">Pilih Jenis
                                            Pemeriksaan</h3>
                                        <p class="text-white/40 text-[10px] font-bold uppercase tracking-widest mt-1">Anda
                                            dapat memilih
                                            lebih dari satu layanan</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                                    @foreach($prices as $price)
                                        <label class="group relative cursor-pointer">
                                            <input type="checkbox" name="jenis_test[]" value="{{ $price->test_name }}"
                                                data-price="{{ $price->price }}" 
                                                data-max-price="{{ $price->max_price ?: $price->price }}"
                                                class="peer opacity-0 absolute test-checkbox"
                                                {{ is_array(old('jenis_test')) && in_array($price->test_name, old('jenis_test')) ? 'checked' : '' }}>
                                            <div
                                                class="flex flex-row items-center gap-3 p-3 bg-white border-2 border-slate-200 rounded-2xl transition-all duration-200 peer-checked:bg-brand-green peer-checked:text-white peer-checked:border-brand-green peer-checked:shadow-[0_15px_30px_-10px_rgba(0,200,83,0.3)] peer-checked:-translate-y-1 group-hover:border-brand-green/30 active:scale-[0.98] shadow-sm">
                                                <div
                                                    class="w-5 h-5 shrink-0 border-2 border-slate-100 rounded-full flex items-center justify-center transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)] bg-white text-slate-200 peer-checked:text-brand-green peer-checked:border-white peer-checked:scale-110 group-hover:border-brand-green/20">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <div class="flex flex-col min-h-[auto] justify-center overflow-hidden">
                                                    <span
                                                        class="text-[9px] font-black text-slate-500 uppercase tracking-tight peer-checked:text-white transition-colors leading-none truncate">{{ $price->test_name }}</span>
                                                </div>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                                @error('jenis_test') <span
                                class="text-red-500 text-[9px] font-bold uppercase ml-1">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Submit Container -->
                        <div
                            class="mt-12 pt-8 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-8">
                            <div class="flex items-center gap-6">
                                <div
                                    class="w-14 h-14 rounded-2xl bg-slate-50 flex items-center justify-center text-brand-green border-2 border-slate-100 shadow-sm shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="flex flex-col">
                                    <span
                                        class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Estimasi
                                        Total
                                        Biaya</span>
                                    <div class="flex items-baseline gap-1.5">
                                        <span class="text-lg font-black text-brand-gray/40">Rp</span>
                                        <span id="js-total-price"
                                            class="text-3xl font-black text-brand-darkblue tracking-tight">0</span>
                                    </div>
                                </div>
                            </div>

                            <div class="relative group w-full sm:w-auto">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-brand-green via-brand-blue to-brand-orange rounded-[2rem] blur opacity-25 group-hover:opacity-75 transition duration-500 group-hover:duration-200">
                                </div>
                                <button type="submit"
                                    class="relative w-full sm:w-auto px-12 bg-brand-darkblue text-white py-6 rounded-[1.5rem] font-black uppercase tracking-[0.4em] text-sm shadow-2xl hover:bg-brand-green transition-all duration-200 flex items-center justify-center gap-4 group overflow-hidden">
                                    <span class="relative z-10">Kirim Pendaftaran</span>

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 relative z-10 animate-bounce-x"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:animate-shimmer">
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let selectedGender = '{{ old('gender') }}';

        function setGenderVal(val) {
            const input = document.getElementById('gender-hidden');
            const btns = document.querySelectorAll('.btn-gender');
            const btnLaki = document.getElementById('btn-laki');
            const btnPerempuan = document.getElementById('btn-perempuan');

            btns.forEach(b => {
                b.classList.remove('bg-brand-green', 'text-white', 'border-brand-green');
                b.classList.add('bg-white', 'text-slate-500', 'border-slate-300');
                const icon = b.querySelector('.gender-icon');
                if (icon) {
                    icon.classList.remove('bg-white', 'text-brand-green', 'border-white', 'scale-110');
                    icon.classList.add('bg-white', 'text-slate-300', 'border-slate-200');
                }
            });

            if (selectedGender === val) {
                selectedGender = null;
                input.value = '';
            } else {
                selectedGender = val;
                input.value = val;

                const activeBtn = (val === 'Laki-laki') ? btnLaki : btnPerempuan;
                activeBtn.classList.add('bg-brand-green', 'text-white', 'border-brand-green');
                activeBtn.classList.remove('bg-white', 'text-slate-500', 'border-slate-300');

                const activeIcon = activeBtn.querySelector('.gender-icon');
                if (activeIcon) {
                    activeIcon.classList.remove('text-slate-300', 'border-slate-200');
                    activeIcon.classList.add('bg-white', 'text-brand-green', 'border-white', 'scale-110');
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('.test-checkbox');
            const totalDisplay = document.getElementById('js-total-price');

            function updateTotal() {
                let minTotal = 0;
                let maxTotal = 0;
                document.querySelectorAll('.test-checkbox:checked').forEach(cb => {
                    minTotal += parseInt(cb.getAttribute('data-price')) || 0;
                    maxTotal += parseInt(cb.getAttribute('data-max-price')) || 0;
                });
                
                if (maxTotal > minTotal) {
                    totalDisplay.innerText = new Intl.NumberFormat('id-ID').format(minTotal) + ' - ' + new Intl.NumberFormat('id-ID').format(maxTotal);
                } else {
                    totalDisplay.innerText = new Intl.NumberFormat('id-ID').format(minTotal);
                }
            }

            checkboxes.forEach(cb => {
                cb.addEventListener('change', updateTotal);
            });

            updateTotal();

            if (selectedGender) {
                const btn = (selectedGender === 'Laki-laki') ? document.getElementById('btn-laki') : document.getElementById('btn-perempuan');
                if (btn) {
                    btn.classList.add('bg-brand-green', 'text-white', 'border-brand-green');
                    btn.classList.remove('bg-white', 'text-slate-500', 'border-slate-300');
                    const icon = btn.querySelector('.gender-icon');
                    if (icon) {
                        icon.classList.remove('text-slate-300', 'border-slate-200');
                        icon.classList.add('bg-white', 'text-brand-green', 'border-white', 'scale-110');
                    }
                }
            }
        });
    </script>

    <style>
        @keyframes shimmer {
            100% {
                transform: translateX(100%);
            }
        }

        .animate-shimmer {
            animation: shimmer 1.5s infinite linear;
        }

        @keyframes bounce-x {

            0%,
            100% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(3px);
            }
        }

        .animate-bounce-x {
            animation: bounce-x 0.6s infinite ease-in-out;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(30%) sepia(100%) saturate(500%) hue-rotate(180deg);
            cursor: pointer;
        }
    </style>
@endsection

@push('scripts')
    <script>
        function toggleGender(current) {
            if (current.checked) {
                document.querySelectorAll('.gender-checkbox').forEach(cb => {
                    if (cb !== current) cb.checked = false;
                });
            }
        }

        function updatePriceSummary() {
            const checkboxes = document.querySelectorAll('.test-checkbox:checked');
            let minTotal = 0;
            let maxTotal = 0;
            checkboxes.forEach(cb => {
                minTotal += parseInt(cb.getAttribute('data-price')) || 0;
                maxTotal += parseInt(cb.getAttribute('data-max-price')) || 0;
            });
            const totalDisplay = document.getElementById('total-estimation');
            if (totalDisplay) {
                if (maxTotal > minTotal) {
                    totalDisplay.innerText = new Intl.NumberFormat('id-ID').format(minTotal) + ' - ' + new Intl.NumberFormat('id-ID').format(maxTotal);
                } else {
                    totalDisplay.innerText = new Intl.NumberFormat('id-ID').format(minTotal);
                }
            }
        }
        document.addEventListener('DOMContentLoaded', updatePriceSummary);
    </script>
@endpush