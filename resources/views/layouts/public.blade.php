<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Surat Keterangan - RSUD dr. Soeratno Gemolong</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Dependencies -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            blue: '#0288D1',
                            darkblue: '#1A237E',
                            green: '#00C853',
                            orange: '#F47C00',
                            yellow: '#FFC107',
                            light: '#F0F9FF',
                        }
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        outfit: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #f8fafc;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
    <style>
        @keyframes shimmer {
            100% {
                transform: translateX(100%);
            }
        }

        .animate-shimmer {
            animation: shimmer 2s infinite;
        }

        @keyframes bounce-x {

            0%,
            100% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(5px);
            }
        }

        .animate-bounce-x {
            animation: bounce-x 1s infinite;
        }
    </style>
    @livewireStyles
</head>

<body class="font-sans text-slate-900 antialiased overflow-x-hidden scroll-smooth">
    <nav class="fixed top-0 w-full z-50 bg-slate-800/80 backdrop-blur-xl border-b border-white/10 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 sm:h-20 items-center">
                <!-- Logo & Clock Section -->
                <div class="flex items-center gap-4 sm:gap-8">
                    <a href="{{ url('/') }}"
                        class="flex items-center gap-3 group transition-transform hover:scale-[1.02] active:scale-95">
                        <div
                            class="p-1.5 bg-white/10 backdrop-blur-md rounded-xl border border-white/20 group-hover:bg-white/20 transition-all">
                            <img src="{{ asset('images/logo.png') }}" class="h-8 sm:h-10 w-auto" alt="Logo RSUD">
                        </div>
                        <div class="flex flex-col">
                            <span
                                class="font-outfit font-black text-white leading-tight text-sm sm:text-lg tracking-tight uppercase">Pendaftaran</span>
                            <span
                                class="font-outfit font-black text-brand-blue leading-tight text-[10px] sm:text-[12px] tracking-[0.2em] uppercase">Test
                                Kesehatan</span>
                        </div>
                    </a>

                    <!-- Realtime Clock (Desktop) -->
                    <div
                        class="hidden lg:flex items-center gap-3 px-4 py-2 bg-white/5 rounded-xl border border-white/10 shadow-inner">
                        <div
                            class="w-1.5 h-1.5 rounded-full bg-brand-green animate-pulse shadow-[0_0_8px_rgba(0,200,83,0.5)]">
                        </div>
                        <span id="realtime-clock"
                            class="text-[9px] font-black text-white/90 uppercase tracking-widest whitespace-nowrap">Memuat
                            Waktu...</span>
                    </div>
                </div>

                <div class="flex items-center gap-2 sm:gap-6">
                    <!-- Contact Section (Desktop) -->
                    <div class="hidden md:flex flex-col items-end">
                        <span class="text-[8px] font-black text-white/40 uppercase tracking-widest mb-0.5">Butuh
                            Bantuan?</span>
                        <a href="https://wa.me/628983010000" class="flex items-center gap-2 group">
                            <div class="flex flex-col items-end">
                                <span
                                    class="text-[10px] font-black text-white group-hover:text-brand-green transition-colors uppercase tracking-tight">Hubungi
                                    Kami</span>
                                <span class="text-[9px] font-bold text-brand-green">08983010000</span>
                            </div>
                            <div
                                class="w-8 h-8 bg-white/5 rounded-lg border border-white/10 flex items-center justify-center group-hover:bg-brand-green group-hover:text-white group-hover:border-brand-green transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                        </a>
                    </div>

                    <div class="h-8 w-[1px] bg-white/10 hidden md:block"></div>

                    <div class="relative group hidden sm:block">
                        <div
                            class="absolute -inset-0.5 bg-gradient-to-r from-brand-green via-brand-blue to-brand-orange rounded-xl blur opacity-20 group-hover:opacity-60 transition duration-500">
                        </div>
                        <a href="{{ url('/admin/login') }}"
                            class="relative flex items-center gap-2 px-5 py-2.5 bg-brand-darkblue text-white text-[9px] font-black uppercase tracking-widest rounded-xl hover:bg-brand-green transition-all duration-300 active:scale-95 border-b border-white/10 overflow-hidden group">
                            <span class="relative z-10 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-3.5 w-3.5 text-brand-green group-hover:text-white transition-colors animate-bounce-x"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                <span>Login Admin</span>
                            </span>
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:animate-shimmer">
                            </div>
                        </a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button type="button" onclick="toggleMobileMenu()"
                        class="p-2 text-white hover:bg-white/10 rounded-xl transition-colors lg:hidden">
                        <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu"
            class="hidden fixed inset-0 z-[-1] bg-brand-darkblue/40 backdrop-blur-sm lg:hidden transition-opacity duration-300 opacity-0"
            onclick="toggleMobileMenu()"></div>

        <!-- Mobile Menu Panel -->
        <div id="mobile-panel"
            class="hidden lg:hidden absolute top-full left-0 w-full bg-white border-b border-slate-100 shadow-2xl transform -translate-y-4 opacity-0 transition-all duration-300 ease-out">
            <div class="p-6 flex flex-col gap-4">
                <div class="flex flex-col gap-2 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                    <div class="flex items-center justify-between">
                        <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Kontak
                            Bantuan</span>
                        <div class="w-2 h-2 rounded-full bg-brand-green animate-pulse"></div>
                    </div>
                    <a href="https://wa.me/628983010000"
                        class="text-xs font-black text-brand-darkblue flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-brand-green" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        08983010000
                    </a>
                </div>

                <div class="h-px bg-slate-100 my-2"></div>

                <div class="relative group">
                    <div
                        class="absolute -inset-0.5 bg-gradient-to-r from-brand-green via-brand-blue to-brand-orange rounded-xl blur opacity-20 group-hover:opacity-60 transition duration-500">
                    </div>
                    <a href="{{ url('/admin/login') }}"
                        class="relative px-4 py-5 bg-brand-darkblue text-white text-[11px] font-black uppercase tracking-[0.2em] rounded-xl flex items-center justify-center gap-4 hover:bg-brand-green transition-all duration-300 overflow-hidden">
                        <span class="relative z-10 flex items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-brand-green group-hover:text-white transition-colors animate-bounce-x"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Panel Login Admin
                        </span>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:animate-shimmer">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <script>
        function updateClock() {
            const clock = document.getElementById('realtime-clock');
            if (!clock) return;

            const now = new Date();
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

            const dayName = days[now.getDay()];
            const day = String(now.getDate()).padStart(2, '0');
            const month = months[now.getMonth()];
            const year = now.getFullYear();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');

            clock.innerText = `${dayName}, ${day} ${month} ${year} • ${hours}:${minutes}:${seconds}`;
        }

        setInterval(updateClock, 1000);
        document.addEventListener('DOMContentLoaded', updateClock);

        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const panel = document.getElementById('mobile-panel');
            const icon = document.getElementById('menu-icon');

            if (panel.classList.contains('hidden')) {
                // Open
                menu.classList.remove('hidden');
                panel.classList.remove('hidden');
                setTimeout(() => {
                    menu.classList.add('opacity-100');
                    panel.classList.remove('-translate-y-4', 'opacity-0');
                    panel.classList.add('translate-y-0', 'opacity-100');
                }, 10);
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />';
            } else {
                // Close
                menu.classList.remove('opacity-100');
                panel.classList.remove('translate-y-0', 'opacity-100');
                panel.classList.add('-translate-y-4', 'opacity-0');
                setTimeout(() => {
                    menu.classList.add('hidden');
                    panel.classList.add('hidden');
                }, 300);
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />';
            }
        }
    </script>

    <main class="pt-16 sm:pt-20">
        @yield('content')
    </main>

    <footer class="bg-brand-darkblue backdrop-blur-xl border-t border-white/10 py-5">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-sm text-white">&copy; {{ date('Y') }} IT RSUD dr. Soeratno Gemolong. All Rights Reserved
            </p>
        </div>
    </footer>

    <!-- Essential Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
        <script>         Swal.fire({ title: 'Data Berhasil Disimpan!', text: "{{ session('success') }}", icon: 'success', iconColor: '#00C853', background: '#ffffff', showClass: { popup: 'animate__animated animate__zoomIn animate__faster' }, hideClass: { popup: 'animate__animated animate__fadeOutUp animate__faster' }, customClass: { popup: 'rounded-[2rem] border-none shadow-2xl', title: 'font-outfit font-black text-brand-darkblue uppercase tracking-tight', htmlContainer: 'font-sans font-bold text-slate-500', confirmButton: 'px-10 py-4 bg-brand-darkblue text-white rounded-2xl font-black uppercase tracking-[0.2em] text-[10px] hover:bg-brand-green transition-all duration-300 shadow-xl shadow-brand-darkblue/20' }, buttonsStyling: false, confirmButtonText: 'SELESAI', });
        </script>
    @endif

    @stack('scripts')
    @livewireScripts
</body>

</html>