@extends('layouts.admin')

@section('title', 'Data Pendaftar')

@section('content')
    <!-- Header -->
    <header class="h-20 lg:h-24 bg-white/80 backdrop-blur-md border-b border-gray-100 flex items-center justify-between px-4 lg:px-8 z-10 sticky top-0 transition-all duration-300">
        <div class="flex items-center gap-3 lg:gap-4 flex-1">
            <button id="sidebarToggle"
                class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-50 text-brand-darkblue hover:bg-brand-blue hover:text-white transition-all shadow-sm border border-gray-100 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div class="truncate">
                <h2 class="text-sm lg:text-2xl font-black text-brand-darkblue tracking-tight truncate uppercase">Master Data Pendaftar</h2>
                <p class="text-[8px] lg:text-xs text-brand-gray font-medium truncate uppercase tracking-widest mt-0.5">Kelola data pendaftaran pasien</p>
            </div>
        </div>

        <div class="flex items-center gap-2 lg:gap-4 flex-wrap justify-end">
            <a href="{{ url('/admin/data-pendaftar/tambah') }}"
                class="bg-brand-blue text-white px-4 py-2.5 rounded-xl text-xs lg:text-sm font-black uppercase tracking-widest flex items-center gap-2 hover:bg-brand-darkblue shadow-lg shadow-brand-blue/20 transition-all hover:-translate-y-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 lg:h-5 lg:w-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span class="hidden sm:inline">Tambah Pendaftar</span>
                <span class="sm:hidden">Tambah</span>
            </a>
        </div>
    </header>

    <!-- Content Body -->
    <div class="flex-1 overflow-y-auto p-4 lg:p-10 space-y-6 lg:space-y-8">

        <!-- Filters Card -->
        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100 mb-6 transition-all hover:shadow-md">
            <form action="{{ url('/admin/data-pendaftar') }}" method="GET"
                class="flex flex-wrap items-center gap-6">
                <div class="flex items-center flex-1 max-w-sm">
                    <div class="relative w-full group">
                        <input type="text" name="search" placeholder="Cari nama atau no registrasi..."
                            value="{{ request('search') }}"
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl py-2.5 pl-11 pr-4 text-sm font-bold text-brand-darkblue focus:ring-4 focus:ring-brand-blue/10 focus:bg-white focus:border-brand-blue transition-all outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 absolute left-4 top-3 text-gray-400 group-focus-within:text-brand-blue transition-colors" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <button type="submit"
                        class="bg-brand-orange text-white px-8 py-2.5 rounded-xl text-xs font-black uppercase tracking-widest shadow-lg shadow-brand-orange/20 hover:bg-orange-600 transition-all flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Cari Data
                    </button>
                    @if(request('search'))
                        <a href="{{ url('/admin/data-pendaftar') }}"
                            class="bg-red-50 text-red-600 px-6 py-2.5 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-red-100 transition-all">Reset</a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[1200px]">
                    <thead>
                        <tr class="bg-gray-50/80 text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-gray-100">
                            <th class="px-6 py-5 text-center w-12">No</th>
                            <th class="px-6 py-5">Identitas Pasien</th>
                            <th class="px-6 py-5">TB / BB</th>
                            <th class="px-6 py-5 whitespace-nowrap">Tempat, Tgl Lahir</th>
                            <th class="px-6 py-5">Gender</th>
                            <th class="px-6 py-5">Kontak & Alamat</th>
                            <th class="px-6 py-5">Keperluan & Test</th>
                            <th class="px-6 py-5 text-center">Status</th>
                            <th class="px-6 py-5 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 text-sm font-medium text-gray-700">
                        @foreach($pendaftar as $index => $row)
                            <tr class="hover:bg-blue-50/20 transition-colors group">
                                <td class="px-6 py-5 text-center text-gray-400 font-mono text-xs">
                                    {{ $pendaftar->firstItem() + $index }}
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex flex-col gap-0.5">
                                        <span class="font-black text-brand-darkblue uppercase tracking-tight">{{ $row->nama_lengkap }}</span>
                                        <span class="text-[10px] font-black text-brand-blue bg-brand-blue/5 px-2 py-0.5 rounded-md w-max">#{{ $row->no_registrasi }}</span>
                                    </div>
                                    <div class="mt-2 text-[10px] font-bold text-gray-400 uppercase">{{ $row->pekerjaan ?? '-' }}</div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-1.5 font-mono text-[11px] font-bold text-gray-600">
                                        <span class="bg-gray-100 px-2 py-1 rounded">{{ $row->tinggi_badan ?? '-' }}</span>
                                        <span class="text-gray-300">/</span>
                                        <span class="bg-gray-100 px-2 py-1 rounded">{{ $row->berat_badan ?? '-' }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex flex-col gap-0.5">
                                        <span class="text-xs font-black text-gray-900 uppercase tracking-tight">{{ $row->tempat_lahir }}</span>
                                        <span class="text-[10px] text-gray-400 font-bold uppercase">{{ \Carbon\Carbon::parse($row->tanggal_lahir)->format('d F Y') }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="{{ $row->jenis_kelamin == 'Wanita' ? 'bg-orange-100 text-orange-600' : 'bg-blue-100 text-blue-600' }} text-[9px] font-black px-2.5 py-1.5 rounded-lg uppercase tracking-widest">{{ $row->jenis_kelamin }}</span>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex flex-col gap-2">
                                        <div class="flex items-center gap-2 text-xs font-bold text-brand-darkblue/70">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                            {{ $row->no_hp ?? '-' }}
                                        </div>
                                        <p class="text-[10px] text-gray-400 italic line-clamp-2 uppercase font-medium max-w-[180px]">
                                            {{ $row->alamat }}
                                        </p>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex flex-col gap-2">
                                        <span class="text-[10px] font-black text-gray-400 uppercase tracking-wider">{{ $row->keperluan }}</span>
                                        <div class="flex flex-wrap gap-1">
                                            @foreach(explode(', ', $row->jenis_test) as $test)
                                                <span class="text-[9px] font-black text-brand-green bg-brand-green/10 px-2 py-1 rounded uppercase tracking-tighter">{{ $test }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5 text-center">
                                    @php
                                        $statusClasses = [
                                            'Pending' => 'bg-blue-50 text-blue-600 border-blue-100',
                                            'Proses' => 'bg-orange-50 text-orange-600 border-orange-100',
                                            'Selesai' => 'bg-green-50 text-green-600 border-green-100',
                                        ];
                                        $cls = $statusClasses[$row->status] ?? 'bg-gray-50 text-gray-600 border-gray-100';
                                    @endphp
                                    <span class="{{ $cls }} px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest border">
                                        {{ $row->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ url('/admin/buat-surat') }}?pendaftar_id={{ $row->id }}"
                                            class="w-9 h-9 bg-brand-green text-white rounded-xl flex items-center justify-center shadow-lg shadow-brand-green/20 hover:bg-green-600 hover:-translate-y-0.5 transition-all"
                                            title="Terima & Buat Surat">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                            </svg>
                                        </a>
                                        <a href="{{ url('/admin/data-pendaftar/edit/' . $row->id) }}"
                                            class="w-9 h-9 bg-brand-blue text-white rounded-xl flex items-center justify-center shadow-lg shadow-brand-blue/20 hover:bg-blue-600 hover:-translate-y-0.5 transition-all"
                                            title="Edit Data">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ url('/admin/data-pendaftar/delete/' . $row->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDeletePremium(this, 'Hapus Pendaftar?', 'Seluruh riwayat pendaftaran {{ $row->nama_lengkap }} akan dihapus secara permanen.')"
                                                class="w-9 h-9 bg-red-500 text-white rounded-xl flex items-center justify-center shadow-lg shadow-red-500/20 hover:bg-red-600 hover:-translate-y-0.5 transition-all"
                                                title="Hapus Data">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @if($pendaftar->isEmpty())
                            <tr>
                                <td colspan="9" class="px-6 py-32 text-center text-gray-300 font-black uppercase tracking-[0.3em]">
                                    Data pendaftar tidak ditemukan
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-8 py-6 border-t border-gray-50 bg-gray-50/30">
                {{ $pendaftar->links() }}
            </div>
        </div>

    </div>
@endsection