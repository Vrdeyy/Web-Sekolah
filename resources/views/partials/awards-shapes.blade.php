{{-- Highly Premium & Balanced Background Shapes --}}
<div class="absolute inset-0 pointer-events-none overflow-hidden">

    {{-- Strategic Glow Orbs --}}
    <div
        class="absolute top-[-5%] left-[5%] w-[600px] h-[600px] bg-gradient-to-br from-[#612F73]/20 to-transparent rounded-full blur-[100px] animate-pulse-slow">
    </div>
    <div
        class="absolute bottom-[-10%] right-[5%] w-[700px] h-[700px] bg-gradient-to-tl from-[#8C51A5]/15 via-[#612F73]/5 to-transparent rounded-full blur-[120px] animate-pulse-slow-delayed">
    </div>
    <div
        class="absolute top-1/4 right-[20%] w-[400px] h-[400px] bg-[#D668EA]/[0.05] rounded-full blur-[90px] animate-float-slow">
    </div>

    {{-- CORE FLOATING ICONS (Balanced & High Quality) --}}
    <div class="absolute top-[8%] left-[12%] text-[#D668EA]/20 text-6xl animate-float-slow transform -rotate-12">
        <i class="fas fa-graduation-cap"></i>
    </div>
    <div class="absolute top-[38%] right-[10%] text-[#8C51A5]/20 text-8xl animate-float-slow-delayed rotate-12">
        <i class="fas fa-award"></i>
    </div>
    <div class="absolute bottom-[12%] left-[15%] text-[#D668EA]/10 text-5xl animate-float-slow">
        <i class="fas fa-medal"></i>
    </div>
    <div class="absolute top-[15%] right-[25%] text-[#F8CB62]/20 text-7xl animate-pulse">
        <i class="fas fa-star"></i>
    </div>
    <div class="absolute bottom-[5%] right-[15%] text-[#612F73]/15 text-[10rem] animate-float-slow opacity-30">
        <i class="fas fa-certificate"></i>
    </div>

    {{-- MICRO ACCENTS (Adding "Ramai" but Subtle) --}}
    {{-- Plus/Cross Signs --}}
    <div class="absolute top-1/4 left-1/3 text-[#8C51A5]/30 text-xl animate-spin-slow">+</div>
    <div class="absolute bottom-1/3 left-1/2 text-[#612F73]/30 text-2xl animate-spin-slow-reverse">×</div>
    <div class="absolute top-2/3 right-1/4 text-[#8C51A5]/20 text-lg animate-float-slow">+</div>
    <div class="absolute top-10 right-1/2 text-[#D668EA]/20 text-xl rotate-45 animate-pulse">×</div>

    {{-- Small Glowing Dots --}}
    <div class="absolute top-1/2 left-1/4 w-1.5 h-1.5 bg-[#F8CB62]/40 rounded-full blur-sm animate-ping"></div>
    <div class="absolute bottom-1/4 right-1/3 w-2 h-2 bg-white/30 rounded-full blur-sm animate-pulse"></div>
    <div class="absolute top-[60%] right-[45%] w-1 h-1 bg-[#612F73]/60 rounded-full animate-ping"></div>

    {{-- ADVANCED GEOMETRIC LAYERS --}}
    {{-- Abstract Rings --}}
    <div class="absolute top-[20%] right-[15%] w-72 h-72 border border-white/5 rounded-full animate-spin-slow">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 w-3 h-3 bg-[#8C51A5]/50 rounded-full">
        </div>
    </div>
    <div
        class="absolute bottom-[15%] left-[5%] w-56 h-56 border border-[#8C51A5]/10 rounded-full animate-spin-slow-reverse opacity-40">
    </div>

    {{-- Orbital Line --}}
    <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[110%] h-[1px] bg-gradient-to-r from-transparent via-white/[0.05] to-transparent -rotate-12">
    </div>
    <div
        class="absolute top-1/3 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[110%] h-[1px] bg-gradient-to-r from-transparent via-[#8C51A5]/[0.08] to-transparent rotate-6">
    </div>

    {{-- Decorative Rectangles (Glass) --}}
    <div
        class="absolute top-[45%] left-[8%] w-24 h-32 bg-white/[0.01] border border-white/5 rounded-2xl backdrop-blur-[2px] -rotate-12 animate-float-slow">
    </div>
    <div
        class="absolute bottom-[25%] right-[5%] w-32 h-24 bg-[#8C51A5]/[0.02] border border-[#8C51A5]/5 rounded-3xl backdrop-blur-[2px] rotate-6 animate-float-slow-delayed">
    </div>

    {{-- BACKGROUND TEXTURE --}}
    <div
        class="absolute inset-0 bg-[radial-gradient(circle_at_center,#612F7308_2px,transparent_2px)] bg-[size:50px_50px]">
    </div>
    <div
        class="absolute inset-0 bg-[linear-gradient(to_right,#8C51A503_1px,transparent_1px),linear-gradient(to_bottom,#8C51A503_1px,transparent_1px)] bg-[size:100px_100px]">
    </div>
</div>

<style>
    @keyframes pulse-slow {

        0%,
        100% {
            transform: scale(1);
            opacity: 0.4;
        }

        50% {
            transform: scale(1.05);
            opacity: 0.7;
        }
    }

    .animate-pulse-slow {
        animation: pulse-slow 12s infinite ease-in-out;
    }

    .animate-pulse-slow-delayed {
        animation: pulse-slow 12s infinite ease-in-out 6s;
    }

    @keyframes float-slow {

        0%,
        100% {
            transform: translateY(0) rotate(0deg);
        }

        50% {
            transform: translateY(-25px) rotate(3deg);
        }
    }

    .animate-float-slow {
        animation: float-slow 14s infinite ease-in-out;
    }

    .animate-float-slow-delayed {
        animation: float-slow 16s infinite ease-in-out 8s;
    }

    @keyframes spin-slow {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @keyframes spin-slow-reverse {
        from {
            transform: rotate(360deg);
        }

        to {
            transform: rotate(0deg);
        }
    }

    .animate-spin-slow {
        animation: spin-slow 40s linear infinite;
    }

    .animate-spin-slow-reverse {
        animation: spin-slow-reverse 45s linear infinite;
    }
</style>