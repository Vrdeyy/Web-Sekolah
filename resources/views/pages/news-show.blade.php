@extends('layouts.app')

@section('title', $news->title)

@section('content')
    {{-- PREMIUM HERO SECTION --}}
    <section class="relative pt-32 lg:pt-48 pb-12 lg:pb-32 overflow-hidden bg-premium-dark">
        {{-- Background Decorations --}}
        @include('partials.awards-shapes')
        
        {{-- Floating Elements --}}
        <div class="absolute top-1/4 right-0 text-[#8C51A5]/10 text-[20rem] font-black -rotate-12 pointer-events-none select-none animate-float-slow">
            <i class="fas fa-newspaper"></i>
        </div>

        <div class="container mx-auto px-6 lg:px-12 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                {{-- Left: Text Info --}}
                <div class="space-y-6 md:space-y-8" data-aos="fade-right">
                    {{-- Badge --}}
                    <div class="inline-flex items-center gap-3 px-6 py-2 bg-white/10 backdrop-blur-md rounded-full border border-white/20 shadow-premium-lg">
                        <i class="fas fa-bullhorn text-[#F8CB62] animate-pulse"></i>
                        <span class="text-white text-[10px] font-black uppercase tracking-[0.3em]">Berita & Informasi Terbaru</span>
                    </div>

                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-white leading-[1.1] tracking-tight uppercase">
                        {{ $news->title }}
                    </h1>

                    <div class="flex items-center gap-4 p-4 rounded-3xl bg-white/5 border border-white/10 backdrop-blur-sm max-w-fit">
                        <div class="w-12 h-12 bg-gradient-to-tr from-[#8C51A5] to-[#D668EA] rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-user-edit text-white"></i>
                        </div>
                        <div>
                            <div class="text-[#F8CB62] text-[10px] font-black uppercase tracking-widest">Penulis</div>
                            <div class="text-white font-bold text-lg">{{ $news->author ?? 'Admin' }}</div>
                        </div>
                    </div>

                    {{-- Breadcrumb (Light Version) --}}
                    <nav class="flex items-center gap-3 text-[10px] font-black uppercase tracking-widest text-gray-400">
                        <a href="{{ route('home') }}" class="hover:text-white transition-colors">HOME</a>
                        <i class="fas fa-chevron-right text-[8px]"></i>
                        <a href="{{ route('news') }}" class="hover:text-white transition-colors">BERITA</a>
                        @if($news->category)
                            <i class="fas fa-chevron-right text-[8px]"></i>
                            <span class="text-[#F8CB62]">{{ strtoupper($news->category) }}</span>
                        @endif
                    </nav>
                </div>

                {{-- Right: Featured Photo --}}
                <div class="relative" data-aos="zoom-in" data-aos-delay="200">
                    {{-- Decorative Ring --}}
                    <div class="absolute -inset-4 border-2 border-[#8C51A5]/20 rounded-[3rem] animate-spin-slow pointer-events-none"></div>
                    
                    <div class="relative aspect-video lg:aspect-[4/3] rounded-[2.5rem] overflow-hidden shadow-2xl border-4 border-white/10 group">
                        @if($news->image)
                            <img src="{{ asset('storage/' . $news->image) }}" 
                                 alt="{{ $news->title }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-[3s]"
                                 onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($news->title) }}&background=8C51A5&color=fff&size=800'">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-[#612F73] to-[#8C51A5] flex items-center justify-center">
                                <i class="fas fa-newspaper text-9xl text-white/10"></i>
                            </div>
                        @endif
                        
                        {{-- Image Overlay Gradient --}}
                        <div class="absolute inset-x-0 bottom-0 h-1/3 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- STATS & CONTENT SECTION --}}
    <section class="py-12 lg:py-24 bg-white relative">
        {{-- Floating Background Decoration --}}
        <div class="absolute inset-0 bg-[radial-gradient(#8C51A508_1px,transparent_1px)] bg-[size:40px_40px] opacity-50"></div>

        <div class="container mx-auto px-6 lg:px-12 relative z-10">
            <div class="grid lg:grid-cols-12 gap-12 lg:gap-20">
                
                {{-- Main Column --}}
                <div class="lg:col-span-8 space-y-16">
                    
                    {{-- Stats Grid (Info Bar) --}}
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6" data-aos="fade-up">
                        
                        {{-- Category --}}
                        <div class="group p-6 rounded-[2rem] bg-gradient-to-br from-purple-50 to-white border border-purple-100 hover:shadow-premium-lg transition-all">
                            <i class="fas fa-bookmark text-[#8C51A5] text-2xl mb-4 group-hover:scale-110 transition-transform"></i>
                            <div class="text-gray-400 text-[10px] font-black uppercase tracking-widest mb-1">Kategori</div>
                            <div class="text-[#612F73] font-black text-lg truncate">{{ $news->category ?? 'Umum' }}</div>
                        </div>

                        {{-- Date --}}
                        <div class="group p-6 rounded-[2rem] bg-gradient-to-br from-amber-50 to-white border border-amber-100 hover:shadow-premium-lg transition-all">
                            <i class="far fa-calendar-alt text-[#f5b82e] text-2xl mb-4 group-hover:scale-110 transition-transform"></i>
                            <div class="text-gray-400 text-[10px] font-black uppercase tracking-widest mb-1">Tanggal Terbit</div>
                            <div class="text-[#612F73] font-black text-lg leading-tight">{{ $news->published_at->format('d M Y') }}</div>
                        </div>

                        {{-- Views --}}
                        <div class="group p-6 rounded-[2rem] bg-gradient-to-br from-blue-50 to-white border border-blue-100 hover:shadow-premium-lg transition-all">
                            <i class="far fa-eye text-blue-500 text-2xl mb-4 group-hover:scale-110 transition-transform"></i>
                            <div class="text-gray-400 text-[10px] font-black uppercase tracking-widest mb-1">Dilihat</div>
                            <div class="text-[#612F73] font-black text-xl truncate">{{ number_format($news->views) }} Kali</div>
                        </div>

                        {{-- Share Count/Icon --}}
                        <div class="group p-6 rounded-[2rem] bg-gradient-to-br from-gray-50 to-white border border-gray-200 hover:shadow-premium-lg transition-all">
                            <i class="fas fa-share-alt text-gray-500 text-2xl mb-4 group-hover:scale-110 transition-transform"></i>
                            <div class="text-gray-400 text-[10px] font-black uppercase tracking-widest mb-1">Spread The Word</div>
                            <div class="text-[#612F73] font-black text-lg">Bagikan</div>
                        </div>
                    </div>

                    {{-- Description Content --}}
                    <div class="bg-[#F0E7F8]/20 rounded-[3rem] p-8 md:p-12 lg:p-16 border border-[#8C51A5]/5" data-aos="fade-up">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-1 bg-[#8C51A5] rounded-full"></div>
                            <h3 class="font-black text-[#612F73] text-xl uppercase tracking-widest">Isi Berita</h3>
                        </div>

                        <div class="prose prose-lg max-w-none 
                                    prose-p:text-gray-600 prose-p:leading-relaxed prose-p:mb-6
                                    prose-headings:text-[#612F73] prose-headings:font-black
                                    prose-strong:text-[#8C51A5] prose-strong:font-black
                                    prose-blockquote:italic prose-blockquote:bg-white prose-blockquote:p-10 prose-blockquote:rounded-3xl prose-blockquote:border-l-8 prose-blockquote:border-[#F8CB62]">
                            {!! $news->content !!}
                        </div>

                        {{-- Tags --}}
                        @if($news->tags)
                            <div class="mt-12 pt-12 border-t border-[#8C51A5]/10">
                                <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] mb-6">TAGS ARTIKEL</h4>
                                <div class="flex flex-wrap gap-3">
                                    @foreach(explode(',', $news->tags) as $tag)
                                        <span class="px-5 py-2.5 bg-white text-[#8C51A5] text-[10px] font-black rounded-xl border border-[#8C51A5]/10 hover:bg-[#8C51A5] hover:text-white transition-all cursor-pointer uppercase tracking-widest shadow-sm">
                                            #{{ trim($tag) }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- Share Buttons Section --}}
                    <div class="bg-premium-dark rounded-[3rem] p-10 md:p-14 relative overflow-hidden group shadow-premium-lg" data-aos="fade-up">
                        <div class="absolute -top-1/2 -left-1/2 w-full h-full bg-white/5 rotate-45 pointer-events-none"></div>
                        <h4 class="font-black text-white text-2xl mb-10 tracking-tight flex items-center gap-4 relative z-10 uppercase">
                            <div class="w-12 h-12 bg-[#8C51A5] rounded-2xl flex items-center justify-center shadow-lg shadow-[#8C51A5]/20">
                                <i class="fas fa-share-alt text-[#F8CB62] text-sm"></i>
                            </div>
                            Bagikan Artikel Ini
                        </h4>
                        <div class="flex flex-wrap gap-4 relative z-10">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank"
                                class="inline-flex items-center gap-3 px-8 py-4 bg-white/10 border border-white/20 text-white rounded-2xl hover:bg-[#1877F2] hover:border-transparent transition-all duration-500 font-black text-[10px] uppercase tracking-[0.2em] shadow-sm hover:shadow-lg">
                                <i class="fab fa-facebook-f text-sm"></i>
                                Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($news->title) }}" target="_blank"
                                class="inline-flex items-center gap-3 px-8 py-4 bg-white/10 border border-white/20 text-white rounded-2xl hover:bg-black hover:border-transparent transition-all duration-500 font-black text-[10px] uppercase tracking-[0.2em] shadow-sm hover:shadow-lg">
                                <i class="fab fa-x-twitter text-sm"></i>
                                Twitter
                            </a>
                            <a href="https://wa.me/?text={{ urlencode("📰 *" . $news->title . "*\n\nBaca selengkapnya di:\n" . request()->url()) }}" target="_blank"
                                class="inline-flex items-center gap-3 px-8 py-4 bg-white/10 border border-white/20 text-white rounded-2xl hover:bg-[#25D366] hover:border-transparent transition-all duration-500 font-black text-[10px] uppercase tracking-[0.2em] shadow-sm hover:shadow-lg">
                                <i class="fab fa-whatsapp text-sm"></i>
                                WhatsApp
                            </a>
                            <button onclick="copyToClipboard('{{ request()->url() }}')"
                                class="inline-flex items-center gap-3 px-8 py-4 bg-[#F8CB62] border border-transparent text-[#612F73] rounded-2xl hover:shadow-golden transition-all duration-500 font-black text-[10px] uppercase tracking-[0.2em]">
                                <i class="fas fa-link text-sm"></i>
                                Copy Link
                            </button>
                        </div>
                    </div>

                    {{-- Author Box --}}
                    <div class="bg-gray-50 border border-gray-100 rounded-[3rem] p-10 flex flex-col md:flex-row items-center gap-10 shadow-sm group" data-aos="fade-up">
                        <div class="w-28 h-28 bg-[#8C51A5] rounded-[2rem] flex items-center justify-center flex-shrink-0 shadow-2xl shadow-[#8C51A5]/20 transition-transform duration-700 group-hover:rotate-6">
                            <i class="fas fa-feather-alt text-4xl text-[#F8CB62]"></i>
                        </div>
                        <div class="text-center md:text-left">
                            <span class="text-[10px] font-black text-[#8C51A5] uppercase tracking-[0.3em] mb-2 block">DITULIS OLEH</span>
                            <h4 class="text-2xl font-black text-[#612F73] mb-4 tracking-tight uppercase">{{ $news->author ?? 'Redaksi Sekolah' }}</h4>
                            <p class="text-gray-500 text-sm leading-relaxed font-medium">Tim redaksi {{ $settings['school_name'] ?? 'Sekolah Kami' }} yang berdedikasi untuk menyajikan informasi edukatif, inspiratif, dan akurat seputar aktivitas sekolah.</p>
                        </div>
                    </div>
                </div>

                {{-- Sidebar --}}
                <aside class="lg:col-span-4 space-y-12">
                    
                    {{-- Related News Card --}}
                    <div class="sticky top-32">
                        <div class="bg-premium-dark rounded-[3rem] p-8 lg:p-10 shadow-premium-lg overflow-hidden relative">
                            {{-- Decorative Shine --}}
                            <div class="absolute -top-1/2 -left-1/2 w-full h-full bg-white/5 rotate-45 pointer-events-none"></div>

                            <h3 class="font-black text-white text-2xl mb-10 flex items-center gap-3 relative uppercase">
                                <i class="fas fa-bolt text-[#F8CB62]"></i>
                                Berita Terbaru
                            </h3>

                            <div class="space-y-8 relative">
                                @foreach($latestNews ?? $relatedNews as $index => $item)
                                    <a href="{{ route('news.show', $item->slug) }}" 
                                       class="group flex items-center gap-6"
                                       data-aos="fade-left" data-aos-delay="{{ 100 * $index }}">
                                        {{-- Image Thumb --}}
                                        <div class="w-20 h-20 flex-shrink-0 rounded-2xl overflow-hidden border-2 border-white/10 group-hover:border-[#F8CB62]/50 transition-all">
                                            @if($item->image)
                                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-125 transition-transform duration-500">
                                            @else
                                                <div class="w-full h-full bg-white/5 flex items-center justify-center">
                                                    <i class="fas fa-newspaper text-white/20"></i>
                                                </div>
                                            @endif
                                        </div>
                                        
                                        <div class="flex-1 min-w-0">
                                            <div class="text-[#F8CB62] font-black text-[9px] uppercase tracking-widest mb-1">{{ strtoupper($item->category ?? 'BERITA') }}</div>
                                            <h4 class="text-white font-bold text-sm line-clamp-2 leading-snug group-hover:text-[#F8CB62] transition-colors uppercase">{{ $item->title }}</h4>
                                        </div>
                                    </a>
                                @endforeach
                            </div>

                            <div class="mt-12 pt-8 border-t border-white/10">
                                <a href="{{ route('news') }}" 
                                   class="flex items-center justify-center gap-3 w-full py-5 bg-gradient-to-r from-[#F8CB62] to-[#f5b82e] text-[#612F73] font-black rounded-2xl shadow-xl hover:-translate-y-1 transition-all uppercase text-[10px] tracking-widest">
                                    Lihat Seluruh Berita
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        {{-- Search Box --}}
                        <div class="mt-8 p-8 rounded-[2.5rem] bg-gray-50 border border-gray-100">
                            <h4 class="font-black text-[#612F73] mb-6 flex items-center gap-2 uppercase">
                                <i class="fas fa-search text-[#8C51A5]"></i>
                                Cari Berita
                            </h4>
                            <form action="{{ route('news') }}" method="GET">
                                <div class="relative group">
                                    <input type="text" name="search" placeholder="Cari artikel..."
                                        class="w-full px-5 py-4 bg-white border border-[#8C51A5]/5 rounded-xl focus:ring-2 focus:ring-[#8C51A5] focus:border-transparent transition-all outline-none text-[#612F73] text-xs placeholder:text-gray-400 font-bold tracking-wide shadow-sm">
                                    <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 w-8 h-8 bg-[#8C51A5] rounded-lg flex items-center justify-center text-white hover:bg-[#612F73] transition-all duration-300">
                                        <i class="fas fa-search text-[10px]"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        {{-- Categories --}}
                        <div class="mt-8 p-8 rounded-[2.5rem] bg-gray-50 border border-gray-100">
                            <h4 class="font-black text-[#612F73] mb-6 flex items-center gap-2 uppercase">
                                <i class="fas fa-folder-open text-[#8C51A5]"></i>
                                Kategori
                            </h4>
                            <div class="space-y-3">
                                @php
                                    $categories = [
                                        ['name' => 'Kegiatan', 'icon' => 'fa-calendar-alt'],
                                        ['name' => 'Pengumuman', 'icon' => 'fa-bullhorn'],
                                        ['name' => 'Prestasi', 'icon' => 'fa-trophy'],
                                        ['name' => 'Workshop', 'icon' => 'fa-laptop-code'],
                                        ['name' => 'Kunjungan', 'icon' => 'fa-bus'],
                                    ];
                                @endphp
                                @foreach($categories as $cat)
                                    <a href="{{ route('news') }}?category={{ $cat['name'] }}" class="flex items-center justify-between p-4 bg-white rounded-2xl border border-transparent hover:border-[#8C51A5]/20 hover:shadow-sm transition-all group">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-gray-50 rounded-lg flex items-center justify-center group-hover:bg-[#8C51A5] transition-colors">
                                                <i class="fas {{ $cat['icon'] }} text-[#8C51A5] group-hover:text-white text-[10px]"></i>
                                            </div>
                                            <span class="text-[10px] font-black text-gray-500 group-hover:text-[#612F73] transition-colors uppercase tracking-widest">{{ $cat['name'] }}</span>
                                        </div>
                                        <i class="fas fa-chevron-right text-[8px] text-gray-300 group-hover:text-[#8C51A5] group-hover:translate-x-1 transition-all"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        {{-- Social Links --}}
                        @if(isset($socialLinks) && count($socialLinks) > 0)
                            <div class="mt-8 p-8 rounded-[2.5rem] bg-gray-50 border border-gray-100">
                                <h4 class="font-black text-[#612F73] mb-6 flex items-center gap-2 uppercase">
                                    <i class="fas fa-share-alt text-[#8C51A5]"></i>
                                    Media Sosial
                                </h4>
                                <div class="flex flex-wrap gap-4">
                                    @foreach($socialLinks as $social)
                                        @if(is_object($social))
                                            <a href="{{ $social->url }}" target="_blank"
                                                class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-gray-400 hover:bg-[#8C51A5] hover:text-white transition-all duration-300 hover:-translate-y-1 shadow-sm border border-gray-100 hover:border-[#8C51A5]">
                                                <i class="{{ $social->icon_class }} text-lg"></i>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- PPDB CTA --}}
                        @if(($settings['ppdb_active'] ?? false))
                            <div class="mt-8 bg-gradient-to-br from-[#612F73] via-[#8C51A5] to-[#D668EA] rounded-[2.5rem] p-10 text-white relative overflow-hidden group shadow-xl shadow-[#8C51A5]/20">
                                <div class="absolute -top-10 -right-10 w-32 h-32 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                                <div class="relative z-10">
                                    <div class="text-[9px] font-black uppercase tracking-[0.4em] text-[#F8CB62] mb-4">REGISTRATION</div>
                                    <h4 class="text-2xl font-black mb-6 leading-tight uppercase">Mulai Masa Depan Anda Sekarang!</h4>
                                    <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank" class="flex items-center justify-center gap-3 w-full py-5 bg-gradient-to-r from-[#F8CB62] to-[#f5b82e] text-[#612F73] font-black rounded-2xl hover:shadow-golden transition-all uppercase text-[10px] tracking-widest hover:-translate-y-1 transform">
                                        Daftar Online
                                        <i class="fas fa-user-plus"></i>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>

                </aside>
            </div>
        </div>
    </section>

    {{-- RELATED NEWS SECTION (BOTTOM) --}}
    @if(isset($relatedNews) && $relatedNews->count() > 0)
        <section class="py-24 bg-[#F0E7F8]/30 relative border-t border-[#8C51A5]/10 overflow-hidden">
            @include('partials.awards-shapes')
            <div class="container mx-auto px-6 lg:px-12 relative z-10">
                <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-16 gap-8">
                    <div>
                        <span class="text-[10px] font-black text-[#8C51A5] tracking-[0.4em] uppercase mb-4 block">Expand Horizons</span>
                        <h2 class="text-4xl md:text-5xl font-black text-[#612F73] tracking-tight uppercase">Artikel <span class="text-[#8C51A5]">Lainnya</span></h2>
                    </div>
                    <a href="{{ route('news') }}"
                        class="inline-flex items-center gap-4 text-[#8C51A5] font-black text-[10px] tracking-widest uppercase hover:text-white transition-all bg-white px-8 py-4 rounded-2xl border border-[#8C51A5]/20 hover:bg-[#8C51A5] hover:-translate-y-1 transform shadow-premium-lg">
                        LIHAT SEMUA BERITA
                        <i class="fas fa-arrow-right text-[8px]"></i>
                    </a>
                </div>

                <div class="grid md:grid-cols-3 gap-10">
                    @foreach($relatedNews as $index => $related)
                        <a href="{{ route('news.show', $related->slug) }}"
                            class="group bg-white rounded-[3rem] overflow-hidden border border-[#8C51A5]/10 hover:border-[#8C51A5]/30 shadow-xl shadow-[#612F73]/5 hover:shadow-premium-lg transition-all duration-700 hover:-translate-y-3" 
                            data-aos="fade-up" data-aos-delay="{{ $index * 150 }}">
                            <div class="relative h-64 overflow-hidden bg-gray-50">
                                @if($related->image)
                                    <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-[2s]">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-[#F0E7F8] to-white flex items-center justify-center">
                                        <i class="fas fa-newspaper text-6xl text-[#D668EA]/20"></i>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-[#612F73]/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                @if($related->category)
                                    <span class="absolute top-6 left-6 px-4 py-2 bg-[#8C51A5] text-white text-[10px] font-black rounded-xl shadow-xl shadow-[#8C51A5]/30 tracking-widest uppercase">
                                        {{ $related->category }}
                                    </span>
                                @endif
                            </div>
                            <div class="p-10">
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center gap-4 text-[9px] font-black text-gray-400 uppercase tracking-widest">
                                        <span class="flex items-center gap-2"><i class="far fa-calendar-alt text-[#8C51A5]"></i> {{ $related->published_at->format('d M Y') }}</span>
                                        <span class="flex items-center gap-2"><i class="far fa-eye text-[#8C51A5]"></i> {{ number_format($related->views) }}</span>
                                    </div>
                                    <div class="inline-flex items-center gap-2 text-[#8C51A5] font-black text-[9px] uppercase tracking-widest group-hover:text-[#612F73] transition-all">
                                        DETAIL
                                        <svg class="w-3 h-3 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </div>
                                </div>
                                <h3 class="text-xl font-black text-[#612F73] line-clamp-2 group-hover:text-[#8C51A5] transition-colors leading-[1.3] tracking-tight uppercase">
                                    {{ $related->title }}
                                </h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection

@push('scripts')
    <script>
         function copyToClipboard(text) {
            const showToast = () => {
                const toast = document.createElement('div');
                toast.className = 'fixed bottom-10 right-10 z-[100] flex flex-col pointer-events-none group';
                toast.innerHTML = `
                    <div class="bg-[#612F73]/90 backdrop-blur-xl text-white px-8 py-6 rounded-[2rem] shadow-[0_20px_50px_rgba(97,47,115,0.4)] border border-white/20 flex items-center gap-5 translate-y-20 opacity-0 transition-all duration-700 ease-out" id="copy-toast-content">
                        <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center shadow-inner">
                            <i class="fas fa-check text-[#F8CB62] text-xl"></i>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[10px] font-black text-[#F8CB62] uppercase tracking-[0.3em] mb-1">Berhasil</span>
                            <span class="font-black text-sm uppercase tracking-widest whitespace-nowrap">Link Berita Disalin</span>
                        </div>
                        <div class="absolute bottom-0 left-8 right-8 h-1 bg-white/10 rounded-full overflow-hidden">
                            <div class="h-full bg-[#F8CB62] w-full" id="toast-progress"></div>
                        </div>
                    </div>
                `;
                document.body.appendChild(toast);
                
                const content = document.getElementById('copy-toast-content');
                const progress = document.getElementById('toast-progress');
                
                setTimeout(() => {
                    content.classList.remove('translate-y-20', 'opacity-0');
                    content.classList.add('translate-y-0', 'opacity-100');
                }, 100);

                setTimeout(() => {
                    content.classList.remove('translate-y-0', 'opacity-100');
                    content.classList.add('translate-y-20', 'opacity-0');
                    setTimeout(() => toast.remove(), 700);
                }, 3000);
            };

            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(text).then(showToast);
            } else {
                const textArea = document.createElement("textarea");
                textArea.value = text;
                textArea.style.position = "fixed";
                textArea.style.left = "-999999px";
                textArea.style.top = "-999999px";
                document.body.appendChild(textArea);
                textArea.focus();
                textArea.select();
                try {
                    if (document.execCommand('copy')) showToast();
                } catch (err) {
                    console.error('Fallback copy failed', err);
                }
                document.body.removeChild(textArea);
            }
        }
    </script>
@endpush