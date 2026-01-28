<aside id="sidebar"
    class="fixed inset-y-0 left-0 w-64 bg-brand-darkblue text-white flex flex-col shadow-2xl z-40 transition-all duration-300 -translate-x-full lg:translate-x-0">
    <!-- Brand -->
    <div class="h-20 flex items-center gap-3 px-6 border-b border-white/10">
        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center shadow-lg">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
        </div>
        <div>
            <h1 class="font-black text-lg tracking-tight leading-none">ADMIN</h1>
            <p class="text-[10px] text-white/60 font-medium tracking-widest uppercase">RSUD Gemolong</p>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 py-6 px-3 space-y-1 overflow-y-auto">
        <p class="px-3 text-xs font-bold text-white/40 uppercase tracking-wider mb-2">Main Menu</p>

        <!-- Dashboard -->
        <a href="{{ url('/admin/dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 {{ request()->is('admin/dashboard') ? 'bg-brand-blue rounded-xl shadow-lg shadow-brand-blue/20 text-white font-bold' : 'text-white/70 hover:bg-white/5 hover:text-white rounded-xl font-medium' }} transition-all group">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 {{ request()->is('admin/dashboard') ? '' : 'group-hover:text-brand-green' }} transition-colors"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
            <span>Dashboard</span>
        </a>

        <!-- Data Pendaftar -->
        <a href="{{ url('/admin/data-pendaftar') }}"
            class="flex items-center gap-3 px-4 py-3 {{ request()->is('admin/data-pendaftar*') ? 'bg-brand-blue rounded-xl shadow-lg shadow-brand-blue/20 text-white font-bold' : 'text-white/70 hover:bg-white/5 hover:text-white rounded-xl font-medium' }} transition-all group">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 {{ request()->is('admin/data-pendaftar*') ? '' : 'group-hover:text-brand-green' }} transition-colors"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <span>Data Pendaftar</span>
        </a>

        <!-- Data Dokter -->
        <a href="{{ url('/admin/data-dokter') }}"
            class="flex items-center gap-3 px-4 py-3 {{ request()->is('admin/data-dokter*') ? 'bg-brand-blue rounded-xl shadow-lg shadow-brand-blue/20 text-white font-bold' : 'text-white/70 hover:bg-white/5 hover:text-white rounded-xl font-medium' }} transition-all group">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 {{ request()->is('admin/data-dokter*') ? '' : 'group-hover:text-brand-green' }} transition-colors"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <span>Data Dokter</span>
        </a>

        <!-- Buat Surat -->
        <a href="{{ url('/admin/buat-surat') }}"
            class="flex items-center gap-3 px-4 py-3 {{ request()->is('admin/buat-surat*') ? 'bg-brand-blue rounded-xl shadow-lg shadow-brand-blue/20 text-white font-bold' : 'text-white/70 hover:bg-white/5 hover:text-white rounded-xl font-medium' }} transition-all group">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 {{ request()->is('admin/buat-surat*') ? '' : 'group-hover:text-brand-green' }} transition-colors"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Buat Surat</span>
        </a>

        <!-- Manajemen Berkas -->
        <a href="{{ url('/admin/data-surat') }}"
            class="flex items-center gap-3 px-4 py-3 {{ request()->is('admin/data-surat*') ? 'bg-brand-blue rounded-xl shadow-lg shadow-brand-blue/20 text-white font-bold' : 'text-white/70 hover:bg-white/5 hover:text-white rounded-xl font-medium' }} transition-all group">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 {{ request()->is('admin/data-surat*') ? '' : 'group-hover:text-brand-green' }} transition-colors"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <span>Manajemen Berkas</span>
        </a>

        <p class="px-3 text-xs font-bold text-white/40 uppercase tracking-wider mb-2 mt-6">System</p>

        <a href="{{ url('/admin/logout') }}"
            class="flex items-center gap-3 px-4 py-3 text-red-300 hover:bg-red-500/10 hover:text-red-200 rounded-xl font-medium transition-all group mt-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <span>Keluar</span>
        </a>
    </nav>

    <!-- User Mini Profile -->
    <div class="p-4 bg-black/20 backdrop-blur-sm">
        <div class="flex items-center gap-3">
            <div
                class="w-10 h-10 rounded-full bg-gradient-to-tr from-brand-green to-brand-blue flex items-center justify-center text-white font-bold border-2 border-white/20">
                AD</div>
            <div class="overflow-hidden">
                <h4 class="text-sm font-bold text-white truncate">Admin RSUD Gemolong</h4>
                <p class="text-xs text-brand-green truncate">● Online</p>
            </div>
        </div>
    </div>
</aside>