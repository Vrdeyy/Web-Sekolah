@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-gradient-to-br from-slate-900 via-pink-900 to-purple-900 relative overflow-hidden">
        <div class="absolute inset-0">
            <div
                class="absolute top-0 left-0 w-96 h-96 bg-pink-500/20 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2">
            </div>
            <div
                class="absolute bottom-0 right-0 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl translate-x-1/2 translate-y-1/2">
            </div>
        </div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-pink-300 text-sm font-medium mb-6">
                    <i class="fas fa-images"></i>
                    <span>GALERI SEKOLAH</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                    Dokumentasi <span class="text-pink-400">Kegiatan</span>
                </h1>
                <p class="text-gray-300 text-lg">
                    Kumpulan foto dan video kegiatan di {{ $settings['school_name'] ?? 'SMK YAJ' }}
                </p>
            </div>
        </div>
    </section>

    {{-- Tab Navigation --}}
    <section class="py-8 bg-white border-b border-gray-200 sticky top-20 z-30 backdrop-blur-xl bg-white/95">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex items-center justify-center gap-4">
                <a href="{{ route('gallery.photos') }}"
                    class="px-8 py-3 rounded-xl font-semibold transition-all {{ request()->routeIs('gallery.photos') ? 'bg-pink-600 text-white shadow-lg' : 'bg-gray-100 text-gray-600 hover:bg-pink-100 hover:text-pink-700' }}">
                    <i class="fas fa-image mr-2"></i>
                    Foto
                </a>
                <a href="{{ route('gallery.videos') }}"
                    class="px-8 py-3 rounded-xl font-semibold transition-all {{ request()->routeIs('gallery.videos') ? 'bg-pink-600 text-white shadow-lg' : 'bg-gray-100 text-gray-600 hover:bg-pink-100 hover:text-pink-700' }}">
                    <i class="fas fa-video mr-2"></i>
                    Video
                </a>
            </div>
        </div>
    </section>

    {{-- Photo Gallery --}}
    @if(request()->routeIs('gallery.photos'))
        <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
            <div class="container mx-auto px-4 lg:px-8">
                @if($galleries->count() > 0)
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($galleries as $gallery)
                            <div class="group relative aspect-square rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer"
                                onclick="openLightbox('{{ asset('storage/' . $gallery->image) }}', '{{ $gallery->title ?? '' }}')">
                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title ?? 'Galeri' }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    onerror="this.src='https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=400'">

                                {{-- Overlay --}}
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300">
                                    <div class="absolute bottom-0 left-0 right-0 p-4">
                                        @if($gallery->title)
                                            <h3 class="text-white font-semibold text-sm line-clamp-2">{{ $gallery->title }}</h3>
                                        @endif
                                    </div>
                                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                        <div
                                            class="w-12 h-12 bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center">
                                            <i class="fas fa-search-plus text-white text-xl"></i>
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
                    <div class="text-center py-20">
                        <div class="w-24 h-24 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-image text-4xl text-pink-400"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Foto</h3>
                        <p class="text-gray-500">Galeri foto masih kosong.</p>
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Video Gallery --}}
    @if(request()->routeIs('gallery.videos'))
        <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
            <div class="container mx-auto px-4 lg:px-8">
                @if($galleries->count() > 0)
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($galleries as $gallery)
                            <div class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer"
                                onclick="openVideoModal('{{ $gallery->video_url }}')">
                                <div class="relative aspect-video overflow-hidden">
                                    @if($gallery->thumbnail)
                                        <img src="{{ asset('storage/' . $gallery->thumbnail) }}" alt="{{ $gallery->title ?? 'Video' }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-pink-500 to-purple-600 flex items-center justify-center">
                                            <i class="fas fa-play-circle text-6xl text-white/40"></i>
                                        </div>
                                    @endif

                                    {{-- Play Button Overlay --}}
                                    <div
                                        class="absolute inset-0 bg-black/30 flex items-center justify-center group-hover:bg-black/50 transition-colors">
                                        <div
                                            class="w-16 h-16 bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                            <i class="fas fa-play text-white text-2xl ml-1"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-6">
                                    <h3 class="font-bold text-gray-900 group-hover:text-pink-600 transition-colors">
                                        {{ $gallery->title ?? 'Video' }}
                                    </h3>
                                    @if($gallery->description)
                                        <p class="text-gray-500 text-sm mt-2 line-clamp-2">{{ $gallery->description }}</p>
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
                    <div class="text-center py-20">
                        <div class="w-24 h-24 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-video text-4xl text-pink-400"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Video</h3>
                        <p class="text-gray-500">Galeri video masih kosong.</p>
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- CTA Section --}}
    <section class="py-16 bg-gradient-to-r from-pink-600 to-purple-600 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml,%3Csvg width=\" 60\" height=\"60\"
                viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg
                fill=\"%23ffffff\" fill-opacity=\"0.05\"%3E%3Cpath d=\"M36
                34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6
                4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Ikuti Kegiatan Kami!</h2>
                <p class="text-pink-100 text-lg mb-8">Jangan lewatkan berbagai kegiatan menarik di sekolah kami.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('news') }}"
                        class="inline-flex items-center gap-2 px-8 py-4 bg-white text-pink-700 font-bold rounded-xl hover:bg-pink-50 transition-colors shadow-lg">
                        <i class="fas fa-newspaper"></i>
                        Baca Berita
                    </a>
                    <a href="{{ route('extracurriculars') }}"
                        class="inline-flex items-center gap-2 px-8 py-4 bg-white/20 backdrop-blur-sm text-white font-bold rounded-xl border-2 border-white/40 hover:bg-white/30 transition-colors">
                        <i class="fas fa-futbol"></i>
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