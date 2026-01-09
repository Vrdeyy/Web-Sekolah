@extends('layouts.app')

@section('title', 'Program Keahlian')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto" data-aos="fade-up">
                <div
                    class="inline-flex items-center gap-2 px-6 py-3 bg-[#932F80]/25 backdrop-blur-md rounded-full text-[#F3DCEB] text-sm font-semibold mb-6 border border-[#932F80]/50 shadow-glow" data-aos="fade-down" data-aos-delay="200">
                    <i class="fas fa-graduation-cap animate-bounce"></i>
                    <span>PROGRAM KEAHLIAN</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold text-white mb-6 tracking-wide drop-shadow-lg" data-aos="zoom-in" data-aos-delay="400">
                    Jurusan <span class="text-[#F3DCEB]">Unggulan</span>
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
                    <div class="text-4xl font-extrabold text-[#932F80] mb-1 transition-transform group-hover:scale-110">
                        {{ $majors->count() }}</div>
                    <div class="text-gray-600 text-sm font-medium tracking-wide">Program Keahlian</div>
                </div>
                <div class="text-center group" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-4xl font-extrabold text-[#2A1424] mb-1 transition-transform group-hover:scale-110">100%
                    </div>
                    <div class="text-gray-600 text-sm font-medium tracking-wide">Tersertifikasi</div>
                </div>
                <div class="text-center group" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-4xl font-extrabold text-[#932F80] mb-1 transition-transform group-hover:scale-110">4
                        Tahun</div>
                    <div class="text-gray-600 text-sm font-medium tracking-wide">Masa Studi</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Majors Grid --}}
    <section class="py-16 bg-purple-50 relative overflow-hidden">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($majors as $index => $major)
                    <article
                        class="group bg-white rounded-2xl overflow-hidden border border-gray-200 shadow-lg shadow-purple-900/5 hover:shadow-2xl hover:shadow-purple-900/10 hover:border-[#932F80]/30 transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        {{-- Image --}}
                        <a href="{{ route('major.show', $major->slug) }}"
                            class="block relative h-56 overflow-hidden bg-gray-100">
                            @if($major->image)
                                <img src="{{ asset('storage/' . $major->image) }}" alt="{{ $major->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-br from-purple-100 to-white flex items-center justify-center">
                                    <i class="fas fa-graduation-cap text-6xl text-purple-200"></i>
                                </div>
                            @endif

                            {{-- Overlay --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-[#2A1424]/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                            </div>

                            {{-- Badge --}}
                            @if($major->short_name)
                                <div class="absolute top-4 left-4">
                                    <span
                                        class="px-4 py-2 bg-[#932F80] text-white text-sm font-bold rounded-lg shadow-lg border border-white/20">
                                        {{ $major->short_name }}
                                    </span>
                                </div>
                            @endif
                        </a>

                        {{-- Content --}}
                        <div class="p-6">
                            <a href="{{ route('major.show', $major->slug) }}">
                                <h3 class="text-xl font-bold text-[#2A1424] mb-3 group-hover:text-[#932F80] transition-colors">
                                    {{ $major->name }}
                                </h3>
                            </a>

                            @if($major->short_description)
                                <p class="text-gray-600 text-sm mb-6 line-clamp-3 leading-relaxed">
                                    {{ $major->short_description }}
                                </p>
                            @endif

                            {{-- Footer --}}
                            <div class="flex items-center justify-between pt-5 border-t border-gray-100">
                                <a href="{{ route('major.show', $major->slug) }}"
                                    class="inline-flex items-center gap-2 text-[#932F80] font-semibold text-sm hover:gap-3 transition-all">
                                    Lihat Detail
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                                <div class="flex items-center gap-2 text-gray-500">
                                    <i class="fas fa-clock text-[#932F80]"></i>
                                    <span class="text-sm">4 Tahun</span>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section
        class="py-24 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden border-t border-white/10">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6 tracking-tight" data-aos="fade-up">Tertarik Bergabung?</h2>
                <p class="text-gray-300 text-lg md:text-xl mb-10 leading-relaxed" data-aos="fade-up" data-aos-delay="200">Daftarkan diri Anda sekarang dan jadilah
                    bagian dari keluarga besar kami!</p>
                <div class="flex flex-wrap justify-center gap-6" data-aos="fade-up" data-aos-delay="400">
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