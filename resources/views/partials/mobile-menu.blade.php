{{-- Mobile Menu --}}
<div id="mobile-menu"
    class="fixed top-0 left-0 w-80 h-full bg-white z-50 transform -translate-x-full transition-transform duration-300 lg:hidden overflow-y-auto">
    <div class="p-6">
        {{-- Header --}}
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center">
                    <span class="text-white font-bold">YAJ</span>
                </div>
                <span class="font-bold text-gray-800">{{ $settings['school_name'] ?? 'SMK YAJ' }}</span>
            </div>
            <button id="mobile-menu-close" class="p-2 text-gray-500 hover:text-gray-700">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        {{-- Navigation --}}
        <nav class="space-y-2">
            {{-- Profil --}}
            <div class="border-b border-gray-100 pb-2">
                <button
                    class="mobile-dropdown-toggle w-full flex items-center justify-between py-3 text-gray-700 font-medium">
                    Profil
                    <i class="fas fa-chevron-down text-xs transition-transform"></i>
                </button>
                <div class="mobile-dropdown hidden pl-4 space-y-2 pb-2">
                    <a href="{{ route('page', 'yayasan') }}"
                        class="block py-2 text-gray-600 hover:text-emerald-600">Yayasan</a>
                    <a href="{{ route('page', 'sekolah') }}"
                        class="block py-2 text-gray-600 hover:text-emerald-600">Sekolah</a>
                    <a href="{{ route('page', 'visi-misi') }}"
                        class="block py-2 text-gray-600 hover:text-emerald-600">Visi & Misi</a>
                </div>
            </div>

            {{-- Akademik --}}
            <div class="border-b border-gray-100 pb-2">
                <button
                    class="mobile-dropdown-toggle w-full flex items-center justify-between py-3 text-gray-700 font-medium">
                    Akademik
                    <i class="fas fa-chevron-down text-xs transition-transform"></i>
                </button>
                <div class="mobile-dropdown hidden pl-4 space-y-2 pb-2">
                    <a href="{{ route('majors') }}" class="block py-2 text-gray-600 hover:text-emerald-600">Jurusan</a>
                    <a href="{{ route('extracurriculars') }}"
                        class="block py-2 text-gray-600 hover:text-emerald-600">Ekstrakurikuler</a>
                    <a href="{{ route('achievements') }}"
                        class="block py-2 text-gray-600 hover:text-emerald-600">Prestasi</a>
                </div>
            </div>

            {{-- Direktori --}}
            <div class="border-b border-gray-100 pb-2">
                <button
                    class="mobile-dropdown-toggle w-full flex items-center justify-between py-3 text-gray-700 font-medium">
                    Direktori
                    <i class="fas fa-chevron-down text-xs transition-transform"></i>
                </button>
                <div class="mobile-dropdown hidden pl-4 space-y-2 pb-2">
                    <a href="{{ route('teachers') }}" class="block py-2 text-gray-600 hover:text-emerald-600">Daftar
                        Guru</a>
                    <a href="{{ route('staff') }}" class="block py-2 text-gray-600 hover:text-emerald-600">Daftar
                        Staff</a>
                    <a href="{{ route('business-centers') }}"
                        class="block py-2 text-gray-600 hover:text-emerald-600">Business Center</a>
                </div>
            </div>

            {{-- Galeri --}}
            <div class="border-b border-gray-100 pb-2">
                <button
                    class="mobile-dropdown-toggle w-full flex items-center justify-between py-3 text-gray-700 font-medium">
                    Galeri
                    <i class="fas fa-chevron-down text-xs transition-transform"></i>
                </button>
                <div class="mobile-dropdown hidden pl-4 space-y-2 pb-2">
                    <a href="{{ route('gallery.photos') }}" class="block py-2 text-gray-600 hover:text-emerald-600">Foto
                        Sekolah</a>
                    <a href="{{ route('gallery.videos') }}"
                        class="block py-2 text-gray-600 hover:text-emerald-600">Video Sekolah</a>
                </div>
            </div>

            <a href="{{ route('news') }}"
                class="block py-3 text-gray-700 font-medium border-b border-gray-100">Berita</a>
            <a href="{{ route('contact') }}"
                class="block py-3 text-gray-700 font-medium border-b border-gray-100">Kontak</a>
        </nav>

        {{-- PPDB Button --}}
        @if(($settings['ppdb_active'] ?? false))
            <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                class="mt-8 w-full flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-semibold rounded-xl">
                <i class="fas fa-user-plus"></i>
                DAFTAR PPDB
            </a>
        @endif
    </div>
</div>

<script>
    // Mobile dropdown toggle
    document.querySelectorAll('.mobile-dropdown-toggle').forEach(toggle => {
        toggle.addEventListener('click', function () {
            const dropdown = this.nextElementSibling;
            const icon = this.querySelector('i');
            dropdown.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    });
</script>