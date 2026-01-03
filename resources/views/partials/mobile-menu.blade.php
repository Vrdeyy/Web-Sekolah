{{-- Mobile Menu --}}
<div id="mobile-menu"
    class="fixed top-0 left-0 w-80 h-full bg-white z-50 -translate-x-full transition-transform duration-300 lg:hidden shadow-xl">
    <div class="p-6 flex flex-col h-full">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 rounded-xl flex items-center justify-center"
                    style="background: linear-gradient(135deg, #4f2744, #3a1c32);">
                    <span class="text-white font-bold">YAJ</span>
                </div>
                <span class="font-bold text-gray-800 text-sm">
                    {{ $settings['school_name'] ?? 'SMK YAJ' }}
                </span>
            </div>
            <button id="mobile-menu-close"
                class="p-2 rounded-lg hover:bg-[#4f2744]/10">
                <i class="fas fa-times"></i>
            </button>
        </div>

        {{-- Beranda --}}
        <a href="{{ route('home') }}"
            class="flex items-center gap-3 px-4 py-3 mb-4 rounded-xl font-semibold
                   bg-[#4f2744]/10 text-[#4f2744]">
            <i class="fas fa-home"></i>
            Beranda
        </a>

        {{-- Navigation --}}
        <nav class="flex-1 space-y-2 overflow-y-auto">

            @foreach ([
                'Profil' => [
                    ['Yayasan', route('page','yayasan')],
                    ['Sekolah', route('page','sekolah')],
                    ['Visi & Misi', route('page','visi-misi')],
                ],
                'Akademik' => [
                    ['Jurusan', route('majors')],
                    ['Ekstrakurikuler', route('extracurriculars')],
                    ['Prestasi', route('achievements')],
                ],
                'Direktori' => [
                    ['Guru', route('teachers')],
                    ['Staff', route('staff')],
                    ['Business Center', route('business-centers')],
                ],
                'Galeri' => [
                    ['Foto', route('gallery.photos')],
                    ['Video', route('gallery.videos')],
                ],
            ] as $title => $items)
                <div class="border-b border-gray-100 pb-2">
                    <button
                        class="mobile-dropdown-toggle w-full flex items-center justify-between py-3 font-medium text-gray-700">
                        {{ $title }}
                        <i class="fas fa-chevron-down text-xs transition-transform"></i>
                    </button>
                    <div class="mobile-dropdown hidden pl-4">
                        @foreach ($items as [$label, $url])
                            <a href="{{ $url }}"
                                class="block py-2 text-gray-600 hover:text-[#4f2744]">
                                {{ $label }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <a href="{{ route('news') }}"
               class="block py-3 font-medium hover:text-[#4f2744]">
                Berita
            </a>
            <a href="{{ route('contact') }}"
               class="block py-3 font-medium hover:text-[#4f2744]">
                Kontak
            </a>
        </nav>

        {{-- PPDB --}}
        @if(($settings['ppdb_active'] ?? false))
            <a href="{{ $settings['ppdb_url'] }}"
                class="mt-4 flex items-center justify-center gap-2 px-6 py-3
                       text-white rounded-xl font-semibold"
                style="background: linear-gradient(135deg, #4f2744, #3a1c32);">
                DAFTAR PPDB
            </a>
        @endif
    </div>
</div>
