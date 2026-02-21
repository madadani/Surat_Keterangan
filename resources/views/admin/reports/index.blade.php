@extends('layouts.admin')

@section('title', 'Laporan Per Poli')

@section('content')
    <!-- Header -->
    <header
        class="h-20 lg:h-24 bg-white/80 backdrop-blur-md border-b border-gray-100 flex items-center justify-between px-4 lg:px-8 z-10 sticky top-0 transition-all duration-300">
        <div class="flex items-center gap-3 lg:gap-4 flex-1">
            <button id="sidebarToggle"
                class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-50 text-brand-darkblue hover:bg-brand-blue hover:text-white transition-all shadow-sm border border-gray-100 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div class="truncate">
                <h2 class="text-sm lg:text-2xl font-black text-brand-darkblue tracking-tight truncate uppercase">Laporan Per
                    Poli</h2>
                <p class="text-[8px] lg:text-xs text-brand-gray font-medium truncate uppercase tracking-widest mt-0.5">
                    Pilih rentang waktu untuk melihat statistik layanan</p>
            </div>
        </div>
    </header>

    <div class="flex-1 overflow-y-auto p-4 md:p-10 space-y-6 lg:space-y-8 bg-[#f8fafc]">
        <div class="max-w-7xl mx-auto space-y-8">
            <!-- Filters & Actions -->
            <div class="flex flex-col xl:flex-row xl:items-end justify-between gap-6">

                <!-- Date Range Filter -->
                <form action="{{ url('/admin/laporan') }}" method="GET"
                    class="flex flex-wrap items-end gap-3 bg-white p-4 rounded-[2rem] shadow-sm border border-gray-100 animate__animated animate__fadeIn">
                    <div class="space-y-1.5">
                        <label class="text-[9px] font-black text-gray-400 uppercase tracking-widest ml-1">Dari
                            Tanggal</label>
                        <input type="date" name="start_date" value="{{ $startDate ?? '' }}"
                            class="block w-40 bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-bold text-brand-darkblue focus:ring-2 focus:ring-brand-blue/10 focus:border-brand-blue outline-none transition-all">
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[9px] font-black text-gray-400 uppercase tracking-widest ml-1">Sampai
                            Tanggal</label>
                        <input type="date" name="end_date" value="{{ $endDate ?? '' }}"
                            class="block w-40 bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-bold text-brand-darkblue focus:ring-2 focus:ring-brand-blue/10 focus:border-brand-blue outline-none transition-all">
                    </div>
                    <button type="submit"
                        class="bg-brand-blue text-white p-3 rounded-xl hover:bg-brand-darkblue transition-all shadow-lg shadow-brand-blue/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                    @if($startDate || $endDate)
                        <a href="{{ url('/admin/laporan') }}"
                            class="bg-gray-100 text-gray-400 p-3 rounded-xl hover:bg-gray-200 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </a>
                    @endif
                </form>

                <div class="flex items-center gap-4">
                    <a href="{{ url('/admin/laporan/All/print?start_date=' . ($startDate ?? '') . '&end_date=' . ($endDate ?? '')) }}"
                        target="_blank"
                        class="bg-brand-darkblue text-white px-6 py-4 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-brand-blue hover:-translate-y-1 transition-all shadow-xl shadow-brand-darkblue/10 flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>
                        Cetak Semua Poli
                    </a>
                    <a href="{{ url('/admin/laporan/All/export?start_date=' . ($startDate ?? '') . '&end_date=' . ($endDate ?? '')) }}"
                        class="bg-brand-green text-white px-6 py-4 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-brand-darkblue hover:-translate-y-1 transition-all shadow-xl shadow-brand-green/10 flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Unduh CSV
                    </a>
                </div>
            </div>

            <!-- Poli Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($prices as $price)
                    <a href="{{ url('/admin/laporan/' . str_replace(' ', '-', trim($price->test_name)) . '?start_date=' . ($startDate ?? '') . '&end_date=' . ($endDate ?? '')) }}"
                        class="group bg-white p-6 rounded-[2.5rem] border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-brand-blue/10 hover:-translate-y-1 transition-all duration-300 relative overflow-hidden">

                        <!-- Decorative Element -->
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-brand-blue/5 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-500">
                        </div>

                        <div class="relative z-10">
                            <div class="flex items-start justify-between mb-4">
                                <div
                                    class="w-14 h-14 bg-gray-50 rounded-2xl flex items-center justify-center group-hover:bg-brand-blue group-hover:text-white transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <span
                                    class="bg-brand-green/10 text-brand-green px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest">
                                    {{ $stats[trim($price->test_name)] ?? 0 }} Surat
                                </span>
                            </div>

                            <h3 class="text-xl font-black text-brand-darkblue uppercase tracking-tight mb-1">
                                {{ $price->test_name }}
                            </h3>
                            <p class="text-gray-400 font-bold text-[10px] uppercase tracking-wider mb-6">Unit Pelayanan
                                {{ $price->test_name }}
                            </p>

                            <div class="flex items-center justify-between">
                                <span
                                    class="text-xs font-black text-brand-blue uppercase tracking-widest bg-brand-blue/5 px-4 py-2 rounded-xl group-hover:bg-brand-blue group-hover:text-white transition-all">Lihat
                                    Detail</span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 text-gray-300 group-hover:text-brand-blue group-hover:translate-x-1 transition-all"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach


            </div>
        </div>
    </div>
@endsection