@extends('layouts.app')

@section('title', 'Tenaga Kependidikan')

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-gradient-to-br from-slate-900 via-teal-900 to-emerald-900 relative overflow-hidden">
        <div class="absolute inset-0">
            <div
                class="absolute top-0 left-0 w-96 h-96 bg-teal-500/20 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2">
            </div>
            <div
                class="absolute bottom-0 right-0 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl translate-x-1/2 translate-y-1/2">
            </div>
        </div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-teal-300 text-sm font-medium mb-6">
                    <i class="fas fa-users-cog"></i>
                    <span>TENAGA KEPENDIDIKAN</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                    Daftar <span class="text-teal-400">Staff</span>
                </h1>
                <p class="text-gray-300 text-lg">
                    Tenaga kependidikan yang mendukung operasional {{ $settings['school_name'] ?? 'SMK YAJ' }}
                </p>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-8 bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-wrap items-center justify-center gap-8 md:gap-16">
                <div class="text-center">
                    <div class="text-3xl font-extrabold text-teal-600">{{ $staff->count() }}</div>
                    <div class="text-gray-500 text-sm">Tenaga Kependidikan</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-extrabold text-emerald-600">100%</div>
                    <div class="text-gray-500 text-sm">Profesional</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-extrabold text-blue-600">24/7</div>
                    <div class="text-gray-500 text-sm">Pelayanan</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Staff Grid --}}
    <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($staff as $member)
                    <article
                        class="group bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl hover:border-teal-200 transition-all duration-300 hover:-translate-y-2 text-center">
                        {{-- Photo --}}
                        <div class="relative pt-8 px-8">
                            <div
                                class="w-32 h-32 mx-auto rounded-full overflow-hidden border-4 border-white shadow-lg group-hover:shadow-xl transition-shadow">
                                @if($member->photo)
                                    <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-teal-400 to-emerald-500 flex items-center justify-center">
                                        <i class="fas fa-user text-4xl text-white/80"></i>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-1 group-hover:text-teal-600 transition-colors">
                                {{ $member->name }}
                            </h3>

                            @if($member->position)
                                <p class="text-teal-600 text-sm font-medium mb-3">{{ $member->position }}</p>
                            @endif

                            @if($member->department)
                                <p class="text-gray-500 text-sm">
                                    <i class="fas fa-building text-gray-400 mr-1"></i>
                                    {{ $member->department }}
                                </p>
                            @endif

                            {{-- Contact --}}
                            @if($member->email)
                                <div class="mt-4 pt-4 border-t border-gray-100">
                                    <a href="mailto:{{ $member->email }}"
                                        class="inline-flex items-center gap-2 text-gray-400 hover:text-teal-600 transition-colors text-sm">
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
    <section class="py-16 bg-gradient-to-r from-teal-600 to-emerald-600 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml,%3Csvg width=\" 60\" height=\"60\"
                viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg
                fill=\"%23ffffff\" fill-opacity=\"0.05\"%3E%3Cpath d=\"M36
                34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6
                4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Butuh Bantuan?</h2>
                <p class="text-teal-100 text-lg mb-8">Tim kami siap membantu Anda dengan berbagai kebutuhan administrasi dan
                    informasi.</p>
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center gap-2 px-8 py-4 bg-white text-teal-700 font-bold rounded-xl hover:bg-teal-50 transition-colors shadow-lg">
                    <i class="fas fa-phone"></i>
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>
@endsection