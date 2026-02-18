<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - RSUD dr. Soeratno Gemolong</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Dependencies -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Tailwind Config -->
    <script src="{{ asset('js/tailwind-config.js') }}"></script>

    <!-- Common Admin Styles -->
    <link rel="stylesheet" href="{{ asset('css/admin-common.css') }}">

    @stack('styles')

    <style>
        [wire\:loading] {
            display: none !important;
        }
    </style>

</head>

<body
    class="font-sans text-gray-800 bg-gray-50 antialiased h-screen flex overflow-hidden selection:bg-brand-blue selection:text-white">

    <!-- Mobile Sidebar Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-brand-darkblue/40 backdrop-blur-sm z-30 lg:hidden"></div>

    <!-- Sidebar -->
    @include('components.sidebar')

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-full overflow-hidden relative">
        @yield('content')
    </main>

    <!-- Essential Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/admin/common.js') }}"></script>

    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                showSuccessAlert("{{ session('success') }}");
            });
        </script>
    @endif

    @stack('scripts')


</body>

</html>