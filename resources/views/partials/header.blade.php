{{-- Header/Navbar --}}
<header id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent">
    <nav class="container mx-auto px-4 lg:px-8">
        <div class="flex items-center justify-between h-20">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div
                    class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg">
                    <span class="text-white font-bold text-xl">YAJ</span>
                </div>
                <div class="hidden sm:block">
                    <h1 class="font-bold text-lg text-gray-800">{{ $settings['school_name'] ?? 'SMK YAJ' }}</h1>
                    <p class="text-xs text-gray-500">Sekolah Menengah Kejuruan</p>
                </div>
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden lg:flex items-center gap-1">
                {{-- Profil Dropdown --}}
                <div class="relative group">
                    <button
                        class="px-4 py-2 text-gray-700 hover:text-emerald-600 font-medium flex items-center gap-1 transition-colors">
                        Profil
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div
                        class="absolute top-full left-0 w-48 bg-white rounded-xl shadow-xl border border-gray-100 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform group-hover:translate-y-0 translate-y-2">
                        <a href="{{ route('page', 'yayasan') }}"
                            class="block px-4 py-2 text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">Yayasan</a>
                        <a href="{{ route('page', 'sekolah') }}"
                            class="block px-4 py-2 text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">Sekolah</a>
                        <a href="{{ route('page', 'visi-misi') }}"
                            class="block px-4 py-2 text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">Visi
                            & Misi</a>
                    </div>
                </div>

                {{-- Akademik Dropdown --}}
                <div class="relative group">
                    <button
                        class="px-4 py-2 text-gray-700 hover:text-emerald-600 font-medium flex items-center gap-1 transition-colors">
                        Akademik
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div
                        class="absolute top-full left-0 w-48 bg-white rounded-xl shadow-xl border border-gray-100 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform group-hover:translate-y-0 translate-y-2">
                        <a href="{{ route('majors') }}"
                            class="block px-4 py-2 text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">Jurusan</a>
                        <a href="{{ route('extracurriculars') }}"
                            class="block px-4 py-2 text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">Ekstrakurikuler</a>
                        <a href="{{ route('achievements') }}"
                            class="block px-4 py-2 text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">Prestasi</a>
                    </div>
                </div>

                {{-- Direktori Dropdown --}}
                <div class="relative group">
                    <button
                        class="px-4 py-2 text-gray-700 hover:text-emerald-600 font-medium flex items-center gap-1 transition-colors">
                        Direktori
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div
                        class="absolute top-full left-0 w-48 bg-white rounded-xl shadow-xl border border-gray-100 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform group-hover:translate-y-0 translate-y-2">
                        <a href="{{ route('teachers') }}"
                            class="block px-4 py-2 text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">Daftar
                            Guru</a>
                        <a href="{{ route('staff') }}"
                            class="block px-4 py-2 text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">Daftar
                            Staff</a>
                        <a href="{{ route('business-centers') }}"
                            class="block px-4 py-2 text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">Business
                            Center</a>
                    </div>
                </div>

                {{-- Galeri Dropdown --}}
                <div class="relative group">
                    <button
                        class="px-4 py-2 text-gray-700 hover:text-emerald-600 font-medium flex items-center gap-1 transition-colors">
                        Galeri
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div
                        class="absolute top-full left-0 w-48 bg-white rounded-xl shadow-xl border border-gray-100 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform group-hover:translate-y-0 translate-y-2">
                        <a href="{{ route('gallery.photos') }}"
                            class="block px-4 py-2 text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">Foto
                            Sekolah</a>
                        <a href="{{ route('gallery.videos') }}"
                            class="block px-4 py-2 text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">Video
                            Sekolah</a>
                    </div>
                </div>

                {{-- Berita --}}
                <a href="{{ route('news') }}"
                    class="px-4 py-2 text-gray-700 hover:text-emerald-600 font-medium transition-colors">Berita</a>

                {{-- Kontak --}}
                <a href="{{ route('contact') }}"
                    class="px-4 py-2 text-gray-700 hover:text-emerald-600 font-medium transition-colors">Kontak</a>
            </div>

            {{-- CTA Button --}}
            <div class="flex items-center gap-4">
                @if(($settings['ppdb_active'] ?? false))
                    <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                        class="hidden md:inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-semibold rounded-xl hover:shadow-lg hover:shadow-emerald-500/30 transition-all duration-300 transform hover:-translate-y-0.5">
                        <i class="fas fa-user-plus"></i>
                        DAFTAR PPDB
                    </a>
                @endif

                {{-- Mobile Menu Button --}}
                <button id="mobile-menu-btn" class="lg:hidden p-2 text-gray-700 hover:text-emerald-600">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </nav>
</header>