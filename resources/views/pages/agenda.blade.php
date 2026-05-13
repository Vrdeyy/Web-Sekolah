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

        <div class="grid grid-cols-1 xl:grid-cols-12 gap-10">
            {{-- Calendar Controller --}}
            <div class="xl:col-span-7">
                <div class="bg-white rounded-[2rem] shadow-premium-lg border border-gray-100 p-5 md:p-6 relative">
                    {{-- Calendar Nav --}}
                    <div class="flex flex-col md:flex-row items-center justify-between mb-6 gap-4">
                        <div class="flex items-center gap-3">
                            <h2 id="month-name" class="text-xl md:text-2xl font-black text-[#612F73] transition-all duration-500">Mei 2026</h2>
                        </div>
                        
                        <div class="flex items-center gap-2 bg-gray-50 p-1 rounded-[1.2rem] border border-gray-100">
                            <button id="prev-month" class="w-8 h-8 rounded-full flex items-center justify-center text-[#612F73] hover:bg-[#612F73] hover:text-white transition-all shadow-sm">
                                <i class="fas fa-arrow-left text-[10px]"></i>
                            </button>
                            <button id="go-today" class="px-3 h-8 rounded-full bg-white border border-gray-100 text-[#612F73] font-black text-[8px] uppercase tracking-widest hover:border-[#8C51A5] hover:text-[#8C51A5] transition-all shadow-sm">
                                Hari Ini
                            </button>
                            <button id="next-month" class="w-8 h-8 rounded-full flex items-center justify-center text-[#612F73] hover:bg-[#612F73] hover:text-white transition-all shadow-sm">
                                <i class="fas fa-arrow-right text-[10px]"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Calendar Header --}}
                    <div class="grid grid-cols-7 gap-4 mb-8">
                        @foreach(['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'] as $day)
                            <div class="text-center">
                                <span class="text-[10px] font-black uppercase tracking-[0.2em] {{ $loop->first ? 'text-red-400' : 'text-gray-400' }}">{{ $day }}</span>
                            </div>
                        @endforeach
                    </div>

                    {{-- Calendar Grid with Slide Effect --}}
                    <div class="relative min-h-[300px]">
                        <div id="calendar-grid" class="grid grid-cols-7 gap-1.5 md:gap-2 transition-all duration-500 opacity-100 transform translate-x-0 p-1">
                            {{-- Days --}}
                        </div>
                    </div>

                    {{-- Bottom Accents --}}
                    <div class="mt-6 flex items-center justify-center gap-6 py-4 border-t border-gray-50">
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 rounded-full bg-[#8C51A5] shadow-lg shadow-[#8C51A5]/20"></div>
                            <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Akademik</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 rounded-full bg-red-500 shadow-lg shadow-red-500/20"></div>
                            <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Libur</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 rounded-full bg-amber-400 shadow-lg shadow-amber-400/20"></div>
                            <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Event</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Detail Panel --}}
            <div class="xl:col-span-5 flex flex-col gap-6">
                {{-- Focus Card --}}
                <div class="bg-[#612F73] rounded-[2.5rem] p-8 pb-10 text-white shadow-2xl relative overflow-hidden group min-h-[400px] flex flex-col">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full blur-3xl -mr-32 -mt-32"></div>
                    
                    <div class="relative z-10 flex-grow flex flex-col">
                        <div class="mb-8">
                            <h3 id="selected-date-title" class="text-2xl font-black mb-1">Pilih Tanggal</h3>
                            <p id="selected-date-subtitle" class="text-white/50 text-xs font-medium">Klik pada kalender</p>
                        </div>

                        <div id="event-list" class="space-y-3 flex-grow mb-6">
                            <div class="py-4 flex flex-col items-center justify-center text-center h-full">
                                <div class="w-16 h-16 rounded-2xl bg-white/10 flex items-center justify-center mb-4 backdrop-blur-md border border-white/10">
                                    <i class="fas fa-fingerprint text-2xl text-[#F8CB62]"></i>
                                </div>
                                <p class="text-xs font-medium text-white/40 max-w-[180px]">Pilih tanggal untuk melihat daftar agenda sekolah.</p>
                            </div>
                        </div>

                        <div class="mt-auto pt-6 border-t border-white/10">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-info-circle text-[#F8CB62] text-sm"></i>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-[9px] font-black text-white/40 uppercase tracking-widest">Bantuan</p>
                                    <p class="text-[10px] font-medium opacity-80 leading-tight truncate-none">Hubungi Admin jika ada jadwal yang belum update.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Premium Illustration/Decor Card --}}
                <div class="relative group h-full">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#612F73] via-[#8C51A5] to-[#612F73] rounded-[2.5rem] blur-xl opacity-20 group-hover:opacity-40 transition-opacity duration-700"></div>
                    <div class="bg-white rounded-[2.5rem] p-8 shadow-premium border border-gray-100 flex flex-col items-center justify-center text-center overflow-hidden relative h-full">
                        {{-- Decorative Elements --}}
                        <div class="absolute -top-10 -right-10 w-40 h-40 bg-[#F8CB62]/10 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-1000"></div>
                        <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-[#8C51A5]/10 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-1000"></div>
                        
                        <div class="relative z-10 flex flex-col items-center">
                            <div class="relative mb-8">
                                {{-- Floating Rings --}}
                                <div class="absolute inset-0 rounded-full border-2 border-dashed border-[#F8CB62]/30 animate-[spin_10s_linear_infinite]"></div>
                                <div class="absolute -inset-4 rounded-full border border-[#8C51A5]/20 animate-[spin_15s_linear_infinite_reverse]"></div>
                                
                                <div class="w-28 h-28 bg-gradient-to-tr from-[#612F73] to-[#8C51A5] rounded-[2.2rem] flex items-center justify-center relative shadow-2xl transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
                                    <div class="absolute inset-0 bg-white/20 rounded-[2.2rem] backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                    <i class="fas fa-calendar-check text-5xl text-[#F8CB62] drop-shadow-[0_4px_12px_rgba(248,203,98,0.5)]"></i>
                                </div>
                            </div>

                            <div class="space-y-3 max-w-[280px]">
                                <h4 class="text-3xl font-black bg-gradient-to-r from-[#612F73] to-[#8C51A5] bg-clip-text text-transparent leading-tight">
                                    Pantau <span class="text-[#F8CB62]">Terus!</span>
                                </h4>
                                <div class="w-12 h-1 bg-gradient-to-r from-[#F8CB62] to-transparent mx-auto rounded-full"></div>
                                <p class="text-gray-500 text-xs font-semibold leading-relaxed px-4">
                                    Dapatkan informasi terkini mengenai jadwal ujian, hari libur, dan event seru sekolah.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .day-card {
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        perspective: 1000px;
    }
    
    .day-card:hover {
        transform: translateY(-8px) scale(1.05);
        z-index: 20;
    }

    .day-card.has-event {
        background: white;
        border-color: rgba(97, 47, 115, 0.1);
        box-shadow: 0 15px 35px -10px rgba(97, 47, 115, 0.08);
    }

    .day-card.is-today {
        background: #F8CB62;
        border-color: #F8CB62;
        color: #612F73 !important;
        box-shadow: 0 20px 40px -10px rgba(248, 203, 98, 0.4);
    }

    .day-card.is-selected {
        background: #612F73 !important;
        border-color: #612F73 !important;
        color: white !important;
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 25px 50px -12px rgba(97, 47, 115, 0.4);
    }

    .day-card.is-today span {
        color: #612F73 !important;
    }

    .day-card.is-selected span,
    .day-card.is-selected.is-today span {
        color: white !important;
    }

    .event-node {
        transition: all 0.4s ease;
        animation: slideIn 0.5s ease forwards;
    }

    @keyframes slideIn {
        from { opacity: 0; transform: translateX(20px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .grid-fade-out {
        opacity: 0;
        transform: scale(0.95);
    }

    .grid-fade-in {
        opacity: 1;
        transform: scale(1);
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
                
                dayEl.className = `day-card aspect-square rounded-[1rem] flex flex-col items-center justify-center relative cursor-pointer border-2 border-transparent transition-all duration-500 ${dayEvents.length > 0 ? 'has-event' : 'bg-gray-50/50 hover:bg-white hover:border-gray-100 hover:shadow-xl'}`;
                
                if (isToday) dayEl.classList.add('is-today');

                dayEl.innerHTML = `
                    <span class="text-base font-black ${dayEvents.length > 0 ? (isToday ? 'text-[#612F73]' : 'text-[#612F73]') : (isToday ? 'text-[#612F73]' : 'text-gray-300')} transition-colors">${day}</span>
                `;
                
                if (dayEvents.length > 0) {
                    const barContainer = document.createElement('div');
                    barContainer.className = 'absolute bottom-0 left-0 right-0 h-1.5 flex overflow-hidden rounded-b-[1.5rem]';
                    dayEvents.forEach(e => {
                        const bar = document.createElement('div');
                        bar.className = 'flex-1 h-full opacity-80 shadow-inner';
                        bar.style.backgroundColor = e.color || '#8C51A5';
                        barContainer.appendChild(bar);
                    });
                    dayEl.appendChild(barContainer);
                }

                dayEl.onclick = () => {
                    document.querySelectorAll('.day-card').forEach(c => c.classList.remove('is-selected'));
                    dayEl.classList.add('is-selected');
                    showDetail(dayEvents, day, monthNames[month], year);

                    // Auto-scroll on Mobile/Tablet
                    if (window.innerWidth < 1280) {
                        const detailPanel = document.getElementById('selected-date-title');
                        if (detailPanel) {
                            detailPanel.scrollIntoView({ 
                                behavior: 'smooth', 
                                block: 'center' 
                            });
                        }
                    }
                };
                
                grid.appendChild(dayEl);
            }
            
            grid.classList.remove('grid-fade-out');
            grid.classList.add('grid-fade-in');
        }, 300);
    }

    function showDetail(events, day, month, year) {
        const title = document.getElementById('selected-date-title');
        const subtitle = document.getElementById('selected-date-subtitle');
        const list = document.getElementById('event-list');
        
        title.innerText = `${day} ${month}`;
        subtitle.innerText = year;
        
        if (events.length === 0) {
            list.innerHTML = `
                <div class="py-12 flex flex-col items-center justify-center text-center animate-event">
                    <div class="w-20 h-20 rounded-3xl bg-white/5 flex items-center justify-center mb-6 backdrop-blur-md border border-white/10">
                        <i class="far fa-calendar-times text-3xl text-white/20"></i>
                    </div>
                    <p class="text-sm font-medium text-white/40">Tidak ada agenda khusus pada tanggal ini.</p>
                </div>
            `;
            return;
        }

        let html = '';
        events.forEach((e, i) => {
            const catInfo = CATEGORY_COLORS[e.category] || { label: e.label, color: '#8C51A5', icon: 'fas fa-calendar' };
            html += `
                <div class="bg-white/10 backdrop-blur-md p-6 rounded-[2rem] border border-white/10 event-node" style="animation-delay: ${i * 0.1}s">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white shadow-lg shrink-0" style="background-color: ${catInfo.color}">
                            <i class="${catInfo.icon} text-xs"></i>
                        </div>
                        <div>
                            <span class="text-[9px] font-black uppercase tracking-widest" style="color: ${catInfo.color}">${catInfo.label}</span>
                            <h4 class="font-black text-white leading-tight">${e.title}</h4>
                            ${e.selected_dates && e.selected_dates.length > 0 
                                ? `<p class="text-[8px] text-white/40 mt-1 font-bold italic">Multiple Dates Selected</p>`
                                : (e.end_date && e.end_date !== e.event_date 
                                    ? `<p class="text-[8px] text-white/40 mt-1 font-bold italic underline">Range: ${new Date(e.event_date).toLocaleDateString('id-ID', {day: 'numeric', month: 'short'})} - ${new Date(e.end_date).toLocaleDateString('id-ID', {day: 'numeric', month: 'short', year: 'numeric'})}</p>` 
                                    : ''
                                )
                            }
                        </div>
                    </div>
                    <p class="text-xs text-white/60 leading-relaxed pl-14">${e.description || 'Kegiatan akademik sekolah.'}</p>
                </div>
            `;
        });
        list.innerHTML = html;
    }

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
