@extends('layouts.admin')

@section('title', 'Manajemen Berkas')

@section('content')
    <!-- Header -->
    <header
        class="h-20 lg:h-24 bg-white/80 backdrop-blur-md border-b border-gray-100 flex items-center justify-between px-4 lg:px-8 z-20 sticky top-0 transition-all duration-300">
        <div class="flex items-center gap-3 lg:gap-5 flex-1 min-w-0">
            <button id="sidebarToggle"
                class="w-10 h-10 lg:w-12 lg:h-12 flex items-center justify-center rounded-2xl bg-gray-50 text-brand-darkblue hover:bg-brand-blue hover:text-white transition-all shadow-sm border border-gray-100 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 lg:h-6 lg:w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div class="min-w-0">
                <h2
                    class="text-base lg:text-2xl font-black text-brand-darkblue tracking-tight truncate leading-tight uppercase">
                    {{ request('type') ? 'Berkas Keterangan ' . request('type') : 'Manajemen Semua Berkas' }}
                </h2>
                <p class="text-[9px] lg:text-xs text-brand-gray font-semibold truncate uppercase tracking-widest mt-0.5">
                    Kelola Arsip & Cetak Surat</p>
            </div>
        </div>

        <div class="flex items-center gap-2 lg:gap-4 shrink-0">
            <div class="hidden sm:flex flex-col items-end border-r border-gray-100 pr-4 mr-2">
                <span class="text-[10px] font-black text-brand-darkblue/40 uppercase tracking-tighter">Status Server</span>
                <span class="text-[10px] font-bold text-brand-green flex items-center gap-1.5 uppercase tracking-widest">
                    <div class="w-1.5 h-1.5 rounded-full bg-brand-green animate-pulse"></div>
                    Optimal
                </span>
            </div>
            <a href="{{ url('/admin/buat-surat/tambah') }}"
                class="bg-brand-green text-white px-5 py-2.5 rounded-xl text-xs font-black uppercase tracking-widest flex items-center gap-2 hover:bg-green-600 shadow-lg shadow-brand-green/20 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span class="hidden md:inline">Tambah Berkas</span>
            </a>
        </div>
    </header>

    <div class="flex-1 overflow-y-auto p-4 lg:p-10 space-y-6 lg:space-y-8">

        <!-- Filter & Search Section -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 lg:gap-6">
            <!-- Date Filter -->
            <div class="lg:col-span-3 bg-white p-4 lg:p-7 rounded-[2.5rem] shadow-sm border border-gray-100">
                <form action="{{ url('/admin/data-surat') }}" method="GET"
                    class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                    <div class="md:col-span-11 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6">
                        <div class="lg:col-span-1 flex flex-col gap-1.5">
                            <label class="text-[10px] uppercase font-black text-gray-400 tracking-widest ml-1">Pilih
                                Periode</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input type="date" name="start_date"
                                    class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-2.5 lg:py-3.5 pl-11 pr-4 text-sm font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue focus:ring-4 focus:ring-brand-blue/10 transition-all outline-none"
                                    value="{{ request('start_date', date('Y-m-d')) }}">
                            </div>
                        </div>
                        <div class="lg:col-span-1 flex flex-col gap-1.5">
                            <label class="text-[10px] uppercase font-black text-gray-400 tracking-widest ml-1">Hingga
                                Tanggal</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input type="date" name="end_date"
                                    class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-2.5 lg:py-3.5 pl-11 pr-4 text-sm font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue focus:ring-4 focus:ring-brand-blue/10 transition-all outline-none"
                                    value="{{ request('end_date', date('Y-m-d')) }}">
                            </div>
                        </div>
                        <div class="sm:col-span-2 lg:col-span-1 pt-1.5">
                            <button type="submit"
                                class="w-full bg-brand-orange text-white h-[44.8px] lg:h-[53.6px] rounded-2xl text-xs font-black shadow-lg shadow-brand-orange/20 hover:bg-orange-600 transition-all flex items-center justify-center gap-2 uppercase tracking-widest">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                TERAPKAN FILTER
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Quick Search -->
            <div class="bg-white p-4 lg:p-7 rounded-[2.5rem] shadow-sm border border-gray-100 flex flex-col gap-1.5">
                <label class="text-[10px] uppercase font-black text-gray-400 tracking-widest ml-1">Pencarian Cepat</label>
                <form action="{{ url('/admin/data-surat') }}" method="GET" class="relative group">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama pasien..."
                        class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-2.5 lg:py-3.5 pl-11 pr-4 text-sm font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue focus:ring-4 focus:ring-brand-blue/10 transition-all outline-none placeholder:text-gray-400">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 text-gray-400 group-focus-within:text-brand-blue transition-colors" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-gray-50/80 text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-gray-100">
                            <th class="px-8 py-6 text-center w-20">No</th>
                            <th class="px-6 py-6">Informasi Pasien & Berkas</th>
                            <th class="px-6 py-6">Data Klinis</th>
                            <th class="px-6 py-6">Administrasi</th>
                            <th class="px-6 py-6 text-center">Aksi Operasional</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm font-medium text-gray-700">
                        @if(isset($pendaftar))
                            {{-- VIEW GRUP (DEFAULT) --}}
                            @forelse($pendaftar as $index => $row)
                                <tr class="bg-gray-50/20 border-t-4 border-brand-blue/5">
                                    <td class="px-8 py-8 text-center text-gray-400 font-mono text-xs">
                                        {{ $pendaftar->firstItem() + $index }}
                                    </td>
                                    <td colspan="4" class="px-6 py-8">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-5">
                                                <div
                                                    class="w-14 h-14 bg-gradient-to-br from-brand-blue to-brand-darkblue rounded-2xl flex items-center justify-center font-black text-2xl text-white shadow-xl shadow-brand-blue/20">
                                                    {{ strtoupper(substr($row->nama_lengkap, 0, 1)) }}
                                                </div>
                                                <div>
                                                    <span
                                                        class="font-black text-xl text-brand-darkblue uppercase tracking-tight block">{{ $row->nama_lengkap }}</span>
                                                    <div class="flex items-center gap-3 mt-1">
                                                        <span
                                                            class="text-[10px] text-brand-blue font-black uppercase tracking-widest bg-brand-blue/5 px-2 py-0.5 rounded">ID:
                                                            #{{ $row->no_registrasi }}</span>
                                                        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                                        <span
                                                            class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">{{ $row->pekerjaan ?? '-' }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right bg-white px-6 py-3 rounded-2xl border border-gray-100 shadow-sm">
                                                <span
                                                    class="text-[9px] font-black text-gray-400 uppercase tracking-widest block mb-0.5">Berkas
                                                    Terbit</span>
                                                <span
                                                    class="text-2xl font-black text-brand-blue">{{ $row->suratKeterangan->count() }}</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @foreach($row->suratKeterangan as $suratEntry)
                                    <tr id="surat_{{ $suratEntry->id }}" class="hover:bg-blue-50/20 transition-all group scroll-mt-32 lg:scroll-mt-40">
                                        <td class="px-8 py-5"></td>
                                        <td class="px-6 py-5">
                                            <div class="flex items-center gap-4">
                                                <div class="w-2 h-2 bg-brand-green rounded-full shadow-[0_0_10px_rgba(16,185,129,0.5)]">
                                                </div>
                                                <div class="flex flex-col gap-0.5">
                                                    <span
                                                        class="font-black text-brand-darkblue uppercase text-xs tracking-tight">{{ $suratEntry->tipe_berkas }}</span>
                                                    <span class="text-[10px] text-gray-400 font-bold uppercase italic">Dokter:
                                                        {{ $suratEntry->dokter->nama_dokter }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-5 border-l border-gray-50">
                                            <div class="grid grid-cols-2 gap-x-4 gap-y-1 text-[10px] font-bold text-gray-500 uppercase">
                                                <span class="text-gray-400">Tensi</span>
                                                <span class="text-brand-darkblue">{{ $suratEntry->tensi ?? '-' }}</span>
                                                <span class="text-gray-400">TB/BB</span>
                                                <span
                                                    class="text-brand-darkblue">{{ $suratEntry->tinggi_badan ?? '-' }}/{{ $suratEntry->berat_badan ?? '-' }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-5 border-l border-gray-50">
                                            <div class="flex flex-col gap-1.5 font-mono">
                                                <span
                                                    class="text-[10px] font-black text-gray-300 uppercase tracking-widest leading-none">Dokumen
                                                    No.</span>
                                                <span
                                                    class="text-[11px] bg-brand-blue/5 text-brand-blue px-3 py-1 rounded-lg w-max font-bold">{{ $suratEntry->nomor_surat }}</span>
                                                <div class="flex items-center gap-2 mt-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-400" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    <span
                                                        class="text-[10px] text-gray-500 font-black uppercase tracking-tighter">{{ \Carbon\Carbon::parse($suratEntry->tanggal_cetak)->format('d.m.Y') }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-5 text-center">
                                            <div class="flex items-center justify-center gap-2 lg:gap-3">
                                                <a href="{{ url('/admin/buat-surat/cetak/' . $suratEntry->id) }}" target="_blank"
                                                    class="w-9 h-9 bg-brand-green text-white rounded-xl flex items-center justify-center shadow-lg shadow-brand-green/20 hover:bg-green-600 hover:-translate-y-0.5 transition-all"
                                                    title="Cetak Berkas">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                                    </svg>
                                                </a>
                                                <a href="{{ url('/admin/buat-surat/edit/' . $suratEntry->id) }}"
                                                    class="w-9 h-9 bg-brand-blue text-white rounded-xl flex items-center justify-center shadow-lg shadow-brand-blue/20 hover:bg-brand-darkblue hover:-translate-y-0.5 transition-all"
                                                    title="Edit Data">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>
                                                <form action="{{ url('/admin/buat-surat/delete/' . $suratEntry->id) }}" method="POST"
                                                    class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        onclick="confirmDeletePremium(this, 'Hapus Berkas?', 'Berkas {{ $suratEntry->tipe_berkas }} untuk pasien {{ $row->nama_lengkap }} akan dihapus permanen.')"
                                                        class="w-9 h-9 bg-red-500 text-white rounded-xl flex items-center justify-center shadow-lg shadow-red-500/20 hover:bg-red-600 hover:-translate-y-0.5 transition-all"
                                                        title="Hapus Berkas">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-40 text-center">
                                        <div class="flex flex-col items-center gap-4">
                                            <div class="w-20 h-20 bg-gray-50 rounded-[2rem] flex items-center justify-center mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-300" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4a2 2 0 012-2m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                                </svg>
                                            </div>
                                            <span class="text-base font-black text-gray-400 uppercase tracking-[0.2em]">Data Arsip
                                                Kosong</span>
                                            <p
                                                class="text-xs text-gray-400 font-bold uppercase tracking-widest max-w-xs leading-relaxed">
                                                Belum ada surat keterangan yang diterbitkan untuk periode ini</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        @elseif(isset($surat))
                            {{-- VIEW FLAT (DITERAPKAN FILTER) --}}
                            @forelse($surat as $index => $suratEntry)
                                <tr id="surat_{{ $suratEntry->id }}" class="hover:bg-blue-50/20 transition-all group scroll-mt-32 lg:scroll-mt-40">
                                    <td class="px-8 py-6 text-center text-gray-400 font-mono text-xs">
                                        {{ $surat->firstItem() + $index }}
                                    </td>
                                    <td class="px-6 py-6">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="w-10 h-10 bg-brand-blue/10 rounded-xl flex items-center justify-center font-black text-brand-blue uppercase shadow-sm">
                                                {{ strtoupper(substr($suratEntry->pendaftar->nama_lengkap, 0, 1)) }}
                                            </div>
                                            <div class="flex flex-col gap-0.5">
                                                <span
                                                    class="font-black text-brand-darkblue uppercase text-sm tracking-tight">{{ $suratEntry->pendaftar->nama_lengkap }}</span>
                                                <span
                                                    class="text-[10px] text-gray-400 font-bold uppercase italic">#{{ $suratEntry->pendaftar->no_registrasi }}
                                                    | {{ $suratEntry->tipe_berkas }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-6 border-l border-gray-50">
                                        <div class="grid grid-cols-2 gap-x-4 gap-y-1 text-[10px] font-bold text-gray-500 uppercase">
                                            <span class="text-gray-400">Tensi</span>
                                            <span class="text-brand-darkblue">{{ $suratEntry->tensi ?? '-' }}</span>
                                            <span class="text-gray-400">TB/BB</span>
                                            <span
                                                class="text-brand-darkblue">{{ $suratEntry->tinggi_badan ?? '-' }}/{{ $suratEntry->berat_badan ?? '-' }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-6 border-l border-gray-50">
                                        <div class="flex flex-col gap-1.5 font-mono">
                                            <span
                                                class="text-[11px] bg-brand-blue/5 text-brand-blue px-3 py-1 rounded-lg w-max font-bold">{{ $suratEntry->nomor_surat }}</span>
                                            <span
                                                class="text-[10px] text-gray-500 font-black uppercase tracking-tighter">{{ \Carbon\Carbon::parse($suratEntry->tanggal_cetak)->format('d.m.Y') }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-6 text-center">
                                        <div class="flex items-center justify-center gap-2 lg:gap-3">
                                            <a href="{{ url('/admin/buat-surat/cetak/' . $suratEntry->id) }}" target="_blank"
                                                class="w-9 h-9 bg-brand-green text-white rounded-xl flex items-center justify-center shadow-lg shadow-brand-green/20 hover:bg-green-600 hover:-translate-y-0.5 transition-all"
                                                title="Cetak Berkas">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                                </svg>
                                            </a>
                                            <a href="{{ url('/admin/buat-surat/edit/' . $suratEntry->id) }}"
                                                class="w-9 h-9 bg-brand-blue text-white rounded-xl flex items-center justify-center shadow-lg shadow-brand-blue/20 hover:bg-brand-darkblue hover:-translate-y-0.5 transition-all"
                                                title="Edit Data">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <form action="{{ url('/admin/buat-surat/delete/' . $suratEntry->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    onclick="confirmDeletePremium(this, 'Hapus Berkas?', 'Data ini akan dihapus permanen.')"
                                                    class="w-9 h-9 bg-red-500 text-white rounded-xl flex items-center justify-center shadow-lg shadow-red-500/20 hover:bg-red-600 hover:-translate-y-0.5 transition-all">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5"
                                        class="px-6 py-40 text-center text-gray-300 font-black uppercase tracking-[0.2em]">Data
                                        Tidak Ditemukan</td>
                                </tr>
                            @endforelse
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-8 py-6 border-t border-gray-50 bg-gray-50/30">
                @if(isset($pendaftar))
                    {{ $pendaftar->appends(request()->all())->links() }}
                @elseif(isset($surat))
                    {{ $surat->appends(request()->all())->links() }}
                @endif
            </div>
        </div>

    </div>
@endsection