<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dokter - RSUD dr. Soeratno Gemolong</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="{{ asset('js/tailwind-config.js') }}"></script>
</head>

<body
    class="font-sans text-gray-800 bg-gray-50 antialiased h-screen flex overflow-hidden selection:bg-brand-blue selection:text-white">
    <!-- Mobile Sidebar Overlay -->
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
                    <h2 class="text-sm lg:text-2xl font-black text-brand-darkblue tracking-tight truncate">Tambah Data
                        Dokter</h2>
                    <p class="text-[8px] lg:text-xs text-gray-500 font-medium truncate uppercase tracking-widest">
                        Daftarkan tenaga medis baru ke dalam sistem</p>
                </div>
            </div>

            <a href="{{ url('/admin/data-dokter') }}"
                class="text-gray-400 hover:text-brand-blue transition-all shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-8 lg:w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </header>

        <div class="flex-1 overflow-y-auto p-10">
            <div class="max-w-2xl mx-auto">
                <form action="{{ url('/admin/data-dokter/tambah') }}" method="POST"
                    class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                    @csrf
                    <div class="p-10 space-y-6">
                        <div>
                            <label class="block text-sm font-black text-gray-400 uppercase tracking-widest mb-2">Nama
                                Lengkap Dokter</label>
                            <input type="text" name="nama_dokter" required placeholder="Contoh: dr. Nama Lengkap, Sp.A"
                                class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 font-bold text-brand-darkblue focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all outline-none">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label
                                    class="block text-sm font-black text-gray-400 uppercase tracking-widest mb-2">NIP</label>
                                <input type="text" name="nip" placeholder="Masukkan NIP"
                                    class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 font-bold text-brand-darkblue focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all outline-none">
                            </div>
                            <div>
                                <label
                                    class="block text-sm font-black text-gray-400 uppercase tracking-widest mb-2">SIP</label>
                                <input type="text" name="sip" placeholder="Masukkan SIP"
                                    class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 font-bold text-brand-darkblue focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all outline-none">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-black text-gray-400 uppercase tracking-widest mb-2">Jabatan
                                /
                                Posisi</label>
                            <input type="text" name="jabatan" placeholder="Contoh: Kepala Bidang Pelayanan"
                                class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 font-bold text-brand-darkblue focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all outline-none">
                        </div>

                        <div>
                            <label
                                class="block text-sm font-black text-gray-400 uppercase tracking-widest mb-2">Spesialisasi</label>
                            <select name="spesialis" required
                                class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 font-bold text-brand-darkblue focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all outline-none appearance-none">
                                <option value="">-- Pilih Spesialis --</option>
                                <option value="Umum">Umum</option>
                                <option value="Psikiatri">Psikiatri (Jiwa)</option>
                                <option value="Mata">Mata</option>
                                <option value="THT">THT</option>
                                <option value="Gigi">Gigi</option>
                                <option value="Paru">Paru</option>
                                <option value="Penyakit Dalam">Penyakit Dalam</option>
                                <option value="Orthopedi">Orthopedi</option>
                                <option value="Jantung">Jantung</option>
                            </select>
                        </div>

                        <div class="pt-6">
                            <button type="submit"
                                class="w-full bg-brand-blue text-white py-4 rounded-2xl font-black uppercase tracking-widest shadow-lg shadow-brand-blue/20 hover:bg-brand-darkblue transition-all duration-300">SIMPAN
                                DATA DOKTER</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Sidebar Toggle Logic
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarOverlay = document.getElementById('sidebar-overlay');
        const body = document.body;

        function toggleSidebar() {
            if (window.innerWidth >= 1024) {
                body.classList.toggle('sidebar-collapsed');
                localStorage.setItem('sidebarCollapsed', body.classList.contains('sidebar-collapsed'));
            } else {
                body.classList.toggle('sidebar-open');
            }
        }

        if (window.innerWidth >= 1024 && localStorage.getItem('sidebarCollapsed') === 'true') {
            body.classList.add('sidebar-collapsed');
        }

        sidebarToggle.addEventListener('click', toggleSidebar);
        sidebarOverlay.addEventListener('click', toggleSidebar);

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Gagal Menyimpan',
                html: '<div class="text-left text-sm mt-4">@foreach($errors->all() as $error)<p>• {{ $error }}</p>@endforeach</div>',
                confirmButtonColor: '#ef4444'
            });
        @endif
    </script>
</body>

</html>