@extends('layouts.app')

@section('title', $news->title)

@section('content')
    {{-- Breadcrumb Navigation --}}
    <section class="pt-28 pb-8 bg-premium-dark relative overflow-hidden flex items-center">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <nav class="flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em]" data-aos="fade-down">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-[#8C51A5] transition-colors">
                    <i class="fas fa-home"></i>
                </a>
                <i class="fas fa-chevron-right text-[8px] text-gray-700"></i>
                <a href="{{ route('news') }}" class="text-gray-400 hover:text-[#8C51A5] transition-colors tracking-widest">BERITA</a>
                @if($news->category)
                    <i class="fas fa-chevron-right text-[8px] text-gray-700"></i>
                    <span class="text-[#F8CB62] font-black">{{ strtoupper($news->category) }}</span>
                @endif
            </nav>
        </div>
    </section>

    {{-- Article Content Section --}}
    <section class="py-16 bg-white relative">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-12">
                {{-- Main Content - 8 columns --}}
                <article class="lg:col-span-8">
                    {{-- Article Title --}}
                     <header class="mb-12" data-aos="fade-up">
                        @if($news->category)
                            <a href="{{ route('news') }}?category={{ $news->category }}"
                                class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#8C51A5]/10 text-[#8C51A5] text-[10px] font-black rounded-xl hover:bg-[#8C51A5] hover:text-white transition-all duration-500 mb-8 border border-[#8C51A5]/20 uppercase tracking-widest shadow-lg" data-aos="fade-down" data-aos-delay="200">
                                <i class="fas fa-bookmark text-[10px] text-[#F8CB62]"></i>
                                {{ $news->category }}
                            </a>
                        @endif
 
                        <h1 class="text-4xl md:text-5xl lg:text-7xl font-black text-[#612F73] leading-[1.1] mb-10 tracking-tight drop-shadow-sm uppercase" data-aos="zoom-in" data-aos-delay="400">
                            {{ $news->title }}
                        </h1>

                          {{-- Meta Info --}}
                        <div class="flex flex-wrap items-center gap-8 pb-10 border-b border-gray-100" data-aos="fade-up" data-aos-delay="600">
                            <div class="flex items-center gap-4 group" data-aos="fade-right" data-aos-delay="700">
                                <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center border border-[#8C51A5]/10 group-hover:bg-[#8C51A5] transition-colors duration-500 shadow-lg shadow-[#612F73]/5">
                                    <i class="fas fa-user text-[#8C51A5] group-hover:text-white transition-colors"></i>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Penulis</span>
                                    <span class="text-[#612F73] font-black text-sm">{{ $news->author ?? 'Admin' }}</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 group" data-aos="fade-right" data-aos-delay="800">
                                <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center border border-[#8C51A5]/10 group-hover:bg-[#8C51A5] transition-colors duration-500 shadow-lg shadow-[#612F73]/5">
                                    <i class="far fa-calendar-alt text-[#8C51A5] group-hover:text-white transition-colors"></i>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Terbit</span>
                                    <span class="text-[#612F73] font-black text-sm">{{ $news->published_at->format('d M Y') }}</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 group" data-aos="fade-right" data-aos-delay="900">
                                <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center border border-[#8C51A5]/10 group-hover:bg-[#F8CB62] transition-colors duration-500 shadow-lg shadow-[#F8CB62]/10">
                                    <i class="far fa-eye text-[#F8CB62] group-hover:text-white transition-colors"></i>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Dilihat</span>
                                    <span class="text-[#612F73] font-black text-sm">{{ number_format($news->views) }} Kali</span>
                                </div>
                            </div>
                        </div>
                    </header>

                     {{-- Featured Image --}}
                    @if($news->image)
                        <figure class="mb-14 rounded-[3rem] overflow-hidden shadow-premium-lg border border-[#8C51A5]/10 group" data-aos="zoom-in">
                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-[2s]"
                                onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($news->title) }}&background=8C51A5&color=fff&size=800'">
                        </figure>
                    @endif

                     {{-- Article Content --}}
                    <div
                        class="prose prose-base md:prose-lg max-w-none mb-16
                        prose-headings:text-[#612F73] prose-headings:font-black
                        prose-h2:text-3xl prose-h2:mt-16 prose-h2:mb-8 prose-h2:tracking-tight
                        prose-h3:text-2xl prose-h3:mt-12 prose-h3:mb-6 prose-h3:tracking-tight
                        prose-p:text-gray-500 prose-p:leading-relaxed prose-p:mb-8 prose-p:font-medium
                        prose-a:text-[#8C51A5] prose-a:font-black prose-a:no-underline hover:prose-a:text-[#612F73] transition-colors
                        prose-strong:text-[#612F73] prose-strong:font-black
                        prose-ul:my-8 prose-li:text-gray-500 prose-li:mb-3 prose-li:font-medium
                        prose-blockquote:border-l-4 prose-blockquote:border-[#8C51A5] prose-blockquote:bg-[#F0E7F8]/30 prose-blockquote:py-8 prose-blockquote:px-10 prose-blockquote:rounded-3xl prose-blockquote:italic prose-blockquote:text-gray-500 prose-blockquote:shadow-sm" data-aos="fade-up">
                        {!! $news->content !!}
                    </div>

                     {{-- Tags --}}
                    @if($news->tags)
                        <div class="mb-14 pb-12 border-b border-gray-100" data-aos="fade-up">
                            <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] mb-8">TAGS ARTIKEL</h4>
                            <div class="flex flex-wrap gap-4">
                                @foreach(explode(',', $news->tags) as $index => $tag)
                                    <span
                                        class="px-6 py-3 bg-[#F0E7F8]/50 text-[#8C51A5] text-[10px] font-black rounded-xl border border-[#8C51A5]/10 hover:bg-[#8C51A5] hover:text-white transition-all cursor-pointer uppercase tracking-widest shadow-sm" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 50) }}">
                                        #{{ trim($tag) }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                     {{-- Share Buttons --}}
                    <div class="bg-white border border-[#8C51A5]/10 rounded-[3rem] p-10 md:p-14 mb-14 relative overflow-hidden group shadow-premium-lg" data-aos="fade-up">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-[#8C51A5]/5 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2 group-hover:bg-[#8C51A5]/10 transition-colors duration-700"></div>
                        <h4 class="font-black text-[#612F73] text-2xl mb-10 tracking-tight flex items-center gap-4 relative z-10 uppercase">
                            <span class="w-12 h-12 bg-[#8C51A5] rounded-2xl flex items-center justify-center shadow-lg shadow-[#8C51A5]/20">
                                <i class="fas fa-share-alt text-[#F8CB62] text-sm"></i>
                            </span>
                            Bagikan Artikel Ini
                        </h4>
                        <div class="flex flex-wrap gap-4 relative z-10">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                target="_blank"
                                class="inline-flex items-center gap-3 px-8 py-4 bg-[#1877F2]/5 border border-[#1877F2]/10 text-[#1877F2] rounded-2xl hover:bg-[#1877F2] hover:text-white transition-all duration-500 font-black text-[10px] uppercase tracking-[0.2em] shadow-sm hover:shadow-lg hover:shadow-[#1877F2]/20" data-aos="fade-up" data-aos-delay="100">
                                <i class="fab fa-facebook-f text-sm"></i>
                                Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($news->title) }}"
                                target="_blank"
                                class="inline-flex items-center gap-3 px-8 py-4 bg-[#2A1424]/5 border border-[#2A1424]/10 text-[#2A1424] rounded-2xl hover:bg-[#2A1424] hover:text-white transition-all duration-500 font-black text-[10px] uppercase tracking-[0.2em] shadow-sm hover:shadow-lg hover:shadow-[#2A1424]/20" data-aos="fade-up" data-aos-delay="200">
                                <i class="fab fa-twitter text-sm"></i>
                                Twitter
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($news->title . ' ' . request()->url()) }}"
                                target="_blank"
                                class="inline-flex items-center gap-3 px-8 py-4 bg-[#25D366]/5 border border-[#25D366]/10 text-[#25D366] rounded-2xl hover:bg-[#25D366] hover:text-white transition-all duration-500 font-black text-[10px] uppercase tracking-[0.2em] shadow-sm hover:shadow-lg hover:shadow-[#25D366]/20" data-aos="fade-up" data-aos-delay="300">
                                <i class="fab fa-whatsapp text-sm"></i>
                                WhatsApp
                            </a>
                            <button onclick="copyToClipboard('{{ request()->url() }}')"
                                class="inline-flex items-center gap-3 px-8 py-4 bg-[#8C51A5]/5 border border-[#8C51A5]/10 text-[#8C51A5] rounded-2xl hover:bg-[#8C51A5] hover:text-white transition-all duration-500 font-black text-[10px] uppercase tracking-[0.2em] shadow-sm" data-aos="fade-up" data-aos-delay="400">
                                <i class="fas fa-link text-sm"></i>
                                Copy Link
                            </button>
                        </div>
                    </div>

                     {{-- Author Box --}}
                    <div class="bg-white border border-[#8C51A5]/10 rounded-[3rem] p-10 flex flex-col md:flex-row items-center gap-10 shadow-premium-lg group" data-aos="fade-up">
                        <div
                            class="w-28 h-28 bg-[#8C51A5] rounded-[2rem] flex items-center justify-center flex-shrink-0 shadow-2xl shadow-[#8C51A5]/20 transition-transform duration-700 group-hover:rotate-6">
                            <i class="fas fa-feather-alt text-4xl text-[#F8CB62]"></i>
                        </div>
                        <div class="text-center md:text-left">
                            <span class="text-[10px] font-black text-[#8C51A5] uppercase tracking-[0.3em] mb-2 block">DITULIS OLEH</span>
                            <h4 class="text-2xl font-black text-[#612F73] mb-4 tracking-tight">{{ $news->author ?? 'Redaksi Sekolah' }}</h4>
                            <p class="text-gray-500 text-sm leading-relaxed font-medium">Tim redaksi {{ $settings['school_name'] ?? 'SMK YAJ' }} yang
                                berdedikasi untuk menyajikan informasi edukatif, inspiratif, dan akurat seputar aktivitas sekolah.</p>
                        </div>
                    </div>
                </article>

                {{-- Sidebar - 4 columns --}}
                <aside class="lg:col-span-4 space-y-12">
                     {{-- Search Box --}}
                    <div class="bg-white border border-[#8C51A5]/10 rounded-[2.5rem] p-8 shadow-premium-lg" data-aos="fade-left">
                        <h3 class="font-black text-[#612F73] text-xl mb-8 flex items-center gap-3 tracking-tight">
                            <i class="fas fa-search text-[#8C51A5]"></i>
                            Cari Berita
                        </h3>
                        <form action="{{ route('news') }}" method="GET">
                            <div class="relative group">
                                <input type="text" name="search" placeholder="Cari artikel lainnya..."
                                    class="w-full px-6 py-5 bg-gray-50 border border-[#8C51A5]/5 rounded-2xl focus:ring-2 focus:ring-[#8C51A5] focus:border-transparent transition-all outline-none text-[#612F73] text-sm placeholder:text-gray-400 font-bold tracking-wide">
                                <button type="submit"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 w-12 h-12 bg-[#8C51A5] rounded-xl flex items-center justify-center text-white hover:bg-[#612F73] transition-all duration-300 shadow-lg shadow-[#8C51A5]/20">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                     {{-- Latest News --}}
                    <div class="bg-white border border-[#8C51A5]/10 rounded-[2.5rem] p-8 shadow-premium-lg" data-aos="fade-left" data-aos-delay="200">
                        <h3 class="font-black text-[#612F73] text-xl mb-8 flex items-center gap-3 tracking-tight">
                            <i class="fas fa-bolt text-[#8C51A5]"></i>
                            Berita Terbaru
                        </h3>
                        <div class="space-y-6">
                            @foreach($latestNews ?? $relatedNews as $index => $item)
                                <a href="{{ route('news.show', $item->slug) }}"
                                    class="group flex gap-5 pb-6 border-b border-gray-50 last:border-0 last:pb-0" data-aos="fade-left" data-aos-delay="{{ 300 + ($index * 100) }}">
                                    <div class="w-20 h-20 flex-shrink-0 rounded-2xl overflow-hidden bg-gray-50 border border-[#8C51A5]/10 group-hover:border-[#8C51A5]/50 transition-all duration-500">
                                        @if($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                                class="w-full h-full object-cover group-hover:scale-125 transition-transform duration-700">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-[#8C51A5]/10">
                                                <i class="fas fa-newspaper text-[#8C51A5] group-hover:scale-125 transition-transform"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-black text-[#612F73] text-sm line-clamp-2 group-hover:text-[#8C51A5] transition-colors mb-3 leading-snug tracking-tight uppercase">
                                            {{ $item->title }}
                                        </h4>
                                        <div class="flex items-center gap-2 text-[9px] font-black text-gray-400 uppercase tracking-widest">
                                            <i class="far fa-calendar-alt text-[#8C51A5]"></i>
                                            <span>{{ $item->published_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <a href="{{ route('news') }}"
                            class="mt-8 block text-center py-4 bg-[#8C51A5]/10 text-[#8C51A5] font-black rounded-2xl hover:bg-[#8C51A5] hover:text-white transition-all duration-500 border border-[#8C51A5]/30 text-[10px] tracking-[0.2em] uppercase" data-aos="fade-up" data-aos-delay="400">
                            LIHAT SEMUA
                        </a>
                    </div>

                     {{-- Categories --}}
                    <div class="bg-white border border-[#8C51A5]/10 rounded-[2.5rem] p-8 shadow-premium-lg" data-aos="fade-left" data-aos-delay="400">
                        <h3 class="font-black text-[#612F73] text-xl mb-8 flex items-center gap-3 tracking-tight uppercase">
                            <i class="fas fa-folder-open text-[#8C51A5]"></i>
                            Kategori Berita
                        </h3>
                        <div class="grid gap-3">
                            @php
                                $categories = [
                                    ['name' => 'Kegiatan', 'icon' => 'fa-calendar-alt', 'color' => '#8C51A5'],
                                    ['name' => 'Pengumuman', 'icon' => 'fa-bullhorn', 'color' => '#612F73'],
                                    ['name' => 'Prestasi', 'icon' => 'fa-trophy', 'color' => '#F8CB62'],
                                    ['name' => 'Workshop', 'icon' => 'fa-laptop-code', 'color' => '#8C51A5'],
                                    ['name' => 'Kunjungan', 'icon' => 'fa-bus', 'color' => '#D668EA'],
                                ];
                            @endphp
                            @foreach($categories as $index => $cat)
                                <a href="{{ route('news') }}?category={{ $cat['name'] }}"
                                    class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl border border-[#8C51A5]/5 hover:border-[#8C51A5]/30 hover:bg-[#F0E7F8]/50 transition-all group" data-aos="fade-left" data-aos-delay="{{ 500 + ($index * 100) }}">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center border border-gray-100 group-hover:bg-[#8C51A5] transition-all duration-500 shadow-sm">
                                            <i class="fas {{ $cat['icon'] }} text-[#8C51A5] group-hover:text-white transition-colors text-xs"></i>
                                        </div>
                                        <span class="font-black text-gray-500 group-hover:text-[#612F73] transition-colors text-[10px] tracking-widest uppercase">{{ $cat['name'] }}</span>
                                    </div>
                                    <i class="fas fa-chevron-right text-gray-400 group-hover:text-[#8C51A5] group-hover:translate-x-1 transition-all text-[8px]"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>

                     {{-- PPDB CTA --}}
                    @if(($settings['ppdb_active'] ?? false))
                       <div class="bg-gradient-to-br from-[#612F73] via-[#8C51A5] to-[#D668EA] rounded-[2.5rem] p-10 text-white relative overflow-hidden shadow-2xl group shadow-[#8C51A5]/20" data-aos="fade-left" data-aos-delay="600">
                            <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-white/20 transition-all duration-700"></div>
                            <div class="relative z-10">
                                <span class="text-[10px] font-black text-[#F0E7F8] tracking-[0.4em] uppercase mb-4 block">REGISTRATION</span>
                                <h3 class="font-black text-3xl mb-6 tracking-tight leading-tight uppercase">Penerimaan Siswa Baru</h3>
                                <p class="text-white/80 text-sm mb-10 font-medium leading-relaxed">Bergabunglah dengan komunitas pembelajar inovatif. Daftarkan diri Anda sekarang!</p>
                                <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                                    class="inline-flex items-center gap-4 px-10 py-5 bg-gradient-to-r from-[#F8CB62] to-[#f5b82e] text-[#612F73] font-black rounded-2xl hover:shadow-golden transition-all w-full justify-center hover:-translate-y-1 transform uppercase text-xs tracking-widest">
                                    <i class="fas fa-user-plus text-lg"></i>
                                    DAFTAR PPDB
                                </a>
                            </div>
                        </div>
                    @endif

                     {{-- Social Links --}}
                    <div class="bg-white border border-[#8C51A5]/10 rounded-2xl p-8 shadow-premium-lg">
                        <h3 class="font-black text-[#612F73] text-lg mb-6 flex items-center gap-3 uppercase tracking-tight">
                            <i class="fas fa-share-alt text-[#8C51A5]"></i>
                            Media Sosial
                        </h3>
                        <div class="flex flex-wrap gap-4">
                            @foreach($socialLinks ?? [] as $social)
                                @if(is_object($social))
                                    <a href="{{ $social->url }}" target="_blank"
                                        class="w-12 h-12 bg-gray-50 rounded-xl flex items-center justify-center text-gray-400 hover:bg-[#8C51A5] hover:text-white transition-all duration-300 hover:-translate-y-1 shadow-sm border border-gray-100 hover:border-[#8C51A5]">
                                        <i class="fab fa-{{ $social->platform }} text-lg"></i>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
            </div>
        </div>
    </section>

     {{-- Related News Section --}}
    @if(isset($relatedNews) && $relatedNews->count() > 0)
        <section class="py-24 bg-[#F0E7F8]/30 relative border-t border-[#8C51A5]/10 overflow-hidden">
            @include('partials.awards-shapes')
            <div class="container mx-auto px-4 lg:px-8 relative z-10">
                <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-16 gap-8">
                    <div>
                        <span class="text-[10px] font-black text-[#8C51A5] tracking-[0.4em] uppercase mb-4 block whitespace-nowrap">Explore More</span>
                        <h2 class="text-4xl md:text-5xl font-black text-[#612F73] tracking-tight uppercase">Artikel <span class="text-[#8C51A5]">Terkait</span></h2>
                    </div>
                    <a href="{{ route('news') }}"
                        class="inline-flex items-center gap-4 text-[#8C51A5] font-black text-[10px] tracking-widest uppercase hover:text-white transition-all bg-white px-8 py-4 rounded-2xl border border-[#8C51A5]/20 hover:bg-[#8C51A5] hover:-translate-y-1 transform whitespace-nowrap shadow-premium-lg">
                        LIHAT SEMUA BERITA
                        <i class="fas fa-arrow-right text-[8px]"></i>
                    </a>
                </div>

                 <div class="grid md:grid-cols-3 gap-10">
                    @foreach($relatedNews as $index => $related)
                        <a href="{{ route('news.show', $related->slug) }}"
                            class="group bg-white rounded-[3rem] overflow-hidden border border-[#8C51A5]/10 hover:border-[#8C51A5]/30 shadow-xl shadow-[#612F73]/5 hover:shadow-premium-lg transition-all duration-700 hover:-translate-y-3" data-aos="fade-up" data-aos-delay="{{ $index * 150 }}">
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
                                    <span
                                        class="absolute top-6 left-6 px-4 py-2 bg-[#8C51A5] text-white text-[10px] font-black rounded-xl shadow-xl shadow-[#8C51A5]/30 tracking-widest uppercase">
                                        {{ $related->category }}
                                    </span>
                                @endif
                            </div>
                            <div class="p-10">
                                <div class="flex items-center gap-4 text-[9px] font-black text-gray-400 uppercase tracking-widest mb-6">
                                    <span class="flex items-center gap-2"><i class="far fa-calendar-alt text-[#8C51A5]"></i> {{ $related->published_at->format('d M Y') }}</span>
                                    <span class="flex items-center gap-2"><i class="far fa-eye text-[#8C51A5]"></i> {{ number_format($related->views) }}</span>
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
            navigator.clipboard.writeText(text).then(function () {
                const toast = document.createElement('div');
                toast.className = 'fixed bottom-10 right-10 bg-[#8C51A5] text-white px-8 py-5 rounded-2xl shadow-premium-lg z-[100] animate-bounce font-black text-[10px] tracking-[0.2em] flex items-center gap-3 border border-white/20 uppercase';
                toast.innerHTML = '<i class="fas fa-check-circle text-lg text-[#F8CB62]"></i> Link Berhasil Disalin!';
                document.body.appendChild(toast);

                setTimeout(() => {
                    toast.classList.add('opacity-0', 'transition-all', 'duration-500', 'translate-y-10');
                    setTimeout(() => toast.remove(), 500);
                }, 3000);
            });
        }
    </script>
@endpush