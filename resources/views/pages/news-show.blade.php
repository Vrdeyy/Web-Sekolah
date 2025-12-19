@extends('layouts.app')

@section('title', $news->title)

@section('content')
    {{-- Breadcrumb Navigation --}}
    <section class="pt-28 pb-8 bg-gradient-to-r from-slate-50 to-gray-100">
        <div class="container mx-auto px-4 lg:px-8">
            <nav class="flex items-center gap-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-emerald-600 transition-colors">
                    <i class="fas fa-home"></i>
                </a>
                <i class="fas fa-chevron-right text-xs text-gray-400"></i>
                <a href="{{ route('news') }}" class="text-gray-500 hover:text-emerald-600 transition-colors">Berita</a>
                @if($news->category)
                    <i class="fas fa-chevron-right text-xs text-gray-400"></i>
                    <span class="text-emerald-600 font-medium">{{ $news->category }}</span>
                @endif
            </nav>
        </div>
    </section>

    {{-- Article Content Section --}}
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-10">
                {{-- Main Content - 8 columns --}}
                <article class="lg:col-span-8">
                    {{-- Article Title --}}
                    <header class="mb-8">
                        @if($news->category)
                            <a href="{{ route('news') }}?category={{ $news->category }}"
                                class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-100 text-emerald-700 text-sm font-semibold rounded-lg hover:bg-emerald-200 transition-colors mb-4">
                                <i class="fas fa-folder"></i>
                                {{ $news->category }}
                            </a>
                        @endif

                        <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
                            {{ $news->title }}
                        </h1>

                        {{-- Meta Info --}}
                        <div class="flex flex-wrap items-center gap-6 text-sm text-gray-500 pb-6 border-b border-gray-200">
                            <div class="flex items-center gap-2">
                                <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-emerald-600"></i>
                                </div>
                                <div>
                                    <p class="text-gray-900 font-semibold">{{ $news->author ?? 'Admin' }}</p>
                                    <p class="text-xs text-gray-400">Penulis</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="far fa-calendar text-blue-600"></i>
                                </div>
                                <div>
                                    <p class="text-gray-900 font-semibold">{{ $news->published_at->format('d F Y') }}</p>
                                    <p class="text-xs text-gray-400">Tanggal Publikasi</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                                    <i class="far fa-eye text-purple-600"></i>
                                </div>
                                <div>
                                    <p class="text-gray-900 font-semibold">{{ number_format($news->views) }}</p>
                                    <p class="text-xs text-gray-400">Dibaca</p>
                                </div>
                            </div>
                        </div>
                    </header>

                    {{-- Featured Image --}}
                    @if($news->image)
                        <figure class="mb-10 rounded-2xl overflow-hidden shadow-lg">
                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                class="w-full h-auto object-cover"
                                onerror="this.src='https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=800'">
                        </figure>
                    @endif

                    {{-- Article Content --}}
                    <div
                        class="prose prose-lg max-w-none mb-10
                        prose-headings:text-gray-900 prose-headings:font-bold
                        prose-h2:text-2xl prose-h2:mt-10 prose-h2:mb-4
                        prose-h3:text-xl prose-h3:mt-8 prose-h3:mb-3
                        prose-p:text-gray-700 prose-p:leading-relaxed prose-p:mb-6
                        prose-a:text-emerald-600 prose-a:no-underline hover:prose-a:underline
                        prose-strong:text-gray-900
                        prose-ul:my-6 prose-li:text-gray-700 prose-li:mb-2
                        prose-ol:my-6
                        prose-blockquote:border-l-4 prose-blockquote:border-emerald-500 prose-blockquote:bg-emerald-50 prose-blockquote:py-4 prose-blockquote:px-6 prose-blockquote:rounded-r-lg prose-blockquote:italic">
                        {!! $news->content !!}
                    </div>

                    {{-- Tags (if available) --}}
                    @if($news->tags)
                        <div class="mb-10 pb-8 border-b border-gray-200">
                            <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Tags</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach(explode(',', $news->tags) as $tag)
                                    <span
                                        class="px-4 py-2 bg-gray-100 text-gray-700 text-sm rounded-full hover:bg-emerald-100 hover:text-emerald-700 transition-colors cursor-pointer">
                                        #{{ trim($tag) }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Share Buttons --}}
                    <div class="bg-gradient-to-r from-slate-50 to-gray-50 rounded-2xl p-8 mb-10">
                        <h4 class="font-bold text-gray-900 text-lg mb-4">
                            <i class="fas fa-share-alt text-emerald-600 mr-2"></i>
                            Bagikan Artikel Ini
                        </h4>
                        <div class="flex flex-wrap gap-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                target="_blank"
                                class="inline-flex items-center gap-2 px-5 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5">
                                <i class="fab fa-facebook-f"></i>
                                <span class="font-medium">Facebook</span>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($news->title) }}"
                                target="_blank"
                                class="inline-flex items-center gap-2 px-5 py-3 bg-sky-500 text-white rounded-xl hover:bg-sky-600 transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5">
                                <i class="fab fa-twitter"></i>
                                <span class="font-medium">Twitter</span>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($news->title . ' ' . request()->url()) }}"
                                target="_blank"
                                class="inline-flex items-center gap-2 px-5 py-3 bg-green-500 text-white rounded-xl hover:bg-green-600 transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5">
                                <i class="fab fa-whatsapp"></i>
                                <span class="font-medium">WhatsApp</span>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($news->title) }}"
                                target="_blank"
                                class="inline-flex items-center gap-2 px-5 py-3 bg-blue-700 text-white rounded-xl hover:bg-blue-800 transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5">
                                <i class="fab fa-linkedin-in"></i>
                                <span class="font-medium">LinkedIn</span>
                            </a>
                            <button onclick="copyToClipboard('{{ request()->url() }}')"
                                class="inline-flex items-center gap-2 px-5 py-3 bg-gray-700 text-white rounded-xl hover:bg-gray-800 transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5">
                                <i class="fas fa-link"></i>
                                <span class="font-medium">Salin Link</span>
                            </button>
                        </div>
                    </div>

                    {{-- Author Box --}}
                    <div class="bg-white border border-gray-200 rounded-2xl p-6 flex items-center gap-6 shadow-sm">
                        <div
                            class="w-20 h-20 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-3xl text-white"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Ditulis oleh</p>
                            <h4 class="text-lg font-bold text-gray-900">{{ $news->author ?? 'Admin Sekolah' }}</h4>
                            <p class="text-gray-600 text-sm">Tim redaksi {{ $settings['school_name'] ?? 'SMK YAJ' }} yang
                                bertugas untuk menyajikan informasi terkini seputar kegiatan sekolah.</p>
                        </div>
                    </div>
                </article>

                {{-- Sidebar - 4 columns --}}
                <aside class="lg:col-span-4 space-y-8">
                    {{-- Search Box --}}
                    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                        <h3 class="font-bold text-gray-900 text-lg mb-4 flex items-center gap-2">
                            <i class="fas fa-search text-emerald-600"></i>
                            Cari Berita
                        </h3>
                        <form action="{{ route('news') }}" method="GET">
                            <div class="relative">
                                <input type="text" name="search" placeholder="Ketik kata kunci..."
                                    class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all">
                                <button type="submit"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-emerald-600 transition-colors">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- Latest News --}}
                    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                        <h3 class="font-bold text-gray-900 text-lg mb-6 flex items-center gap-2">
                            <i class="fas fa-newspaper text-emerald-600"></i>
                            Berita Terbaru
                        </h3>
                        <div class="space-y-4">
                            @foreach($latestNews ?? $relatedNews as $item)
                                <a href="{{ route('news.show', $item->slug) }}"
                                    class="group flex gap-4 pb-4 border-b border-gray-100 last:border-0 last:pb-0">
                                    <div class="w-20 h-20 flex-shrink-0 rounded-xl overflow-hidden bg-gray-100">
                                        @if($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                        @else
                                            <div
                                                class="w-full h-full bg-gradient-to-br from-emerald-100 to-teal-100 flex items-center justify-center">
                                                <i class="fas fa-newspaper text-emerald-400"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4
                                            class="font-semibold text-gray-900 text-sm line-clamp-2 group-hover:text-emerald-600 transition-colors mb-2">
                                            {{ $item->title }}
                                        </h4>
                                        <div class="flex items-center gap-2 text-xs text-gray-400">
                                            <i class="far fa-calendar"></i>
                                            <span>{{ $item->published_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <a href="{{ route('news') }}"
                            class="mt-6 block text-center py-3 bg-emerald-50 text-emerald-600 font-semibold rounded-xl hover:bg-emerald-100 transition-colors">
                            Lihat Semua Berita
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>

                    {{-- Categories --}}
                    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                        <h3 class="font-bold text-gray-900 text-lg mb-6 flex items-center gap-2">
                            <i class="fas fa-folder text-emerald-600"></i>
                            Kategori
                        </h3>
                        <ul class="space-y-3">
                            @php
                                $categories = [
                                    ['name' => 'Kegiatan', 'icon' => 'fa-calendar-alt', 'color' => 'emerald'],
                                    ['name' => 'Pengumuman', 'icon' => 'fa-bullhorn', 'color' => 'blue'],
                                    ['name' => 'Prestasi', 'icon' => 'fa-trophy', 'color' => 'amber'],
                                    ['name' => 'Workshop', 'icon' => 'fa-chalkboard-teacher', 'color' => 'purple'],
                                    ['name' => 'Kunjungan', 'icon' => 'fa-bus', 'color' => 'cyan'],
                                ];
                            @endphp
                            @foreach($categories as $cat)
                                <li>
                                    <a href="{{ route('news') }}?category={{ $cat['name'] }}"
                                        class="flex items-center justify-between p-3 rounded-xl hover:bg-{{ $cat['color'] }}-50 transition-colors group">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-10 h-10 bg-{{ $cat['color'] }}-100 rounded-lg flex items-center justify-center">
                                                <i class="fas {{ $cat['icon'] }} text-{{ $cat['color'] }}-600"></i>
                                            </div>
                                            <span
                                                class="font-medium text-gray-700 group-hover:text-{{ $cat['color'] }}-600 transition-colors">{{ $cat['name'] }}</span>
                                        </div>
                                        <i
                                            class="fas fa-chevron-right text-gray-300 group-hover:text-{{ $cat['color'] }}-500 transition-colors"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- PPDB CTA --}}
                    @if(($settings['ppdb_active'] ?? false))
                        <div
                            class="bg-gradient-to-br from-emerald-600 via-emerald-700 to-teal-700 rounded-2xl p-6 text-white relative overflow-hidden">
                            <div
                                class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2">
                            </div>
                            <div
                                class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full translate-y-1/2 -translate-x-1/2">
                            </div>
                            <div class="relative z-10">
                                <h3 class="font-bold text-xl mb-3">Pendaftaran PPDB</h3>
                                <p class="text-emerald-100 text-sm mb-4">Segera daftarkan diri Anda untuk menjadi bagian dari
                                    keluarga besar kami!</p>
                                <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                                    class="inline-flex items-center gap-2 px-6 py-3 bg-white text-emerald-700 font-bold rounded-xl hover:bg-emerald-50 transition-colors shadow-lg">
                                    <i class="fas fa-user-plus"></i>
                                    Daftar Sekarang
                                </a>
                            </div>
                        </div>
                    @endif

                    {{-- Social Links --}}
                    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                        <h3 class="font-bold text-gray-900 text-lg mb-4 flex items-center gap-2">
                            <i class="fas fa-share-alt text-emerald-600"></i>
                            Ikuti Kami
                        </h3>
                        <div class="flex gap-3">
                            @foreach($socialLinks ?? [] as $social)
                                <a href="{{ $social->url }}" target="_blank"
                                    class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-gray-600 hover:bg-emerald-500 hover:text-white transition-all duration-300 hover:-translate-y-1">
                                    <i class="fab fa-{{ $social->platform }} text-lg"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    {{-- Related News Section --}}
    @if(isset($relatedNews) && $relatedNews->count() > 0)
        <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
            <div class="container mx-auto px-4 lg:px-8">
                <div class="flex items-center justify-between mb-10">
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Berita Terkait</h2>
                        <p class="text-gray-600 mt-2">Artikel lainnya yang mungkin menarik untuk Anda</p>
                    </div>
                    <a href="{{ route('news') }}"
                        class="hidden md:inline-flex items-center gap-2 text-emerald-600 font-semibold hover:gap-4 transition-all">
                        Lihat Semua
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($relatedNews as $related)
                        <a href="{{ route('news.show', $related->slug) }}"
                            class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                            <div class="relative h-48 overflow-hidden">
                                @if($related->image)
                                    <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center">
                                        <i class="fas fa-newspaper text-5xl text-white/40"></i>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                @if($related->category)
                                    <span
                                        class="absolute top-4 left-4 px-3 py-1 bg-white/95 text-emerald-700 text-xs font-bold rounded-lg">
                                        {{ $related->category }}
                                    </span>
                                @endif
                            </div>
                            <div class="p-6">
                                <div class="flex items-center gap-3 text-gray-400 text-xs mb-3">
                                    <span><i class="far fa-calendar mr-1"></i>{{ $related->published_at->format('d M Y') }}</span>
                                    <span><i class="far fa-eye mr-1"></i>{{ $related->views }}</span>
                                </div>
                                <h3 class="font-bold text-gray-900 line-clamp-2 group-hover:text-emerald-600 transition-colors">
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
                // Show toast notification
                const toast = document.createElement('div');
                toast.className = 'fixed bottom-6 right-6 bg-gray-900 text-white px-6 py-3 rounded-xl shadow-lg z-50 animate-fade-in-up';
                toast.innerHTML = '<i class="fas fa-check mr-2"></i>Link berhasil disalin!';
                document.body.appendChild(toast);

                setTimeout(() => {
                    toast.classList.add('opacity-0', 'transition-opacity');
                    setTimeout(() => toast.remove(), 300);
                }, 2000);
            });
        }
    </script>
@endpush