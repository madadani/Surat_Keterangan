<div class="space-y-6">
    <!-- Filters Card -->
    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100 transition-all hover:shadow-md">
        <form wire:submit.prevent="applyFilter" class="flex flex-wrap items-center gap-6">
            <!-- Search -->
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

            <!-- Date Range -->
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-2">
                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Dari</span>
                    <input type="date" wire:model="startDate" value="{{ $startDate }}"
                        class="bg-gray-50 border border-gray-200 rounded-xl py-2 px-3 text-xs font-bold text-brand-darkblue focus:ring-4 focus:ring-brand-blue/10 outline-none">
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Sampai</span>
                    <input type="date" wire:model="endDate" value="{{ $endDate }}"
                        class="bg-gray-50 border border-gray-200 rounded-xl py-2 px-3 text-xs font-bold text-brand-darkblue focus:ring-4 focus:ring-brand-blue/10 outline-none">
                </div>
                <button type="submit"
                    class="flex items-center gap-1.5 px-3 py-2 bg-brand-blue text-white rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-brand-darkblue transition-all shadow-md shadow-brand-blue/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    Terapkan
                </button>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-3 ml-auto">
                {{-- Print Button --}}
                <a href="{{ url('/admin/laporan/' . str_replace(' ', '-', $type) . '/print?start_date=' . $startDate . '&end_date=' . $endDate . '&search=' . $search) }}"
                    target="_blank"
                    class="flex items-center gap-2 px-4 py-2.5 bg-brand-darkblue text-white rounded-xl text-xs font-black uppercase tracking-widest hover:bg-slate-800 transition-all shadow-lg shadow-brand-darkblue/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    Cetak Laporan
                </a>

                {{-- Export Button --}}
                <button type="button" wire:click="exportCsv"
                    class="flex items-center gap-2 px-4 py-2.5 bg-brand-green text-white rounded-xl text-xs font-black uppercase tracking-widest hover:bg-emerald-600 transition-all shadow-lg shadow-brand-green/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Unduh Excel (CSV)
                </button>
            </div>

            <!-- Loading Indicator -->
            <div wire:loading class="flex items-center gap-2">
                <div class="w-4 h-4 border-2 border-brand-blue border-t-transparent rounded-full animate-spin"></div>
                <span class="text-[10px] font-bold text-brand-blue uppercase">Memuat Data...</span>
            </div>
        </form>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden relative">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[1000px]">
                <thead>
                    <tr
                        class="bg-gray-50/80 text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-gray-100">
                        <th class="px-6 py-5 text-center w-12">No</th>
                        <th class="px-6 py-5">Tanggal Cetak</th>
                        <th class="px-6 py-5">Identitas Pasien</th>
                        <th class="px-6 py-5">Nomor Surat</th>
                        <th class="px-6 py-5">Poli / Unit</th>
                        <th class="px-6 py-5">Dokter Pemeriksa</th>
                        <th class="px-6 py-5 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 text-sm font-medium text-gray-700">
                    @forelse($reports as $index => $row)
                        <tr wire:key="row-{{ $row->id }}" class="hover:bg-blue-50/20 transition-colors group">
                            <td class="px-6 py-5 text-center text-gray-400 font-mono text-xs">
                                {{ $reports->firstItem() + $index }}
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex flex-col">
                                    <span
                                        class="text-xs font-black text-brand-darkblue">{{ Carbon\Carbon::parse($row->tanggal_cetak)->format('d/m/Y') }}</span>
                                    <span
                                        class="text-[9px] font-bold text-gray-400 uppercase tracking-tighter">{{ Carbon\Carbon::parse($row->created_at)->format('H:i') }}
                                        WIB</span>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex flex-col gap-0.5">
                                    <span
                                        class="font-black text-brand-darkblue uppercase tracking-tight">{{ $row->pendaftar->nama_lengkap }}</span>
                                    <span
                                        class="text-[10px] font-black text-brand-blue bg-brand-blue/5 px-2 py-0.5 rounded-md w-max">#{{ $row->pendaftar->no_registrasi }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <span
                                    class="text-xs font-mono font-bold text-gray-600 bg-gray-100 px-3 py-1.5 rounded-lg border border-gray-200">{{ $row->nomor_surat }}</span>
                            </td>
                            <td class="px-6 py-5">
                                <span
                                    class="bg-brand-green/10 text-brand-green text-[9px] font-black px-2.5 py-1.5 rounded-lg uppercase tracking-widest border border-brand-green/10">
                                    {{ $row->tipe_berkas }}
                                </span>
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex flex-col">
                                    <span
                                        class="text-xs font-bold text-brand-darkblue uppercase">{{ $row->dokter->nama_dokter }}</span>
                                    <span
                                        class="text-[9px] font-medium text-gray-400 uppercase tracking-wider">{{ $row->dokter->bidang }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ url('/admin/buat-surat/cetak/' . $row->id) }}" target="_blank"
                                        class="w-9 h-9 bg-brand-blue text-white rounded-xl flex items-center justify-center shadow-lg shadow-brand-blue/20 hover:bg-blue-600 hover:-translate-y-0.5 transition-all"
                                        title="Cetak PDF">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                        </svg>
                                    </a>
                                    <a href="{{ url('/admin/buat-surat/rtf/' . $row->id) }}"
                                        class="w-9 h-9 bg-brand-darkblue text-white rounded-xl flex items-center justify-center shadow-lg shadow-brand-darkblue/20 hover:bg-slate-800 hover:-translate-y-0.5 transition-all"
                                        title="Download RTF (Word)">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7"
                                class="px-6 py-32 text-center text-gray-300 font-black uppercase tracking-[0.3em]">
                                Data laporan tidak ditemukan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($reports->hasPages())
            <div class="px-8 py-6 border-t border-gray-50 bg-gray-50/30">
                {{ $reports->links() }}
            </div>
        @endif
    </div>
</div>