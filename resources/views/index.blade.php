@extends('layouts.public')

@section('content')
    <div class="relative bg-brand-darkblue overflow-hidden">
        <!-- Animated Background Decor -->
        <div class="absolute inset-0 z-0">
            <div
                class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-brand-green/20 blur-[120px] rounded-full animate-pulse">
            </div>
            <div class="absolute bottom-0 right-[-10%] w-[50%] h-[50%] bg-brand-blue/20 blur-[150px] rounded-full animate-pulse"
                style="animation-delay: 2s"></div>
            <div class="absolute top-[20%] right-[10%] w-[30%] h-[30%] bg-brand-orange/10 blur-[100px] rounded-full"></div>
            <div
                class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-20 mix-blend-overlay">
            </div>
        </div>

        <!-- Hero Header -->
        <div class="relative z-10 pt-16 pb-10 px-4">
            <div class="max-w-4xl mx-auto text-center">

                <h1
                    class="text-3xl md:text-5xl font-outfit font-black text-white mb-4 uppercase tracking-tight animate__animated animate__zoomIn">
                    Form <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-brand-green via-brand-blue to-brand-orange">Pendaftaran
                        Surat</span>
                    Keterangan
                </h1>
                <p
                    class="text-white/60 text-base md:text-lg font-medium max-w-2xl mx-auto leading-relaxed animate__animated animate__fadeInUp animate__delay-1s uppercase tracking-wide">
                    Silahkan isi data anda dengan benar (data akan tercetak di surat keterangan) dan pilih jenis test yang
                    akan anda ikuti (bisa memilih lebih dari satu).
                </p>
            </div>
        </div>

        <!-- Main Card Container -->
        <div class="relative z-10 max-w-4xl mx-auto px-4 pb-4">
            <div
                class="bg-white/[0.03] backdrop-blur-xl border border-white/10 rounded-[3rem] p-1 shadow-2xl overflow-hidden animate__animated animate__fadeInUp animate__delay-1s">
                <livewire:registration-form />
            </div>
        </div>
    </div>

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

        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(30%) sepia(100%) saturate(500%) hue-rotate(180deg);
            cursor: pointer;
        }
    </style>
@endsection

@push('scripts')
    <script>
        function toggleGender(current) {
            if (current.checked) {
                document.querySelectorAll('.gender-checkbox').forEach(cb => {
                    if (cb !== current) cb.checked = false;
                });
            }
        }

        function updatePriceSummary() {
            const checkboxes = document.querySelectorAll('.test-checkbox:checked');
            let total = 0;
            checkboxes.forEach(cb => {
                total += parseInt(cb.getAttribute('data-price')) || 0;
            });
            const totalDisplay = document.getElementById('total-estimation');
            if (totalDisplay) {
                totalDisplay.innerText = new Intl.NumberFormat('id-ID').format(total);
            }
        }
        document.addEventListener('DOMContentLoaded', updatePriceSummary);
    </script>
@endpush