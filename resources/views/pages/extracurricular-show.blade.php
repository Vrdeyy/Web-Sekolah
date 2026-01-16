@extends('layouts.app')

@section('title', $extracurricular->name)

@section('content')
    {{-- Breadcrumb Navigation --}}
    <section class="pt-28 pb-8 bg-premium-dark relative overflow-hidden flex items-center">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <nav class="flex flex-wrap items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em]"
                data-aos="fade-down">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-[#8C51A5] transition-colors">
                    <i class="fas fa-home"></i>
                </a>
                <i class="fas fa-chevron-right text-[8px] text-gray-600"></i>
                <a href="{{ route('extracurriculars') }}"
                    class="text-gray-400 hover:text-[#8C51A5] transition-colors tracking-widest">EKSTRAKURIKULER</a>
                <i class="fas fa-chevron-right text-[8px] text-gray-600"></i>
                <span
                    class="text-[#F8CB62] font-black line-clamp-1 break-all">{{ strtoupper($extracurricular->name) }}</span>
            </nav>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="py-12 md:py-20 bg-[#F0E7F8]/30 relative">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-8 md:gap-16">
                {{-- Main Content - 8 columns --}}
                <article class="lg:col-span-8">
                    {{-- Title --}}
                    <header class="mb-14" data-aos="fade-up">
                        <div class="inline-flex items-center gap-2 px-6 py-2 bg-[#8C51A5]/10 text-[#8C51A5] text-[10px] font-black rounded-xl border border-[#8C51A5]/20 shadow-lg mb-8 uppercase tracking-widest"
                            data-aos="fade-down" data-aos-delay="200">
                            <i class="fas fa-running text-[#F8CB62]"></i>
                            Program Ekstrakurikuler
                        </div>

                        <h1 class="text-3xl md:text-5xl lg:text-7xl font-black text-[#612F73] leading-tight mb-10 tracking-tight drop-shadow-sm uppercase"
                            data-aos="zoom-in" data-aos-delay="400">
                            {{ $extracurricular->name }}
                        </h1>

                        {{-- Meta Info --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pb-12 border-b border-[#8C51A5]/10"
                            data-aos="fade-up" data-aos-delay="600">
                            @if($extracurricular->coach)
                                <div class="bg-white p-6 rounded-[2rem] border border-[#8C51A5]/10 shadow-lg shadow-[#612F73]/5 flex items-center gap-5 group hover:border-[#8C51A5]/30 transition-all duration-500"
                                    data-aos="fade-right" data-aos-delay="700">
                                    <div
                                        class="w-14 h-14 bg-[#F0E7F8] rounded-2xl flex items-center justify-center border border-[#8C51A5]/10 group-hover:bg-[#8C51A5] transition-all duration-500">
                                        <i class="fas fa-user-tie text-[#8C51A5] group-hover:text-white transition-colors"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <span
                                            class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Pembina
                                            Utama</span>
                                        <span
                                            class="text-[#612F73] font-black text-sm uppercase">{{ $extracurricular->coach }}</span>
                                    </div>
                                </div>
                            @endif

                            @if($extracurricular->schedule)
                                <div class="bg-white p-6 rounded-[2rem] border border-[#8C51A5]/10 shadow-lg shadow-[#612F73]/5 flex items-center gap-5 group hover:border-[#8C51A5]/30 transition-all duration-500"
                                    data-aos="fade-right" data-aos-delay="800">
                                    <div
                                        class="w-14 h-14 bg-[#F0E7F8] rounded-2xl flex items-center justify-center border border-[#8C51A5]/10 group-hover:bg-[#8C51A5] transition-all duration-500">
                                        <i
                                            class="fas fa-calendar-alt text-[#8C51A5] group-hover:text-white transition-colors"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Jadwal
                                            Latihan</span>
                                        <span
                                            class="text-[#612F73] font-black text-sm uppercase">{{ $extracurricular->schedule }}</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </header>

                    {{-- Featured Image --}}
                    @if($extracurricular->image)
                        <figure class="mb-14 rounded-[3rem] overflow-hidden shadow-premium-lg border border-[#8C51A5]/10 group"
                            data-aos="zoom-in">
                            <img src="{{ asset('storage/' . $extracurricular->image) }}" alt="{{ $extracurricular->name }}"
                                class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-[2s]"
                                onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($extracurricular->name) }}&background=8C51A5&color=fff&size=800'">
                        </figure>
                    @endif

                    {{-- Description Content --}}
                    <div class="prose prose-base md:prose-lg max-w-none mb-16
                                                prose-headings:text-[#612F73] prose-headings:font-black
                                                prose-h2:text-3xl prose-h2:mt-16 prose-h2:mb-8 prose-h2:tracking-tight prose-h2:uppercase
                                                prose-p:text-gray-500 prose-p:leading-relaxed prose-p:mb-8 prose-p:font-medium
                                                prose-a:text-[#8C51A5] prose-a:font-black prose-a:no-underline hover:prose-a:text-[#612F73] transition-colors
                                                prose-strong:text-[#612F73] prose-strong:font-black
                                                prose-ul:my-8 prose-li:text-gray-500 prose-li:mb-3 prose-li:font-medium
                                                prose-blockquote:border-l-4 prose-blockquote:border-[#8C51A5] prose-blockquote:bg-[#F0E7F8]/30 prose-blockquote:py-8 prose-blockquote:px-10 prose-blockquote:rounded-[2rem] prose-blockquote:italic prose-blockquote:text-gray-500 prose-blockquote:shadow-sm"
                        data-aos="fade-up">
                        {!! $extracurricular->description !!}
                    </div>

                    {{-- Schedule/Details Box if available --}}
                    {{-- You can add schedule or other fields here if they exist in the model --}}
                </article>

                {{-- Sidebar - 4 columns --}}
                <aside class="lg:col-span-4 space-y-8 md:space-y-12">


                    {{-- Other Extracurriculars --}}
                    <div class="bg-white border border-[#8C51A5]/10 rounded-[2.5rem] p-8 md:p-10 shadow-premium-lg"
                        data-aos="fade-left">
                        <h3
                            class="font-black text-[#612F73] text-xl mb-10 flex items-center gap-4 tracking-tight uppercase">
                            <i class="fas fa-users text-[#8C51A5]"></i>
                            Ekskul Lainnya
                        </h3>
                        <div class="space-y-8">
                            @foreach($relatedExtracurriculars as $index => $item)
                                <a href="{{ route('extracurricular.show', $item->slug) }}"
                                    class="group flex gap-6 pb-8 border-b border-gray-50 last:border-0 last:pb-0"
                                    data-aos="fade-left" data-aos-delay="{{ 100 + ($index * 100) }}">
                                    <div
                                        class="w-20 h-20 flex-shrink-0 rounded-[1.25rem] overflow-hidden bg-gray-50 border border-gray-100 group-hover:border-[#8C51A5]/30 transition-all duration-500">
                                        @if($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                                class="w-full h-full object-cover group-hover:scale-125 transition-transform duration-700">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-[#F0E7F8]">
                                                <i
                                                    class="fas fa-running text-[#8C51A5] group-hover:scale-125 transition-transform"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0 flex items-center">
                                        <h4
                                            class="font-black text-[#612F73] text-sm line-clamp-2 group-hover:text-[#8C51A5] transition-colors leading-snug tracking-tight uppercase">
                                            {{ $item->name }}
                                        </h4>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <a href="{{ route('extracurriculars') }}"
                            class="mt-10 block text-center py-5 bg-[#8C51A5]/10 text-[#8C51A5] font-black rounded-2xl hover:bg-[#8C51A5] hover:text-white transition-all duration-500 border border-[#8C51A5]/30 text-[10px] tracking-[0.2em] uppercase"
                            data-aos="fade-up" data-aos-delay="400">
                            JELAJAHI SEMUA
                        </a>
                    </div>

                    {{-- PPDB CTA --}}
                    @if(($settings['ppdb_active'] ?? false))
                        <div class="bg-gradient-to-br from-[#612F73] via-[#8C51A5] to-[#D668EA] rounded-[2.5rem] p-10 text-white relative overflow-hidden shadow-2xl group shadow-[#8C51A5]/20"
                            data-aos="fade-left" data-aos-delay="200">
                            <div
                                class="absolute top-0 right-0 w-48 h-48 bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-white/20 transition-all duration-700">
                            </div>
                            <div class="relative z-10">
                                <span
                                    class="text-[10px] font-black text-[#F0E7F8] tracking-[0.4em] uppercase mb-6 block">Bergabunglah</span>
                                <h3 class="font-black text-3xl mb-8 tracking-tight leading-tight uppercase">Salurkan Bakatmu
                                    Disini!
                                </h3>
                                <p class="text-white/80 text-sm mb-12 font-medium leading-relaxed">Daftarkan dirimu segera di
                                    {{ $settings['school_name'] ?? 'SMK YAJ' }} dan kembangkan potensimu bersama kami.
                                </p>
                                <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                                    class="inline-flex items-center gap-4 px-10 py-5 bg-gradient-to-r from-[#F8CB62] to-[#f5b82e] text-[#612F73] font-black rounded-2xl hover:shadow-golden transition-all w-full justify-center hover:-translate-y-1 transform uppercase text-xs tracking-widest">
                                    <i class="fas fa-user-plus text-xl"></i>
                                    DAFTAR SEKARANG
                                </a>
                            </div>
                        </div>
                    @endif

                </aside>
            </div>
        </div>
    </section>
@endsection