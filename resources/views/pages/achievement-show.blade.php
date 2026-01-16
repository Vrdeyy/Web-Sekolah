@extends('layouts.app')

@section('title', $achievement->title)

@section('content')
    {{-- Breadcrumb Navigation --}}
    <section class="pt-28 pb-8 bg-premium-dark relative overflow-hidden flex items-center">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <nav class="flex flex-wrap items-center gap-2 text-xs md:text-[10px] font-black uppercase tracking-[0.2em]"
                data-aos="fade-down">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-[#8C51A5] transition-colors">
                    <i class="fas fa-home"></i>
                </a>
                <i class="fas fa-chevron-right text-[8px] text-gray-700"></i>
                <a href="{{ route('achievements') }}"
                    class="text-gray-400 hover:text-[#8C51A5] transition-colors tracking-widest">PRESTASI</a>
                <i class="fas fa-chevron-right text-[8px] text-gray-700"></i>
                <span
                    class="text-[#F8CB62] font-black line-clamp-1 break-all">{{ \Illuminate\Support\Str::limit(strtoupper($achievement->title), 30) }}</span>
            </nav>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="py-12 md:py-16 bg-[#F0E7F8]/30 relative">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-8 md:gap-12">
                {{-- Main Content - 8 columns --}}
                <article class="lg:col-span-8">
                    {{-- Title --}}
                    <header class="mb-12" data-aos="fade-up">
                        <div class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#8C51A5]/10 text-[#8C51A5] text-[10px] font-black rounded-xl hover:bg-[#8C51A5] hover:text-white transition-all duration-500 mb-8 border border-[#8C51A5]/20 uppercase tracking-widest shadow-lg"
                            data-aos="fade-down" data-aos-delay="200">
                            <i class="fas fa-trophy text-[10px] text-[#F8CB62]"></i>
                            Prestasi Siswa
                        </div>

                        <h1 class="text-3xl md:text-5xl lg:text-7xl font-black text-[#612F73] leading-tight mb-6 md:mb-10 tracking-tight drop-shadow-sm"
                            data-aos="zoom-in" data-aos-delay="400">
                            {{ $achievement->title }}
                        </h1>

                        {{-- Meta Info --}}
                        <div class="flex flex-wrap items-center gap-8 pb-10 border-b border-gray-100" data-aos="fade-up"
                            data-aos-delay="600">
                            @if($achievement->competition_name)
                                <div class="flex items-center gap-4 group" data-aos="fade-right" data-aos-delay="700">
                                    <div
                                        class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center border border-[#8C51A5]/10 group-hover:bg-[#8C51A5] transition-colors duration-500 shadow-lg shadow-[#612F73]/5">
                                        <i class="fas fa-award text-[#8C51A5] group-hover:text-white transition-colors"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <span
                                            class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Ajang</span>
                                        <span
                                            class="text-[#612F73] font-black text-sm">{{ $achievement->competition_name }}</span>
                                    </div>
                                </div>
                            @endif

                            @if($achievement->year)
                                <div class="flex items-center gap-4 group" data-aos="fade-right" data-aos-delay="800">
                                    <div
                                        class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center border border-[#8C51A5]/10 group-hover:bg-[#8C51A5] transition-colors duration-500 shadow-lg shadow-[#612F73]/5">
                                        <i class="far fa-calendar text-[#8C51A5] group-hover:text-white transition-colors"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <span
                                            class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Tahun</span>
                                        <span class="text-[#612F73] font-black text-sm">{{ $achievement->year }}</span>
                                    </div>
                                </div>
                            @endif

                            @if($achievement->rank)
                                <div class="flex items-center gap-4 group" data-aos="fade-right" data-aos-delay="900">
                                    <div
                                        class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center border border-[#8C51A5]/10 group-hover:bg-[#F8CB62] transition-colors duration-500 shadow-lg shadow-[#F8CB62]/10">
                                        <i class="fas fa-medal text-[#F8CB62] group-hover:text-white transition-colors"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <span
                                            class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Peringkat</span>
                                        <span class="text-[#612F73] font-black text-sm">{{ $achievement->rank }}</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </header>

                    {{-- Featured Image --}}
                    @if($achievement->image)
                        <figure
                            class="mb-10 md:mb-14 rounded-3xl md:rounded-[3rem] overflow-hidden shadow-premium-lg border border-[#8C51A5]/10 group"
                            data-aos="zoom-in">
                            <img src="{{ asset('storage/' . $achievement->image) }}" alt="{{ $achievement->title }}"
                                class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-[2s]"
                                onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($achievement->title) }}&background=8C51A5&color=fff&size=800'">
                        </figure>
                    @endif

                    {{-- Description Content --}}
                    <div class="prose prose-base md:prose-lg max-w-none mb-16
                                                    prose-headings:text-[#612F73] prose-headings:font-black
                                                    prose-h2:text-3xl prose-h2:mt-16 prose-h2:mb-8 prose-h2:tracking-tight
                                                    prose-p:text-gray-500 prose-p:leading-relaxed prose-p:mb-8 prose-p:font-medium
                                                    prose-a:text-[#8C51A5] prose-a:font-black prose-a:no-underline hover:prose-a:text-[#612F73] transition-colors
                                                    prose-strong:text-[#612F73] prose-strong:font-black
                                                    prose-ul:my-8 prose-li:text-gray-500 prose-li:mb-3 prose-li:font-medium
                                                    prose-blockquote:border-l-4 prose-blockquote:border-[#8C51A5] prose-blockquote:bg-white prose-blockquote:py-8 prose-blockquote:px-10 prose-blockquote:rounded-3xl prose-blockquote:italic prose-blockquote:text-gray-500 prose-blockquote:shadow-sm"
                        data-aos="fade-up">
                        {!! $achievement->description !!}
                    </div>

                </article>

                {{-- Sidebar - 4 columns --}}
                <aside class="lg:col-span-4 space-y-8 md:space-y-12">


                    {{-- Other Achievements --}}
                    <div class="bg-white border border-[#8C51A5]/10 rounded-3xl md:rounded-[2.5rem] p-6 md:p-8 shadow-premium-lg"
                        data-aos="fade-left">
                        <h3 class="font-black text-[#612F73] text-xl mb-8 flex items-center gap-3 tracking-tight">
                            <i class="fas fa-trophy text-[#8C51A5]"></i>
                            Prestasi Lainnya
                        </h3>
                        <div class="space-y-6">
                            @foreach($relatedAchievements as $index => $item)
                                <a href="{{ route('achievement.show', $item->slug) }}"
                                    class="group flex gap-5 pb-6 border-b border-gray-50 last:border-0 last:pb-0"
                                    data-aos="fade-left" data-aos-delay="{{ 100 + ($index * 100) }}">
                                    <div
                                        class="w-20 h-20 flex-shrink-0 rounded-2xl overflow-hidden bg-gray-50 border border-[#8C51A5]/10 group-hover:border-[#8C51A5]/50 transition-all duration-500">
                                        @if($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                                class="w-full h-full object-cover group-hover:scale-125 transition-transform duration-700">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-[#8C51A5]/10">
                                                <i
                                                    class="fas fa-trophy text-[#8C51A5] group-hover:scale-125 transition-transform"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0 flex flex-col justify-center">
                                        <h4
                                            class="font-black text-[#612F73] text-sm line-clamp-2 group-hover:text-[#8C51A5] transition-colors leading-snug tracking-tight mb-1 uppercase">
                                            {{ $item->title }}
                                        </h4>
                                        <span
                                            class="text-[9px] text-[#8C51A5] font-black uppercase tracking-widest">{{ $item->date ? \Carbon\Carbon::parse($item->date)->format('Y') : '' }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <a href="{{ route('achievements') }}"
                            class="mt-8 block text-center py-4 bg-[#8C51A5]/10 text-[#8C51A5] font-black rounded-2xl hover:bg-[#8C51A5] hover:text-white transition-all duration-500 border border-[#8C51A5]/30 text-[10px] tracking-[0.2em] uppercase"
                            data-aos="fade-up" data-aos-delay="400">
                            LIHAT SEMUA
                        </a>
                    </div>

                    {{-- Latest News (Optional) --}}
                    <div
                        class="bg-white border border-[#8C51A5]/10 rounded-3xl md:rounded-[2.5rem] p-6 md:p-8 shadow-premium-lg">
                        <h3 class="font-black text-[#612F73] text-xl mb-8 flex items-center gap-3 tracking-tight">
                            <i class="fas fa-newspaper text-[#8C51A5]"></i>
                            Berita Terbaru
                        </h3>
                        <div class="space-y-6">
                            @foreach($latestNews ?? [] as $item)
                                @if(is_object($item))
                                    <a href="{{ route('news.show', $item->slug) }}"
                                        class="group flex gap-5 pb-6 border-b border-gray-50 last:border-0 last:pb-0">
                                        <div class="flex-1 min-w-0">
                                            <h4
                                                class="font-black text-[#612F73] text-sm line-clamp-2 group-hover:text-[#8C51A5] transition-colors mb-1 leading-snug tracking-tight">
                                                {{ $item->title }}
                                            </h4>
                                            <div
                                                class="flex items-center gap-2 text-[9px] font-black text-gray-400 uppercase tracking-widest">
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