<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="{{ $metaDescription ?? 'Website Resmi SMK YAJ - Sekolah Menengah Kejuruan yang berkomitmen mencetak generasi yang terampil dan berkarakter.' }}">
    <title>@yield('title', 'SMK YAJ') - {{ $settings['school_name'] ?? 'SMK YAJ' }}</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>

    @stack('styles')
</head>

<body class="antialiased bg-gray-50">
    {{-- Header/Navbar --}}
    @include('partials.header')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Mobile Menu Overlay --}}
    <div id="mobile-menu-overlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden"></div>

    {{-- Mobile Menu --}}
    @include('partials.mobile-menu')

    @stack('scripts')

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
        const mobileMenuClose = document.getElementById('mobile-menu-close');

        function toggleMobileMenu() {
            mobileMenu.classList.toggle('-translate-x-full');
            mobileMenuOverlay.classList.toggle('hidden');
            document.body.classList.toggle('overflow-hidden');
        }

        mobileMenuBtn?.addEventListener('click', toggleMobileMenu);
        mobileMenuOverlay?.addEventListener('click', toggleMobileMenu);
        mobileMenuClose?.addEventListener('click', toggleMobileMenu);

        // Navbar scroll effect
        window.addEventListener('scroll', function () {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('bg-white/95', 'backdrop-blur-lg', 'shadow-lg');
                navbar.classList.remove('bg-transparent');
            } else {
                navbar.classList.remove('bg-white/95', 'backdrop-blur-lg', 'shadow-lg');
                navbar.classList.add('bg-transparent');
            }
        });

        // Dropdown menus
        document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
            toggle.addEventListener('click', function (e) {
                e.preventDefault();
                const dropdown = this.nextElementSibling;
                dropdown.classList.toggle('hidden');
            });
        });
    </script>
</body>

</html>