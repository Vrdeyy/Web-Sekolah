@extends('layouts.app')

@section('title', 'Prestasi Siswa')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-gradient-to-br from-slate-900 via-amber-900 to-orange-900 relative overflow-hidden">
        <div class="absolute inset-0">
            <div
                class="absolute top-0 left-0 w-96 h-96 bg-amber-500/20 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2">
            </div>
            <div
                class="absolute bottom-0 right-0 w-96 h-96 bg-orange-500/20 rounded-full blur-3xl translate-x-1/2 translate-y-1/2">
            </div>
        </div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-amber-300 text-sm font-medium mb-6">
                    <i class="fas fa-trophy"></i>
                    <span>PRESTASI SISWA</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                    Prestasi <span class="text-amber-400">Membanggakan</span>
                </h1>
                <p class="text-gray-300 text-lg">
                    Berbagai prestasi yang telah diraih oleh siswa-siswi {{ $settings['school_name'] ?? 'SMK YAJ' }} di
                    berbagai bidang
                </p>
            </div>
        </div>
    </section>

    {{-- Filter Section --}}
    <section class="py-8 bg-white border-b border-gray-200 sticky top-20 z-30 backdrop-blur-xl bg-white/95">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-wrap items-center justify-between gap-4">
                {{-- Level Filter --}}
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('achievements') }}"
                        class="px-5 py-2.5 rounded-xl font-medium text-sm transition-all {{ !request('level') ? 'bg-amber-600 text-white shadow-lg' : 'bg-gray-100 text-gray-600 hover:bg-amber-100 hover:text-amber-700' }}">
                        Semua
                    </a>
                    @foreach(['Internasional', 'Nasional', 'Provinsi', 'Kota/Kabupaten', 'Sekolah'] as $level)
                        <a href="{{ route('achievements') }}?level={{ $level }}"
                            class="px-5 py-2.5 rounded-xl font-medium text-sm transition-all {{ request('level') == $level ? 'bg-amber-600 text-white shadow-lg' : 'bg-gray-100 text-gray-600 hover:bg-amber-100 hover:text-amber-700' }}">
                            {{ $level }}
                        </a>
                    @endforeach
                </div>

                {{-- Stats --}}
                <div class="text-gray-500 text-sm">
                    <span class="font-semibold text-amber-600">{{ $achievements->total() ?? $achievements->count() }}</span>
                    Prestasi
                </div>
            </div>
        </div>
    </section>

    {{-- Achievements Grid --}}
    <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 lg:px-8">
            @if($achievements->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($achievements as $achievement)
                        <article
                            class="group bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl hover:border-amber-200 transition-all duration-300 hover:-translate-y-2">
                            {{-- Image --}}
                            <div class="relative h-52 overflow-hidden">
                                @if($achievement->image)
                                    <img src="{{ asset('storage/' . $achievement->image) }}" alt="{{ $achievement->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-amber-400 via-orange-500 to-red-500 flex items-center justify-center">
                                        <i class="fas fa-trophy text-6xl text-white/40"></i>
                                    </div>
                                @endif

                                {{-- Level Badge --}}
                                @if($achievement->level)
                                    <div class="absolute top-4 left-4">
                                        <span class="px-3 py-1.5 bg-amber-500 text-white text-xs font-bold rounded-lg shadow">
                                            {{ $achievement->level }}
                                        </span>
                                    </div>
                                @endif

                                {{-- Rank Badge --}}
                                @if($achievement->rank)
                                    <div class="absolute top-4 right-4">
                                        <span
                                            class="px-3 py-1.5 bg-white/95 backdrop-blur-sm text-amber-700 text-xs font-bold rounded-lg shadow">
                                            {{ $achievement->rank }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            {{-- Content --}}
                            <div class="p-6">
                                <h3
                                    class="text-lg font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-amber-600 transition-colors">
                                    {{ $achievement->title }}
                                </h3>

                                @if($achievement->student_name)
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center">
                                            <i class="fas fa-user-graduate text-amber-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">{{ $achievement->student_name }}</p>
                                            @if($achievement->year)
                                                <p class="text-sm text-gray-500">Tahun {{ $achievement->year }}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                @if($achievement->description)
                                    <p class="text-gray-600 text-sm line-clamp-2">
                                        {{ strip_tags($achievement->description) }}
                                    </p>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-12">
                    {{ $achievements->links() }}
                </div>
            @else
                {{-- Empty State --}}
                <div class="text-center py-20">
                    <div class="w-24 h-24 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-trophy text-4xl text-amber-400"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Prestasi</h3>
                    <p class="text-gray-500 mb-6">Prestasi yang Anda cari tidak ditemukan.</p>
                    <a href="{{ route('achievements') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-amber-600 text-white font-semibold rounded-xl hover:bg-amber-700 transition-colors">
                        <i class="fas fa-arrow-left"></i>
                        Lihat Semua Prestasi
                    </a>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-16 bg-gradient-to-r from-amber-500 to-orange-500 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml,%3Csvg width=\" 60\" height=\"60\"
                viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg
                fill=\"%23ffffff\" fill-opacity=\"0.05\"%3E%3Cpath d=\"M36
                34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6
                4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Raih Prestasi Bersama Kami!</h2>
                <p class="text-amber-100 text-lg mb-8">Bergabunglah dan jadilah bagian dari generasi berprestasi di sekolah
                    kami.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    @if(($settings['ppdb_active'] ?? false))
                        <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                            class="inline-flex items-center gap-2 px-8 py-4 bg-white text-amber-700 font-bold rounded-xl hover:bg-amber-50 transition-colors shadow-lg">
                            <i class="fas fa-user-plus"></i>
                            Daftar PPDB
                        </a>
                    @endif
                    <a href="{{ route('news') }}"
                        class="inline-flex items-center gap-2 px-8 py-4 bg-white/20 backdrop-blur-sm text-white font-bold rounded-xl border-2 border-white/40 hover:bg-white/30 transition-colors">
                        <i class="fas fa-newspaper"></i>
                        Baca Berita
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection