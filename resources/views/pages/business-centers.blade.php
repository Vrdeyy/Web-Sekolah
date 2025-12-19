@extends('layouts.app')

@section('title', 'Pusat Bisnis')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-gradient-to-br from-slate-900 via-orange-900 to-red-900 relative overflow-hidden">
        <div class="absolute inset-0">
            <div
                class="absolute top-0 left-0 w-96 h-96 bg-orange-500/20 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2">
            </div>
            <div
                class="absolute bottom-0 right-0 w-96 h-96 bg-red-500/20 rounded-full blur-3xl translate-x-1/2 translate-y-1/2">
            </div>
        </div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-orange-300 text-sm font-medium mb-6">
                    <i class="fas fa-store"></i>
                    <span>TEACHING FACTORY</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                    Pusat <span class="text-orange-400">Bisnis</span>
                </h1>
                <p class="text-gray-300 text-lg">
                    Unit usaha dan teaching factory sebagai wadah pembelajaran wirausaha bagi siswa
                </p>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-8 bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-wrap items-center justify-center gap-8 md:gap-16">
                <div class="text-center">
                    <div class="text-3xl font-extrabold text-orange-600">{{ $businessCenters->count() }}</div>
                    <div class="text-gray-500 text-sm">Unit Usaha</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-extrabold text-emerald-600">100+</div>
                    <div class="text-gray-500 text-sm">Siswa Terlibat</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-extrabold text-blue-600">Real</div>
                    <div class="text-gray-500 text-sm">Pengalaman Bisnis</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Business Centers Grid --}}
    <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($businessCenters as $bc)
                    <article
                        class="group bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl hover:border-orange-200 transition-all duration-300 hover:-translate-y-2">
                        {{-- Image --}}
                        <div class="relative h-56 overflow-hidden">
                            @if($bc->image)
                                <img src="{{ asset('storage/' . $bc->image) }}" alt="{{ $bc->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-br from-orange-500 via-red-500 to-pink-500 flex items-center justify-center">
                                    <i class="fas fa-store text-6xl text-white/40"></i>
                                </div>
                            @endif

                            {{-- Overlay --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-orange-600 transition-colors">
                                {{ $bc->name }}
                            </h3>

                            @if($bc->description)
                                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                    {{ strip_tags($bc->description) }}
                                </p>
                            @endif

                            {{-- Footer --}}
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-users text-orange-600 text-xs"></i>
                                    </div>
                                    <span class="text-sm text-gray-500">Teaching Factory</span>
                                </div>
                                @if($bc->link)
                                    <a href="{{ $bc->link }}" target="_blank"
                                        class="inline-flex items-center gap-2 text-orange-600 font-semibold text-sm hover:gap-3 transition-all">
                                        Kunjungi
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Benefits Section --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Manfaat Teaching Factory</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Pembelajaran berbasis produksi yang memberikan pengalaman nyata kepada siswa
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div
                    class="p-6 bg-gradient-to-br from-orange-50 to-red-50 rounded-2xl border border-orange-100 hover:shadow-lg transition-all text-center">
                    <div class="w-14 h-14 bg-orange-600 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-hands-helping text-2xl text-white"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Pengalaman Nyata</h3>
                    <p class="text-gray-600 text-sm">Siswa belajar langsung dari praktik bisnis yang nyata</p>
                </div>

                <div
                    class="p-6 bg-gradient-to-br from-emerald-50 to-teal-50 rounded-2xl border border-emerald-100 hover:shadow-lg transition-all text-center">
                    <div class="w-14 h-14 bg-emerald-600 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-lightbulb text-2xl text-white"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Jiwa Wirausaha</h3>
                    <p class="text-gray-600 text-sm">Menumbuhkan semangat dan jiwa kewirausahaan</p>
                </div>

                <div
                    class="p-6 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl border border-blue-100 hover:shadow-lg transition-all text-center">
                    <div class="w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-cogs text-2xl text-white"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Soft Skills</h3>
                    <p class="text-gray-600 text-sm">Mengembangkan kemampuan komunikasi dan manajemen</p>
                </div>

                <div
                    class="p-6 bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl border border-purple-100 hover:shadow-lg transition-all text-center">
                    <div class="w-14 h-14 bg-purple-600 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-chart-line text-2xl text-white"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Siap Kerja</h3>
                    <p class="text-gray-600 text-sm">Lulusan siap memasuki dunia kerja atau berwirausaha</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-16 bg-gradient-to-r from-orange-500 to-red-500 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml,%3Csvg width=\" 60\" height=\"60\"
                viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg
                fill=\"%23ffffff\" fill-opacity=\"0.05\"%3E%3Cpath d=\"M36
                34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6
                4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Tertarik Menjadi Partner?</h2>
                <p class="text-orange-100 text-lg mb-8">Kami terbuka untuk kerja sama dengan dunia usaha dan industri.</p>
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center gap-2 px-8 py-4 bg-white text-orange-700 font-bold rounded-xl hover:bg-orange-50 transition-colors shadow-lg">
                    <i class="fas fa-handshake"></i>
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>
@endsection