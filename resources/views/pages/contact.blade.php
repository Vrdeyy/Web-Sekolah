@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-gradient-to-br from-slate-900 via-emerald-900 to-teal-900 relative overflow-hidden">
        <div class="absolute inset-0">
            <div
                class="absolute top-0 left-0 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2">
            </div>
            <div
                class="absolute bottom-0 right-0 w-96 h-96 bg-teal-500/20 rounded-full blur-3xl translate-x-1/2 translate-y-1/2">
            </div>
        </div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-emerald-300 text-sm font-medium mb-6">
                    <i class="fas fa-phone-alt"></i>
                    <span>HUBUNGI KAMI</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                    Kontak <span class="text-emerald-400">Kami</span>
                </h1>
                <p class="text-gray-300 text-lg">
                    Kami siap membantu Anda. Jangan ragu untuk menghubungi kami.
                </p>
            </div>
        </div>
    </section>

    {{-- Contact Section --}}
    <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-8">
                {{-- Contact Cards --}}
                <div class="space-y-6">
                    {{-- Address Card --}}
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-lg transition-all">
                        <div class="flex items-start gap-4">
                            <div class="w-14 h-14 bg-emerald-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-2xl text-emerald-600"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-2">Alamat</h3>
                                <p class="text-gray-600">
                                    {{ $settings['address'] ?? 'Jl. Contoh No. 123, Kota, Provinsi' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Phone Card --}}
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-lg transition-all">
                        <div class="flex items-start gap-4">
                            <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-2xl text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-2">Telepon</h3>
                                <p class="text-gray-600">
                                    {{ $settings['phone'] ?? '(021) 1234567' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Email Card --}}
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-lg transition-all">
                        <div class="flex items-start gap-4">
                            <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-2xl text-purple-600"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-2">Email</h3>
                                <p class="text-gray-600">
                                    {{ $settings['email'] ?? 'info@sekolah.sch.id' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- WhatsApp Card --}}
                    @if($settings['whatsapp'] ?? false)
                        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-lg transition-all">
                            <div class="flex items-start gap-4">
                                <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <i class="fab fa-whatsapp text-2xl text-green-600"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 mb-2">WhatsApp</h3>
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp']) }}"
                                        target="_blank" class="text-green-600 hover:underline">
                                        {{ $settings['whatsapp'] }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Social Media --}}
                    <div class="bg-gradient-to-br from-emerald-600 to-teal-600 rounded-2xl p-6 text-white">
                        <h3 class="font-bold text-lg mb-4">Ikuti Kami</h3>
                        <div class="flex gap-3">
                            @if(isset($socialLinks) && $socialLinks->count() > 0)
                                @foreach($socialLinks as $social)
                                    @if($social && $social->url)
                                        <a href="{{ $social->url }}" target="_blank"
                                            class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center hover:bg-white hover:text-emerald-600 transition-all">
                                            <i class="fab fa-{{ $social->platform ?? 'link' }} text-lg"></i>
                                        </a>
                                    @endif
                                @endforeach
                            @else
                                <a href="#"
                                    class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center hover:bg-white hover:text-emerald-600 transition-all">
                                    <i class="fab fa-facebook-f text-lg"></i>
                                </a>
                                <a href="#"
                                    class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center hover:bg-white hover:text-emerald-600 transition-all">
                                    <i class="fab fa-instagram text-lg"></i>
                                </a>
                                <a href="#"
                                    class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center hover:bg-white hover:text-emerald-600 transition-all">
                                    <i class="fab fa-youtube text-lg"></i>
                                </a>
                                <a href="#"
                                    class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center hover:bg-white hover:text-emerald-600 transition-all">
                                    <i class="fab fa-tiktok text-lg"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Map --}}
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm h-full">
                        @if($settings['google_maps_embed'] ?? false)
                            {!! $settings['google_maps_embed'] !!}
                        @else
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613507864!3d-6.194741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x3d2ad6e1e0e9bcc8!2sMonas!5e0!3m2!1sen!2sid!4v1639547587!5m2!1sen!2sid"
                                width="100%" height="100%" style="border:0; min-height: 500px;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-2xl">
                            </iframe>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact Form Section --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Kirim Pesan</h2>
                    <p class="text-gray-600">
                        Ada pertanyaan atau saran? Silakan kirim pesan kepada kami melalui form di bawah ini.
                    </p>
                </div>

                <form action="#" method="POST" class="bg-gray-50 rounded-2xl p-8 space-y-6">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" name="name" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all"
                                placeholder="Masukkan nama Anda">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all"
                                placeholder="Masukkan email Anda">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Subjek</label>
                        <input type="text" name="subject" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all"
                            placeholder="Subjek pesan">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pesan</label>
                        <textarea name="message" rows="5" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all resize-none"
                            placeholder="Tulis pesan Anda"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-8 py-4 bg-emerald-600 text-white font-bold rounded-xl hover:bg-emerald-700 transition-colors shadow-lg hover:shadow-xl">
                            <i class="fas fa-paper-plane"></i>
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- Quick Links Section --}}
    <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Akses Cepat</h2>
                <p class="text-gray-600">Temukan informasi yang Anda butuhkan</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="{{ route('majors') }}"
                    class="group p-6 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:border-emerald-200 transition-all text-center">
                    <div
                        class="w-14 h-14 bg-emerald-100 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:bg-emerald-600 transition-colors">
                        <i
                            class="fas fa-graduation-cap text-2xl text-emerald-600 group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 group-hover:text-emerald-600 transition-colors">Program Keahlian</h3>
                    <p class="text-gray-500 text-sm mt-2">Lihat jurusan tersedia</p>
                </a>

                <a href="{{ route('news') }}"
                    class="group p-6 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:border-blue-200 transition-all text-center">
                    <div
                        class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:bg-blue-600 transition-colors">
                        <i class="fas fa-newspaper text-2xl text-blue-600 group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 group-hover:text-blue-600 transition-colors">Berita Terkini</h3>
                    <p class="text-gray-500 text-sm mt-2">Update terbaru sekolah</p>
                </a>

                <a href="{{ route('gallery.photos') }}"
                    class="group p-6 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:border-pink-200 transition-all text-center">
                    <div
                        class="w-14 h-14 bg-pink-100 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:bg-pink-600 transition-colors">
                        <i class="fas fa-images text-2xl text-pink-600 group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 group-hover:text-pink-600 transition-colors">Galeri Foto</h3>
                    <p class="text-gray-500 text-sm mt-2">Dokumentasi kegiatan</p>
                </a>

                @if(($settings['ppdb_active'] ?? false))
                    <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                        class="group p-6 bg-gradient-to-br from-emerald-600 to-teal-600 rounded-2xl shadow-sm hover:shadow-lg transition-all text-center text-white">
                        <div
                            class="w-14 h-14 bg-white/20 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:bg-white transition-colors">
                            <i class="fas fa-user-plus text-2xl text-white group-hover:text-emerald-600 transition-colors"></i>
                        </div>
                        <h3 class="font-bold">Daftar PPDB</h3>
                        <p class="text-emerald-100 text-sm mt-2">Pendaftaran siswa baru</p>
                    </a>
                @else
                    <a href="{{ route('achievements') }}"
                        class="group p-6 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:border-amber-200 transition-all text-center">
                        <div
                            class="w-14 h-14 bg-amber-100 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:bg-amber-600 transition-colors">
                            <i class="fas fa-trophy text-2xl text-amber-600 group-hover:text-white transition-colors"></i>
                        </div>
                        <h3 class="font-bold text-gray-900 group-hover:text-amber-600 transition-colors">Prestasi</h3>
                        <p class="text-gray-500 text-sm mt-2">Pencapaian siswa</p>
                    </a>
                @endif
            </div>
        </div>
    </section>
@endsection