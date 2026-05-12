@extends('layouts.app')

@section('title', $teacher->name)

@section('content')
    {{-- Hero Header --}}
    <section class="pt-28 pb-16 bg-premium-dark relative overflow-hidden">
        @include('partials.awards-shapes')
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            {{-- Breadcrumb --}}
            <nav class="flex flex-wrap items-center gap-2 text-xs md:text-sm mb-8 font-bold uppercase tracking-widest"
                data-aos="fade-down">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-[#8C51A5] transition-colors">
                    <i class="fas fa-home"></i>
                </a>
                <i class="fas fa-chevron-right text-[10px] text-gray-700"></i>
                <a href="{{ route('teachers') }}" class="text-gray-400 hover:text-[#8C51A5] transition-colors">GURU</a>
                <i class="fas fa-chevron-right text-[10px] text-gray-700"></i>
                <span class="text-[#F8CB62] line-clamp-1 break-all">{{ strtoupper($teacher->name) }}</span>
            </nav>

            <div class="max-w-4xl" data-aos="fade-up">
                @if($teacher->position)
                    <div class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#8C51A5]/25 backdrop-blur-md text-[#F0E7F8] font-black rounded-xl mb-6 border border-[#8C51A5]/30 shadow-lg uppercase tracking-wider text-xs"
                        data-aos="fade-right" data-aos-delay="200">
                        <i class="fas fa-id-badge text-[#F8CB62]"></i>
                        {{ $teacher->position }}
                    </div>
                @endif
                <h1 class="text-3xl md:text-5xl lg:text-7xl font-black text-white mb-6 tracking-wide drop-shadow-lg leading-tight"
                    data-aos="zoom-in" data-aos-delay="400">
                    {{ $teacher->name }}
                </h1>
                @if($teacher->subject)
                    <p class="text-gray-300 text-lg md:text-xl leading-relaxed max-w-3xl font-medium" data-aos="fade-up"
                        data-aos-delay="600">
                        Pengajar Mata Pelajaran: <span class="text-[#F8CB62] font-bold">{{ $teacher->subject }}</span>
                    </p>
                @endif
            </div>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="py-12 md:py-24 bg-[#F0E7F8]/30 relative">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-8 md:gap-12 items-start">

                {{-- Left Side: Photo & Info --}}
                <div class="lg:col-span-1 space-y-8" data-aos="fade-up">
                    {{-- Photo Card --}}
                    <div
                        class="bg-white rounded-[2.5rem] p-4 border border-[#8C51A5]/10 shadow-premium-lg text-center relative overflow-hidden group">
                        <div
                            class="absolute top-0 right-0 w-40 h-40 bg-[#8C51A5]/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2">
                        </div>

                        <div
                            class="relative w-full aspect-square rounded-[2rem] overflow-hidden mb-6 border-4 border-[#F0E7F8]">
                            @if($teacher->photo)
                                <img src="{{ asset('storage/' . $teacher->photo) }}" alt="{{ $teacher->name }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-br from-[#F0E7F8] to-[#E5D4EF] flex items-center justify-center">
                                    <i class="fas fa-user-graduate text-8xl text-[#8C51A5]/20"></i>
                                </div>
                            @endif
                        </div>

                        <div class="space-y-4 px-2 pb-4">
                            @if($teacher->nip)
                                <div class="inline-block">
                                    <span class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">NIP
                                        / NUPTK</span>
                                    <span
                                        class="font-bold text-[#612F73] text-sm md:text-base tracking-wide">{{ $teacher->nip }}</span>
                                </div>
                            @endif

                            <div class="pt-4 border-t border-gray-100 flex justify-center gap-4">
                                @if($teacher->email)
                                    <a href="mailto:{{ $teacher->email }}"
                                        class="w-10 h-10 rounded-full bg-[#8C51A5]/10 flex items-center justify-center text-[#8C51A5] hover:bg-[#8C51A5] hover:text-white transition-all shadow-sm cursor-pointer"
                                        title="Email">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                @endif
                                @if($teacher->phone)
                                    <a href="https://wa.me/{{ $teacher->phone }}" target="_blank"
                                        class="w-10 h-10 rounded-full bg-[#F8CB62]/10 flex items-center justify-center text-[#d9aa38] hover:bg-[#F8CB62] hover:text-[#612F73] transition-all shadow-sm cursor-pointer"
                                        title="WhatsApp">
                                        <i class="fab fa-whatsapp text-lg"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Side: Bio & Details --}}
                <div class="lg:col-span-2 space-y-8">

                    {{-- Biography --}}
                    @if($teacher->bio)
                        <div class="bg-white rounded-[2.5rem] p-8 md:p-12 border border-[#8C51A5]/10 shadow-premium-lg relative overflow-hidden"
                            data-aos="fade-up" data-aos-delay="100">
                            <h2 class="text-2xl md:text-3xl font-black text-[#612F73] mb-6 flex items-center gap-3">
                                <i class="fas fa-user-tie text-[#8C51A5]"></i>
                                Biografi Singkat
                            </h2>
                            <div class="prose prose-lg text-gray-600 max-w-none leading-relaxed">
                                {!! nl2br(e($teacher->bio)) !!}
                            </div>
                        </div>
                    @endif

                    {{-- Teaching Subjects --}}
                    @if($teacher->subjects || $teacher->subject)
                        <div class="bg-[#F8CB62]/5 rounded-[2.5rem] p-8 md:p-12 border border-[#F8CB62]/20 shadow-premium-lg"
                            data-aos="fade-up" data-aos-delay="200">
                            <h2 class="text-2xl md:text-3xl font-black text-[#612F73] mb-6 flex items-center gap-3">
                                <i class="fas fa-book-open text-[#F8CB62]"></i>
                                Bidang Pengajaran
                            </h2>
                            <p class="text-gray-600 text-lg leading-relaxed">
                                {{ $teacher->name }} memiliki kompetensi dan pengalaman dalam mengampu mata pelajaran:
                            </p>
                            <div class="mt-6 flex flex-wrap gap-3">
                                @foreach(explode(',', $teacher->subjects ?? $teacher->subject) as $subj)
                                    <span
                                        class="inline-flex items-center px-5 py-2.5 rounded-xl bg-white border border-[#F8CB62]/30 text-[#612F73] font-bold shadow-sm">
                                        <i class="fas fa-check-circle text-[#F8CB62] mr-2"></i>
                                        {{ trim($subj) }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>
            </div>

            {{-- Other Teachers --}}
            @if(isset($relatedTeachers) && $relatedTeachers->count() > 0)
                <div class="mt-24 border-t border-[#8C51A5]/10 pt-16">
                    <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                        <div>
                            <h2 class="text-3xl font-black text-[#612F73] mb-2">Guru Lainnya</h2>
                            <p class="text-gray-500">Kenali tenaga pendidik profesional kami lainnya</p>
                        </div>
                        <a href="{{ route('teachers') }}"
                            class="text-[#8C51A5] font-black uppercase tracking-widest text-xs hover:text-[#612F73] transition-colors">
                            Lihat Semua Guru <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($relatedTeachers as $relTeacher)
                            <a href="{{ route('teacher.show', $relTeacher->id) }}"
                                class="group bg-white rounded-3xl p-4 border border-[#8C51A5]/5 hover:border-[#8C51A5]/30 hover:shadow-xl transition-all duration-300 flex items-center gap-4">
                                <div class="w-16 h-16 rounded-2xl overflow-hidden bg-gray-100 flex-shrink-0">
                                    @if($relTeacher->photo)
                                        <img src="{{ asset('storage/' . $relTeacher->photo) }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-[#8C51A5]/40"><i
                                                class="fas fa-user text-2xl"></i></div>
                                    @endif
                                </div>
                                <div>
                                    <h4
                                        class="font-black text-[#612F73] text-sm group-hover:text-[#8C51A5] transition-colors line-clamp-1">
                                        {{ $relTeacher->name }}</h4>
                                    <p class="text-xs text-gray-400 mt-1 line-clamp-1">{{ $relTeacher->position ?? 'Guru' }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </section>
@endsection