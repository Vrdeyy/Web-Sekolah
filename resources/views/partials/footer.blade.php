{{-- Footer --}}
<footer class="bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F]
 text-white">
    {{-- Main Footer --}}
    <div class="container mx-auto px-4 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

            {{-- About --}}
            <div class="lg:col-span-1">
                <div class="flex items-center gap-3 mb-6">
                    <div
                        class="w-12 h-12 bg-[#932F80] rounded-xl flex items-center justify-center">
                        <span class="text-white font-bold text-xl">YAJ</span>
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
                                   class="w-10 h-10 bg-white/5 hover:bg-[#932F80] rounded-lg flex items-center justify-center transition-colors">
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
            <div>
                <h4 class="font-semibold text-lg mb-6 text-white">Informasi</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('page', 'yayasan') }}"
                           class="text-white/60 hover:text-[#932F80] transition-colors">Yayasan</a></li>
                    <li><a href="{{ route('page', 'sekolah') }}"
                           class="text-white/60 hover:text-[#932F80] transition-colors">Sekolah</a></li>
                    <li><a href="{{ route('page', 'visi-misi') }}"
                           class="text-white/60 hover:text-[#932F80] transition-colors">Visi & Misi</a></li>
                </ul>
            </div>

            {{-- Explore --}}
            <div>
                <h4 class="font-semibold text-lg mb-6 text-white">Jelajahi</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('majors') }}"
                           class="text-white/60 hover:text-[#932F80] transition-colors">Jurusan</a></li>
                    <li><a href="{{ route('extracurriculars') }}"
                           class="text-white/60 hover:text-[#932F80] transition-colors">Ekstrakurikuler</a></li>
                    <li><a href="{{ route('achievements') }}"
                           class="text-white/60 hover:text-[#932F80] transition-colors">Prestasi</a></li>
                    <li><a href="{{ route('news') }}"
                           class="text-white/60 hover:text-[#932F80] transition-colors">Berita</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h4 class="font-semibold text-lg mb-6 text-white">Kontak</h4>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-envelope text-[#932F80] mt-1"></i>
                        <a href="mailto:{{ $settings['school_email'] ?? 'info@sekolah.id' }}"
                           class="text-white/60 hover:text-[#932F80] transition-colors">
                            {{ $settings['school_email'] ?? 'info@sekolah.id' }}
                        </a>
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="fas fa-phone text-[#932F80] mt-1"></i>
                        <a href="tel:{{ $settings['school_phone'] ?? '' }}"
                           class="text-white/60 hover:text-[#932F80] transition-colors">
                            {{ $settings['school_phone'] ?? '(021) 12345678' }}
                        </a>
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="fas fa-clock text-[#932F80] mt-1"></i>
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
                <p class="text-white/40 text-sm">
                    © {{ date('Y') }}
                    <span class="text-[#932F80] font-medium">
                        {{ $settings['school_name'] ?? 'SMK YAJ' }}
                    </span>
                    · All rights reserved
                </p>
                <p class="text-white/40 text-sm">
                    Developed with <i class="fas fa-heart text-[#932F80]"></i> by IT Team
                </p>
            </div>
        </div>
    </div>
</footer>
