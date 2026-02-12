@extends('layouts.admin')

@section('title', 'Manajemen Harga Estimasi')

@section('content')
    <!-- Header -->
    <header
        class="h-20 lg:h-24 bg-white/80 backdrop-blur-md border-b border-gray-100 flex items-center justify-between px-4 lg:px-8 z-20 sticky top-0 transition-all duration-300">
        <div class="flex items-center gap-3 lg:gap-5 flex-1 min-w-0">
            <div class="min-w-0">
                <h2
                    class="text-base lg:text-2xl font-black text-brand-darkblue tracking-tight truncate leading-tight uppercase">
                    Manajemen Harga Estimasi</h2>
                <p class="text-[9px] lg:text-xs text-brand-gray font-bold uppercase tracking-widest truncate mt-0.5">
                    Atur tarif estimasi untuk tiap jenis pemeriksaan
                </p>
            </div>
        </div>
    </header>

    <div class="flex-1 overflow-y-auto p-4 lg:p-10 bg-[#f8fafc]">
        <div class="w-full">
            <div
                class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden transition-all duration-500 hover:shadow-xl hover:shadow-brand-blue/5">
                <form action="{{ url('/admin/manajemen-harga/update') }}" method="POST">
                    @csrf
                    <div class="p-6 lg:p-12">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6 lg:gap-10">
                            @foreach($prices as $price)
                                <div class="relative group">
                                    <!-- Decorative Icon Background -->
                                    <div
                                        class="absolute -right-2 -top-2 w-16 h-16 bg-brand-blue/5 rounded-full blur-2xl group-hover:bg-brand-blue/10 transition-colors duration-500">
                                    </div>

                                    <label class="flex items-center gap-2 mb-3 lg:mb-4 px-1">
                                        <div class="w-2 h-2 rounded-full bg-brand-blue shadow-[0_0_8px_rgba(59,130,246,0.5)]">
                                        </div>
                                        <span
                                            class="text-[11px] font-black text-slate-400 group-hover:text-brand-darkblue uppercase tracking-[0.15em] transition-colors duration-300">
                                            {{ $price->test_name }}
                                        </span>
                                    </label>

                                    <div class="relative">
                                        <div class="absolute left-5 top-1/2 -translate-y-1/2 flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 bg-white rounded-lg shadow-sm border border-slate-100 flex items-center justify-center text-brand-blue font-black text-[10px] group-focus-within:bg-brand-blue group-focus-within:text-white transition-all duration-300">
                                                Rp
                                            </div>
                                        </div>
                                        <input type="number" name="prices[{{ $price->id }}]" value="{{ $price->price }}"
                                            class="w-full bg-slate-50/50 border-2 border-slate-100 rounded-2xl pl-16 pr-6 py-5 font-black text-brand-darkblue text-lg focus:bg-white focus:border-brand-blue focus:ring-4 focus:ring-brand-blue/5 outline-none transition-all duration-300 shadow-sm group-hover:border-slate-200"
                                            required min="0">

                                        <!-- Interactive Border Bottom -->
                                        <div
                                            class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-1 bg-brand-blue rounded-full transition-all duration-500 group-focus-within:w-[80%]">
                                        </div>
                                    </div>

                                    <p
                                        class="mt-2 ml-1 text-[9px] font-bold text-slate-300 uppercase tracking-widest group-hover:text-slate-400 transition-colors">
                                        ID Tarif: #{{ $price->id }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Footer Action -->
                    <div
                        class="bg-gray-50/50 border-t border-gray-100 p-8 lg:px-12 flex flex-col sm:flex-row items-center justify-between gap-6">
                        <div class="flex items-center gap-4 order-2 sm:order-1">
                            <div
                                class="w-10 h-10 bg-brand-blue/10 rounded-xl flex items-center justify-center text-brand-blue">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p
                                class="text-[10px] font-bold text-slate-400 max-w-[200px] leading-relaxed uppercase tracking-wider">
                                Tarif yang diatur di sini akan muncul otomatis saat pembuatan berkas surat.
                            </p>
                        </div>

                        <button type="submit"
                            class="w-full sm:w-auto order-1 sm:order-2 bg-brand-blue text-white px-10 py-5 rounded-2xl text-[11px] font-black uppercase tracking-[0.2em] hover:bg-brand-darkblue shadow-xl shadow-brand-blue/20 transition-all hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

            <!-- Quick Help -->
            <div class="mt-8 flex flex-wrap gap-4 px-4 overflow-x-auto pb-4 no-scrollbar">
                <div
                    class="flex items-center gap-2 text-[10px] font-black text-slate-400 uppercase tracking-widest bg-white px-5 py-3 rounded-full border border-gray-100 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-brand-green"></span>
                    Update Otomatis
                </div>
                <div
                    class="flex items-center gap-2 text-[10px] font-black text-slate-400 uppercase tracking-widest bg-white px-5 py-3 rounded-full border border-gray-100 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-brand-orange"></span>
                    Validasi Nilai
                </div>
                <div
                    class="flex items-center gap-2 text-[10px] font-black text-slate-400 uppercase tracking-widest bg-white px-5 py-3 rounded-full border border-gray-100 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-brand-blue"></span>
                    Format Rupiah
                </div>
            </div>
        </div>
    </div>

@endsection