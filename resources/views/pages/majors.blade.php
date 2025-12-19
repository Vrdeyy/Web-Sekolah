@extends('layouts.app')

@section('title', 'Program Keahlian')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-gradient-to-br from-slate-900 via-slate-800 to-emerald-900 relative overflow-hidden">
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
                    <i class="fas fa-graduation-cap"></i>
                    <span>PROGRAM KEAHLIAN</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                    Jurusan <span class="text-emerald-400">Unggulan</span>
                </h1>
                <p class="text-gray-300 text-lg">
                    Pilih program keahlian yang sesuai dengan minat dan bakat Anda untuk masa depan yang cerah
                </p>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-8 bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-wrap items-center justify-center gap-8 md:gap-16">
                <div class="text-center">
                    <div class="text-3xl font-extrabold text-emerald-600">{{ $majors->count() }}</div>
                    <div class="text-gray-500 text-sm">Program Keahlian</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-extrabold text-blue-600">100%</div>
                    <div class="text-gray-500 text-sm">Tersertifikasi</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-extrabold text-purple-600">4 Tahun</div>
                    <div class="text-gray-500 text-sm">Masa Studi</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Majors Grid --}}
    <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($majors as $major)
                    <article
                        class="group bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl hover:border-emerald-200 transition-all duration-300 hover:-translate-y-2">
                        {{-- Image --}}
                        <a href="{{ route('major.show', $major->slug) }}" class="block relative h-56 overflow-hidden">
                            @if($major->image)
                                <img src="{{ asset('storage/' . $major->image) }}" alt="{{ $major->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500 flex items-center justify-center">
                                    <i class="fas fa-graduation-cap text-6xl text-white/40"></i>
                                </div>
                            @endif

                            {{-- Overlay --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                            </div>

                            {{-- Badge --}}
                            @if($major->short_name)
                                <div class="absolute top-4 left-4">
                                    <span class="px-4 py-2 bg-emerald-600 text-white text-sm font-bold rounded-lg shadow-lg">
                                        {{ $major->short_name }}
                                    </span>
                                </div>
                            @endif
                        </a>

                        {{-- Content --}}
                        <div class="p-6">
                            <a href="{{ route('major.show', $major->slug) }}">
                                <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-emerald-600 transition-colors">
                                    {{ $major->name }}
                                </h3>
                            </a>

                            @if($major->short_description)
                                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                    {{ $major->short_description }}
                                </p>
                            @endif

                            {{-- Footer --}}
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <a href="{{ route('major.show', $major->slug) }}"
                                    class="inline-flex items-center gap-2 text-emerald-600 font-semibold text-sm group-hover:gap-3 transition-all">
                                    Lihat Detail
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                                <div class="flex items-center gap-2 text-gray-400">
                                    <i class="fas fa-users"></i>
                                    <span class="text-sm">4 Tahun</span>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-16 bg-gradient-to-r from-emerald-600 to-teal-600 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml,%3Csvg width=\" 60\" height=\"60\"
                viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg
                fill=\"%23ffffff\" fill-opacity=\"0.05\"%3E%3Cpath d=\"M36
                34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6
                4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Tertarik Bergabung?</h2>
                <p class="text-emerald-100 text-lg mb-8">Daftarkan diri Anda sekarang dan jadilah bagian dari keluarga besar
                    kami!</p>
                <div class="flex flex-wrap justify-center gap-4">
                    @if(($settings['ppdb_active'] ?? false))
                        <a href="{{ $settings['ppdb_url'] ?? '#' }}" target="_blank"
                            class="inline-flex items-center gap-2 px-8 py-4 bg-white text-emerald-700 font-bold rounded-xl hover:bg-emerald-50 transition-colors shadow-lg">
                            <i class="fas fa-user-plus"></i>
                            Daftar PPDB
                        </a>
                    @endif
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center gap-2 px-8 py-4 bg-white/20 backdrop-blur-sm text-white font-bold rounded-xl border-2 border-white/40 hover:bg-white/30 transition-colors">
                        <i class="fas fa-phone"></i>
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection