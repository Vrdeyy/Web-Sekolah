@extends('layouts.app')

@section('title', 'Pusat Bisnis')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-premium-dark relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto" data-aos="fade-up">
                <div
                    class="inline-flex items-center gap-2 px-6 py-3 bg-[#8C51A5]/25 backdrop-blur-md rounded-full text-[#F0E7F8] text-sm font-bold mb-6 border border-[#8C51A5]/30 shadow-lg" data-aos="fade-down" data-aos-delay="200">
                    <i class="fas fa-store animate-bounce text-[#F8CB62]"></i>
                    <span>TEACHING FACTORY</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-black text-white mb-6 tracking-wide drop-shadow-lg" data-aos="zoom-in" data-aos-delay="400">
                    Pusat <span class="text-[#F8CB62] bg-gradient-to-r from-[#F8CB62] to-[#D668EA] bg-clip-text text-transparent">Bisnis</span>
                </h1>
                <p class="text-gray-300 text-lg md:text-xl leading-relaxed" data-aos="fade-up" data-aos-delay="600">
                    Unit usaha dan teaching factory sebagai wadah pembelajaran wirausaha bagi siswa
                </p>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-12 bg-white relative border-b border-gray-200">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-wrap items-center justify-center gap-8 md:gap-16">
                <div class="text-center group" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-4xl font-black text-[#8C51A5] mb-1 transition-transform group-hover:scale-110">{{ $businessCenters->count() }}</div>
                    <div class="text-gray-500 text-sm font-bold uppercase tracking-widest">Unit Bisnis</div>
                </div>
                <div class="text-center group" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-4xl font-black text-[#612F73] mb-1 transition-transform group-hover:scale-110">100%</div>
                    <div class="text-gray-500 text-sm font-bold uppercase tracking-widest">Professional</div>
                </div>
                <div class="text-center group" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-4xl font-black text-[#8C51A5] mb-1 transition-transform group-hover:scale-110">24/7</div>
                    <div class="text-gray-500 text-sm font-bold uppercase tracking-widest">Layanan</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Business Centers Grid --}}
    <section class="py-24 bg-[#F0E7F8]/30 relative overflow-hidden">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid md:grid-cols-2 gap-10">
                @foreach($businessCenters as $index => $center)
                    <article
                        class="group bg-white rounded-[2.5rem] overflow-hidden border border-[#8C51A5]/10 shadow-xl shadow-[#612F73]/5 hover:shadow-premium-lg hover:border-[#8C51A5]/30 transition-all duration-800 ease-in-out hover:-translate-y-4 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="{{ $index * 150 }}">
                        <div class="grid md:grid-cols-2 h-full">
                            {{-- Image Side --}}
                            <div class="relative overflow-hidden h-64 md:h-full bg-gray-100">
                                @if($center->image)
                                    <img src="{{ asset('storage/' . $center->image) }}" alt="{{ $center->name }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-purple-100 to-white flex items-center justify-center">
                                        <i class="fas fa-store text-6xl text-purple-200"></i>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-[#612F73]/80 to-transparent flex flex-col justify-end p-8 md:p-6 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                    <a href="{{ route('business-center.show', $center->slug) }}" class="inline-flex items-center gap-2 text-white font-black text-sm uppercase tracking-widest">
                                        Lihat Detail <i class="fas fa-arrow-right text-[#F8CB62]"></i>
                                    </a>
                                </div>
                            </div>

                            {{-- Content Side --}}
                            <div class="p-8 md:p-10 flex flex-col justify-center">
                                <h3 class="text-2xl font-black text-[#612F73] mb-4 group-hover:text-[#8C51A5] transition-colors leading-tight">
                                    {{ $center->name }}
                                </h3>
                                
                                @if($center->description)
                                    <p class="text-gray-600 text-sm mb-6 line-clamp-3 leading-relaxed font-medium">
                                        {{ Str::limit(strip_tags($center->description), 150) }}
                                    </p>
                                @endif

                                 <div class="space-y-4">
                                    <div class="flex items-center gap-4 group/item">
                                        <div class="w-10 h-10 rounded-xl bg-[#8C51A5]/10 flex items-center justify-center text-[#8C51A5] group-hover/item:bg-[#8C51A5] group-hover/item:text-white transition-all duration-300">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Jam Operasional</span>
                                            <span class="text-sm font-black text-[#612F73]">08:00 - 16:00 WIB</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-4 group/item">
                                        <div class="w-10 h-10 rounded-xl bg-[#D668EA]/10 flex items-center justify-center text-[#D668EA] group-hover/item:bg-[#D668EA] group-hover/item:text-white transition-all duration-300">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Status</span>
                                            <span class="text-sm font-black text-[#612F73]">Buka Hari Ini</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Benefits Section --}}
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="text-[#8C51A5] font-black text-[10px] tracking-[0.3em] uppercase mb-4 block">Keunggulan Kami</span>
                <h2 class="text-4xl md:text-5xl font-black text-[#612F73] mb-6 tracking-tight">Kenapa Memilih Layanan <span class="text-[#8C51A5]">Kami?</span></h2>
                <p class="text-gray-500 text-lg font-medium leading-relaxed" data-aos="fade-up" data-aos-delay="200">Kami berkomitmen memberikan layanan terbaik dengan standar profesional dan hasil yang memuaskan.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white group hover:bg-premium-dark rounded-[2.5rem] p-10 text-center border border-[#8C51A5]/10 transition-all duration-700 ease-in-out hover:-translate-y-3 shadow-xl shadow-[#612F73]/5 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-20 h-20 bg-[#8C51A5]/10 rounded-3xl mx-auto flex items-center justify-center mb-8 shadow-lg group-hover:scale-110 group-hover:bg-[#8C51A5] transition-all duration-500">
                        <i class="fas fa-award text-4xl text-[#8C51A5] group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-black text-[#612F73] mb-4 group-hover:text-white transition-colors">Kualitas Terjamin</h3>
                    <p class="text-gray-500 group-hover:text-white/70 transition-colors leading-relaxed font-medium">Standar kualitas tinggi dalam setiap produk and layanan yang kami berikan.</p>
                </div>
                <div class="bg-white group hover:bg-premium-dark rounded-[2.5rem] p-10 text-center border border-[#8C51A5]/10 transition-all duration-700 ease-in-out hover:-translate-y-3 shadow-xl shadow-[#612F73]/5 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-20 h-20 bg-[#D668EA]/10 rounded-3xl mx-auto flex items-center justify-center mb-8 shadow-lg group-hover:scale-110 group-hover:bg-[#D668EA] transition-all duration-500">
                        <i class="fas fa-hand-holding-usd text-4xl text-[#D668EA] group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-black text-[#612F73] mb-4 group-hover:text-white transition-colors">Harga Kompetitif</h3>
                    <p class="text-gray-500 group-hover:text-white/70 transition-colors leading-relaxed font-medium">Penawaran harga terbaik yang bersaing dengan kualitas yang tidak diragukan.</p>
                </div>
                <div class="bg-white group hover:bg-premium-dark rounded-[2.5rem] p-10 text-center border border-[#8C51A5]/10 transition-all duration-700 ease-in-out hover:-translate-y-3 shadow-xl shadow-[#612F73]/5 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-20 h-20 bg-[#F8CB62]/10 rounded-3xl mx-auto flex items-center justify-center mb-8 shadow-lg group-hover:scale-110 group-hover:bg-[#F8CB62] transition-all duration-500">
                        <i class="fas fa-users-cog text-4xl text-[#F8CB62] group-hover:text-[#612F73]"></i>
                    </div>
                    <h3 class="text-xl font-black text-[#612F73] mb-4 group-hover:text-white transition-colors">SDM Professional</h3>
                    <p class="text-gray-500 group-hover:text-white/70 transition-colors leading-relaxed font-medium">Didukung oleh siswa terlatih dan pembimbing ahli di bidangnya.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-24 bg-premium-dark relative overflow-hidden border-t border-white/5">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-black text-white mb-6">Tertarik Menjadi Partner?</h2>
                <p class="text-gray-400 text-lg md:text-xl mb-12 font-medium" data-aos="fade-up" data-aos-delay="200">Kami terbuka untuk kolaborasi strategis dengan Dunia Usaha dan Dunia Industri (DUDI).</p>
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center gap-4 px-12 py-5 bg-gradient-to-r from-[#F8CB62] to-[#f5b82e] text-[#612F73] font-black rounded-2xl hover:shadow-golden transition-all shadow-xl hover:-translate-y-1 transform" data-aos="fade-up" data-aos-delay="400">
                    <i class="fas fa-handshake text-2xl"></i>
                    HUBUNGI KAMI SEKARANG
                </a>
            </div>
        </div>
    </section>
@endsection