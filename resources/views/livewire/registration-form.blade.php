<div class="bg-white/90 rounded-[2.8rem] overflow-hidden shadow-inner">
    <!-- Card Header -->
    <div class="p-6 md:p-10 bg-gradient-to-br from-brand-darkblue to-brand-blue relative">
        <div
            class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/asfalt-dark.png')] opacity-10">
        </div>
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <div
                    class="w-14 h-14 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/20 shadow-xl group hover:scale-110 transition-transform duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-brand-green" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-black text-white uppercase tracking-tight">Formulir Pasien</h2>
                    <p class="text-brand-green font-bold text-[10px] uppercase tracking-[0.2em] mt-0.5">Lengkapi data
                        sesuai KTP</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Content -->
    <form wire:submit.prevent="simpan" class="p-5 md:p-8">
        <div class="grid grid-cols-1 gap-7">
            <!-- Section 1: Identitas -->
            <div class="space-y-5">
                <div class="flex items-center gap-4">
                    <span
                        class="w-8 h-8 rounded-full bg-brand-green/10 text-brand-green flex items-center justify-center font-black text-sm">01</span>
                    <h3 class="font-black text-brand-darkblue uppercase tracking-widest text-sm">Informasi Identitas
                    </h3>
                    <div class="flex-1 h-[1px] bg-slate-100"></div>
                </div>

                <div class="space-y-2 group">
                    <label
                        class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1 transition-colors group-focus-within:text-brand-green">Nama
                        Lengkap Pasien</label>
                    <div class="relative">
                        <input type="text" wire:model.defer="nama_lengkap"
                            class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-5 py-3 font-bold text-brand-darkblue focus:bg-white focus:border-brand-green focus:shadow-xl focus:shadow-brand-green/10 outline-none transition-all duration-300 @error('nama_lengkap') border-red-500 @enderror"
                            placeholder="NAMA LENGKAP SESUAI KTP">
                        <div class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                    @error('nama_lengkap') <span
                    class="text-red-500 text-[9px] font-bold uppercase ml-1">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Tempat
                            Lahir</label>
                        <input type="text" wire:model.defer="tempat_lahir"
                            class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-5 py-3 font-bold text-brand-darkblue focus:bg-white focus:border-brand-green outline-none transition-all duration-300 shadow-sm focus:shadow-md @error('tempat_lahir') border-red-500 @enderror"
                            placeholder="CONTOH: SRAGEN">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Tanggal
                            Lahir</label>
                        <input type="date" wire:model.defer="tanggal_lahir"
                            class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-5 py-3 font-bold text-brand-darkblue focus:bg-white focus:border-brand-green outline-none transition-all duration-300 shadow-sm focus:shadow-md @error('tanggal_lahir') border-red-500 @enderror">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Jenis
                            Kelamin</label>
                        <input type="hidden" id="gender-hidden" wire:model.defer="gender">
                        <div class="flex gap-4">
                            <button type="button" id="btn-laki" onclick="setGenderVal('Laki-laki')"
                                class="btn-gender flex-1 py-3 px-4 text-center border-2 rounded-2xl font-bold text-[10px] transition-all shadow-sm uppercase tracking-wider active:scale-95 bg-white text-slate-500 border-slate-300 hover:border-brand-green/30">
                                LAKI-LAKI
                            </button>
                            <button type="button" id="btn-perempuan" onclick="setGenderVal('Perempuan')"
                                class="btn-gender flex-1 py-3 px-4 text-center border-2 rounded-2xl font-bold text-[10px] transition-all shadow-sm uppercase tracking-wider active:scale-95 bg-white text-slate-500 border-slate-300 hover:border-brand-green/30">
                                PEREMPUAN
                            </button>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nomor
                            WhatsApp Aktif</label>
                        <div class="relative">
                            <input type="tel" wire:model.defer="no_hp"
                                class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-5 py-3 font-bold text-brand-darkblue focus:bg-white focus:border-brand-green outline-none transition-all duration-300 pl-12 shadow-sm focus:shadow-md @error('no_hp') border-red-500 @enderror"
                                placeholder="08XXXXXXXXXX">
                            <div class="absolute left-5 top-1/2 -translate-y-1/2 font-black text-brand-green text-sm">
                                +62</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 2: Fisik & Profesi -->
            <div class="space-y-5 pt-2">
                <div class="flex items-center gap-4">
                    <span
                        class="w-8 h-8 rounded-full bg-brand-blue/10 text-brand-blue flex items-center justify-center font-black text-sm">02</span>
                    <h3 class="font-black text-brand-darkblue uppercase tracking-widest text-sm">Fisik & Profesi</h3>
                    <div class="flex-1 h-[1px] bg-slate-100"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Tinggi Badan
                            (cm)</label>
                        <input type="text" wire:model.defer="tinggi_badan"
                            class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-6 py-3 font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue outline-none transition-all duration-300 shadow-sm focus:shadow-md @error('tinggi_badan') border-red-500 @enderror">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Berat Badan
                            (kg)</label>
                        <input type="text" wire:model.defer="berat_badan"
                            class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-6 py-3 font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue outline-none transition-all duration-300 shadow-sm focus:shadow-md @error('berat_badan') border-red-500 @enderror">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label
                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Pekerjaan</label>
                        <input type="text" wire:model.defer="pekerjaan"
                            class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-6 py-3 font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue outline-none transition-all duration-300 shadow-sm focus:shadow-md @error('pekerjaan') border-red-500 @enderror">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Pendidikan
                            Terakhir</label>
                        <input type="text" wire:model.defer="pendidikan"
                            class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-6 py-3 font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue outline-none transition-all duration-300 shadow-sm focus:shadow-md @error('pendidikan') border-red-500 @enderror">
                    </div>
                </div>
            </div>

            <!-- Section 3: Keperluan & Alamat -->
            <div class="space-y-5 pt-2">
                <div class="flex items-center gap-4">
                    <span
                        class="w-8 h-8 rounded-full bg-brand-orange/10 text-brand-orange flex items-center justify-center font-black text-sm">03</span>
                    <h3 class="font-black text-brand-darkblue uppercase tracking-widest text-sm">Alamat & Keperluan</h3>
                    <div class="flex-1 h-[1px] bg-slate-100"></div>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Keperluan
                        Pembuatan Surat</label>
                    <input type="text" wire:model.defer="keperluan"
                        class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-6 py-3 font-bold text-brand-darkblue focus:bg-white focus:border-brand-orange outline-none transition-all duration-300 shadow-sm focus:shadow-md @error('keperluan') border-red-500 @enderror"
                        placeholder="CONTOH: MELAMAR PEKERJAAN">
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Alamat Lengkap
                        Sesuai KTP</label>
                    <textarea wire:model.defer="alamat" rows="2"
                        class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-6 py-3 font-bold text-brand-darkblue focus:bg-white focus:border-brand-orange outline-none transition-all duration-300 shadow-sm focus:shadow-md resize-none @error('alamat') border-red-500 @enderror"></textarea>
                </div>
            </div>

            <!-- Section 4: Pemeriksaan -->
            <div class="space-y-5 pt-2">
                <div
                    class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-brand-darkblue p-6 rounded-[2rem] border border-white/5 shadow-xl relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-brand-green/20 to-transparent"></div>
                    <div class="relative z-10">
                        <h3 class="font-black text-white uppercase tracking-widest text-sm">Pilih Jenis Pemeriksaan</h3>
                        <p class="text-white/40 text-[10px] font-bold uppercase tracking-widest mt-1">Anda dapat memilih
                            lebih dari satu layanan</p>
                    </div>
                    <div class="relative z-10 flex items-center gap-2 px-4 py-2 bg-brand-green rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-[8px] font-black text-white uppercase tracking-widest">Medical Choice</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                    @foreach($prices_list as $price)
                        <label class="group relative">
                            <input type="checkbox" wire:model.defer="jenis_test" value="{{ $price->test_name }}"
                                data-price="{{ $price->price }}" class="hidden peer test-checkbox">
                            <div
                                class="flex flex-row items-center gap-3 p-3 bg-slate-50 border-2 border-slate-200 rounded-2xl cursor-pointer transition-all duration-300 peer-checked:bg-white peer-checked:border-brand-green peer-checked:shadow-lg peer-checked:shadow-brand-green/10 peer-checked:-translate-y-0.5 group-hover:border-brand-green/30 active:scale-95 shadow-sm">
                                <div
                                    class="w-7 h-7 shrink-0 border border-slate-200 rounded-lg flex items-center justify-center transition-all peer-checked:bg-brand-green/10 peer-checked:border-brand-green bg-white group-hover:scale-110 shadow-sm text-slate-300 peer-checked:text-brand-green">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div class="flex flex-col min-h-[auto] justify-center overflow-hidden">
                                    <span
                                        class="text-[9px] font-black text-slate-500 uppercase tracking-tight peer-checked:text-brand-darkblue transition-colors leading-none truncate">{{ $price->test_name }}</span>
                                    @if($price->price > 0)
                                        <div
                                            class="hidden peer-checked:flex items-center gap-1 mt-0.5 animate__animated animate__fadeInRight animate__faster">
                                            <span
                                                class="text-[8px] font-bold text-brand-blue uppercase tracking-widest whitespace-nowrap">
                                                <span class="opacity-50 text-[7px]">Rp</span>
                                                {{ number_format($price->price, 0, ',', '.') }}
                                            </span>
                                        </div>
                                    @endif
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
        <div class="mt-12 pt-8 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-8">
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
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Estimasi Total
                        Biaya</span>
                    <div class="flex items-baseline gap-1.5" wire:ignore>
                        <span class="text-lg font-black text-brand-gray/40">Rp</span>
                        <span id="js-total-price"
                            class="text-3xl font-black text-brand-darkblue tracking-tight">{{ number_format($total_price, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <div class="relative group w-full sm:w-auto">
                <div
                    class="absolute -inset-1 bg-gradient-to-r from-brand-green via-brand-blue to-brand-orange rounded-[2rem] blur opacity-25 group-hover:opacity-75 transition duration-1000 group-hover:duration-200">
                </div>
                <button type="submit" wire:loading.attr="disabled"
                    class="relative w-full sm:w-auto px-12 bg-brand-darkblue text-white py-6 rounded-[1.5rem] font-black uppercase tracking-[0.4em] text-sm shadow-2xl hover:bg-brand-green transition-all duration-500 flex items-center justify-center gap-4 group overflow-hidden disabled:opacity-50">
                    <span class="relative z-10" wire:loading.remove>Kirim Pendaftaran</span>
                    <span class="relative z-10" wire:loading>Memproses...</span>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 relative z-10 animate-bounce-x"
                        wire:loading.remove fill="none" viewBox="0 0 24 24" stroke="currentColor">
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

    <script>
        function setGenderVal(val) {
            const input = document.getElementById('gender-hidden');
            const btns = document.querySelectorAll('.btn-gender');
            const btnLaki = document.getElementById('btn-laki');
            const btnPerempuan = document.getElementById('btn-perempuan');

            // Toggle off if clicking the same value
            if (input.value === val) {
                input.value = '';
                btns.forEach(b => {
                    b.classList.remove('bg-brand-green', 'text-white', 'border-brand-green');
                    b.classList.add('bg-white', 'text-slate-500', 'border-slate-300');
                });
            } else {
                input.value = val;
                btns.forEach(b => {
                    b.classList.remove('bg-brand-green', 'text-white', 'border-brand-green');
                    b.classList.add('bg-white', 'text-slate-500', 'border-slate-300');
                });

                const activeBtn = val === 'Laki-laki' ? btnLaki : btnPerempuan;
                activeBtn.classList.add('bg-brand-green', 'text-white', 'border-brand-green');
                activeBtn.classList.remove('bg-white', 'text-slate-500', 'border-slate-300');
            }

            // Trigger change for Livewire
            input.dispatchEvent(new Event('input'));
        }

        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('.test-checkbox');
            const totalDisplay = document.getElementById('js-total-price');

            function updateTotal() {
                let total = 0;
                document.querySelectorAll('.test-checkbox:checked').forEach(cb => {
                    total += parseInt(cb.getAttribute('data-price')) || 0;
                });
                totalDisplay.innerText = new Intl.NumberFormat('id-ID').format(total);
            }

            checkboxes.forEach(cb => {
                cb.addEventListener('change', updateTotal);
            });

            // Initial calculation
            updateTotal();

            // Set initial gender UI if any
            const initialGender = document.getElementById('gender-hidden').value;
            if (initialGender) setGenderVal(initialGender);
        });
    </script>
</div>