@extends('layouts.admin')

@section('title', 'Laporan ' . $type)

@section('content')
    <div class="flex-1 overflow-y-auto p-4 md:p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Breadcrumb & Navigation -->
            <div class="flex items-center gap-2 mb-6">
                <a href="{{ url('/admin/laporan') }}"
                    class="text-gray-400 hover:text-brand-blue font-bold text-[10px] uppercase tracking-widest transition-colors flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Laporan
                </a>
                <span class="text-gray-200">/</span>
                <span class="text-brand-darkblue font-black text-[10px] uppercase tracking-widest">Detail Poli
                    {{ $type }}</span>
            </div>

            @livewire('poli-report', ['type' => $type])
        </div>
    </div>
@endsection