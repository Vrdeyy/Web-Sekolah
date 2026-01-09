@extends('layouts.app')

@section('title', $businessCenter->name)

@section('content')
    {{-- Breadcrumb Navigation --}}
    <section
        class="pt-28 pb-8 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden flex items-center">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <nav class="flex flex-wrap items-center gap-2 text-xs md:text-[10px] font-extrabold uppercase tracking-[0.2em]" data-aos="fade-down">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-[#F3DCEB] transition-colors">
                    <i class="fas fa-home"></i>
                </a>
                <i class="fas fa-chevron-right text-[8px] text-gray-700"></i>
                <a href="{{ route('business-centers') }}"
                    class="text-gray-400 hover:text-[#F3DCEB] transition-colors tracking-widest">PUSAT BISNIS</a>
                <i class="fas fa-chevron-right text-[8px] text-gray-700"></i>
                <span
                    class="text-[#F3DCEB] font-extrabold line-clamp-1 break-all">{{ strtoupper($businessCenter->name) }}</span>
            </nav>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="py-12 md:py-16 bg-white relative">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-8 md:gap-12">
                {{-- Main Content - 8 columns --}}
                <article class="lg:col-span-8">
                    {{-- Title --}}
                    <header class="mb-12" data-aos="fade-up">
                        <div
                            class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#932F80]/10 text-[#932F80] text-[10px] font-extrabold rounded-xl hover:bg-[#932F80] hover:text-white transition-all duration-500 mb-8 border border-[#932F80]/20 uppercase tracking-widest shadow-glow" data-aos="fade-down" data-aos-delay="200">
                            <i class="fas fa-store text-[10px]"></i>
                            Unit Usaha
                        </div>

                        <h1
                            class="text-3xl md:text-5xl lg:text-7xl font-extrabold text-[#2A1424] leading-tight mb-6 md:mb-10 tracking-tight drop-shadow-sm" data-aos="zoom-in" data-aos-delay="400">
                            {{ $businessCenter->name }}
                        </h1>

                        {{-- Meta Info --}}
                        <div class="flex flex-wrap items-center gap-8 pb-10 border-b border-gray-200" data-aos="fade-up" data-aos-delay="600">
                            @if($businessCenter->location)
                                <div class="flex items-center gap-4 group" data-aos="fade-right" data-aos-delay="700">
                                    <div
                                        class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center border border-gray-100 group-hover:bg-[#932F80] transition-colors duration-500 shadow-lg shadow-purple-900/5">
                                        <i
                                            class="fas fa-map-marker-alt text-[#932F80] group-hover:text-white transition-colors"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <span
                                            class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">Lokasi</span>
                                        <span class="text-[#2A1424] font-extrabold">{{ $businessCenter->location }}</span>
                                    </div>
                                </div>
                            @endif

                            @if($businessCenter->phone)
                                <div class="flex items-center gap-4 group" data-aos="fade-right" data-aos-delay="800">
                                    <div
                                        class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center border border-gray-100 group-hover:bg-blue-600 transition-colors duration-500 shadow-lg shadow-blue-900/5">
                                        <i class="fas fa-phone text-blue-500 group-hover:text-white transition-colors"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <span
                                            class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">Telepon</span>
                                        <span class="text-[#2A1424] font-extrabold">{{ $businessCenter->phone }}</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </header>

                    {{-- Featured Image --}}
                    @if($businessCenter->image)
                        <figure
                            class="mb-10 md:mb-14 rounded-3xl md:rounded-[3rem] overflow-hidden shadow-2xl shadow-purple-900/10 border border-purple-100 group" data-aos="zoom-in">
                            <img src="{{ asset('storage/' . $businessCenter->image) }}" alt="{{ $businessCenter->name }}"
                                class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-[2s]"
                                onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($businessCenter->name) }}&background=932F80&color=fff&size=800'">
                        </figure>
                    @endif

                    {{-- Description Content --}}
                    <div
                        class="prose prose-base md:prose-lg max-w-none mb-16
                                        prose-headings:text-[#2A1424] prose-headings:font-extrabold
                                        prose-h2:text-3xl prose-h2:mt-16 prose-h2:mb-8 prose-h2:tracking-tight
                                        prose-p:text-gray-600 prose-p:leading-relaxed prose-p:mb-8 prose-p:font-medium
                                        prose-a:text-[#932F80] prose-a:font-bold prose-a:no-underline hover:prose-a:text-[#6E1F5F] transition-colors
                                        prose-strong:text-[#2A1424] prose-strong:font-extrabold
                                        prose-ul:my-8 prose-li:text-gray-600 prose-li:mb-3 prose-li:font-medium
                                        prose-blockquote:border-l-4 prose-blockquote:border-[#932F80] prose-blockquote:bg-white prose-blockquote:py-8 prose-blockquote:px-10 prose-blockquote:rounded-3xl prose-blockquote:italic prose-blockquote:text-gray-700 prose-blockquote:shadow-sm" data-aos="fade-up">
                        {!! $businessCenter->description !!}
                    </div>

                    {{-- Promo / Visit CTA --}}
                    <div
                        class="bg-gradient-to-br from-white to-[#932F80]/5 border border-purple-100 rounded-3xl md:rounded-[3rem] p-8 md:p-14 mb-14 shadow-xl flex flex-col md:flex-row items-center gap-10" data-aos="fade-up">
                        <div
                            class="w-24 h-24 bg-[#932F80] rounded-3xl flex items-center justify-center shadow-lg flex-shrink-0" data-aos="zoom-in" data-aos-delay="200">
                            <i class="fas fa-shopping-cart text-4xl text-white"></i>
                        </div>
                        <div class="text-center md:text-left">
                            <h3 class="text-2xl font-extrabold text-[#2A1424] mb-3 tracking-tight" data-aos="fade-left" data-aos-delay="300">Kunjungi Business Center
                                Kami</h3>
                            <p class="text-gray-500 mb-6 leading-relaxed" data-aos="fade-left" data-aos-delay="400">Nikmati produk dan layanan terbaik hasil karya
                                siswa {{ $settings['school_name'] ?? 'SMK YAJ' }}.</p>
                            @if($businessCenter->phone)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $businessCenter->phone) }}"
                                    target="_blank"
                                    class="inline-flex items-center gap-4 px-10 py-4 bg-[#25D366] text-white font-extrabold rounded-2xl hover:bg-[#128C7E] transition-all shadow-xl" data-aos="fade-up" data-aos-delay="500">
                                    <i class="fab fa-whatsapp text-xl"></i>
                                    PESAN SEKARANG
                                </a>
                            @endif
                        </div>
                    </div>

                </article>

                {{-- Sidebar - 4 columns --}}
                <aside class="lg:col-span-4 space-y-8 md:space-y-12">

                    {{-- Operational Info --}}
                    <div
                        class="bg-white border border-gray-200 rounded-3xl md:rounded-[2.5rem] p-6 md:p-8 shadow-xl shadow-purple-900/5" data-aos="fade-left">
                        <h3 class="font-extrabold text-[#2A1424] text-xl mb-8 flex items-center gap-3 tracking-tight">
                            <i class="fas fa-info-circle text-[#932F80]"></i>
                            Informasi Operasional
                        </h3>
                        <ul class="space-y-6">
                            <li class="flex items-center gap-5 pb-6 border-b border-gray-100 group" data-aos="fade-left" data-aos-delay="100">
                                <div
                                    class="w-12 h-12 bg-[#932F80]/10 rounded-2xl flex items-center justify-center group-hover:bg-[#932F80] transition-all duration-300 shadow-lg shadow-[#932F80]/10">
                                    <i class="fas fa-clock text-[#932F80] group-hover:text-white transition-colors"></i>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Jam
                                        Operasional</span>
                                    <span class="font-extrabold text-[#2A1424] tracking-wide">08:00 - 16:00 WIB</span>
                                </div>
                            </li>
                            <li class="flex items-center gap-5 pb-6 border-b border-gray-100 group" data-aos="fade-left" data-aos-delay="200">
                                <div
                                    class="w-12 h-12 bg-green-500/10 rounded-2xl flex items-center justify-center group-hover:bg-green-600 transition-all duration-300 shadow-lg shadow-green-500/10">
                                    <i class="fas fa-door-open text-green-500 group-hover:text-white transition-colors"></i>
                                </div>
                                <div class="flex flex-col">
                                    <span
                                        class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Status</span>
                                    <span class="font-extrabold text-[#2A1424] tracking-wide">BUKA HARI INI</span>
                                </div>
                            </li>
                            <li class="flex items-center gap-5 group" data-aos="fade-left" data-aos-delay="300">
                                <div
                                    class="w-12 h-12 bg-blue-500/10 rounded-2xl flex items-center justify-center group-hover:bg-blue-600 transition-all duration-300 shadow-lg shadow-blue-500/10">
                                    <i class="fas fa-tags text-blue-500 group-hover:text-white transition-colors"></i>
                                </div>
                                <div class="flex flex-col">
                                    <span
                                        class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Kategori</span>
                                    <span class="font-extrabold text-[#2A1424] tracking-wide">TEACHING FACTORY</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    {{-- Other Business Centers --}}
                    <div
                        class="bg-white border border-gray-200 rounded-3xl md:rounded-[2.5rem] p-6 md:p-8 shadow-xl shadow-purple-900/5" data-aos="fade-left">
                        <h3 class="font-extrabold text-[#2A1424] text-xl mb-8 flex items-center gap-3 tracking-tight">
                            <i class="fas fa-store text-[#932F80]"></i>
                            Unit Usaha Lainnya
                        </h3>
                        <div class="space-y-6">
                            @foreach($relatedBusinessCenters as $index => $item)
                                <a href="{{ route('business-center.show', $item->slug) }}"
                                    class="group flex gap-5 pb-6 border-b border-gray-100 last:border-0 last:pb-0" data-aos="fade-left" data-aos-delay="{{ 100 + ($index * 100) }}">
                                    <div
                                        class="w-20 h-20 flex-shrink-0 rounded-2xl overflow-hidden bg-gray-100 border border-gray-200 group-hover:border-[#932F80]/50 transition-all duration-500">
                                        @if($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                                class="w-full h-full object-cover group-hover:scale-125 transition-transform duration-700">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-[#932F80]/10">
                                                <i
                                                    class="fas fa-store text-[#932F80] group-hover:scale-125 transition-transform"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0 flex items-center">
                                        <h4
                                            class="font-extrabold text-[#2A1424] text-sm line-clamp-2 group-hover:text-[#932F80] transition-colors leading-snug tracking-tight">
                                            {{ $item->name }}
                                        </h4>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <a href="{{ route('business-centers') }}"
                            class="mt-8 block text-center py-4 bg-[#932F80]/10 text-[#932F80] font-extrabold rounded-2xl hover:bg-[#932F80] hover:text-white transition-all duration-500 border border-[#932F80]/30 text-xs tracking-[0.2em] uppercase" data-aos="fade-up" data-aos-delay="400">
                            LIHAT SEMUA
                        </a>
                    </div>

                    {{-- Latest News --}}
                    <div
                        class="bg-white border border-gray-200 rounded-3xl md:rounded-[2.5rem] p-6 md:p-8 shadow-xl shadow-purple-900/5">
                        <h3 class="font-extrabold text-[#2A1424] text-xl mb-8 flex items-center gap-3 tracking-tight">
                            <i class="fas fa-newspaper text-[#932F80]"></i>
                            Berita Terbaru
                        </h3>
                        <div class="space-y-6">
                            @foreach($latestNews ?? [] as $item)
                                @if(is_object($item))
                                    <a href="{{ route('news.show', $item->slug) }}"
                                        class="group flex gap-5 pb-6 border-b border-gray-100 last:border-0 last:pb-0">
                                        <div class="flex-1 min-w-0">
                                            <h4
                                                class="font-extrabold text-[#2A1424] text-sm line-clamp-2 group-hover:text-[#932F80] transition-colors mb-1 leading-snug tracking-tight">
                                                {{ $item->title }}
                                            </h4>
                                            <div
                                                class="flex items-center gap-2 text-[10px] font-bold text-gray-500 uppercase tracking-widest">
                                                <span>{{ $item->published_at ? $item->published_at->format('d M Y') : '' }}</span>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </section>
@endsection