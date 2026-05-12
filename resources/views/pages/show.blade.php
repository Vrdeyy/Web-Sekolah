@extends('layouts.app')

@section('title', $page->title)

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-premium-dark relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            {{-- Breadcrumb --}}
            <nav class="flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] mb-8"
                data-aos="fade-down">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-[#8C51A5] transition-colors">
                    <i class="fas fa-home"></i>
                </a>
                <i class="fas fa-chevron-right text-[8px] text-gray-600"></i>
                <span class="text-[#F8CB62] tracking-widest">{{ strtoupper($page->title) }}</span>
            </nav>

            <div class="max-w-4xl" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-6 py-2 bg-[#8C51A5]/20 backdrop-blur-md rounded-xl text-[#F0E7F8] text-[10px] font-black mb-6 border border-[#8C51A5]/30 shadow-lg uppercase tracking-widest"
                    data-aos="fade-down" data-aos-delay="200">
                    <i class="fas fa-file-alt text-[#F8CB62]"></i>
                    <span>HALAMAN INFORMASI</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-black text-white mb-6 drop-shadow-lg tracking-tight uppercase"
                    data-aos="zoom-in" data-aos-delay="400">
                    {{ $page->title }}
                </h1>
            </div>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="py-24 bg-white relative">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-5xl mx-auto">
                {{-- Featured Image --}}
                @if($page->image)
                    <figure class="mb-16 rounded-[3rem] overflow-hidden shadow-premium-lg border border-[#8C51A5]/10"
                        data-aos="zoom-in">
                        <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->title }}"
                            class="w-full h-auto hover:scale-105 transition-transform duration-[2s]">
                    </figure>
                @endif

                {{-- Content --}}
                <div class="prose prose-lg max-w-none
                                    prose-headings:text-[#612F73] prose-headings:font-black
                                    prose-h2:text-4xl prose-h2:mt-16 prose-h2:mb-10 prose-h2:pb-6 prose-h2:border-b prose-h2:border-[#F0E7F8] prose-h2:uppercase prose-h2:tracking-tight
                                    prose-h3:text-2xl prose-h3:mt-12 prose-h3:mb-6 prose-h3:uppercase
                                    prose-p:text-gray-500 prose-p:leading-relaxed prose-p:mb-8 prose-p:font-medium
                                    prose-a:text-[#8C51A5] prose-a:font-black prose-a:no-underline hover:prose-a:text-[#612F73] transition-colors
                                    prose-strong:text-[#612F73] prose-strong:font-black
                                    prose-ul:my-8 prose-li:text-gray-500 prose-li:mb-3
                                    prose-ol:my-8
                                    prose-blockquote:border-l-4 prose-blockquote:border-[#8C51A5] prose-blockquote:bg-[#F0E7F8]/30 prose-blockquote:py-10 prose-blockquote:px-12 prose-blockquote:rounded-[2.5rem] prose-blockquote:italic prose-blockquote:text-gray-500
                                    prose-img:rounded-[2.5rem] prose-img:shadow-premium-lg" data-aos="fade-up">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </section>

    {{-- Related Links Section - Rich Modern Style --}}
    <section class="py-28 bg-[#F0E7F8]/30 relative overflow-hidden border-t border-[#F0E7F8]">
        {{-- BACKGROUND ELEMENTS --}}
        <div class="absolute inset-0 pointer-events-none">
            {{-- Big Blobs --}}
            <div class="absolute -top-32 -left-32 w-[612F73] h-[612F73] bg-[#8C51A5]/5 rounded-full blur-[120px]"></div>
            <div class="absolute top-1/3 -right-40 w-[8C51A5] h-[8C51A5] bg-[#612F73]/5 rounded-full blur-[130px]"></div>
            <div class="absolute -bottom-40 left-1/4 w-[612F73] h-[612F73] bg-[#8C51A5]/5 rounded-full blur-[140px]"></div>

            {{-- Floating Dots --}}
            <div
                class="absolute inset-0 bg-[radial-gradient(#8C51A515_1px,transparent_1px)] bg-[size:24px_24px] opacity-30">
            </div>
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center mb-20" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-6 py-2 bg-[#8C51A5]/10 rounded-full text-[#8C51A5] text-[10px] font-black uppercase tracking-[0.3em] mb-6 shadow-sm border border-[#8C51A5]/10"
                    data-aos="fade-down" data-aos-delay="200">
                    <i class="fas fa-compass text-[#F8CB62]"></i>
                    <span>EKSPLORASI LANJUTAN</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-[#612F73] mb-6 tracking-tight uppercase" data-aos="zoom-in"
                    data-aos-delay="400">Informasi <span class="text-[#8C51A5]">Lainnya</span></h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-[#8C51A5] to-[#D668EA] mx-auto rounded-full"></div>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-7xl mx-auto">
                @php
                    $links = [
                        ['id' => 'yayasan', 'title' => 'Yayasan', 'desc' => 'Profil Lembaga', 'icon' => 'fa-landmark'],
                        ['id' => 'sekolah', 'title' => 'Sekolah', 'desc' => 'Profil SMK YAJ', 'icon' => 'fa-school'],
                        ['id' => 'visi-misi', 'title' => 'Visi & Misi', 'desc' => 'Arah & Tujuan', 'icon' => 'fa-bullseye'],
                        ['id' => 'majors', 'title' => 'Jurusan', 'desc' => 'Program Studi', 'icon' => 'fa-graduation-cap'],
                    ];
                @endphp

                @foreach($links as $index => $link)
                    <div data-aos="fade-up" data-aos-delay="{{ $index * 150 }}">
                        <a href="{{ $link['id'] === 'majors' ? route('majors') : route('page', $link['id']) }}"
                            class="group relative block p-12 bg-white rounded-[3rem] border border-[#8C51A5]/10 
                                                   shadow-xl shadow-[#612F73]/5 hover:shadow-premium-lg 
                                                   hover:border-[#8C51A5]/30 transition-all duration-500 ease-in-out transform hover:-translate-y-3 
                                                   text-center overflow-hidden {{ request()->is('*/' . $link['id']) ? 'ring-2 ring-[#8C51A5] bg-[#F0E7F8]' : '' }}">

                            {{-- Decorative Corner Shine --}}
                            <div
                                class="absolute -top-12 -right-12 w-40 h-40 bg-gradient-to-br from-[#8C51A5]/5 to-transparent rounded-full blur-2xl group-hover:scale-150 transition-transform duration-1000">
                            </div>

                            <div class="relative z-10">
                                <div
                                    class="w-20 h-20 bg-[#F0E7F8] rounded-[2rem] flex items-center justify-center mb-8 mx-auto 
                                                           transition-all duration-500 border border-[#8C51A5]/10 shadow-lg group-hover:rotate-6 group-hover:bg-[#8C51A5]">
                                    <i
                                        class="fas {{ $link['icon'] }} text-3xl text-[#8C51A5] group-hover:text-white transition-colors duration-500"></i>
                                </div>
                                <h3
                                    class="text-xl font-black text-[#612F73] group-hover:text-[#8C51A5] transition-colors tracking-tight uppercase">
                                    {{ $link['title'] }}
                                </h3>
                                <p
                                    class="text-gray-400 text-[10px] font-black uppercase tracking-[0.2em] mt-4 group-hover:text-gray-500 transition-colors">
                                    {{ $link['desc'] }}
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-24 bg-premium-dark relative overflow-hidden border-t border-white/10">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center" data-aos="zoom-in">
                <h2 class="text-4xl md:text-6xl font-black text-white mb-8 tracking-tight uppercase" data-aos="fade-up"
                    data-aos-delay="200">Ada Pertanyaan?</h2>
                <p class="text-gray-400 text-lg md:text-xl mb-12 font-medium leading-relaxed" data-aos="fade-up"
                    data-aos-delay="400">Tim kami siap membantu Anda memberikan informasi terbaik mengenai
                    {{ $settings['school_name'] ?? 'SMK YAJ' }}.
                </p>
                <div class="flex flex-wrap justify-center gap-6" data-aos="fade-up" data-aos-delay="600">
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
                            Pendaftaran PPDB
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection