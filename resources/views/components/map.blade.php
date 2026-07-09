{{--
    Map section — hardcoded (bukan dari database, karena lokasi cuma 1
    dan gak perlu di-setting ulang dari admin).

    Peta beneran (embed Google Maps), TAPI dibikin non-interaktif:
    - iframe-nya "dikunci" (pointer-events: none) biar gak bisa di-drag/zoom
    - Ada lapisan transparan di atasnya yang nangkep klik, terus redirect
      ke link Google Maps asli di tab baru.
--}}

<section class="relative h-96 md:h-[500px] overflow-hidden">
    <iframe
        src="https://www.google.com/maps?q=Balong+Hardi+Sumedang&output=embed"
        class="absolute inset-0 w-full h-full pointer-events-none grayscale-[15%]"
        style="border:0;"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        title="Lokasi Balong Hardi Sumedang">
    </iframe>

    {{-- Overlay transparan: nangkep semua klik, redirect ke Maps asli --}}
    <a href="https://maps.app.goo.gl/HApwsDwtXbhrTFGQ9" target="_blank" rel="noopener"
       class="absolute inset-0 z-10 flex items-end justify-center pb-8 group"
       aria-label="Buka lokasi Balong Hardi Sumedang di Google Maps">

        {{-- Sedikit gradasi gelap di bawah biar label kebaca jelas di atas peta --}}
        <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-black/50 to-transparent pointer-events-none"></div>

        <span class="relative inline-flex items-center gap-2 px-6 py-3 bg-white text-secondary font-bold rounded-xl shadow-lg group-hover:bg-primary group-hover:text-white transition-all duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Buka di Google Maps
        </span>
    </a>
</section>