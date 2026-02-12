@extends('layouts.admin')

@section('title', 'Data Surat Keterangan')

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
                <h2 class="text-sm lg:text-2xl font-black text-brand-darkblue tracking-tight truncate uppercase">Arsip Surat
                    Keterangan</h2>
                <p class="text-[8px] lg:text-xs text-brand-gray font-medium truncate uppercase tracking-widest mt-0.5">
                    Database Seluruh Berkas Terbit</p>
            </div>
        </div>

        <div class="flex items-center gap-2 lg:gap-4 flex-wrap justify-end">
            <div class="hidden sm:flex flex-col items-end border-r border-gray-100 pr-4 mr-2">
                <span class="text-[10px] font-black text-brand-darkblue/40 uppercase tracking-tighter">Total Arsip</span>
                <span class="text-[10px] font-bold text-brand-blue flex items-center gap-1.5 uppercase tracking-widest">
                    {{ number_format($totalSurat) }} Berkas
                </span>
            </div>
        </div>
    </header>

    <!-- Content Body -->
    <div class="flex-1 overflow-y-auto p-4 lg:p-10 space-y-6 lg:space-y-8">

        <!-- Filters Card -->
        <div
            class="bg-white p-6 lg:p-8 rounded-[2.5rem] shadow-sm border border-gray-100 mb-6 transition-all hover:shadow-md">
            <form action="{{ url('/admin/data-surat') }}" method="GET" class="flex flex-wrap items-center gap-6">
                <div class="flex items-center flex-1 max-w-md">
                    <div class="relative w-full group">
                        <input type="text" name="search" placeholder="Cari nama, nomor surat, atau NIK..."
                            value="{{ request('search') }}"
                            class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-3 pl-12 pr-4 text-sm font-bold text-brand-darkblue focus:ring-4 focus:ring-brand-blue/10 focus:bg-white focus:border-brand-blue transition-all outline-none">
                        <div
                            class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-brand-blue transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <button type="submit"
                        class="bg-brand-orange text-white px-8 py-3 rounded-2xl text-xs font-black uppercase tracking-widest shadow-lg shadow-brand-orange/20 hover:bg-orange-600 transition-all flex items-center gap-2">
                        FILTER DATA
                    </button>
                    @if(request('search'))
                        <a href="{{ url('/admin/data-surat') }}"
                            class="bg-red-50 text-red-600 px-6 py-3 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-red-100 transition-all">Reset</a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[1200px]">
                    <thead>
                        <tr
                            class="bg-gray-50/80 text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-gray-100">
                            <th class="px-8 py-6 text-center w-20">No</th>
                            <th class="px-6 py-6">Penerima Berkas</th>
                            <th class="px-6 py-6">Klasifikasi & Nomor</th>
                            <th class="px-6 py-6">Data Klinis</th>
                            <th class="px-6 py-6 font-bold uppercase tracking-widest">Pemeriksa</th>
                            <th class="px-6 py-6 text-center">Tgl Terbit</th>
                            <th class="px-6 py-6 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm font-medium text-gray-700">
                        @forelse($pendaftar as $index => $row)
                            {{-- Header Group Pasien --}}
                            <tr class="bg-blue-50/10 border-t-2 border-brand-blue/10">
                                <td class="px-8 py-5 text-center text-gray-400 font-mono text-xs">
                                    {{ $pendaftar->firstItem() + $index }}
                                </td>
                                <td colspan="6" class="px-6 py-5">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 bg-gradient-to-br from-brand-blue to-brand-darkblue rounded-2xl flex items-center justify-center font-black text-xl text-white shadow-lg shadow-brand-blue/10">
                                            {{ strtoupper(substr($row->nama_lengkap, 0, 1)) }}
                                        </div>
                                        <div>
                                            <span
                                                class="font-black text-brand-darkblue uppercase tracking-tight text-xl block leading-tight">{{ $row->nama_lengkap }}</span>
                                            <div class="flex items-center gap-2 mt-0.5">
                                                <span
                                                    class="text-[9px] font-black text-brand-blue uppercase tracking-widest bg-brand-blue/5 px-2 py-0.5 rounded">ID:
                                                    #{{ $row->no_registrasi }}</span>
                                                <span
                                                    class="text-[9px] font-black text-gray-400 uppercase tracking-widest bg-gray-50 px-2 py-0.5 rounded">NIK:
                                                    {{ $row->nik ?? '-' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            {{-- Daftar Surat Pasien Tersebut --}}
                            @foreach($row->suratKeterangan as $suratEntry)
                                <tr
                                    class="hover:bg-gray-50/50 transition-all group border-l-4 border-l-transparent hover:border-l-brand-blue">
                                    <td class="px-8 py-5"></td>
                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-1.5 h-1.5 bg-brand-green rounded-full shadow-[0_0_8px_rgba(16,185,129,0.3)]">
                                            </div>
                                            <span
                                                class="text-xs font-black text-brand-darkblue uppercase tracking-tight">{{ $suratEntry->tipe_berkas }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <span
                                            class="font-mono text-[11px] font-black text-brand-darkblue bg-gray-50 px-3 py-1.5 rounded-lg border border-gray-100 shadow-sm block w-max uppercase tracking-widest">
                                            {{ $suratEntry->nomor_surat }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-5 font-mono text-[10px] text-gray-500">
                                        <div class="space-y-1">
                                            <div class="flex items-center gap-3">
                                                <span class="w-12 text-gray-300 font-bold uppercase tracking-tighter">Tensi:</span>
                                                <span
                                                    class="text-brand-blue font-black underline decoration-brand-blue/20 underline-offset-2">{{ $suratEntry->tensi ?? '-' }}</span>
                                            </div>
                                            <div class="flex items-center gap-3">
                                                <span class="w-12 text-gray-300 font-bold uppercase tracking-tighter">TB/BB:</span>
                                                <span
                                                    class="text-brand-blue font-black underline decoration-brand-blue/20 underline-offset-2">
                                                    {{ $suratEntry->tinggi_badan ?? '-' }} / {{ $suratEntry->berat_badan ?? '-' }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="flex flex-col">
                                            <span
                                                class="text-[10px] font-black text-brand-green uppercase tracking-wider block leading-tight">{{ $suratEntry->dokter->nama_dokter }}</span>
                                            <span
                                                class="text-[9px] text-gray-400 font-bold uppercase tracking-widest mt-0.5">{{ $suratEntry->tipe_berkas }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5 text-center">
                                        <div class="flex flex-col items-center">
                                            <span
                                                class="text-[9px] font-black text-gray-300 uppercase tracking-widest mb-1 leading-none">Terbit
                                                Pada</span>
                                            <span
                                                class="text-xs font-black text-brand-darkblue tracking-tight">{{ \Carbon\Carbon::parse($suratEntry->tanggal_cetak)->format('d/m/Y') }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ url('/admin/buat-surat/cetak/' . $suratEntry->id) }}" target="_blank"
                                                class="w-9 h-9 bg-brand-green text-white rounded-xl flex items-center justify-center shadow-lg shadow-brand-green/10 hover:bg-green-600 hover:-translate-y-0.5 transition-all"
                                                title="Cetak Berkas">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                                </svg>
                                            </a>
                                            <a href="{{ url('/admin/buat-surat/edit/' . $suratEntry->id) }}"
                                                class="w-9 h-9 bg-brand-blue text-white rounded-xl flex items-center justify-center shadow-lg shadow-brand-blue/10 hover:bg-brand-darkblue hover:-translate-y-0.5 transition-all"
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
                                                    onclick="confirmDeletePremium(this, 'Hapus Berkas?', 'Data berkas ini akan dihapus permanen dari sistem.')"
                                                    class="w-9 h-9 bg-red-500 text-white rounded-xl flex items-center justify-center shadow-lg shadow-red-500/10 hover:bg-red-600 hover:-translate-y-0.5 transition-all"
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
                                <td colspan="7" class="px-6 py-40 text-center">
                                    <div class="flex flex-col items-center gap-4">
                                        <div class="w-20 h-20 bg-gray-50 rounded-[2rem] flex items-center justify-center mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-300" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <span class="text-base font-black text-gray-400 uppercase tracking-[0.2em]">Database
                                            Kosong</span>
                                        <p class="text-xs text-gray-400 font-bold uppercase tracking-widest">Belum ada data
                                            surat keterangan yang ditemukan</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-8 py-6 border-t border-gray-50 bg-gray-50/30">
                {{ $pendaftar->appends(request()->all())->links() }}
            </div>
        </div>


    </div>
@endsection