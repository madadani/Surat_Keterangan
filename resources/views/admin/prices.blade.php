@extends('layouts.admin')

@section('title', 'Manajemen Harga Estimasi')

@section('content')
    <!-- Header -->
    <header
        class="h-20 lg:h-24 bg-white/80 backdrop-blur-md border-b border-gray-100 flex items-center justify-between px-4 lg:px-8 z-20 sticky top-0 transition-all duration-300">
        <div class="flex items-center gap-3 lg:gap-5 flex-1 min-w-0">
            <div class="min-w-0">
                <h2
                    class="text-base lg:text-2xl font-black text-brand-darkblue tracking-tight truncate leading-tight uppercase">
                    Manajemen Harga Estimasi</h2>
                <p class="text-[9px] lg:text-xs text-brand-gray font-bold uppercase tracking-widest truncate mt-0.5">
                    Atur tarif estimasi untuk tiap jenis pemeriksaan
                </p>
            </div>
        </div>
    </header>

    <div class="flex-1 overflow-y-auto p-4 lg:p-10 bg-[#f8fafc]">
        <div class="max-w-4xl">
            <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
                <form action="{{ url('/admin/manajemen-harga/update') }}" method="POST">
                    @csrf
                    <div class="p-8 lg:p-10">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                            @foreach($prices as $price)
                                <div class="space-y-2 group">
                                    <label
                                        class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1 transition-colors group-focus-within:text-brand-blue">
                                        {{ $price->test_name }}
                                    </label>
                                    <div class="relative">
                                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 font-black text-xs">
                                            Rp
                                        </div>
                                        <input type="number" name="prices[{{ $price->id }}]" value="{{ $price->price }}"
                                            class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl px-12 py-4 font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue outline-none transition-all duration-300 shadow-sm focus:shadow-md"
                                            required min="0">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-slate-50 border-t border-slate-100 p-8 lg:px-10 flex justify-end">
                        <button type="submit"
                            class="bg-brand-blue text-white px-8 py-4 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-brand-darkblue shadow-lg shadow-brand-blue/20 transition-all hover:-translate-y-1 active:scale-95 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection