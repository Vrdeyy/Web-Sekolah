@extends('layouts.app')

@section('title', 'Ekstrakurikuler')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-premium-dark relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-6 py-3 bg-[#8C51A5]/20 backdrop-blur-md rounded-xl text-[#F0E7F8] text-[10px] font-black mb-6 border border-[#8C51A5]/30 shadow-lg"
                    data-aos="fade-down" data-aos-delay="200">
                    <i class="fas fa-futbol text-[#F8CB62] animate-pulse"></i>
                    <span class="tracking-widest uppercase">EKSTRAKURIKULER</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-black text-white mb-6 tracking-tight drop-shadow-lg"
                    data-aos="zoom-in" data-aos-delay="400">
                    Kegiatan <span
                        class="text-[#F8CB62] bg-gradient-to-r from-[#F8CB62] to-[#D668EA] bg-clip-text text-transparent">Minat
                        Bakat</span>
                </h1>
                <p class="text-gray-400 text-lg md:text-xl font-medium leading-relaxed" data-aos="fade-up"
                    data-aos-delay="600">
                    Wadahi kreativitas dan asah potensi diri melalui berbagai program pengembangan karakter di
                    {{ $settings['school_name'] ?? 'SMK YAJ' }}
                </p>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-12 bg-white border-b border-[#F0E7F8] relative">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-wrap items-center justify-center gap-12 md:gap-24">
                <div class="text-center group" data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="text-5xl font-black text-[#8C51A5] mb-2 transition-all group-hover:scale-110 drop-shadow-sm">
                        {{ $extracurriculars->count() }}
                    </div>
                    <div class="text-gray-400 text-[10px] font-black uppercase tracking-[0.2em]">UNIT KEGIATAN</div>
                </div>
                <div class="text-center group" data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="text-5xl font-black text-[#612F73] mb-2 transition-all group-hover:scale-110 drop-shadow-sm">
                        500+
                    </div>
                    <div class="text-gray-400 text-[10px] font-black uppercase tracking-[0.2em]">SISWA AKTIF</div>
                </div>
                <div class="text-center group" data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="text-5xl font-black text-[#8C51A5] mb-2 transition-all group-hover:scale-110 drop-shadow-sm">
                        50+
                    </div>
                    <div class="text-gray-400 text-[10px] font-black uppercase tracking-[0.2em]">PENGHARGAAN</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Extracurriculars Grid --}}
    <section class="py-16 bg-[#F0E7F8]/30 relative overflow-hidden">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($extracurriculars as $index => $ekskul)
                    <article
                        class="group bg-white rounded-[2.5rem] overflow-hidden border border-[#8C51A5]/10 shadow-xl shadow-[#612F73]/5 hover:shadow-premium-lg hover:border-[#8C51A5]/30 transition-all duration-700 hover:-translate-y-2"
                        data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 150 }}">
                        {{-- Image --}}
                        <div class="relative h-64 overflow-hidden bg-gray-50">
                            @if($ekskul->image)
                                <img src="{{ asset('storage/' . $ekskul->image) }}" alt="{{ $ekskul->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-br from-[#F0E7F8] to-white flex items-center justify-center">
                                    <i class="fas fa-futbol text-6xl text-[#D668EA]/20"></i>
                                </div>
                            @endif

                            {{-- Schedule Badge --}}
                            @if($ekskul->schedule)
                                <div class="absolute bottom-6 left-6 right-6">
                                    <div
                                        class="px-5 py-3 bg-white/90 backdrop-blur-md rounded-2xl shadow-xl border border-[#8C51A5]/10">
                                        <div class="flex items-center gap-3 text-[#612F73]">
                                            <i class="fas fa-calendar-alt text-[#8C51A5]"></i>
                                            <span
                                                class="text-[10px] font-black uppercase tracking-widest">{{ $ekskul->schedule }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- Content --}}
                        <div class="p-10">
                            <h3
                                class="text-xl font-black text-[#612F73] mb-4 group-hover:text-[#8C51A5] transition-colors uppercase tracking-tight leading-snug">
                                {{ $ekskul->name }}
                            </h3>

                            @if($ekskul->short_description)
                                <p class="text-gray-500 text-sm mb-8 line-clamp-3 leading-relaxed font-medium">
                                    {{ $ekskul->short_description }}
                                </p>
                            @endif

                            {{-- Footer --}}
                            <div class="flex items-center justify-between pt-8 border-t border-gray-50">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 bg-[#8C51A5]/10 rounded-xl flex items-center justify-center border border-[#8C51A5]/10">
                                        <i class="fas fa-users text-[#8C51A5] text-sm"></i>
                                    </div>
                                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">AKTIF</span>
                                </div>
                                <a href="{{ route('extracurricular.show', $ekskul->slug) }}"
                                    class="inline-flex items-center gap-3 text-[#8C51A5] font-black text-[10px] uppercase tracking-[0.2em] hover:text-[#612F73] transition-all group/link">
                                    SELENGKAPNYA
                                    <i
                                        class="fas fa-arrow-right text-[8px] group-hover/link:translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Categories Section --}}
    <section class="py-24 bg-white relative border-t border-[#F0E7F8]">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-20" data-aos="fade-up">
                <div
                    class="inline-flex items-center gap-2 px-6 py-2 bg-[#F0E7F8] rounded-full text-[#8C51A5] text-[10px] font-black mb-4 border border-[#8C51A5]/10 shadow-sm uppercase tracking-widest">
                    Bidang Pengembangan
                </div>
                <h2 class="text-4xl font-black text-[#612F73] mb-6 tracking-tight uppercase">Kategori Ekstrakurikuler</h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-[#8C51A5] to-[#D668EA] mx-auto rounded-full"></div>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="group p-10 bg-[#F0E7F8]/30 rounded-[2.5rem] border border-[#8C51A5]/10 hover:shadow-premium-lg transition-all duration-700 transform hover:-translate-y-2"
                    data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="w-16 h-16 bg-[#612F73] rounded-2xl flex items-center justify-center mb-8 group-hover:rotate-12 transition-transform shadow-xl shadow-[#612F73]/20 border border-white/20">
                        <i class="fas fa-running text-2xl text-[#F8CB62]"></i>
                    </div>
                    <h3 class="text-xl font-black text-[#612F73] mb-4 tracking-tight uppercase">Olahraga</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-medium">Pengembangan fisik & sportivitas dalam
                        berbagai cabang olahraga unggulan.</p>
                </div>

                <div class="group p-10 bg-[#8C51A5]/5 rounded-[2.5rem] border border-[#8C51A5]/10 hover:shadow-premium-lg transition-all duration-700 transform hover:-translate-y-2"
                    data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="w-16 h-16 bg-[#8C51A5] rounded-2xl flex items-center justify-center mb-8 group-hover:rotate-12 transition-transform shadow-xl shadow-[#8C51A5]/20 border border-white/20">
                        <i class="fas fa-palette text-2xl text-[#F8CB62]"></i>
                    </div>
                    <h3 class="text-xl font-black text-[#612F73] mb-4 tracking-tight uppercase">Seni Budaya</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-medium">Asah kreativitas & ekspresi diri melalui
                        musik, tari, dan seni rupa modern.</p>
                </div>

                <div class="group p-10 bg-[#F0E7F8]/30 rounded-[2.5rem] border border-[#8C51A5]/10 hover:shadow-premium-lg transition-all duration-700 transform hover:-translate-y-2"
                    data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="w-16 h-16 bg-[#612F73] rounded-2xl flex items-center justify-center mb-8 group-hover:rotate-12 transition-transform shadow-xl shadow-[#612F73]/20 border border-white/20">
                        <i class="fas fa-users text-2xl text-[#F8CB62]"></i>
                    </div>
                    <h3 class="text-xl font-black text-[#612F73] mb-4 tracking-tight uppercase">Organisasi</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-medium">Bangun jiwa kepemimpinan & karakter kuat
                        melalui organisasi kesiswaan.</p>
                </div>

                <div class="group p-10 bg-[#8C51A5]/5 rounded-[2.5rem] border border-[#8C51A5]/10 hover:shadow-premium-lg transition-all duration-700 transform hover:-translate-y-2"
                    data-aos="fade-up" data-aos-delay="400">
                    <div
                        class="w-16 h-16 bg-[#8C51A5] rounded-2xl flex items-center justify-center mb-8 group-hover:rotate-12 transition-transform shadow-xl shadow-[#8C51A5]/20 border border-white/20">
                        <i class="fas fa-microchip text-2xl text-[#F8CB62]"></i>
                    </div>
                    <h3 class="text-xl font-black text-[#612F73] mb-4 tracking-tight uppercase">Sains & TI</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-medium">Eksplorasi dunia teknologi & inovasi sains
                        untuk persiapan masa depan.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-24 bg-premium-dark relative overflow-hidden border-t border-white/10">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-black text-white mb-6 tracking-tight uppercase">Kembangkan Potensimu!
                </h2>
                <p class="text-gray-400 text-lg md:text-xl mb-12 leading-relaxed font-medium" data-aos="fade-up"
                    data-aos-delay="200">
                    Wujudkan impianmu dan asah bakat terpendam bersama komunitas ekstrakurikuler paling progresif di
                    {{ $settings['school_name'] ?? 'SMK YAJ' }}.</p>
                <div class="flex flex-wrap justify-center gap-6" data-aos="fade-up" data-aos-delay="400">
                    @if(($settings['ppdb_active'] ?? false))
                        <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                            class="inline-flex items-center gap-4 px-12 py-5 bg-gradient-to-r from-[#F8CB62] to-[#f5b82e] text-[#612F73] font-black rounded-2xl hover:shadow-golden transition-all hover:-translate-y-1 transform uppercase text-xs tracking-widest">
                            <i class="fas fa-user-plus text-lg"></i>
                            Daftar PPDB Sekarang
                        </a>
                    @endif
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center gap-4 px-12 py-5 bg-white/10 backdrop-blur-md text-white font-black rounded-2xl border border-white/20 hover:bg-white/20 transition-all hover:-translate-y-1 transform uppercase text-xs tracking-widest">
                        <i class="fas fa-phone-alt text-lg text-[#F8CB62]"></i>
                        Konsultasi Minat Bakat
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection