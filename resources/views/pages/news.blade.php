@extends('layouts.app')

@section('title', 'Berita & Artikel')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <div
                    class="inline-flex items-center gap-2 px-6 py-3 bg-[#932F80]/25 backdrop-blur-md rounded-full text-[#F3DCEB] text-sm font-semibold mb-6 border border-[#932F80]/50 shadow-glow">
                    <i class="fas fa-newspaper animate-bounce"></i>
                    <span>BERITA & ARTIKEL</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold text-white mb-6 tracking-wide drop-shadow-lg">
                    Berita <span class="text-[#F3DCEB]">Terkini</span>
                </h1>
                <p class="text-gray-300 text-lg md:text-xl leading-relaxed">
                    Informasi terbaru seputar kegiatan, prestasi, dan perkembangan di
                    {{ $settings['school_name'] ?? 'SMK YAJ' }}
                </p>
            </div>
        </div>
    </section>

    {{-- Category Filter Tabs --}}
    <section class="py-10 bg-white border-b border-gray-200 sticky top-20 z-30 backdrop-blur-xl bg-white/95">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-wrap items-center justify-between gap-6">
                {{-- Category Pills --}}
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('news') }}"
                        class="px-6 py-3 rounded-2xl font-bold text-sm transition-all duration-300 {{ !request('category') ? 'bg-[#932F80] text-white shadow-lg shadow-[#932F80]/30 scale-105' : 'bg-gray-100 text-gray-500 hover:bg-gray-200 hover:text-gray-900 border border-gray-200' }}">
                        SEMUA
                    </a>
                    @php
                        $categories = ['Kegiatan', 'Pengumuman', 'Prestasi', 'Workshop', 'Kunjungan'];
                    @endphp
                    @foreach($categories as $cat)
                        <a href="{{ route('news') }}?category={{ $cat }}"
                            class="px-6 py-3 rounded-2xl font-bold text-sm transition-all duration-300 {{ request('category') == $cat ? 'bg-[#932F80] text-white shadow-lg shadow-[#932F80]/30 scale-105' : 'bg-gray-100 text-gray-500 hover:bg-gray-200 hover:text-gray-900 border border-gray-200' }}">
                            {{ strtoupper($cat) }}
                        </a>
                    @endforeach
                </div>

                {{-- Search Box --}}
                <form action="{{ route('news') }}" method="GET" class="relative group">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berita..."
                        class="pl-6 pr-14 py-3.5 bg-gray-100 border border-gray-200 rounded-2xl text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-[#932F80] focus:border-[#932F80] w-72 transition-all outline-none">
                    <button type="submit"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 group-hover:text-[#932F80] transition-colors">
                        <i class="fas fa-search text-lg"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

    {{-- Featured News (Latest) --}}
    @if($news->count() > 0 && $news->first())
        @php $featured = $news->first(); @endphp
        <section class="py-16 bg-white relative">
            <div class="container mx-auto px-4 lg:px-8">
                <div class="mb-12">
                    <h2 class="text-3xl font-extrabold text-[#2A1424] flex items-center gap-4 tracking-tight">
                        <span class="w-12 h-12 bg-[#932F80] rounded-2xl flex items-center justify-center shadow-lg shadow-[#932F80]/30 transition-transform hover:rotate-12">
                            <i class="fas fa-star text-white"></i>
                        </span>
                        Berita Utama
                    </h2>
                </div>

                <a href="{{ route('news.show', $featured->slug) }}"
                    class="group block relative overflow-hidden rounded-[3rem] shadow-2xl hover:shadow-[#932F80]/20 transition-all duration-700 border border-white/5">
                    {{-- Background Image --}}
                    <div class="relative h-[550px] lg:h-[500px]">
                        @if($featured->image)
                            <img src="{{ asset('storage/' . $featured->image) }}" alt="{{ $featured->title }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-[#932F80]/60 via-[#6E1F5F]/60 to-[#1A0E17]"></div>
                        @endif

                        {{-- Gradient Overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/50 to-transparent"></div>

                        {{-- Content --}}
                        <div class="absolute bottom-0 left-0 right-0 p-10 lg:p-16">
                            <div class="max-w-4xl">
                                @if($featured->category)
                                    <span
                                        class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#932F80] text-white text-sm font-extrabold rounded-xl mb-6 shadow-lg shadow-[#932F80]/50 tracking-wider">
                                        <i class="fas fa-folder"></i>
                                        {{ strtoupper($featured->category) }}
                                    </span>
                                @endif

                                <h3
                                    class="text-4xl lg:text-5xl font-extrabold text-white mb-6 group-hover:text-[#F3DCEB] transition-colors leading-tight tracking-tight">
                                    {{ $featured->title }}
                                </h3>

                                <p class="text-gray-300 text-lg lg:text-xl mb-8 line-clamp-2 leading-relaxed font-medium">
                                    {{ $featured->excerpt }}
                                </p>

                                <div class="flex flex-wrap items-center gap-8 text-gray-400 font-bold uppercase tracking-widest text-xs">
                                    <span class="flex items-center gap-3 bg-white/5 backdrop-blur-md px-4 py-2 rounded-lg border border-white/10">
                                        <i class="far fa-calendar text-[#932F80] text-sm"></i>
                                        {{ $featured->published_at->format('d F Y') }}
                                    </span>
                                    <span class="flex items-center gap-3 bg-white/5 backdrop-blur-md px-4 py-2 rounded-lg border border-white/10">
                                        <i class="far fa-user text-[#932F80] text-sm"></i>
                                        {{ $featured->author ?? 'Admin' }}
                                    </span>
                                    <span class="flex items-center gap-3 bg-white/5 backdrop-blur-md px-4 py-2 rounded-lg border border-white/10">
                                        <i class="far fa-eye text-[#932F80] text-sm"></i>
                                        {{ number_format($featured->views) }} VIEWS
                                    </span>
                                    <span
                                        class="inline-flex items-center gap-3 text-[#F3DCEB] font-extrabold group-hover:gap-5 transition-all ml-auto group-hover:bg-[#932F80] group-hover:text-white px-6 py-2 rounded-xl border border-[#932F80]/30 bg-[#932F80]/10">
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
    <section class="py-16 bg-[#FDF4F9] relative">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex items-center justify-between mb-12">
                <h2 class="text-3xl font-extrabold text-[#2A1424] flex items-center gap-4 tracking-tight">
                    <span class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-600/30">
                        <i class="fas fa-list text-white"></i>
                    </span>
                    Semua Berita
                </h2>
                <div class="px-5 py-2.5 bg-white border border-gray-200 rounded-2xl text-gray-500 font-bold text-sm tracking-wider shadow-sm">
                    MENAMPILKAN {{ $news->total() ?? $news->count() }} ARTIKEL
                </div>
            </div>

            @if($news->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @foreach($news->skip(1) as $item)
                        <article
                            class="group bg-white rounded-[2.5rem] overflow-hidden border border-gray-100 shadow-xl shadow-purple-900/5 hover:shadow-2xl hover:shadow-purple-900/10 hover:border-[#932F80]/30 transition-all duration-500 hover:-translate-y-2">
                            {{-- Thumbnail --}}
                            <a href="{{ route('news.show', $item->slug) }}" class="block relative h-60 overflow-hidden">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-[#FDF4F9] to-white flex items-center justify-center border-b border-gray-100">
                                        <i class="fas fa-newspaper text-5xl text-purple-200"></i>
                                    </div>
                                @endif

                                {{-- Category Badge --}}
                                @if($item->category)
                                    <div class="absolute top-6 left-6">
                                        <span
                                            class="px-4 py-2 bg-white/90 backdrop-blur-md text-[#932F80] text-xs font-extrabold rounded-xl shadow-lg border border-purple-100 tracking-widest uppercase">
                                            {{ $item->category }}
                                        </span>
                                    </div>
                                @endif

                                {{-- Date Badge --}}
                                <div class="absolute top-6 right-6">
                                    <div
                                        class="w-14 h-14 bg-white/90 backdrop-blur-md rounded-2xl flex flex-col items-center justify-center text-[#932F80] shadow-lg border border-purple-100">
                                        <span class="text-xl font-extrabold leading-none">{{ $item->published_at->format('d') }}</span>
                                        <span class="text-[10px] font-bold uppercase tracking-tighter mt-1">{{ $item->published_at->format('M') }}</span>
                                    </div>
                                </div>
                            </a>

                            {{-- Content --}}
                            <div class="p-8">
                                <a href="{{ route('news.show', $item->slug) }}">
                                    <h3
                                        class="text-xl font-extrabold text-[#2A1424] mb-4 line-clamp-2 group-hover:text-[#932F80] transition-colors leading-tight tracking-tight">
                                        {{ $item->title }}
                                    </h3>
                                </a>

                                <p class="text-gray-500 text-sm mb-6 line-clamp-2 leading-relaxed font-medium">
                                    {{ $item->excerpt }}
                                </p>

                                {{-- Meta --}}
                                <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 bg-purple-50 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-user text-[#932F80] text-[10px]"></i>
                                        </div>
                                        <span class="text-xs font-bold text-gray-500 uppercase tracking-widest">{{ $item->author ?? 'Admin' }}</span>
                                    </div>
                                    <span class="text-xs font-bold text-gray-500 uppercase tracking-widest flex items-center gap-2">
                                        <i class="far fa-eye text-[#932F80]"></i>{{ number_format($item->views) }}
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
                <div class="text-center py-32 bg-white rounded-[3rem] border border-gray-100 shadow-xl shadow-purple-900/5">
                    <div class="w-24 h-24 bg-purple-50 rounded-full flex items-center justify-center mx-auto mb-8 border border-purple-100">
                        <i class="fas fa-newspaper text-4xl text-[#932F80]"></i>
                    </div>
                    <h3 class="text-2xl font-extrabold text-[#2A1424] mb-4 tracking-tight">Belum Ada Berita</h3>
                    <p class="text-gray-500 text-lg mb-10 max-w-md mx-auto">Berita yang Anda cari tidak ditemukan atau belum dipublikasikan.</p>
                    <a href="{{ route('news') }}"
                        class="inline-flex items-center gap-3 px-10 py-4 bg-[#932F80] text-white font-extrabold rounded-2xl hover:bg-[#6E1F5F] transition-all shadow-xl hover:shadow-purple-500/40 hover:-translate-y-1">
                        <i class="fas fa-arrow-left"></i>
                        LIHAT SEMUA BERITA
                    </a>
                </div>
            @endif
        </div>
    </section>

    {{-- Related Sections --}}
    <section class="py-24 bg-white relative border-t border-gray-100">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16">
                {{-- Achievements Widget --}}
                <div>
                    <div class="flex items-center justify-between mb-10">
                        <h2 class="text-2xl font-extrabold text-[#2A1424] flex items-center gap-4 tracking-tight">
                            <span class="w-12 h-12 bg-amber-500 rounded-2xl flex items-center justify-center shadow-lg shadow-amber-500/30">
                                <i class="fas fa-trophy text-white"></i>
                            </span>
                            Prestasi Terbaru
                        </h2>
                        <a href="{{ route('achievements') }}" class="text-[#932F80] font-extrabold text-xs tracking-widest uppercase hover:text-[#6E1F5F] transition-colors bg-[#FDF4F9] px-4 py-2 rounded-lg border border-[#932F80]/20">
                            LIHAT SEMUA <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>

                    <div class="space-y-6">
                        @foreach(\App\Models\Achievement::active()->ordered()->take(3)->get() as $achievement)
                            <div
                                class="flex gap-6 p-6 bg-white rounded-3xl border border-gray-100 shadow-lg shadow-purple-900/5 hover:shadow-2xl hover:shadow-amber-500/10 hover:border-amber-500/50 transition-all duration-500 group transform hover:-translate-x-1">
                                <div class="w-24 h-24 flex-shrink-0 rounded-2xl overflow-hidden bg-gray-100 border border-gray-200">
                                    @if($achievement->image)
                                        <img src="{{ asset('storage/' . $achievement->image) }}" alt="{{ $achievement->title }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-amber-500/20 to-transparent">
                                            <i class="fas fa-trophy text-amber-500 text-3xl"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0 flex flex-col justify-center">
                                    <h4
                                        class="text-lg font-extrabold text-[#2A1424] line-clamp-1 group-hover:text-amber-500 transition-colors tracking-tight">
                                        {{ $achievement->title }}</h4>
                                    @if($achievement->student_name)
                                        <p class="text-sm font-bold text-gray-500 uppercase tracking-widest mt-2">{{ $achievement->student_name }}</p>
                                    @endif
                                    <div class="flex items-center gap-3 mt-4">
                                        @if($achievement->level)
                                            <span
                                                class="px-3 py-1 bg-amber-50 text-amber-600 text-[10px] font-extrabold rounded-lg border border-amber-500/30 uppercase tracking-widest">{{ $achievement->level }}</span>
                                        @endif
                                        @if($achievement->rank)
                                            <span
                                                class="px-3 py-1 bg-purple-50 text-[#932F80] text-[10px] font-extrabold rounded-lg border border-[#932F80]/30 uppercase tracking-widest">{{ $achievement->rank }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Gallery Widget --}}
                <div>
                    <div class="flex items-center justify-between mb-10">
                        <h2 class="text-2xl font-extrabold text-[#2A1424] flex items-center gap-4 tracking-tight">
                            <span class="w-12 h-12 bg-purple-600 rounded-2xl flex items-center justify-center shadow-lg shadow-purple-600/30">
                                <i class="fas fa-images text-white"></i>
                            </span>
                            Galeri Foto
                        </h2>
                        <a href="{{ route('gallery.photos') }}"
                            class="text-[#932F80] font-extrabold text-xs tracking-widest uppercase hover:text-[#6E1F5F] transition-colors bg-purple-50 px-4 py-2 rounded-lg border border-purple-100">
                            LIHAT SEMUA <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        @foreach(\App\Models\Gallery::active()->photos()->ordered()->take(6)->get() as $gallery)
                            <div class="aspect-square rounded-2xl overflow-hidden group relative border border-gray-100 cursor-pointer shadow-lg hover:shadow-purple-500/30 transition-all duration-500">
                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title ?? 'Galeri' }}"
                                    class="w-full h-full object-cover group-hover:scale-125 transition-transform duration-1000"
                                    onerror="this.src='https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=300'">
                                <div class="absolute inset-0 bg-[#932F80]/40 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center">
                                    <i class="fas fa-search-plus text-white text-xl transform scale-50 group-hover:scale-100 transition-transform duration-500"></i>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Newsletter CTA --}}
    <section class="py-24 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden border-t border-white/10">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6 tracking-tight">Jangan Lewatkan Update Terbaru!</h2>
                <p class="text-gray-300 text-lg md:text-xl mb-10 leading-relaxed">Kunjungi website kami secara berkala untuk mendapatkan informasi terbaru seputar kegiatan sekolah.</p>
                <div class="flex flex-wrap justify-center gap-6">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center gap-3 px-10 py-4 bg-white text-[#932F80] font-extrabold rounded-2xl hover:bg-gray-100 transition-all shadow-xl hover:-translate-y-1">
                        <i class="fas fa-home text-lg"></i>
                        KEMBALI KE BERANDA
                    </a>
                    @if(($settings['ppdb_active'] ?? false))
                        <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                            class="inline-flex items-center gap-3 px-10 py-4 bg-white/10 backdrop-blur-md text-white font-extrabold rounded-2xl border-2 border-white/20 hover:bg-white/20 transition-all hover:-translate-y-1">
                            <i class="fas fa-user-plus text-lg"></i>
                            DAFTAR PPDB
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection