<header id="navbar"
    class="fixed top-4 left-0 right-0 z-50 pointer-events-none transition-all duration-300">

    <div class="flex justify-center">
        <nav
            class="pointer-events-auto
                   w-[95%] max-w-7xl
                   px-6 py-3
                   rounded-2xl
                   bg-white/50 backdrop-blur-xl
                   border border-[#4f2744]/25
                   shadow-lg shadow-[#4f2744]/10">

            <div class="flex items-center justify-between">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3 glass-text">
                    <div
                        class="w-12 h-12 bg-white rounded-xl flex items-center justify-center overflow-hidden shadow-lg border border-white/10">
                        @if(isset($settings['school_logo']))
                            <img src="{{ asset('storage/' . $settings['school_logo']) }}" alt="Logo" class="w-8 h-8 object-contain">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#932F80] to-[#4f2744]">
                                <span class="text-white font-bold text-base">YAJ</span>
                            </div>
                        @endif
                    </div>
                    <div class="hidden sm:block leading-tight">
                        <h1 class="font-semibold text-slate-900">
                            {{ $settings['school_name'] ?? 'SMK YAJ' }}
                        </h1>
                        <p class="text-xs text-slate-600">
                            Sekolah Menengah Kejuruan
                        </p>
                    </div>
                </a>

                {{-- Desktop Navigation --}}
                <div class="hidden lg:flex items-center gap-1">

                    {{-- Beranda --}}
                    <a href="{{ route('home') }}"
                       class="px-4 py-2 rounded-lg font-semibold transition glass-text
                       {{ request()->routeIs('home')
                            ? 'bg-[#4f2744]/15 text-[#4f2744]'
                            : 'text-slate-900 hover:bg-[#4f2744]/10 hover:text-[#4f2744]' }}">
                        Beranda
                    </a>

                    {{-- Dropdown Groups --}}
                    @foreach ([
                        'Profil' => [
                            'active' => request()->routeIs('page*'),
                            'items' => [
                                ['Yayasan', 'page', 'yayasan'],
                                ['Sekolah', 'page', 'sekolah'],
                                ['Visi & Misi', 'page', 'visi-misi'],
                            ],
                        ],
                        'Akademik' => [
                            'active' => request()->routeIs('majors*','extracurriculars*','achievements*'),
                            'items' => [
                                ['Jurusan', 'majors', null],
                                ['Ekstrakurikuler', 'extracurriculars', null],
                                ['Prestasi', 'achievements', null],
                            ],
                        ],
                        'Direktori' => [
                            'active' => request()->routeIs('teachers*','staff*','business-centers*'),
                            'items' => [
                                ['Guru', 'teachers', null],
                                ['Staff', 'staff', null],
                                ['Business Center', 'business-centers', null],
                            ],
                        ],
                        'Galeri' => [
                            'active' => request()->routeIs('gallery.*'),
                            'items' => [
                                ['Foto', 'gallery.photos', null],
                                ['Video', 'gallery.videos', null],
                            ],
                        ],
                    ] as $label => $group)

                        <div class="relative group">
                            <button
                                class="px-4 py-2 rounded-lg font-medium flex items-center gap-1 transition glass-text
                                {{ $group['active']
                                    ? 'bg-[#4f2744]/15 text-[#4f2744]'
                                    : 'text-slate-900 hover:text-[#4f2744] hover:bg-[#4f2744]/10' }}">
                                {{ $label }}
                                <i class="fas fa-chevron-down text-xs opacity-80"></i>
                            </button>

                            <div
                                class="absolute top-full left-0 mt-3 w-56
                                       bg-white/95 backdrop-blur-xl
                                       rounded-xl shadow-xl
                                       border border-[#4f2744]/20
                                       py-2
                                       opacity-0 invisible translate-y-2
                                       group-hover:opacity-100
                                       group-hover:visible
                                       group-hover:translate-y-0
                                       transition-all duration-200">

                                @foreach ($group['items'] as [$text, $route, $param])
                                    <a href="{{ $param ? route($route, $param) : route($route) }}"
                                       class="block px-4 py-2 rounded-md transition
                                       {{ request()->routeIs($route.'*')
                                            ? 'bg-[#4f2744]/15 text-[#4f2744] font-medium'
                                            : 'text-slate-700 hover:bg-[#4f2744]/10 hover:text-[#4f2744]' }}">
                                        {{ $text }}
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    @endforeach

                    {{-- Berita --}}
                    <a href="{{ route('news') }}"
                       class="px-4 py-2 rounded-lg transition glass-text
                       {{ request()->routeIs('news*')
                            ? 'bg-[#4f2744]/15 text-[#4f2744] font-semibold'
                            : 'text-slate-900 hover:bg-[#4f2744]/10 hover:text-[#4f2744]' }}">
                        Berita
                    </a>

                    {{-- Kontak --}}
                    <a href="{{ route('contact') }}"
                       class="px-4 py-2 rounded-lg transition glass-text
                       {{ request()->routeIs('contact*')
                            ? 'bg-[#4f2744]/15 text-[#4f2744] font-semibold'
                            : 'text-slate-900 hover:bg-[#4f2744]/10 hover:text-[#4f2744]' }}">
                        Kontak
                    </a>
                </div>

                {{-- CTA + Mobile --}}
                <div class="flex items-center gap-3">
                    @if(($settings['ppdb_active'] ?? false))
                        <a href="{{ $settings['ppdb_url'] }}" target="_blank"
                           class="hidden md:inline-flex items-center
                                  px-5 py-2.5 rounded-xl
                                  bg-gradient-to-r from-[#4f2744] to-[#3a1c32]
                                  text-white font-semibold
                                  shadow hover:shadow-lg transition">
                            DAFTAR PPDB
                        </a>
                    @endif

                    <button id="mobile-menu-btn"
                        class="lg:hidden p-2 rounded-lg
                               text-slate-900 hover:bg-[#4f2744]/10">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>

            </div>
        </nav>
    </div>
</header>
