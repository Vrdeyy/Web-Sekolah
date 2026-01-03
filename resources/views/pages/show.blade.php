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
                        <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->title }}"
                            class="w-full h-auto hover:scale-105 transition-transform duration-[2s]">
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

    {{-- Related Links Section - Rich Modern Style --}}
    <section class="py-28 bg-purple-50/50 relative overflow-hidden border-t border-gray-100">
        {{-- BACKGROUND ELEMENTS --}}
        <div class="absolute inset-0 pointer-events-none">
            {{-- Big Blobs --}}
            <div class="absolute -top-32 -left-32 w-[500px] h-[500px] bg-[#4f2744]/5 rounded-full blur-[120px]"></div>
            <div class="absolute top-1/3 -right-40 w-[520px] h-[520px] bg-[#3a1c32]/5 rounded-full blur-[130px]"></div>
            <div class="absolute -bottom-40 left-1/4 w-[600px] h-[600px] bg-[#4f2744]/5 rounded-full blur-[140px]"></div>

            {{-- Floating Dots --}}
            <div class="absolute inset-0 bg-[radial-gradient(#4f274415_1px,transparent_1px)] bg-[size:18px_18px] opacity-30"></div>
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#4f2744]/10 rounded-full text-[#4f2744] text-[10px] font-black uppercase tracking-[0.3em] mb-6 shadow-sm border border-[#4f2744]/10">
                    <i class="fas fa-compass"></i>
                    <span>EKSPLORASI</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-[#3a1c32] mb-4 tracking-tight">Halaman <span
                        class="text-[#4f2744]">Lainnya</span></h2>
                <p class="text-gray-500 font-medium max-w-2xl mx-auto">Informasi lain yang mungkin Anda butuhkan seputar sekolah kami</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
                @php
                    $links = [
                        ['id' => 'yayasan', 'title' => 'Yayasan', 'desc' => 'Profil yayasan', 'icon' => 'fa-building'],
                        ['id' => 'sekolah', 'title' => 'Sekolah', 'desc' => 'Profil sekolah', 'icon' => 'fa-school'],
                        ['id' => 'visi-misi', 'title' => 'Visi & Misi', 'desc' => 'Tujuan sekolah', 'icon' => 'fa-bullseye'],
                        ['id' => 'majors', 'title' => 'Jurusan', 'desc' => 'Program keahlian', 'icon' => 'fa-graduation-cap'],
                    ];
                @endphp

                @foreach($links as $link)
                    <a href="{{ $link['id'] === 'majors' ? route('majors') : route('page', $link['id']) }}"
                        class="group relative p-10 bg-white rounded-[3rem] border border-gray-100 
                               shadow-xl shadow-purple-900/5 hover:shadow-3xl hover:shadow-[#4f2744]/20 
                               hover:border-[#4f2744]/20 transition-all duration-700 transform hover:-translate-y-3 
                               text-center overflow-hidden {{ request()->is('*/' . $link['id']) ? 'ring-2 ring-[#4f2744] bg-purple-50/50' : '' }}">
                        
                        {{-- Decorative Corner Shine ( Glass Design ) --}}
                        <div class="absolute -top-10 -right-10 w-32 h-32 bg-gradient-to-br from-[#4f2744]/5 to-transparent rounded-full blur-2xl group-hover:scale-150 transition-transform duration-1000"></div>
                        <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-gradient-to-tr from-[#3a1c32]/5 to-transparent rounded-full blur-2xl group-hover:scale-150 transition-transform duration-1000"></div>

                        <div class="relative z-10">
                            <div
                                class="w-20 h-20 bg-white rounded-[2rem] flex items-center justify-center mb-8 mx-auto 
                                       transition-all duration-500 border border-gray-100 shadow-lg group-hover:rotate-6 group-hover:shadow-xl group-hover:border-[#4f2744]/20">
                                <i
                                    class="fas {{ $link['icon'] }} text-3xl text-[#4f2744] transition-colors duration-500"></i>
                            </div>
                            <h3
                                class="text-xl font-black text-[#3a1c32] group-hover:text-[#4f2744] transition-colors tracking-tight">
                                {{ $link['title'] }}
                            </h3>
                            <p class="text-gray-400 text-[10px] font-black uppercase tracking-[0.2em] mt-4 group-hover:text-gray-600 transition-colors">{{ $link['desc'] }}</p>
                            
                            {{-- Subtle Decorative Line --}}
                            <div class="w-8 h-1 bg-gradient-to-r from-[#4f2744]/0 via-[#4f2744]/20 to-[#4f2744]/0 rounded-full mx-auto mt-6 group-hover:w-16 transition-all duration-500"></div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section
        class="py-24 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden border-t border-white/10">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl md:text-6xl font-extrabold text-white mb-8 tracking-tight">Ada Pertanyaan?</h2>
                <p class="text-gray-300 text-lg md:text-xl mb-12 font-medium">Hubungi kami untuk informasi lebih lanjut
                    mengenai program pendidikan dan kegiatan di sekolah.</p>
                <div class="flex flex-wrap justify-center gap-6">
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-3 px-10 py-4 
                            rounded-xl
                            bg-[#4f2744] text-white font-semibold shadow-lg 
                            hover:bg-transparent 
                            hover:text-[#4f2744]
                            hover:border hover:border-[#4f2744]
                            hover:shadow-[0_0_0_1px_rgba(79,39,68,0.15)]
                            transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-phone-alt text-xl"></i>
                        HUBUNGI KAMI
                    </a>
                    @if(($settings['ppdb_active'] ?? false))
                        <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank" class="inline-flex items-center gap-3 px-10 py-4 
                                    rounded-xl
                                    border border-[#4f2744] text-white font-semibold 
                                    hover:bg-[#4f2744] hover:text-white
                                    transform hover:scale-105 transition-all duration-300">
                            <i class="fas fa-user-plus text-xl"></i>
                            DAFTAR PPDB
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection