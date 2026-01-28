@extends('layouts.admin')

@section('title', 'Tambah Pendaftar')

@section('content')
    <!-- Header -->
    <header
        class="h-20 lg:h-24 bg-white/80 backdrop-blur-md border-b border-gray-100 flex items-center justify-between px-4 lg:px-8 z-10 sticky top-0 transition-all duration-300">
        <div class="flex items-center gap-3 lg:gap-4 flex-1">
            <button id="sidebarToggle"
                class="w-10 h-10 lg:w-12 lg:h-12 flex items-center justify-center rounded-2xl bg-gray-50 text-brand-darkblue hover:bg-brand-blue hover:text-white transition-all shadow-sm border border-gray-100 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div class="truncate">
                <h2 class="text-sm lg:text-2xl font-black text-brand-darkblue tracking-tight truncate uppercase">Registrasi
                    Pasien Baru</h2>
                <p class="text-[8px] lg:text-xs text-brand-gray font-medium truncate uppercase tracking-widest mt-0.5">Input
                    data pendaftar secara manual</p>
            </div>
        </div>
        <a href="{{ url('/admin/data-pendaftar') }}"
            class="w-10 h-10 lg:w-12 lg:h-12 flex items-center justify-center rounded-2xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all shadow-sm border border-red-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </a>
    </header>

    <div class="flex-1 overflow-y-auto p-4 lg:p-10 bg-[#fbfcfd]">
        <div class="max-w-4xl mx-auto">
            <form action="{{ url('/admin/data-pendaftar/tambah') }}" method="POST"
                class="bg-white rounded-[2.5rem] shadow-2xl shadow-blue-900/5 border border-gray-100 overflow-hidden mb-20 animate__animated animate__fadeIn">
                @csrf
                @include('admin.partials.pendaftar_fields')
            </form>
        </div>
    </div>
@endsection