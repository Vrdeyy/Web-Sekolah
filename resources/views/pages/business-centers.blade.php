@extends('layouts.app')

@section('title', 'Pusat Bisnis')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <div
                    class="inline-flex items-center gap-2 px-6 py-3 bg-[#4f2744]/25 backdrop-blur-md rounded-full text-[#F3DCEB] text-sm font-semibold mb-6 border border-[#4f2744]/50 shadow-glow">
                    <i class="fas fa-store animate-bounce"></i>
                    <span>TEACHING FACTORY</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold text-white mb-6 tracking-wide drop-shadow-lg">
                    Pusat <span class="text-[#F3DCEB]">Bisnis</span>
                </h1>
                <p class="text-gray-300 text-lg md:text-xl leading-relaxed">
                    Unit usaha dan teaching factory sebagai wadah pembelajaran wirausaha bagi siswa
                </p>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-12 bg-white relative border-b border-gray-200">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-wrap items-center justify-center gap-8 md:gap-16">
                <div class="text-center group">
                    <div class="text-4xl font-extrabold text-[#4f2744] mb-1 transition-transform group-hover:scale-110">{{ $businessCenters->count() }}</div>
                    <div class="text-gray-600 text-sm font-medium tracking-wide">Unit Bisnis</div>
                </div>
                <div class="text-center group">
                    <div class="text-4xl font-extrabold text-[#2A1424] mb-1 transition-transform group-hover:scale-110">100%</div>
                    <div class="text-gray-600 text-sm font-medium tracking-wide">Professional</div>
                </div>
                <div class="text-center group">
                    <div class="text-4xl font-extrabold text-[#4f2744] mb-1 transition-transform group-hover:scale-110">24/7</div>
                    <div class="text-gray-600 text-sm font-medium tracking-wide">Layanan</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Business Centers Grid --}}
    <section class="py-24 bg-purple-50 relative overflow-hidden">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid md:grid-cols-2 gap-10">
                @foreach($businessCenters as $center)
                    <article
                        class="group bg-white rounded-[2.5rem] overflow-hidden border border-gray-200 shadow-xl shadow-purple-900/5 hover:shadow-2xl hover:shadow-purple-900/10 hover:border-[#4f2744]/30 transition-all duration-500 hover:-translate-y-2">
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
                                <div class="absolute inset-0 bg-gradient-to-t from-[#2A1424]/80 to-transparent flex flex-col justify-end p-8 md:p-6 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                    <a href="#" class="inline-flex items-center gap-2 text-white font-bold text-sm">
                                        Lihat Detail <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>

                            {{-- Content Side --}}
                            <div class="p-8 md:p-10 flex flex-col justify-center">
                                <h3 class="text-2xl font-extrabold text-[#2A1424] mb-4 group-hover:text-[#4f2744] transition-colors leading-tight">
                                    {{ $center->name }}
                                </h3>
                                
                                @if($center->description)
                                    <p class="text-gray-600 text-sm mb-6 line-clamp-3 leading-relaxed font-medium">
                                        {{ $center->description }}
                                    </p>
                                @endif

                                <div class="space-y-4">
                                    <div class="flex items-center gap-4 group/item">
                                        <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center text-[#4f2744] group-hover/item:bg-[#4f2744] group-hover/item:text-white transition-all duration-300">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Jam Operasional</span>
                                            <span class="text-sm font-bold text-[#2A1424]">08:00 - 16:00 WIB</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-4 group/item">
                                        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 group-hover/item:bg-blue-600 group-hover/item:text-white transition-all duration-300">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Status</span>
                                            <span class="text-sm font-bold text-[#2A1424]">Buka Hari Ini</span>
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
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-[#4f2744] font-extrabold text-sm tracking-widest uppercase mb-4 block">Keunggulan Kami</span>
                <h2 class="text-4xl md:text-5xl font-extrabold text-[#2A1424] mb-6 tracking-tight">Kenapa Memilih Layanan <span class="text-[#4f2744]">Kami?</span></h2>
                <p class="text-gray-600 text-lg font-medium leading-relaxed">Kami berkomitmen memberikan layanan terbaik dengan standar profesional dan hasil yang memuaskan.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-[#4f2744]/5 rounded-[2.5rem] p-10 text-center group hover:bg-gradient-to-r hover:from-[#4f2744] hover:to-[#3a1c32] transition-all duration-500 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-white rounded-3xl mx-auto flex items-center justify-center mb-8 shadow-xl shadow-purple-900/5 group-hover:scale-110 transition-transform duration-500">
                        <i class="fas fa-award text-4xl text-[#4f2744] group-hover:text-[#4f2744]"></i>
                    </div>
                    <h3 class="text-xl font-extrabold text-[#2A1424] mb-4 group-hover:text-white transition-colors">Kualitas Terjamin</h3>
                    <p class="text-gray-600 group-hover:text-white/90 transition-colors leading-relaxed font-medium">Standar kualitas tinggi dalam setiap produk dan layanan yang kami berikan.</p>
                </div>
                <div class="bg-[#4f2744]/5 rounded-[2.5rem] p-10 text-center group hover:bg-gradient-to-r hover:from-[#4f2744] hover:to-[#3a1c32] transition-all duration-500 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-white rounded-3xl mx-auto flex items-center justify-center mb-8 shadow-xl shadow-purple-900/5 group-hover:scale-110 transition-transform duration-500">
                        <i class="fas fa-hand-holding-usd text-4xl text-[#4f2744] group-hover:text-[#4f2744]"></i>
                    </div>
                    <h3 class="text-xl font-extrabold text-[#2A1424] mb-4 group-hover:text-white transition-colors">Harga Kompetitif</h3>
                    <p class="text-gray-600 group-hover:text-white/90 transition-colors leading-relaxed font-medium">Penawaran harga terbaik yang bersaing dengan kualitas yang tidak diragukan.</p>
                </div>
                <div class="bg-[#4f2744]/5 rounded-[2.5rem] p-10 text-center group hover:bg-gradient-to-r hover:from-[#4f2744] hover:to-[#3a1c32] transition-all duration-500 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-white rounded-3xl mx-auto flex items-center justify-center mb-8 shadow-xl shadow-purple-900/5 group-hover:scale-110 transition-transform duration-500">
                        <i class="fas fa-users-cog text-4xl text-[#4f2744] group-hover:text-[#4f2744]"></i>
                    </div>
                    <h3 class="text-xl font-extrabold text-[#2A1424] mb-4 group-hover:text-white transition-colors">SDM Professional</h3>
                    <p class="text-gray-600 group-hover:text-white/90 transition-colors leading-relaxed font-medium">Didukung oleh siswa terlatih dan pembimbing ahli di bidangnya.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-24 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden border-t border-white/10">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6">Tertarik Menjadi Partner?</h2>
                <p class="text-gray-300 text-lg md:text-xl mb-12 font-medium">Kami terbuka untuk kolaborasi strategis dengan Dunia Usaha dan Dunia Industri (DUDI).</p>
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center gap-4 px-12 py-5 bg-gradient-to-r from-[#4f2744] to-[#3a1c32] text-white font-extrabold rounded-2xl hover:opacity-90 transition-all shadow-2xl hover:shadow-[#4f2744]/50 hover:-translate-y-1 transform">
                    <i class="fas fa-handshake text-2xl"></i>
                    HUBUNGI KAMI SEKARANG
                </a>
            </div>
        </div>
    </section>
@endsection