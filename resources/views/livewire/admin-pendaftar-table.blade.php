<div wire:poll.10s>
    <!-- Filters Card -->
    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100 mb-6 transition-all hover:shadow-md">
        <div class="flex flex-wrap items-center gap-6">
            <div class="flex items-center flex-1 max-w-sm">
                <div class="relative w-full group">
                    <input type="text" wire:model.debounce.500ms="search" placeholder="Cari nama atau no registrasi..."
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl py-2.5 pl-11 pr-4 text-sm font-bold text-brand-darkblue focus:ring-4 focus:ring-brand-blue/10 focus:bg-white focus:border-brand-blue transition-all outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 absolute left-4 top-3 text-gray-400 group-focus-within:text-brand-blue transition-colors"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <select wire:model="status"
                    class="bg-white border border-gray-200 rounded-xl py-2.5 px-4 text-xs font-black uppercase tracking-widest text-brand-darkblue focus:ring-4 focus:ring-brand-blue/10 outline-none cursor-pointer">
                    <option value="">SEMUA STATUS</option>
                    <option value="Queue">DALAM ANTRIAN</option>
                    <option value="Selesai">SELESAI</option>
                    <option value="Batal">DIBATALKAN</option>
                </select>

                @if($search || $status)
                    <button wire:click="resetFilters"
                        class="bg-red-50 text-red-600 px-6 py-2.5 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-red-100 transition-all">
                        Reset
                    </button>
                @endif
            </div>

            <div wire:loading wire:target="search, status" class="flex items-center gap-2">
                <div class="w-4 h-4 border-2 border-brand-blue border-t-transparent rounded-full animate-spin"></div>
                <span class="text-[10px] font-bold text-brand-blue uppercase">Sinkronisasi...</span>
            </div>
        </div>
    </div>



    <!-- Table Card -->
    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden relative">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[1200px]">
                <thead>
                    <tr
                        class="bg-gray-50/80 text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-gray-100">
                        <th class="px-6 py-5 text-center w-12">No</th>
                        <th class="px-6 py-5">Identitas Pasien</th>
                        <th class="px-6 py-5">TB / BB</th>
                        <th class="px-6 py-5 whitespace-nowrap">Tempat, Tgl Lahir</th>
                        <th class="px-6 py-5">Gender</th>
                        <th class="px-6 py-5">Kontak & Alamat</th>
                        <th class="px-6 py-5">Keperluan & Test</th>
                        <th class="px-6 py-5 text-right">Estimasi Biaya</th>
                        <th class="px-6 py-5 text-center">Status</th>
                        <th class="px-6 py-5 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 text-sm font-medium text-gray-700">
                    @forelse($pendants as $index => $row)
                        <tr wire:key="row-{{ $row->id }}" class="hover:bg-blue-50/20 transition-colors group">
                            <td class="px-6 py-5 text-center text-gray-400 font-mono text-xs">
                                {{ $pendants->firstItem() + $index }}
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex flex-col gap-0.5">
                                    <span
                                        class="font-black text-brand-darkblue uppercase tracking-tight">{{ $row->nama_lengkap }}</span>
                                    <span
                                        class="text-[10px] font-black text-brand-blue bg-brand-blue/5 px-2 py-0.5 rounded-md w-max">#{{ $row->no_registrasi }}</span>
                                </div>
                                <div class="mt-2 text-[10px] font-bold text-gray-400 uppercase">{{ $row->pekerjaan ?? '-' }}
                                </div>
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
                                    <span
                                        class="text-xs font-black text-gray-900 uppercase tracking-tight">{{ $row->tempat_lahir }}</span>
                                    <span
                                        class="text-[10px] text-gray-400 font-bold uppercase">{{ \Carbon\Carbon::parse($row->tanggal_lahir)->format('d F Y') }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-5 text-center">
                                @php
                                    $genderCls = (in_array($row->jenis_kelamin, ['Perempuan', 'Wanita', 'P'])) ? 'bg-orange-100 text-orange-600' : 'bg-blue-100 text-blue-600';
                                @endphp
                                <span
                                    class="{{ $genderCls }} text-[9px] font-black px-2.5 py-1.5 rounded-lg uppercase tracking-widest">
                                    {{ $row->jenis_kelamin }}
                                </span>
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex flex-col gap-2">
                                    <div class="flex items-center gap-2 text-xs font-bold text-brand-darkblue/70">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        {{ $row->no_hp ?? '-' }}
                                    </div>
                                    <p
                                        class="text-[10px] text-gray-400 italic line-clamp-2 uppercase font-medium max-w-[180px]">
                                        {{ $row->alamat }}
                                    </p>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex flex-col gap-2">
                                    <span
                                        class="text-[10px] font-black text-gray-400 uppercase tracking-wider">{{ $row->keperluan }}</span>
                                    <div class="flex flex-wrap gap-1">
                                        @foreach(explode(', ', $row->jenis_test) as $test)
                                            <span
                                                class="text-[9px] font-black text-brand-green bg-brand-green/10 px-2 py-1 rounded uppercase tracking-tighter">{{ $test }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5 text-right">
                                @php
                                    $total = 0;
                                    foreach (explode(', ', $row->jenis_test) as $test) {
                                        $total += $prices[$test] ?? 0;
                                    }
                                @endphp
                                <div class="flex flex-col items-end">
                                    <div class="flex items-baseline gap-1">
                                        <span class="text-[10px] font-bold text-gray-400 uppercase">Rp</span>
                                        <span
                                            class="text-sm font-black text-brand-darkblue tracking-tight">{{ number_format($total, 0, ',', '.') }}</span>
                                    </div>
                                    <span
                                        class="text-[8px] font-bold text-gray-300 uppercase tracking-widest mt-0.5">ESTIMASI</span>
                                </div>
                            </td>
                            <td class="px-6 py-5 text-center">
                                @php
                                    $statusClasses = [
                                        'Pending' => 'bg-blue-50 text-blue-600 border-blue-100',
                                        'Proses' => 'bg-orange-50 text-orange-600 border-orange-100',
                                        'Selesai' => 'bg-green-50 text-green-600 border-green-100',
                                        'Batal' => 'bg-red-50 text-red-600 border-red-100'
                                    ];
                                    $cls = $statusClasses[$row->status] ?? 'bg-gray-50 text-gray-600 border-gray-100';
                                @endphp
                                <span
                                    class="{{ $cls }} px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest border">
                                    {{ $row->status }}
                                </span>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ url('/admin/buat-surat') }}?pendaftar_id={{ $row->id }}"
                                        class="w-9 h-9 bg-brand-green text-white rounded-xl flex items-center justify-center shadow-lg shadow-brand-green/20 hover:bg-green-600 hover:-translate-y-0.5 transition-all"
                                        title="Terima & Buat Surat">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                    </a>
                                    <a href="{{ url('/admin/data-pendaftar/edit/' . $row->id) }}"
                                        class="w-9 h-9 bg-brand-blue text-white rounded-xl flex items-center justify-center shadow-lg shadow-brand-blue/20 hover:bg-blue-600 hover:-translate-y-0.5 transition-all"
                                        title="Edit Data">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ url('/admin/data-pendaftar/delete/' . $row->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            onclick="confirmDeletePremium(this, 'Hapus Pendaftar?', 'Seluruh riwayat pendaftaran {{ $row->nama_lengkap }} akan dihapus secara permanen.')"
                                            class="w-9 h-9 bg-red-500 text-white rounded-xl flex items-center justify-center shadow-lg shadow-red-500/20 hover:bg-red-600 hover:-translate-y-0.5 transition-all"
                                            title="Hapus Data">
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
                            <td colspan="10"
                                class="px-6 py-32 text-center text-gray-300 font-black uppercase tracking-[0.3em]">
                                Data pendaftar tidak ditemukan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($pendants->hasPages())
            <div class="px-8 py-6 border-t border-gray-50 bg-gray-50/30">
                {{ $pendants->links() }}
            </div>
        @endif
    </div>
</div>