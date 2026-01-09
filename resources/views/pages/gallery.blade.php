@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-premium-dark relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-6 py-3 bg-[#8C51A5]/20 backdrop-blur-md rounded-xl text-[#F0E7F8] text-[10px] font-black mb-6 border border-[#8C51A5]/30 shadow-lg"
                    data-aos="fade-down" data-aos-delay="200">
                    <i class="fas fa-images text-[#F8CB62] animate-pulse"></i>
                    <span class="tracking-widest uppercase">GALERI SEKOLAH</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-black text-white mb-6 tracking-tight drop-shadow-lg"
                    data-aos="zoom-in" data-aos-delay="400">
                    Dokumentasi <span
                        class="text-[#F8CB62] bg-gradient-to-r from-[#F8CB62] to-[#D668EA] bg-clip-text text-transparent">Kegiatan</span>
                </h1>
                <p class="text-gray-400 text-lg md:text-xl font-medium leading-relaxed" data-aos="fade-up"
                    data-aos-delay="600">
                    Arsip momen berharga dan prestasi civitas akademika {{ $settings['school_name'] ?? 'SMK YAJ' }}
                </p>
            </div>
        </div>
    </section>

    {{-- Tab Navigation --}}
    <section class="py-6 bg-white border-b border-[#F0E7F8] sticky top-20 z-30 backdrop-blur-xl bg-white/95">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex items-center justify-center gap-4" data-aos="fade-up">
                <a href="{{ route('gallery.photos') }}"
                    class="px-8 py-4 rounded-xl font-black text-[10px] tracking-[0.2em] uppercase transition-all duration-300 {{ request()->routeIs('gallery.photos') ? 'bg-[#8C51A5] text-white shadow-lg shadow-[#8C51A5]/30' : 'bg-gray-50 text-gray-400 hover:bg-[#8C51A5]/10 hover:text-[#8C51A5] border border-gray-100' }}">
                    <i class="fas fa-image mr-2 text-sm"></i>
                    FOTO
                </a>
                <a href="{{ route('gallery.videos') }}"
                    class="px-8 py-4 rounded-xl font-black text-[10px] tracking-[0.2em] uppercase transition-all duration-300 {{ request()->routeIs('gallery.videos') ? 'bg-[#8C51A5] text-white shadow-lg shadow-[#8C51A5]/30' : 'bg-gray-50 text-gray-400 hover:bg-[#8C51A5]/10 hover:text-[#8C51A5] border border-gray-100' }}">
                    <i class="fas fa-video mr-2 text-sm"></i>
                    VIDEO
                </a>
            </div>
        </div>
    </section>

    {{-- Photo Gallery --}}
    @if(request()->routeIs('gallery.photos'))
        <section class="py-16 bg-[#F0E7F8]/30 relative">
            <div class="container mx-auto px-4 lg:px-8">
                @if($galleries->count() > 0)
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($galleries as $index => $gallery)
                            <div class="group relative aspect-square rounded-[2rem] overflow-hidden shadow-xl shadow-[#612F73]/5 hover:shadow-premium-lg border border-[#8C51A5]/10 hover:border-[#8C51A5]/30 transition-all duration-700 cursor-pointer"
                                onclick="openLightbox('{{ asset('storage/' . $gallery->image) }}', '{{ $gallery->title ?? '' }}')"
                                data-aos="zoom-in" data-aos-delay="{{ ($index % 4) * 100 }}">
                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title ?? 'Galeri' }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                    onerror="this.src='https://ui-avatars.com/api/?name=SMK+YAJ&background=8C51A5&color=fff&size=400'">

                                {{-- Overlay --}}
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-[#612F73]/90 via-[#612F73]/30 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500">
                                    <div class="absolute bottom-0 left-0 right-0 p-8">
                                        @if($gallery->title)
                                            <h3
                                                class="text-white font-black text-xs uppercase tracking-widest line-clamp-2 leading-relaxed">
                                                {{ $gallery->title }}</h3>
                                        @endif
                                    </div>
                                    <div
                                        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 scale-50 opacity-0 group-hover:scale-100 group-hover:opacity-100 transition-all duration-700">
                                        <div
                                            class="w-16 h-16 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/20">
                                            <i class="fas fa-expand-alt text-[#F8CB62] text-xl"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-12">
                        {{ $galleries->links() }}
                    </div>
                @else
                    {{-- Empty State --}}
                    <div class="text-center py-20 bg-white rounded-[3rem] border border-[#8C51A5]/10 shadow-premium-lg">
                        <div
                            class="w-24 h-24 bg-[#F0E7F8] rounded-2xl flex items-center justify-center mx-auto mb-6 border border-[#8C51A5]/10 shadow-xl">
                            <i class="fas fa-image text-4xl text-[#8C51A5]"></i>
                        </div>
                        <h3 class="text-xl font-black text-[#612F73] mb-2 uppercase tracking-tight">Belum Ada Foto</h3>
                        <p class="text-gray-500 font-medium">Galeri foto sedang dalam proses pembaharuan.</p>
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Video Gallery --}}
    @if(request()->routeIs('gallery.videos'))
        <section class="py-16 bg-[#F0E7F8]/30 relative">
            <div class="container mx-auto px-4 lg:px-8">
                @if($galleries->count() > 0)
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($galleries as $index => $gallery)
                            <div class="group bg-white rounded-[2.5rem] overflow-hidden shadow-xl shadow-[#612F73]/5 hover:shadow-premium-lg border border-[#8C51A5]/10 hover:border-[#8C51A5]/30 transition-all duration-700 cursor-pointer"
                                onclick="openVideoModal('{{ $gallery->video_url }}')" data-aos="fade-up"
                                data-aos-delay="{{ ($index % 3) * 150 }}">
                                <div class="relative aspect-video overflow-hidden bg-gray-50">
                                    @if($gallery->thumbnail)
                                        <img src="{{ asset('storage/' . $gallery->thumbnail) }}" alt="{{ $gallery->title ?? 'Video' }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-[#F0E7F8] to-white flex items-center justify-center">
                                            <i class="fas fa-play-circle text-6xl text-[#D668EA]/20"></i>
                                        </div>
                                    @endif

                                    {{-- Play Button Overlay --}}
                                    <div
                                        class="absolute inset-0 bg-[#612F73]/30 flex items-center justify-center group-hover:bg-[#612F73]/50 transition-all duration-500">
                                        <div
                                            class="w-20 h-20 bg-white/20 backdrop-blur-md rounded-[2rem] flex items-center justify-center group-hover:rotate-[360deg] transition-all duration-1000 border border-white/20 shadow-2xl">
                                            <i class="fas fa-play text-[#F8CB62] text-3xl ml-1"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-10">
                                    <h3
                                        class="font-black text-[#612F73] text-lg uppercase group-hover:text-[#8C51A5] transition-colors tracking-tight leading-snug">
                                        {{ $gallery->title ?? 'Video' }}
                                    </h3>
                                    @if($gallery->description)
                                        <p class="text-gray-500 text-sm mt-4 line-clamp-2 leading-relaxed font-medium">
                                            {{ $gallery->description }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-12">
                        {{ $galleries->links() }}
                    </div>
                @else
                    {{-- Empty State --}}
                    <div class="text-center py-20 bg-white rounded-[3rem] border border-[#8C51A5]/10 shadow-premium-lg">
                        <div
                            class="w-24 h-24 bg-[#F0E7F8] rounded-2xl flex items-center justify-center mx-auto mb-6 border border-[#8C51A5]/10 shadow-xl">
                            <i class="fas fa-video text-4xl text-[#8C51A5]"></i>
                        </div>
                        <h3 class="text-xl font-black text-[#612F73] mb-2 uppercase tracking-tight">Belum Ada Video</h3>
                        <p class="text-gray-500 font-medium">Arsip video akan segera hadir untuk Anda.</p>
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- CTA Section --}}
    <section class="py-24 bg-premium-dark relative overflow-hidden border-t border-white/10">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-black text-white mb-6 tracking-tight uppercase">Jelajahi Lebih Jauh
                </h2>
                <p class="text-gray-400 text-lg md:text-xl mb-10 leading-relaxed font-medium" data-aos="fade-up"
                    data-aos-delay="200">
                    Temukan inspirasi dari berbagai kegiatan dan program unggulan kami.</p>
                <div class="flex flex-wrap justify-center gap-6" data-aos="fade-up" data-aos-delay="400">
                    <a href="{{ route('news') }}"
                        class="inline-flex items-center gap-4 px-10 py-5 bg-white text-[#612F73] font-black rounded-2xl hover:bg-gray-50 transition-all shadow-xl hover:-translate-y-1 uppercase text-xs tracking-widest">
                        <i class="fas fa-newspaper text-lg text-[#8C51A5]"></i>
                        Berita Terkini
                    </a>
                    <a href="{{ route('extracurriculars') }}"
                        class="inline-flex items-center gap-4 px-10 py-5 bg-gradient-to-r from-[#F8CB62] to-[#f5b82e] text-[#612F73] font-black rounded-2xl hover:shadow-golden transition-all hover:-translate-y-1 uppercase text-xs tracking-widest">
                        <i class="fas fa-futbol text-lg"></i>
                        Eskul & Komunitas
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Lightbox Modal --}}
    <div id="lightbox" class="fixed inset-0 bg-[#1A0E17]/98 z-50 hidden items-center justify-center p-4 backdrop-blur-sm"
        onclick="closeLightbox()">
        <button onclick="closeLightbox()"
            class="absolute top-6 right-6 w-14 h-14 bg-white/10 border border-white/20 rounded-2xl text-white text-2xl hover:bg-[#8C51A5] hover:text-white transition-all z-10 flex items-center justify-center shadow-2xl">
            <i class="fas fa-times"></i>
        </button>
        <img id="lightbox-image" src="" alt=""
            class="max-w-full max-h-[85vh] object-contain rounded-3xl shadow-[0_0_50px_rgba(140,81,165,0.3)] border border-white/10">
        <p id="lightbox-caption"
            class="absolute bottom-10 left-0 right-0 text-center text-white/90 font-black text-xs uppercase tracking-[0.3em] px-4">
        </p>
    </div>

    {{-- Video Modal --}}
    <div id="video-modal"
        class="fixed inset-0 bg-[#612F73]/95 z-50 hidden items-center justify-center p-4 backdrop-blur-md">
        <button onclick="closeVideoModal()"
            class="absolute top-6 right-6 w-14 h-14 bg-white/10 border border-white/20 rounded-2xl text-white text-2xl hover:bg-[#F8CB62] hover:text-[#612F73] transition-all z-10 flex items-center justify-center shadow-2xl">
            <i class="fas fa-times"></i>
        </button>
        <div class="w-full max-w-5xl aspect-video relative group">
            <div
                class="absolute -inset-4 bg-gradient-to-r from-[#8C51A5] to-[#D668EA] rounded-[2.5rem] blur-2xl opacity-20 group-hover:opacity-40 transition-opacity">
            </div>
            <iframe id="video-iframe" src=""
                class="w-full h-full rounded-[2rem] relative z-10 border border-white/20 shadow-2xl shadow-black/50"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function openLightbox(src, caption) {
            document.getElementById('lightbox-image').src = src;
            document.getElementById('lightbox-caption').textContent = caption;
            document.getElementById('lightbox').classList.remove('hidden');
            document.getElementById('lightbox').classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            document.getElementById('lightbox').classList.add('hidden');
            document.getElementById('lightbox').classList.remove('flex');
            document.body.style.overflow = '';
        }

        function openVideoModal(url) {
            // Convert YouTube URL to embed URL
            let embedUrl = url;
            if (url.includes('youtube.com/watch')) {
                const videoId = url.split('v=')[1]?.split('&')[0];
                embedUrl = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
            } else if (url.includes('youtu.be/')) {
                const videoId = url.split('youtu.be/')[1]?.split('?')[0];
                embedUrl = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
            }

            document.getElementById('video-iframe').src = embedUrl;
            document.getElementById('video-modal').classList.remove('hidden');
            document.getElementById('video-modal').classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeVideoModal() {
            document.getElementById('video-iframe').src = '';
            document.getElementById('video-modal').classList.add('hidden');
            document.getElementById('video-modal').classList.remove('flex');
            document.body.style.overflow = '';
        }

        // Close on escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                closeLightbox();
                closeVideoModal();
            }
        });
    </script>
@endpush