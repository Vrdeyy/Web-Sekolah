@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-premium-dark relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-6 py-3 bg-[#8C51A5]/20 backdrop-blur-md rounded-xl text-[#F0E7F8] text-[10px] font-black mb-6 border border-[#8C51A5]/30 shadow-lg uppercase tracking-widest"
                    data-aos="fade-down" data-aos-delay="200">
                    <i class="fas fa-phone-alt animate-pulse text-[#F8CB62]"></i>
                    <span>HUBUNGI KAMI SEKARANG</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-black text-white mb-6 tracking-tight drop-shadow-lg uppercase"
                    data-aos="zoom-in" data-aos-delay="400">
                    Kontak <span
                        class="text-[#F8CB62] bg-gradient-to-r from-[#F8CB62] to-[#D668EA] bg-clip-text text-transparent">Layanan</span>
                </h1>
                <p class="text-gray-400 text-lg md:text-xl font-medium leading-relaxed" data-aos="fade-up"
                    data-aos-delay="600">
                    Tim kami siap melayani Anda. Silakan hubungi kami melalui saluran komunikasi yang tersedia.
                </p>
            </div>
        </div>
    </section>

    {{-- Contact Section --}}
    <section class="py-24 bg-white relative">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-10">
                {{-- Contact Cards --}}
                <div class="space-y-8">
                    {{-- Address Card --}}
                    <div data-aos="fade-right" data-aos-delay="100">
                        <div
                            class="bg-[#F0E7F8]/30 rounded-[2.5rem] p-8 border border-[#8C51A5]/10 shadow-premium-lg hover:border-[#8C51A5]/30 transition-all duration-500 ease-in-out hover:-translate-y-2 group">
                            <div class="flex items-start gap-6">
                                <div
                                    class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg text-[#8C51A5] group-hover:bg-[#8C51A5] group-hover:text-white transition-all duration-500">
                                    <i class="fas fa-map-marked-alt text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-black text-[#612F73] mb-3 uppercase tracking-tight">Alamat Sekolah</h3>
                                    <p class="text-gray-500 text-sm leading-relaxed font-medium">
                                        {{ $settings['address'] ?? 'Jl. Raya Bogor KM. 31, Cimpaeun, Tapos, Kota Depok' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Phone Card --}}
                    <div data-aos="fade-right" data-aos-delay="200">
                        <div
                            class="bg-[#8C51A5]/5 rounded-[2.5rem] p-8 border border-[#8C51A5]/10 shadow-premium-lg hover:border-[#8C51A5]/30 transition-all duration-500 ease-in-out hover:-translate-y-2 group">
                            <div class="flex items-start gap-6">
                                <div
                                    class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg text-[#8C51A5] group-hover:bg-[#8C51A5] group-hover:text-white transition-all duration-500">
                                    <i class="fas fa-headset text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-black text-[#612F73] mb-3 uppercase tracking-tight">Layanan Telepon</h3>
                                    <p class="text-gray-500 text-sm leading-relaxed font-medium mt-1">
                                        {{ $settings['school_phone'] ?? '(021) 8791 2345' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Email Card --}}
                    <div data-aos="fade-right" data-aos-delay="250">
                        <div
                            class="bg-[#F0E7F8]/30 rounded-[2.5rem] p-8 border border-[#8C51A5]/10 shadow-premium-lg hover:border-[#8C51A5]/30 transition-all duration-500 ease-in-out hover:-translate-y-2 group">
                            <div class="flex items-start gap-6">
                                <div
                                    class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg text-[#8C51A5] group-hover:bg-[#8C51A5] group-hover:text-white transition-all duration-500">
                                    <i class="fas fa-envelope-open-text text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-black text-[#612F73] mb-3 uppercase tracking-tight">Email Resmi</h3>
                                    <p class="text-gray-500 text-sm leading-relaxed font-medium mt-1 break-all">
                                        {{ $settings['school_email'] ?? 'info@smkyaj.sch.id' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- WhatsApp Card --}}
                    @if($settings['school_phone'] ?? false)
                        <div data-aos="fade-right" data-aos-delay="300">
                            <div
                                class="bg-[#8C51A5]/5 rounded-[2.5rem] p-8 border border-[#8C51A5]/10 shadow-premium-lg hover:border-[#8C51A5]/30 transition-all duration-500 ease-in-out hover:-translate-y-2 group">
                                <div class="flex items-start gap-6">
                                    <div
                                        class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg text-[#25D366] group-hover:bg-[#25D366] group-hover:text-white transition-all duration-500">
                                        <i class="fab fa-whatsapp text-3xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-black text-[#612F73] mb-3 uppercase tracking-tight">WhatsApp Official
                                        </h3>
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['school_phone']) }}"
                                            target="_blank"
                                            class="text-[#25D366] hover:text-[#128C7E] font-black text-sm transition-colors block mt-1 uppercase tracking-widest">
                                            {{ $settings['school_phone'] }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Social Media --}}
                    <div data-aos="fade-right" data-aos-delay="400">
                        <div
                            class="bg-[#8C51A5]/5 rounded-[2.5rem] p-10 border border-[#8C51A5]/10 shadow-premium-lg hover:border-[#8C51A5]/30 transition-all duration-500 ease-in-out hover:-translate-y-2 group">
                            <h3 class="font-black text-[#612F73] text-lg mb-8 tracking-tight uppercase">Media Sosial Kami
                            </h3>
                            <div class="flex flex-wrap gap-5">
                                @if(isset($socialLinks) && $socialLinks->count() > 0)
                                    @foreach($socialLinks as $index => $social)
                                        @if($social && $social->url)
                                            <div data-aos="zoom-in" data-aos-delay="{{ 500 + ($index * 100) }}">
                                                <a href="{{ $social->url }}" target="_blank"
                                                    class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-[#8C51A5] shadow-lg border border-[#8C51A5]/10 hover:bg-[#8C51A5] hover:text-white transition-all transform hover:-translate-y-2 duration-500">
                                                    <i class="{{ $social->icon_class }} text-xl"></i>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <div data-aos="zoom-in" data-aos-delay="500">
                                        <a href="#"
                                            class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-[#8C51A5] shadow-lg border border-[#8C51A5]/10 hover:bg-[#8C51A5] hover:text-white transition-all transform hover:-translate-y-2 duration-500">
                                            <i class="fab fa-instagram text-xl"></i>
                                        </a>
                                    </div>
                                    <div data-aos="zoom-in" data-aos-delay="600">
                                        <a href="#"
                                            class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-[#8C51A5] shadow-lg border border-[#8C51A5]/10 hover:bg-[#8C51A5] hover:text-white transition-all transform hover:-translate-y-2 duration-500">
                                            <i class="fab fa-facebook-f text-xl"></i>
                                        </a>
                                    </div>
                                    <div data-aos="zoom-in" data-aos-delay="700">
                                        <a href="#"
                                            class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-[#8C51A5] shadow-lg border border-[#8C51A5]/10 hover:bg-[#8C51A5] hover:text-white transition-all transform hover:-translate-y-2 duration-500">
                                            <i class="fab fa-youtube text-xl"></i>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Map --}}
                <div class="lg:col-span-2" data-aos="fade-left">
                    <div
                        class="bg-white rounded-[2.5rem] overflow-hidden border border-[#8C51A5]/10 shadow-premium-lg h-full p-4 min-h-[500px]">
                        <div class="w-full h-full rounded-[2rem] overflow-hidden shadow-inner [&>iframe]:w-full [&>iframe]:h-full [&>iframe]:min-h-[500px]">
                            @if($settings['google_maps_embed'] ?? false)
                                {!! $settings['google_maps_embed'] !!}
                            @else
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.1832049615555!2d106.87948277498188!3d-6.370321262319202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec069c9b1473%3A0xe726f1c4df821d3!2sSMK%20YAJ%20DEPOK!5e0!3m2!1sen!2sid!4v1704285000000!5m2!1sen!2sid"
                                    width="100%" height="100%" style="border:0;" allowfullscreen=""
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-[2rem]">
                                </iframe>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- Quick Links Section --}}
    <section class="py-24 bg-white relative border-t border-[#F0E7F8]">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-20" data-aos="fade-up">
                <h2 class="text-4xl font-black text-[#612F73] mb-6 tracking-tight uppercase">Akses Informasi Cepat</h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-[#8C51A5] to-[#D668EA] mx-auto rounded-full"></div>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div data-aos="fade-up" data-aos-delay="100">
                    <a href="{{ route('majors') }}"
                        class="group block h-full p-10 bg-[#F0E7F8]/30 rounded-[2.5rem] border border-[#8C51A5]/10 shadow-premium-lg hover:border-[#8C51A5]/30 transition-all duration-500 ease-in-out text-center transform hover:-translate-y-3">
                        <div
                            class="w-20 h-20 bg-white rounded-[2rem] flex items-center justify-center mb-8 mx-auto shadow-lg group-hover:bg-[#8C51A5] transition-all duration-500 ease-in-out">
                            <i
                                class="fas fa-graduation-cap text-3xl text-[#8C51A5] group-hover:text-white transition-colors"></i>
                        </div>
                        <h3
                            class="font-black text-[#612F73] text-lg uppercase group-hover:text-[#8C51A5] transition-colors tracking-tight">
                            Program Keahlian</h3>
                        <p class="text-gray-400 text-[10px] font-black uppercase tracking-[0.2em] mt-4">Jurusan Unggulan</p>
                    </a>
                </div>

                <div data-aos="fade-up" data-aos-delay="200">
                    <a href="{{ route('news') }}"
                        class="group block h-full p-10 bg-[#8C51A5]/5 rounded-[2.5rem] border border-[#8C51A5]/10 shadow-premium-lg hover:border-[#8C51A5]/30 transition-all duration-500 ease-in-out text-center transform hover:-translate-y-3">
                        <div
                            class="w-20 h-20 bg-white rounded-[2rem] flex items-center justify-center mb-8 mx-auto shadow-lg group-hover:bg-[#8C51A5] transition-all duration-500 ease-in-out">
                            <i
                                class="fas fa-newspaper text-3xl text-[#8C51A5] group-hover:text-white transition-colors"></i>
                        </div>
                        <h3
                            class="font-black text-[#612F73] text-lg uppercase group-hover:text-[#8C51A5] transition-colors tracking-tight">
                            Berita Terkini</h3>
                        <p class="text-gray-400 text-[10px] font-black uppercase tracking-[0.2em] mt-4">Info Terbaru</p>
                    </a>
                </div>

                <div data-aos="fade-up" data-aos-delay="300">
                    <a href="{{ route('gallery.photos') }}"
                        class="group block h-full p-10 bg-[#F0E7F8]/30 rounded-[2.5rem] border border-[#8C51A5]/10 shadow-premium-lg hover:border-[#8C51A5]/30 transition-all duration-500 ease-in-out text-center transform hover:-translate-y-3">
                        <div
                            class="w-20 h-20 bg-white rounded-[2rem] flex items-center justify-center mb-8 mx-auto shadow-lg group-hover:bg-[#8C51A5] transition-all duration-500 ease-in-out">
                            <i class="fas fa-images text-3xl text-[#8C51A5] group-hover:text-white transition-colors"></i>
                        </div>
                        <h3
                            class="font-black text-[#612F73] text-lg uppercase group-hover:text-[#8C51A5] transition-colors tracking-tight">
                            Galeri Visual</h3>
                        <p class="text-gray-400 text-[10px] font-black uppercase tracking-[0.2em] mt-4">Dokumentasi</p>
                    </a>
                </div>

                @if(($settings['ppdb_active'] ?? false))
                    <div data-aos="fade-up" data-aos-delay="400">
                        <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                            class="group block h-full p-10 bg-gradient-to-br from-[#612F73] via-[#8C51A5] to-[#D668EA] rounded-[2.5rem] shadow-2xl hover:shadow-premium-lg transition-all duration-700 text-center text-white transform hover:-translate-y-3 border border-white/10">
                            <div
                                class="w-20 h-20 bg-white/20 backdrop-blur-md rounded-[2rem] flex items-center justify-center mb-8 mx-auto group-hover:bg-white transition-all duration-700">
                                <i
                                    class="fas fa-user-plus text-3xl text-white group-hover:text-[#8C51A5] transition-colors"></i>
                            </div>
                            <h3 class="font-black text-lg uppercase tracking-tight">Pendaftaran</h3>
                            <p class="text-[#F0E7F8] text-[10px] font-black uppercase tracking-[0.2em] mt-4">Gabung Bersama Kami
                            </p>
                        </a>
                    </div>
                @else
                    <div data-aos="fade-up" data-aos-delay="400">
                        <a href="{{ route('achievements') }}"
                            class="group block h-full p-10 bg-[#8C51A5]/5 rounded-[2.5rem] border border-[#8C51A5]/10 shadow-premium-lg hover:border-[#8C51A5]/30 transition-all duration-500 ease-in-out text-center transform hover:-translate-y-3">
                            <div
                                class="w-20 h-20 bg-white rounded-[2rem] flex items-center justify-center mb-8 mx-auto shadow-lg group-hover:bg-amber-500 transition-all duration-700">
                                <i class="fas fa-trophy text-3xl text-[#8C51A5] group-hover:text-white transition-colors"></i>
                            </div>
                            <h3
                                class="font-black text-[#612F73] text-lg uppercase group-hover:text-amber-500 transition-colors tracking-tight">
                                Prestasi Siswa</h3>
                            <p class="text-gray-400 text-[10px] font-black uppercase tracking-[0.2em] mt-4">Pencapaian Unggul
                            </p>
                        </a>
                    </div>
                @endif
            </div>
        </div>
        </div>
    </section>
@endsection