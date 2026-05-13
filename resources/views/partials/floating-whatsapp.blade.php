@if(($settings['whatsapp_floating_active'] ?? false) && ($settings['school_phone'] ?? false))
    @php
        $waNumber = preg_replace('/[^0-9]/', '', $settings['school_phone']);
        if (str_starts_with($waNumber, '0')) {
            $waNumber = '62' . substr($waNumber, 1);
        }
        $waMessage = rawurlencode($settings['whatsapp_message'] ?? 'Halo Admin, saya ingin bertanya tentang layanan sekolah...');
    @endphp
    
    <div class="fixed bottom-8 right-8 z-[9999]">
        {{-- Floating Button --}}
        <a href="https://wa.me/{{ $waNumber }}?text={{ $waMessage }}" 
           target="_blank"
           id="whatsapp-floating-btn"
           class="group relative flex items-center justify-center w-16 h-16 bg-[#25D366] text-white rounded-full shadow-2xl hover:bg-[#128C7E] transition-all duration-500 hover:-translate-y-2 hover:scale-110">
            
            {{-- Pulse Effect --}}
            <span class="absolute inset-0 rounded-full bg-[#25D366] animate-ping opacity-20 group-hover:opacity-0"></span>
            
            {{-- Tooltip/Label (Hidden by default, shown on hover or can be toggled) --}}
            <div class="absolute right-full mr-4 px-4 py-2 bg-white text-[#612F73] text-xs font-black rounded-xl shadow-xl opacity-0 group-hover:opacity-100 translate-x-4 group-hover:translate-x-0 transition-all duration-500 whitespace-nowrap pointer-events-none border border-[#F0E7F8]">
                Hubungi Kami di WhatsApp
                <div class="absolute top-1/2 -right-1 -translate-y-1/2 w-2 h-2 bg-white rotate-45 border-r border-t border-[#F0E7F8]"></div>
            </div>

            {{-- Icon --}}
            <i class="fab fa-whatsapp text-3xl"></i>
        </a>
    </div>

    <style>
        #whatsapp-floating-btn {
            box-shadow: 0 10px 25px -5px rgba(37, 211, 102, 0.4), 0 8px 10px -6px rgba(37, 211, 102, 0.4);
        }
        #whatsapp-floating-btn:hover {
            box-shadow: 0 20px 35px -5px rgba(18, 140, 126, 0.5), 0 10px 15px -6px rgba(18, 140, 126, 0.5);
        }
    </style>
@endif
