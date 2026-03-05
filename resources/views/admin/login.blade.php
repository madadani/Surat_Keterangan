<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - RSUD dr. Soeratno Gemolong</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        outfit: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        logo: {
                            orange: '#F47C00',
                            yellow: '#FFC107',
                            green: '#00C853',
                            blue: '#0288D1',
                            darkblue: '#1A237E',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background: linear-gradient(to right, #2ecc71 0%, #3498db 100%);
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            margin: 0;
            padding: 1rem;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.2);
        }

        /* Ambient Shapes */
        .ambient-shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            z-index: 1;
            pointer-events: none;
        }

        .shape-square-1 {
            width: 100px;
            height: 100px;
            border-radius: 2rem;
            top: 15%;
            left: 8%;
            transform: rotate(12deg);
        }

        .shape-square-2 {
            width: 60px;
            height: 60px;
            border-radius: 1.5rem;
            top: 35%;
            right: 12%;
            transform: rotate(-15deg);
        }

        .shape-circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            bottom: 10%;
            right: 8%;
        }

        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            10%,
            30%,
            50%,
            70%,
            90% {
                transform: translateX(-2px);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translateX(2px);
            }
        }

        .animate-blob {
            animation: blob 10s infinite;
        }

        .animate-shake {
            animation: shake 0.5s cubic-bezier(.36, .07, .19, .97) both;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
</head>

<body class="font-sans antialiased">

    <!-- Ambient Decorations -->
    <div class="ambient-shape shape-square-1"></div>
    <div class="ambient-shape shape-square-2"></div>
    <div class="ambient-shape shape-circle"></div>

    <div class="w-full max-w-[420px] relative z-10">
        <!-- Animated Background Blobs -->
        <div
            class="hidden sm:block absolute -top-32 -left-32 w-64 h-64 bg-white/10 rounded-full filter blur-3xl opacity-10 animate-blob">
        </div>
        <div
            class="hidden sm:block absolute -bottom-32 -right-32 w-64 h-64 bg-white/10 rounded-full filter blur-3xl opacity-10 animate-blob animation-delay-2000">
        </div>

        <div class="glass-card rounded-[2rem] sm:rounded-[2.5rem] overflow-hidden relative p-0.5 sm:p-1">
            <!-- Top Logo Gradient Border -->
            <div
                class="h-1.5 w-full bg-gradient-to-r from-logo-blue via-logo-green to-logo-orange rounded-t-[2rem] sm:rounded-t-[2.5rem]">
            </div>

            <div class="p-6 pt-8 sm:p-8 sm:pt-10">
                <!-- Header -->
                <div class="text-center mb-8 sm:mb-9">
                    <div class="relative inline-block mb-6 sm:mb-7">
                        <!-- Orbit Effect -->
                        <div
                            class="absolute inset-0 bg-gradient-to-tr from-logo-blue to-logo-green rounded-[1.5rem] sm:rounded-[2rem] blur-xl opacity-20 scale-125 animate-pulse">
                        </div>

                        <div
                            class="relative w-20 h-20 sm:w-24 sm:h-24 bg-white rounded-[1.5rem] sm:rounded-[2rem] shadow-xl border border-white/50 flex items-center justify-center p-3 sm:p-4 transform hover:rotate-3 transition-all duration-500">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo RS"
                                class="w-full h-full object-contain">
                        </div>

                        <!-- Mini Badge -->
                        <div
                            class="absolute -bottom-2 -right-2 w-10 h-10 sm:w-12 sm:h-12 bg-logo-orange bg-gradient-to-br from-logo-orange to-logo-yellow rounded-2xl flex items-center justify-center text-white shadow-lg border-4 border-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>

                    <h2 class="text-2xl sm:text-2xl font-black text-logo-darkblue tracking-tight mb-2">APLIKASI SURAT
                        KETERANGAN</h2>
                    <p class="text-slate-500 font-bold text-sm sm:text-lg">RSUD dr. Soeratno Gemolong</p>

                    <div class="flex justify-center mt-4 sm:mt-5">
                        <div class="h-1.5 w-12 bg-logo-blue rounded-full mx-1"></div>
                        <div class="h-1.5 w-5 bg-logo-green rounded-full mx-1"></div>
                        <div class="h-1.5 w-2.5 bg-logo-orange rounded-full mx-1"></div>
                    </div>
                </div>

                <!-- Form -->
                <form action="/suket/public/admin/login" method="POST" class="space-y-6 sm:space-y-8">
                    @csrf

                    @if($errors->any())
                        <div
                            class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-2xl text-sm font-bold animate-shake">
                            <div class="flex items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Akses Ditolak</span>
                            </div>
                            <ul class="list-disc list-inside opacity-80 text-xs">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="space-y-1.5">
                        <label
                            class="text-[10px] font-black text-logo-darkblue/50 uppercase tracking-[0.2em] ml-2">Username</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                                <svg class="h-4 w-4 text-slate-400 group-focus-within:text-logo-blue transition-colors"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" name="username"
                                class="w-full pl-12 pr-5 py-4 bg-white/50 border-2 border-slate-200 hover:border-logo-blue/30 rounded-xl focus:outline-none focus:ring-4 focus:ring-logo-blue/10 focus:border-logo-blue focus:bg-white transition-all font-bold text-logo-darkblue placeholder-slate-400 text-base shadow-sm"
                                placeholder="ID Admin" required>
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <div class="flex justify-between items-center px-2">
                            <label
                                class="text-[10px] font-black text-logo-darkblue/50 uppercase tracking-[0.2em]">Password</label>
                        </div>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                                <svg class="h-4 w-4 text-slate-400 group-focus-within:text-logo-blue transition-colors"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="password" name="password"
                                class="w-full pl-12 pr-5 py-4 bg-white/50 border-2 border-slate-200 hover:border-logo-blue/30 rounded-xl focus:outline-none focus:ring-4 focus:ring-logo-blue/10 focus:border-logo-blue focus:bg-white transition-all font-bold text-logo-darkblue placeholder-slate-400 text-base shadow-sm"
                                placeholder="••••••••" required>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full relative group overflow-hidden bg-logo-darkblue text-white py-5 rounded-3xl font-black text-lg shadow-2xl shadow-logo-darkblue/30 hover:-translate-y-1 active:scale-[0.98] transition-all duration-300">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-logo-blue/40 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700">
                        </div>
                        <div class="relative flex items-center justify-center gap-4">
                            <span>LOGIN</span>
                        </div>
                    </button>
                </form>
            </div>

            <div class="bg-slate-50/80 p-6 sm:p-8 text-center border-t border-slate-100/50">
                <p class="text-[9px] sm:text-[11px] text-slate-400 font-black uppercase tracking-[0.3em]">
                    &copy; 2026 IT RSUD Soeratno Gemolong
                </p>
            </div>
        </div>
    </div>
</body>

</html>