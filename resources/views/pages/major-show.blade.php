@extends('layouts.app')

@section('title', $major->name)

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-gradient-to-br from-slate-900 via-slate-800 to-emerald-900 relative overflow-hidden">
        <div class="absolute inset-0">
            @if($major->image)
                <img src="{{ asset('storage/' . $major->image) }}" alt="{{ $major->name }}"
                    class="w-full h-full object-cover opacity-20">
            @endif
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900/90 via-slate-800/90 to-emerald-900/90"></div>
            <div
                class="absolute top-0 left-0 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2">
            </div>
            <div
                class="absolute bottom-0 right-0 w-96 h-96 bg-teal-500/20 rounded-full blur-3xl translate-x-1/2 translate-y-1/2">
            </div>
        </div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            {{-- Breadcrumb --}}
            <nav class="flex items-center gap-2 text-sm mb-8">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors">
                    <i class="fas fa-home"></i>
                </a>
                <i class="fas fa-chevron-right text-xs text-gray-500"></i>
                <a href="{{ route('majors') }}" class="text-gray-400 hover:text-white transition-colors">Jurusan</a>
                <i class="fas fa-chevron-right text-xs text-gray-500"></i>
                <span class="text-emerald-400">{{ $major->short_name ?? $major->name }}</span>
            </nav>

            <div class="max-w-4xl">
                @if($major->short_name)
                    <span
                        class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-500/20 backdrop-blur-sm text-emerald-300 font-bold rounded-lg mb-6">
                        <i class="fas fa-graduation-cap"></i>
                        {{ $major->short_name }}
                    </span>
                @endif
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                    {{ $major->name }}
                </h1>
                @if($major->short_description)
                    <p class="text-gray-300 text-lg max-w-2xl">
                        {{ $major->short_description }}
                    </p>
                @endif
            </div>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">
                {{-- Main Content --}}
                <div class="lg:col-span-2 space-y-12">
                    {{-- Featured Image --}}
                    @if($major->image)
                        <div class="rounded-2xl overflow-hidden shadow-lg">
                            <img src="{{ asset('storage/' . $major->image) }}" alt="{{ $major->name }}" class="w-full h-auto">
                        </div>
                    @endif

                    {{-- Description --}}
                    @if($major->description)
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                                <span class="w-10 h-10 bg-emerald-600 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-info-circle text-white"></i>
                                </span>
                                Tentang Program
                            </h2>
                            <div class="prose prose-lg max-w-none
                                prose-headings:text-gray-900 prose-headings:font-bold
                                prose-p:text-gray-700 prose-p:leading-relaxed
                                prose-a:text-emerald-600 prose-a:no-underline hover:prose-a:underline
                                prose-strong:text-gray-900
                                prose-ul:my-4 prose-li:text-gray-700
                                prose-ol:my-4">
                                {!! $major->description !!}
                            </div>
                        </div>
                    @endif

                    {{-- Career Prospects --}}
                    @if($major->career_prospects)
                        <div class="bg-gradient-to-br from-emerald-50 to-teal-50 rounded-2xl p-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                                <span class="w-10 h-10 bg-emerald-600 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-briefcase text-white"></i>
                                </span>
                                Prospek Karir
                            </h2>
                            <div class="prose prose-lg max-w-none prose-p:text-gray-700 prose-li:text-gray-700">
                                {!! $major->career_prospects !!}
                            </div>
                        </div>
                    @endif

                    {{-- Competencies --}}
                    @if($major->competencies)
                        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                                <span class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-cogs text-white"></i>
                                </span>
                                Kompetensi Keahlian
                            </h2>
                            <div class="prose prose-lg max-w-none prose-p:text-gray-700 prose-li:text-gray-700">
                                {!! $major->competencies !!}
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Sidebar --}}
                <div class="space-y-8">
                    {{-- Quick Info Card --}}
                    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                        <h3 class="font-bold text-gray-900 text-lg mb-6 flex items-center gap-2">
                            <i class="fas fa-info-circle text-emerald-600"></i>
                            Informasi Program
                        </h3>
                        <ul class="space-y-4">
                            <li class="flex items-center gap-4 pb-4 border-b border-gray-100">
                                <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-clock text-emerald-600"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Durasi</p>
                                    <p class="font-semibold text-gray-900">4 Tahun</p>
                                </div>
                            </li>
                            <li class="flex items-center gap-4 pb-4 border-b border-gray-100">
                                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-certificate text-blue-600"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Sertifikasi</p>
                                    <p class="font-semibold text-gray-900">Tersertifikasi</p>
                                </div>
                            </li>
                            <li class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-building text-purple-600"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Praktek Industri</p>
                                    <p class="font-semibold text-gray-900">6 Bulan</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    {{-- CTA Card --}}
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
                                <h3 class="font-bold text-xl mb-3">Tertarik Program Ini?</h3>
                                <p class="text-emerald-100 text-sm mb-4">Daftarkan diri Anda sekarang untuk bergabung dengan
                                    program {{ $major->short_name ?? $major->name }}!</p>
                                <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                                    class="inline-flex items-center gap-2 px-6 py-3 bg-white text-emerald-700 font-bold rounded-xl hover:bg-emerald-50 transition-colors shadow-lg w-full justify-center">
                                    <i class="fas fa-user-plus"></i>
                                    Daftar Sekarang
                                </a>
                            </div>
                        </div>
                    @endif

                    {{-- Other Majors --}}
                    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                        <h3 class="font-bold text-gray-900 text-lg mb-6 flex items-center gap-2">
                            <i class="fas fa-list text-emerald-600"></i>
                            Program Lainnya
                        </h3>
                        <div class="space-y-3">
                            @foreach(\App\Models\Major::active()->where('id', '!=', $major->id)->ordered()->take(5)->get() as $otherMajor)
                                <a href="{{ route('major.show', $otherMajor->slug) }}"
                                    class="flex items-center gap-3 p-3 rounded-xl hover:bg-emerald-50 transition-colors group">
                                    <div
                                        class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        @if($otherMajor->icon)
                                            <img src="{{ asset('storage/' . $otherMajor->icon) }}"
                                                alt="{{ $otherMajor->short_name }}" class="w-6 h-6">
                                        @else
                                            <i class="fas fa-graduation-cap text-emerald-600"></i>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p
                                            class="font-medium text-gray-900 text-sm truncate group-hover:text-emerald-600 transition-colors">
                                            {{ $otherMajor->name }}
                                        </p>
                                        @if($otherMajor->short_name)
                                            <p class="text-xs text-gray-500">{{ $otherMajor->short_name }}</p>
                                        @endif
                                    </div>
                                    <i
                                        class="fas fa-chevron-right text-gray-300 group-hover:text-emerald-500 transition-colors"></i>
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
        <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
            <div class="container mx-auto px-4 lg:px-8">
                <div class="flex items-center justify-between mb-10">
                    <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-3">
                        <span class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-newspaper text-white"></i>
                        </span>
                        Berita Terkait
                    </h2>
                    <a href="{{ route('news') }}" class="text-emerald-600 font-semibold hover:underline">
                        Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($relatedNews as $news)
                        <a href="{{ route('news.show', $news->slug) }}"
                            class="group bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="relative h-48 overflow-hidden">
                                @if($news->image)
                                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                        <i class="fas fa-newspaper text-4xl text-white/40"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6">
                                <span class="text-sm text-gray-500 mb-2 block">{{ $news->published_at->format('d M Y') }}</span>
                                <h3 class="font-bold text-gray-900 line-clamp-2 group-hover:text-emerald-600 transition-colors">
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