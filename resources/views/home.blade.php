@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
   {{-- HERO SECTION CLEAN EDUCATION (PURPLE THEME) --}}
<section class="relative min-h-screen flex items-center overflow-hidden bg-gradient-to-br from-[#4f2744]/5 via-white to-[#3a1c32]/5 pt-6 lg:pt-8">

    {{-- Decorative Blobs --}}
    <div class="absolute top-20 left-10 w-72 h-72 bg-[#4f2744]/10 rounded-full blur-3xl opacity-30"></div>
    <div class="absolute bottom-20 right-10 w-80 h-80 bg-[#3a1c32]/10 rounded-full blur-3xl opacity-30"></div>

    {{-- Dots Pattern --}}
    <div class="absolute inset-0 bg-[radial-gradient(#4f274415_1px,transparent_1px)] bg-[size:20px_20px] opacity-30"></div>

    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-14">

            {{-- LEFT CONTENT --}}
            <div class="space-y-6">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#4f2744]/10 text-[#4f2744] text-sm font-semibold">
                    {{ $settings['hero_badge'] ?? '🎓 Pendidikan Digital' }}
                </span>

                <h1 class="text-4xl lg:text-5xl xl:text-6xl font-extrabold text-gray-900 leading-tight">
                    @php
                        $title = $settings['hero_title'] ?? 'Pendidikan Online Serasa Kelas Nyata';
                        // Split title to colorize part of it if it's long enough or just use brand color for the last words
                        $titleWords = explode(' ', $title);
                        $lastThree = array_slice($titleWords, -3);
                        $firstPart = array_slice($titleWords, 0, count($titleWords) - 3);
                    @endphp
                    {{ implode(' ', $firstPart) }}
                    <span class="text-[#4f2744]">{{ implode(' ', $lastThree) }}</span>
                </h1>

                <p class="text-gray-600 max-w-xl text-lg">
                    {{ $settings['hero_description'] ?? 'Sistem pembelajaran sekolah modern dengan kelas interaktif, materi terstruktur, dan pendampingan guru profesional.' }}
                </p>

                {{-- CTA --}}
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="{{ $settings['hero_primary_url'] ?? '#daftar' }}"
                        class="px-7 py-3 rounded-xl 
                            bg-[#4f2744] text-white font-semibold shadow-lg 
                            hover:bg-transparent hover:text-[#4f2744] hover:border hover:border-[#4f2744]
                            transform hover:scale-105 transition-all duration-300">
                        {{ $settings['hero_primary_text'] ?? 'Daftar Sekarang' }}
                    </a>

                    <a href="{{ $settings['hero_secondary_url'] ?? '#profil' }}"
                        class="px-7 py-3 rounded-xl 
                            border border-[#4f2744] text-[#4f2744] font-semibold 
                            hover:bg-[#4f2744] hover:text-white
                            transform hover:scale-105 transition-all duration-300">
                        {{ $settings['hero_secondary_text'] ?? 'Profil Sekolah' }}
                    </a>
                </div>

                {{-- Stats --}}
                <div class="flex gap-8 pt-6">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">{{ $settings['hero_stats_1_value'] ?? '15.000+' }}</h3>
                        <p class="text-gray-500 text-sm">{{ $settings['hero_stats_1_label'] ?? 'Siswa Aktif' }}</p>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">{{ $settings['hero_stats_2_value'] ?? '120+' }}</h3>
                        <p class="text-gray-500 text-sm">{{ $settings['hero_stats_2_label'] ?? 'Guru Profesional' }}</p>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">{{ $settings['hero_stats_3_value'] ?? '98%' }}</h3>
                        <p class="text-gray-500 text-sm">{{ $settings['hero_stats_3_label'] ?? 'Kelulusan' }}</p>
                    </div>
                </div>
            </div>

 {{-- RIGHT IMAGE --}}
<div class="relative flex justify-center lg:justify-end min-h-[500px] lg:min-h-[700px] mt-0">

    {{-- Dynamic Educational Collage Background --}}
    <div class="absolute inset-0 z-0 pointer-events-none overflow-visible flex items-center justify-center">
        
        {{-- Soft Glow --}}
        <div class="absolute w-[600px] lg:w-[900px] h-[600px] lg:h-[900px] bg-[#4f2744]/10 rounded-full blur-[120px]"></div>

        {{-- GEOMETRIC FOUNDATION --}}
        {{-- Solid Square - Top Right --}}
        <div class="absolute top-[15%] right-[10%] w-24 lg:w-40 h-24 lg:w-40 bg-[#4f2744] rounded-[2.5rem] rotate-12 animate-float-slow transition-transform"></div>
        
        {{-- Solid Triangle - Bottom Left --}}
        <div class="absolute bottom-[20%] left-[8%] w-32 lg:w-56 h-32 lg:h-56 bg-[#4f2744] clip-triangle -rotate-12 animate-float-slow-delayed"></div>
        
        {{-- Wireframe Circle - Center --}}
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[350px] lg:w-[600px] h-[350px] lg:h-[600px] border border-[#4f2744]/20 rounded-full"></div>

        {{-- EDUCATIONAL TOOLS (Floating Icons) --}}
        {{-- Coding - Top Left --}}
        <div class="absolute top-[25%] left-[15%] flex items-center justify-center w-12 lg:w-16 h-12 lg:h-16 bg-white shadow-xl rounded-2xl animate-float-slow">
            <i class="fas fa-code text-[#4f2744] text-xl lg:text-2xl"></i>
        </div>

        {{-- Science - Mid Right --}}
        <div class="absolute top-[45%] right-[5%] flex items-center justify-center w-10 lg:w-14 h-10 lg:h-14 bg-white shadow-xl rounded-2xl animate-spin-slow">
            <i class="fas fa-atom text-[#4f2744] text-lg lg:text-xl"></i>
        </div>

        {{-- Finance/Math - Bottom Right --}}
        <div class="absolute bottom-[25%] right-[12%] flex items-center justify-center w-12 lg:w-16 h-12 lg:h-16 bg-white shadow-xl rounded-2xl animate-float-slow-delayed">
            <i class="fas fa-chart-line text-[#4f2744] text-xl lg:text-2xl"></i>
        </div>

        {{-- Creative/Design - Bottom Left --}}
        <div class="absolute bottom-[35%] left-[5%] flex items-center justify-center w-10 lg:w-14 h-10 lg:h-14 bg-white shadow-xl rounded-2xl animate-pulse">
            <i class="fas fa-palette text-[#4f2744] text-lg lg:text-xl"></i>
        </div>

        {{-- Mathematics - Top Center --}}
        <div class="absolute top-[8%] left-[45%] flex items-center justify-center w-12 h-12 bg-white shadow-xl rounded-2xl animate-float-slow">
            <i class="fas fa-calculator text-[#4f2744] text-xl"></i>
        </div>

        {{-- Micro Decorative Elements --}}
        <div class="absolute top-1/3 left-[40%] text-[#4f2744] opacity-20 text-4xl font-black rotate-12 select-none">Σ</div>
        <div class="absolute bottom-1/4 right-[40%] text-[#4f2744] opacity-20 text-5xl font-black -rotate-12 select-none font-mono">{}</div>
        <div class="absolute top-1/4 right-[20%] text-[#4f2744] opacity-20 text-3xl font-black rotate-45 select-none">&pi;</div>

    </div>

    {{-- Wrapper agar layout stabil --}}
    <div class="relative w-[320px] lg:w-[420px] h-[460px] lg:h-[560px] z-10">

        {{-- Decorative Shapes (CTA Style) --}}
        <div class="absolute inset-0 pointer-events-none">
             @include('partials.awards-shapes')
        </div>

        {{-- Image Slider --}}
        @forelse($slideBener as $index => $slide)
            <img
                src="{{ asset('storage/' . $slide->image) }}"
                alt="{{ $slide->title ?? 'Siswa SMK YAJ' }}"
                class="absolute bottom-0 left-1/2 -translate-x-1/2
                       h-[500px] lg:h-[700px]
                       object-contain drop-shadow-2xl slider-item transition-opacity duration-1000
                       {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
            />
        @empty
            <img
                src="{{ asset('images/hero/hero-yaj.png') }}"
                alt="Siswa SMK YAJ"
                class="absolute bottom-0 left-1/2 -translate-x-1/2
                       h-[500px] lg:h-[700px]
                       object-contain drop-shadow-2xl"
            />
        @endforelse
    </div>
</div>

</section>

        {{-- Floating Shapes --}}
        <div class="absolute inset-0 z-10 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-[#4f2744]/10 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#3a1c32]/10 rounded-full blur-3xl animate-float-delayed">
            </div>
            <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-[#4f2744]/5 rounded-full blur-3xl animate-pulse"></div>
        </div>

    

    {{-- About / Principal Section - Soft Purple Theme --}}
    @if($principalMessage)
    <section class="py-24 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">

        {{-- Soft Background Accent --}}
        <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-purple-50/60 to-transparent"></div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                {{-- Image Side --}}
                <div class="relative" data-aos="fade-right">
                    <div class="relative z-10 group">
                        <div
                            class="absolute -inset-4 bg-gradient-to-br from-[#4f2744]/15 to-[#3a1c32]/15
                                rounded-3xl blur-2xl group-hover:blur-3xl transition-all">
                        </div>

                        <div
                            class="relative bg-gradient-to-br from-purple-50 to-indigo-50
                                rounded-3xl p-6 shadow-2xl">

                            @if($principalMessage->photo)
                                <img src="{{ asset('storage/' . $principalMessage->photo) }}"
                                    alt="{{ $principalMessage->name }}"
                                    class="w-full rounded-2xl shadow-lg
                                        transform group-hover:scale-[1.02]
                                        transition-transform duration-500"
                                    onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($principalMessage->name) }}&size=400&background=4f2744&color=fff'">
                            @else
                                <div
                                    class="w-full aspect-[3/4]
                                        bg-gradient-to-r from-[#4f2744] to-[#3a1c32]
                                        rounded-2xl flex items-center justify-center">
                                    <i class="fas fa-user text-8xl text-white/50"></i>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Experience Badge (tetap hangat biar kontras) --}}
                    <div class="absolute -bottom-6 -right-6 z-20">
                        <div class="relative">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-amber-400 to-orange-500
                                    rounded-2xl blur-lg opacity-50">
                            </div>
                            <div
                                class="relative w-36 h-36 bg-gradient-to-br from-amber-400 to-orange-500
                                    rounded-2xl flex flex-col items-center justify-center
                                    text-white shadow-xl transform hover:scale-105 transition-transform">
                                <span class="text-5xl font-black">{{ $settings['years_experience'] ?? '20' }}</span>
                                <span class="text-xs text-center font-semibold opacity-90">
                                    Years Of<br>Experience
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Content Side --}}
                <div data-aos="fade-left">
                    <div
                        class="inline-flex items-center gap-2 px-5 py-2.5
                            bg-[#4f2744]/10 rounded-full
                            text-[#4f2744] text-sm font-semibold mb-6">
                        <i class="fas fa-quote-left"></i>
                        <span>SAMBUTAN KEPALA SEKOLAH</span>
                    </div>

                    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-3">
                        {{ $principalMessage->name }}
                    </h2>

                    @if($principalMessage->title)
                        <p class="text-[#4f2744] font-semibold text-lg mb-8">
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
                            class="group p-6 bg-gradient-to-br from-purple-50 to-[#4f2744]/5
                                rounded-2xl border border-purple-100
                                hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <div
                                class="w-14 h-14 bg-gradient-to-r from-[#4f2744] to-[#3a1c32]
                                    rounded-xl flex items-center justify-center mb-4
                                    shadow-lg group-hover:scale-110 transition-transform">
                                <i class="fas fa-bullseye text-white text-xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 text-lg mb-2">Visi Kami</h4>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                {!! Str::limit(strip_tags($principalMessage->vision), 80) !!}
                            </p>
                        </div>

                        {{-- Mission --}}
                        <div
                            class="group p-6 bg-gradient-to-br from-indigo-50 to-purple-50
                                rounded-2xl border border-indigo-100
                                hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <div
                                class="w-14 h-14 bg-gradient-to-r from-[#4f2744] to-[#3a1c32]
                                    rounded-xl flex items-center justify-center mb-4
                                    shadow-lg group-hover:scale-110 transition-transform">
                                <i class="fas fa-rocket text-white text-xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 text-lg mb-2">Misi Kami</h4>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                {!! Str::limit(strip_tags($principalMessage->mission), 80) !!}
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif


  {{-- Majors Section with Purple Modern Style --}}
    <section class="py-24 bg-white relative overflow-hidden">

        {{-- Decorative Background Elements --}}
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-[#4f2744]/30 rounded-full blur-3xl"></div>
        <div class="absolute top-1/3 -right-32 w-[28rem] h-[28rem] bg-[#3a1c32]/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-1/4 w-96 h-96 bg-[#4f2744]/20 rounded-full blur-3xl"></div>

        {{-- Subtle Grid Pattern --}}
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#a855f720_1px,transparent_1px),linear-gradient(to_bottom,#a855f720_1px,transparent_1px)] bg-[size:40px_40px] opacity-30"></div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">

            {{-- Section Header --}}
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#4f2744]/10 text-[#4f2744] text-sm font-semibold rounded-full mb-6 shadow-sm">
                    <i class="fas fa-book-open"></i>
                    <span>PROGRAM KEAHLIAN</span>
                </div>

                <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                    {{ $majors->count() }} Jurusan Unggulan
                </h2>

                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Pilih jurusan yang sesuai dengan minat dan bakatmu untuk masa depan yang cerah
                </p>
            </div>

            {{-- Cards --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($majors as $major)
                    <a href="{{ route('major.show', $major->slug) }}"
                    class="group relative bg-white rounded-3xl overflow-hidden border border-purple-100 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3">

                        {{-- Glow Effect --}}
                        <div class="absolute inset-0 bg-gradient-to-r from-[#4f2744]/0 to-[#3a1c32]/0 
                                    group-hover:from-[#4f2744]/10 group-hover:to-[#3a1c32]/10
                                    transition-all duration-500"></div>

                        {{-- Image --}}
                        <div class="relative h-56 overflow-hidden">
                            @if($major->image)
                                <img src="{{ asset('storage/' . $major->image) }}" alt="{{ $major->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-r from-[#4f2744] to-[#3a1c32] flex items-center justify-center">
                                    <i class="fas fa-graduation-cap text-6xl text-white/40"></i>
                                </div>
                            @endif

                            {{-- Gradient Overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-[#4f2744]/70 via-[#4f2744]/20 to-transparent"></div>

                            {{-- Badge --}}
                            <div class="absolute top-4 left-4">
                                <span
                                    class="px-4 py-2 bg-white/95 backdrop-blur text-[#4f2744] text-xs font-bold rounded-xl shadow-md">
                                    {{ $major->short_name }}
                                </span>
                            </div>

                            {{-- Title --}}
                            <div class="absolute bottom-0 left-0 right-0 p-6">
                                <h3
                                    class="text-xl font-bold text-white group-hover:text-[#4f2744] transition-colors">
                                    {{ $major->name }}
                                </h3>
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="p-6 relative">
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                {{ $major->short_description }}
                            </p>

                            <span
                                class="inline-flex items-center gap-2 text-[#4f2744] font-semibold text-sm group-hover:gap-4 transition-all">
                                Pelajari Lebih Lanjut
                                <i class="fas fa-arrow-right"></i>
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>

            {{-- CTA --}}
            <div class="text-center mt-14">
                <a href="{{ route('majors') }}"
                class="inline-flex items-center gap-3 px-10 py-4 
                        rounded-xl
                        bg-[#4f2744] text-white font-semibold shadow-lg 
                        hover:bg-transparent hover:text-[#4f2744] hover:border hover:border-[#4f2744]
                        transform hover:scale-105 transition-all duration-300">
                    <i class="fas fa-th-large"></i>
                    LIHAT SEMUA JURUSAN
                </a>
            </div>

        </div>
    </section>


    {{-- Awards Section - White Rich Modern --}}
    @if($awards->count() > 0)
    <section class="py-28 bg-purple-50/50 relative overflow-hidden">

        {{-- BACKGROUND ELEMENTS --}}
        <div class="absolute inset-0 pointer-events-none">
            {{-- Big Blobs --}}
            <div class="absolute -top-32 -left-32 w-[500px] h-[500px] bg-[#4f2744]/5 rounded-full blur-[120px]"></div>
            <div class="absolute top-1/3 -right-40 w-[520px] h-[520px] bg-[#3a1c32]/5 rounded-full blur-[130px]"></div>
            <div class="absolute -bottom-40 left-1/4 w-[600px] h-[600px] bg-[#4f2744]/5 rounded-full blur-[140px]"></div>

            {{-- Floating Dots --}}
            <div class="absolute inset-0 bg-[radial-gradient(#4f274415_1px,transparent_1px)] bg-[size:18px_18px] opacity-30"></div>
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">

            {{-- HEADER --}}
            <div class="text-center mb-20">
                <div
                    class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#4f2744]/10 rounded-full text-[#4f2744] text-sm font-extrabold uppercase tracking-widest mb-6 shadow-sm border border-[#4f2744]/10">
                    <i class="fas fa-trophy"></i>
                    <span>PENGHARGAAN SEKOLAH</span>
                </div>

                <h2 class="text-4xl md:text-5xl font-extrabold text-[#3a1c32] mb-4">
                    Prestasi & Penghargaan
                </h2>

                <p class="text-gray-500 max-w-2xl mx-auto text-lg leading-relaxed">
                    Berbagai penghargaan yang telah kami raih sebagai bukti komitmen kami
                </p>
            </div>

            {{-- GRID --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @foreach($awards as $index => $award)
                    <div
                        class="group relative bg-white p-10 rounded-[3rem]
                            border border-gray-100 shadow-xl shadow-purple-900/5
                            hover:shadow-3xl hover:shadow-[#4f2744]/20 hover:border-[#4f2744]/20
                            hover:-translate-y-4 transition-all duration-700 overflow-hidden">
                        
                        {{-- Decorative Corner Shine (Glass) --}}
                        <div class="absolute -top-10 -right-10 w-32 h-32 bg-gradient-to-br from-[#4f2744]/5 to-transparent rounded-full blur-2xl group-hover:scale-150 transition-transform duration-1000"></div>
                        <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-gradient-to-tr from-[#3a1c32]/5 to-transparent rounded-full blur-2xl group-hover:scale-150 transition-transform duration-1000"></div>

                        {{-- Card Glow Effect --}}
                        <div class="absolute inset-0 bg-gradient-to-br from-[#4f2744]/[0.02] to-[#3a1c32]/[0.02] opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>

                        <div class="relative z-10 flex flex-col items-center text-center">
                            {{-- Icon / Image Container --}}
                            <div class="relative mb-8 pt-4">
                                {{-- Background Decorative Ring --}}
                                <div class="absolute inset-0 scale-150 bg-[#4f2744]/5 rounded-full blur-xl group-hover:bg-[#4f2744]/10 transition-colors duration-500"></div>
                                
                                @if($award->image)
                                    <div class="relative w-28 h-28 p-1.5 rounded-[2rem] bg-white border border-gray-100 shadow-md transform group-hover:rotate-3 transition-all duration-500">
                                        <img src="{{ asset('storage/' . $award->image) }}" alt="{{ $award->title }}"
                                            class="w-full h-full object-contain rounded-[1.5rem]">
                                    </div>
                                @else
                                    <div class="relative w-28 h-28 bg-gradient-to-br from-white to-[#4f2744]/5
                                        rounded-[2rem] flex items-center justify-center border border-gray-100
                                        shadow-lg transform group-hover:-rotate-3 transition-all duration-500">
                                        <i class="fas fa-medal text-5xl text-[#4f2744] drop-shadow-md"></i>
                                    </div>
                                @endif

                                {{-- Sparkle Icon --}}
                                <div class="absolute -top-2 -right-2 w-6 h-6 bg-yellow-400 rounded-lg flex items-center justify-center shadow-lg transform rotate-12 scale-0 group-hover:scale-100 transition-all duration-500 delay-100">
                                    <i class="fas fa-star text-[10px] text-white"></i>
                                </div>
                            </div>

                            {{-- Year Badge --}}
                            @if($award->year)
                                <div class="mb-4">
                                    <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-[#4f2744]/5 text-[#4f2744] text-[10px] font-black uppercase tracking-[0.2em] rounded-full border border-[#4f2744]/10 shadow-sm transition-all group-hover:bg-[#4f2744] group-hover:text-white group-hover:border-transparent">
                                        <i class="far fa-calendar-alt text-[8px]"></i>
                                        {{ $award->year }}
                                    </span>
                                </div>
                            @endif

                            {{-- Title --}}
                            <h4 class="font-black text-[#3a1c32] text-sm lg:text-base leading-snug line-clamp-2 max-w-[180px] group-hover:text-[#4f2744] transition-colors mb-2">
                                {{ $award->title }}
                            </h4>

                            {{-- Subtle Decorative Line --}}
                            <div class="w-8 h-1 bg-gradient-to-r from-[#4f2744]/0 via-[#4f2744]/20 to-[#4f2744]/0 rounded-full group-hover:w-16 transition-all duration-500"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif 


    {{-- News Section --}}
    @if($news->count() > 0)
    <section class="py-24 bg-white relative overflow-hidden">

        {{-- BACKGROUND ELEMENTS --}}
        <div class="absolute inset-0 pointer-events-none">

            {{-- Blobs --}}
            <div class="absolute -top-32 -left-32 w-[500px] h-[500px] bg-[#4f2744] rounded-full blur-[120px] opacity-20"></div>
            <div class="absolute top-1/3 -right-40 w-[520px] h-[520px] bg-[#3a1c32] rounded-full blur-[130px] opacity-20"></div>
            <div class="absolute -bottom-40 left-1/4 w-[600px] h-[600px] bg-[#4f2744] rounded-full blur-[140px] opacity-20"></div>

            {{-- Dot Pattern --}}
            <div class="absolute inset-0 bg-[radial-gradient(#4f274420_1px,transparent_1px)] bg-[size:20px_20px] opacity-25"></div>

            {{-- Gradient Lines --}}
            <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[#4f2744] to-transparent opacity-40"></div>
            <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[#3a1c32] to-transparent opacity-40"></div>
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">

            {{-- HEADER --}}
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between mb-16">
                <div>
                    <div
                        class="inline-flex items-center gap-2 px-5 py-2.5
                            bg-[#4f2744]/10 rounded-full text-[#4f2744]
                            text-sm font-semibold mb-6 shadow-sm">
                        <i class="fas fa-newspaper"></i>
                        <span>BERITA & ARTIKEL</span>
                    </div>

                    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                        Berita Terkini
                    </h2>

                    <p class="text-gray-600 max-w-xl text-lg">
                        Informasi terbaru seputar kegiatan sekolah kami
                    </p>
                </div>

                <a href="{{ route('news') }}"
                class="inline-flex items-center gap-2
                        text-[#4f2744] font-semibold
                        hover:gap-4 transition-all mt-6 lg:mt-0">
                    Lihat Semua Berita
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            {{-- GRID --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($news->take(4) as $item)
                    <a href="{{ route('news.show', $item->slug) }}"
                    class="group relative bg-white/80 backdrop-blur-xl
                            rounded-3xl overflow-hidden
                            

                            shadow-md hover:shadow-2xl
                            transition-all duration-500
                            transform hover:-translate-y-3">

                        {{-- Card Glow --}}
                        <div
                            class="absolute inset-0 rounded-3xl
                                bg-gradient-to-br from-[#4f2744]/20 via-transparent to-[#3a1c32]/20
                                opacity-0 group-hover:opacity-100 blur-xl transition">
                        </div>

                        <div class="relative z-10">

                            {{-- Image --}}
                            <div class="relative h-48 overflow-hidden">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                        class="w-full h-full object-cover
                                                group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-r from-[#4f2744] to-[#3a1c32]
                                            flex items-center justify-center">
                                        <i class="fas fa-newspaper text-5xl text-white/40"></i>
                                    </div>
                                @endif

                                <div class="absolute inset-0 bg-gradient-to-t from-[#4f2744]/60 to-transparent"></div>

                                @if($item->category)
                                    <span
                                        class="absolute top-4 left-4 px-3 py-1.5
                                            bg-white/90 backdrop-blur
                                            text-[#4f2744] text-xs font-bold rounded-lg shadow">
                                        {{ $item->category }}
                                    </span>
                                @endif
                            </div>

                            {{-- Content --}}
                            <div class="p-5">
                                <div class="flex items-center gap-3 text-gray-400 text-xs mb-3">
                                    <span>
                                        <i class="far fa-calendar mr-1"></i>
                                        {{ $item->published_at->format('d M Y') }}
                                    </span>
                                </div>

                                <h3
                                    class="font-bold text-gray-900 text-sm line-clamp-2
                                        group-hover:text-[#4f2744] transition-colors">
                                    {{ $item->title }}
                                </h3>
                            </div>

                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif


    {{-- CTA Section --}}
    <section class="py-24 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden border-t border-white/10">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl md:text-6xl font-extrabold text-white mb-8 tracking-tight">
                    Bergabung Bersama Kami
                </h2>
                <p class="text-gray-300 text-lg md:text-xl mb-12 font-medium max-w-2xl mx-auto">
                    Dengan pengalaman lebih dari {{ $settings['years_experience'] ?? '20' }} tahun,
                    kami telah menghasilkan lulusan terbaik yang siap kerja.
                </p>
                <div class="flex flex-wrap justify-center gap-6">
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center gap-3 px-10 py-4 
                        rounded-xl
                        bg-[#4f2744] text-white font-semibold shadow-lg 
                        hover:bg-transparent 
                        hover:text-[#4f2744]
                        hover:border hover:border-[#4f2744]
                        hover:shadow-[0_0_0_1px_rgba(79,39,68,0.15)]
                        transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-phone-alt text-xl"></i>
                        HUBUNGI KAMI
                    </a>

                    @if(($settings['ppdb_active'] ?? false))
                        <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                            class="inline-flex items-center gap-3 px-10 py-4 
                            rounded-xl
                            border border-[#4f2744] text-white font-semibold 
                            hover:bg-[#4f2744] hover:text-white
                            transform hover:scale-105 transition-all duration-300">
                            <i class="fas fa-user-plus text-xl"></i>
                            DAFTAR PPDB
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Business Centers Section --}}
    @if($businessCenters->count() > 0)
        <section class="py-24 bg-purple-50/50 relative overflow-hidden">
            {{-- Decorative Background Elements --}}
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute top-1/4 -left-32 w-96 h-96 bg-[#4f2744]/5 rounded-full blur-[100px]"></div>
                <div class="absolute bottom-1/4 -right-32 w-96 h-96 bg-[#3a1c32]/5 rounded-full blur-[100px]"></div>
            </div>

            <div class="container mx-auto px-4 lg:px-8 relative z-10">
                {{-- Section Header --}}
                <div class="text-center mb-16">
                    <div
                        class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#4f2744]/10 rounded-full text-[#4f2744] text-sm font-extrabold uppercase tracking-widest mb-6 shadow-sm border border-[#4f2744]/10">
                        <i class="fas fa-store"></i>
                        <span>BUSINESS CENTER</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-extrabold text-[#3a1c32] mb-4">Business Center Kami</h2>
                    <p class="text-gray-500 max-w-2xl mx-auto text-lg leading-relaxed">Unit usaha yang dikelola sebagai wahana praktik kewirausahaan siswa.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($businessCenters->take(3) as $bc)
                        <article
                            class="group bg-white rounded-[2.5rem] overflow-hidden border border-gray-200 shadow-lg shadow-[#4f2744]/5 hover:shadow-2xl hover:shadow-[#4f2744]/10 hover:border-[#4f2744]/30 transition-all duration-500 hover:-translate-y-2 text-center p-8">
                            {{-- Photo --}}
                            <div class="relative mb-8">
                                <div
                                    class="w-full h-48 rounded-3xl overflow-hidden border-4 border-gray-100 shadow-xl group-hover:border-[#4f2744]/50 transition-all duration-500 p-1">
                                    @if($bc->image)
                                        <img src="{{ asset('storage/' . $bc->image) }}" alt="{{ $bc->name }}"
                                            class="w-full h-full object-cover rounded-2xl group-hover:scale-110 transition-transform duration-700">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-purple-100 to-white flex items-center justify-center rounded-2xl">
                                            <i class="fas fa-store text-5xl text-purple-200"></i>
                                        </div>
                                    @endif
                                </div>

                            </div>

                            {{-- Content --}}
                            <div class="space-y-3">
                                <h3 class="text-xl font-extrabold text-[#3a1c32] group-hover:text-[#4f2744] transition-colors leading-tight">
                                    {{ $bc->name }}
                                </h3>

                                <p class="text-gray-500 text-sm line-clamp-3 leading-relaxed">{{ $bc->short_description }}</p>

                                {{-- Action Button --}}
                                <div class="mt-8 pt-6 border-t border-gray-100">
                                    <a href="{{ route('business-centers') }}"
                                        class="inline-flex items-center gap-3 px-6 py-2.5 bg-[#4f2744]/10 text-[#4f2744] hover:bg-[#4f2744] hover:text-white transition-all duration-300 rounded-xl text-xs font-extrabold uppercase tracking-widest border border-[#4f2744]/20 group/btn">
                                        <i class="fas fa-info-circle text-[10px]"></i>
                                        Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="text-center mt-16">
                    <a href="{{ route('business-centers') }}"
                        class="inline-flex items-center gap-3 px-10 py-4 
                        rounded-xl
                        bg-[#4f2744] text-white font-semibold shadow-lg 
                        hover:bg-transparent hover:text-[#4f2744] hover:border hover:border-[#4f2744]
                        transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-th-large"></i>
                        LIHAT SEMUA UNIT USAHA
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