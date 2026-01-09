<header id="navbar"
    class="fixed top-4 left-0 right-0 z-50 pointer-events-none transition-all duration-300">

    <div class="flex justify-center">
        <nav
            class="pointer-events-auto
                   w-[95%] max-w-7xl
                   px-6 py-3
                   rounded-2xl
                    bg-white/70 backdrop-blur-xl
                    border border-[#8C51A5]/15
                    shadow-xl shadow-[#612F73]/5">

            <div class="flex items-center justify-between">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3 glass-text">
                    <div
                        class="w-12 h-12 bg-white rounded-xl flex items-center justify-center overflow-hidden shadow-lg border border-white/10">
                        @if(isset($settings['school_logo']))
                            <img src="{{ asset('storage/' . $settings['school_logo']) }}" alt="Logo" class="w-8 h-8 object-contain">
@else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#8C51A5] to-[#612F73]">
                                <span class="text-white font-black text-base">YAJ</span>
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
                       class="px-4 py-2 rounded-lg font-bold transition-all duration-500 glass-text
                       {{ request()->routeIs('home')
                            ? 'bg-[#8C51A5]/10 text-[#612F73]'
                            : 'text-slate-900 hover:bg-[#8C51A5]/5 hover:text-[#8C51A5]' }}">
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
                                class="px-4 py-2 rounded-lg font-bold flex items-center gap-1 transition glass-text
                                {{ $group['active']
                                    ? 'bg-[#8C51A5]/10 text-[#612F73]'
                                    : 'text-slate-900 hover:text-[#8C51A5] hover:bg-[#8C51A5]/5' }}">
                                {{ $label }}
                                <i class="fas fa-chevron-down text-xs opacity-80"></i>
                            </button>

                            <div
                                class="absolute top-full left-0 mt-3 w-56
                                       bg-white/95 backdrop-blur-xl
                                       rounded-2xl shadow-premium-lg
                                       border border-[#8C51A5]/10
                                       py-2
                                       opacity-0 invisible translate-y-2
                                       group-hover:opacity-100
                                       group-hover:visible
                                       group-hover:translate-y-0
                                       transition-all duration-500">

                                @foreach ($group['items'] as [$text, $route, $param])
                                    <a href="{{ $param ? route($route, $param) : route($route) }}"
                                       class="block px-4 py-2.5 mx-2 rounded-xl transition
                                       {{ request()->routeIs($route.'*')
                                            ? 'bg-[#8C51A5]/10 text-[#612F73] font-bold'
                                            : 'text-gray-600 hover:bg-[#8C51A5]/5 hover:text-[#8C51A5]' }}">
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
                            ? 'bg-[#8C51A5]/10 text-[#612F73] font-bold'
                            : 'text-slate-900 hover:bg-[#8C51A5]/5 hover:text-[#8C51A5]' }}">
                        Berita
                    </a>

                    {{-- Kontak --}}
                    <a href="{{ route('contact') }}"
                       class="px-4 py-2 rounded-lg transition glass-text
                       {{ request()->routeIs('contact*')
                            ? 'bg-[#8C51A5]/10 text-[#612F73] font-bold'
                            : 'text-slate-900 hover:bg-[#8C51A5]/5 hover:text-[#8C51A5]' }}">
                        Kontak
                    </a>
                </div>

                {{-- CTA + Mobile --}}
                <div class="flex items-center gap-3">
                    @if(($settings['ppdb_active'] ?? false))
                        <a href="{{ $settings['ppdb_url'] }}" target="_blank"
                           class="hidden md:inline-flex items-center
                                  px-6 py-2.5 rounded-xl
                                  bg-gradient-to-r from-[#F8CB62] to-[#f5b82e]
                                  text-[#612F73] font-black
                                  shadow-lg shadow-[#F8CB62]/10 hover:shadow-golden hover:-translate-y-0.5 transition-all duration-500">
                            DAFTAR SEKARANG
                        </a>
                    @endif

                    <button id="mobile-menu-btn"
                        class="lg:hidden p-2 rounded-lg
                               text-slate-900 hover:bg-[#8C51A5]/10">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>

            </div>
        </nav>
    </div>
</header>
