@extends('layouts.app')

@section('title', $staffMember->name)

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
                <a href="{{ route('staff') }}" class="text-gray-400 hover:text-[#8C51A5] transition-colors">STAFF</a>
                <i class="fas fa-chevron-right text-[10px] text-gray-700"></i>
                <span class="text-[#F8CB62] line-clamp-1 break-all">{{ strtoupper($staffMember->name) }}</span>
            </nav>

            <div class="max-w-4xl" data-aos="fade-up">
                @if($staffMember->position)
                    <div class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#8C51A5]/25 backdrop-blur-md text-[#F0E7F8] font-black rounded-xl mb-6 border border-[#8C51A5]/30 shadow-lg uppercase tracking-wider text-xs"
                        data-aos="fade-right" data-aos-delay="200">
                        <i class="fas fa-users-cog text-[#F8CB62]"></i>
                        {{ $staffMember->position }}
                    </div>
                @endif
                <h1 class="text-3xl md:text-5xl lg:text-7xl font-black text-white mb-6 tracking-wide drop-shadow-lg leading-tight"
                    data-aos="zoom-in" data-aos-delay="400">
                    {{ $staffMember->name }}
                </h1>
                @if($staffMember->department)
                    <p class="text-gray-300 text-lg md:text-xl leading-relaxed max-w-3xl font-medium" data-aos="fade-up"
                        data-aos-delay="600">
                        Bagian / Unit: <span class="text-[#F8CB62] font-bold uppercase tracking-widest">{{ $staffMember->department }}</span>
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
                            @if($staffMember->photo)
                                <img src="{{ asset('storage/' . $staffMember->photo) }}" alt="{{ $staffMember->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-br from-[#F0E7F8] to-[#E5D4EF] flex items-center justify-center">
                                    <i class="fas fa-user-tie text-8xl text-[#8C51A5]/20"></i>
                                </div>
                            @endif
                        </div>

                        <div class="space-y-4 px-2 pb-4">
                            @if($staffMember->nip)
                                <div class="inline-block">
                                    <span class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">NIP
                                        / NUPTK</span>
                                    <span
                                        class="font-bold text-[#612F73] text-sm md:text-base tracking-wide">{{ $staffMember->nip }}</span>
                                </div>
                            @endif

                            <div class="pt-4 border-t border-gray-100 flex justify-center gap-4">
                                @if($staffMember->email)
                                    <a href="mailto:{{ $staffMember->email }}"
                                        class="w-10 h-10 rounded-full bg-[#8C51A5]/10 flex items-center justify-center text-[#8C51A5] hover:bg-[#8C51A5] hover:text-white transition-all shadow-sm cursor-pointer"
                                        title="Email">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                @endif
                                @if($staffMember->phone)
                                    <a href="https://wa.me/{{ $staffMember->phone }}" target="_blank"
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

                    {{-- Biography & Professional Details --}}
                    <div class="bg-white rounded-[2.5rem] p-8 md:p-12 border border-[#8C51A5]/10 shadow-premium-lg relative overflow-hidden"
                        data-aos="fade-up" data-aos-delay="100">
                        <h2 class="text-2xl md:text-3xl font-black text-[#612F73] mb-8 flex items-center gap-3 decoration-[#F8CB62] underline-offset-8">
                            <i class="fas fa-address-card text-[#8C51A5]"></i>
                            Informasi Staff
                        </h2>

                        {{-- Roles Grid --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-10">
                            @if($staffMember->position)
                                <div class="p-5 rounded-2xl bg-[#F0E7F8]/50 border border-[#8C51A5]/10 group hover:bg-[#8C51A5] transition-all duration-500">
                                    <span class="block text-[9px] font-black text-gray-400 uppercase tracking-widest mb-1 group-hover:text-white/60 transition-colors">Jabatan</span>
                                    <span class="font-black text-[#612F73] group-hover:text-white transition-colors uppercase tracking-tight">{{ $staffMember->position }}</span>
                                </div>
                            @endif

                            @if($staffMember->department)
                                <div class="p-5 rounded-2xl bg-[#F8CB62]/5 border border-[#F8CB62]/20 group hover:bg-[#F8CB62] transition-all duration-500">
                                    <span class="block text-[9px] font-black text-gray-400 uppercase tracking-widest mb-1 group-hover:text-[#612F73]/60 transition-colors">Bagian / Unit</span>
                                    <span class="font-black text-[#612F73] uppercase tracking-tight">{{ $staffMember->department }}</span>
                                </div>
                            @endif
                        </div>

                        @if($staffMember->bio)
                            <div class="prose prose-lg text-gray-600 max-w-none leading-relaxed border-t border-gray-100 pt-8">
                                {!! nl2br(e($staffMember->bio)) !!}
                            </div>
                        @else
                            <div class="border-t border-gray-100 pt-8">
                                <p class="text-gray-500 font-medium leading-relaxed">
                                    {{ $staffMember->name }} adalah tenaga kependidikan profesional di {{ $settings['school_name'] ?? 'SMK YAJ' }} yang bertugas sebagai {{ $staffMember->position ?? 'Staff' }} di bagian {{ $staffMember->department ?? 'Administrasi' }}. Dedikasi beliau membantu kelancaran operasional dan pelayanan di lingkungan sekolah.
                                </p>
                            </div>
                        @endif
                    </div>

                </div>
            </div>

            {{-- Other Staff --}}
            @if(isset($relatedStaff) && $relatedStaff->count() > 0)
                <div class="mt-24 border-t border-[#8C51A5]/10 pt-16">
                    <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                        <div>
                            <h2 class="text-3xl font-black text-[#612F73] mb-2 uppercase tracking-tight">Staff Lainnya</h2>
                            <p class="text-gray-500 font-medium tracking-wide">Tim profesional yang mendukung ekosistem pendidikan kami</p>
                        </div>
                        <a href="{{ route('staff') }}"
                            class="inline-flex items-center gap-3 px-6 py-3 bg-[#F0E7F8] text-[#8C51A5] font-black uppercase tracking-[0.2em] text-[10px] rounded-xl border border-[#8C51A5]/10 hover:bg-[#8C51A5] hover:text-white transition-all duration-300">
                            LIHAT SEMUA STAFF <i class="fas fa-arrow-right text-[8px]"></i>
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($relatedStaff as $relStaff)
                            <a href="{{ route('staff.show', $relStaff->id) }}"
                                class="group bg-white rounded-3xl p-4 border border-[#8C51A5]/5 hover:border-[#8C51A5]/30 hover:shadow-xl transition-all duration-300 flex items-center gap-4">
                                <div class="w-16 h-16 rounded-2xl overflow-hidden bg-gray-100 flex-shrink-0 border border-gray-100">
                                    @if($relStaff->photo)
                                        <img src="{{ asset('storage/' . $relStaff->photo) }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-[#8C51A5]/20 bg-[#F0E7F8]"><i
                                                class="fas fa-user-tie text-xl"></i></div>
                                    @endif
                                </div>
                                <div class="min-w-0">
                                    <h4
                                        class="font-black text-[#612F73] text-[13px] group-hover:text-[#8C51A5] transition-colors line-clamp-1 uppercase tracking-tight">
                                        {{ $relStaff->name }}</h4>
                                    <p class="text-[9px] font-black text-gray-400 mt-1 line-clamp-1 uppercase tracking-widest">{{ $relStaff->position ?? 'Staff' }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </section>
@endsection
