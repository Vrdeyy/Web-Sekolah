@extends('layouts.app')

@section('title', $page->title)

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-gradient-to-br from-slate-900 via-slate-800 to-emerald-900 relative overflow-hidden">
        <div class="absolute inset-0">
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
                <span class="text-emerald-400">{{ $page->title }}</span>
            </nav>

            <div class="max-w-4xl">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-emerald-300 text-sm font-medium mb-6">
                    <i class="fas fa-file-alt"></i>
                    <span>HALAMAN</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                    {{ $page->title }}
                </h1>
            </div>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-4xl mx-auto">
                {{-- Featured Image --}}
                @if($page->image)
                    <figure class="mb-10 rounded-2xl overflow-hidden shadow-lg">
                        <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->title }}" class="w-full h-auto">
                    </figure>
                @endif

                {{-- Content --}}
                <div class="prose prose-lg max-w-none
                        prose-headings:text-gray-900 prose-headings:font-bold
                        prose-h2:text-2xl prose-h2:mt-10 prose-h2:mb-4 prose-h2:pb-2 prose-h2:border-b prose-h2:border-gray-200
                        prose-h3:text-xl prose-h3:mt-8 prose-h3:mb-3
                        prose-p:text-gray-700 prose-p:leading-relaxed prose-p:mb-6
                        prose-a:text-emerald-600 prose-a:no-underline hover:prose-a:underline
                        prose-strong:text-gray-900
                        prose-ul:my-6 prose-li:text-gray-700 prose-li:mb-2
                        prose-ol:my-6
                        prose-blockquote:border-l-4 prose-blockquote:border-emerald-500 prose-blockquote:bg-emerald-50 prose-blockquote:py-4 prose-blockquote:px-6 prose-blockquote:rounded-r-lg prose-blockquote:italic
                        prose-img:rounded-xl prose-img:shadow-lg">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </section>

    {{-- Related Links Section --}}
    <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Halaman Lainnya</h2>
                <p class="text-gray-600">Informasi lain yang mungkin Anda butuhkan</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-5xl mx-auto">
                <a href="{{ route('page', 'yayasan') }}"
                    class="group p-6 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:border-emerald-200 transition-all text-center {{ request()->is('*/yayasan') ? 'ring-2 ring-emerald-500' : '' }}">
                    <div
                        class="w-14 h-14 bg-emerald-100 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:bg-emerald-600 transition-colors">
                        <i class="fas fa-building text-2xl text-emerald-600 group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 group-hover:text-emerald-600 transition-colors">Yayasan</h3>
                    <p class="text-gray-500 text-sm mt-2">Profil yayasan</p>
                </a>

                <a href="{{ route('page', 'sekolah') }}"
                    class="group p-6 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:border-blue-200 transition-all text-center {{ request()->is('*/sekolah') ? 'ring-2 ring-blue-500' : '' }}">
                    <div
                        class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:bg-blue-600 transition-colors">
                        <i class="fas fa-school text-2xl text-blue-600 group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 group-hover:text-blue-600 transition-colors">Sekolah</h3>
                    <p class="text-gray-500 text-sm mt-2">Profil sekolah</p>
                </a>

                <a href="{{ route('page', 'visi-misi') }}"
                    class="group p-6 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:border-purple-200 transition-all text-center {{ request()->is('*/visi-misi') ? 'ring-2 ring-purple-500' : '' }}">
                    <div
                        class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:bg-purple-600 transition-colors">
                        <i class="fas fa-bullseye text-2xl text-purple-600 group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 group-hover:text-purple-600 transition-colors">Visi & Misi</h3>
                    <p class="text-gray-500 text-sm mt-2">Tujuan sekolah</p>
                </a>

                <a href="{{ route('majors') }}"
                    class="group p-6 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:border-amber-200 transition-all text-center">
                    <div
                        class="w-14 h-14 bg-amber-100 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:bg-amber-600 transition-colors">
                        <i
                            class="fas fa-graduation-cap text-2xl text-amber-600 group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 group-hover:text-amber-600 transition-colors">Jurusan</h3>
                    <p class="text-gray-500 text-sm mt-2">Program keahlian</p>
                </a>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-16 bg-gradient-to-r from-emerald-600 to-teal-600 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml,%3Csvg width=\" 60\" height=\"60\"
                viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg
                fill=\"%23ffffff\" fill-opacity=\"0.05\"%3E%3Cpath d=\"M36
                34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6
                4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Ada Pertanyaan?</h2>
                <p class="text-emerald-100 text-lg mb-8">Hubungi kami untuk informasi lebih lanjut.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center gap-2 px-8 py-4 bg-white text-emerald-700 font-bold rounded-xl hover:bg-emerald-50 transition-colors shadow-lg">
                        <i class="fas fa-phone"></i>
                        Hubungi Kami
                    </a>
                    @if(($settings['ppdb_active'] ?? false))
                        <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                            class="inline-flex items-center gap-2 px-8 py-4 bg-white/20 backdrop-blur-sm text-white font-bold rounded-xl border-2 border-white/40 hover:bg-white/30 transition-colors">
                            <i class="fas fa-user-plus"></i>
                            Daftar PPDB
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection