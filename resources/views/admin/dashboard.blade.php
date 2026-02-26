@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@push('styles')
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #cbd5e1;
        }
    </style>
@endpush

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
                <h2 id="greetingText"
                    class="text-base lg:text-2xl font-black text-brand-darkblue tracking-tight truncate leading-tight uppercase">
                    Selamat Datang, Admin!</h2>
                <div class="flex items-center gap-2 mt-0.5">
                    <div class="w-1.5 h-1.5 rounded-full bg-brand-green"></div>
                    <p id="liveClock"
                        class="text-[9px] lg:text-xs text-brand-gray font-bold uppercase tracking-widest truncate">
                        {{ date('d F Y | H:i:s') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-3 lg:gap-6 shrink-0 border-l border-gray-100 pl-4 lg:pl-8 ml-2 lg:ml-4">
            <div class="flex flex-col items-end">
                <span class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Sistem Status</span>
                <span class="text-[10px] font-black text-brand-green flex items-center gap-1.5 uppercase tracking-widest">
                    Operational
                </span>
            </div>
        </div>
    </header>

    <div class="flex-1 overflow-y-auto p-4 lg:p-10 space-y-8 lg:space-y-12 bg-[#f8fafc]">

        <!-- Stats Grid -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-8">
            @php
                $stats = [
                    ['title' => 'Kesehatan Umum', 'val' => $sehat, 'id' => 'stat-sehat', 'color' => 'blue', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'link' => url('/admin/data-surat?type=Kesehatan')],
                    ['title' => 'Kesehatan Jiwa', 'val' => $jiwa, 'id' => 'stat-jiwa', 'color' => 'indigo', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'link' => url('/admin/data-surat?type=Kesehatan+Jiwa')],
                    ['title' => 'Bebas Narkoba', 'val' => $narkoba, 'id' => 'stat-narkoba', 'color' => 'rose', 'icon' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z', 'link' => url('/admin/data-surat?type=Bebas+Narkoba')],
                    ['title' => 'Poli Spesialis', 'val' => $spesialis, 'id' => 'stat-spesialis', 'color' => 'emerald', 'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z', 'link' => url('/admin/data-surat?type=Spesialis')]
                ];
            @endphp

            @foreach($stats as $s)
                <a href="{{ $s['link'] }}"
                    class="bg-white p-6 lg:p-8 rounded-[2.5rem] shadow-sm border border-gray-50 flex flex-col gap-4 group hover:shadow-xl hover:shadow-{{ $s['color'] }}-900/10 transition-all duration-500 hover:-translate-y-2">
                    <div
                        class="w-12 h-12 lg:w-14 lg:h-14 bg-{{ $s['color'] }}-50 rounded-2xl flex items-center justify-center text-{{ $s['color'] }}-500 group-hover:bg-{{ $s['color'] }}-500 group-hover:text-white transition-all duration-500 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-8 lg:w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $s['icon'] }}" />
                        </svg>
                    </div>
                    <div>
                        <span
                            class="text-[10px] lg:text-xs font-black text-gray-400 uppercase tracking-[0.15em] block mb-1">{{ $s['title'] }}</span>
                        <div class="flex items-baseline gap-2">
                            <span id="{{ $s['id'] }}"
                                class="text-3xl lg:text-4xl font-black text-brand-darkblue tracking-tighter">{{ number_format($s['val']) }}</span>
                            <span
                                class="text-[10px] font-black text-{{ $s['color'] }}-500 uppercase tracking-widest">Berkas</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
            <!-- Chart Section -->
            <div
                class="lg:col-span-2 bg-white p-8 lg:p-10 rounded-[3rem] shadow-sm border border-gray-50 transition-all hover:shadow-xl hover:shadow-blue-900/5">
                <div class="flex items-center justify-between mb-10">
                    <div>
                        <h3 class="text-xl font-black text-brand-darkblue uppercase tracking-tight">Grafik Penerbitan</h3>
                        <p class="text-xs text-brand-gray font-bold uppercase tracking-widest mt-1">Trend 6 Bulan Terakhir
                        </p>
                    </div>
                    <div class="flex gap-2">
                        <div class="w-3 h-3 rounded-full bg-brand-blue"></div>
                        <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Surat Keluar</span>
                    </div>
                </div>
                <div class="h-[400px] w-full">
                    <canvas id="monthlyChart"></canvas>
                </div>
            </div>

            <!-- Right Sidebar Dashboard -->
            <div class="space-y-8">
                <!-- Registration Traffic -->
                <div
                    class="bg-gradient-to-br from-brand-darkblue to-blue-900 p-8 lg:p-10 rounded-[3rem] text-white shadow-2xl shadow-blue-900/20 relative overflow-hidden group">
                    <div
                        class="absolute -right-6 -top-6 w-32 h-32 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-all duration-700">
                    </div>
                    <h3 class="text-xs font-black uppercase tracking-[0.2em] opacity-60 mb-8">Antrian Registrasi</h3>
                    <div class="space-y-8">
                        <div>
                            <span class="text-5xl font-black tracking-tighter block mb-2"
                                id="stat-total">{{ number_format($total_pendaftar) }}</span>
                            <span class="text-[10px] font-bold uppercase tracking-widest opacity-80">Total Pendaftar
                                Online</span>
                        </div>
                        <div class="flex items-center gap-6 pt-6 border-t border-white/10">
                            <div>
                                <span class="text-2xl font-black block"
                                    id="stat-pending">{{ number_format($pending) }}</span>
                                <span class="text-[9px] font-black uppercase tracking-widest text-orange-400">Menunggu
                                    Proses</span>
                            </div>
                            <div class="w-px h-10 bg-white/10"></div>
                            <a href="{{ url('/admin/data-pendaftar') }}"
                                class="flex-1 bg-white/10 hover:bg-white/20 py-3 rounded-2xl text-center text-[10px] font-black uppercase tracking-widest transition-all">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white p-8 lg:p-10 rounded-[3rem] shadow-sm border border-gray-50">
                    <h3
                        class="text-xs font-black text-brand-darkblue uppercase tracking-[0.2em] mb-8 flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full bg-brand-blue animate-ping"></span>
                        Aktivitas Terbaru
                    </h3>
                    <div class="space-y-8 custom-scrollbar max-h-[400px] overflow-y-auto pr-2">
                        @forelse($recent_pendaftar as $rp)
                            <div class="flex gap-4 relative">
                                <div
                                    class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center font-black text-brand-blue shrink-0 uppercase shadow-sm">
                                    {{ substr($rp->nama_lengkap, 0, 1) }}
                                </div>
                                <div>
                                    <span
                                        class="text-xs font-black text-brand-darkblue block uppercase tracking-tight">{{ $rp->nama_lengkap }}</span>
                                    <span
                                        class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">{{ $rp->created_at->diffForHumans() }}</span>
                                    <div class="mt-2 flex gap-1">
                                        @foreach(explode(', ', $rp->jenis_test) as $test)
                                            <span
                                                class="text-[8px] font-black bg-gray-50 text-gray-500 px-2 py-0.5 rounded border border-gray-100 uppercase">{{ $test }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-[10px] font-black text-gray-300 uppercase py-10">Belum ada aktivitas</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        window.dashboardConfig = {
            statsUrl: '{{ url("/admin/api/stats") }}',
            chartLabels: {!! json_encode($labels) !!},
            chartData: {!! json_encode($monthly_data) !!}
        };
    </script>
    <script src="{{ asset('js/admin/dashboard.js') }}"></script>
    <script>
        // Realtime Clock
        setInterval(() => {
            const now = new Date();
            const options = { day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
            document.getElementById('liveClock').innerText = now.toLocaleDateString('id-ID', options).replace(',', ' |');
        }, 1000);

        // Realtime Stats Polling
        const updateStats = async () => {
            try {
                const response = await fetch(window.dashboardConfig.statsUrl);
                const data = await response.json();

                // Animate Numbers Helper
                const animateValue = (id, start, end, duration) => {
                    if (start === end) return;
                    const obj = document.getElementById(id);
                    if (!obj) return;
                    let startTimestamp = null;
                    const step = (timestamp) => {
                        if (!startTimestamp) startTimestamp = timestamp;
                        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                        obj.innerHTML = new Intl.NumberFormat('id-ID').format(Math.floor(progress * (end - start) + start));
                        if (progress < 1) {
                            window.requestAnimationFrame(step);
                        } else {
                            obj.innerHTML = new Intl.NumberFormat('id-ID').format(end);
                        }
                    };
                    window.requestAnimationFrame(step);
                };

                // Update elements if data changed
                const smartUpdate = (id, val) => {
                    const el = document.getElementById(id);
                    if (!el) return;
                    const currentVal = parseInt(el.innerText.replace(/\./g, '')) || 0;
                    animateValue(id, currentVal, val, 1000);
                };

                smartUpdate('stat-sehat', data.sehat);
                smartUpdate('stat-jiwa', data.jiwa);
                smartUpdate('stat-narkoba', data.narkoba);
                smartUpdate('stat-spesialis', data.spesialis);
                smartUpdate('stat-total', data.total_pendaftar);
                smartUpdate('stat-pending', data.pending);

            } catch (error) {
                console.error('Failed to fetch realtime stats:', error);
            }
        };

        // Poll every 5 seconds
        setInterval(updateStats, 5000);
    </script>
@endpush