@extends('layouts.app')

@section('title', 'Daftar Guru')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-gradient-to-br from-slate-900 via-blue-900 to-cyan-900 relative overflow-hidden">
        <div class="absolute inset-0">
            <div
                class="absolute top-0 left-0 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2">
            </div>
            <div
                class="absolute bottom-0 right-0 w-96 h-96 bg-cyan-500/20 rounded-full blur-3xl translate-x-1/2 translate-y-1/2">
            </div>
        </div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-blue-300 text-sm font-medium mb-6">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>TENAGA PENGAJAR</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                    Daftar <span class="text-blue-400">Guru</span>
                </h1>
                <p class="text-gray-300 text-lg">
                    Tenaga pengajar profesional dan berpengalaman di {{ $settings['school_name'] ?? 'SMK YAJ' }}
                </p>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-8 bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-wrap items-center justify-center gap-8 md:gap-16">
                <div class="text-center">
                    <div class="text-3xl font-extrabold text-blue-600">{{ $teachers->count() }}</div>
                    <div class="text-gray-500 text-sm">Tenaga Pengajar</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-extrabold text-emerald-600">100%</div>
                    <div class="text-gray-500 text-sm">Tersertifikasi</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-extrabold text-purple-600">S1/S2</div>
                    <div class="text-gray-500 text-sm">Kualifikasi</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Teachers Grid --}}
    <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($teachers as $teacher)
                    <article
                        class="group bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl hover:border-blue-200 transition-all duration-300 hover:-translate-y-2 text-center">
                        {{-- Photo --}}
                        <div class="relative pt-8 px-8">
                            <div
                                class="w-32 h-32 mx-auto rounded-full overflow-hidden border-4 border-white shadow-lg group-hover:shadow-xl transition-shadow">
                                @if($teacher->photo)
                                    <img src="{{ asset('storage/' . $teacher->photo) }}" alt="{{ $teacher->name }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-blue-400 to-cyan-500 flex items-center justify-center">
                                        <i class="fas fa-user text-4xl text-white/80"></i>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-1 group-hover:text-blue-600 transition-colors">
                                {{ $teacher->name }}
                            </h3>

                            @if($teacher->position)
                                <p class="text-blue-600 text-sm font-medium mb-3">{{ $teacher->position }}</p>
                            @endif

                            @if($teacher->subjects)
                                <p class="text-gray-500 text-sm">
                                    <i class="fas fa-book text-gray-400 mr-1"></i>
                                    {{ $teacher->subjects }}
                                </p>
                            @endif

                            {{-- Social Links --}}
                            @if($teacher->email)
                                <div class="mt-4 pt-4 border-t border-gray-100">
                                    <a href="mailto:{{ $teacher->email }}"
                                        class="inline-flex items-center gap-2 text-gray-400 hover:text-blue-600 transition-colors text-sm">
                                        <i class="fas fa-envelope"></i>
                                        Hubungi
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
    <section class="py-16 bg-gradient-to-r from-blue-600 to-cyan-600 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml,%3Csvg width=\" 60\" height=\"60\"
                viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg
                fill=\"%23ffffff\" fill-opacity=\"0.05\"%3E%3Cpath d=\"M36
                34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6
                4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Bergabung dengan Tim Kami</h2>
                <p class="text-blue-100 text-lg mb-8">Kami selalu membuka kesempatan bagi tenaga pengajar yang berkompeten
                    dan berdedikasi.</p>
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center gap-2 px-8 py-4 bg-white text-blue-700 font-bold rounded-xl hover:bg-blue-50 transition-colors shadow-lg">
                    <i class="fas fa-envelope"></i>
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>
@endsection