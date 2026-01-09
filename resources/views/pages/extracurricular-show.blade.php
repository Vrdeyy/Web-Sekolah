@extends('layouts.app')

@section('title', $extracurricular->name)

@section('content')
    {{-- Breadcrumb Navigation --}}
    <section
        class="pt-28 pb-8 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden flex items-center">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <nav class="flex flex-wrap items-center gap-2 text-xs md:text-[10px] font-extrabold uppercase tracking-[0.2em]"
                data-aos="fade-down">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-[#F3DCEB] transition-colors">
                    <i class="fas fa-home"></i>
                </a>
                <i class="fas fa-chevron-right text-[8px] text-gray-700"></i>
                <a href="{{ route('extracurriculars') }}"
                    class="text-gray-400 hover:text-[#F3DCEB] transition-colors tracking-widest">EKSTRAKURIKULER</a>
                <i class="fas fa-chevron-right text-[8px] text-gray-700"></i>
                <span
                    class="text-[#F3DCEB] font-extrabold line-clamp-1 break-all">{{ strtoupper($extracurricular->name) }}</span>
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
                        <div class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#932F80]/10 text-[#932F80] text-[10px] font-extrabold rounded-xl hover:bg-[#932F80] hover:text-white transition-all duration-500 mb-8 border border-[#932F80]/20 uppercase tracking-widest shadow-glow"
                            data-aos="fade-down" data-aos-delay="200">
                            <i class="fas fa-running text-[10px]"></i>
                            Ekstrakurikuler
                        </div>

                        <h1 class="text-3xl md:text-5xl lg:text-7xl font-extrabold text-[#2A1424] leading-tight mb-6 md:mb-10 tracking-tight drop-shadow-sm"
                            data-aos="zoom-in" data-aos-delay="400">
                            {{ $extracurricular->name }}
                        </h1>

                        {{-- Meta Info --}}
                        <div class="flex flex-wrap items-center gap-8 pb-10 border-b border-gray-200" data-aos="fade-up"
                            data-aos-delay="600">
                            @if($extracurricular->coach)
                                <div class="flex items-center gap-4 group" data-aos="fade-right" data-aos-delay="700">
                                    <div
                                        class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center border border-gray-100 group-hover:bg-[#932F80] transition-colors duration-500 shadow-lg shadow-purple-900/5">
                                        <i class="fas fa-user-tie text-[#932F80] group-hover:text-white transition-colors"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <span
                                            class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">Pembina</span>
                                        <span class="text-[#2A1424] font-extrabold">{{ $extracurricular->coach }}</span>
                                    </div>
                                </div>
                            @endif

                            @if($extracurricular->schedule)
                                <div class="flex items-center gap-4 group" data-aos="fade-right" data-aos-delay="800">
                                    <div
                                        class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center border border-gray-100 group-hover:bg-blue-600 transition-colors duration-500 shadow-lg shadow-blue-900/5">
                                        <i class="far fa-clock text-blue-500 group-hover:text-white transition-colors"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <span
                                            class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">Jadwal</span>
                                        <span class="text-[#2A1424] font-extrabold">{{ $extracurricular->schedule }}</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </header>

                    {{-- Featured Image --}}
                    @if($extracurricular->image)
                        <figure
                            class="mb-10 md:mb-14 rounded-3xl md:rounded-[3rem] overflow-hidden shadow-2xl shadow-purple-900/10 border border-purple-100 group"
                            data-aos="zoom-in">
                            <img src="{{ asset('storage/' . $extracurricular->image) }}" alt="{{ $extracurricular->name }}"
                                class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-[2s]"
                                onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($extracurricular->name) }}&background=932F80&color=fff&size=800'">
                        </figure>
                    @endif

                    {{-- Description Content --}}
                    <div class="prose prose-base md:prose-lg max-w-none mb-16
                                        prose-headings:text-[#2A1424] prose-headings:font-extrabold
                                        prose-h2:text-3xl prose-h2:mt-16 prose-h2:mb-8 prose-h2:tracking-tight
                                        prose-p:text-gray-600 prose-p:leading-relaxed prose-p:mb-8 prose-p:font-medium
                                        prose-a:text-[#932F80] prose-a:font-bold prose-a:no-underline hover:prose-a:text-[#6E1F5F] transition-colors
                                        prose-strong:text-[#2A1424] prose-strong:font-extrabold
                                        prose-ul:my-8 prose-li:text-gray-600 prose-li:mb-3 prose-li:font-medium
                                        prose-blockquote:border-l-4 prose-blockquote:border-[#932F80] prose-blockquote:bg-white prose-blockquote:py-8 prose-blockquote:px-10 prose-blockquote:rounded-3xl prose-blockquote:italic prose-blockquote:text-gray-700 prose-blockquote:shadow-sm"
                        data-aos="fade-up">
                        {!! $extracurricular->description !!}
                    </div>

                    {{-- Schedule/Details Box if available --}}
                    {{-- You can add schedule or other fields here if they exist in the model --}}
                </article>

                {{-- Sidebar - 4 columns --}}
                <aside class="lg:col-span-4 space-y-8 md:space-y-12">


                    {{-- Other Extracurriculars --}}
                    <div class="bg-white border border-gray-200 rounded-3xl md:rounded-[2.5rem] p-6 md:p-8 shadow-xl shadow-purple-900/5"
                        data-aos="fade-left">
                        <h3 class="font-extrabold text-[#2A1424] text-xl mb-8 flex items-center gap-3 tracking-tight">
                            <i class="fas fa-users text-[#932F80]"></i>
                            Ekskul Lainnya
                        </h3>
                        <div class="space-y-6">
                            @foreach($relatedExtracurriculars as $index => $item)
                                <a href="{{ route('extracurricular.show', $item->slug) }}"
                                    class="group flex gap-5 pb-6 border-b border-gray-100 last:border-0 last:pb-0"
                                    data-aos="fade-left" data-aos-delay="{{ 100 + ($index * 100) }}">
                                    <div
                                        class="w-20 h-20 flex-shrink-0 rounded-2xl overflow-hidden bg-gray-100 border border-gray-200 group-hover:border-[#932F80]/50 transition-all duration-500">
                                        @if($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                                class="w-full h-full object-cover group-hover:scale-125 transition-transform duration-700">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-[#932F80]/10">
                                                <i
                                                    class="fas fa-running text-[#932F80] group-hover:scale-125 transition-transform"></i>
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
                        <a href="{{ route('extracurriculars') }}"
                            class="mt-8 block text-center py-4 bg-[#932F80]/10 text-[#932F80] font-extrabold rounded-2xl hover:bg-[#932F80] hover:text-white transition-all duration-500 border border-[#932F80]/30 text-xs tracking-[0.2em] uppercase"
                            data-aos="fade-up" data-aos-delay="400">
                            LIHAT SEMUA
                        </a>
                    </div>

                    {{-- PPDB CTA --}}
                    @if(($settings['ppdb_active'] ?? false))
                        <div class="bg-gradient-to-br from-[#932F80] via-[#6E1F5F] to-[#2A1424] rounded-3xl md:rounded-[2.5rem] p-6 md:p-10 text-white relative overflow-hidden shadow-2xl group shadow-[#932F80]/20"
                            data-aos="fade-left" data-aos-delay="200">
                            <div
                                class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-white/20 transition-all duration-700">
                            </div>
                            <div class="relative z-10">
                                <span
                                    class="text-[10px] font-extrabold text-[#F3DCEB] tracking-[0.4em] uppercase mb-4 block">Bergabunglah</span>
                                <h3 class="font-extrabold text-3xl mb-6 tracking-tight leading-tight">Salurkan Bakatmu Disini!
                                </h3>
                                <p class="text-[#F3DCEB] text-sm mb-10 font-medium leading-relaxed">Daftarkan dirimu segera di
                                    {{ $settings['school_name'] ?? 'SMK YAJ' }} dan kembangkan potensimu.
                                </p>
                                <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                                    class="inline-flex items-center gap-4 px-10 py-5 bg-white text-[#932F80] font-extrabold rounded-2xl hover:bg-gray-100 transition-all shadow-xl w-full justify-center hover:-translate-y-1 transform">
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