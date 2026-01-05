{{-- Hero Model Backdrop & Shapes --}}
<div class="absolute inset-0 pointer-events-none select-none">

    {{-- Main Glow Backdrop behind model --}}
    <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] bg-gradient-to-tr from-[#932F80]/20 via-[#4f2744]/30 to-transparent rounded-full blur-[120px] animate-pulse-slow">
    </div>

    {{-- Concentric Orbital Rings --}}
    <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[450px] lg:w-[600px] h-[450px] lg:h-[600px] border border-white/5 rounded-full animate-spin-slow opacity-50">
        <div class="absolute top-1/4 left-0 w-2 h-2 bg-purple-400 rounded-full blur-sm"></div>
    </div>
    <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[350px] lg:w-[500px] h-[350px] lg:h-[500px] border border-[#4f2744]/10 rounded-full animate-spin-slow-reverse opacity-30">
        <div class="absolute bottom-1/4 right-0 w-3 h-3 bg-[#932F80] rounded-full blur-[2px]"></div>
    </div>

    {{-- Floating Education Elements --}}
    {{-- Book - Top Left --}}
    <div
        class="absolute top-[15%] left-[10%] w-16 lg:w-24 h-16 lg:h-24 bg-white/5 backdrop-blur-md rounded-3xl border border-white/10 flex items-center justify-center rotate-12 animate-float-slow transition-transform hover:scale-110">
        <i class="fas fa-book-open text-white/40 text-2xl lg:text-3xl"></i>
    </div>

    {{-- Trophy - Bottom Right --}}
    <div
        class="absolute bottom-[20%] right-[5%] w-14 lg:w-20 h-14 lg:h-20 bg-white/5 backdrop-blur-md rounded-2xl border border-white/10 flex items-center justify-center -rotate-12 animate-float-slow-delayed shadow-2xl">
        <i class="fas fa-trophy text-amber-500/30 text-xl lg:text-2xl"></i>
    </div>

    {{-- Pencil/Creative - Mid Left --}}
    <div
        class="absolute top-1/2 left-[5%] w-12 h-12 bg-[#4f2744]/20 rounded-xl flex items-center justify-center -rotate-45 animate-pulse">
        <i class="fas fa-pencil-alt text-white/20 text-lg"></i>
    </div>

    {{-- Tech/Code - Top Right --}}
    <div
        class="absolute top-[20%] right-[15%] w-14 h-14 bg-white/5 rounded-full flex items-center justify-center animate-bounce-slow">
        <i class="fas fa-code text-white/20 text-xl"></i>
    </div>

    {{-- Abstract Glass Cards --}}
    <div
        class="absolute top-[30%] left-[20%] w-32 h-40 bg-gradient-to-br from-white/5 to-transparent border border-white/10 rounded-[2.5rem] backdrop-blur-sm -rotate-[25deg] animate-float-slow opacity-40">
    </div>
    <div
        class="absolute bottom-[35%] right-[25%] w-24 h-24 bg-gradient-to-tl from-[#932F80]/10 to-transparent border border-[#932F80]/20 rounded-[2rem] blur-[1px] rotate-[15deg] animate-float-slow-delayed">
    </div>

    {{-- Particle Accents --}}
    @for($i = 0; $i < 6; $i++)
        <div class="absolute w-1 h-1 bg-white/40 rounded-full animate-ping"
            style="top: {{ rand(10, 90) }}%; left: {{ rand(10, 90) }}%; animation-delay: {{ rand(0, 5) }}s"></div>
    @endfor

</div>

<style>
    @keyframes bounce-slow {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-15px);
        }
    }

    .animate-bounce-slow {
        animation: bounce-slow 5s ease-in-out infinite;
    }
</style>