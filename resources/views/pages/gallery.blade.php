@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-6 py-3 bg-[#932F80]/25 backdrop-blur-md rounded-full text-[#F3DCEB] text-sm font-semibold mb-6 border border-[#932F80]/50 shadow-glow"
                    data-aos="fade-down" data-aos-delay="200">
                    <i class="fas fa-images animate-bounce"></i>
                    <span>GALERI SEKOLAH</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold text-white mb-6 tracking-wide drop-shadow-lg"
                    data-aos="zoom-in" data-aos-delay="400">
                    Dokumentasi <span class="text-[#F3DCEB]">Kegiatan</span>
                </h1>
                <p class="text-gray-300 text-lg md:text-xl leading-relaxed" data-aos="fade-up" data-aos-delay="600">
                    Kumpulan foto dan video kegiatan di {{ $settings['school_name'] ?? 'SMK YAJ' }}
                </p>
            </div>
        </div>
    </section>

    {{-- Tab Navigation --}}
    <section class="py-10 bg-white border-b border-gray-200 sticky top-20 z-30 backdrop-blur-xl bg-white/95">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex items-center justify-center gap-6" data-aos="fade-up">
                <a href="{{ route('gallery.photos') }}"
                    class="px-10 py-4 rounded-2xl font-bold tracking-wide transition-all duration-300 {{ request()->routeIs('gallery.photos') ? 'bg-[#932F80] text-white shadow-lg shadow-[#932F80]/30 scale-105' : 'bg-gray-100 text-gray-500 hover:bg-gray-200 hover:text-gray-900 border border-gray-200' }}">
                    <i class="fas fa-image mr-2 text-lg"></i>
                    FOTO
                </a>
                <a href="{{ route('gallery.videos') }}"
                    class="px-10 py-4 rounded-2xl font-bold tracking-wide transition-all duration-300 {{ request()->routeIs('gallery.videos') ? 'bg-[#932F80] text-white shadow-lg shadow-[#932F80]/30 scale-105' : 'bg-gray-100 text-gray-500 hover:bg-gray-200 hover:text-gray-900 border border-gray-200' }}">
                    <i class="fas fa-video mr-2 text-lg"></i>
                    VIDEO
                </a>
            </div>
        </div>
    </section>

    {{-- Photo Gallery --}}
    @if(request()->routeIs('gallery.photos'))
        <section class="py-16 bg-purple-50 relative">
            <div class="container mx-auto px-4 lg:px-8">
                @if($galleries->count() > 0)
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($galleries as $index => $gallery)
                            <div class="group relative aspect-square rounded-3xl overflow-hidden shadow-lg shadow-purple-900/5 hover:shadow-2xl hover:shadow-purple-900/10 border border-gray-100 hover:border-[#932F80]/30 transition-all duration-500 cursor-pointer"
                                onclick="openLightbox('{{ asset('storage/' . $gallery->image) }}', '{{ $gallery->title ?? '' }}')"
                                data-aos="zoom-in" data-aos-delay="{{ ($index % 4) * 100 }}">
                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title ?? 'Galeri' }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                    onerror="this.src='https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=400'">

                                {{-- Overlay --}}
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-purple-900/80 via-purple-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500">
                                    <div class="absolute bottom-0 left-0 right-0 p-6">
                                        @if($gallery->title)
                                            <h3 class="text-white font-bold text-sm line-clamp-2 tracking-tight">{{ $gallery->title }}</h3>
                                        @endif
                                    </div>
                                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                        <div
                                            class="w-16 h-16 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-500 border border-white/20">
                                            <i class="fas fa-search-plus text-white text-2xl"></i>
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
                    <div class="text-center py-20 bg-white rounded-3xl border border-gray-100 shadow-sm">
                        <div
                            class="w-24 h-24 bg-purple-50 rounded-full flex items-center justify-center mx-auto mb-6 border border-purple-100">
                            <i class="fas fa-image text-4xl text-[#932F80]"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#2A1424] mb-2">Belum Ada Foto</h3>
                        <p class="text-gray-500">Galeri foto masih kosong.</p>
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Video Gallery --}}
    @if(request()->routeIs('gallery.videos'))
        <section class="py-16 bg-purple-50 relative">
            <div class="container mx-auto px-4 lg:px-8">
                @if($galleries->count() > 0)
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($galleries as $index => $gallery)
                            <div class="group bg-white rounded-2xl overflow-hidden shadow-lg shadow-purple-900/5 hover:shadow-2xl hover:shadow-purple-900/10 border border-gray-100 hover:border-[#932F80]/30 transition-all duration-500 cursor-pointer"
                                onclick="openVideoModal('{{ $gallery->video_url }}')" data-aos="fade-up"
                                data-aos-delay="{{ ($index % 3) * 150 }}">
                                <div class="relative aspect-video overflow-hidden bg-gray-100">
                                    @if($gallery->thumbnail)
                                        <img src="{{ asset('storage/' . $gallery->thumbnail) }}" alt="{{ $gallery->title ?? 'Video' }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-purple-100 to-white flex items-center justify-center">
                                            <i class="fas fa-play-circle text-6xl text-purple-200"></i>
                                        </div>
                                    @endif

                                    {{-- Play Button Overlay --}}
                                    <div
                                        class="absolute inset-0 bg-purple-900/30 flex items-center justify-center group-hover:bg-purple-900/50 transition-all duration-500">
                                        <div
                                            class="w-20 h-20 bg-white/30 backdrop-blur-md rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-500 border border-white/40 shadow-xl">
                                            <i class="fas fa-play text-white text-3xl ml-1"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-8">
                                    <h3
                                        class="font-bold text-[#2A1424] text-lg group-hover:text-[#932F80] transition-colors tracking-tight">
                                        {{ $gallery->title ?? 'Video' }}
                                    </h3>
                                    @if($gallery->description)
                                        <p class="text-gray-500 text-sm mt-3 line-clamp-2 leading-relaxed">{{ $gallery->description }}</p>
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
                    <div class="text-center py-20 bg-white rounded-3xl border border-gray-100 shadow-sm">
                        <div
                            class="w-24 h-24 bg-purple-50 rounded-full flex items-center justify-center mx-auto mb-6 border border-purple-100">
                            <i class="fas fa-video text-4xl text-[#932F80]"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#2A1424] mb-2">Belum Ada Video</h3>
                        <p class="text-gray-500">Galeri video masih kosong.</p>
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- CTA Section --}}
    <section
        class="py-24 bg-gradient-to-br from-[#1A0E17] via-[#2A1424] to-[#12080F] relative overflow-hidden border-t border-white/10">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6 tracking-tight">Ikuti Kegiatan Kami!</h2>
                <p class="text-gray-300 text-lg md:text-xl mb-10 leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                    Jangan lewatkan berbagai kegiatan menarik di sekolah kami.</p>
                <div class="flex flex-wrap justify-center gap-6" data-aos="fade-up" data-aos-delay="400">
                    <a href="{{ route('news') }}"
                        class="inline-flex items-center gap-3 px-10 py-4 bg-white text-[#932F80] font-bold rounded-2xl hover:bg-gray-100 transition-all shadow-xl hover:-translate-y-1">
                        <i class="fas fa-newspaper text-lg"></i>
                        Baca Berita
                    </a>
                    <a href="{{ route('extracurriculars') }}"
                        class="inline-flex items-center gap-3 px-10 py-4 bg-white/10 backdrop-blur-md text-white font-bold rounded-2xl border-2 border-white/20 hover:bg-white/20 transition-all hover:-translate-y-1">
                        <i class="fas fa-futbol text-lg"></i>
                        Lihat Eskul
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Lightbox Modal --}}
    <div id="lightbox" class="fixed inset-0 bg-black/95 z-50 hidden items-center justify-center p-4"
        onclick="closeLightbox()">
        <button onclick="closeLightbox()"
            class="absolute top-6 right-6 text-white text-3xl hover:text-pink-400 transition-colors z-10">
            <i class="fas fa-times"></i>
        </button>
        <img id="lightbox-image" src="" alt="" class="max-w-full max-h-[90vh] object-contain rounded-lg shadow-2xl">
        <p id="lightbox-caption" class="absolute bottom-6 left-0 right-0 text-center text-white"></p>
    </div>

    {{-- Video Modal --}}
    <div id="video-modal" class="fixed inset-0 bg-black/95 z-50 hidden items-center justify-center p-4">
        <button onclick="closeVideoModal()"
            class="absolute top-6 right-6 text-white text-3xl hover:text-pink-400 transition-colors z-10">
            <i class="fas fa-times"></i>
        </button>
        <div class="w-full max-w-4xl aspect-video">
            <iframe id="video-iframe" src="" class="w-full h-full rounded-xl" frameborder="0"
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