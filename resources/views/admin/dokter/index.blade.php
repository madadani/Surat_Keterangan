<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Dokter - RSUD dr. Soeratno Gemolong</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="{{ asset('js/tailwind-config.js') }}"></script>
    <style>
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        body.sidebar-collapsed #sidebar {
            transform: translateX(-100%);
        }

        #sidebar-overlay {
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s;
        }

        body.sidebar-open #sidebar-overlay {
            opacity: 1;
            pointer-events: auto;
        }

        body.sidebar-open #sidebar {
            transform: translateX(0);
        }

        @media (min-width: 1024px) {
            #sidebar {
                position: fixed !important;
                transform: translateX(0);
            }

            main {
                margin-left: 16rem;
                transition: all 0.3s ease;
            }

            body.sidebar-collapsed main {
                margin-left: 0;
            }

            body.sidebar-collapsed #sidebar {
                transform: translateX(-100%);
            }
        }

        @media (max-width: 1023px) {
            main {
                margin-left: 0 !important;
            }
        }
    </style>
</head>

<body
    class="font-sans text-gray-800 bg-gray-50 antialiased h-screen flex overflow-hidden selection:bg-brand-blue selection:text-white">
    <div id="sidebar-overlay" class="fixed inset-0 bg-brand-darkblue/40 backdrop-blur-sm z-30 lg:hidden"></div>
    @include('components.sidebar')

    <main class="flex-1 flex flex-col overflow-hidden relative">
        <header
            class="h-20 bg-white/80 backdrop-blur-md border-b border-gray-200 flex items-center justify-between px-4 lg:px-8 z-10 sticky top-0 transition-all duration-300">
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
                    <h2 class="text-sm lg:text-2xl font-black text-brand-darkblue tracking-tight truncate">Master Data
                        Dokter</h2>
                    <p class="text-[8px] lg:text-xs text-gray-500 font-medium truncate uppercase tracking-widest">
                        Manajemen tenaga medis dan dokter spesialis</p>
                </div>
            </div>

            <div class="flex items-center gap-2 lg:gap-4">
                <a href="{{ url('/admin/data-dokter/tambah') }}"
                    class="bg-brand-blue text-white px-4 py-2 rounded-xl text-xs lg:text-sm font-bold flex items-center gap-2 hover:bg-brand-darkblue shadow-lg shadow-brand-blue/20 transition-all hover:-translate-y-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 lg:h-5 lg:w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Tambah Dokter</span>
                </a>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-4 lg:p-10">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr
                                class="bg-gray-50/80 text-[11px] font-black text-gray-400 uppercase tracking-[0.1em] border-b border-gray-100">
                                <th class="px-6 py-5 text-center w-12">No</th>
                                <th class="px-6 py-5">Nama Dokter</th>
                                <th class="px-6 py-5">NIP / SIP</th>
                                <th class="px-6 py-5">Spesialisasi</th>
                                <th class="px-6 py-5 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 text-sm font-medium text-gray-700">
                            @foreach($dokters as $index => $row)
                                <tr class="hover:bg-blue-50/30 transition-colors">
                                    <td class="px-6 py-5 text-center text-gray-400 font-mono">{{ $index + 1 }}</td>
                                    <td class="px-6 py-5">
                                        <div class="flex flex-col">
                                            <span
                                                class="font-bold text-brand-darkblue uppercase tracking-tight">{{ $row->nama_dokter }}</span>
                                            @if($row->jabatan)
                                                <span class="text-[10px] text-gray-500 font-medium">{{ $row->jabatan }}</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-5 font-mono text-[11px] text-gray-500">
                                        <div class="flex flex-col gap-1">
                                            <span class="flex items-center gap-1.5">
                                                <span
                                                    class="text-[9px] bg-gray-100 px-1.5 py-0.5 rounded text-gray-400 font-black">NIP</span>
                                                {{ $row->nip ?? '-' }}
                                            </span>
                                            <span class="flex items-center gap-1.5">
                                                <span
                                                    class="text-[9px] bg-blue-50 px-1.5 py-0.5 rounded text-brand-blue font-black">SIP</span>
                                                {{ $row->sip ?? '-' }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5 uppercase">
                                        <span
                                            class="bg-brand-blue/10 text-brand-blue px-3 py-1 rounded-full text-[10px] font-black">{{ $row->spesialis }}</span>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ url('/admin/data-dokter/edit/' . $row->id) }}"
                                                class="w-8 h-8 bg-brand-blue text-white rounded-lg flex items-center justify-center shadow-lg shadow-brand-blue/20 hover:bg-blue-600 hover:-translate-y-0.5 transition-all">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <form action="{{ url('/admin/data-dokter/delete/' . $row->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    onclick="confirmDeletePremium(this, 'Hapus Dokter?', 'Data dokter ini akan dihapus permanen.')"
                                                    class="w-8 h-8 bg-red-500 text-white rounded-lg flex items-center justify-center shadow-lg shadow-red-500/20 hover:bg-red-600 hover:-translate-y-0.5 transition-all">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @if($dokters->isEmpty())
                                <tr>
                                    <td colspan="5"
                                        class="px-6 py-20 text-center text-gray-400 font-black uppercase tracking-[0.2em]">
                                        Data dokter tidak ditemukan</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/admin/common.js') }}"></script>
    <script>
        @if(session('success'))
            showSuccessAlert("{{ session('success') }}");
        @endif

        @if(session('error'))
            showErrorAlert('Gagal!', "{{ session('error') }}");
        @endif
    </script>
</body>

</html>