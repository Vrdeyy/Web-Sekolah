@extends('layouts.app')

@section('title', $page->title)

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            {{-- Breadcrumb --}}
            <nav class="flex items-center gap-2 text-[10px] font-extrabold uppercase tracking-[0.2em] mb-8">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-[#F3DCEB] transition-colors">
                    <i class="fas fa-home"></i>
                </a>
                <i class="fas fa-chevron-right text-[8px] text-gray-700"></i>
                <span class="text-[#F3DCEB] tracking-widest">{{ strtoupper($page->title) }}</span>
            </nav>

            <div class="max-w-4xl">
                <div
                    class="inline-flex items-center gap-2 px-6 py-3 bg-[#932F80]/25 backdrop-blur-md rounded-full text-[#F3DCEB] text-[10px] font-extrabold mb-6 border border-[#932F80]/50 shadow-glow uppercase tracking-widest">
                    <i class="fas fa-file-alt"></i>
                    <span>HALAMAN</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold text-white mb-6 drop-shadow-lg tracking-tight">
                    {{ $page->title }}
                </h1>
            </div>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="py-24 bg-white relative">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-4xl mx-auto">
                {{-- Featured Image --}}
                @if($page->image)
                    <figure class="mb-16 rounded-[3rem] overflow-hidden shadow-2xl shadow-purple-900/20 border border-gray-100">
                        <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->title }}" class="w-full h-auto hover:scale-105 transition-transform duration-[2s]">
                    </figure>
                @endif

                {{-- Content --}}
                <div class="prose prose-lg max-w-none
                        prose-headings:text-[#2A1424] prose-headings:font-extrabold
                        prose-h2:text-3xl prose-h2:mt-16 prose-h2:mb-8 prose-h2:pb-4 prose-h2:border-b prose-h2:border-gray-200
                        prose-h3:text-2xl prose-h3:mt-12 prose-h3:mb-6
                        prose-p:text-gray-600 prose-p:leading-relaxed prose-p:mb-8 prose-p:font-medium
                        prose-a:text-[#932F80] prose-a:font-bold prose-a:no-underline hover:prose-a:text-[#6E1F5F] transition-colors
                        prose-strong:text-[#2A1424] prose-strong:font-extrabold
                        prose-ul:my-8 prose-li:text-gray-600 prose-li:mb-3
                        prose-ol:my-8
                        prose-blockquote:border-l-4 prose-blockquote:border-[#932F80] prose-blockquote:bg-purple-50 prose-blockquote:py-8 prose-blockquote:px-10 prose-blockquote:rounded-3xl prose-blockquote:italic prose-blockquote:text-gray-700
                        prose-img:rounded-[2rem] prose-img:shadow-2xl">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </section>

    {{-- Related Links Section --}}
    <section class="py-24 bg-[#12080F] relative border-t border-white/5">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-[10px] font-extrabold text-[#932F80] tracking-[0.4em] uppercase mb-4 block">EXPLORE</span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-4 tracking-tight">Halaman <span class="text-[#F3DCEB]">Lainnya</span></h2>
                <p class="text-gray-500 font-medium">Informasi lain yang mungkin Anda butuhkan seputar sekolah kami</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
                @php
                    $links = [
                        ['id' => 'yayasan', 'title' => 'Yayasan', 'desc' => 'Profil yayasan', 'icon' => 'fa-building', 'color' => '#932F80'],
                        ['id' => 'sekolah', 'title' => 'Sekolah', 'desc' => 'Profil sekolah', 'icon' => 'fa-school', 'color' => '#3B82F6'],
                        ['id' => 'visi-misi', 'title' => 'Visi & Misi', 'desc' => 'Tujuan sekolah', 'icon' => 'fa-bullseye', 'color' => '#8B5CF6'],
                        ['id' => 'majors', 'title' => 'Jurusan', 'desc' => 'Program keahlian', 'icon' => 'fa-graduation-cap', 'color' => '#F59E0B'],
                    ];
                @endphp

                @foreach($links as $link)
                    <a href="{{ $link['id'] === 'majors' ? route('majors') : route('page', $link['id']) }}"
                        class="group p-10 bg-white/5 rounded-[2.5rem] border border-white/5 hover:border-[#932F80]/50 hover:bg-white/10 transition-all duration-500 transform hover:-translate-y-2 text-center {{ request()->is('*/' . $link['id']) ? 'ring-2 ring-[#932F80] bg-[#932F80]/10' : '' }}">
                        <div
                            class="w-16 h-16 bg-white/5 rounded-2xl flex items-center justify-center mb-6 mx-auto group-hover:bg-[#932F80] transition-all duration-500 border border-white/10 shadow-xl">
                            <i class="fas {{ $link['icon'] }} text-2xl text-[#932F80] group-hover:text-white transition-colors"></i>
                        </div>
                        <h3 class="text-xl font-extrabold text-white group-hover:text-[#F3DCEB] transition-colors tracking-tight">{{ $link['title'] }}</h3>
                        <p class="text-gray-500 text-xs font-bold uppercase tracking-widest mt-4">{{ $link['desc'] }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-24 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden border-t border-white/10">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl md:text-6xl font-extrabold text-white mb-8 tracking-tight">Ada Pertanyaan?</h2>
                <p class="text-gray-300 text-lg md:text-xl mb-12 font-medium">Hubungi kami untuk informasi lebih lanjut mengenai program pendidikan dan kegiatan di sekolah.</p>
                <div class="flex flex-wrap justify-center gap-6">
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center gap-4 px-12 py-5 bg-[#932F80] text-white font-extrabold rounded-2xl hover:bg-[#6E1F5F] transition-all shadow-2xl hover:shadow-purple-500/50 hover:-translate-y-1 transform">
                        <i class="fas fa-phone-alt text-2xl"></i>
                        HUBUNGI KAMI
                    </a>
                    @if(($settings['ppdb_active'] ?? false))
                        <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                            class="inline-flex items-center gap-4 px-12 py-5 bg-white/5 backdrop-blur-sm text-white font-extrabold rounded-2xl border border-white/20 hover:bg-white/10 transition-all hover:-translate-y-1 transform">
                            <i class="fas fa-user-plus text-2xl"></i>
                            DAFTAR PPDB
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection