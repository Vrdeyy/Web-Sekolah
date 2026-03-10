@extends('layouts.app')

@section('title', $achievement->title)

@section('content')
    {{-- PREMIUM HERO SECTION --}}
    <section class="relative pt-32 lg:pt-48 pb-12 lg:pb-32 overflow-hidden bg-premium-dark">
        {{-- Background Decorations --}}
        @include('partials.awards-shapes')
        
        {{-- Floating Elements --}}
        <div class="absolute top-1/4 right-0 text-[#F8CB62]/10 text-[20rem] font-black -rotate-12 pointer-events-none select-none animate-float-slow">
            <i class="fas fa-trophy"></i>
        </div>

        <div class="container mx-auto px-6 lg:px-12 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                {{-- Left: Text Info --}}
                <div class="space-y-6 md:space-y-8" data-aos="fade-right">
                    {{-- Badge --}}
                    <div class="inline-flex items-center gap-3 px-6 py-2 bg-white/10 backdrop-blur-md rounded-full border border-white/20 shadow-premium-lg">
                        <i class="fas fa-certificate text-[#F8CB62] animate-pulse"></i>
                        <span class="text-white text-[10px] font-black uppercase tracking-[0.3em]">Prestasi Kebanggaan Kami</span>
                    </div>

                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-white leading-[1.1] tracking-tight">
                        {{ $achievement->title }}
                    </h1>

                    @if($achievement->student_name)
                        <div class="flex items-center gap-4 p-4 rounded-3xl bg-white/5 border border-white/10 backdrop-blur-sm max-w-fit">
                            <div class="w-12 h-12 bg-gradient-to-tr from-[#F8CB62] to-[#f5b82e] rounded-2xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-user-graduate text-[#612F73]"></i>
                            </div>
                            <div>
                                <div class="text-[#F8CB62] text-[10px] font-black uppercase tracking-widest">Siswa Berprestasi</div>
                                <div class="text-white font-bold text-lg">{{ $achievement->student_name }}</div>
                            </div>
                        </div>
                    @endif

                    {{-- Breadcrumb (Light Version) --}}
                    <nav class="flex items-center gap-3 text-[10px] font-black uppercase tracking-widest text-gray-400">
                        <a href="{{ route('home') }}" class="hover:text-white transition-colors">HOME</a>
                        <i class="fas fa-chevron-right text-[8px]"></i>
                        <a href="{{ route('achievements') }}" class="hover:text-white transition-colors">PRESTASI</a>
                        <i class="fas fa-chevron-right text-[8px]"></i>
                        <span class="text-[#F8CB62]">{{ \Illuminate\Support\Str::limit($achievement->title, 20) }}</span>
                    </nav>
                </div>

                {{-- Right: Featured Photo --}}
                <div class="relative" data-aos="zoom-in" data-aos-delay="200">
                    {{-- Decorative Ring --}}
                    <div class="absolute -inset-4 border-2 border-[#F8CB62]/20 rounded-[3rem] animate-spin-slow pointer-events-none"></div>
                    
                    <div class="relative aspect-video lg:aspect-[4/3] rounded-[2.5rem] overflow-hidden shadow-2xl border-4 border-white/10 group">
                        @if($achievement->image)
                            <img src="{{ asset('storage/' . $achievement->image) }}" 
                                 alt="{{ $achievement->title }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-[3s]"
                                 onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($achievement->title) }}&background=612F73&color=fff&size=800'">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-[#612F73] to-[#8C51A5] flex items-center justify-center">
                                <i class="fas fa-medal text-9xl text-white/10"></i>
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
                    
                    {{-- Stats Grid (Wall of Fame Style) --}}
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6" data-aos="fade-up">
                        
                        {{-- Peringkat --}}
                        <div class="group p-6 rounded-[2rem] bg-gradient-to-br from-amber-50 to-white border border-amber-100 hover:shadow-premium-lg transition-all">
                            <i class="fas fa-trophy text-[#f5b82e] text-2xl mb-4 group-hover:scale-110 transition-transform"></i>
                            <div class="text-gray-400 text-[10px] font-black uppercase tracking-widest mb-1">Juara / Peringkat</div>
                            <div class="text-[#612F73] font-black text-2xl truncate">{{ $achievement->rank ?? '-' }}</div>
                        </div>

                        <div class="group p-6 rounded-[2rem] bg-gradient-to-br from-purple-50 to-white border border-purple-100 hover:shadow-premium-lg transition-all">
                            <i class="fas fa-award text-[#8C51A5] text-2xl mb-4 group-hover:scale-110 transition-transform"></i>
                            <div class="text-gray-400 text-[10px] font-black uppercase tracking-widest mb-1">Nama Ajang</div>
                            <div class="text-[#612F73] font-black text-lg leading-tight">{{ $achievement->competition_name ?? '-' }}</div>
                        </div>

                        {{-- Tingkat --}}
                        <div class="group p-6 rounded-[2rem] bg-gradient-to-br from-blue-50 to-white border border-blue-100 hover:shadow-premium-lg transition-all">
                            <i class="fas fa-globe-asia text-blue-500 text-2xl mb-4 group-hover:scale-110 transition-transform"></i>
                            <div class="text-gray-400 text-[10px] font-black uppercase tracking-widest mb-1">Tingkatan</div>
                            <div class="text-[#612F73] font-black text-xl truncate">{{ $achievement->level ?? '-' }}</div>
                        </div>

                        {{-- Tahun --}}
                        <div class="group p-6 rounded-[2rem] bg-gradient-to-br from-gray-50 to-white border border-gray-200 hover:shadow-premium-lg transition-all">
                            <i class="far fa-calendar-check text-gray-500 text-2xl mb-4 group-hover:scale-110 transition-transform"></i>
                            <div class="text-gray-400 text-[10px] font-black uppercase tracking-widest mb-1">Tahun</div>
                            <div class="text-[#612F73] font-black text-2xl truncate">{{ $achievement->year ?? '-' }}</div>
                        </div>
                    </div>

                    {{-- Description Content --}}
                    <div class="bg-[#F0E7F8]/20 rounded-[3rem] p-8 md:p-12 lg:p-16 border border-[#8C51A5]/5" data-aos="fade-up">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-1 bg-[#8C51A5] rounded-full"></div>
                            <h3 class="font-black text-[#612F73] text-xl uppercase tracking-widest">Detail Cerita</h3>
                        </div>

                        <div class="prose prose-lg max-w-none 
                                    prose-p:text-gray-600 prose-p:leading-relaxed prose-p:mb-6
                                    prose-headings:text-[#612F73] prose-headings:font-black
                                    prose-strong:text-[#8C51A5] prose-strong:font-black
                                    prose-blockquote:italic prose-blockquote:bg-white prose-blockquote:p-10 prose-blockquote:rounded-3xl prose-blockquote:border-l-8 prose-blockquote:border-[#F8CB62]">
                            {!! $achievement->description !!}
                        </div>
                    </div>
                </div>

                {{-- Sidebar --}}
                <aside class="lg:col-span-4 space-y-12">
                    
                    {{-- Hall of Fame Card --}}
                    <div class="sticky top-32">
                        <div class="bg-premium-dark rounded-[3rem] p-8 lg:p-10 shadow-premium-lg overflow-hidden relative">
                            {{-- Decorative Shine --}}
                            <div class="absolute -top-1/2 -left-1/2 w-full h-full bg-white/5 rotate-45 pointer-events-none"></div>

                            <h3 class="font-black text-white text-2xl mb-10 flex items-center gap-3 relative">
                                <i class="fas fa-crown text-[#F8CB62]"></i>
                                Hall of Fame
                            </h3>

                            <div class="space-y-8 relative">
                                @foreach($relatedAchievements as $index => $item)
                                    <a href="{{ route('achievement.show', $item->slug) }}" 
                                       class="group flex items-center gap-6"
                                       data-aos="fade-left" data-aos-delay="{{ 100 * $index }}">
                                        {{-- Image Thumb --}}
                                        <div class="w-20 h-20 flex-shrink-0 rounded-2xl overflow-hidden border-2 border-white/10 group-hover:border-[#F8CB62]/50 transition-all">
                                            @if($item->image)
                                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-125 transition-transform duration-500">
                                            @else
                                                <div class="w-full h-full bg-white/5 flex items-center justify-center">
                                                    <i class="fas fa-award text-white/20"></i>
                                                </div>
                                            @endif
                                        </div>
                                        
                                        <div class="flex-1 min-w-0">
                                            <div class="text-[#F8CB62] font-black text-[9px] uppercase tracking-widest mb-1">{{ $item->rank ?? 'PRESTASI' }}</div>
                                            <h4 class="text-white font-bold text-sm line-clamp-2 leading-snug group-hover:text-[#F8CB62] transition-colors">{{ $item->title }}</h4>
                                        </div>
                                    </a>
                                @endforeach
                            </div>

                            <div class="mt-12 pt-8 border-t border-white/10">
                                <a href="{{ route('achievements') }}" 
                                   class="flex items-center justify-center gap-3 w-full py-5 bg-gradient-to-r from-[#F8CB62] to-[#f5b82e] text-[#612F73] font-black rounded-2xl shadow-xl hover:-translate-y-1 transition-all uppercase text-[10px] tracking-widest">
                                    Lihat Seluruh Prestasi
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        {{-- News Brief --}}
                        <div class="mt-8 p-8 rounded-[2.5rem] bg-gray-50 border border-gray-100">
                            <h4 class="font-black text-[#612F73] mb-6 flex items-center gap-2">
                                <i class="fas fa-newspaper text-[#8C51A5]"></i>
                                Berita Terkini
                            </h4>
                            <div class="space-y-4">
                                @foreach($latestNews ?? [] as $news)
                                    <a href="{{ route('news.show', $news->slug) }}" class="block p-4 rounded-2xl bg-white border border-transparent hover:border-[#8C51A5]/20 hover:shadow-sm transition-all">
                                        <div class="text-[9px] font-black text-gray-400 uppercase mb-1">{{ $news->published_at->format('d M Y') }}</div>
                                        <div class="text-sm font-bold text-[#612F73] line-clamp-2 leading-snug">{{ $news->title }}</div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </section>
@endsection