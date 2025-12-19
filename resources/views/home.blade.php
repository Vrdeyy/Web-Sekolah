@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    {{-- Hero/Banner Section with Modern Glassmorphism --}}
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        {{-- Animated Background --}}
        <div class="absolute inset-0 z-0">
            @if($sliders->count() > 0)
                @foreach($sliders as $index => $slider)
                    <div class="slider-item absolute inset-0 transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
                        data-index="{{ $index }}">
                        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/95 via-slate-800/80 to-emerald-900/70 z-10">
                        </div>
                        <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}"
                            class="w-full h-full object-cover scale-105 animate-slow-zoom"
                            onerror="this.src='https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1920'">
                    </div>
                @endforeach
            @else
                <div class="absolute inset-0">
                    <div class="absolute inset-0 bg-gradient-to-br from-slate-900/95 via-slate-800/80 to-emerald-900/70 z-10">
                    </div>
                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1920" alt="Default Banner"
                        class="w-full h-full object-cover">
                </div>
            @endif
        </div>

        {{-- Floating Shapes --}}
        <div class="absolute inset-0 z-10 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-emerald-500/20 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-teal-500/20 rounded-full blur-3xl animate-float-delayed">
            </div>
            <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl animate-pulse"></div>
        </div>

        {{-- Content --}}
        <div class="container mx-auto px-4 lg:px-8 relative z-20 pt-20">
            <div class="max-w-4xl mx-auto text-center">
                <div
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-white/10 backdrop-blur-md rounded-full text-emerald-300 text-sm font-medium mb-8 border border-white/20 animate-fade-in-up">
                    <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                    <span>Selamat Datang di {{ $settings['school_name'] ?? 'SMK YAJ' }}</span>
                </div>
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-white mb-6 leading-tight animate-fade-in-up"
                    style="animation-delay: 0.1s">
                    <span
                        class="bg-gradient-to-r from-white via-emerald-100 to-teal-200 bg-clip-text text-transparent">{{ $settings['school_name'] ?? 'SMK YAJ' }}</span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-200 mb-10 max-w-2xl mx-auto animate-fade-in-up"
                    style="animation-delay: 0.2s">
                    {{ $settings['school_tagline'] ?? 'Pilihan Yang Tepat Di Sekolah Yang Berkualitas' }}
                </p>
                <div class="flex flex-wrap justify-center gap-4 animate-fade-in-up" style="animation-delay: 0.3s">
                    @if(($settings['ppdb_active'] ?? false))
                        <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                            class="group inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-emerald-500 to-teal-500 text-white font-bold rounded-2xl hover:shadow-2xl hover:shadow-emerald-500/40 transition-all duration-500 transform hover:-translate-y-1 hover:scale-105">
                            <i class="fas fa-user-plus text-lg"></i>
                            DAFTAR PPDB
                            <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    @endif
                    <a href="{{ route('majors') }}"
                        class="inline-flex items-center gap-3 px-8 py-4 bg-white/10 backdrop-blur-md text-white font-bold rounded-2xl border border-white/30 hover:bg-white/20 hover:border-white/50 transition-all duration-300">
                        <i class="fas fa-graduation-cap text-lg"></i>
                        Lihat Jurusan
                    </a>
                </div>
            </div>
        </div>

        {{-- Modern Stats Cards --}}
        <div class="absolute bottom-0 left-0 right-0 z-20">
            <div class="container mx-auto px-4 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 -mb-16">
                    @foreach($statistics as $stat)
                        <div
                            class="group bg-white/10 backdrop-blur-xl rounded-2xl p-6 border border-white/20 hover:bg-white/20 hover:border-white/40 transition-all duration-300 transform hover:-translate-y-2">
                            <div class="text-4xl md:text-5xl font-extrabold text-white mb-2">
                                <span
                                    class="counter bg-gradient-to-r from-emerald-400 to-teal-300 bg-clip-text text-transparent"
                                    data-target="{{ $stat->value }}">0</span><span
                                    class="text-emerald-400">{{ $stat->suffix }}</span>
                            </div>
                            <p class="text-gray-300 text-sm font-medium">{{ $stat->label }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Scroll Indicator --}}
        <div class="absolute bottom-32 left-1/2 transform -translate-x-1/2 z-20 animate-bounce">
            <div class="w-8 h-12 rounded-full border-2 border-white/30 flex items-start justify-center p-2">
                <div class="w-1.5 h-3 bg-white/60 rounded-full animate-scroll-indicator"></div>
            </div>
        </div>
    </section>

    {{-- About / Principal Section with Modern Cards --}}
    @if($principalMessage)
        <section class="py-24 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-emerald-50/50 to-transparent"></div>
            <div class="container mx-auto px-4 lg:px-8 relative z-10">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    {{-- Image Side with Modern Frame --}}
                    <div class="relative" data-aos="fade-right">
                        <div class="relative z-10 group">
                            <div
                                class="absolute -inset-4 bg-gradient-to-br from-emerald-500/20 to-teal-500/20 rounded-3xl blur-2xl group-hover:blur-3xl transition-all">
                            </div>
                            <div class="relative bg-gradient-to-br from-emerald-100 to-teal-100 rounded-3xl p-6 shadow-2xl">
                                @if($principalMessage->photo)
                                    <img src="{{ asset('storage/' . $principalMessage->photo) }}"
                                        alt="{{ $principalMessage->name }}"
                                        class="w-full rounded-2xl shadow-lg transform group-hover:scale-[1.02] transition-transform duration-500"
                                        onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($principalMessage->name) }}&size=400&background=10B981&color=fff'">
                                @else
                                    <div
                                        class="w-full aspect-[3/4] bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center">
                                        <i class="fas fa-user text-8xl text-white/50"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{-- Experience Badge --}}
                        <div class="absolute -bottom-6 -right-6 z-20">
                            <div class="relative">
                                <div
                                    class="absolute inset-0 bg-gradient-to-br from-amber-400 to-orange-500 rounded-2xl blur-lg opacity-50">
                                </div>
                                <div
                                    class="relative w-36 h-36 bg-gradient-to-br from-amber-400 to-orange-500 rounded-2xl flex flex-col items-center justify-center text-white shadow-xl transform hover:scale-105 transition-transform">
                                    <span class="text-5xl font-black">{{ $settings['years_experience'] ?? '20' }}</span>
                                    <span class="text-xs text-center font-semibold opacity-90">Years Of<br>Experience</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Content Side --}}
                    <div data-aos="fade-left">
                        <div
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-emerald-100 rounded-full text-emerald-700 text-sm font-semibold mb-6">
                            <i class="fas fa-quote-left"></i>
                            <span>SAMBUTAN KEPALA SEKOLAH</span>
                        </div>
                        <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-3">{{ $principalMessage->name }}</h2>
                        @if($principalMessage->title)
                            <p class="text-emerald-600 font-semibold text-lg mb-8">{{ $principalMessage->title }}</p>
                        @endif
                        <div class="prose prose-lg text-gray-600 mb-10 max-w-none leading-relaxed">
                            {!! Str::limit(strip_tags($principalMessage->message), 400) !!}
                        </div>

                        {{-- Vision & Mission Cards --}}
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div
                                class="group p-6 bg-gradient-to-br from-emerald-50 to-teal-50 rounded-2xl border border-emerald-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                                <div
                                    class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition-transform">
                                    <i class="fas fa-bullseye text-white text-xl"></i>
                                </div>
                                <h4 class="font-bold text-gray-900 text-lg mb-2">Visi Kami</h4>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    {!! Str::limit(strip_tags($principalMessage->vision), 80) !!}</p>
                            </div>
                            <div
                                class="group p-6 bg-gradient-to-br from-amber-50 to-orange-50 rounded-2xl border border-amber-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                                <div
                                    class="w-14 h-14 bg-gradient-to-br from-amber-500 to-orange-500 rounded-xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition-transform">
                                    <i class="fas fa-rocket text-white text-xl"></i>
                                </div>
                                <h4 class="font-bold text-gray-900 text-lg mb-2">Misi Kami</h4>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    {!! Str::limit(strip_tags($principalMessage->mission), 80) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Majors Section with Photos --}}
    <section class="py-24 bg-white relative overflow-hidden">
        <div
            class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-emerald-50 via-transparent to-transparent">
        </div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-emerald-100 rounded-full text-emerald-700 text-sm font-semibold mb-6">
                    <i class="fas fa-book-open"></i>
                    <span>PROGRAM KEAHLIAN</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">{{ $majors->count() }} Jurusan Unggulan
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">Pilih jurusan yang sesuai dengan minat dan bakatmu untuk
                    masa depan yang cerah</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($majors as $major)
                    <a href="{{ route('major.show', $major->slug) }}"
                        class="group relative bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                        {{-- Image --}}
                        <div class="relative h-56 overflow-hidden">
                            @if($major->image)
                                <img src="{{ asset('storage/' . $major->image) }}" alt="{{ $major->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-br from-emerald-400 via-teal-500 to-cyan-600 flex items-center justify-center">
                                    <i class="fas fa-graduation-cap text-6xl text-white/40"></i>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                            {{-- Badge --}}
                            <div class="absolute top-4 left-4">
                                <span
                                    class="px-4 py-2 bg-white/95 backdrop-blur-sm text-emerald-700 text-xs font-bold rounded-xl shadow-lg">{{ $major->short_name }}</span>
                            </div>
                            {{-- Overlay Content --}}
                            <div class="absolute bottom-0 left-0 right-0 p-6">
                                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-emerald-300 transition-colors">
                                    {{ $major->name }}</h3>
                            </div>
                        </div>
                        {{-- Content --}}
                        <div class="p-6">
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $major->short_description }}</p>
                            <span
                                class="inline-flex items-center gap-2 text-emerald-600 font-semibold text-sm group-hover:gap-4 transition-all">
                                Pelajari Lebih Lanjut
                                <i class="fas fa-arrow-right"></i>
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('majors') }}"
                    class="inline-flex items-center gap-3 px-8 py-4 bg-gray-900 text-white font-bold rounded-2xl hover:bg-gray-800 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <i class="fas fa-th-large"></i>
                    LIHAT SEMUA JURUSAN
                </a>
            </div>
        </div>
    </section>

    {{-- Awards Section with Modern Carousel Style --}}
    @if($awards->count() > 0)
        <section class="py-24 bg-gradient-to-br from-slate-900 via-slate-800 to-emerald-900 relative overflow-hidden">
            <div class="absolute inset-0">
                <div class="absolute top-0 left-1/4 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-teal-500/10 rounded-full blur-3xl"></div>
            </div>
            <div class="container mx-auto px-4 lg:px-8 relative z-10">
                <div class="text-center mb-16">
                    <div
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-amber-500/20 backdrop-blur-sm rounded-full text-amber-300 text-sm font-semibold mb-6 border border-amber-500/30">
                        <i class="fas fa-trophy"></i>
                        <span>PENGHARGAAN SEKOLAH</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Prestasi & Penghargaan</h2>
                    <p class="text-gray-300 max-w-2xl mx-auto text-lg">Berbagai penghargaan yang telah kami raih sebagai bukti
                        komitmen kami</p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    @foreach($awards as $award)
                        <div
                            class="group bg-white/5 backdrop-blur-lg p-8 rounded-3xl border border-white/10 hover:bg-white/10 hover:border-white/20 transition-all duration-300 text-center transform hover:-translate-y-2">
                            @if($award->image)
                                <img src="{{ asset('storage/' . $award->image) }}" alt="{{ $award->title }}"
                                    class="w-24 h-24 mx-auto mb-5 object-contain group-hover:scale-110 transition-transform duration-300">
                            @else
                                <div
                                    class="w-24 h-24 mx-auto mb-5 bg-gradient-to-br from-amber-400/20 to-amber-600/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <i class="fas fa-award text-4xl text-amber-400"></i>
                                </div>
                            @endif
                            <h4 class="font-bold text-white text-sm mb-2 line-clamp-2">{{ Str::limit($award->title, 40) }}</h4>
                            @if($award->year)
                                <span class="text-emerald-400 text-xs font-semibold">{{ $award->year }}</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Achievements Section --}}
    @if($achievements->count() > 0)
        <section class="py-24 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
            <div class="container mx-auto px-4 lg:px-8 relative z-10">
                <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between mb-16">
                    <div>
                        <div
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-purple-100 rounded-full text-purple-700 text-sm font-semibold mb-6">
                            <i class="fas fa-medal"></i>
                            <span>PRESTASI SISWA</span>
                        </div>
                        <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">Prestasi Peserta Didik</h2>
                        <p class="text-gray-600 max-w-xl text-lg">Keberhasilan siswa-siswi kami dalam berbagai kompetisi</p>
                    </div>
                    <a href="{{ route('achievements') }}"
                        class="inline-flex items-center gap-2 text-purple-600 font-semibold hover:gap-4 transition-all mt-6 lg:mt-0">
                        Lihat Semua Prestasi
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($achievements->take(6) as $achievement)
                        <div
                            class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                            <div class="relative h-52 overflow-hidden">
                                @if($achievement->image)
                                    <img src="{{ asset('storage/' . $achievement->image) }}" alt="{{ $achievement->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-purple-500 via-pink-500 to-rose-500 flex items-center justify-center">
                                        <i class="fas fa-trophy text-6xl text-white/40"></i>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                @if($achievement->level)
                                    <span
                                        class="absolute top-4 left-4 px-4 py-2 bg-purple-600 text-white text-xs font-bold rounded-xl shadow-lg">{{ $achievement->level }}</span>
                                @endif
                                @if($achievement->rank)
                                    <span
                                        class="absolute top-4 right-4 px-4 py-2 bg-amber-500 text-white text-xs font-bold rounded-xl shadow-lg">{{ $achievement->rank }}</span>
                                @endif
                            </div>
                            <div class="p-6">
                                <h3
                                    class="font-bold text-gray-900 text-lg mb-3 line-clamp-2 group-hover:text-purple-600 transition-colors">
                                    {{ $achievement->title }}</h3>
                                @if($achievement->student_name)
                                    <div class="flex items-center gap-3 text-gray-500 text-sm">
                                        <i class="fas fa-user-graduate"></i>
                                        <span>{{ $achievement->student_name }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Extracurriculars Section with Photos --}}
    @if($extracurriculars->count() > 0)
        <section class="py-24 bg-white relative overflow-hidden">
            <div
                class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-orange-50 via-transparent to-transparent">
            </div>
            <div class="container mx-auto px-4 lg:px-8 relative z-10">
                <div class="text-center mb-16">
                    <div
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-orange-100 rounded-full text-orange-700 text-sm font-semibold mb-6">
                        <i class="fas fa-futbol"></i>
                        <span>EKSTRAKURIKULER</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">Kegiatan Ekstrakurikuler</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto text-lg">Kembangkan minat dan bakatmu melalui berbagai kegiatan
                        ekstrakurikuler</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($extracurriculars->take(6) as $ekskul)
                        <div
                            class="group relative bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                            <div class="relative h-52 overflow-hidden">
                                @if($ekskul->image)
                                    <img src="{{ asset('storage/' . $ekskul->image) }}" alt="{{ $ekskul->name }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-orange-400 via-red-500 to-pink-500 flex items-center justify-center">
                                        <i class="fas fa-users text-6xl text-white/40"></i>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 right-0 p-6">
                                    <h3 class="text-xl font-bold text-white group-hover:text-orange-300 transition-colors">
                                        {{ $ekskul->name }}</h3>
                                </div>
                            </div>
                            <div class="p-6">
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $ekskul->short_description }}</p>
                                <div class="flex items-center gap-4 text-sm text-gray-500">
                                    @if($ekskul->schedule)
                                        <span class="flex items-center gap-1.5">
                                            <i class="far fa-clock text-orange-500"></i>
                                            {{ $ekskul->schedule }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-12">
                    <a href="{{ route('extracurriculars') }}"
                        class="inline-flex items-center gap-3 px-8 py-4 border-2 border-orange-500 text-orange-600 font-bold rounded-2xl hover:bg-orange-500 hover:text-white transition-all duration-300 transform hover:-translate-y-1">
                        <i class="fas fa-th-large"></i>
                        LIHAT SEMUA EKSKUL
                    </a>
                </div>
            </div>
        </section>
    @endif

    {{-- News Section --}}
    @if($news->count() > 0)
        <section class="py-24 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
            <div class="container mx-auto px-4 lg:px-8 relative z-10">
                <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between mb-16">
                    <div>
                        <div
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-100 rounded-full text-blue-700 text-sm font-semibold mb-6">
                            <i class="fas fa-newspaper"></i>
                            <span>BERITA & ARTIKEL</span>
                        </div>
                        <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">Berita Terkini</h2>
                        <p class="text-gray-600 max-w-xl text-lg">Informasi terbaru seputar kegiatan sekolah kami</p>
                    </div>
                    <a href="{{ route('news') }}"
                        class="inline-flex items-center gap-2 text-blue-600 font-semibold hover:gap-4 transition-all mt-6 lg:mt-0">
                        Lihat Semua Berita
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($news->take(4) as $item)
                        <a href="{{ route('news.show', $item->slug) }}"
                            class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                            <div class="relative h-48 overflow-hidden">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center">
                                        <i class="fas fa-newspaper text-5xl text-white/40"></i>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                @if($item->category)
                                    <span
                                        class="absolute top-4 left-4 px-3 py-1.5 bg-blue-600 text-white text-xs font-bold rounded-lg">{{ $item->category }}</span>
                                @endif
                            </div>
                            <div class="p-5">
                                <div class="flex items-center gap-3 text-gray-400 text-xs mb-3">
                                    <span><i class="far fa-calendar mr-1"></i>{{ $item->published_at->format('d M Y') }}</span>
                                </div>
                                <h3
                                    class="font-bold text-gray-900 text-sm line-clamp-2 group-hover:text-blue-600 transition-colors">
                                    {{ $item->title }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- CTA Section --}}
    <section class="py-24 bg-gradient-to-br from-emerald-600 via-emerald-700 to-teal-800 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml,%3Csvg width=\" 60\" height=\"60\"
                viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg
                fill=\"%23ffffff\" fill-opacity=\"0.05\"%3E%3Cpath d=\"M36
                34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6
                4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">Bergabung Bersama Kami</h2>
                <p class="text-xl text-emerald-100 mb-10 max-w-2xl mx-auto">
                    Dengan pengalaman lebih dari {{ $settings['years_experience'] ?? '20' }} tahun, kami telah menghasilkan
                    lulusan terbaik yang siap kerja.
                </p>
                @if(($settings['ppdb_active'] ?? false))
                    <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                        class="group inline-flex items-center gap-4 px-10 py-5 bg-white text-emerald-700 font-bold rounded-2xl hover:shadow-2xl hover:shadow-black/20 transition-all duration-500 transform hover:-translate-y-2 text-lg">
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