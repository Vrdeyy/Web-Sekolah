@extends('layouts.app')

@section('title', 'Tenaga Kependidikan')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-6 py-3 bg-[#932F80]/25 backdrop-blur-md rounded-full text-[#F3DCEB] text-sm font-semibold mb-6 border border-[#932F80]/50 shadow-glow"
                    data-aos="fade-down" data-aos-delay="200">
                    <i class="fas fa-users-cog animate-bounce"></i>
                    <span>TENAGA KEPENDIDIKAN</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold text-white mb-6 tracking-wide drop-shadow-lg"
                    data-aos="zoom-in" data-aos-delay="400">
                    Daftar <span class="text-[#F3DCEB]">Staff</span>
                </h1>
                <p class="text-gray-300 text-lg md:text-xl leading-relaxed" data-aos="fade-up" data-aos-delay="600">
                    Tenaga kependidikan yang mendukung operasional profesional di
                    {{ $settings['school_name'] ?? 'SMK YAJ' }}
                </p>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-12 bg-white relative border-b border-gray-200">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto text-center">
                {{-- Stat 1 --}}
                <div class="group p-8 rounded-3xl bg-purple-50 border border-purple-100 hover:border-[#932F80]/50 transition-all duration-500 transform hover:-translate-y-2"
                    data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="text-4xl font-extrabold text-[#932F80] mb-2 leading-none group-hover:scale-110 transition-transform">
                        {{ $staff->count() }}</div>
                    <div class="text-gray-600 font-bold uppercase tracking-widest text-xs">TENAGA KEPENDIDIKAN</div>
                </div>

                {{-- Stat 2 --}}
                <div class="group p-8 rounded-3xl bg-emerald-50 border border-emerald-100 hover:border-emerald-500/50 transition-all duration-500 transform hover:-translate-y-2"
                    data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="text-4xl font-extrabold text-emerald-600 mb-2 leading-none group-hover:scale-110 transition-transform">
                        100%</div>
                    <div class="text-gray-600 font-bold uppercase tracking-widest text-xs">PROFESIONAL</div>
                </div>

                {{-- Stat 3 --}}
                <div class="group p-8 rounded-3xl bg-blue-50 border border-blue-100 hover:border-blue-500/50 transition-all duration-500 transform hover:-translate-y-2"
                    data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="text-4xl font-extrabold text-blue-600 mb-2 leading-none group-hover:scale-110 transition-transform">
                        EXCELLENT</div>
                    <div class="text-gray-600 font-bold uppercase tracking-widest text-xs">PELAYANAN</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Staff Grid --}}
    <section class="py-24 bg-purple-50 relative overflow-hidden">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($staff as $index => $member)
                    <article
                        class="group bg-white rounded-[2.5rem] overflow-hidden border border-gray-200 shadow-lg shadow-purple-900/5 hover:shadow-2xl hover:shadow-purple-900/10 hover:border-[#932F80]/30 transition-all duration-500 hover:-translate-y-2 text-center p-8"
                        data-aos="fade-up" data-aos-delay="{{ ($index % 4) * 150 }}">
                        {{-- Photo --}}
                        <div class="relative mb-8 flex justify-center">
                            <div
                                class="w-36 h-36 rounded-full overflow-hidden border-4 border-gray-100 shadow-xl group-hover:border-[#932F80]/50 transition-all duration-500 p-1">
                                @if($member->photo)
                                    <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}"
                                        class="w-full h-full object-cover rounded-full group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-purple-100 to-white flex items-center justify-center rounded-full">
                                        <i class="fas fa-user text-5xl text-purple-200"></i>
                                    </div>
                                @endif
                            </div>

                            {{-- Experience Badge --}}
                            <div class="absolute -bottom-2 right-1/2 translate-x-12">
                                <div
                                    class="w-8 h-8 bg-[#932F80] rounded-full flex items-center justify-center text-white text-[10px] shadow-lg border-2 border-white">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="space-y-3">
                            <h3
                                class="text-xl font-extrabold text-[#2A1424] group-hover:text-[#932F80] transition-colors leading-tight">
                                {{ $member->name }}
                            </h3>

                            @if($member->position)
                                <p class="text-[#932F80] text-xs font-extrabold uppercase tracking-widest">{{ $member->position }}
                                </p>
                            @endif

                            @if($member->department)
                                <div class="inline-flex items-center gap-2 px-3 py-1 bg-gray-50 rounded-lg border border-gray-100">
                                    <i class="fas fa-building text-[10px] text-gray-400"></i>
                                    <span
                                        class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">{{ $member->department }}</span>
                                </div>
                            @endif

                            {{-- Social/Contact --}}
                            @if($member->email)
                                <div class="mt-8 pt-6 border-t border-gray-100">
                                    <a href="mailto:{{ $member->email }}"
                                        class="inline-flex items-center gap-3 px-6 py-2.5 bg-[#932F80]/10 text-[#932F80] hover:bg-[#932F80] hover:text-white transition-all duration-300 rounded-xl text-xs font-extrabold uppercase tracking-widest border border-[#932F80]/20 group/btn">
                                        <i class="fas fa-envelope text-[10px]"></i>
                                        Kirim Pesan
                                    </a>
                                </div>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section
        class="py-24 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden border-t border-white/10">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10 text-center">
            <div class="max-w-3xl mx-auto" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6">Butuh Bantuan?</h2>
                <p class="text-gray-300 text-lg md:text-xl mb-12 font-medium" data-aos="fade-up" data-aos-delay="200">Tim
                    kami siap membantu Anda dengan berbagai kebutuhan administrasi dan informasi di lingkungan sekolah.</p>
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center gap-4 px-12 py-5 bg-[#932F80] text-white font-extrabold rounded-2xl hover:bg-[#6E1F5F] transition-all shadow-2xl hover:shadow-purple-500/50 hover:-translate-y-1 transform"
                    data-aos="fade-up" data-aos-delay="400">
                    <i class="fas fa-phone-alt text-2xl"></i>
                    HUBUNGI KAMI SEKARANG
                </a>
            </div>
        </div>
    </section>
@endsection