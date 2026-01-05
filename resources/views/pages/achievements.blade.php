@extends('layouts.app')

@section('title', 'Prestasi Siswa')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <div
                    class="inline-flex items-center gap-2 px-6 py-3 bg-[#932F80]/25 backdrop-blur-md rounded-full text-[#F3DCEB] text-sm font-semibold mb-6 border border-[#932F80]/50 shadow-glow">
                    <i class="fas fa-trophy animate-bounce"></i>
                    <span>PRESTASI SISWA</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold text-white mb-6 tracking-wide drop-shadow-lg">
                    Prestasi <span class="text-[#F3DCEB]">Membanggakan</span>
                </h1>
                <p class="text-gray-300 text-lg md:text-xl leading-relaxed">
                    Berbagai prestasi yang telah diraih oleh siswa-siswi {{ $settings['school_name'] ?? 'SMK YAJ' }} di
                    berbagai bidang
                </p>
            </div>
        </div>
    </section>

    {{-- Filter Section --}}
    <section class="py-8 bg-white border-b border-gray-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-wrap items-center justify-between gap-4">
                {{-- Level Filter --}}
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('achievements') }}"
                        class="px-5 py-2.5 rounded-xl font-medium text-sm transition-all {{ !request('level') ? 'bg-[#932F80] text-white shadow-lg shadow-[#932F80]/30' : 'bg-gray-100 text-gray-500 hover:bg-[#932F80]/10 hover:text-[#932F80]' }}">
                        Semua
                    </a>
                    @foreach(['Internasional', 'Nasional', 'Provinsi', 'Kota/Kabupaten', 'Sekolah'] as $level)
                        <a href="{{ route('achievements') }}?level={{ $level }}"
                            class="px-5 py-2.5 rounded-xl font-medium text-sm transition-all {{ request('level') == $level ? 'bg-[#932F80] text-white shadow-lg shadow-[#932F80]/30' : 'bg-gray-100 text-gray-500 hover:bg-[#932F80]/10 hover:text-[#932F80]' }}">
                            {{ $level }}
                        </a>
                    @endforeach
                </div>

                {{-- Stats --}}
                <div class="text-gray-500 text-sm">
                    <span class="font-semibold text-[#932F80]">{{ $achievements->total() ?? $achievements->count() }}</span>
                    Prestasi
                </div>
            </div>
        </div>
    </section>

    {{-- Achievements Grid --}}
    <section class="py-16 bg-purple-50 relative">
        <div class="container mx-auto px-4 lg:px-8">
            @if($achievements->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($achievements as $achievement)
                        <article
                            class="group bg-white rounded-2xl overflow-hidden border border-gray-200 shadow-lg shadow-purple-900/5 hover:shadow-2xl hover:shadow-purple-900/10 hover:border-[#932F80]/30 transition-all duration-300 hover:-translate-y-2">
                            {{-- Image --}}
                            <div class="relative h-52 overflow-hidden bg-gray-100">
                                @if($achievement->image)
                                    <img src="{{ asset('storage/' . $achievement->image) }}" alt="{{ $achievement->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-purple-100 to-white flex items-center justify-center">
                                        <i class="fas fa-trophy text-6xl text-purple-200"></i>
                                    </div>
                                @endif

                                {{-- Level Badge --}}
                                @if($achievement->level)
                                    <div class="absolute top-4 left-4">
                                        <span class="px-3 py-1.5 bg-[#932F80] text-white text-xs font-bold rounded-lg shadow-lg">
                                            {{ $achievement->level }}
                                        </span>
                                    </div>
                                @endif

                                {{-- Rank Badge --}}
                                @if($achievement->rank)
                                    <div class="absolute top-4 right-4">
                                        <span
                                            class="px-3 py-1.5 bg-white/90 backdrop-blur-sm text-[#932F80] text-xs font-bold rounded-lg shadow-lg border border-purple-100">
                                            {{ $achievement->rank }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            {{-- Content --}}
                            <div class="p-6">
                                <h3
                                    class="text-lg font-bold text-[#2A1424] mb-3 line-clamp-2 group-hover:text-[#932F80] transition-colors">
                                    {{ $achievement->title }}
                                </h3>

                                @if($achievement->student_name)
                                    <div class="flex items-center gap-3 mb-4">
                                        <div
                                            class="w-10 h-10 bg-purple-50 rounded-full flex items-center justify-center border border-purple-100">
                                            <i class="fas fa-user-graduate text-[#932F80]"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-800">{{ $achievement->student_name }}</p>
                                            @if($achievement->year)
                                                <p class="text-sm text-gray-500">Tahun {{ $achievement->year }}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                @if($achievement->description)
                                    <p class="text-gray-500 text-sm line-clamp-2">
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
                <div class="text-center py-20 bg-white rounded-3xl border border-gray-100 shadow-sm">
                    <div
                        class="w-24 h-24 bg-purple-50 rounded-full flex items-center justify-center mx-auto mb-6 border border-purple-100">
                        <i class="fas fa-trophy text-4xl text-[#932F80]"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#2A1424] mb-2">Belum Ada Prestasi</h3>
                    <p class="text-gray-500 mb-6">Prestasi yang Anda cari tidak ditemukan.</p>
                    <a href="{{ route('achievements') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-[#932F80] text-white font-semibold rounded-xl hover:bg-[#6E1F5F] transition-colors shadow-lg shadow-purple-900/20">
                        <i class="fas fa-arrow-left"></i>
                        Lihat Semua Prestasi
                    </a>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-16 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Raih Prestasi Bersama Kami!</h2>
                <p class="text-gray-300 text-lg mb-8">Bergabunglah dan jadilah bagian dari generasi berprestasi di sekolah
                    kami.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    @if(($settings['ppdb_active'] ?? false))
                        <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                            class="inline-flex items-center gap-2 px-8 py-4 bg-white text-[#932F80] font-bold rounded-xl hover:bg-gray-100 transition-colors shadow-lg">
                            <i class="fas fa-user-plus"></i>
                            Daftar PPDB
                        </a>
                    @endif
                    <a href="{{ route('news') }}"
                        class="inline-flex items-center gap-2 px-8 py-4 bg-white/10 backdrop-blur-sm text-white font-bold rounded-xl border-2 border-white/20 hover:bg-white/20 transition-colors">
                        <i class="fas fa-newspaper"></i>
                        Baca Berita
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection