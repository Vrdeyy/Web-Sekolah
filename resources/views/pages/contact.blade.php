@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto" data-aos="fade-up">
                <div
                    class="inline-flex items-center gap-2 px-6 py-3 bg-[#4f2744]/25 backdrop-blur-md rounded-full text-[#F3DCEB] text-sm font-semibold mb-6 border border-[#4f2744]/50 shadow-glow" data-aos="fade-down" data-aos-delay="200">
                    <i class="fas fa-phone-alt animate-bounce"></i>
                    <span>HUBUNGI KAMI</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold text-white mb-6 tracking-wide drop-shadow-lg" data-aos="zoom-in" data-aos-delay="400">
                    Kontak <span class="text-[#F3DCEB]">Kami</span>
                </h1>
                <p class="text-gray-300 text-lg md:text-xl leading-relaxed" data-aos="fade-up" data-aos-delay="600">
                    Kami siap membantu Anda. Jangan ragu untuk menghubungi kami.
                </p>
            </div>
        </div>
    </section>

    {{-- Contact Section --}}
    <section class="py-16 bg-white relative">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-8">
                {{-- Contact Cards --}}
                <div class="space-y-6">
                    {{-- Address Card --}}
                    <div class="bg-purple-50 rounded-2xl p-6 border border-purple-100 shadow-md hover:shadow-purple-500/10 hover:border-[#4f2744]/50 transition-all duration-300 group" data-aos="fade-right" data-aos-delay="100">
                        <div class="flex items-start gap-4">
                            <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm text-[#4f2744] group-hover:scale-110 transition-transform">
                                <i class="fas fa-map-marker-alt text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-[#2A1424] mb-2">Alamat</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    {{ $settings['address'] ?? 'Jl. Contoh No. 123, Kota, Provinsi' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Phone Card --}}
                    <div class="bg-purple-50 rounded-2xl p-6 border border-purple-100 shadow-md hover:shadow-purple-500/10 hover:border-[#4f2744]/50 transition-all duration-300 group" data-aos="fade-right" data-aos-delay="200">
                        <div class="flex items-start gap-4">
                            <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm text-[#4f2744] group-hover:scale-110 transition-transform">
                                <i class="fas fa-phone text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-[#2A1424] mb-2">Telepon</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    {{ $settings['phone'] ?? '(021) 1234567' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Email Card --}}
                    <div class="bg-purple-50 rounded-2xl p-6 border border-purple-100 shadow-md hover:shadow-purple-500/10 hover:border-[#4f2744]/50 transition-all duration-300 group" data-aos="fade-right" data-aos-delay="300">
                        <div class="flex items-start gap-4">
                            <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm text-[#4f2744] group-hover:scale-110 transition-transform">
                                <i class="fas fa-envelope text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-[#2A1424] mb-2">Email</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    {{ $settings['email'] ?? 'info@sekolah.sch.id' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- WhatsApp Card --}}
                    @if($settings['whatsapp'] ?? false)
                        <div class="bg-purple-50 rounded-2xl p-6 border border-purple-100 shadow-md hover:shadow-purple-500/10 hover:border-[#4f2744]/50 transition-all duration-300 group" data-aos="fade-right" data-aos-delay="400">
                            <div class="flex items-start gap-4">
                                <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm text-[#4f2744] group-hover:scale-110 transition-transform">
                                    <i class="fab fa-whatsapp text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-[#2A1424] mb-2">WhatsApp</h3>
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp']) }}"
                                        target="_blank" class="text-green-600 hover:text-green-700 font-medium text-sm transition-colors">
                                        {{ $settings['whatsapp'] }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Social Media --}}
                    <div class="bg-purple-50 rounded-2xl p-8 border border-purple-100 shadow-md hover:shadow-purple-500/10 hover:border-[#4f2744]/50 transition-all duration-300 group" data-aos="fade-right" data-aos-delay="500">
                        <h3 class="font-bold text-[#2A1424] text-lg mb-6 tracking-tight">Ikuti Kami</h3>
                        <div class="flex flex-wrap gap-4">
                            @if(isset($socialLinks) && $socialLinks->count() > 0)
                                @foreach($socialLinks as $index => $social)
                                    @if($social && $social->url)
                                        <a href="{{ $social->url }}" target="_blank"
                                            class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-[#4f2744] shadow-sm hover:bg-[#4f2744] hover:text-white transition-all transform hover:-translate-y-1" data-aos="zoom-in" data-aos-delay="{{ 600 + ($index * 100) }}">
                                            <i class="fab fa-{{ $social->platform ?? 'link' }} text-lg"></i>
                                        </a>
                                    @endif
                                @endforeach
                            @else
                                <a href="#" class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-[#4f2744] shadow-sm hover:bg-[#4f2744] hover:text-white transition-all transform hover:-translate-y-1" data-aos="zoom-in" data-aos-delay="600">
                                    <i class="fab fa-facebook-f text-lg"></i>
                                </a>
                                <a href="#" class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-[#4f2744] shadow-sm hover:bg-[#4f2744] hover:text-white transition-all transform hover:-translate-y-1" data-aos="zoom-in" data-aos-delay="700">
                                    <i class="fab fa-instagram text-lg"></i>
                                </a>
                                <a href="#" class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-[#4f2744] shadow-sm hover:bg-[#4f2744] hover:text-white transition-all transform hover:-translate-y-1" data-aos="zoom-in" data-aos-delay="800">
                                    <i class="fab fa-youtube text-lg"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Map --}}
                <div class="lg:col-span-2" data-aos="fade-left">
                    <div class="bg-white rounded-2xl overflow-hidden border border-gray-200 shadow-lg h-full p-2">
                        @if($settings['google_maps_embed'] ?? false)
                            <div class="w-full h-full rounded-xl overflow-hidden">
                                {!! $settings['google_maps_embed'] !!}
                            </div>
                        @else
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613507864!3d-6.194741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x3d2ad6e1e0e9bcc8!2sMonas!5e0!3m2!1sen!2sid!4v1639547587!5m2!1sen!2sid"
                                width="100%" height="100%" style="border:0; min-height: 500px;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-xl">
                            </iframe>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact Form Section --}}
    <section class="py-24 bg-purple-50 relative overflow-hidden border-t border-purple-100">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-extrabold text-[#2A1424] mb-4 tracking-tight">Kirim Pesan</h2>
                    <p class="text-gray-500 text-lg leading-relaxed">
                        Ada pertanyaan atau saran? Silakan kirim pesan kepada kami melalui form di bawah ini.
                    </p>
                </div>

                @if(session('success'))
                <div class="mb-8 p-4 bg-green-100 border border-green-200 text-green-700 rounded-2xl flex items-center gap-3">
                    <i class="fas fa-check-circle text-xl"></i>
                    <span>{{ session('success') }}</span>
                </div>
                @endif

                @if(session('error'))
                <div class="mb-8 p-4 bg-red-100 border border-red-200 text-red-700 rounded-2xl flex items-center gap-3">
                    <i class="fas fa-exclamation-circle text-xl"></i>
                    <span>{{ session('error') }}</span>
                </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST" class="bg-white rounded-3xl p-10 border border-purple-100 shadow-xl space-y-8" data-aos="fade-up">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-8">
                        <div data-aos="fade-up" data-aos-delay="100">
                            <label class="block text-sm font-bold text-gray-700 mb-3 tracking-wide uppercase">Nama Lengkap</label>
                            <input type="text" name="name" required
                                class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-[#4f2744] focus:border-[#4f2744] transition-all outline-none"
                                placeholder="Masukkan nama Anda">
                        </div>
                        <div data-aos="fade-up" data-aos-delay="200">
                            <label class="block text-sm font-bold text-gray-700 mb-3 tracking-wide uppercase">Email</label>
                            <input type="email" name="email" required
                                class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-[#4f2744] focus:border-[#4f2744] transition-all outline-none"
                                placeholder="Masukkan email Anda">
                        </div>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="300">
                        <label class="block text-sm font-bold text-gray-700 mb-3 tracking-wide uppercase">Subjek</label>
                        <input type="text" name="subject" required
                            class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-[#4f2744] focus:border-[#4f2744] transition-all outline-none"
                            placeholder="Subjek pesan">
                    </div>
                    <div data-aos="fade-up" data-aos-delay="400">
                        <label class="block text-sm font-bold text-gray-700 mb-3 tracking-wide uppercase">Pesan</label>
                        <textarea name="message" rows="5" required
                            class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-[#4f2744] focus:border-[#4f2744] transition-all outline-none resize-none"
                            placeholder="Tulis pesan Anda"></textarea>
                    </div>
                    <div class="text-center pt-4" data-aos="fade-up" data-aos-delay="500">
                        <button type="submit"
                            class="inline-flex items-center gap-3 px-10 py-5 bg-[#4f2744] text-white font-extrabold rounded-2xl hover:bg-[#3a1c32] transition-all shadow-xl hover:shadow-[#4f2744]/40 hover:-translate-y-1">
                            <i class="fas fa-paper-plane text-lg"></i>
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- Quick Links Section --}}
    <section class="py-24 bg-white relative border-t border-gray-100">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold text-[#2A1424] mb-4 tracking-tight">Akses Cepat</h2>
                <p class="text-gray-500 text-lg">Temukan informasi yang Anda butuhkan</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <a href="{{ route('majors') }}"
                    class="group p-8 bg-purple-50 rounded-3xl border border-purple-100 shadow-lg hover:shadow-purple-500/20 hover:border-[#4f2744]/50 transition-all duration-500 text-center transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 mx-auto shadow-sm group-hover:bg-[#4f2744] transition-all duration-500">
                        <i class="fas fa-graduation-cap text-2xl text-[#4f2744] group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-bold text-[#2A1424] text-lg group-hover:text-[#4f2744] transition-colors tracking-tight">Program Keahlian</h3>
                    <p class="text-gray-500 text-sm mt-3 leading-relaxed">Lihat jurusan tersedia</p>
                </a>

                <a href="{{ route('news') }}"
                    class="group p-8 bg-purple-50 rounded-3xl border border-purple-100 shadow-lg hover:shadow-blue-500/20 hover:border-blue-500/50 transition-all duration-500 text-center transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 mx-auto shadow-sm group-hover:bg-blue-600 transition-all duration-500">
                        <i class="fas fa-newspaper text-2xl text-blue-400 group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-bold text-[#2A1424] text-lg group-hover:text-blue-600 transition-colors tracking-tight">Berita Terkini</h3>
                    <p class="text-gray-500 text-sm mt-3 leading-relaxed">Update terbaru sekolah</p>
                </a>

                <a href="{{ route('gallery.photos') }}"
                    class="group p-8 bg-purple-50 rounded-3xl border border-purple-100 shadow-lg hover:shadow-pink-500/20 hover:border-pink-500/50 transition-all duration-500 text-center transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 mx-auto shadow-sm group-hover:bg-pink-600 transition-all duration-500">
                        <i class="fas fa-images text-2xl text-pink-400 group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-bold text-[#2A1424] text-lg group-hover:text-pink-600 transition-colors tracking-tight">Galeri Foto</h3>
                    <p class="text-gray-500 text-sm mt-3 leading-relaxed">Dokumentasi kegiatan</p>
                </a>

                @if(($settings['ppdb_active'] ?? false))
                    <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                        class="group p-8 bg-gradient-to-br from-[#4f2744] to-[#3a1c32] rounded-3xl shadow-xl hover:shadow-[#4f2744]/40 transition-all duration-500 text-center text-white transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="400">
                        <div
                            class="w-16 h-16 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center mb-6 mx-auto group-hover:bg-white transition-all duration-500">
                            <i class="fas fa-user-plus text-2xl text-white group-hover:text-[#4f2744] transition-colors"></i>
                        </div>
                        <h3 class="font-extrabold text-lg tracking-tight">Daftar PPDB</h3>
                        <p class="text-[#F3DCEB] text-sm mt-3 leading-relaxed font-medium">Pendaftaran siswa baru</p>
                    </a>
                @else
                    <a href="{{ route('achievements') }}"
                        class="group p-8 bg-purple-50 rounded-3xl border border-purple-100 shadow-lg hover:shadow-amber-500/20 hover:border-amber-500/50 transition-all duration-500 text-center transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="400">
                        <div
                            class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 mx-auto shadow-sm group-hover:bg-amber-600 transition-all duration-500">
                            <i class="fas fa-trophy text-2xl text-amber-400 group-hover:text-white transition-colors"></i>
                        </div>
                        <h3 class="font-bold text-[#2A1424] text-lg group-hover:text-amber-600 transition-colors tracking-tight">Prestasi</h3>
                        <p class="text-gray-500 text-sm mt-3 leading-relaxed">Pencapaian siswa</p>
                    </a>
                @endif
            </div>
        </div>
    </section>
@endsection