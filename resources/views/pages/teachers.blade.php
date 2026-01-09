@extends('layouts.app')

@section('title', 'Daftar Guru')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-premium-dark relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-6 py-3 bg-[#8C51A5]/20 backdrop-blur-md rounded-xl text-[#F0E7F8] text-[10px] font-black mb-6 border border-[#8C51A5]/30 shadow-lg"
                    data-aos="fade-down" data-aos-delay="200">
                    <i class="fas fa-chalkboard-teacher text-[#F8CB62] animate-pulse"></i>
                    <span class="tracking-widest uppercase">TENAGA PENGAJAR</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-black text-white mb-6 tracking-tight drop-shadow-lg"
                    data-aos="zoom-in" data-aos-delay="400">
                    Daftar <span
                        class="text-[#F8CB62] bg-gradient-to-r from-[#F8CB62] to-[#D668EA] bg-clip-text text-transparent">Guru</span>
                </h1>
                <p class="text-gray-400 text-lg md:text-xl font-medium leading-relaxed" data-aos="fade-up"
                    data-aos-delay="600">
                    Dipandu oleh pendidik profesional dan berpengalaman untuk membentuk masa depan cerdas di
                    {{ $settings['school_name'] ?? 'SMK YAJ' }}
                </p>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-12 bg-white relative border-b border-[#F0E7F8]">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto text-center">
                {{-- Stat 1 --}}
                <div class="group p-8 rounded-[2rem] bg-[#F0E7F8]/50 border border-[#8C51A5]/10 hover:shadow-premium-lg transition-all duration-700 transform hover:-translate-y-3"
                    data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="text-5xl font-black text-[#612F73] mb-3 leading-none group-hover:scale-110 transition-transform">
                        {{ $teachers->count() }}
                    </div>
                    <div class="text-gray-400 font-black uppercase tracking-[0.2em] text-[10px]">DIKMEN & DIKSUS</div>
                </div>

                {{-- Stat 2 --}}
                <div class="group p-8 rounded-[2rem] bg-[#8C51A5]/5 border border-[#8C51A5]/10 hover:shadow-premium-lg transition-all duration-700 transform hover:-translate-y-3"
                    data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="text-5xl font-black text-[#8C51A5] mb-3 leading-none group-hover:scale-110 transition-transform">
                        100%</div>
                    <div class="text-gray-400 font-black uppercase tracking-[0.2em] text-[10px]">TERSERTIFIKASI</div>
                </div>

                {{-- Stat 3 --}}
                <div class="group p-8 rounded-[2rem] bg-[#F8CB62]/5 border border-[#8C51A5]/10 hover:shadow-premium-lg transition-all duration-700 transform hover:-translate-y-3"
                    data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="text-5xl font-black text-[#F8CB62] mb-3 leading-none group-hover:scale-110 transition-transform">
                        PASCA</div>
                    <div class="text-gray-400 font-black uppercase tracking-[0.2em] text-[10px]">SARJANA S1 / S2</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Teachers Grid --}}
    <section class="py-24 bg-[#F0E7F8]/30 relative overflow-hidden">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($teachers as $index => $teacher)
                    <article
                        class="group bg-white rounded-[2.5rem] overflow-hidden border border-[#8C51A5]/10 shadow-xl shadow-[#612F73]/5 hover:shadow-premium-lg hover:border-[#8C51A5]/30 transition-all duration-700 hover:-translate-y-3 text-center p-10"
                        data-aos="fade-up" data-aos-delay="{{ ($index % 4) * 150 }}">
                        {{-- Photo --}}
                        <div class="relative mb-8 flex justify-center">
                            <div
                                class="w-36 h-36 rounded-full overflow-hidden border-4 border-white shadow-xl group-hover:border-[#8C51A5]/30 transition-all duration-700 p-1 bg-gradient-to-br from-[#8C51A5]/10 to-transparent">
                                @if($teacher->photo)
                                    <img src="{{ asset('storage/' . $teacher->photo) }}" alt="{{ $teacher->name }}"
                                        class="w-full h-full object-cover rounded-full group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full bg-[#F0E7F8] flex items-center justify-center rounded-full">
                                        <i class="fas fa-user-graduate text-4xl text-[#8C51A5]"></i>
                                    </div>
                                @endif
                            </div>

                            {{-- Role Badge --}}
                            <div class="absolute -bottom-2 right-1/2 translate-x-12">
                                <div
                                    class="w-10 h-10 bg-[#8C51A5] rounded-[1rem] flex items-center justify-center text-[#F8CB62] shadow-lg border-2 border-white transform -rotate-12 group-hover:rotate-0 transition-transform duration-500">
                                    <i class="fas fa-award text-sm"></i>
                                </div>
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="space-y-4">
                            <h3
                                class="text-xl font-black text-[#612F73] group-hover:text-[#8C51A5] transition-colors leading-snug uppercase">
                                {{ $teacher->name }}
                            </h3>

                            @if($teacher->position)
                                <div
                                    class="inline-flex items-center gap-2 px-4 py-1.5 bg-[#F0E7F8] rounded-full border border-[#8C51A5]/10 group-hover:bg-[#8C51A5] transition-colors duration-500">
                                    <span
                                        class="text-[#8C51A5] group-hover:text-white text-[10px] font-black uppercase tracking-widest">{{ $teacher->position }}</span>
                                </div>
                            @endif

                            @if($teacher->subjects)
                                <div class="flex items-center justify-center gap-2 text-gray-400">
                                    <i class="fas fa-book-open text-[10px] text-[#8C51A5]"></i>
                                    <span class="text-[10px] font-black uppercase tracking-widest">{{ $teacher->subjects }}</span>
                                </div>
                            @endif

                            {{-- Social/Contact --}}
                            @if($teacher->email)
                                <div class="mt-8 pt-8 border-t border-gray-50">
                                    <a href="mailto:{{ $teacher->email }}"
                                        class="inline-flex items-center gap-3 px-8 py-3.5 bg-[#8C51A5]/10 text-[#8C51A5] hover:bg-[#8C51A5] hover:text-white transition-all duration-500 rounded-xl text-[10px] font-black uppercase tracking-[0.2em] border border-[#8C51A5]/20 w-full justify-center">
                                        <i class="fas fa-paper-plane text-[10px]"></i>
                                        HUBUNGI GURU
                                    </a>
                                </div>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-24 bg-premium-dark relative overflow-hidden border-t border-white/10">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10 text-center">
            <div class="max-w-3xl mx-auto" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-black text-white mb-6 uppercase tracking-tight">Bergabung Bersama Kami
                </h2>
                <p class="text-gray-400 text-lg md:text-xl mb-12 font-medium leading-relaxed" data-aos="fade-up"
                    data-aos-delay="200">
                    Wujudkan visi mencetak generasi unggul. Kami mengundang tenaga pengajar berdedikasi untuk berkolaborasi
                    bersama {{ $settings['school_name'] ?? 'SMK YAJ' }}.</p>
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center gap-6 px-12 py-5 bg-gradient-to-r from-[#F8CB62] to-[#f5b82e] text-[#612F73] font-black rounded-[2rem] hover:shadow-golden transition-all hover:-translate-y-1 transform uppercase text-sm tracking-widest"
                    data-aos="fade-up" data-aos-delay="400">
                    <i class="fas fa-paper-plane text-2xl"></i>
                    Kirim Lamaran & Kerjasama
                </a>
            </div>
        </div>
    </section>
@endsection