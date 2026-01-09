@extends('layouts.app')

@section('title', 'Prestasi Siswa')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-premium-dark relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-6 py-3 bg-[#8C51A5]/20 backdrop-blur-md rounded-xl text-[#F0E7F8] text-xs font-black mb-6 border border-[#8C51A5]/30 shadow-lg"
                    data-aos="fade-down" data-aos-delay="200">
                    <i class="fas fa-trophy text-[#F8CB62] animate-bounce"></i>
                    <span class="tracking-widest capitalize">PRESTASI SISWA</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-black text-white mb-6 tracking-tight" data-aos="zoom-in"
                    data-aos-delay="400">
                    Prestasi <span
                        class="text-[#F8CB62] bg-gradient-to-r from-[#F8CB62] to-[#D668EA] bg-clip-text text-transparent">Membanggakan</span>
                </h1>
                <p class="text-gray-400 text-lg md:text-xl leading-relaxed font-medium" data-aos="fade-up"
                    data-aos-delay="600">
                    Kumpulan sejarah manis dan capaian gemilang siswa-siswi {{ $settings['school_name'] ?? 'SMK YAJ' }} di
                    berbagai bidang.
                </p>
            </div>
        </div>
    </section>

    {{-- Filter Section --}}
    <section class="py-10 bg-white border-b border-gray-100">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-8" data-aos="fade-right">
                {{-- Level Filter --}}
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('achievements') }}"
                        class="px-6 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest transition-all {{ !request('level') ? 'bg-[#8C51A5] text-white shadow-lg shadow-[#8C51A5]/30' : 'bg-gray-50 text-gray-400 hover:bg-[#8C51A5]/10 hover:text-[#8C51A5]' }}">
                        SEMUA
                    </a>
                    @foreach(['Internasional', 'Nasional', 'Provinsi', 'Kota/Kabupaten', 'Sekolah'] as $level)
                        <a href="{{ route('achievements') }}?level={{ $level }}"
                            class="px-6 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest transition-all {{ request('level') == $level ? 'bg-[#8C51A5] text-white shadow-lg shadow-[#8C51A5]/30' : 'bg-gray-50 text-gray-400 hover:bg-[#8C51A5]/10 hover:text-[#8C51A5]' }}">
                            {{ $level }}
                        </a>
                    @endforeach
                </div>

                {{-- Stats --}}
                <div class="flex items-center gap-3 bg-[#F0E7F8]/50 px-6 py-3 rounded-2xl border border-[#8C51A5]/10"
                    data-aos="fade-left">
                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Total Koleksi:</span>
                    <span class="font-black text-[#8C51A5]">{{ $achievements->total() ?? $achievements->count() }}</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Achievements Grid --}}
    <section class="py-20 bg-[#F0E7F8]/30 relative">
        <div class="container mx-auto px-4 lg:px-8">
            @if($achievements->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @foreach($achievements as $index => $achievement)
                        <div data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 150 }}">
                            <article
                                class="group h-full bg-white rounded-[2.5rem] overflow-hidden border border-[#8C51A5]/10 shadow-xl shadow-[#612F73]/5 hover:shadow-2xl hover:border-[#8C51A5]/30 transition-all duration-500 ease-in-out hover:-translate-y-2 hover:scale-[1.01]">
                                {{-- Image --}}
                                <div class="relative h-64 overflow-hidden bg-gray-50">
                                    @if($achievement->image)
                                        <img src="{{ asset('storage/' . $achievement->image) }}" alt="{{ $achievement->title }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-[#F0E7F8] to-white flex items-center justify-center">
                                            <i class="fas fa-trophy text-6xl text-[#D668EA]/20"></i>
                                        </div>
                                    @endif
    
                                    {{-- Overlay Gradient --}}
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-[#612F73]/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                    </div>
    
                                    {{-- Level Badge --}}
                                    @if($achievement->level)
                                        <div class="absolute top-6 left-6">
                                            <span
                                                class="px-4 py-2 bg-[#8C51A5] text-white text-[10px] font-black rounded-xl shadow-lg uppercase tracking-widest">
                                                {{ $achievement->level }}
                                            </span>
                                        </div>
                                    @endif
    
                                    {{-- Rank Badge --}}
                                    @if($achievement->rank)
                                        <div class="absolute top-6 right-6">
                                            <span
                                                class="px-4 py-2 bg-white/90 backdrop-blur-md text-[#612F73] text-[10px] font-black rounded-xl shadow-lg border border-[#8C51A5]/10 uppercase tracking-widest">
                                                {{ $achievement->rank }}
                                            </span>
                                        </div>
                                    @endif
                                </div>
    
                                {{-- Content --}}
                                <div class="p-8 md:p-10">
                                    <h3
                                        class="text-xl md:text-2xl font-black text-[#612F73] mb-4 group-hover:text-[#8C51A5] transition-colors line-clamp-2 leading-tight">
                                        {{ $achievement->title }}
                                    </h3>
    
                                    @if($achievement->student_name)
                                        <div class="flex items-center gap-2 mb-4">
                                            <span class="w-8 h-[2px] bg-[#F8CB62]"></span>
                                            <p class="text-[#8C51A5] text-[10px] font-black uppercase tracking-[0.2em]">
                                                {{ $achievement->student_name }}
                                                @if($achievement->year)
                                                    <span class="text-gray-400 font-bold ml-1">• {{ $achievement->year }}</span>
                                                @endif
                                            </p>
                                        </div>
                                    @endif
    
                                    @if($achievement->description)
                                        <p class="text-gray-500 text-sm mb-8 line-clamp-3 leading-relaxed font-medium">
                                            {{ strip_tags($achievement->description) }}
                                        </p>
                                    @endif
    
                                    {{-- Footer --}}
                                    <div class="flex items-center justify-between pt-6 border-t border-gray-50">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-[#8C51A5]/10 rounded-xl flex items-center justify-center">
                                                <i class="fas fa-award text-[#8C51A5] text-sm"></i>
                                            </div>
                                            <span
                                                class="text-xs font-black text-[#612F73] uppercase tracking-widest">{{ $achievement->rank ?? 'Prestasi' }}</span>
                                        </div>
                                        <a href="{{ route('achievement.show', $achievement->slug) }}"
                                            class="group/link inline-flex items-center gap-2 text-[#8C51A5] font-black text-[10px] uppercase tracking-[0.2em] hover:text-[#612F73] transition-all duration-300 ease-in-out">
                                            DETAIL
                                            <i
                                                class="fas fa-chevron-right text-[8px] text-[#F8CB62] group-hover/link:translate-x-1 transition-transform duration-300 ease-in-out"></i>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-12">
                    {{ $achievements->links() }}
                </div>
            @else
                {{-- Empty State --}}
                <div class="text-center py-24 bg-white rounded-[3rem] border border-[#8C51A5]/10 shadow-premium-lg"
                    data-aos="zoom-in">
                    <div
                        class="w-32 h-32 bg-[#F0E7F8] rounded-full flex items-center justify-center mx-auto mb-10 border border-[#8C51A5]/20 shadow-xl">
                        <i class="fas fa-trophy text-5xl text-[#8C51A5]"></i>
                    </div>
                    <h3 class="text-3xl font-black text-[#612F73] mb-4">Belum Ada Prestasi</h3>
                    <p class="text-gray-500 mb-10 max-w-md mx-auto font-medium">Prestasi yang Anda cari belum tersedia dalam
                        kategori ini. Silakan cek kategori lain atau kembali lagi nanti.</p>
                    <a href="{{ route('achievements') }}"
                        class="inline-flex items-center gap-3 px-10 py-4 bg-gradient-to-r from-[#612F73] to-[#8C51A5] text-white font-black rounded-2xl hover:shadow-premium-lg transition-all duration-500 hover:-translate-y-1 transform uppercase text-[10px] tracking-widest">
                        <i class="fas fa-arrow-left"></i>
                        LIHAT SEMUA PRESTASI
                    </a>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-24 bg-premium-dark relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
                <h2 class="text-3xl md:text-5xl lg:text-6xl font-black text-white mb-6 leading-tight">Mulai Ukir <span
                        class="text-[#F8CB62]">Sejarahmu</span> Disini!</h2>
                <p class="text-gray-400 text-lg md:text-xl mb-12 font-medium" data-aos="fade-up" data-aos-delay="200">
                    Jadilah bagian dari komunitas pembelajar yang dinamis dan raih prestasi membanggakan bersama kami.
                </p>
                <div class="flex flex-wrap justify-center gap-6">
                    @if(($settings['ppdb_active'] ?? false))
                        <div data-aos="fade-up" data-aos-delay="400">
                            <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                                class="inline-flex items-center gap-3 px-10 py-5 bg-gradient-to-r from-[#F8CB62] to-[#f5b82e] text-[#612F73] font-black rounded-2xl hover:shadow-golden transition-all duration-500 hover:-translate-y-1 transform uppercase text-xs tracking-widest">
                                <i class="fas fa-user-plus text-lg"></i>
                                DAFTAR PPDB SEKARANG
                            </a>
                        </div>
                    @endif
                    <div data-aos="fade-up" data-aos-delay="{{ ($settings['ppdb_active'] ?? false) ? 500 : 400 }}">
                        <a href="{{ route('news') }}"
                            class="inline-flex items-center gap-3 px-10 py-5 bg-white/5 backdrop-blur-md text-white font-black rounded-2xl border border-white/10 hover:bg-white/10 transition-all duration-500 hover:-translate-y-1 transform uppercase text-xs tracking-widest">
                            <i class="fas fa-newspaper text-lg text-[#F8CB62]"></i>
                            BACA KISAH SUKSES
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection