{{-- Background Shapes from Awards Section --}}
<div class="absolute inset-0 pointer-events-none overflow-hidden">
    {{-- Glow Circles --}}
    <div class="absolute top-0 left-1/3 w-96 h-96 bg-[#4f2744]/30 rounded-full blur-4xl animate-pulse-slow"></div>
    <div class="absolute bottom-0 right-1/3 w-96 h-96 bg-[#3a1c32]/15 rounded-full blur-4xl animate-pulse-slow"></div>
    <div class="absolute top-1/2 left-0 w-64 h-64 bg-[#4f2744]/25 rounded-full blur-3xl animate-pulse-slow-delayed">
    </div>
    <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-[#3a1c32]/25 rounded-full blur-3xl animate-pulse-slow"></div>

    {{-- Floating Triangles --}}
    <div class="absolute top-1/4 left-10 w-32 h-32 bg-[#4f2744]/30 rotate-45 clip-triangle animate-float-slow"></div>
    <div class="absolute bottom-1/3 right-16 w-24 h-24 bg-[#3a1c32]/25 rotate-12 clip-triangle animate-float-slow">
    </div>
    <div
        class="absolute top-10 right-1/4 w-16 h-16 bg-[#4f2744]/30 -rotate-12 clip-triangle animate-float-slow-delayed">
    </div>
    <div
        class="absolute bottom-1/4 left-1/4 w-20 h-20 bg-[#3a1c32]/15 rotate-[120deg] clip-triangle animate-float-slow">
    </div>

    {{-- Polygonal Shapes --}}
    <div class="absolute top-2/3 left-1/2 w-40 h-40 bg-[#4f2744]/15 rounded-xl rotate-12 animate-rotate-slow"></div>
    <div class="absolute bottom-10 right-1/4 w-48 h-48 bg-[#3a1c32]/18 rounded-2xl rotate-45 animate-rotate-slow"></div>
    <div class="absolute top-1/3 left-20 w-12 h-12 bg-[#4f2744]/25 rounded-md -rotate-12 animate-rotate-slow-delayed">
    </div>
    <div class="absolute bottom-1/2 left-10 w-28 h-28 bg-[#3a1c32]/12 rounded-3xl rotate-[30deg] animate-rotate-slow">
    </div>

    {{-- Shapes tambahan di kanan --}}
    <div class="absolute top-16 right-10 w-36 h-36 bg-[#4f2744]/25 rounded-full blur-2xl animate-float-slow"></div>
    <div
        class="absolute bottom-20 right-0 w-28 h-28 bg-[#3a1c32]/25 rotate-12 clip-triangle animate-float-slow transition-transform">
    </div>
    <div class="absolute top-1/2 right-20 w-24 h-24 bg-[#4f2744]/15 rounded-lg rotate-45 animate-rotate-slow"></div>
    <div class="absolute top-1/4 right-1/3 w-8 h-8 bg-[#3a1c32]/30 rounded-full animate-ping"></div>

    {{-- Tiny Accent Shapes --}}
    <div class="absolute top-1/3 left-1/4 w-2 h-2 bg-[#4f2744]/60 rounded-full"></div>
    <div class="absolute top-2/3 right-1/3 w-3 h-3 bg-[#3a1c32]/45 rotate-45"></div>
    <div class="absolute bottom-1/4 left-1/2 w-2 h-2 bg-[#4f2744]/60 rounded-full"></div>
    <div class="absolute top-10 left-1/2 w-3 h-3 bg-[#3a1c32]/45 rounded-sm"></div>
</div>

<style>
    @keyframes pulse-slow {

        0%,
        100% {
            transform: scale(1);
            opacity: .7
        }

        50% {
            transform: scale(1.1);
            opacity: 1
        }
    }

    .animate-pulse-slow {
        animation: pulse-slow 8s infinite ease-in-out;
    }

    .animate-pulse-slow-delayed {
        animation: pulse-slow 8s infinite ease-in-out 4s;
    }

    @keyframes float-slow {

        0%,
        100% {
            transform: translateY(0)
        }

        50% {
            transform: translateY(-15px)
        }
    }

    .animate-float-slow {
        animation: float-slow 10s infinite ease-in-out;
    }

    .animate-float-slow-delayed {
        animation: float-slow 10s infinite ease-in-out 5s;
    }

    @keyframes rotate-slow {
        0% {
            transform: rotate(0deg)
        }

        100% {
            transform: rotate(360deg)
        }
    }

    .animate-rotate-slow {
        animation: rotate-slow 60s linear infinite;
    }

    .animate-rotate-slow-delayed {
        animation: rotate-slow 60s linear infinite 30s;
    }

    @keyframes spin-slow {
        0% {
            transform: rotate(0deg)
        }

        100% {
            transform: rotate(360deg)
        }
    }

    .animate-spin-slow {
        animation: spin-slow 15s linear infinite;
    }

    .clip-triangle {
        clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
    }
</style>