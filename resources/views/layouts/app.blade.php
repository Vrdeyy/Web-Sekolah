<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="KDxRnKH_x_0nJQLc29GbrlAQhfDGuHdArfrGL0XE0pI" />
    
    {!! $seo->generate() !!}

    {{-- Dynamic Favicon --}}
    @if(isset($settings['school_logo']) && !empty($settings['school_logo']))
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $settings['school_logo']) }}">
    @else
        @php
            $schoolName = isset($settings['school_name']) ? $settings['school_name'] : 'SMK YAJ';
            $words = explode(' ', $schoolName);
            $initials = '';
            $filteredWords = array_filter($words, function($word) {
                return !in_array(strtoupper($word), ['SMK', 'SMA', 'SMP', 'SD', 'TK', 'SLB']);
            });
            if (empty($filteredWords)) {
                $filteredWords = $words;
            }
            foreach ($filteredWords as $word) {
                $initials .= strtoupper(substr($word, 0, 1));
            }
            $initials = substr($initials, 0, 3);
            if (empty($initials)) {
                $initials = 'YAJ';
            }
            
            $svgIcon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><linearGradient id="navbarGrad" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#8C51A5" /><stop offset="100%" stop-color="#612F73" /></linearGradient></defs><rect width="100" height="100" rx="28" fill="url(#navbarGrad)" /><text x="50" y="55" font-size="34" font-weight="900" font-family="\'Plus Jakarta Sans\', \'Inter\', sans-serif" fill="#ffffff" text-anchor="middle" dominant-baseline="middle">' . $initials . '</text></svg>';
            $faviconDataUri = 'data:image/svg+xml;base64,' . base64_encode($svgIcon);
        @endphp
        <link rel="icon" type="image/svg+xml" href="{{ $faviconDataUri }}">
    @endif

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- AOS Animation --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

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
            mobileMenu.classList.toggle('translate-x-full');
            mobileMenuOverlay.classList.toggle('hidden');
            document.body.classList.toggle('overflow-hidden');
        }

        mobileMenuBtn?.addEventListener('click', toggleMobileMenu);
        mobileMenuOverlay?.addEventListener('click', toggleMobileMenu);
        mobileMenuClose?.addEventListener('click', toggleMobileMenu);

        // Close mobile menu when clicking a link
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                if (!mobileMenu.classList.contains('translate-x-full')) {
                    toggleMobileMenu();
                }
            });
        });


        // Mobile dropdown menus
        document.querySelectorAll('.mobile-dropdown-toggle').forEach(toggle => {
            toggle.addEventListener('click', function () {
                const dropdown = this.nextElementSibling;
                const icon = this.querySelector('i');

                // Toggle current dropdown
                dropdown.classList.toggle('hidden');

                // Rotate icon
                if (icon) {
                    icon.classList.toggle('rotate-180');
                }
            });
        });

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 40) {
                navbar.classList.add(
                    'scale-[0.98]',
                    'opacity-95'
                );
            } else {
                navbar.classList.remove(
                    'scale-[0.98]',
                    'opacity-95'
                );
            }
        });
    </script>

    {{-- WhatsApp Floating Button --}}
    @include('partials.floating-whatsapp')

    {{-- AOS Animation JS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 120,
        });
    </script>
</body>

</html>