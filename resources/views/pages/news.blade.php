@extends('layouts.app')

@section('title', 'Berita & Artikel')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-premium-dark relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto" data-aos="fade-up">
                <div
                    class="inline-flex items-center gap-2 px-6 py-3 bg-[#8C51A5]/20 backdrop-blur-md rounded-xl text-[#F0E7F8] text-[10px] font-black mb-6 border border-[#8C51A5]/30 shadow-lg uppercase tracking-widest" data-aos="fade-down" data-aos-delay="200">
                    <i class="fas fa-newspaper text-[#F8CB62] animate-bounce"></i>
                    <span>BERITA & ARTIKEL</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-black text-white mb-6 tracking-tight" data-aos="zoom-in" data-aos-delay="400">
                    Berita <span class="text-[#F8CB62] bg-gradient-to-r from-[#F8CB62] to-[#D668EA] bg-clip-text text-transparent">Terkini</span>
                </h1>
                <p class="text-gray-400 text-lg md:text-xl leading-relaxed font-medium" data-aos="fade-up" data-aos-delay="600">
                    Informasi terbaru seputar kegiatan, prestasi, dan perkembangan dinamika di
                    {{ $settings['school_name'] ?? 'SMK YAJ' }}.
                </p>
            </div>
        </div>
    </section>

    {{-- Category Filter Pills --}}
    <section class="py-10 bg-white border-b border-gray-100">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-wrap items-center justify-center gap-3" data-aos="fade-up">
                <a href="{{ route('news') }}"
                    class="px-6 py-3 rounded-xl font-black text-[10px] tracking-widest transition-all duration-300 shadow-sm uppercase {{ !request('category') ? 'bg-[#8C51A5] text-white shadow-lg shadow-[#8C51A5]/30' : 'bg-gray-50 text-gray-400 hover:bg-[#8C51A5]/10 hover:text-[#8C51A5]' }}">
                    SEMUA
                </a>
                @php
                    $categories = ['Kegiatan', 'Pengumuman', 'Prestasi', 'Workshop', 'Kunjungan'];
                @endphp
                @foreach($categories as $index => $cat)
                    <a href="{{ route('news') }}?category={{ $cat }}"
                        class="px-6 py-3 rounded-xl font-black text-[10px] tracking-widest transition-all duration-300 shadow-sm uppercase {{ request('category') == $cat ? 'bg-[#8C51A5] text-white shadow-lg shadow-[#8C51A5]/30' : 'bg-gray-50 text-gray-400 hover:bg-[#8C51A5]/10 hover:text-[#8C51A5]' }}" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 50) }}">
                        {{ strtoupper($cat) }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Floating Search Bar (Only Search is Fixed/Sticky) --}}
     <section id="search-section" 
        class="py-4 transition-all duration-300 z-40 
               sticky top-20 bg-white/90 backdrop-blur-md border-b border-[#F0E7F8] shadow-sm
               md:bg-transparent md:border-none md:shadow-none md:container md:mx-auto md:px-4 lg:px-8
               fixed inset-x-0 top-16 md:relative md:top-0">
        
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex justify-center md:justify-end">
                {{-- Search Box --}}
                <form action="{{ route('news') }}" method="GET" 
                    class="relative group w-full md:w-auto max-w-lg">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Apa yang ingin Anda baca?"
                        class="pl-6 pr-14 py-4 bg-white md:bg-gray-50 border border-[#8C51A5]/10 rounded-2xl text-[#612F73] font-medium placeholder-gray-400 
                               focus:ring-2 focus:ring-[#8C51A5] focus:border-[#8C51A5] w-full md:w-96 
                               transition-all outline-none shadow-lg shadow-[#612F73]/5 group-hover:shadow-premium-lg">
                    <button type="submit"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 group-hover:text-[#8C51A5] transition-colors">
                        <i class="fas fa-search text-lg"></i>
                    </button>
                    
                    @if(request('search'))
                        <a href="{{ route('news') }}" 
                           class="absolute -bottom-6 left-0 text-[10px] font-black text-[#8C51A5] uppercase tracking-widest flex items-center gap-1 hover:underline">
                           <i class="fas fa-times-circle text-[#F8CB62]"></i> Hapus Pencarian
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </section>

    <style>
        @media (max-width: 768px) {
            #search-section {
                padding-top: 1rem;
                padding-bottom: 1rem;
                background: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(12px);
                border-bottom: 1px solid rgba(147, 47, 128, 0.1);
            }
        }
    </style>

    {{-- Featured News (Latest) --}}
    @if($news->count() > 0 && $news->first())
        @php $featured = $news->first(); @endphp
        <section class="py-16 bg-white relative">
            <div class="container mx-auto px-4 lg:px-8">
                 <div class="mb-12">
                    <h2 class="text-2xl md:text-3xl font-black text-[#612F73] flex items-center gap-4 tracking-tight">
                        <span class="w-12 h-12 bg-[#8C51A5] rounded-2xl flex items-center justify-center shadow-lg shadow-[#8C51A5]/30 transition-transform hover:rotate-12">
                            <i class="fas fa-star text-[#F8CB62]"></i>
                        </span>
                        Berita Utama
                    </h2>
                </div>

                 <a href="{{ route('news.show', $featured->slug) }}"
                    class="group block relative overflow-hidden rounded-[3rem] shadow-premium-lg hover:shadow-[#8C51A5]/20 transition-all duration-700 border border-[#8C51A5]/10" data-aos="zoom-in">
                    {{-- Background Image --}}
                    <div class="relative h-[550px] lg:h-[600px]">
                        @if($featured->image)
                            <img src="{{ asset('storage/' . $featured->image) }}" alt="{{ $featured->title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-[3s]">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-[#612F73] via-[#8C51A5] to-[#D668EA]"></div>
                        @endif
 
                        {{-- Gradient Overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-[#612F73] via-[#612F73]/40 to-transparent"></div>
 
                        {{-- Content --}}
                        <div class="absolute bottom-0 left-0 right-0 p-10 lg:p-16" data-aos="fade-up" data-aos-delay="400">
                            <div class="max-w-4xl">
                                @if($featured->category)
                                    <span
                                        class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#F8CB62] text-[#612F73] text-[10px] font-black rounded-xl mb-6 shadow-lg tracking-widest uppercase">
                                        <i class="fas fa-folder"></i>
                                        {{ $featured->category }}
                                    </span>
                                @endif
 
                                <h3
                                    class="text-4xl lg:text-6xl font-black text-white mb-6 group-hover:text-[#F8CB62] transition-colors leading-[1.1] tracking-tight">
                                    {{ $featured->title }}
                                </h3>
 
                                <p class="text-white/80 text-lg lg:text-xl mb-10 line-clamp-2 leading-relaxed font-medium">
                                    {{ $featured->excerpt }}
                                </p>
 
                                <div class="flex flex-wrap items-center gap-8 text-[10px] font-black uppercase tracking-widest">
                                    <span class="flex items-center gap-3 text-white/60">
                                        <i class="far fa-calendar text-[#F8CB62]"></i>
                                        {{ $featured->published_at->format('d M Y') }}
                                    </span>
                                    <span class="flex items-center gap-3 text-white/60">
                                        <i class="far fa-user text-[#F8CB62]"></i>
                                        {{ $featured->author ?? 'Admin' }}
                                    </span>
                                    <span class="flex items-center gap-3 text-white/60">
                                        <i class="far fa-eye text-[#F8CB62]"></i>
                                        {{ number_format($featured->views) }} VIEWS
                                    </span>
                                    <span
                                        class="inline-flex items-center gap-4 text-[#F8CB62] font-black group-hover:gap-6 transition-all ml-auto bg-white/10 backdrop-blur-md px-8 py-4 rounded-2xl border border-white/20 hover:bg-[#F8CB62] hover:text-[#612F73]">
                                        BACA SELENGKAPNYA
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </section>
    @endif

    {{-- News Grid --}}
    <section class="py-20 bg-[#F0E7F8]/30 relative">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
                <h2 class="text-2xl md:text-3xl font-black text-[#612F73] flex items-center gap-4 tracking-tight">
                    <span class="w-12 h-12 bg-[#8C51A5] rounded-2xl flex items-center justify-center shadow-lg shadow-[#8C51A5]/20">
                        <i class="fas fa-list text-white"></i>
                    </span>
                    Jelajahi Berita
                </h2>
                <div class="px-6 py-3 bg-white border border-[#8C51A5]/10 rounded-2xl text-gray-400 font-black text-[10px] tracking-widest uppercase shadow-sm">
                    TERDAPAT {{ $news->total() ?? $news->count() }} ARTIKEL DITEMUKAN
                </div>
            </div>

             @if($news->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @foreach($news->skip(1) as $index => $item)
                        <article
                            class="group bg-white rounded-[2.5rem] overflow-hidden border border-[#8C51A5]/10 shadow-xl shadow-[#612F73]/5 hover:shadow-premium-lg hover:border-[#8C51A5]/30 transition-all duration-700 hover:-translate-y-3" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 150 }}">
                            {{-- Thumbnail --}}
                            <a href="{{ route('news.show', $item->slug) }}" class="block relative h-64 overflow-hidden">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-[#F0E7F8] to-white flex items-center justify-center">
                                        <i class="fas fa-newspaper text-6xl text-[#D668EA]/20"></i>
                                    </div>
                                @endif
 
                                {{-- Category Badge --}}
                                @if($item->category)
                                    <div class="absolute top-6 left-6">
                                        <span
                                            class="px-4 py-2 bg-white/90 backdrop-blur-md text-[#8C51A5] text-[10px] font-black rounded-xl shadow-lg border border-[#8C51A5]/10 tracking-widest uppercase">
                                            {{ $item->category }}
                                        </span>
                                    </div>
                                @endif
 
                                {{-- Date Badge --}}
                                <div class="absolute top-6 right-6">
                                    <div
                                        class="w-14 h-14 bg-[#8C51A5] rounded-2xl flex flex-col items-center justify-center text-white shadow-lg shadow-[#8C51A5]/30">
                                        <span class="text-xl font-black leading-none">{{ $item->published_at->format('d') }}</span>
                                        <span class="text-[9px] font-black uppercase tracking-widest mt-1">{{ $item->published_at->format('M') }}</span>
                                    </div>
                                </div>
                            </a>

                             {{-- Content --}}
                            <div class="p-8 md:p-10">
                                <a href="{{ route('news.show', $item->slug) }}">
                                    <h3
                                        class="text-xl font-black text-[#612F73] mb-4 line-clamp-2 group-hover:text-[#8C51A5] transition-colors leading-tight tracking-tight uppercase">
                                        {{ $item->title }}
                                    </h3>
                                </a>
 
                                <p class="text-gray-500 text-sm mb-8 line-clamp-3 leading-relaxed font-medium">
                                    {{ $item->excerpt }}
                                </p>
 
                                {{-- Meta --}}
                                <div class="flex items-center justify-between pt-6 border-t border-gray-50">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 bg-[#8C51A5]/10 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-user text-[#8C51A5] text-[10px]"></i>
                                        </div>
                                        <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest">{{ $item->author ?? 'Admin' }}</span>
                                    </div>
                                    <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest flex items-center gap-2">
                                        <i class="far fa-eye text-[#8C51A5]"></i>{{ number_format($item->views) }}
                                    </span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-16">
                    {{ $news->links() }}
                </div>
             @else
                {{-- Empty State --}}
                <div class="text-center py-32 bg-white rounded-[3rem] border border-[#8C51A5]/10 shadow-premium-lg">
                    <div class="w-24 h-24 bg-[#F0E7F8] rounded-full flex items-center justify-center mx-auto mb-8 border border-[#8C51A5]/10 shadow-xl">
                        <i class="fas fa-search text-4xl text-[#8C51A5]"></i>
                    </div>
                    <h3 class="text-2xl font-black text-[#612F73] mb-4 tracking-tight">Berita Tidak Ditemukan</h3>
                    <p class="text-gray-500 text-lg mb-10 max-w-md mx-auto font-medium">Maaf, kami tidak dapat menemukan berita yang Anda cari. Coba gunakan kata kunci lain.</p>
                    <a href="{{ route('news') }}"
                        class="inline-flex items-center gap-3 px-10 py-4 bg-[#8C51A5] text-white font-black rounded-2xl hover:bg-[#612F73] transition-all shadow-xl uppercase text-[10px] tracking-widest">
                        <i class="fas fa-arrow-left"></i>
                        RESET PENCARIAN
                    </a>
                </div>
            @endif
        </div>
    </section>

     {{-- Related Sections --}}
    <section class="py-24 bg-white relative border-t border-gray-100">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-20">
                {{-- Achievements Widget --}}
                <div>
                    <div class="flex items-center justify-between mb-10">
                        <h2 class="text-2xl font-black text-[#612F73] flex items-center gap-4 tracking-tight">
                            <span class="w-12 h-12 bg-[#8C51A5] rounded-2xl flex items-center justify-center shadow-lg shadow-[#8C51A5]/30">
                                <i class="fas fa-trophy text-[#F8CB62]"></i>
                            </span>
                            Prestasi Terbaru
                        </h2>
                        <a href="{{ route('achievements') }}" class="text-[#8C51A5] font-black text-[10px] tracking-[0.2em] uppercase hover:text-[#612F73] transition-colors bg-[#F0E7F8]/50 px-5 py-2.5 rounded-xl border border-[#8C51A5]/10">
                            LIHAT SEMUA <i class="fas fa-arrow-right ml-2 text-[8px]"></i>
                        </a>
                    </div>

                     <div class="space-y-6">
                        @foreach(\App\Models\Achievement::active()->ordered()->take(3)->get() as $index => $achievement)
                            <a href="{{ route('achievement.show', $achievement->slug) }}"
                                class="flex gap-6 p-6 bg-white rounded-[2rem] border border-[#8C51A5]/5 shadow-xl shadow-[#612F73]/5 hover:shadow-premium-lg hover:border-[#8C51A5]/30 transition-all duration-500 group transform hover:-translate-x-1" data-aos="fade-right" data-aos-delay="{{ $index * 150 }}">
                                <div class="w-24 h-24 flex-shrink-0 rounded-2xl overflow-hidden bg-gray-50 border border-[#8C51A5]/10">
                                    @if($achievement->image)
                                        <img src="{{ asset('storage/' . $achievement->image) }}" alt="{{ $achievement->title }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#8C51A5]/20 to-transparent">
                                            <i class="fas fa-trophy text-[#8C51A5] text-3xl"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0 flex flex-col justify-center">
                                    <h4
                                        class="text-lg font-black text-[#612F73] line-clamp-1 group-hover:text-[#8C51A5] transition-colors tracking-tight uppercase">
                                        {{ $achievement->title }}</h4>
                                    @if($achievement->student_name)
                                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mt-2">{{ $achievement->student_name }}</p>
                                    @endif
                                    <div class="flex items-center gap-3 mt-4">
                                        @if($achievement->level)
                                            <span
                                                class="px-3 py-1 bg-[#F0E7F8] text-[#8C51A5] text-[9px] font-black rounded-lg border border-[#8C51A5]/10 uppercase tracking-widest">{{ $achievement->level }}</span>
                                        @endif
                                        @if($achievement->rank)
                                            <span
                                                class="px-3 py-1 bg-[#F8CB62]/10 text-[#612F73] text-[9px] font-black rounded-lg border border-[#F8CB62]/20 uppercase tracking-widest">{{ $achievement->rank }}</span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- Gallery Widget --}}
                <div>
                    <div class="flex items-center justify-between mb-10">
                        <h2 class="text-2xl font-black text-[#612F73] flex items-center gap-4 tracking-tight">
                            <span class="w-12 h-12 bg-[#8C51A5] rounded-2xl flex items-center justify-center shadow-lg shadow-[#8C51A5]/30">
                                <i class="fas fa-images text-white"></i>
                            </span>
                            Galeri Foto
                        </h2>
                        <a href="{{ route('gallery.photos') }}"
                            class="text-[#8C51A5] font-black text-[10px] tracking-[0.2em] uppercase hover:text-[#612F73] transition-colors bg-[#F0E7F8]/50 px-5 py-2.5 rounded-xl border border-[#8C51A5]/10">
                            LIHAT SEMUA <i class="fas fa-arrow-right ml-2 text-[8px]"></i>
                        </a>
                    </div>

                     <div class="grid grid-cols-3 gap-6">
                        @foreach(\App\Models\Gallery::active()->photos()->ordered()->take(6)->get() as $index => $gallery)
                            <div class="aspect-square rounded-2xl overflow-hidden group relative border border-[#8C51A5]/10 cursor-pointer shadow-lg hover:shadow-premium-lg transition-all duration-500" data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title ?? 'Galeri' }}"
                                    class="w-full h-full object-cover group-hover:scale-125 transition-transform duration-1000"
                                    onerror="this.src='https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=300'">
                                <div class="absolute inset-0 bg-[#612F73]/60 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center backdrop-blur-[2px]">
                                    <i class="fas fa-plus text-[#F8CB62] text-2xl transform scale-50 group-hover:scale-100 transition-transform duration-500"></i>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

     {{-- Newsletter CTA --}}
    <section class="py-24 bg-premium-dark relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
                <h2 class="text-4xl md:text-6xl font-black text-white mb-8 tracking-tight">Ketinggalan <span class="text-[#F8CB62]">Update</span> Penting?</h2>
                <p class="text-gray-400 text-lg md:text-xl mb-12 leading-relaxed font-medium">Jadilah yang pertama tahu tentang pengumuman, prestasi siswa, dan berbagai kegiatan seru lainnya di sekolah kami.</p>
                <div class="flex flex-wrap justify-center gap-6">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center gap-4 px-10 py-5 bg-white/5 backdrop-blur-md text-white font-black rounded-2xl border border-white/10 hover:bg-white/10 transition-all uppercase text-xs tracking-widest">
                        <i class="fas fa-home text-lg text-[#F8CB62]"></i>
                        KEMBALI KE BERANDA
                    </a>
                    @if(($settings['ppdb_active'] ?? false))
                        <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                            class="inline-flex items-center gap-4 px-10 py-5 bg-gradient-to-r from-[#F8CB62] to-[#f5b82e] text-[#612F73] font-black rounded-2xl hover:shadow-golden transition-all uppercase text-xs tracking-widest">
                            <i class="fas fa-user-plus text-lg"></i>
                            DAFTAR PPDB SEKARANG
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection