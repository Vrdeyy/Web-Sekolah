@extends('layouts.app')

@section('title', 'Agenda Sekolah - Kalender Akademik')

@section('content')
<section class="py-24 bg-[#F0F2F5] min-h-screen pt-24 relative overflow-hidden">
    {{-- Ultra-Modern Background Elements --}}
    <div class="absolute top-0 left-0 w-full h-full bg-white -z-10"></div>
    <div class="absolute top-0 left-0 w-full h-[800px] bg-gradient-to-b from-[#612F73]/[0.05] via-[#8C51A5]/[0.02] to-transparent -z-10"></div>
    <div class="absolute -top-[10%] -left-[10%] w-[50%] h-[50%] bg-[#8C51A5] opacity-[0.05] rounded-full blur-[120px] -z-10 animate-pulse"></div>
    <div class="absolute top-[20%] -right-[10%] w-[40%] h-[40%] bg-[#F8CB62] opacity-[0.03] rounded-full blur-[100px] -z-10"></div>
    <div class="absolute bottom-[10%] left-[20%] w-[30%] h-[30%] bg-[#D668EA] opacity-[0.02] rounded-full blur-[100px] -z-10"></div>

    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        {{-- Hyper-Premium Header Section --}}
        <div class="relative mb-10">
            {{-- Background Decorative Glow --}}
            <div class="absolute -top-20 -left-20 w-96 h-96 bg-gradient-to-br from-[#8C51A5] to-[#D668EA] opacity-10 blur-[100px] -z-10 animate-pulse"></div>
            
            <div class="flex flex-col xl:flex-row items-center lg:items-start xl:items-end justify-between gap-12">
                <div class="flex-1">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="flex -space-x-2">
                            <div class="w-8 h-8 rounded-full bg-[#612F73] border-2 border-white flex items-center justify-center text-[10px] text-white font-bold">A</div>
                            <div class="w-8 h-8 rounded-full bg-[#8C51A5] border-2 border-white flex items-center justify-center text-[10px] text-white font-bold">C</div>
                        </div>
                        <div class="h-[1px] w-12 bg-gray-200"></div>
                        <span class="text-[10px] font-black text-[#612F73] uppercase tracking-[0.4em] opacity-60">Academic Platform</span>
                    </div>

                    <div class="relative group">
                        <h1 class="text-6xl md:text-8xl font-black text-[#612F73] leading-[0.9] tracking-tighter mb-6">
                            Smart <br>
                            <span class="relative">
                                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#612F73] via-[#D668EA] to-[#F8CB62]">Agenda.</span>
                                <svg class="absolute -right-12 -top-4 w-12 h-12 text-[#F8CB62] opacity-40 group-hover:rotate-45 transition-transform duration-700" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0l3.09 8.91L24 12l-8.91 3.09L12 24l-3.09-8.91L0 12l8.91-3.09L12 0z"/></svg>
                            </span>
                        </h1>
                    </div>

                    <div class="flex flex-wrap items-center gap-4 mt-8">
                        <div class="px-4 py-2 bg-white/80 backdrop-blur-sm rounded-2xl border border-white/50 shadow-sm flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></div>
                            <span class="text-[10px] font-bold text-gray-600 uppercase">System Active</span>
                        </div>
                        <div class="px-4 py-2 bg-white/80 backdrop-blur-sm rounded-2xl border border-white/50 shadow-sm flex items-center gap-3">
                            <i class="fas fa-university text-[#8C51A5] text-xs"></i>
                            <span class="text-[10px] font-bold text-gray-600 uppercase">SMK YAJ DEPOK</span>
                        </div>
                    </div>
                </div>

                {{-- Futuristic HUD Clock Widget --}}
                <div class="relative group w-full max-w-md">
                    {{-- Multi-layered Glow --}}
                    <div class="absolute inset-0 bg-gradient-to-r from-[#F8CB62] via-[#8C51A5] to-[#612F73] rounded-[3rem] blur-3xl opacity-10 group-hover:opacity-30 transition-opacity duration-700"></div>
                    
                    <div class="relative bg-white/70 backdrop-blur-xl rounded-[3rem] p-1 border border-white shadow-2xl overflow-hidden">
                        <div class="flex items-center justify-between p-6 pl-10 pr-4">
                            <div class="space-y-1">
                                <div class="flex items-center gap-2">
                                    <span class="text-[9px] font-black text-gray-400 uppercase tracking-[0.2em]">Live Tracking</span>
                                    <div class="w-1.5 h-1.5 rounded-full bg-red-500 animate-ping"></div>
                                </div>
                                <h3 id="live-clock" class="text-4xl font-black text-[#612F73] tracking-tighter tabular-nums drop-shadow-sm">00:00:00</h3>
                                <p class="text-[10px] font-medium text-gray-400">GMT+07:00 • West Indonesia Time</p>
                            </div>
                            
                            <div class="relative">
                                <div class="absolute inset-0 bg-[#612F73] rounded-[2.2rem] blur-xl opacity-20 animate-pulse"></div>
                                <div class="w-20 h-20 bg-gradient-to-br from-[#612F73] to-[#8C51A5] rounded-[2.2rem] flex items-center justify-center relative shadow-xl transform group-hover:rotate-12 transition-all duration-700">
                                    <i class="fas fa-clock text-3xl text-[#F8CB62] animate-[spin_8s_linear_infinite]"></i>
                                    <div class="absolute inset-1 rounded-[1.8rem] border border-white/10"></div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Bottom HUD Line --}}
                        <div class="h-1 w-full bg-gray-100/50 flex">
                            <div class="h-full bg-gradient-to-r from-[#F8CB62] to-[#8C51A5] w-1/3 animate-[loading_3s_infinite_ease-in-out]"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            @keyframes loading {
                0% { transform: translateX(-100%); }
                100% { transform: translateX(300%); }
            }
        </style>

        <div class="max-w-5xl mx-auto">
            {{-- Calendar Controller --}}
            <div class="bg-white/80 backdrop-blur-xl rounded-[3rem] shadow-[0_30px_70px_rgba(97,47,115,0.06)] border border-white p-6 md:p-12 relative overflow-hidden">
                {{-- Decorative bg --}}
                <div class="absolute top-0 right-0 w-80 h-80 bg-gradient-to-br from-[#8C51A5]/10 to-[#F8CB62]/5 rounded-full blur-[100px] -z-10 animate-pulse-slow"></div>

                {{-- Calendar Nav --}}
                <div class="flex flex-col sm:flex-row items-center justify-between mb-8 gap-6">
                    <div class="flex items-center gap-4">
                        <h2 id="month-name" class="text-3xl md:text-4xl font-black text-[#612F73] tracking-tight transition-all duration-500">Mei 2026</h2>
                    </div>
                    
                    <div class="flex items-center gap-2 bg-gray-100/50 p-1.5 rounded-[1.5rem] border border-gray-100/80 backdrop-blur-sm shadow-inner">
                        <button id="prev-month" class="w-10 h-10 rounded-[1.2rem] bg-white flex items-center justify-center text-[#612F73] hover:bg-[#612F73] hover:text-white hover:scale-105 transition-all shadow-sm">
                            <i class="fas fa-chevron-left text-xs"></i>
                        </button>
                        <button id="go-today" class="px-5 h-10 rounded-[1.2rem] bg-white border border-gray-100 text-[#612F73] font-black text-[10px] uppercase tracking-widest hover:border-[#8C51A5] hover:text-[#8C51A5] hover:scale-105 transition-all shadow-sm">
                            Hari Ini
                        </button>
                        <button id="next-month" class="w-10 h-10 rounded-[1.2rem] bg-white flex items-center justify-center text-[#612F73] hover:bg-[#612F73] hover:text-white hover:scale-105 transition-all shadow-sm">
                            <i class="fas fa-chevron-right text-xs"></i>
                        </button>
                    </div>
                </div>

                {{-- Calendar Days Header --}}
                <div class="grid grid-cols-7 gap-2 md:gap-4 mb-6 bg-[#F0E7F8]/45 p-2 rounded-2xl border border-[#8C51A5]/05 backdrop-blur-sm select-none">
                    @foreach(['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'] as $day)
                        <div class="text-center py-1">
                            <span class="text-[10px] md:text-xs font-black uppercase tracking-[0.2em] {{ $loop->first ? 'text-rose-500' : 'text-[#612F73]/70' }}">{{ $day }}</span>
                        </div>
                    @endforeach
                </div>

                {{-- Calendar Grid with Slide Effect --}}
                <div class="relative min-h-[240px] md:min-h-[400px]">
                    <div id="calendar-grid" class="grid grid-cols-7 gap-2 md:gap-4 transition-all duration-500 opacity-100 transform translate-x-0 p-1">
                        {{-- Days --}}
                    </div>
                </div>

                {{-- Bottom Accents / Legends --}}
                <div class="mt-10 pt-8 flex flex-wrap items-center justify-center gap-6 md:gap-10 border-t border-gray-100/70 select-none">
                    <div class="flex items-center gap-2.5 px-4 py-2 bg-[#8C51A5]/05 rounded-xl border border-[#8C51A5]/10 shadow-sm">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#8C51A5] shadow-[0_0_6px_#8C51A5] animate-pulse"></span>
                        <span class="text-[9px] md:text-[10px] font-black text-[#612F73] uppercase tracking-widest">Akademik</span>
                    </div>
                    <div class="flex items-center gap-2.5 px-4 py-2 bg-rose-500/05 rounded-xl border border-rose-500/10 shadow-sm">
                        <span class="w-2.5 h-2.5 rounded-full bg-rose-500 shadow-[0_0_6px_#f43f5e] animate-pulse"></span>
                        <span class="text-[9px] md:text-[10px] font-black text-rose-500 uppercase tracking-widest">Libur</span>
                    </div>
                    <div class="flex items-center gap-2.5 px-4 py-2 bg-amber-400/05 rounded-xl border border-amber-400/10 shadow-sm">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400 shadow-[0_0_6px_#fbbf24] animate-pulse"></span>
                        <span class="text-[9px] md:text-[10px] font-black text-amber-500 uppercase tracking-widest">Event</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .day-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        background: rgba(249, 250, 251, 0.5);
        border: 1.5px solid rgba(243, 244, 246, 0.8);
        perspective: 1000px;
    }
    
    .day-card:hover {
        transform: translateY(-6px);
        background: white;
        border-color: rgba(140, 81, 165, 0.3);
        box-shadow: 0 15px 30px -10px rgba(97, 47, 115, 0.12);
        z-index: 20;
    }

    .day-card.has-event {
        background: rgba(255, 255, 255, 0.9);
        border: 1.5px solid rgba(140, 81, 165, 0.12);
        box-shadow: 0 8px 20px -8px rgba(97, 47, 115, 0.05);
    }
    
    .day-card.has-event:hover {
        border-color: rgba(140, 81, 165, 0.35);
        box-shadow: 0 20px 35px -10px rgba(97, 47, 115, 0.14);
    }

    .day-card.is-today {
        background: linear-gradient(135deg, #F8CB62 0%, #f5b82e 100%) !important;
        border: 2px solid white !important;
        color: #612F73 !important;
        box-shadow: 0 12px 25px -8px rgba(248, 203, 98, 0.55), inset 0 2px 4px rgba(255, 255, 255, 0.4);
    }
    
    .day-card.is-today:hover {
        transform: translateY(-8px) scale(1.03);
        box-shadow: 0 18px 35px -8px rgba(248, 203, 98, 0.65), inset 0 2px 4px rgba(255, 255, 255, 0.4);
    }

    .day-card.is-selected {
        background: linear-gradient(135deg, #612F73 0%, #8C51A5 100%) !important;
        border: 2px solid rgba(255, 255, 255, 0.2) !important;
        color: white !important;
        transform: translateY(-8px) scale(1.05);
        box-shadow: 0 20px 40px -10px rgba(97, 47, 115, 0.45);
        z-index: 30;
    }

    .day-card.is-selected::after {
        content: '';
        position: absolute;
        inset: -4px;
        border: 2px solid #8C51A5;
        border-radius: inherit;
        opacity: 0.4;
        pointer-events: none;
    }

    .day-card.is-today span {
        color: #612F73 !important;
    }

    .day-card.is-selected span,
    .day-card.is-selected.is-today span {
        color: white !important;
    }

    .grid-fade-out {
        opacity: 0;
        transform: scale(0.98);
    }

    .grid-fade-in {
        opacity: 1;
        transform: scale(1);
    }

    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
    
    @keyframes pulse-slow {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.6; transform: scale(0.85); }
    }
    .animate-pulse-slow {
        animation: pulse-slow 3s infinite ease-in-out;
    }
</style>

@push('scripts')
<script>
    const CATEGORY_COLORS = @json(\App\Models\Agenda::CATEGORIES);
    const agendas = @json($agendasForJs);
    let currentDate = new Date();

    // Clock
    function updateClock() {
        const now = new Date();
        document.getElementById('live-clock').innerText = now.toLocaleTimeString('id-ID', { hour12: false });
    }
    setInterval(updateClock, 1000);
    updateClock();

    function renderCalendar() {
        const grid = document.getElementById('calendar-grid');
        const monthName = document.getElementById('month-name');
        
        // Animation
        grid.classList.add('grid-fade-out');
        
        setTimeout(() => {
            grid.innerHTML = '';
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();
            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            
            const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
            ];
            
            monthName.innerText = `${monthNames[month]} ${year}`;
            
            for (let i = 0; i < firstDay; i++) {
                grid.appendChild(document.createElement('div'));
            }
            
            for (let day = 1; day <= daysInMonth; day++) {
                const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                const dayEvents = agendas.filter(a => {
                    // 1. Check Multi-Date (Pilih Tanggal Acak)
                    if (a.selected_dates && a.selected_dates.length > 0) {
                        return a.selected_dates.includes(dateStr);
                    }
                    
                    // 2. Check Range (Rentang Waktu)
                    const start = a.event_date;
                    const end = a.end_date || start;
                    return dateStr >= start && dateStr <= end;
                });
                
                const dayEl = document.createElement('div');
                const isToday = new Date().toDateString() === new Date(year, month, day).toDateString();
                
                dayEl.className = `day-card aspect-square rounded-xl md:rounded-[1.2rem] flex flex-col items-center justify-center relative cursor-pointer border transition-all duration-500 ${dayEvents.length > 0 ? 'has-event' : 'hover:bg-white hover:border-gray-200 hover:shadow-xl'}`;
                
                if (isToday) dayEl.classList.add('is-today');

                dayEl.innerHTML = `
                    <span class="text-sm md:text-base font-black ${dayEvents.length > 0 ? 'text-[#612F73]' : (isToday ? 'text-[#612F73]' : 'text-gray-400/70')} transition-colors relative z-10">${day}</span>
                `;
                
                if (dayEvents.length > 0) {
                    const pillContainer = document.createElement('div');
                    pillContainer.className = 'absolute bottom-1 md:bottom-2 left-1/2 -translate-x-1/2 flex items-center justify-center gap-0.5 md:gap-1 z-10 w-full px-1.5';
                    dayEvents.forEach(e => {
                        const pill = document.createElement('div');
                        pill.className = 'h-[3px] md:h-1 rounded-full transition-all duration-300 shrink-0';
                        if (dayEvents.length === 1) {
                            pill.className += ' w-5 md:w-8';
                        } else {
                            pill.className += ' w-2.5 md:w-4';
                        }
                        pill.style.backgroundColor = e.color || '#8C51A5';
                        pill.style.boxShadow = `0 1px 6px ${(e.color || '#8C51A5')}80`;
                        pillContainer.appendChild(pill);
                    });
                    dayEl.appendChild(pillContainer);

                    if (!isToday) {
                        const primaryColor = dayEvents[0].color || '#8C51A5';
                        dayEl.style.borderColor = `${primaryColor}40`;
                        dayEl.style.background = `linear-gradient(135deg, rgba(255,255,255,0.95) 0%, ${primaryColor}12 100%)`;
                    }
                }

                dayEl.onclick = (e) => {
                    e.stopPropagation();
                    
                    // Remove existing tooltips
                    document.querySelectorAll('.ig-note-tooltip').forEach(t => t.remove());
                    document.querySelectorAll('.day-card').forEach(c => {
                        c.classList.remove('is-selected');
                    });
                    
                    if (dayEvents.length === 0) return;

                    dayEl.classList.add('is-selected');

                    const tooltip = document.createElement('div');
                    tooltip.className = `ig-note-tooltip absolute w-64 md:w-72 bg-white rounded-[2rem] p-4 shadow-[0_20px_50px_-12px_rgba(0,0,0,0.3)] border border-gray-100 z-[9999] opacity-0 transition-all duration-300 pointer-events-auto`;
                    
                    // Prevent clicks inside tooltip from closing it
                    tooltip.onclick = (ev) => ev.stopPropagation();
                    
                    let html = '<div class="space-y-3 relative z-10 max-h-[300px] overflow-y-auto custom-scrollbar pr-2">';
                    
                    html += `
                        <div class="flex justify-between items-center mb-1 px-1">
                            <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">${day} ${monthNames[month]} ${year}</span>
                            <button onclick="this.closest('.ig-note-tooltip').remove(); document.querySelector('.day-card.is-selected')?.classList.remove('is-selected'); event.stopPropagation();" class="text-gray-300 hover:text-red-400 transition-colors w-6 h-6 flex items-center justify-center rounded-full hover:bg-red-50"><i class="fas fa-times"></i></button>
                        </div>
                    `;

                    dayEvents.forEach(ev => {
                        const catInfo = CATEGORY_COLORS[ev.category] || { label: ev.label, color: '#8C51A5', icon: 'fas fa-calendar' };
                        html += `
                            <div class="flex items-start gap-3 bg-gray-50/50 p-3 rounded-[1.2rem] border border-gray-100 hover:border-gray-200 hover:bg-white transition-colors shadow-sm">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center text-white shadow-md shrink-0 mt-0.5" style="background-color: ${catInfo.color}">
                                    <i class="${catInfo.icon} text-[10px]"></i>
                                </div>
                                <div class="flex-grow text-left">
                                    <div class="flex flex-wrap items-center gap-1.5 mb-1.5">
                                        <span class="text-[8px] font-black uppercase tracking-widest px-1.5 py-0.5 rounded text-white" style="background-color: ${catInfo.color}">${catInfo.label}</span>
                                        ${ev.selected_dates && ev.selected_dates.length > 0 ? '<span class="text-[8px] text-gray-400 font-bold italic"><i class="fas fa-random mr-1"></i>Acak</span>' : ''}
                                    </div>
                                    <h4 class="font-bold text-[#612F73] text-xs leading-tight">${ev.title}</h4>
                                    ${ev.description ? `<p class="text-[10px] text-gray-500 mt-1 line-clamp-2 leading-relaxed">${ev.description}</p>` : ''}
                                </div>
                            </div>
                        `;
                    });
                    html += '</div>';
                    
                    const tail = document.createElement('div');
                    tail.className = `absolute w-5 h-5 bg-white border-b border-r border-gray-100 transform rotate-45 rounded-br-sm pointer-events-none`;
                    tooltip.appendChild(tail);

                    const content = document.createElement('div');
                    content.innerHTML = html;
                    tooltip.appendChild(content);

                    // Append to body to avoid clipping and stacking context issues
                    document.body.appendChild(tooltip);

                    // Precise Positioning Logic
                    const rect = dayEl.getBoundingClientRect();
                    const ttRect = tooltip.getBoundingClientRect();
                    const scrollY = window.scrollY || window.pageYOffset;
                    const scrollX = window.scrollX || window.pageXOffset;

                    let left = rect.left + scrollX + (rect.width / 2) - (ttRect.width / 2);
                    const margin = 20;
                    let tailLeft = ttRect.width / 2;

                    // Ensure tooltip doesn't go off-screen horizontally
                    if (left < margin) {
                        const shift = margin - left;
                        left = margin;
                        tailLeft -= shift;
                    } else if (left + ttRect.width > window.innerWidth + scrollX - margin) {
                        const shift = (left + ttRect.width) - (window.innerWidth + scrollX - margin);
                        left = window.innerWidth + scrollX - margin - ttRect.width;
                        tailLeft += shift;
                    }

                    let isAbove = true;
                    let top = rect.top + scrollY - ttRect.height - 15;
                    
                    // If no space above, put below
                    if (rect.top - ttRect.height - 15 < 0) {
                        top = rect.bottom + scrollY + 15;
                        isAbove = false;
                    }

                    tooltip.style.left = `${left}px`;
                    tooltip.style.top = `${top}px`;

                    tail.style.left = `${tailLeft}px`;
                    tail.style.marginLeft = '-10px';
                    if (isAbove) {
                        tail.style.bottom = '-10px';
                    } else {
                        tail.style.top = '-10px';
                        tail.style.transform = 'rotate(225deg)';
                    }

                    tooltip.style.transform = isAbove ? 'translateY(10px) scale(0.95)' : 'translateY(-10px) scale(0.95)';
                    
                    requestAnimationFrame(() => {
                        tooltip.classList.remove('opacity-0');
                        tooltip.style.transform = 'translateY(0) scale(1)';
                    });
                };
                
                grid.appendChild(dayEl);
            }
            
            grid.classList.remove('grid-fade-out');
            grid.classList.add('grid-fade-in');
        }, 300);
    }

    // Global click listener to close tooltips
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.day-card')) {
            document.querySelectorAll('.ig-note-tooltip').forEach(t => t.remove());
            document.querySelectorAll('.day-card').forEach(c => {
                c.classList.remove('is-selected');
            });
        }
    });

    // Close on window resize to prevent floating misalignments
    window.addEventListener('resize', () => {
        document.querySelectorAll('.ig-note-tooltip').forEach(t => t.remove());
        document.querySelectorAll('.day-card').forEach(c => c.classList.remove('is-selected'));
    });

    document.getElementById('prev-month').onclick = () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
    };

    document.getElementById('next-month').onclick = () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
    };

    document.getElementById('go-today').onclick = () => {
        currentDate = new Date();
        renderCalendar();
    };

    renderCalendar();
</script>
@endpush
@endsection
