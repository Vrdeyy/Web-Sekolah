@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
{{-- HERO SECTION CLEAN EDUCATION (PURPLE THEME) --}}
<section class="relative min-h-screen flex items-center lg:items-end overflow-hidden bg-gradient-to-br from-[#612F73]/5 via-white to-[#F0E7F8]/30 pt-32 lg:pt-8 pb-0 lg:pb-20">

    {{-- Decorative Blobs & Glowing Orbs --}}
    <div class="absolute top-[-10%] left-[-5%] w-[500px] h-[500px] bg-gradient-to-br from-[#612F73]/15 to-transparent rounded-full blur-[120px] animate-pulse-slow"></div>
    <div class="absolute bottom-[-10%] right-[-5%] w-[600px] h-[600px] bg-gradient-to-tl from-[#8C51A5]/10 via-[#D668EA]/5 to-transparent rounded-full blur-[130px] animate-pulse-slow-delayed"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-[#612F73]/[0.02] rounded-full blur-[150px]"></div>

    {{-- Dots & Grid Layered Pattern --}}
    <div class="absolute inset-0 bg-[radial-gradient(#612F7310_1px,transparent_1px)] bg-[size:30px_30px] opacity-40"></div>
    <div class="absolute inset-0 bg-[linear-gradient(to_right,#612F7303_1px,transparent_1px),linear-gradient(to_bottom,#612F7303_1px,transparent_1px)] bg-[size:80px_80px]"></div>

    {{-- ADVANCED DECORATIVE ELEMENTS (Section-wide) --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        {{-- Floating Icons --}}
        <div class="absolute top-[18%] right-[15%] text-[#8C51A5]/10 text-7xl animate-float-slow"><i class="fas fa-atom"></i></div>
        <div class="absolute bottom-[20%] left-[8%] text-[#8C51A5]/10 text-6xl animate-float-slow-delayed rotate-12"><i class="fas fa-book-open"></i></div>
        <div class="absolute top-[25%] right-[35%] text-[#8C51A5]/5 text-8xl animate-pulse"><i class="fas fa-graduation-cap"></i></div>
        <div class="absolute bottom-[10%] right-[30%] text-[#8C51A5]/10 text-[12rem] animate-float-slow opacity-10"><i class="fas fa-pencil-alt text-[#F8CB62]"></i></div>
        
        {{-- Plus/Cross Signs Accents --}}
        <div class="absolute top-20 right-1/4 text-[#8C51A5]/20 text-2xl animate-spin-slow">+</div>
        <div class="absolute bottom-40 left-1/4 text-[#8C51A5]/20 text-3xl animate-spin-slow-reverse">×</div>
        <div class="absolute top-1/2 right-10 text-[#8C51A5]/15 text-xl animate-pulse text-[#F8CB62]">+</div>
        
        {{-- Abstract Shapes --}}
        <div class="absolute top-[40%] left-[2%] w-32 h-32 border-2 border-[#8C51A5]/5 rounded-[2rem] rotate-12 animate-float-slow"></div>
        <div class="absolute bottom-[30%] right-[3%] w-40 h-40 border border-[#8C51A5]/10 rounded-full animate-spin-slow-reverse"></div>
        
        {{-- Particles --}}
        <div class="absolute top-1/4 left-1/2 w-2 h-2 bg-[#D668EA]/20 rounded-full blur-sm animate-ping"></div>
        <div class="absolute bottom-1/3 left-[40%] w-1.5 h-1.5 bg-[#8C51A5]/30 rounded-full animate-pulse"></div>
        <div class="absolute top-2/3 right-1/4 w-2 h-2 bg-[#8C51A5]/20 rounded-full blur-sm animate-ping" style="animation-delay: 2s"></div>
    </div>

    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-14">

            {{-- LEFT CONTENT --}}
            <div class="space-y-8 flex flex-col items-center lg:items-start text-center lg:text-left relative">
                
                {{-- Dynamic Mobile Background Glow & Elements (Mobile Only) --}}
                <div class="absolute inset-x-[-2rem] inset-y-[-3rem] lg:hidden -z-10 overflow-hidden px-10">
                    {{-- Soft Glow Core --}}
                    <div class="absolute inset-0 bg-gradient-to-b from-white/80 via-white/40 to-transparent blur-3xl rounded-[3rem]"></div>
                    
                    {{-- Decorative Patterns --}}
                    <div class="absolute inset-0 opacity-[0.03] bg-[size:30px_30px] bg-[linear-gradient(to_right,#8C51A5_1px,transparent_1px),linear-gradient(to_bottom,#8C51A5_1px,transparent_1px)]"></div>
                    
                    {{-- Floating Symbols --}}
                    <div class="absolute top-10 left-4 text-[#8C51A5]/10 text-6xl font-black rotate-12 -z-10 select-none">Σ</div>
                    <div class="absolute bottom-1/4 right-2 text-[#8C51A5]/10 text-5xl font-black -rotate-12 -z-10 select-none font-mono">{}</div>
                    <div class="absolute top-1/4 right-0 text-[#8C51A5]/10 text-4xl font-black rotate-45 -z-10 select-none font-serif">&pi;</div>
                    
                    {{-- Floating Icons --}}
                    <div class="absolute top-[20%] left-[-10px] text-[#8C51A5]/5 text-6xl animate-float-slow -z-10">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="absolute bottom-[10%] right-[-10px] text-[#8C51A5]/5 text-7xl animate-float-slow-delayed -z-10">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                </div>
                <span class="inline-flex items-center gap-3 px-6 py-2.5 rounded-full bg-[#8C51A5]/10 text-[#612F73] text-sm font-black tracking-wide mt-8 lg:mt-24 border border-[#8C51A5]/20 shadow-sm transition-all hover:bg-[#8C51A5]/20 hero-animate hero-fade-down" style="animation-delay: 200ms">
                    <i class="fa-solid fa-award text-amber-500 scale-125"></i>
                    <span>{{ $settings['hero_badge'] ?? 'Status Akreditasi A' }}</span>
                </span>

                <h1 class="text-4xl lg:text-5xl xl:text-6xl font-black text-[#612F73] leading-tight hero-animate hero-fade-up" style="animation-delay: 500ms">
                    @php
                        $title = $settings['hero_title'] ?? 'Pendidikan Online Serasa Kelas Nyata';
                        // Split title to colorize part of it if it's long enough or just use brand color for the last words
                        $titleWords = explode(' ', $title);
                        $lastThree = array_slice($titleWords, -3);
                        $firstPart = array_slice($titleWords, 0, count($titleWords) - 3);
                    @endphp
                    {{ implode(' ', $firstPart) }}
                    <span class="text-[#8C51A5] bg-gradient-to-r from-[#612F73] to-[#D668EA] bg-clip-text text-transparent">{{ implode(' ', $lastThree) }}</span>
                </h1>

                <p class="text-gray-600 max-w-xl text-lg hero-animate hero-fade-up" style="animation-delay: 750ms">
                    {{ $settings['hero_description'] ?? 'Sistem pembelajaran sekolah modern dengan kelas interaktif, materi terstruktur, dan pendampingan guru profesional.' }}
                </p>

                {{-- CTA --}}
                <div class="flex flex-wrap justify-center lg:justify-start gap-4 pt-4 hero-animate hero-fade-up" style="animation-delay: 950ms">
                    <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                        class="px-8 py-4 rounded-2xl 
                            bg-gradient-to-r from-[#F8CB62] to-[#f5b82e] text-[#612F73] font-black shadow-xl shadow-[#F8CB62]/20
                            hover:shadow-golden hover:-translate-y-1
                            transform transition-all duration-300">
                        {{ $settings['hero_primary_text'] ?? 'PPDB Online' }}
                    </a>

                    <a href="{{ route('page', 'sekolah') }}"
                        class="px-8 py-4 rounded-2xl 
                            bg-white border-2 border-[#8C51A5]/10 text-[#8C51A5] font-black 
                            hover:bg-[#F0E7F8] hover:border-[#8C51A5]/30
                            transform hover:-translate-y-1 transition-all duration-500 ease-in-out shadow-sm">
                        {{ $settings['hero_secondary_text'] ?? 'Profil Sekolah' }}
                    </a>
                </div>

                {{-- Stats --}}
                <div class="flex flex-wrap justify-center lg:justify-start gap-6 lg:gap-10 pt-8 border-t border-[#8C51A5]/10 hero-animate hero-fade-up" 
                    style="animation-delay: 600ms">
                    @php
                        $studentVal = $students_stat ? $students_stat->value : (int)filter_var($settings['hero_stats_1_value'] ?? '1500', FILTER_SANITIZE_NUMBER_INT);
                        $studentSuffix = $students_stat ? $students_stat->suffix : '+';
                    @endphp
                    <div class="text-center lg:text-left">
                        <h3 class="text-3xl font-black text-[#612F73] leading-none mb-1">
                            <span class="counter" data-target="{{ $studentVal }}">0</span>{{ $studentSuffix }}
                        </h3>
                        <p class="text-[#8C51A5]/60 text-[10px] font-black uppercase tracking-widest">{{ $settings['hero_stats_1_label'] ?? 'Siswa Aktif' }}</p>
                    </div>
                    <div class="text-center lg:text-left border-x border-[#8C51A5]/20 px-6 lg:px-10">
                        <h3 class="text-3xl font-black text-[#612F73] leading-none mb-1">
                            <span class="counter" data-target="{{ $teachers_count ?? 120 }}">0</span>+
                        </h3>
                        <p class="text-[#8C51A5]/60 text-[10px] font-black uppercase tracking-widest">{{ $settings['hero_stats_2_label'] ?? 'Guru Profesional' }}</p>
                    </div>
                    <div class="text-center lg:text-left">
                        <h3 class="text-3xl font-black text-[#F8CB62] leading-none mb-1">
                            <span class="counter" data-target="{{ (int)filter_var($settings['hero_stats_3_value'] ?? '98', FILTER_SANITIZE_NUMBER_INT) }}">0</span>%
                        </h3>
                        <p class="text-[#8C51A5]/60 text-[10px] font-black uppercase tracking-widest">{{ $settings['hero_stats_3_label'] ?? 'Kelulusan' }}</p>
                    </div>
                </div>
            </div>

            {{-- RIGHT IMAGE --}}
            <div class="relative flex items-end justify-center lg:justify-end h-full mt-2 lg:mt-0 lg:translate-y-20">

    {{-- Dynamic Educational Collage Background --}}
    <div class="absolute inset-0 z-0 pointer-events-none overflow-visible flex items-center justify-center hero-animate hero-zoom-in" style="animation-delay: 400ms">
        
        {{-- Soft Glow --}}
        <div class="absolute w-[600px] lg:w-[900px] h-[600px] lg:h-[900px] bg-[#8C51A5]/10 rounded-full blur-[120px]"></div>
 
        {{-- GEOMETRIC FOUNDATION --}}
        {{-- Solid Square - Top Right --}}
        <div class="absolute top-[15%] right-[10%] w-24 lg:w-40 h-24 lg:w-40 bg-[#612F73] rounded-[2.5rem] rotate-12 animate-float-slow transition-transform border-4 border-white/20 shadow-premium-lg"></div>
        
        {{-- Solid Triangle - Bottom Left --}}
        <div class="absolute bottom-[20%] left-[8%] w-32 lg:w-56 h-32 lg:h-56 bg-[#8C51A5] clip-triangle -rotate-12 animate-float-slow-delayed border-white/10 opacity-20"></div>
        
        {{-- Wireframe Circle - Center --}}
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[350px] lg:w-[600px] h-[350px] lg:h-[600px] border border-[#8C51A5]/20 rounded-full"></div>
 
        {{-- EDUCATIONAL TOOLS (Floating Icons) --}}
        {{-- Coding - Top Left --}}
        <div class="absolute top-[25%] left-[15%] flex items-center justify-center w-12 lg:w-16 h-12 lg:h-16 bg-white shadow-xl rounded-2xl animate-float-slow border border-[#8C51A5]/10">
            <i class="fas fa-code text-[#612F73] text-xl lg:text-2xl"></i>
        </div>
 
        {{-- Science - Mid Right --}}
        <div class="absolute top-[45%] right-[5%] flex items-center justify-center w-10 lg:w-14 h-10 lg:h-14 bg-white shadow-xl rounded-2xl animate-spin-slow border border-[#8C51A5]/10">
            <i class="fas fa-atom text-[#8C51A5] text-lg lg:text-xl"></i>
        </div>
 
        {{-- Finance/Math - Bottom Right --}}
        <div class="absolute bottom-[25%] right-[12%] flex items-center justify-center w-12 lg:w-16 h-12 lg:h-16 bg-white shadow-xl rounded-2xl animate-float-slow-delayed border border-[#8C51A5]/10">
            <i class="fas fa-chart-line text-[#F8CB62] text-xl lg:text-2xl"></i>
        </div>
 
        {{-- Creative/Design - Bottom Left --}}
        <div class="absolute bottom-[35%] left-[5%] flex items-center justify-center w-10 lg:w-14 h-10 lg:h-14 bg-white shadow-xl rounded-2xl animate-pulse border border-[#8C51A5]/10">
            <i class="fas fa-palette text-[#D668EA] text-lg lg:text-xl"></i>
        </div>
 
        {{-- Mathematics - Top Center --}}
        <div class="absolute top-[8%] left-[45%] flex items-center justify-center w-12 h-12 bg-white shadow-xl rounded-2xl animate-float-slow border border-[#8C51A5]/10">
            <i class="fas fa-calculator text-[#8C51A5] text-xl"></i>
        </div>
 
        {{-- Micro Decorative Elements --}}
        <div class="absolute top-1/3 left-[40%] text-[#8C51A5] opacity-20 text-4xl font-black rotate-12 select-none">Σ</div>
        <div class="absolute bottom-1/4 right-[40%] text-[#612F73] opacity-20 text-5xl font-black -rotate-12 select-none font-mono">{}</div>
        <div class="absolute top-1/4 right-[20%] text-[#D668EA] opacity-20 text-3xl font-black rotate-45 select-none">&pi;</div>
    </div>

    {{-- Hero Model Display Wrapper --}}
    <div class="relative w-full max-w-[350px] md:max-w-[500px] lg:max-w-[520px] h-[450px] md:h-[550px] lg:h-[600px] z-10 flex items-end justify-center">

        {{-- Background Decorations specifically for the model --}}
        <div class="absolute inset-x-0 bottom-0 top-20 pointer-events-none">
             @include('partials.hero-model-shapes')
        </div>

        {{-- Reflection/Shadow Canvas --}}
        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[80%] h-12 bg-[#612F73]/40 rounded-[100%] blur-3xl opacity-50"></div>

        {{-- Image Slider --}}
        <div class="relative w-full h-full">
            @forelse($slideBener as $index => $slide)
                <img
                    src="{{ asset('storage/' . $slide->image) }}"
                    alt="{{ $slide->title ?? 'Siswa SMK YAJ' }}"
                    class="absolute bottom-0 left-0
                           w-full h-full
                           object-cover object-bottom drop-shadow-[0_25px_40px_rgba(0,0,0,0.5)] 
                           slider-item transition-all duration-1000 transform
                           {{ $index === 0 ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-10 scale-95' }}"
                />
            @empty
                <img
                    src="{{ asset('images/hero/hero-yaj.png') }}"
                    alt="Siswa SMK YAJ"
                    class="absolute bottom-0 left-0
                           w-full h-full
                           object-cover object-bottom drop-shadow-[0_25px_40px_rgba(0,0,0,0.5)] 
                           animate-fade-in-up"
                />
            @endforelse
        </div>

        {{-- Glass Floating Badge (Pendidikan Digital) --}}
        <div class="absolute bottom-16 md:bottom-24 right-0 md:right-10 lg:right-20 z-20 animate-float-slow scale-90 md:scale-100">
            <div class="bg-white/10 backdrop-blur-xl border border-white/20 p-5 rounded-3xl shadow-2xl flex items-center gap-4">
                <div class="w-12 h-12 bg-gradient-to-tr from-[#8C51A5] to-[#612F73] rounded-2xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-user-graduate text-white"></i>
                </div>
                <div>
                    <div class="text-[10px] font-black text-[#F8CB62] uppercase tracking-widest">Pendidikan</div>
                    <div class="text-white font-bold leading-tight">🎓 Digital</div>
                </div>
            </div>
        </div>
    </div>
</div>

</section>

        {{-- Floating Shapes --}}
        <div class="absolute inset-0 z-10 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-[#612F73]/10 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#8C51A5]/10 rounded-full blur-3xl animate-float-delayed">
            </div>
            <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-[#D668EA]/5 rounded-full blur-3xl animate-pulse"></div>
        </div>

    

    {{-- About / Principal Section - Soft Purple Theme --}}
    @if($principalMessage)
    <section class="py-24 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">

        {{-- Soft Background Accent --}}
        <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-purple-50/60 to-transparent"></div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            {{-- Mobile Badge --}}
            <div class="flex lg:hidden justify-center mb-10" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#8C51A5]/10 rounded-full text-[#612F73] text-xs font-black border border-[#8C51A5]/20 shadow-sm uppercase">
                    <i class="fas fa-quote-left text-[#F8CB62]"></i>
                    <span>SAMBUTAN KEPALA SEKOLAH</span>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

                {{-- Image Side --}}
                <div class="relative order-first px-4 lg:px-0" data-aos="fade-right">
                    <div class="relative z-10 group max-w-[450px] mx-auto">
                        <div
                            class="absolute -inset-4 bg-gradient-to-br from-[#8C51A5]/15 to-[#612F73]/15
                                rounded-[2.5rem] blur-2xl group-hover:blur-3xl transition-all">
                        </div>
 
                        <div
                            class="relative bg-gradient-to-br from-white to-[#F0E7F8]
                                rounded-[2rem] md:rounded-[2.5rem] p-4 md:p-6 shadow-2xl border border-white/50">
 
                            @if($principalMessage->photo)
                                <img src="{{ asset('storage/' . $principalMessage->photo) }}"
                                    alt="{{ $principalMessage->name }}"
                                    class="w-full rounded-2xl md:rounded-[1.5rem] shadow-lg
                                        transform group-hover:scale-[1.02]
                                        transition-transform duration-500"
                                    onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($principalMessage->name) }}&size=400&background=612F73&color=fff'">
                            @else
                                <div
                                    class="w-full aspect-[3/4]
                                        bg-gradient-to-r from-[#612F73] to-[#8C51A5]
                                        rounded-2xl flex items-center justify-center">
                                    <i class="fas fa-user-graduate text-8xl text-white/30"></i>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Experience Badge --}}
                    <div class="absolute -bottom-4 -right-2 md:-bottom-6 md:-right-6 z-20 scale-75 md:scale-100">
                        <div class="relative">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-amber-400 to-orange-500
                                    rounded-2xl blur-lg opacity-50">
                            </div>
                            <div
                                class="relative w-28 h-28 md:w-36 md:h-36 bg-gradient-to-br from-amber-400 to-orange-500
                                    rounded-2xl flex flex-col items-center justify-center
                                    text-white shadow-xl transform hover:scale-105 transition-transform">
                                <span class="text-4xl md:text-5xl font-black leading-none">{{ $settings['years_experience'] ?? '20' }}</span>
                                <span class="text-[10px] md:text-xs text-center font-bold uppercase tracking-wider opacity-90 mt-1">
                                    Years Of<br>Experience
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Content Side --}}
                <div class="flex flex-col items-center lg:items-start text-center lg:text-left" data-aos="fade-left">
                    <div
                        class="hidden lg:inline-flex items-center gap-2 px-5 py-2.5
                            bg-[#8C51A5]/10 rounded-full
                            text-[#612F73] text-sm font-semibold mb-6 border border-[#8C51A5]/20 shadow-sm">
                        <i class="fas fa-quote-left"></i>
                        <span>SAMBUTAN KEPALA SEKOLAH</span>
                    </div>

                    <h2 class="text-4xl md:text-5xl font-black text-[#612F73] mb-3 leading-tight">
                        {{ $principalMessage->name }}
                    </h2>

                    @if($principalMessage->title)
                        <p class="text-[#8C51A5] font-bold text-lg mb-8 uppercase tracking-widest">
                            {{ $principalMessage->title }}
                        </p>
                    @endif

                    <div class="prose prose-lg text-gray-600 mb-10 max-w-none leading-relaxed">
                        {!! Str::limit(strip_tags($principalMessage->message), 400) !!}
                    </div>

                    {{-- Vision & Mission --}}
                    <div class="grid sm:grid-cols-2 gap-5">

                         {{-- Vision --}}
                        <div
                            class="group p-6 bg-white/[0.02] backdrop-blur-sm
                                rounded-3xl border border-[#8C51A5]/10
                                hover:shadow-premium-lg hover:-translate-y-1 transition-all duration-500">
                            <div
                                class="w-14 h-14 bg-gradient-to-r from-[#612F73] to-[#8C51A5]
                                    rounded-2xl flex items-center justify-center mb-4
                                    shadow-lg group-hover:scale-110 transition-transform">
                                <i class="fas fa-bullseye text-white text-xl"></i>
                            </div>
                            <h4 class="font-bold text-[#612F73] text-lg mb-2">Visi Kami</h4>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                {!! Str::limit(strip_tags($principalMessage->vision), 80) !!}
                            </p>
                        </div>

                        {{-- Mission --}}
                        <div
                            class="group p-6 bg-white/[0.02] backdrop-blur-sm
                                rounded-3xl border border-[#D668EA]/10
                                hover:shadow-premium-lg hover:-translate-y-1 transition-all duration-500">
                            <div
                                class="w-14 h-14 bg-gradient-to-r from-[#8C51A5] to-[#D668EA]
                                    rounded-2xl flex items-center justify-center mb-4
                                    shadow-lg group-hover:scale-110 transition-transform">
                                <i class="fas fa-rocket text-white text-xl"></i>
                            </div>
                            <h4 class="font-bold text-[#612F73] text-lg mb-2">Misi Kami</h4>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                {!! Str::limit(strip_tags($principalMessage->mission), 80) !!}
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif


    {{-- Majors Section - Asymmetric Modern --}}
    <section class="py-32 bg-[#F0E7F8]/30 relative overflow-hidden">

        {{-- Decorative Background Elements --}}
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-[#8C51A5]/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute top-1/3 -right-32 w-[28rem] h-[28rem] bg-[#612F73]/10 rounded-full blur-3xl animate-pulse-slow-delayed"></div>
        
        {{-- Subtle Floating Elements --}}
        <div class="absolute top-20 right-[20%] text-[#8C51A5]/5 text-9xl font-black select-none pointer-events-none">PROGRAM</div>
        <div class="absolute bottom-20 left-[10%] text-[#612F73]/5 text-9xl font-black select-none pointer-events-none rotate-90">STUDY</div>

        {{-- Subtle Grid Pattern --}}
        <div class="absolute inset-0 bg-[radial-gradient(#8C51A508_1px,transparent_1px)] bg-[size:40px_40px]"></div>

        <div class="container mx-auto px-6 lg:px-12 relative z-10">

            {{-- Section Header --}}
            <div class="flex flex-col lg:flex-row lg:items-end justify-between mb-24 gap-8" data-aos="fade-up">
                <div class="max-w-2xl">
                    <div
                        class="inline-flex items-center gap-3 px-5 py-2 bg-[#8C51A5]/10 text-[#612F73] text-xs font-black uppercase tracking-[0.3em] rounded-full mb-6 border-l-4 border-[#8C51A5] shadow-sm">
                        <i class="fas fa-book-open"></i>
                        <span>PROGRAM KEAHLIAN</span>
                    </div>

                    <h2 class="text-4xl md:text-6xl font-black text-[#612F73] mb-6 leading-[1.1]">
                        {{ $majors->count() }} Jurusan <br>
                        <span class="text-[#8C51A5] bg-gradient-to-r from-[#612F73] to-[#D668EA] bg-clip-text text-transparent">Unggulan</span> Kami
                    </h2>

                    <p class="text-gray-500 text-lg leading-relaxed">
                        Kurikulum yang disesuaikan dengan kebutuhan industri masa kini untuk mencetak tenaga kerja profesional dan kompeten.
                    </p>
                </div>

                <div class="hidden lg:block text-right">
                    <div class="text-7xl font-black text-[#F0E7F8] mb-2 uppercase">Majors</div>
                    <div class="w-24 h-1.5 bg-[#8C51A5] ml-auto rounded-full"></div>
                </div>
            </div>

            {{-- IMAGE-INSPIRED MASONRY GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                @php $totalMajors = $majors->count(); @endphp
                @foreach($majors as $index => $major)
                    @php
                        $mod = $index % 4;
                        $spanClass = "md:col-span-1";
                        $heightClass = "h-[450px]"; 
                        
                        // New 3-Column Asymmetric Logic (2 - 1 / 1 - 2)
                        // This creates a checkerboard effect where large cards take 2/3 width, never full width.
                        
                        if ($mod == 0) {
                            $spanClass = "md:col-span-2";
                        } elseif ($mod == 1) {
                            $spanClass = "md:col-span-1";
                        } elseif ($mod == 2) {
                            $spanClass = "md:col-span-1";
                        } elseif ($mod == 3) {
                            $spanClass = "md:col-span-2";
                        }

                        // Last item handling: If the total number of items is odd, the last item
                        // will be alone in the row. We force it to span full width (3 columns)
                        // so it doesn't leave awkward empty space.
                        if ($index == $totalMajors - 1 && $totalMajors % 2 != 0) {
                            $spanClass = "md:col-span-3";
                        }
                    @endphp

                    <div class="group relative {{ $spanClass }}" data-aos="fade-up">
                        <a href="{{ route('major.show', $major->slug) }}"
                           class="block relative w-full {{ $heightClass }} rounded-[2rem] md:rounded-[3rem] overflow-hidden border border-purple-50 shadow-xl hover:shadow-2xl transition-all duration-500 ease-in-out transform group-hover:-translate-y-3">

                            {{-- Background Image --}}
                            @if($major->image)
                                <img src="{{ asset('storage/' . $major->image) }}" alt="{{ $major->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-[#612F73] to-[#8C51A5] flex items-center justify-center">
                                    <i class="fas fa-graduation-cap text-7xl text-white/20"></i>
                                </div>
                            @endif

                            {{-- Premium Overlays --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/20 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                            
                            {{-- Glass Badge --}}
                            <div class="absolute top-6 left-6">
                                <span class="px-5 py-2 bg-white/15 backdrop-blur-md text-white text-[10px] font-black uppercase tracking-widest rounded-xl border border-white/20 shadow-lg">
                                    {{ $major->short_name }}
                                </span>
                            </div>

                            {{-- Floating Icon Decor --}}
                            <div class="absolute top-6 right-6 text-white/20 text-3xl group-hover:scale-110 group-hover:text-white/40 transition-all duration-500 ease-in-out">
                                <i class="fas fa-arrow-up-right-from-square"></i>
                            </div>

                            {{-- Text Content (Bottom Anchored) --}}
                            <div class="absolute bottom-0 left-0 right-0 p-8 lg:p-12">
                                <div class="mb-4 flex items-center gap-3">
                                    <div class="w-10 h-[2px] bg-[#F8CB62]"></div>
                                    <span class="text-[#F8CB62] font-black text-[10px] uppercase tracking-[0.3em]">Program Keahlian</span>
                                </div>
                                
                                <h3 class="text-2xl md:text-4xl font-black text-white mb-4 leading-tight">
                                    {{ $major->name }}
                                </h3>

                                <p class="text-gray-300 text-sm md:text-base leading-relaxed line-clamp-2 max-w-xl group-hover:text-white transition-colors duration-500 ease-in-out">
                                    {{ $major->short_description }}
                                </p>
                            </div>

                            {{-- Hover Border Glow --}}
                            <div class="absolute inset-0 border-4 border-[#8C51A5]/0 group-hover:border-[#8C51A5]/50 rounded-[2rem] md:rounded-[3rem] transition-all pointer-events-none"></div>
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- FOOTER CTA --}}
            <div class="text-center mt-24" data-aos="fade-up">
                <a href="{{ route('majors') }}"
                   class="inline-flex items-center gap-4 px-12 py-5 bg-[#8C51A5] text-white font-black text-xs uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-[#8C51A5]/20 hover:bg-[#8C51A5]/10 hover:text-[#8C51A5] border border-transparent hover:border-[#8C51A5]/20 transition-all duration-500 ease-in-out group">
                    <i class="fas fa-th-large group-hover:rotate-45 transition-transform"></i>
                    Semua Program Keahlian
                </a>
            </div>
        </div>
    </section>


    {{-- Awards Section - Asymmetric Modern (Dark Premium Theme) --}}
    @if($awards->count() > 0)
    <section class="py-32 bg-premium-dark relative overflow-hidden">

        {{-- BACKGROUND ELEMENTS (Dark & Dynamic match CTA) --}}
        @include('partials.awards-shapes')

        {{-- Floating Decorative Icons (Kept from previous enhance) --}}
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-[15%] left-[10%] text-[#8C51A5]/10 text-6xl animate-float-slow"><i class="fas fa-graduation-cap"></i></div>
            <div class="absolute top-[40%] right-[15%] text-[#F8CB62]/10 text-8xl animate-float-delayed"><i class="fas fa-award"></i></div>
            <div class="absolute bottom-[20%] left-[20%] text-[#D668EA]/10 text-5xl animate-float-slow-delayed"><i class="fas fa-medal text-[#F8CB62]"></i></div>
            <div class="absolute top-[10%] right-[30%] text-[#8C51A5]/5 text-7xl animate-pulse"><i class="fas fa-star text-[#F8CB62]"></i></div>
            <div class="absolute bottom-[10%] right-[10%] text-[#F0E7F8]/5 text-9xl animate-float-slow"><i class="fas fa-certificate"></i></div>
            <div class="absolute top-1/2 left-[5%] text-[#8C51A5]/5 text-4xl -rotate-12"><i class="fas fa-book"></i></div>
            <div class="absolute bottom-1/3 right-[5%] text-[#F8CB62]/5 text-6xl rotate-12"><i class="fas fa-trophy"></i></div>
        </div>

        <div class="container mx-auto px-6 lg:px-12 relative z-10">

            {{-- HEADER (White Text) --}}
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-24" data-aos="fade-up">
                <div class="max-w-2xl">
                    <div
                        class="inline-flex items-center gap-3 px-5 py-2 bg-white/10 backdrop-blur rounded-full text-[#F0E7F8] text-[10px] font-black uppercase tracking-[0.3em] mb-6 border-l-4 border-[#F8CB62] shadow-lg">
                        <i class="fas fa-trophy text-[#F8CB62]"></i>
                        <span>OUR RECOGNITIONS</span>
                    </div>

                    <h2 class="text-4xl md:text-6xl font-black text-white mb-6 leading-[1.1]">
                        Prestasi & <br>
                        <span class="text-[#F8CB62] bg-gradient-to-r from-[#F8CB62] to-[#D668EA] bg-clip-text text-transparent">Penghargaan</span> Kami
                    </h2>

                    <p class="text-white/60 text-lg leading-relaxed">
                        Bukti dedikasi dan komitmen berkelanjutan dalam mencetak generasi unggul yang siap bersaing di era digital.
                    </p>
                </div>
                
                <div class="hidden md:block">
                    <div class="flex items-center gap-4 text-[#8C51A5] font-black uppercase tracking-widest text-[10px]">
                        <span class="text-5xl opacity-20 text-white">#01</span>
                        <div class="w-12 h-[2px] bg-[#F8CB62]/50"></div>
                        <span class="text-gray-300">Top Institution</span>
                    </div>
                </div>
            </div>

            {{-- BALANCED GRID (Cards Aligned) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-8 items-stretch">
                @foreach($awards as $index => $award)
                    <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        
                        {{-- Hover Glow Behind --}}
                        <div class="absolute inset-0 bg-[#8C51A5] rounded-[2rem] blur-3xl opacity-0 group-hover:opacity-20 transition-opacity duration-700"></div>

                        <div class="relative h-full bg-white/5 backdrop-blur-md rounded-[2rem] border border-white/10 p-5 flex flex-col transition-all duration-500 hover:-translate-y-2 hover:border-[#F8CB62]/30 hover:shadow-premium-lg">
                            
                            {{-- Image Area (Full Width of Inner Card) --}}
                            <div class="relative w-full aspect-[4/3] rounded-[1.5rem] overflow-hidden mb-6 group/image">
                                
                                {{-- Year Badge (Floating) --}}
                                @if($award->year)
                                    <div class="absolute top-4 right-4 z-20 px-3 py-1 bg-[#F8CB62] text-[#612F73] text-[10px] font-black uppercase tracking-widest rounded-lg shadow-lg">
                                        {{ $award->year }}
                                    </div>
                                @endif

                                @if($award->image)
                                    <img src="{{ asset('storage/' . $award->image) }}" alt="{{ $award->title }}"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-[#612F73]/50 to-[#8C51A5]/50 flex items-center justify-center">
                                        <i class="fas fa-award text-5xl text-[#F8CB62]/50 group-hover:text-[#F8CB62] transition-colors duration-500 ease-in-out"></i>
                                    </div>
                                @endif
                            </div>

                             {{-- Content Area --}}
                             <div class="px-2 pb-4 flex-grow text-center">
                                @if($award->organizer)
                                    <div class="inline-block mb-3">
                                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#F8CB62]">
                                            {{ $award->organizer }}
                                        </span>
                                    </div>
                                @endif

                                <h4 class="text-white font-black text-xl mb-3 leading-tight group-hover:text-[#F8CB62] transition-colors duration-500 ease-in-out">
                                    {{ $award->title }}
                                </h4>
                            </div>

                            {{-- Bottom Decorative Line --}}
                            <div class="mt-auto flex justify-center pb-2">
                                <div class="w-12 h-1 bg-white/10 rounded-full overflow-hidden">
                                    <div class="w-full h-full bg-[#F8CB62] -translate-x-full group-hover:translate-x-0 transition-transform duration-500"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif 


    {{-- News Section - Asymmetric Modern --}}
    @if($news->count() > 0)
    <section class="py-32 bg-white relative overflow-hidden">
 
        {{-- Decorative Background Elements --}}
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-[#8C51A5]/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute top-1/3 -right-32 w-[28rem] h-[28rem] bg-[#612F73]/10 rounded-full blur-3xl animate-pulse-slow-delayed"></div>
        
        {{-- Subtle Floating Elements --}}
        <div class="absolute top-20 right-[20%] text-[#8C51A5]/5 text-9xl font-black select-none pointer-events-none uppercase tracking-[0.2em]">LATEST</div>
        <div class="absolute bottom-20 left-[10%] text-[#612F73]/5 text-9xl font-black select-none pointer-events-none rotate-90 uppercase tracking-[0.2em]">ARTICLES</div>
 
        {{-- Subtle Grid Pattern --}}
        <div class="absolute inset-0 bg-[radial-gradient(#8C51A508_1px,transparent_1px)] bg-[size:40px_40px]"></div>
 
        <div class="container mx-auto px-6 lg:px-12 relative z-10">
 
            {{-- Section Header --}}
            <div class="flex flex-col lg:flex-row lg:items-end justify-between mb-24 gap-8" data-aos="fade-up">
                <div class="max-w-2xl">
                    <div
                        class="inline-flex items-center gap-3 px-5 py-2 bg-[#8C51A5]/10 text-[#612F73] text-[10px] font-black uppercase tracking-[0.3em] rounded-full mb-6 border-l-4 border-[#8C51A5] shadow-sm">
                        <i class="fas fa-newspaper"></i>
                        <span>BERITA & ARTIKEL TERKINI</span>
                    </div>
 
                    <h2 class="text-4xl md:text-6xl font-black text-[#612F73] mb-6 leading-[1.1] uppercase tracking-tight">
                        Informasi <br>
                        <span class="text-[#8C51A5] bg-gradient-to-r from-[#612F73] to-[#D668EA] bg-clip-text text-transparent">Update</span> Sekolah
                    </h2>
 
                    <p class="text-gray-500 text-lg leading-relaxed font-medium">
                        Temukan berita terbaru, pengumuman resmi, dan artikel menarik seputar kegiatan sekolah kami.
                    </p>
                </div>
 
                <div class="hidden lg:block text-right">
                    <div class="text-7xl font-black text-[#F0E7F8] mb-2 uppercase">News</div>
                    <div class="w-24 h-1.5 bg-[#8C51A5] ml-auto rounded-full"></div>
                </div>
            </div>

            {{-- ASYMMETRIC MASONRY GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                @php 
                    $newsItems = $news->take(4); // Or more if design permits
                    $totalNews = $newsItems->count(); 
                @endphp
                @foreach($newsItems as $index => $item)
                    @php
                        $mod = $index % 4;
                        $spanClass = "md:col-span-1";
                        $heightClass = "h-[450px]"; 
                        
                        // New 3-Column Asymmetric Logic (2 - 1 / 1 - 2)
                        if ($mod == 0) {
                            $spanClass = "md:col-span-2";
                        } elseif ($mod == 1) {
                            $spanClass = "md:col-span-1";
                        } elseif ($mod == 2) {
                            $spanClass = "md:col-span-1";
                        } elseif ($mod == 3) {
                            $spanClass = "md:col-span-2";
                        }

                        // Last item handling: If the total number of items is odd, the last item
                        // will be alone in the row. We force it to span full width (3 columns)
                        // so it doesn't leave awkward empty space.
                        if ($index == $totalNews - 1 && $totalNews % 2 != 0) {
                            $spanClass = "md:col-span-3";
                        }
                    @endphp

                    <div class="group relative {{ $spanClass }}" data-aos="fade-up">
                        <a href="{{ route('news.show', $item->slug) }}"
                           class="block relative w-full {{ $heightClass }} rounded-[2rem] md:rounded-[3rem] overflow-hidden border border-purple-50 shadow-xl hover:shadow-2xl transition-all duration-500 ease-in-out transform group-hover:-translate-y-3">

                            {{-- Background Image --}}
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-[#612F73] to-[#8C51A5] flex items-center justify-center">
                                    <i class="fas fa-newspaper text-7xl text-white/20"></i>
                                </div>
                            @endif

                            {{-- Premium Overlays --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/20 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                            
                            {{-- Glass Badge --}}
                            @if($item->category)
                            <div class="absolute top-6 left-6">
                                <span class="px-5 py-2 bg-white/10 backdrop-blur-md text-white text-[10px] font-black uppercase tracking-widest rounded-xl border border-white/20">
                                    {{ $item->category }}
                                </span>
                            </div>
                            @endif

                            {{-- Floating Icon Decor --}}
                            <div class="absolute top-6 right-6 text-white/20 text-3xl group-hover:scale-110 group-hover:text-white/40 transition-all duration-500 ease-in-out">
                                <i class="fas fa-arrow-up-right-from-square"></i>
                            </div>

                            {{-- Text Content (Bottom Anchored) --}}
                            <div class="absolute bottom-0 left-0 right-0 p-8 lg:p-12">
                                <div class="mb-4 flex items-center gap-3">
                                    <div class="w-10 h-[2px] bg-[#F8CB62]"></div>
                                    <span class="text-[#F8CB62] font-black text-[10px] uppercase tracking-[0.3em]">
                                        {{ $item->published_at->format('d M Y') }}
                                    </span>
                                </div>
                                
                                <h3 class="text-2xl md:text-4xl font-black text-white mb-4 leading-tight">
                                    {{ $item->title }}
                                </h3>

                                <p class="text-gray-300 text-sm md:text-base leading-relaxed line-clamp-2 max-w-xl group-hover:text-white transition-colors duration-500 ease-in-out">
                                    {{ Str::limit(strip_tags($item->content), 120) }}
                                </p>
                            </div>

                            {{-- Hover Border Glow --}}
                            <div class="absolute inset-0 border-4 border-[#8C51A5]/0 group-hover:border-[#8C51A5]/50 rounded-[2rem] md:rounded-[3rem] transition-all pointer-events-none"></div>
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- FOOTER CTA --}}
            <div class="text-center mt-24" data-aos="fade-up">
                <a href="{{ route('news') }}"
                   class="inline-flex items-center gap-4 px-12 py-5 bg-[#8C51A5] text-white font-black text-[10px] uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-[#8C51A5]/20 hover:bg-[#8C51A5]/10 hover:text-[#8C51A5] border border-transparent hover:border-[#8C51A5]/20 transition-all duration-500 group">
                    <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform duration-300 ease-in-out"></i>
                    Lihat Portofolio Berita
                </a>
            </div>

        </div>
    </section>
    @endif 


    {{-- CTA Section --}}
    <section class="py-24 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden border-t border-white/10">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl md:text-6xl font-black text-white mb-8 tracking-tight uppercase" data-aos="fade-up">
                    Gabung Bersama Kami
                </h2>
                <p class="text-gray-400 text-lg md:text-xl mb-12 font-medium max-w-2xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                    Mulai perjalanan akademik Anda bersama {{ $settings['school_name'] ?? 'SMK YAJ' }} dan raih masa depan cerah di industri global.
                </p>
                <div class="flex flex-wrap justify-center gap-6" data-aos="fade-up" data-aos-delay="400">
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center gap-4 px-12 py-5 
                        rounded-2xl
                        bg-[#8C51A5] text-white font-black hover:bg-[#612F73] shadow-premium-lg hover:-translate-y-1 transform transition-all uppercase text-xs tracking-widest">
                        <i class="fas fa-paper-plane text-xl text-[#F8CB62]"></i>
                        KIRIM PESAN
                    </a>
 
                    @if(($settings['ppdb_active'] ?? false))
                        <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                            class="inline-flex items-center gap-4 px-12 py-5 
                            rounded-2xl
                            bg-gradient-to-r from-[#F8CB62] to-[#f5b82e] text-[#612F73] font-black hover:shadow-golden transform hover:-translate-y-1 transition-all uppercase text-xs tracking-widest">
                            <i class="fas fa-user-plus text-xl"></i>
                            PENDAFTARAN PPDB
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Business Centers Section --}}
    @if($businessCenters->count() > 0)
        <section class="py-24 bg-[#F0E7F8]/30 relative overflow-hidden">
            {{-- Decorative Background Elements - ENRICHED --}}
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute top-1/4 -left-32 w-96 h-96 bg-[#8C51A5]/10 rounded-full blur-[100px] animate-pulse-slow"></div>
                <div class="absolute bottom-1/4 -right-32 w-96 h-96 bg-[#612F73]/10 rounded-full blur-[100px] animate-pulse-slow-delayed"></div>
                
                {{-- Floating Icons for Business/Commerce Theme --}}
                <div class="absolute top-[8%] right-[15%] text-[#8C51A5]/10 text-6xl animate-float-slow opacity-20"><i class="fas fa-handshake"></i></div>
                <div class="absolute bottom-[12%] left-[8%] text-[#612F73]/10 text-8xl animate-float-slow-delayed opacity-10"><i class="fas fa-store"></i></div>
                <div class="absolute top-1/2 right-[8%] text-[#8C51A5]/5 text-[15rem] animate-pulse opacity-5"><i class="fas fa-chart-bar text-[#F8CB62]"></i></div>
                <div class="absolute bottom-[25%] right-[18%] text-[#612F73]/10 text-5xl animate-float-slow rotate-12 opacity-20"><i class="fas fa-calculator"></i></div>
                <div class="absolute top-[18%] left-[12%] text-[#8C51A5]/5 text-7xl animate-float-slow-delayed -rotate-12 opacity-15"><i class="fas fa-wallet text-[#F8CB62]"></i></div>
                <div class="absolute top-[40%] left-[5%] text-[#8C51A5]/10 text-5xl animate-spin-slow opacity-15"><i class="fas fa-coins text-[#F8CB62]"></i></div>
                <div class="absolute bottom-[30%] left-[25%] text-[#612F73]/5 text-7xl animate-pulse opacity-10"><i class="fas fa-tags"></i></div>
                <div class="absolute top-[5%] left-[40%] text-[#8C51A5]/10 text-4xl animate-float-slow opacity-10"><i class="fas fa-boxes"></i></div>
                <div class="absolute bottom-[5%] right-[40%] text-[#612F73]/10 text-4xl animate-float-slow-delayed opacity-10"><i class="fas fa-receipt"></i></div>

                {{-- Geometric Accents --}}
                <div class="absolute top-12 left-1/4 text-[#8C51A5]/20 text-4xl animate-spin-slow-reverse">+</div>
                <div class="absolute bottom-32 right-1/4 text-[#8C51A5]/20 text-3xl animate-spin-slow">×</div>
                <div class="absolute top-1/3 left-10 text-[#8C51A5]/10 text-5xl font-black rotate-12 select-none">Σ</div>
                <div class="absolute bottom-1/4 right-5 text-[#612F73]/10 text-6xl font-black -rotate-12 select-none font-mono">{}</div>
                
                {{-- Decorative Shapes --}}
                <div class="absolute top-[60%] right-[12%] w-24 h-24 border-4 border-[#8C51A5]/5 rounded-3xl rotate-45 animate-float-slow"></div>
                <div class="absolute top-[20%] left-[30%] w-16 h-16 border-2 border-[#8C51A5]/5 rounded-full animate-pulse"></div>
                <div class="absolute bottom-[40%] right-[30%] w-20 h-20 bg-[#8C51A5]/5 rounded-[2rem] rotate-12 animate-float-slow-delayed"></div>
                <div class="absolute top-[10%] left-1/2 w-40 h-1 bg-gradient-to-r from-transparent via-[#8C51A5]/10 to-transparent rotate-45"></div>
                
                {{-- Subtle Grid Pattern --}}
                <div class="absolute inset-0 bg-[radial-gradient(#8C51A508_1px,transparent_1px)] bg-[size:40px_40px]"></div>
            </div>
 
            <div class="container mx-auto px-4 lg:px-8 relative z-10">
                {{-- Section Header --}}
                <div class="text-center mb-16" data-aos="fade-up">
                    <div
                        class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#8C51A5]/10 rounded-full text-[#612F73] text-[10px] font-black uppercase tracking-widest mb-6 shadow-sm border border-[#8C51A5]/10">
                        <i class="fas fa-store text-[#F8CB62]"></i>
                        <span>BUSINESS CENTER & UNIT USAHA</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-black text-[#612F73] mb-4 uppercase tracking-tight">Kemandirian Siswa</h2>
                    <p class="text-gray-500 max-w-2xl mx-auto text-lg font-medium leading-relaxed">Unit produksi dan jasa yang menjadi wadah aktualisasi kompetensi siswa.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($businessCenters->take(3) as $bc)
                        <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 150 }}">
                            <article
                                class="group h-full bg-white rounded-[2.5rem] overflow-hidden border border-[#8C51A5]/10 shadow-premium-lg hover:border-[#8C51A5]/40 transition-all duration-500 ease-in-out hover:-translate-y-3 hover:scale-[1.01] text-center p-10 hover:shadow-2xl">
                                {{-- Photo --}}
                                <div class="relative mb-10">
                                    <div
                                        class="w-full h-56 rounded-[2rem] overflow-hidden border-4 border-white shadow-xl group-hover:border-[#8C51A5]/20 transition-all duration-500 p-1 bg-gradient-to-br from-[#8C51A5]/5 to-transparent">
                                        @if($bc->image)
                                            <img src="{{ asset('storage/' . $bc->image) }}" alt="{{ $bc->name }}"
                                                class="w-full h-full object-cover rounded-[1.75rem] group-hover:scale-110 transition-transform duration-700 ease-in-out">
                                        @else
                                            <div
                                                class="w-full h-full bg-[#F0E7F8] flex items-center justify-center rounded-[1.75rem]">
                                                <i class="fas fa-store text-6xl text-[#8C51A5]/30"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                {{-- Content --}}
                                <div class="space-y-3">
                                    <h3 class="text-xl font-black text-[#612F73] group-hover:text-[#8C51A5] transition-colors duration-500 ease-in-out leading-tight uppercase tracking-tight">
                                        {{ $bc->name }}
                                    </h3>
    
                                    <p class="text-gray-400 text-sm line-clamp-2 leading-relaxed font-medium">{{ $bc->short_description }}</p>
    
                                    {{-- Action Button --}}
                                    <div class="mt-8 pt-8 border-t border-[#F0E7F8]">
                                        <a href="{{ route('business-center.show', $bc->slug) }}"
                                            class="inline-flex items-center gap-3 px-8 py-3 bg-[#8C51A5]/10 text-[#8C51A5] hover:bg-[#8C51A5] hover:text-white transition-all duration-500 rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] border border-[#8C51A5]/20 group/btn shadow-sm">
                                            <i class="fas fa-arrow-right text-[8px] group-hover/btn:translate-x-1 transition-transform"></i>
                                            Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-20" data-aos="fade-up">
                    <a href="{{ route('business-centers') }}"
                        class="inline-flex items-center gap-4 px-12 py-5 bg-[#8C51A5] text-white font-black text-xs uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-[#8C51A5]/20 hover:bg-[#8C51A5]/10 hover:text-[#8C51A5] border border-transparent hover:border-[#8C51A5]/20 transition-all duration-500 ease-in-out group">
                        <i class="fas fa-th-large text-xl text-[#F8CB62] group-hover:rotate-45 transition-transform"></i>
                        Eksplorasi Unit Bisnis
                    </a>
                </div>
            </div>
        </section>
    @endif

@endsection

@push('styles')
    <style>
        @keyframes slow-zoom {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.1);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }

        @keyframes float-delayed {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-30px) rotate(-5deg);
            }
        }

        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) translateX(0px) rotate(0deg); }
            33% { transform: translateY(-30px) translateX(10px) rotate(5deg); }
            66% { transform: translateY(10px) translateX(-15px) rotate(10deg); }
        }

        @keyframes float-slow-delayed {
            0%, 100% { transform: translateY(0px) translateX(0px) rotate(0deg); }
            33% { transform: translateY(20px) translateX(-20px) rotate(-5deg); }
            66% { transform: translateY(-15px) translateX(15px) rotate(10deg); }
        }

        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .animate-float-slow {
            animation: float-slow 12s ease-in-out infinite;
        }

        .animate-float-slow-delayed {
            animation: float-slow-delayed 15s ease-in-out infinite;
        }

        .animate-spin-slow {
            animation: spin-slow 20s linear infinite;
        }

        @keyframes scroll-indicator {
            0% {
                transform: translateY(0);
                opacity: 1;
            }

            100% {
                transform: translateY(10px);
                opacity: 0;
            }
        }

        .animate-slow-zoom {
            animation: slow-zoom 20s ease-in-out infinite alternate;
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float-delayed 8s ease-in-out infinite;
        }

        .animate-scroll-indicator {
            animation: scroll-indicator 1.5s ease-in-out infinite;
        }

        .animate-fade-in-up {
            opacity: 0;
            animation: fadeInUp 0.8s ease-out forwards;
        }
 
        .hero-animate {
            opacity: 0;
            animation-fill-mode: forwards;
            animation-duration: 1.2s;
            animation-timing-function: cubic-bezier(0.2, 0.8, 0.2, 1);
        }
 
        .hero-fade-up {
            animation-name: fadeInUp;
        }
 
        .hero-fade-down {
            animation-name: fadeInDown;
        }
 
        .hero-zoom-in {
            animation-name: heroZoomIn;
            animation-duration: 1.8s;
        }
 
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
 
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
 
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
 
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
 
        @keyframes heroZoomIn {
            from {
                opacity: 0;
                transform: scale(0.92);
            }
 
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Counter animation
        const counters = document.querySelectorAll('.counter');
        const speed = 200;

        const animateCounter = (counter) => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;
            const inc = target / speed;

            if (count < target) {
                counter.innerText = Math.ceil(count + inc);
                setTimeout(() => animateCounter(counter), 1);
            } else {
                counter.innerText = target.toLocaleString();
            }
        };

        // Intersection Observer for counters
        const observerOptions = { threshold: 0.5 };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    counters.forEach(counter => animateCounter(counter));
                    observer.disconnect();
                }
            });
        }, observerOptions);

        const statsSection = document.querySelector('.counter');
        if (statsSection) {
            observer.observe(statsSection.closest('section') || statsSection);
        }

        // Slider auto-play
        const sliderItems = document.querySelectorAll('.slider-item');
        if (sliderItems.length > 1) {
            let currentSlide = 0;
            setInterval(() => {
                sliderItems[currentSlide].classList.remove('opacity-100');
                sliderItems[currentSlide].classList.add('opacity-0');
                currentSlide = (currentSlide + 1) % sliderItems.length;
                sliderItems[currentSlide].classList.remove('opacity-0');
                sliderItems[currentSlide].classList.add('opacity-100');
            }, 5000);
        }
    </script>
@endpush