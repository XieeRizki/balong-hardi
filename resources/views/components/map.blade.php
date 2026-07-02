{{--
    Map section (redirect ke Google Maps, sesuai keputusan gak pake embed).
    Nerima $location (Model Location: address + maps_url).
--}}
@props(['location'])

@if ($location)
    <section class="h-96 md:h-[500px] bg-gray-300 relative overflow-hidden">
        <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?w=1200&h=600&fit=crop"
             alt="Peta Lokasi Balong Hardi"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-black to-transparent opacity-40"></div>
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center z-10 px-4">
                <svg class="w-20 h-20 text-white mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <p class="text-white font-bold text-lg drop-shadow-lg">Lokasi Balong Hardi</p>
                <p class="text-white text-opacity-90 text-sm drop-shadow-lg">{{ $location->address }}</p>

                @if ($location->maps_url)
                    <a href="{{ $location->maps_url }}" target="_blank" rel="noopener"
                       class="inline-block mt-4 px-6 py-3 bg-white text-primary font-bold rounded-xl hover:bg-opacity-90 transition-all duration-300 shadow-lg">
                        Buka di Maps
                    </a>
                @endif
            </div>
        </div>
    </section>
@endif
