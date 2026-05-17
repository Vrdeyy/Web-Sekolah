{{-- Mobile Menu --}}
<div id="mobile-menu"
    class="fixed top-0 right-0 w-80 h-full bg-white z-50 translate-x-full transition-transform duration-300 lg:hidden shadow-xl">
    <div class="p-6 flex flex-col h-full">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 rounded-xl flex items-center justify-center overflow-hidden bg-white shadow-sm border border-gray-100">
                    @if(isset($settings['school_logo']))
                        <img src="{{ asset('storage/' . $settings['school_logo']) }}" alt="Logo" class="w-7 h-7 object-contain">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#8C51A5] to-[#612F73]">
                            <span class="text-white font-bold text-xs">YAJ</span>
                        </div>
                    @endif
                </div>
                <span class="font-bold text-gray-800 text-sm">
                    {{ $settings['school_name'] ?? 'SMK YAJ' }}
                </span>
            </div>
            <button id="mobile-menu-close"
                class="p-2 rounded-lg hover:bg-[#8C51A5]/10 transition-colors duration-300 ease-in-out">
                <i class="fas fa-times"></i>
            </button>
        </div>

        {{-- Beranda --}}
        <a href="{{ route('home') }}"
            class="flex items-center gap-3 px-4 py-3 mb-4 rounded-xl transition-all duration-300 ease-in-out
                   {{ request()->routeIs('home') ? 'bg-[#8C51A5]/10 text-[#612F73] font-semibold' : 'text-gray-700 hover:bg-[#8C51A5]/5 hover:text-[#8C51A5]' }}">
            <i class="fas fa-home"></i>
            Beranda
        </a>

        {{-- Navigation --}}
        <nav class="flex-1 space-y-2 overflow-y-auto">

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
                    'active' => request()->routeIs('majors', 'major.*', 'extracurriculars', 'extracurricular.*', 'achievements', 'achievement.*'),
                    'items' => [
                        ['Jurusan', 'majors', null],
                        ['Ekstrakurikuler', 'extracurriculars', null],
                        ['Prestasi', 'achievements', null],
                    ],
                ],
                'Direktori' => [
                    'active' => request()->routeIs('teachers', 'teacher.*', 'staff', 'staff.*', 'business-centers', 'business-center.*'),
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
            ] as $title => $group)
                <div class="border-b border-gray-100 pb-2">
                    <button
                        class="mobile-dropdown-toggle w-full flex items-center justify-between py-3 font-medium transition-colors duration-300 ease-in-out {{ $group['active'] ? 'text-[#8C51A5] font-bold' : 'text-gray-700 hover:text-[#8C51A5]' }}">
                        {{ $title }}
                        <i class="fas fa-chevron-down text-xs transition-transform {{ $group['active'] ? 'rotate-180' : '' }}"></i>
                    </button>
                    <div class="mobile-dropdown {{ $group['active'] ? 'block' : 'hidden' }} pl-4">
                        @foreach ($group['items'] as [$label, $route, $param])
                            @php
                                $singularRoute = Str::singular($route);
                                $isActive = request()->routeIs($route, $route.'.*', $singularRoute.'.*');
                                if ($param && request()->route('slug') != $param) {
                                    $isActive = false;
                                }
                            @endphp
                            <a href="{{ $param ? route($route, $param) : route($route) }}"
                                class="block py-2 transition-colors duration-300 ease-in-out {{ $isActive ? 'text-[#8C51A5] font-bold' : 'text-gray-600 hover:text-[#8C51A5]' }}">
                                {{ $label }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <a href="{{ route('news') }}"
               class="block py-3 font-medium transition-colors duration-300 {{ request()->routeIs('news*') ? 'text-[#8C51A5] font-bold' : 'text-gray-700 hover:text-[#8C51A5]' }}">
                Berita
            </a>
            <a href="{{ route('agenda') }}"
               class="block py-3 font-medium transition-colors duration-300 {{ request()->routeIs('agenda*') ? 'text-[#8C51A5] font-bold' : 'text-gray-700 hover:text-[#8C51A5]' }}">
                Agenda
            </a>
            <a href="{{ route('contact') }}"
               class="block py-3 font-medium transition-colors duration-300 {{ request()->routeIs('contact*') ? 'text-[#8C51A5] font-bold' : 'text-gray-700 hover:text-[#8C51A5]' }}">
                Kontak
            </a>
        </nav>

        {{-- PPDB --}}
        @if(($settings['ppdb_active'] ?? false))
            <a href="{{ $settings['ppdb_url'] }}"
                class="mt-4 flex items-center justify-center gap-2 px-6 py-3
                       text-white rounded-xl font-black shadow-lg"
                style="background: linear-gradient(135deg, #612F73, #8C51A5);">
                DAFTAR PPDB
            </a>
        @endif
    </div>
</div>
