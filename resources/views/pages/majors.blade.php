@extends('layouts.app')

@section('title', 'Program Keahlian')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-premium-dark relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-6 py-3 bg-[#8C51A5]/20 backdrop-blur-md rounded-full text-[#F0E7F8] text-sm font-bold mb-6 border border-[#8C51A5]/30 shadow-lg"
                    data-aos="fade-down" data-aos-delay="200">
                    <i class="fas fa-graduation-cap animate-bounce text-[#F8CB62]"></i>
                    <span>PROGRAM KEAHLIAN</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-black text-white mb-6 tracking-wide drop-shadow-lg"
                    data-aos="zoom-in" data-aos-delay="400">
                    Jurusan <span
                        class="text-[#F8CB62] bg-gradient-to-r from-[#F8CB62] to-[#D668EA] bg-clip-text text-transparent">Unggulan</span>
                </h1>
                <p class="text-gray-300 text-lg md:text-xl leading-relaxed" data-aos="fade-up" data-aos-delay="600">
                    Pilih program keahlian yang sesuai dengan minat dan bakat Anda untuk masa depan yang cerah
                </p>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-12 bg-white relative border-b border-gray-200">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-wrap items-center justify-center gap-8 md:gap-16">
                <div class="text-center group" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-4xl font-black text-[#8C51A5] mb-1 transition-transform group-hover:scale-110">
                        {{ $majors->count() }}
                    </div>
                    <div class="text-gray-500 text-sm font-bold uppercase tracking-widest">Program Keahlian</div>
                </div>
                <div class="text-center group" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-4xl font-black text-[#612F73] mb-1 transition-transform group-hover:scale-110">100%
                    </div>
                    <div class="text-gray-500 text-sm font-bold uppercase tracking-widest">Tersertifikasi</div>
                </div>
                <div class="text-center group" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-4xl font-black text-[#8C51A5] mb-1 transition-transform group-hover:scale-110">4
                        Tahun</div>
                    <div class="text-gray-500 text-sm font-bold uppercase tracking-widest">Masa Studi</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Majors Grid --}}
    <section class="py-16 bg-[#F0E7F8]/30 relative overflow-hidden">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($majors as $index => $major)
                    <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <article
                            class="group h-full bg-white rounded-3xl overflow-hidden border border-[#8C51A5]/10 shadow-xl shadow-[#612F73]/5 hover:shadow-2xl hover:border-[#8C51A5]/30 transition-all duration-500 ease-in-out hover:-translate-y-2 hover:scale-[1.01]">
                            {{-- Image --}}
                            <a href="{{ route('major.show', $major->slug) }}"
                                class="block relative h-56 overflow-hidden bg-gray-100">
                                @if($major->image)
                                    <img src="{{ asset('storage/' . $major->image) }}" alt="{{ $major->name }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-purple-100 to-white flex items-center justify-center">
                                        <i class="fas fa-graduation-cap text-6xl text-purple-200"></i>
                                    </div>
                                @endif

                                {{-- Overlay --}}
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-[#612F73]/80 via-[#612F73]/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                </div>

                                {{-- Badge --}}
                                @if($major->short_name)
                                    <div class="absolute top-4 left-4">
                                        <span
                                            class="px-4 py-2 bg-[#8C51A5] text-white text-xs font-black uppercase tracking-widest rounded-xl shadow-lg border border-white/20">
                                            {{ $major->short_name }}
                                        </span>
                                    </div>
                                @endif
                            </a>

                            {{-- Content --}}
                            <div class="p-8">
                                <a href="{{ route('major.show', $major->slug) }}">
                                    <h3
                                        class="text-xl font-black text-[#612F73] mb-3 group-hover:text-[#8C51A5] transition-colors leading-tight">
                                        {{ $major->name }}
                                    </h3>
                                </a>

                                @if($major->short_description)
                                    <p class="text-gray-600 text-sm mb-6 line-clamp-3 leading-relaxed">
                                        {{ $major->short_description }}
                                    </p>
                                @endif

                                {{-- Footer --}}
                                <div class="flex items-center justify-between pt-5 border-t border-gray-50">
                                    <a href="{{ route('major.show', $major->slug) }}"
                                        class="inline-flex items-center gap-2 text-[#8C51A5] font-bold text-sm hover:gap-3 transition-all">
                                        Lihat Detail
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                    <div class="flex items-center gap-2 text-gray-400">
                                        <i class="fas fa-clock text-[#F8CB62]"></i>
                                        <span class="text-xs font-bold uppercase tracking-widest">4 Tahun</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-24 bg-premium-dark relative overflow-hidden border-t border-white/5">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6 tracking-tight" data-aos="fade-up">Tertarik
                    Bergabung?</h2>
                <p class="text-gray-300 text-lg md:text-xl mb-10 leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                    Daftarkan diri Anda sekarang dan jadilah
                    bagian dari keluarga besar kami!</p>
                <div class="flex flex-wrap justify-center gap-6" data-aos="fade-up" data-aos-delay="400">
                    @if(($settings['ppdb_active'] ?? false))
                        <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                            class="inline-flex items-center gap-3 px-10 py-4 bg-gradient-to-r from-[#F8CB62] to-[#f5b82e] text-[#612F73] font-black rounded-2xl hover:shadow-golden transition-all shadow-xl hover:-translate-y-1">
                            <i class="fas fa-user-plus text-lg"></i>
                            Daftar PPDB
                        </a>
                    @endif
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center gap-3 px-10 py-4 bg-white/5 backdrop-blur-md text-white font-black rounded-2xl border border-white/10 hover:bg-white/10 transition-all hover:-translate-y-1">
                        <i class="fas fa-phone text-lg text-[#F8CB62]"></i>
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection