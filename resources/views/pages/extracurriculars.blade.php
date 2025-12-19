@extends('layouts.app')

@section('title', 'Ekstrakurikuler')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-gradient-to-br from-slate-900 via-purple-900 to-indigo-900 relative overflow-hidden">
        <div class="absolute inset-0">
            <div
                class="absolute top-0 left-0 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2">
            </div>
            <div
                class="absolute bottom-0 right-0 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl translate-x-1/2 translate-y-1/2">
            </div>
        </div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-purple-300 text-sm font-medium mb-6">
                    <i class="fas fa-futbol"></i>
                    <span>EKSTRAKURIKULER</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                    Kegiatan <span class="text-purple-400">Ekstrakurikuler</span>
                </h1>
                <p class="text-gray-300 text-lg">
                    Kembangkan bakat dan minat Anda melalui berbagai kegiatan ekstrakurikuler yang menarik
                </p>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-8 bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-wrap items-center justify-center gap-8 md:gap-16">
                <div class="text-center">
                    <div class="text-3xl font-extrabold text-purple-600">{{ $extracurriculars->count() }}</div>
                    <div class="text-gray-500 text-sm">Kegiatan Aktif</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-extrabold text-blue-600">500+</div>
                    <div class="text-gray-500 text-sm">Siswa Aktif</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-extrabold text-amber-600">50+</div>
                    <div class="text-gray-500 text-sm">Prestasi Diraih</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Extracurriculars Grid --}}
    <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($extracurriculars as $ekskul)
                    <article
                        class="group bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl hover:border-purple-200 transition-all duration-300 hover:-translate-y-2">
                        {{-- Image --}}
                        <div class="relative h-52 overflow-hidden">
                            @if($ekskul->image)
                                <img src="{{ asset('storage/' . $ekskul->image) }}" alt="{{ $ekskul->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-br from-purple-500 via-indigo-500 to-blue-500 flex items-center justify-center">
                                    <i class="fas fa-futbol text-6xl text-white/40"></i>
                                </div>
                            @endif

                            {{-- Schedule Badge --}}
                            @if($ekskul->schedule)
                                <div class="absolute bottom-4 left-4 right-4">
                                    <div class="px-4 py-2 bg-white/95 backdrop-blur-sm rounded-lg shadow">
                                        <div class="flex items-center gap-2 text-purple-700">
                                            <i class="far fa-clock"></i>
                                            <span class="text-sm font-medium">{{ $ekskul->schedule }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- Content --}}
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-purple-600 transition-colors">
                                {{ $ekskul->name }}
                            </h3>

                            @if($ekskul->short_description)
                                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                    {{ $ekskul->short_description }}
                                </p>
                            @endif

                            {{-- Footer --}}
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-users text-purple-600 text-xs"></i>
                                    </div>
                                    <span class="text-sm text-gray-500">Aktif</span>
                                </div>
                                <span class="inline-flex items-center gap-2 text-purple-600 font-semibold text-sm">
                                    Lihat Detail
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Categories Section --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Kategori Ekstrakurikuler</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Berbagai kategori kegiatan yang dapat Anda pilih sesuai dengan minat dan bakat
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div
                    class="p-6 bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl border border-blue-100 hover:shadow-lg transition-all">
                    <div class="w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-running text-2xl text-white"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Olahraga</h3>
                    <p class="text-gray-600 text-sm">Futsal, Basket, Voli, Badminton, dan lainnya</p>
                </div>

                <div
                    class="p-6 bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl border border-purple-100 hover:shadow-lg transition-all">
                    <div class="w-14 h-14 bg-purple-600 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-music text-2xl text-white"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Seni & Musik</h3>
                    <p class="text-gray-600 text-sm">Paduan Suara, Band, Tari, dan lainnya</p>
                </div>

                <div
                    class="p-6 bg-gradient-to-br from-emerald-50 to-teal-50 rounded-2xl border border-emerald-100 hover:shadow-lg transition-all">
                    <div class="w-14 h-14 bg-emerald-600 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-praying-hands text-2xl text-white"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Keagamaan</h3>
                    <p class="text-gray-600 text-sm">Rohis, Pramuka, PMR, dan lainnya</p>
                </div>

                <div
                    class="p-6 bg-gradient-to-br from-amber-50 to-orange-50 rounded-2xl border border-amber-100 hover:shadow-lg transition-all">
                    <div class="w-14 h-14 bg-amber-600 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-laptop-code text-2xl text-white"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Akademik</h3>
                    <p class="text-gray-600 text-sm">English Club, Karya Ilmiah, dan lainnya</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-16 bg-gradient-to-r from-purple-600 to-indigo-600 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml,%3Csvg width=\" 60\" height=\"60\"
                viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg
                fill=\"%23ffffff\" fill-opacity=\"0.05\"%3E%3Cpath d=\"M36
                34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6
                4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Kembangkan Potensimu!</h2>
                <p class="text-purple-100 text-lg mb-8">Bergabunglah dengan berbagai kegiatan ekstrakurikuler dan temukan
                    bakatmu.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    @if(($settings['ppdb_active'] ?? false))
                        <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                            class="inline-flex items-center gap-2 px-8 py-4 bg-white text-purple-700 font-bold rounded-xl hover:bg-purple-50 transition-colors shadow-lg">
                            <i class="fas fa-user-plus"></i>
                            Daftar PPDB
                        </a>
                    @endif
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center gap-2 px-8 py-4 bg-white/20 backdrop-blur-sm text-white font-bold rounded-xl border-2 border-white/40 hover:bg-white/30 transition-colors">
                        <i class="fas fa-phone"></i>
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection