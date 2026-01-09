@extends('layouts.app')

@section('title', $news->title)

@section('content')
    {{-- Breadcrumb Navigation --}}
    <section class="pt-28 pb-8 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden flex items-center">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <nav class="flex items-center gap-2 text-[10px] font-extrabold uppercase tracking-[0.2em]" data-aos="fade-down">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-[#F3DCEB] transition-colors">
                    <i class="fas fa-home"></i>
                </a>
                <i class="fas fa-chevron-right text-[8px] text-gray-700"></i>
                <a href="{{ route('news') }}" class="text-gray-400 hover:text-[#F3DCEB] transition-colors tracking-widest">BERITA</a>
                @if($news->category)
                    <i class="fas fa-chevron-right text-[8px] text-gray-700"></i>
                    <span class="text-[#F3DCEB] font-extrabold">{{ strtoupper($news->category) }}</span>
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
                                class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#932F80]/10 text-[#932F80] text-[10px] font-extrabold rounded-xl hover:bg-[#932F80] hover:text-white transition-all duration-500 mb-8 border border-[#932F80]/20 uppercase tracking-widest shadow-glow" data-aos="fade-down" data-aos-delay="200">
                                <i class="fas fa-folder text-[10px]"></i>
                                {{ $news->category }}
                            </a>
                        @endif

                        <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold text-[#2A1424] leading-[1.1] mb-10 tracking-tight drop-shadow-sm" data-aos="zoom-in" data-aos-delay="400">
                            {{ $news->title }}
                        </h1>

                        {{-- Meta Info --}}
                        <div class="flex flex-wrap items-center gap-8 pb-10 border-b border-gray-200" data-aos="fade-up" data-aos-delay="600">
                            <div class="flex items-center gap-4 group" data-aos="fade-right" data-aos-delay="700">
                                <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center border border-gray-100 group-hover:bg-[#932F80] transition-colors duration-500 shadow-lg shadow-purple-900/5">
                                    <i class="fas fa-user text-[#932F80] group-hover:text-white transition-colors"></i>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">Penulis</span>
                                    <span class="text-[#2A1424] font-extrabold">{{ $news->author ?? 'Admin' }}</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 group" data-aos="fade-right" data-aos-delay="800">
                                <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center border border-gray-100 group-hover:bg-blue-600 transition-colors duration-500 shadow-lg shadow-blue-900/5">
                                    <i class="far fa-calendar text-blue-500 group-hover:text-white transition-colors"></i>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">Publikasi</span>
                                    <span class="text-[#2A1424] font-extrabold">{{ $news->published_at->format('d M Y') }}</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 group" data-aos="fade-right" data-aos-delay="900">
                                <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center border border-gray-100 group-hover:bg-purple-600 transition-colors duration-500 shadow-lg shadow-purple-900/5">
                                    <i class="far fa-eye text-purple-500 group-hover:text-white transition-colors"></i>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">Dibaca</span>
                                    <span class="text-[#2A1424] font-extrabold">{{ number_format($news->views) }}</span>
                                </div>
                            </div>
                        </div>
                    </header>

                    {{-- Featured Image --}}
                    @if($news->image)
                        <figure class="mb-14 rounded-[3rem] overflow-hidden shadow-2xl shadow-purple-900/10 border border-purple-100 group" data-aos="zoom-in">
                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-[2s]"
                                onerror="this.src='https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=800'">
                        </figure>
                    @endif

                    {{-- Article Content --}}
                    <div
                        class="prose prose-lg max-w-none mb-16
                        prose-headings:text-[#2A1424] prose-headings:font-extrabold
                        prose-h2:text-3xl prose-h2:mt-16 prose-h2:mb-8 prose-h2:tracking-tight
                        prose-h3:text-2xl prose-h3:mt-12 prose-h3:mb-6 prose-h3:tracking-tight
                        prose-p:text-gray-600 prose-p:leading-relaxed prose-p:mb-8 prose-p:font-medium
                        prose-a:text-[#932F80] prose-a:font-bold prose-a:no-underline hover:prose-a:text-[#6E1F5F] transition-colors
                        prose-strong:text-[#2A1424] prose-strong:font-extrabold
                        prose-ul:my-8 prose-li:text-gray-600 prose-li:mb-3 prose-li:font-medium
                        prose-blockquote:border-l-4 prose-blockquote:border-[#932F80] prose-blockquote:bg-white prose-blockquote:py-8 prose-blockquote:px-10 prose-blockquote:rounded-3xl prose-blockquote:italic prose-blockquote:text-gray-700 prose-blockquote:shadow-sm" data-aos="fade-up">
                        {!! $news->content !!}
                    </div>

                    {{-- Tags --}}
                    @if($news->tags)
                        <div class="mb-14 pb-12 border-b border-gray-200" data-aos="fade-up">
                            <h4 class="text-[10px] font-extrabold text-gray-500 uppercase tracking-[0.3em] mb-8">TAGS</h4>
                            <div class="flex flex-wrap gap-4">
                                @foreach(explode(',', $news->tags) as $index => $tag)
                                    <span
                                        class="px-6 py-3 bg-white text-gray-500 text-xs font-bold rounded-2xl border border-gray-200 hover:bg-[#932F80]/10 hover:text-[#932F80] hover:border-[#932F80]/30 transition-all cursor-pointer uppercase tracking-widest shadow-sm" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 50) }}">
                                        #{{ trim($tag) }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Share Buttons --}}
                    <div class="bg-gradient-to-br from-white to-purple-50 border border-purple-100 rounded-[3rem] p-10 md:p-14 mb-14 relative overflow-hidden group shadow-xl shadow-purple-900/5" data-aos="fade-up">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-[#932F80]/5 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2 group-hover:bg-[#932F80]/10 transition-colors duration-700"></div>
                        <h4 class="font-extrabold text-[#2A1424] text-2xl mb-10 tracking-tight flex items-center gap-4 relative z-10">
                            <span class="w-10 h-10 bg-[#932F80] rounded-xl flex items-center justify-center shadow-lg shadow-[#932F80]/20">
                                <i class="fas fa-share-alt text-white text-sm"></i>
                            </span>
                            Bagikan Artikel
                        </h4>
                        <div class="flex flex-wrap gap-4 relative z-10">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                target="_blank"
                                class="inline-flex items-center gap-3 px-8 py-4 bg-[#1877F2]/10 border border-[#1877F2]/20 text-[#1877F2] rounded-2xl hover:bg-[#1877F2] hover:text-white transition-all duration-500 font-extrabold text-sm uppercase tracking-wider group-share shadow-sm hover:shadow-lg hover:shadow-[#1877F2]/20" data-aos="fade-up" data-aos-delay="100">
                                <i class="fab fa-facebook-f"></i>
                                Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($news->title) }}"
                                target="_blank"
                                class="inline-flex items-center gap-3 px-8 py-4 bg-[#1DA1F2]/10 border border-[#1DA1F2]/20 text-[#1DA1F2] rounded-2xl hover:bg-[#1DA1F2] hover:text-white transition-all duration-500 font-extrabold text-sm uppercase tracking-wider group-share shadow-sm hover:shadow-lg hover:shadow-[#1DA1F2]/20" data-aos="fade-up" data-aos-delay="200">
                                <i class="fab fa-twitter"></i>
                                Twitter
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($news->title . ' ' . request()->url()) }}"
                                target="_blank"
                                class="inline-flex items-center gap-3 px-8 py-4 bg-[#25D366]/10 border border-[#25D366]/20 text-[#25D366] rounded-2xl hover:bg-[#25D366] hover:text-white transition-all duration-500 font-extrabold text-sm uppercase tracking-wider group-share shadow-sm hover:shadow-lg hover:shadow-[#25D366]/20" data-aos="fade-up" data-aos-delay="300">
                                <i class="fab fa-whatsapp"></i>
                                WhatsApp
                            </a>
                            <button onclick="copyToClipboard('{{ request()->url() }}')"
                                class="inline-flex items-center gap-3 px-8 py-4 bg-white border border-gray-200 text-gray-600 rounded-2xl hover:bg-gray-50 hover:text-[#2A1424] transition-all duration-500 font-extrabold text-sm uppercase tracking-wider group-share shadow-sm" data-aos="fade-up" data-aos-delay="400">
                                <i class="fas fa-link"></i>
                                Salin Link
                            </button>
                        </div>
                    </div>

                    {{-- Author Box --}}
                    <div class="bg-white border border-purple-100 rounded-[3rem] p-10 flex flex-col md:flex-row items-center gap-10 shadow-xl shadow-purple-900/5 group" data-aos="fade-up">
                        <div
                            class="w-28 h-28 bg-gradient-to-br from-[#932F80] to-[#6E1F5F] rounded-[2rem] flex items-center justify-center flex-shrink-0 shadow-2xl shadow-[#932F80]/20 transition-transform duration-700 group-hover:rotate-6">
                            <i class="fas fa-user-ninja text-4xl text-white"></i>
                        </div>
                        <div class="text-center md:text-left">
                            <span class="text-[10px] font-extrabold text-[#932F80] uppercase tracking-[0.3em] mb-2 block">DITULIS OLEH</span>
                            <h4 class="text-2xl font-extrabold text-[#2A1424] mb-4 tracking-tight">{{ $news->author ?? 'Redaksi Sekolah' }}</h4>
                            <p class="text-gray-500 text-sm leading-relaxed font-medium">Tim redaksi {{ $settings['school_name'] ?? 'SMK YAJ' }} yang
                                berdedikasi untuk menyajikan informasi terkini dan akurat seputar kegiatan dan perkembangan sekolah.</p>
                        </div>
                    </div>
                </article>

                {{-- Sidebar - 4 columns --}}
                <aside class="lg:col-span-4 space-y-12">
                    {{-- Search Box --}}
                    <div class="bg-white border border-gray-200 rounded-[2.5rem] p-8 shadow-xl shadow-purple-900/5" data-aos="fade-left">
                        <h3 class="font-extrabold text-[#2A1424] text-xl mb-8 flex items-center gap-3 tracking-tight">
                            <i class="fas fa-search text-[#932F80]"></i>
                            Cari Berita
                        </h3>
                        <form action="{{ route('news') }}" method="GET">
                            <div class="relative group">
                                <input type="text" name="search" placeholder="Cari artikel..."
                                    class="w-full px-6 py-5 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-[#932F80] focus:border-transparent transition-all outline-none text-[#2A1424] text-sm placeholder:text-gray-400 font-bold tracking-wide">
                                <button type="submit"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 w-12 h-12 bg-[#932F80] rounded-xl flex items-center justify-center text-white hover:bg-[#6E1F5F] transition-all duration-300 shadow-lg shadow-[#932F80]/20">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- Latest News --}}
                    <div class="bg-white border border-gray-200 rounded-[2.5rem] p-8 shadow-xl shadow-purple-900/5" data-aos="fade-left" data-aos-delay="200">
                        <h3 class="font-extrabold text-[#2A1424] text-xl mb-8 flex items-center gap-3 tracking-tight">
                            <i class="fas fa-bolt text-[#932F80]"></i>
                            Berita Terbaru
                        </h3>
                        <div class="space-y-6">
                            @foreach($latestNews ?? $relatedNews as $index => $item)
                                <a href="{{ route('news.show', $item->slug) }}"
                                    class="group flex gap-5 pb-6 border-b border-gray-100 last:border-0 last:pb-0" data-aos="fade-left" data-aos-delay="{{ 300 + ($index * 100) }}">
                                    <div class="w-20 h-20 flex-shrink-0 rounded-2xl overflow-hidden bg-gray-100 border border-gray-200 group-hover:border-[#932F80]/50 transition-all duration-500">
                                        @if($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                                class="w-full h-full object-cover group-hover:scale-125 transition-transform duration-700">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-[#932F80]/10">
                                                <i class="fas fa-newspaper text-[#932F80] group-hover:scale-125 transition-transform"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-extrabold text-[#2A1424] text-sm line-clamp-2 group-hover:text-[#932F80] transition-colors mb-3 leading-snug tracking-tight">
                                            {{ $item->title }}
                                        </h4>
                                        <div class="flex items-center gap-2 text-[10px] font-bold text-gray-500 uppercase tracking-widest">
                                            <i class="far fa-calendar text-[#932F80]"></i>
                                            <span>{{ $item->published_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <a href="{{ route('news') }}"
                            class="mt-8 block text-center py-4 bg-[#932F80]/10 text-[#932F80] font-extrabold rounded-2xl hover:bg-[#932F80] hover:text-white transition-all duration-500 border border-[#932F80]/30 text-xs tracking-[0.2em] uppercase" data-aos="fade-up" data-aos-delay="400">
                            LIHAT SEMUA
                        </a>
                    </div>

                    {{-- Categories --}}
                    <div class="bg-white border border-gray-200 rounded-[2.5rem] p-8 shadow-xl shadow-purple-900/5" data-aos="fade-left" data-aos-delay="400">
                        <h3 class="font-extrabold text-[#2A1424] text-xl mb-8 flex items-center gap-3 tracking-tight">
                            <i class="fas fa-folder-open text-[#932F80]"></i>
                            Kategori Berita
                        </h3>
                        <div class="grid gap-3">
                            @php
                                $categories = [
                                    ['name' => 'Kegiatan', 'icon' => 'fa-calendar-alt', 'color' => '#932F80'],
                                    ['name' => 'Pengumuman', 'icon' => 'fa-bullhorn', 'color' => '#3B82F6'],
                                    ['name' => 'Prestasi', 'icon' => 'fa-trophy', 'color' => '#F59E0B'],
                                    ['name' => 'Workshop', 'icon' => 'fa-laptop-code', 'color' => '#8B5CF6'],
                                    ['name' => 'Kunjungan', 'icon' => 'fa-bus', 'color' => '#06B6D4'],
                                ];
                            @endphp
                            @foreach($categories as $index => $cat)
                                <a href="{{ route('news') }}?category={{ $cat['name'] }}"
                                    class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl border border-gray-100 hover:border-[#932F80]/50 hover:bg-[#932F80]/10 transition-all group" data-aos="fade-left" data-aos-delay="{{ 500 + ($index * 100) }}">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center border border-gray-200 group-hover:bg-[#932F80] transition-all duration-500 shadow-sm">
                                            <i class="fas {{ $cat['icon'] }} text-[#932F80] group-hover:text-white transition-colors text-xs"></i>
                                        </div>
                                        <span class="font-bold text-gray-500 group-hover:text-[#2A1424] transition-colors text-sm tracking-tight">{{ $cat['name'] }}</span>
                                    </div>
                                    <i class="fas fa-chevron-right text-gray-400 group-hover:text-[#932F80] group-hover:translate-x-1 transition-all text-xs"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    {{-- PPDB CTA --}}
                    @if(($settings['ppdb_active'] ?? false))
                       <div class="bg-gradient-to-br from-[#932F80] via-[#6E1F5F] to-[#2A1424] rounded-[2.5rem] p-10 text-white relative overflow-hidden shadow-2xl group shadow-[#932F80]/20" data-aos="fade-left" data-aos-delay="600">
                            <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-white/20 transition-all duration-700"></div>
                            <div class="relative z-10">
                                <span class="text-[10px] font-extrabold text-[#F3DCEB] tracking-[0.4em] uppercase mb-4 block">Registration</span>
                                <h3 class="font-extrabold text-3xl mb-6 tracking-tight leading-tight">Pendaftaran PPDB</h3>
                                <p class="text-[#F3DCEB] text-sm mb-10 font-medium leading-relaxed">Segera bergabung dengan keluarga besar kami. Raih masa depan gemilang bersama {{ $settings['school_name'] ?? 'SMK YAJ' }}!</p>
                                <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                                    class="inline-flex items-center gap-4 px-10 py-5 bg-white text-[#932F80] font-extrabold rounded-2xl hover:bg-gray-100 transition-all shadow-xl w-full justify-center hover:-translate-y-1 transform">
                                    <i class="fas fa-user-plus text-xl"></i>
                                    DAFTAR SEKARANG
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
                                @if(is_object($social))
                                    <a href="{{ $social->url }}" target="_blank"
                                        class="w-12 h-12 bg-gray-50 rounded-xl flex items-center justify-center text-gray-600 hover:bg-[#932F80] hover:text-white transition-all duration-300 hover:-translate-y-1">
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
        <section class="py-24 bg-white relative border-t border-gray-200 overflow-hidden">
            @include('partials.awards-shapes')
            <div class="container mx-auto px-4 lg:px-8 relative z-10">
                <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-16 gap-8">
                    <div>
                        <span class="text-[10px] font-extrabold text-[#932F80] tracking-[0.4em] uppercase mb-4 block whitespace-nowrap">Explore More</span>
                        <h2 class="text-4xl md:text-5xl font-extrabold text-[#2A1424] tracking-tight">Berita <span class="text-[#932F80]">Terkait</span></h2>
                    </div>
                    <a href="{{ route('news') }}"
                        class="inline-flex items-center gap-4 text-[#932F80] font-extrabold text-xs tracking-widest uppercase hover:text-white transition-all bg-[#932F80]/10 px-8 py-4 rounded-2xl border border-[#932F80]/20 hover:bg-[#932F80] hover:-translate-y-1 transform whitespace-nowrap shadow-lg">
                        LIHAT SEMUA
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="grid md:grid-cols-3 gap-10">
                    @foreach($relatedNews as $index => $related)
                        <a href="{{ route('news.show', $related->slug) }}"
                            class="group bg-white rounded-[3rem] overflow-hidden border border-gray-200 hover:border-[#932F80]/50 shadow-2xl shadow-purple-900/5 transition-all duration-700 hover:-translate-y-3" data-aos="fade-up" data-aos-delay="{{ $index * 150 }}">
                            <div class="relative h-60 overflow-hidden bg-gray-100">
                                @if($related->image)
                                    <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}"
                                        class="w-full h-full object-cover group-hover:scale-125 transition-transform duration-[2s]">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-purple-50 to-white flex items-center justify-center">
                                        <i class="fas fa-newspaper text-6xl text-purple-200"></i>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-[#2A1424]/80 to-transparent"></div>
                                @if($related->category)
                                    <span
                                        class="absolute top-6 left-6 px-4 py-2 bg-[#932F80] text-white text-[10px] font-extrabold rounded-xl shadow-xl shadow-[#932F80]/30 tracking-widest uppercase">
                                        {{ $related->category }}
                                    </span>
                                @endif
                            </div>
                            <div class="p-10">
                                <div class="flex items-center gap-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-6">
                                    <span class="flex items-center gap-2"><i class="far fa-calendar text-[#932F80]"></i> {{ $related->published_at->format('d M Y') }}</span>
                                    <span class="flex items-center gap-2"><i class="far fa-eye text-[#932F80]"></i> {{ number_format($related->views) }}</span>
                                </div>
                                <h3 class="text-xl font-extrabold text-[#2A1424] line-clamp-2 group-hover:text-[#932F80] transition-colors leading-[1.3] tracking-tight">
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
                toast.className = 'fixed bottom-10 right-10 bg-[#932F80] text-white px-8 py-4 rounded-2xl shadow-2xl z-[100] animate-bounce font-extrabold text-sm tracking-widest flex items-center gap-3 border border-white/20';
                toast.innerHTML = '<i class="fas fa-check-circle text-xl"></i> LINK DISALIN!';
                document.body.appendChild(toast);

                setTimeout(() => {
                    toast.classList.add('opacity-0', 'transition-all', 'duration-500', 'translate-y-10');
                    setTimeout(() => toast.remove(), 500);
                }, 3000);
            });
        }
    </script>
@endpush