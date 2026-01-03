@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
   {{-- HERO SECTION CLEAN EDUCATION (PURPLE THEME) --}}
<section class="relative min-h-screen flex items-center overflow-hidden bg-gradient-to-br from-purple-50 via-white to-purple-100">

    {{-- Decorative Blobs --}}
    <div class="absolute top-20 left-10 w-72 h-72 bg-purple-300 rounded-full blur-3xl opacity-30"></div>
    <div class="absolute bottom-20 right-10 w-80 h-80 bg-fuchsia-300 rounded-full blur-3xl opacity-30"></div>

    {{-- Dots Pattern --}}
    <div class="absolute inset-0 bg-[radial-gradient(#a855f720_1px,transparent_1px)] bg-[size:20px_20px] opacity-30"></div>

    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-14">

            {{-- LEFT CONTENT --}}
            <div class="space-y-6">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-purple-100 text-purple-600 text-sm font-semibold">
                    🎓 Pendidikan Digital
                </span>

                <h1 class="text-4xl lg:text-5xl xl:text-6xl font-extrabold text-gray-900 leading-tight">
                    Pendidikan Online  
                    <span class="text-purple-600">Serasa Kelas Nyata</span>
                </h1>

                <p class="text-gray-600 max-w-xl text-lg">
                    Sistem pembelajaran sekolah modern dengan kelas interaktif,
                    materi terstruktur, dan pendampingan guru profesional.
                </p>

                {{-- CTA --}}
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="#daftar"
                        class="px-7 py-3 rounded-xl bg-purple-600 text-white font-semibold shadow-lg hover:bg-purple-700 transition">
                        Daftar Sekarang
                    </a>

                    <a href="#profil"
                        class="px-7 py-3 rounded-xl border border-purple-600 text-purple-600 font-semibold hover:bg-purple-50 transition">
                        Profil Sekolah
                    </a>
                </div>

                {{-- Stats --}}
                <div class="flex gap-8 pt-6">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">15.000+</h3>
                        <p class="text-gray-500 text-sm">Siswa Aktif</p>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">120+</h3>
                        <p class="text-gray-500 text-sm">Guru Profesional</p>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">98%</h3>
                        <p class="text-gray-500 text-sm">Kelulusan</p>
                    </div>
                </div>
            </div>

 {{-- RIGHT IMAGE --}}
<div class="relative flex justify-center lg:justify-end">

    {{-- Wrapper agar layout stabil --}}
    <div class="relative w-[320px] lg:w-[420px] h-[460px] lg:h-[560px]">

        {{-- Oval / Shape Background --}}
        <div
            class="absolute inset-0 rounded-[200px] bg-gradient-to-b from-purple-200 to-purple-100"
        ></div>

        {{-- Image --}}
        <img
            src="{{ asset('images/hero/hero-yaj.png') }}"
            alt="Siswa SMK YAJ"
            class="absolute bottom-0 left-1/2 -translate-x-1/2
                   h-[500px] lg:h-[700px]
                   object-contain drop-shadow-2xl"
        />
    </div>
</div>

</section>

        {{-- Floating Shapes --}}
        <div class="absolute inset-0 z-10 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-emerald-500/20 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-teal-500/20 rounded-full blur-3xl animate-float-delayed">
            </div>
            <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl animate-pulse"></div>
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
                        class="absolute -inset-4 bg-gradient-to-br from-purple-500/15 to-indigo-500/15
                               rounded-3xl blur-2xl group-hover:blur-3xl transition-all">
                    </div>

                    <div
                        class="relative bg-gradient-to-br from-purple-100 to-indigo-100
                               rounded-3xl p-6 shadow-2xl">

                        @if($principalMessage->photo)
                            <img src="{{ asset('storage/' . $principalMessage->photo) }}"
                                alt="{{ $principalMessage->name }}"
                                class="w-full rounded-2xl shadow-lg
                                       transform group-hover:scale-[1.02]
                                       transition-transform duration-500"
                                onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($principalMessage->name) }}&size=400&background=7C3AED&color=fff'">
                        @else
                            <div
                                class="w-full aspect-[3/4]
                                       bg-gradient-to-br from-purple-500 to-indigo-600
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
                           bg-purple-100 rounded-full
                           text-purple-700 text-sm font-semibold mb-6">
                    <i class="fas fa-quote-left"></i>
                    <span>SAMBUTAN KEPALA SEKOLAH</span>
                </div>

                <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-3">
                    {{ $principalMessage->name }}
                </h2>

                @if($principalMessage->title)
                    <p class="text-purple-600 font-semibold text-lg mb-8">
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
                        class="group p-6 bg-gradient-to-br from-purple-50 to-indigo-50
                               rounded-2xl border border-purple-100
                               hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-purple-500 to-indigo-600
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
                            class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-purple-600
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
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-purple-300/30 rounded-full blur-3xl"></div>
    <div class="absolute top-1/3 -right-32 w-[28rem] h-[28rem] bg-fuchsia-300/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-1/4 w-96 h-96 bg-indigo-300/20 rounded-full blur-3xl"></div>

    {{-- Subtle Grid Pattern --}}
    <div class="absolute inset-0 bg-[linear-gradient(to_right,#a855f720_1px,transparent_1px),linear-gradient(to_bottom,#a855f720_1px,transparent_1px)] bg-[size:40px_40px] opacity-30"></div>

    <div class="container mx-auto px-4 lg:px-8 relative z-10">

        {{-- Section Header --}}
        <div class="text-center mb-16">
            <div
                class="inline-flex items-center gap-2 px-6 py-2.5 bg-purple-100 text-purple-700 text-sm font-semibold rounded-full mb-6 shadow-sm">
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
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-400/0 via-purple-400/0 to-purple-400/0 
                                group-hover:from-purple-400/10 group-hover:via-fuchsia-400/10 group-hover:to-indigo-400/10
                                transition-all duration-500"></div>

                    {{-- Image --}}
                    <div class="relative h-56 overflow-hidden">
                        @if($major->image)
                            <img src="{{ asset('storage/' . $major->image) }}" alt="{{ $major->name }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div
                                class="w-full h-full bg-gradient-to-br from-purple-500 via-fuchsia-500 to-indigo-600 flex items-center justify-center">
                                <i class="fas fa-graduation-cap text-6xl text-white/40"></i>
                            </div>
                        @endif

                        {{-- Gradient Overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-900/70 via-purple-900/20 to-transparent"></div>

                        {{-- Badge --}}
                        <div class="absolute top-4 left-4">
                            <span
                                class="px-4 py-2 bg-white/95 backdrop-blur text-purple-700 text-xs font-bold rounded-xl shadow-md">
                                {{ $major->short_name }}
                            </span>
                        </div>

                        {{-- Title --}}
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <h3
                                class="text-xl font-bold text-white group-hover:text-purple-300 transition-colors">
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
                            class="inline-flex items-center gap-2 text-purple-600 font-semibold text-sm group-hover:gap-4 transition-all">
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
               class="inline-flex items-center gap-3 px-10 py-4 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold rounded-2xl shadow-lg hover:shadow-purple-500/40 transition-all duration-300 transform hover:-translate-y-1">
                <i class="fas fa-th-large"></i>
                LIHAT SEMUA JURUSAN
            </a>
        </div>

    </div>
</section>


{{-- Awards Section - White Rich Modern --}}
@if($awards->count() > 0)
<section class="py-28 bg-white relative overflow-hidden">

    {{-- BACKGROUND ELEMENTS --}}
    <div class="absolute inset-0 pointer-events-none">

        {{-- Big Blobs --}}
        <div class="absolute -top-32 -left-32 w-[500px] h-[500px] bg-purple-300 rounded-full blur-[120px] opacity-30"></div>
        <div class="absolute top-1/3 -right-40 w-[520px] h-[520px] bg-fuchsia-300 rounded-full blur-[130px] opacity-30"></div>
        <div class="absolute -bottom-40 left-1/4 w-[600px] h-[600px] bg-indigo-200 rounded-full blur-[140px] opacity-30"></div>

        {{-- Floating Dots --}}
        <div class="absolute inset-0 bg-[radial-gradient(#a855f725_1px,transparent_1px)] bg-[size:18px_18px] opacity-30"></div>

        {{-- Gradient Lines --}}
        <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-purple-300 to-transparent opacity-40"></div>
        <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-fuchsia-300 to-transparent opacity-40"></div>
    </div>

    <div class="container mx-auto px-4 lg:px-8 relative z-10">

        {{-- HEADER --}}
        <div class="text-center mb-20">
            <div
                class="inline-flex items-center gap-2 px-6 py-2.5 bg-purple-100 rounded-full text-purple-600 text-sm font-semibold mb-6 shadow-sm">
                <i class="fas fa-trophy"></i>
                <span>PENGHARGAAN SEKOLAH</span>
            </div>

            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                Prestasi & Penghargaan
            </h2>

            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                Berbagai penghargaan yang telah kami raih sebagai bukti komitmen kami
            </p>
        </div>

        {{-- GRID --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            @foreach($awards as $award)
                <div
                    class="group relative bg-white/80 backdrop-blur-xl p-8 rounded-3xl
                           border border-purple-100 shadow-md
                           hover:shadow-2xl hover:-translate-y-3
                           transition-all duration-300 text-center">

                    {{-- Card Glow --}}
                    <div
                        class="absolute inset-0 rounded-3xl bg-gradient-to-br
                               from-purple-300/20 via-transparent to-fuchsia-300/20
                               opacity-0 group-hover:opacity-100 blur-xl transition">
                    </div>

                    <div class="relative z-10">
                        @if($award->image)
                            <img src="{{ asset('storage/' . $award->image) }}" alt="{{ $award->title }}"
                                class="w-24 h-24 mx-auto mb-5 object-contain
                                       group-hover:scale-110 transition-transform duration-300">
                        @else
                            <div
                                class="w-24 h-24 mx-auto mb-5 bg-gradient-to-br from-purple-200 to-fuchsia-200
                                       rounded-full flex items-center justify-center
                                       group-hover:scale-110 transition-transform">
                                <i class="fas fa-award text-4xl text-purple-600"></i>
                            </div>
                        @endif

                        <h4 class="font-bold text-gray-900 text-sm mb-2 line-clamp-2">
                            {{ Str::limit($award->title, 40) }}
                        </h4>

                        @if($award->year)
                            <span class="inline-block mt-1 text-purple-600 text-xs font-semibold">
                                {{ $award->year }}
                            </span>
                        @endif
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
        <div class="absolute -top-32 -left-32 w-[500px] h-[500px] bg-purple-300 rounded-full blur-[120px] opacity-30"></div>
        <div class="absolute top-1/3 -right-40 w-[520px] h-[520px] bg-fuchsia-300 rounded-full blur-[130px] opacity-30"></div>
        <div class="absolute -bottom-40 left-1/4 w-[600px] h-[600px] bg-indigo-200 rounded-full blur-[140px] opacity-30"></div>

        {{-- Dot Pattern --}}
        <div class="absolute inset-0 bg-[radial-gradient(#a855f720_1px,transparent_1px)] bg-[size:20px_20px] opacity-25"></div>

        {{-- Gradient Lines --}}
        <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-purple-300 to-transparent opacity-40"></div>
        <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-fuchsia-300 to-transparent opacity-40"></div>
    </div>

    <div class="container mx-auto px-4 lg:px-8 relative z-10">

        {{-- HEADER --}}
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between mb-16">
            <div>
                <div
                    class="inline-flex items-center gap-2 px-5 py-2.5
                           bg-purple-100 rounded-full text-purple-600
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
                      text-purple-600 font-semibold
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
                          border border-purple-100
                          shadow-md hover:shadow-2xl
                          transition-all duration-500
                          transform hover:-translate-y-3">

                    {{-- Card Glow --}}
                    <div
                        class="absolute inset-0 rounded-3xl
                               bg-gradient-to-br from-purple-300/20 via-transparent to-fuchsia-300/20
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
                                    class="w-full h-full bg-gradient-to-br from-purple-500 to-indigo-600
                                           flex items-center justify-center">
                                    <i class="fas fa-newspaper text-5xl text-white/40"></i>
                                </div>
                            @endif

                            <div class="absolute inset-0 bg-gradient-to-t from-purple-900/60 to-transparent"></div>

                            @if($item->category)
                                <span
                                    class="absolute top-4 left-4 px-3 py-1.5
                                           bg-white/90 backdrop-blur
                                           text-purple-600 text-xs font-bold rounded-lg shadow">
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
                                       group-hover:text-purple-600 transition-colors">
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
<section class="py-24 bg-gradient-to-br from-purple-700 via-indigo-800 to-purple-900 relative overflow-hidden">

    {{-- BACKGROUND ELEMENTS --}}
    <div class="absolute inset-0 pointer-events-none">

        {{-- Pattern --}}
        <div class="absolute inset-0 bg-[radial-gradient(#ffffff12_1px,transparent_1px)] bg-[size:22px_22px] opacity-30"></div>

        {{-- Blobs --}}
        <div class="absolute -top-32 -left-32 w-[420px] h-[420px] bg-purple-400 rounded-full blur-[120px] opacity-30"></div>
        <div class="absolute -bottom-32 -right-32 w-[460px] h-[460px] bg-fuchsia-400 rounded-full blur-[140px] opacity-30"></div>

        {{-- Soft Glow --}}
        <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>
    </div>

    <div class="container mx-auto px-4 lg:px-8 relative z-10">
        <div class="max-w-4xl mx-auto text-center">

            {{-- Title --}}
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                Bergabung Bersama Kami
            </h2>

            {{-- Description --}}
            <p class="text-xl text-purple-100 mb-10 max-w-2xl mx-auto">
                Dengan pengalaman lebih dari {{ $settings['years_experience'] ?? '20' }} tahun,
                kami telah menghasilkan lulusan terbaik yang siap kerja.
            </p>

            {{-- CTA Button --}}
            @if(($settings['ppdb_active'] ?? false))
                <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                   class="group inline-flex items-center gap-4
                          px-10 py-5
                          bg-white/95 text-purple-700
                          font-bold rounded-2xl
                          shadow-lg hover:shadow-2xl hover:shadow-black/30
                          transition-all duration-500
                          transform hover:-translate-y-2 text-lg">

                    <i class="fas fa-user-plus text-xl"></i>
                    DAFTAR PPDB SEKARANG
                    <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
                </a>
            @endif

        </div>
    </div>
</section>

    {{-- Business Centers Section --}}
    @if($businessCenters->count() > 0)
        <section class="py-24 bg-slate-900 relative overflow-hidden">
            <div class="absolute inset-0">
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-gradient-to-r from-amber-500/10 to-orange-500/10 rounded-full blur-3xl">
                </div>
            </div>
            <div class="container mx-auto px-4 lg:px-8 relative z-10">
                <div class="text-center mb-16">
                    <div
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-amber-500/20 backdrop-blur-sm rounded-full text-amber-300 text-sm font-semibold mb-6 border border-amber-500/30">
                        <i class="fas fa-store"></i>
                        <span>BUSINESS CENTER</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Business Center Kami</h2>
                    <p class="text-gray-400 max-w-2xl mx-auto text-lg">Unit usaha yang dikelola sebagai wahana praktik
                        kewirausahaan</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($businessCenters->take(3) as $bc)
                        <div
                            class="group bg-white/5 backdrop-blur-lg rounded-3xl overflow-hidden border border-white/10 hover:bg-white/10 hover:border-white/20 transition-all duration-500 transform hover:-translate-y-2">
                            <div class="relative h-56 overflow-hidden">
                                @if($bc->image)
                                    <img src="{{ asset('storage/' . $bc->image) }}" alt="{{ $bc->name }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-amber-500 to-orange-600 flex items-center justify-center">
                                        <i class="fas fa-store text-6xl text-white/40"></i>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 to-transparent"></div>
                            </div>
                            <div class="p-6">
                                <h3 class="font-bold text-white text-xl mb-3 group-hover:text-amber-400 transition-colors">
                                    {{ $bc->name }}</h3>
                                <p class="text-gray-400 text-sm line-clamp-2">{{ $bc->short_description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-12">
                    <a href="{{ route('business-centers') }}"
                        class="inline-flex items-center gap-3 px-8 py-4 border-2 border-amber-500 text-amber-400 font-bold rounded-2xl hover:bg-amber-500 hover:text-slate-900 transition-all duration-300">
                        Selengkapnya
                        <i class="fas fa-arrow-right"></i>
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