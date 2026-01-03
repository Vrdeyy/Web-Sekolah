@extends('layouts.app')

@section('title', $major->name)

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            {{-- Breadcrumb --}}
            <nav class="flex items-center gap-2 text-sm mb-8 font-bold uppercase tracking-widest">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-[#F3DCEB] transition-colors">
                    <i class="fas fa-home"></i>
                </a>
                <i class="fas fa-chevron-right text-[10px] text-gray-600"></i>
                <a href="{{ route('majors') }}" class="text-gray-400 hover:text-[#F3DCEB] transition-colors">JURUSAN</a>
                <i class="fas fa-chevron-right text-[10px] text-gray-600"></i>
                <span class="text-[#F3DCEB]">{{ strtoupper($major->short_name ?? $major->name) }}</span>
            </nav>

            <div class="max-w-4xl">
                @if($major->short_name)
                    <div
                        class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#932F80]/25 backdrop-blur-md text-[#F3DCEB] font-extrabold rounded-xl mb-6 border border-[#932F80]/30 shadow-glow uppercase tracking-wider text-xs">
                        <i class="fas fa-graduation-cap"></i>
                        {{ $major->short_name }}
                    </div>
                @endif
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold text-white mb-6 tracking-wide drop-shadow-lg">
                    {{ $major->name }}
                </h1>
                @if($major->short_description)
                    <p class="text-gray-300 text-lg md:text-xl leading-relaxed max-w-3xl font-medium">
                        {{ $major->short_description }}
                    </p>
                @endif
            </div>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="py-16 bg-purple-50 relative">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">
                {{-- Main Content --}}
                <div class="lg:col-span-2 space-y-16">
                    {{-- Featured Image --}}
                    @if($major->image)
                        <div class="rounded-[3rem] overflow-hidden shadow-2xl shadow-purple-900/10 border border-purple-100 group">
                            <img src="{{ asset('storage/' . $major->image) }}" alt="{{ $major->name }}" class="w-full h-auto group-hover:scale-105 transition-transform duration-1000">
                        </div>
                    @endif

                    {{-- Description --}}
                    @if($major->description)
                        <div class="bg-white rounded-[3rem] p-10 lg:p-12 border border-purple-100 shadow-xl">
                            <h2 class="text-3xl font-extrabold text-[#2A1424] mb-8 flex items-center gap-4 tracking-tight">
                                <span class="w-12 h-12 bg-[#932F80] rounded-2xl flex items-center justify-center shadow-lg shadow-[#932F80]/30 transition-transform hover:rotate-12">
                                    <i class="fas fa-info-circle text-white"></i>
                                </span>
                                Tentang Program
                            </h2>
                            <div class="prose prose-lg max-w-none
                                prose-headings:text-[#2A1424] prose-headings:font-extrabold
                                prose-p:text-gray-600 prose-p:leading-relaxed prose-p:font-medium
                                prose-strong:text-[#932F80] prose-strong:font-extrabold
                                prose-ul:my-6 prose-li:text-gray-600 prose-li:font-medium
                                prose-a:text-[#932F80] hover:prose-a:text-[#6E1F5F] transition-colors duration-300">
                                {!! $major->description !!}
                            </div>
                        </div>
                    @endif

                    {{-- Career Prospects --}}
                    @if($major->career_prospects)
                        <div class="bg-gradient-to-br from-purple-50 to-white rounded-[3rem] p-10 lg:p-12 border border-purple-100 shadow-xl relative overflow-hidden group">
                           <div class="absolute top-0 right-0 w-64 h-64 bg-[#932F80]/5 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2 group-hover:bg-[#932F80]/10 transition-colors duration-700"></div>
                            <h2 class="text-3xl font-extrabold text-[#2A1424] mb-8 flex items-center gap-4 tracking-tight relative z-10">
                                <span class="w-12 h-12 bg-amber-500 rounded-2xl flex items-center justify-center shadow-lg shadow-amber-500/30">
                                    <i class="fas fa-briefcase text-white"></i>
                                </span>
                                Prospek Karir
                            </h2>
                            <div class="prose prose-lg max-w-none prose-p:text-gray-600 prose-li:text-gray-600 relative z-10 font-medium prose-strong:text-[#2A1424]">
                                {!! $major->career_prospects !!}
                            </div>
                        </div>
                    @endif

                    {{-- Competencies --}}
                    @if($major->competencies)
                        <div class="bg-gradient-to-br from-blue-50 to-white rounded-[3rem] p-10 lg:p-12 border border-blue-100 shadow-xl relative overflow-hidden group">
                            <div class="absolute top-0 right-0 w-64 h-64 bg-blue-600/5 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2 group-hover:bg-blue-600/10 transition-colors duration-700"></div>
                            <h2 class="text-3xl font-extrabold text-[#2A1424] mb-8 flex items-center gap-4 tracking-tight relative z-10">
                                <span class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-600/30">
                                    <i class="fas fa-cogs text-white"></i>
                                </span>
                                Kompetensi Keahlian
                            </h2>
                            <div class="prose prose-lg max-w-none prose-p:text-gray-600 prose-li:text-gray-600 relative z-10 font-medium prose-strong:text-[#2A1424]">
                                {!! $major->competencies !!}
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Sidebar --}}
                <div class="space-y-10">
                    {{-- Quick Info Card --}}
                    <div class="bg-white border border-gray-200 rounded-[2.5rem] p-8 shadow-xl">
                        <h3 class="font-extrabold text-[#2A1424] text-xl mb-8 flex items-center gap-3 tracking-tight">
                            <i class="fas fa-info-circle text-[#932F80]"></i>
                            Informasi Program
                        </h3>
                        <ul class="space-y-6">
                            <li class="flex items-center gap-5 pb-6 border-b border-gray-100 group">
                                <div class="w-14 h-14 bg-[#932F80]/10 rounded-2xl flex items-center justify-center group-hover:bg-[#932F80] transition-all duration-300 shadow-lg shadow-[#932F80]/10">
                                    <i class="fas fa-clock text-[#932F80] group-hover:text-white transition-colors"></i>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">Durasi</span>
                                    <span class="font-extrabold text-[#2A1424] tracking-wide">3 TAHUN</span>
                                </div>
                            </li>
                            <li class="flex items-center gap-5 pb-6 border-b border-gray-100 group">
                                <div class="w-14 h-14 bg-blue-500/10 rounded-2xl flex items-center justify-center group-hover:bg-blue-600 transition-all duration-300 shadow-lg shadow-blue-500/10">
                                    <i class="fas fa-certificate text-blue-500 group-hover:text-white transition-colors"></i>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">Sertifikasi</span>
                                    <span class="font-extrabold text-[#2A1424] tracking-wide">INTERNASIONAL</span>
                                </div>
                            </li>
                            <li class="flex items-center gap-5 group">
                                <div class="w-14 h-14 bg-purple-600/10 rounded-2xl flex items-center justify-center group-hover:bg-purple-600 transition-all duration-300 shadow-lg shadow-purple-600/10">
                                    <i class="fas fa-building text-purple-500 group-hover:text-white transition-colors"></i>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">Praktek Industri</span>
                                    <span class="font-extrabold text-[#2A1424] tracking-wide">6 BULAN</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    {{-- CTA Card --}}
                    @if(($settings['ppdb_active'] ?? false))
                        <div
                            class="bg-gradient-to-br from-[#932F80] via-[#6E1F5F] to-[#2A1424] rounded-[2.5rem] p-8 text-white relative overflow-hidden shadow-2xl group shadow-[#932F80]/20">
                            <div
                                class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-white/20 transition-all duration-700">
                            </div>
                            <div class="relative z-10">
                                <h3 class="font-extrabold text-2xl mb-4 tracking-tight leading-tight">Tertarik Program Ini?</h3>
                                <p class="text-[#F3DCEB] text-sm mb-8 font-medium leading-relaxed">Daftarkan diri Anda sekarang untuk bergabung dengan
                                    program {{ $major->short_name ?? $major->name }}!</p>
                                <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                                    class="inline-flex items-center gap-3 px-8 py-4 bg-white text-[#932F80] font-extrabold rounded-2xl hover:bg-gray-100 transition-all shadow-xl w-full justify-center hover:-translate-y-1 transform">
                                    <i class="fas fa-user-plus"></i>
                                    DAFTAR SEKARANG
                                </a>
                            </div>
                        </div>
                    @endif

                    {{-- Other Majors --}}
                    <div class="bg-white border border-gray-200 rounded-[2.5rem] p-8 shadow-xl">
                        <h3 class="font-extrabold text-[#2A1424] text-xl mb-8 flex items-center gap-3 tracking-tight">
                            <i class="fas fa-list text-[#932F80]"></i>
                            Program Lainnya
                        </h3>
                        <div class="space-y-4">
                            @foreach(\App\Models\Major::active()->where('id', '!=', $major->id)->ordered()->take(5)->get() as $otherMajor)
                                <a href="{{ route('major.show', $otherMajor->slug) }}"
                                    class="flex items-center gap-4 p-4 rounded-2xl hover:bg-purple-50 border border-transparent hover:border-purple-100 transition-all group">
                                    <div
                                        class="w-12 h-12 bg-[#932F80]/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-[#932F80] transition-colors duration-500">
                                        @if($otherMajor->icon)
                                            <img src="{{ asset('storage/' . $otherMajor->icon) }}"
                                                alt="{{ $otherMajor->short_name }}" class="w-6 h-6 group-hover:brightness-0 group-hover:invert transition-all">
                                        @else
                                            <i class="fas fa-graduation-cap text-[#932F80] group-hover:text-white transition-colors"></i>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p
                                            class="font-bold text-[#2A1424] text-sm truncate group-hover:text-[#932F80] transition-colors tracking-tight">
                                            {{ $otherMajor->name }}
                                        </p>
                                        @if($otherMajor->short_name)
                                            <p class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mt-1">{{ $otherMajor->short_name }}</p>
                                        @endif
                                    </div>
                                    <i
                                        class="fas fa-chevron-right text-gray-400 group-hover:text-[#932F80] group-hover:translate-x-1 transition-all"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Related News --}}
    @php
        $relatedNews = \App\Models\News::active()->published()->latest()->take(3)->get();
    @endphp
    @if($relatedNews->count() > 0)
        <section class="py-24 bg-white relative border-t border-gray-200">
            <div class="container mx-auto px-4 lg:px-8">
                <div class="flex items-center justify-between mb-12">
                    <h2 class="text-3xl font-extrabold text-[#2A1424] flex items-center gap-4 tracking-tight">
                        <span class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-600/30">
                            <i class="fas fa-newspaper text-white"></i>
                        </span>
                        Berita Terkait
                    </h2>
                    <a href="{{ route('news') }}" class="text-[#932F80] font-extrabold text-xs tracking-widest uppercase hover:text-[#6E1F5F] transition-colors bg-purple-50 px-6 py-3 rounded-xl border border-purple-100">
                        LIHAT SEMUA <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <div class="grid md:grid-cols-3 gap-10">
                    @foreach($relatedNews as $news)
                        <a href="{{ route('news.show', $news->slug) }}"
                            class="group bg-white rounded-[2.5rem] overflow-hidden border border-gray-200 shadow-lg shadow-purple-900/5 hover:shadow-2xl hover:shadow-purple-900/10 hover:border-[#932F80]/30 transition-all duration-500 hover:-translate-y-2">
                            <div class="relative h-56 overflow-hidden bg-gray-100">
                                @if($news->image)
                                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-purple-100 to-white flex items-center justify-center">
                                        <i class="fas fa-newspaper text-5xl text-purple-200"></i>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-[#2A1424]/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            </div>
                            <div class="p-8">
                                <span class="text-xs font-bold text-[#932F80] uppercase tracking-widest mb-4 block">{{ $news->published_at->format('d M Y') }}</span>
                                <h3 class="text-xl font-extrabold text-[#2A1424] line-clamp-2 group-hover:text-[#932F80] transition-colors leading-tight tracking-tight">
                                    {{ $news->title }}
                                </h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection