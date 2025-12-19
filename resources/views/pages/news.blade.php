@extends('layouts.app')

@section('title', 'Berita & Artikel')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-gradient-to-br from-slate-900 via-slate-800 to-emerald-900 relative overflow-hidden">
        <div class="absolute inset-0">
            <div
                class="absolute top-0 left-0 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2">
            </div>
            <div
                class="absolute bottom-0 right-0 w-96 h-96 bg-teal-500/20 rounded-full blur-3xl translate-x-1/2 translate-y-1/2">
            </div>
        </div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-emerald-300 text-sm font-medium mb-6">
                    <i class="fas fa-newspaper"></i>
                    <span>BERITA & ARTIKEL</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                    Berita <span class="text-emerald-400">Terkini</span>
                </h1>
                <p class="text-gray-300 text-lg">
                    Informasi terbaru seputar kegiatan, prestasi, dan perkembangan di
                    {{ $settings['school_name'] ?? 'SMK YAJ' }}
                </p>
            </div>
        </div>
    </section>

    {{-- Category Filter Tabs --}}
    <section class="py-8 bg-white border-b border-gray-200 sticky top-20 z-30 backdrop-blur-xl bg-white/95">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-wrap items-center justify-between gap-4">
                {{-- Category Pills --}}
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('news') }}"
                        class="px-5 py-2.5 rounded-xl font-medium text-sm transition-all {{ !request('category') ? 'bg-emerald-600 text-white shadow-lg' : 'bg-gray-100 text-gray-600 hover:bg-emerald-100 hover:text-emerald-700' }}">
                        Semua
                    </a>
                    @php
                        $categories = ['Kegiatan', 'Pengumuman', 'Prestasi', 'Workshop', 'Kunjungan'];
                    @endphp
                    @foreach($categories as $cat)
                        <a href="{{ route('news') }}?category={{ $cat }}"
                            class="px-5 py-2.5 rounded-xl font-medium text-sm transition-all {{ request('category') == $cat ? 'bg-emerald-600 text-white shadow-lg' : 'bg-gray-100 text-gray-600 hover:bg-emerald-100 hover:text-emerald-700' }}">
                            {{ $cat }}
                        </a>
                    @endforeach
                </div>

                {{-- Search Box --}}
                <form action="{{ route('news') }}" method="GET" class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berita..."
                        class="pl-4 pr-12 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 w-64">
                    <button type="submit"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-emerald-600">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

    {{-- Featured News (Latest) --}}
    @if($news->count() > 0 && $news->first())
        @php $featured = $news->first(); @endphp
        <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
            <div class="container mx-auto px-4 lg:px-8">
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-3">
                        <span class="w-10 h-10 bg-emerald-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-star text-white"></i>
                        </span>
                        Berita Utama
                    </h2>
                </div>

                <a href="{{ route('news.show', $featured->slug) }}"
                    class="group block relative overflow-hidden rounded-3xl shadow-2xl hover:shadow-3xl transition-all duration-500">
                    {{-- Background Image --}}
                    <div class="relative h-[500px] lg:h-[450px]">
                        @if($featured->image)
                            <img src="{{ asset('storage/' . $featured->image) }}" alt="{{ $featured->title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-emerald-500 via-teal-600 to-cyan-700"></div>
                        @endif

                        {{-- Gradient Overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>

                        {{-- Content --}}
                        <div class="absolute bottom-0 left-0 right-0 p-8 lg:p-12">
                            <div class="max-w-3xl">
                                @if($featured->category)
                                    <span
                                        class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-500 text-white text-sm font-bold rounded-lg mb-4">
                                        <i class="fas fa-folder"></i>
                                        {{ $featured->category }}
                                    </span>
                                @endif

                                <h3
                                    class="text-3xl lg:text-4xl font-extrabold text-white mb-4 group-hover:text-emerald-300 transition-colors">
                                    {{ $featured->title }}
                                </h3>

                                <p class="text-gray-300 text-lg mb-6 line-clamp-2">
                                    {{ $featured->excerpt }}
                                </p>

                                <div class="flex flex-wrap items-center gap-6 text-gray-400 text-sm">
                                    <span class="flex items-center gap-2">
                                        <i class="far fa-calendar"></i>
                                        {{ $featured->published_at->format('d F Y') }}
                                    </span>
                                    <span class="flex items-center gap-2">
                                        <i class="far fa-user"></i>
                                        {{ $featured->author ?? 'Admin' }}
                                    </span>
                                    <span class="flex items-center gap-2">
                                        <i class="far fa-eye"></i>
                                        {{ $featured->views }} views
                                    </span>
                                    <span
                                        class="inline-flex items-center gap-2 text-emerald-400 font-semibold group-hover:gap-4 transition-all">
                                        Baca Selengkapnya
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
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex items-center justify-between mb-10">
                <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-3">
                    <span class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-list text-white"></i>
                    </span>
                    Semua Berita
                </h2>
                <p class="text-gray-500">
                    Menampilkan {{ $news->total() ?? $news->count() }} artikel
                </p>
            </div>

            @if($news->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($news->skip(1) as $item)
                        <article
                            class="group bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl hover:border-emerald-200 transition-all duration-300 hover:-translate-y-1">
                            {{-- Thumbnail --}}
                            <a href="{{ route('news.show', $item->slug) }}" class="block relative h-52 overflow-hidden">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-slate-200 to-slate-300 flex items-center justify-center">
                                        <i class="fas fa-newspaper text-5xl text-slate-400"></i>
                                    </div>
                                @endif

                                {{-- Category Badge --}}
                                @if($item->category)
                                    <div class="absolute top-4 left-4">
                                        <span
                                            class="px-3 py-1.5 bg-white/95 backdrop-blur-sm text-emerald-700 text-xs font-bold rounded-lg shadow">
                                            {{ $item->category }}
                                        </span>
                                    </div>
                                @endif

                                {{-- Date Badge --}}
                                <div class="absolute top-4 right-4">
                                    <div
                                        class="w-14 h-14 bg-emerald-600 rounded-xl flex flex-col items-center justify-center text-white shadow-lg">
                                        <span class="text-lg font-bold leading-none">{{ $item->published_at->format('d') }}</span>
                                        <span class="text-xs uppercase">{{ $item->published_at->format('M') }}</span>
                                    </div>
                                </div>
                            </a>

                            {{-- Content --}}
                            <div class="p-6">
                                <a href="{{ route('news.show', $item->slug) }}">
                                    <h3
                                        class="text-lg font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-emerald-600 transition-colors">
                                        {{ $item->title }}
                                    </h3>
                                </a>

                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                    {{ $item->excerpt }}
                                </p>

                                {{-- Meta --}}
                                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center">
                                            <i class="fas fa-user text-emerald-600 text-xs"></i>
                                        </div>
                                        <span class="text-sm text-gray-500">{{ $item->author ?? 'Admin' }}</span>
                                    </div>
                                    <span class="text-sm text-gray-400">
                                        <i class="far fa-eye mr-1"></i>{{ $item->views }}
                                    </span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-12">
                    {{ $news->links() }}
                </div>
            @else
                {{-- Empty State --}}
                <div class="text-center py-20">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-newspaper text-4xl text-gray-400"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Berita</h3>
                    <p class="text-gray-500 mb-6">Berita yang Anda cari tidak ditemukan.</p>
                    <a href="{{ route('news') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-600 text-white font-semibold rounded-xl hover:bg-emerald-700 transition-colors">
                        <i class="fas fa-arrow-left"></i>
                        Lihat Semua Berita
                    </a>
                </div>
            @endif
        </div>
    </section>

    {{-- Related Sections --}}
    <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12">
                {{-- Achievements Widget --}}
                <div>
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-xl font-bold text-gray-900 flex items-center gap-3">
                            <span class="w-10 h-10 bg-amber-500 rounded-xl flex items-center justify-center">
                                <i class="fas fa-trophy text-white"></i>
                            </span>
                            Prestasi Terbaru
                        </h2>
                        <a href="{{ route('achievements') }}" class="text-amber-600 font-semibold text-sm hover:underline">
                            Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>

                    <div class="space-y-4">
                        @foreach(\App\Models\Achievement::active()->ordered()->take(3)->get() as $achievement)
                            <div
                                class="flex gap-4 p-4 bg-white rounded-2xl border border-gray-100 hover:shadow-md transition-all group">
                                <div class="w-20 h-20 flex-shrink-0 rounded-xl overflow-hidden bg-amber-100">
                                    @if($achievement->image)
                                        <img src="{{ asset('storage/' . $achievement->image) }}" alt="{{ $achievement->title }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <i class="fas fa-trophy text-amber-400 text-2xl"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4
                                        class="font-semibold text-gray-900 line-clamp-1 group-hover:text-amber-600 transition-colors">
                                        {{ $achievement->title }}</h4>
                                    @if($achievement->student_name)
                                        <p class="text-sm text-gray-500 mt-1">{{ $achievement->student_name }}</p>
                                    @endif
                                    <div class="flex items-center gap-3 mt-2">
                                        @if($achievement->level)
                                            <span
                                                class="px-2 py-1 bg-amber-100 text-amber-700 text-xs font-medium rounded">{{ $achievement->level }}</span>
                                        @endif
                                        @if($achievement->rank)
                                            <span
                                                class="px-2 py-1 bg-emerald-100 text-emerald-700 text-xs font-medium rounded">{{ $achievement->rank }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Gallery Widget --}}
                <div>
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-xl font-bold text-gray-900 flex items-center gap-3">
                            <span class="w-10 h-10 bg-purple-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-images text-white"></i>
                            </span>
                            Galeri Foto
                        </h2>
                        <a href="{{ route('gallery.photos') }}"
                            class="text-purple-600 font-semibold text-sm hover:underline">
                            Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        @foreach(\App\Models\Gallery::active()->photos()->ordered()->take(6)->get() as $gallery)
                            <div class="aspect-square rounded-xl overflow-hidden group">
                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title ?? 'Galeri' }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                    onerror="this.src='https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=300'">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Newsletter CTA --}}
    <section class="py-16 bg-gradient-to-r from-emerald-600 to-teal-600 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml,%3Csvg width=\" 60\" height=\"60\"
                viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg
                fill=\"%23ffffff\" fill-opacity=\"0.05\"%3E%3Cpath d=\"M36
                34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6
                4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Jangan Lewatkan Update Terbaru!</h2>
                <p class="text-emerald-100 text-lg mb-8">Kunjungi website kami secara berkala untuk mendapatkan informasi
                    terbaru seputar kegiatan sekolah.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center gap-2 px-8 py-4 bg-white text-emerald-700 font-bold rounded-xl hover:bg-emerald-50 transition-colors shadow-lg">
                        <i class="fas fa-home"></i>
                        Kembali ke Beranda
                    </a>
                    @if(($settings['ppdb_active'] ?? false))
                        <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                            class="inline-flex items-center gap-2 px-8 py-4 bg-white/20 backdrop-blur-sm text-white font-bold rounded-xl border-2 border-white/40 hover:bg-white/30 transition-colors">
                            <i class="fas fa-user-plus"></i>
                            Daftar PPDB
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection