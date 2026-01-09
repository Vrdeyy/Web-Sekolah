<footer class="bg-premium-dark text-white border-t border-white/5">
    {{-- Main Footer --}}
    <div class="container mx-auto px-4 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

            {{-- About --}}
            <div class="lg:col-span-1">
                <div class="flex items-center gap-3 mb-6">
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
                    <div>
                        <h3 class="font-bold text-lg">{{ $settings['school_name'] ?? 'SMK YAJ' }}</h3>
                        <p class="text-sm text-white/60">Sekolah Menengah Kejuruan</p>
                    </div>
                </div>

                <p class="text-white/60 text-sm leading-relaxed mb-6">
                    {{ $settings['school_tagline'] ?? 'Pilihan Yang Tepat Di Sekolah Yang Berkualitas' }}
                </p>

                <div class="flex gap-3">
                    @if(isset($socialLinks) && $socialLinks->count() > 0)
                        @foreach($socialLinks as $social)
                            @if($social && $social->url)
                                <a href="{{ $social->url }}" target="_blank"
                                   class="w-10 h-10 bg-white/5 hover:bg-[#8C51A5] rounded-lg flex items-center justify-center transition-colors border border-white/10">
                                    @switch($social->platform ?? '')
                                        @case('youtube') <i class="fab fa-youtube"></i> @break
                                        @case('instagram') <i class="fab fa-instagram"></i> @break
                                        @case('facebook') <i class="fab fa-facebook-f"></i> @break
                                        @case('twitter') <i class="fab fa-twitter"></i> @break
                                        @case('tiktok') <i class="fab fa-tiktok"></i> @break
                                        @case('linkedin') <i class="fab fa-linkedin-in"></i> @break
                                        @default <i class="fas fa-link"></i>
                                    @endswitch
                                </a>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>

            {{-- Information --}}
            <div class="hidden lg:block">
                <h4 class="font-semibold text-lg mb-6 text-white">Informasi</h4>
                <ul class="space-y-3">
                     <li><a href="{{ route('page', 'yayasan') }}"
                            class="text-white/60 hover:text-[#F8CB62] transition-colors">Yayasan</a></li>
                    <li><a href="{{ route('page', 'sekolah') }}"
                            class="text-white/60 hover:text-[#F8CB62] transition-colors">Sekolah</a></li>
                    <li><a href="{{ route('page', 'visi-misi') }}"
                            class="text-white/60 hover:text-[#F8CB62] transition-colors">Visi & Misi</a></li>
                </ul>
            </div>

            {{-- Explore --}}
            <div class="hidden lg:block">
                <h4 class="font-semibold text-lg mb-6 text-white">Jelajahi</h4>
                <ul class="space-y-3">
                     <li><a href="{{ route('majors') }}"
                            class="text-white/60 hover:text-[#F8CB62] transition-colors">Jurusan</a></li>
                    <li><a href="{{ route('extracurriculars') }}"
                            class="text-white/60 hover:text-[#F8CB62] transition-colors">Ekstrakurikuler</a></li>
                    <li><a href="{{ route('achievements') }}"
                            class="text-white/60 hover:text-[#F8CB62] transition-colors">Prestasi</a></li>
                    <li><a href="{{ route('news') }}"
                            class="text-white/60 hover:text-[#F8CB62] transition-colors">Berita</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h4 class="font-semibold text-lg mb-6 text-white">Kontak</h4>
                <ul class="space-y-4">
                     <li class="flex items-start gap-3">
                        <i class="fas fa-envelope text-[#F8CB62] mt-1"></i>
                        <a href="mailto:{{ $settings['school_email'] ?? 'info@sekolah.id' }}"
                           class="text-white/60 hover:text-[#F8CB62] transition-colors">
                            {{ $settings['school_email'] ?? 'info@sekolah.id' }}
                        </a>
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="fas fa-phone text-[#F8CB62] mt-1"></i>
                        <a href="tel:{{ $settings['school_phone'] ?? '' }}"
                           class="text-white/60 hover:text-[#F8CB62] transition-colors">
                            {{ $settings['school_phone'] ?? '(021) 12345678' }}
                        </a>
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="fas fa-clock text-[#F8CB62] mt-1"></i>
                        <span class="text-white/60 text-sm">
                            {{ $settings['school_hours'] ?? 'Senin - Jumat: 07:00 - 17:00' }}
                        </span>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    {{-- Bottom Footer --}}
    <div class="border-t border-white/10">
        <div class="container mx-auto px-4 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                 <p class="text-white/40 text-sm italic">
                    © {{ date('Y') }}
                    <span class="text-[#F8CB62] font-black non-italic">
                        {{ $settings['school_name'] ?? 'SMK YAJ' }}
                    </span>
                    · All rights reserved
                </p>
                <p class="text-white/40 text-sm">
                    Made with <i class="fas fa-heart text-[#F8CB62] animate-pulse"></i> by IT Team
                </p>
            </div>
        </div>
    </div>
</footer>
