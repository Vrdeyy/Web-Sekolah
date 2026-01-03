@extends('layouts.app')

@section('title', 'Ekstrakurikuler')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <div
                    class="inline-flex items-center gap-2 px-6 py-3 bg-[#932F80]/25 backdrop-blur-md rounded-full text-[#F3DCEB] text-sm font-semibold mb-6 border border-[#932F80]/50 shadow-glow">
                    <i class="fas fa-futbol animate-bounce"></i>
                    <span>EKSTRAKURIKULER</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold text-white mb-6 tracking-wide drop-shadow-lg">
                    Kegiatan <span class="text-[#F3DCEB]">Ekstrakurikuler</span>
                </h1>
                <p class="text-gray-300 text-lg md:text-xl leading-relaxed">
                    Kembangkan bakat dan minat Anda melalui berbagai kegiatan ekstrakurikuler yang menarik
                </p>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-12 bg-white border-b border-gray-200 relative">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-wrap items-center justify-center gap-8 md:gap-16">
                <div class="text-center group">
                    <div class="text-4xl font-extrabold text-[#932F80] mb-1 transition-transform group-hover:scale-110">{{ $extracurriculars->count() }}</div>
                    <div class="text-gray-600 text-sm font-medium tracking-wide">Kegiatan Aktif</div>
                </div>
                <div class="text-center group">
                    <div class="text-4xl font-extrabold text-[#2A1424] mb-1 transition-transform group-hover:scale-110">500+</div>
                    <div class="text-gray-600 text-sm font-medium tracking-wide">Siswa Aktif</div>
                </div>
                <div class="text-center group">
                    <div class="text-4xl font-extrabold text-[#932F80] mb-1 transition-transform group-hover:scale-110">50+</div>
                    <div class="text-gray-600 text-sm font-medium tracking-wide">Prestasi Diraih</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Extracurriculars Grid --}}
    <section class="py-16 bg-purple-50 relative overflow-hidden">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($extracurriculars as $ekskul)
                    <article
                        class="group bg-white rounded-2xl overflow-hidden border border-gray-200 shadow-lg shadow-purple-900/5 hover:shadow-2xl hover:shadow-purple-900/10 hover:border-[#932F80]/30 transition-all duration-300 hover:-translate-y-2">
                        {{-- Image --}}
                        <div class="relative h-52 overflow-hidden bg-gray-100">
                            @if($ekskul->image)
                                <img src="{{ asset('storage/' . $ekskul->image) }}" alt="{{ $ekskul->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-br from-purple-100 to-white flex items-center justify-center">
                                    <i class="fas fa-futbol text-6xl text-purple-200"></i>
                                </div>
                            @endif

                            {{-- Schedule Badge --}}
                            @if($ekskul->schedule)
                                <div class="absolute bottom-4 left-4 right-4">
                                    <div class="px-4 py-2 bg-white/90 backdrop-blur-md rounded-lg shadow-lg border border-purple-100">
                                        <div class="flex items-center gap-2 text-[#2A1424]">
                                            <i class="far fa-clock text-[#932F80]"></i>
                                            <span class="text-sm font-medium">{{ $ekskul->schedule }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- Content --}}
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-[#2A1424] mb-3 group-hover:text-[#932F80] transition-colors">
                                {{ $ekskul->name }}
                            </h3>

                            @if($ekskul->short_description)
                                <p class="text-gray-500 text-sm mb-6 line-clamp-3 leading-relaxed">
                                    {{ $ekskul->short_description }}
                                </p>
                            @endif

                            {{-- Footer --}}
                            <div class="flex items-center justify-between pt-5 border-t border-gray-100">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 bg-purple-50 rounded-full flex items-center justify-center">
                                        <i class="fas fa-users text-[#932F80] text-xs"></i>
                                    </div>
                                    <span class="text-sm text-gray-500">Aktif</span>
                                </div>
                                <span class="inline-flex items-center gap-2 text-[#932F80] font-semibold text-sm hover:gap-3 transition-all cursor-pointer">
                                    Lihat Detail
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Categories Section --}}
    <section class="py-24 bg-white relative border-t border-gray-200">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold text-[#2A1424] mb-4 tracking-tight">Kategori Ekstrakurikuler</h2>
                <p class="text-gray-500 max-w-2xl mx-auto text-lg">
                    Berbagai kategori kegiatan yang dapat Anda pilih sesuai dengan minat dan bakat
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div
                    class="group p-8 bg-blue-50 rounded-3xl border border-blue-100 hover:shadow-2xl hover:shadow-blue-500/20 hover:border-blue-500/50 transition-all duration-500 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg shadow-blue-600/30">
                        <i class="fas fa-running text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#2A1424] mb-3 tracking-tight">Olahraga</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Futsal, Basket, Voli, Badminton, dan lainnya</p>
                </div>

                <div
                    class="group p-8 bg-purple-50 rounded-3xl border border-purple-100 hover:shadow-2xl hover:shadow-[#932F80]/20 hover:border-[#932F80]/50 transition-all duration-500 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-[#932F80] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg shadow-[#932F80]/30">
                        <i class="fas fa-music text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#2A1424] mb-3 tracking-tight">Seni & Musik</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Paduan Suara, Band, Tari, dan lainnya</p>
                </div>

                <div
                    class="group p-8 bg-emerald-50 rounded-3xl border border-emerald-100 hover:shadow-2xl hover:shadow-emerald-500/20 hover:border-emerald-500/50 transition-all duration-500 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-emerald-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg shadow-emerald-600/30">
                        <i class="fas fa-praying-hands text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#2A1424] mb-3 tracking-tight">Keagamaan</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Rohis, Pramuka, PMR, dan lainnya</p>
                </div>

                <div
                    class="group p-8 bg-amber-50 rounded-3xl border border-amber-100 hover:shadow-2xl hover:shadow-amber-500/20 hover:border-amber-500/50 transition-all duration-500 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-amber-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg shadow-amber-600/30">
                        <i class="fas fa-laptop-code text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#2A1424] mb-3 tracking-tight">Akademik</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">English Club, Karya Ilmiah, dan lainnya</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-24 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden border-t border-white/10">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6 tracking-tight">Kembangkan Potensimu!</h2>
                <p class="text-gray-300 text-lg md:text-xl mb-10 leading-relaxed">Bergabunglah dengan berbagai kegiatan ekstrakurikuler dan temukan bakatmu.</p>
                <div class="flex flex-wrap justify-center gap-6">
                    @if(($settings['ppdb_active'] ?? false))
                        <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                            class="inline-flex items-center gap-3 px-10 py-4 bg-white text-[#932F80] font-bold rounded-2xl hover:bg-gray-100 transition-all shadow-xl hover:-translate-y-1">
                            <i class="fas fa-user-plus text-lg"></i>
                            Daftar PPDB
                        </a>
                    @endif
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center gap-3 px-10 py-4 bg-white/10 backdrop-blur-md text-white font-bold rounded-2xl border-2 border-white/20 hover:bg-white/20 transition-all hover:-translate-y-1">
                        <i class="fas fa-phone text-lg"></i>
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection