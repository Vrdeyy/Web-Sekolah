@extends('layouts.app')

@section('title', $major->name)

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-premium-dark relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            {{-- Breadcrumb --}}
            <nav class="flex flex-wrap items-center gap-2 text-xs md:text-sm mb-8 font-bold uppercase tracking-widest" data-aos="fade-down">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-[#8C51A5] transition-colors">
                    <i class="fas fa-home"></i>
                </a>
                <i class="fas fa-chevron-right text-[10px] text-gray-700"></i>
                <a href="{{ route('majors') }}" class="text-gray-400 hover:text-[#8C51A5] transition-colors">JURUSAN</a>
                <i class="fas fa-chevron-right text-[10px] text-gray-700"></i>
                <span class="text-[#F8CB62] line-clamp-1 break-all">{{ strtoupper($major->short_name ?? $major->name) }}</span>
            </nav>

            <div class="max-w-4xl" data-aos="fade-up">
                @if($major->short_name)
                    <div
                        class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#8C51A5]/25 backdrop-blur-md text-[#F0E7F8] font-black rounded-xl mb-6 border border-[#8C51A5]/30 shadow-lg uppercase tracking-wider text-xs" data-aos="fade-right" data-aos-delay="200">
                        <i class="fas fa-graduation-cap text-[#F8CB62]"></i>
                        {{ $major->short_name }}
                    </div>
                @endif
                <h1 class="text-3xl md:text-5xl lg:text-7xl font-black text-white mb-6 tracking-wide drop-shadow-lg leading-tight" data-aos="zoom-in" data-aos-delay="400">
                    {{ $major->name }}
                </h1>
                @if($major->short_description)
                    <p class="text-gray-300 text-lg md:text-xl leading-relaxed max-w-3xl font-medium" data-aos="fade-up" data-aos-delay="600">
                        {{ $major->short_description }}
                    </p>
                @endif
            </div>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="py-12 md:py-16 bg-[#F0E7F8]/30 relative">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-8 md:gap-12">
                {{-- Main Content --}}
                <div class="lg:col-span-2 space-y-16">
                    {{-- Featured Image --}}
                    @if($major->image)
                        <div class="rounded-[3rem] overflow-hidden shadow-premium-lg border border-[#8C51A5]/10 group" data-aos="zoom-in">
                            <img src="{{ asset('storage/' . $major->image) }}" alt="{{ $major->name }}" class="w-full h-auto group-hover:scale-105 transition-transform duration-1000">
                        </div>
                    @endif

                    {{-- Description --}}
                    @if($major->description)
                        <div class="bg-white rounded-3xl md:rounded-[3rem] p-6 md:p-10 lg:p-12 border border-[#8C51A5]/10 shadow-premium-lg transition-all" data-aos="fade-up">
                            <h2 class="text-2xl md:text-3xl font-black text-[#612F73] mb-6 md:mb-8 flex items-center gap-4 tracking-tight">
                                <span class="w-10 h-10 md:w-12 md:h-12 bg-[#8C51A5] rounded-2xl flex items-center justify-center shadow-lg shadow-[#8C51A5]/20 transition-transform hover:rotate-12">
                                    <i class="fas fa-info-circle text-white"></i>
                                </span>
                                Tentang Program
                            </h2>
                            <div class="prose prose-base md:prose-lg max-w-none
                                prose-headings:text-[#612F73] prose-headings:font-black
                                prose-p:text-gray-500 prose-p:leading-relaxed prose-p:font-medium
                                prose-strong:text-[#8C51A5] prose-strong:font-black
                                prose-ul:my-6 prose-li:text-gray-500 prose-li:font-medium
                                prose-a:text-[#8C51A5] hover:prose-a:text-[#612F73] transition-colors duration-300">
                                {!! $major->description !!}
                            </div>
                        </div>
                    @endif

                    {{-- Career Prospects --}}
                    @if($major->career_prospects)
                        <div class="bg-white/50 backdrop-blur-sm rounded-3xl md:rounded-[3rem] p-6 md:p-10 lg:p-12 border border-[#8C51A5]/10 shadow-premium-lg relative overflow-hidden group" data-aos="fade-up">
                           <div class="absolute top-0 right-0 w-64 h-64 bg-[#8C51A5]/5 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2 group-hover:bg-[#8C51A5]/10 transition-colors duration-700"></div>
                            <h2 class="text-2xl md:text-3xl font-black text-[#612F73] mb-6 md:mb-8 flex items-center gap-4 tracking-tight relative z-10">
                                <span class="w-10 h-10 md:w-12 md:h-12 bg-[#F8CB62] rounded-2xl flex items-center justify-center shadow-lg shadow-[#F8CB62]/20">
                                    <i class="fas fa-briefcase text-[#612F73]"></i>
                                </span>
                                Prospek Karir
                            </h2>
                            <div class="prose prose-base md:prose-lg max-w-none prose-p:text-gray-500 prose-li:text-gray-500 relative z-10 font-medium prose-strong:text-[#612F73]">
                                {!! $major->career_prospects !!}
                            </div>
                        </div>
                    @endif

                    {{-- Competencies --}}
                    @if($major->competencies)
                        <div class="bg-[#D668EA]/5 backdrop-blur-sm rounded-3xl md:rounded-[3rem] p-6 md:p-10 lg:p-12 border border-[#D668EA]/10 shadow-premium-lg relative overflow-hidden group" data-aos="fade-up">
                            <div class="absolute top-0 right-0 w-64 h-64 bg-[#D668EA]/5 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2 group-hover:bg-[#D668EA]/10 transition-colors duration-700"></div>
                            <h2 class="text-2xl md:text-3xl font-black text-[#612F73] mb-6 md:mb-8 flex items-center gap-4 tracking-tight relative z-10">
                                <span class="w-10 h-10 md:w-12 md:h-12 bg-[#8C51A5] rounded-2xl flex items-center justify-center shadow-lg shadow-[#8C51A5]/20">
                                    <i class="fas fa-cogs text-white"></i>
                                </span>
                                Kompetensi Keahlian
                            </h2>
                            <div class="prose prose-base md:prose-lg max-w-none prose-p:text-gray-500 prose-li:text-gray-500 relative z-10 font-medium prose-strong:text-[#612F73]">
                                {!! $major->competencies !!}
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Sidebar --}}
                <div class="space-y-8 md:space-y-10">
                    {{-- Quick Info Card --}}
                    <div class="bg-white border border-[#8C51A5]/10 rounded-3xl md:rounded-[2.5rem] p-6 md:p-8 shadow-premium-lg" data-aos="fade-left">
                        <h3 class="font-black text-[#612F73] text-xl mb-8 flex items-center gap-3 tracking-tight">
                            <i class="fas fa-info-circle text-[#8C51A5]"></i>
                            Informasi Program
                        </h3>
                        <ul class="space-y-6">
                            <li class="flex items-center gap-5 pb-6 border-b border-gray-50 group" data-aos="fade-left" data-aos-delay="100">
                                <div class="w-14 h-14 bg-[#8C51A5]/10 rounded-2xl flex items-center justify-center group-hover:bg-[#8C51A5] transition-all duration-300 shadow-lg shadow-[#8C51A5]/10">
                                    <i class="fas fa-clock text-[#8C51A5] group-hover:text-white transition-colors"></i>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Durasi</span>
                                    <span class="font-black text-[#612F73] tracking-wide">3 TAHUN</span>
                                </div>
                            </li>
                            <li class="flex items-center gap-5 pb-6 border-b border-gray-50 group" data-aos="fade-left" data-aos-delay="200">
                                <div class="w-14 h-14 bg-[#D668EA]/10 rounded-2xl flex items-center justify-center group-hover:bg-[#D668EA] transition-all duration-300 shadow-lg shadow-[#D668EA]/10">
                                    <i class="fas fa-certificate text-[#D668EA] group-hover:text-white transition-colors"></i>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Sertifikasi</span>
                                    <span class="font-black text-[#612F73] tracking-wide">INTERNASIONAL</span>
                                </div>
                            </li>
                            <li class="flex items-center gap-5 group" data-aos="fade-left" data-aos-delay="300">
                                <div class="w-14 h-14 bg-[#F8CB62]/10 rounded-2xl flex items-center justify-center group-hover:bg-[#F8CB62] transition-all duration-300 shadow-lg shadow-[#F8CB62]/10">
                                    <i class="fas fa-building text-[#F8CB62] group-hover:text-[#612F73] transition-colors"></i>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Praktek Industri</span>
                                    <span class="font-black text-[#612F73] tracking-wide">6 BULAN</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    {{-- CTA Card --}}
                    @if(($settings['ppdb_active'] ?? false))
                        <div
                            class="bg-gradient-to-br from-[#612F73] via-[#8C51A5] to-[#D668EA] rounded-[2.5rem] p-8 text-white relative overflow-hidden shadow-premium-lg group" data-aos="fade-left" data-aos-delay="200">
                            <div
                                class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-white/20 transition-all duration-700">
                            </div>
                            <div class="relative z-10 text-center">
                                <h3 class="font-black text-2xl mb-4 tracking-tight leading-tight">Tertarik Program Ini?</h3>
                                <p class="text-white/70 text-sm mb-8 font-medium leading-relaxed">Daftarkan diri Anda sekarang untuk bergabung dengan
                                    program {{ $major->short_name ?? $major->name }}!</p>
                                <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                                    class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-[#F8CB62] to-[#f5b82e] text-[#612F73] font-black rounded-2xl hover:shadow-golden transition-all shadow-xl w-full justify-center hover:-translate-y-1 transform">
                                    <i class="fas fa-user-plus"></i>
                                    DAFTAR SEKARANG
                                </a>
                            </div>
                        </div>
                    @endif

                    {{-- Other Majors --}}
                    <div class="bg-white border border-[#8C51A5]/10 rounded-[2.5rem] p-8 shadow-premium-lg">
                        <h3 class="font-black text-[#612F73] text-xl mb-8 flex items-center gap-3 tracking-tight">
                            <i class="fas fa-list text-[#8C51A5]"></i>
                            Program Lainnya
                        </h3>
                        <div class="space-y-4">
                            @foreach(\App\Models\Major::active()->where('id', '!=', $major->id)->ordered()->take(5)->get() as $otherMajor)
                                <a href="{{ route('major.show', $otherMajor->slug) }}"
                                    class="flex items-center gap-4 p-4 rounded-2xl hover:bg-[#F0E7F8]/50 border border-transparent hover:border-[#8C51A5]/10 transition-all group">
                                    <div
                                        class="w-12 h-12 bg-[#8C51A5]/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-[#8C51A5] transition-colors duration-500">
                                        @if($otherMajor->icon)
                                            <img src="{{ asset('storage/' . $otherMajor->icon) }}"
                                                alt="{{ $otherMajor->short_name }}" class="w-6 h-6 group-hover:brightness-0 group-hover:invert transition-all">
                                        @else
                                            <i class="fas fa-graduation-cap text-[#8C51A5] group-hover:text-white transition-colors"></i>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p
                                            class="font-black text-[#612F73] text-sm truncate group-hover:text-[#8C51A5] transition-colors tracking-tight uppercase">
                                            {{ $otherMajor->name }}
                                        </p>
                                        @if($otherMajor->short_name)
                                            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mt-1">{{ $otherMajor->short_name }}</p>
                                        @endif
                                    </div>
                                    <i
                                        class="fas fa-chevron-right text-gray-300 group-hover:text-[#8C51A5] group-hover:translate-x-1 transition-all"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Related News --}}
    @php
        $relatedNews = \App\Models\News::active()->published()->latest()->take(3)->get();
    @endphp
    @if($relatedNews->count() > 0)
        <section class="py-24 bg-white relative border-t border-gray-50">
            <div class="container mx-auto px-4 lg:px-8">
                <div class="flex items-center justify-between mb-12">
                    <h2 class="text-3xl font-black text-[#612F73] flex items-center gap-4 tracking-tight">
                        <span class="w-12 h-12 bg-[#8C51A5] rounded-2xl flex items-center justify-center shadow-lg shadow-[#8C51A5]/30">
                            <i class="fas fa-newspaper text-white"></i>
                        </span>
                        Berita Terkait
                    </h2>
                    <a href="{{ route('news') }}" class="text-[#8C51A5] font-black text-[10px] tracking-widest uppercase hover:text-[#612F73] transition-all bg-[#F0E7F8]/50 px-6 py-3 rounded-xl border border-[#8C51A5]/10">
                        LIHAT SEMUA <i class="fas fa-arrow-right ml-2 text-[#F8CB62]"></i>
                    </a>
                </div>

                <div class="grid md:grid-cols-3 gap-10">
                    @foreach($relatedNews as $index => $news)
                        <a href="{{ route('news.show', $news->slug) }}"
                            class="group bg-white rounded-[2.5rem] overflow-hidden border border-[#8C51A5]/10 shadow-premium-lg hover:border-[#8C51A5]/30 transition-all duration-500 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $index * 150 }}">
                            <div class="relative h-56 overflow-hidden bg-gray-100">
                                @if($news->image)
                                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-purple-100 to-white flex items-center justify-center">
                                        <i class="fas fa-newspaper text-5xl text-purple-200"></i>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-[#2A1424]/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            </div>
                             <div class="p-8">
                                <span class="text-[10px] font-black text-[#8C51A5] uppercase tracking-widest mb-4 block">{{ $news->published_at->format('d M Y') }}</span>
                                <h3 class="text-xl font-black text-[#612F73] line-clamp-2 group-hover:text-[#8C51A5] transition-colors leading-tight tracking-tight">
                                    {{ $news->title }}
                                </h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection