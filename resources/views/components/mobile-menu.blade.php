{{--
    Mobile menu (slide-in dari kanan). Sama kayak navbar, WA number & jam
    operasional diambil dari $contact, gak hardcode lagi.

    UPDATE: background abu, tombol CTA ijo gelap.
--}}
@php
    $contact = $contact ?? \App\Models\Contact::first();
    $waNumber = $contact->whatsapp ?? '6281234567890';
@endphp

<div id="mobileMenu" class="mobile-menu bg-gray-100">
    <!-- Close Button -->
    <div class="flex items-center justify-between p-6 border-b border-gray-200">
        <h2 class="text-xl font-bold text-secondary">MENU</h2>
        <button id="closeMenuBtn" class="p-2 hover:bg-gray-200 rounded-lg transition-colors duration-300">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Navigation -->
    <div class="py-6">
        <p class="px-6 py-2 text-xs font-bold text-gray-500 uppercase tracking-wider">Navigasi</p>

        <nav class="space-y-1">
            @php
                $mobileLinks = [
                    'Home' => route('home'),
                    'Tentang Kami' => route('about'),
                    'Fasilitas' => route('facilities'),
                    'Harga' => route('pricing'),
                    'Testimoni' => route('testimonials'),
                    'Blog' => route('blog.index'),
                    'Kontak' => route('contact'),
                ];
            @endphp
            @foreach ($mobileLinks as $label => $url)
                <a href="{{ $url }}" class="block px-6 py-3 text-gray-700 font-medium hover:bg-gray-200 transition-colors duration-300">
                    {{ $label }}
                </a>
            @endforeach
        </nav>
    </div>

    <!-- CTA Section -->
    <div class="p-6 border-t border-gray-200 mt-6">
        <p class="text-sm font-bold text-gray-700 mb-3">Ingin Memancing?</p>
        <p class="text-sm text-gray-600 mb-6 leading-relaxed">
            Datang ke Balong Hardi untuk pengalaman memancing terbaik dengan fasilitas lengkap dan aman.
        </p>
        <a href="{{ route('home') }}#kontak"
           class="w-full mb-3 inline-flex items-center justify-center gap-2 py-3 rounded-xl font-semibold text-white bg-green-800 hover:bg-green-900 shadow-lg transition-colors duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
            </svg>
            Isi Form Reservasi
        </a>
        <!-- <a href="https://wa.me/{{ $waNumber }}"
           target="_blank"
           class="w-full inline-flex items-center justify-center gap-2 py-3 rounded-xl font-semibold text-green-800 border border-green-800 hover:bg-green-50 transition-colors duration-300">
            Chat WhatsApp
        </a> -->
    </div>

    <!-- Footer Info -->
    <div class="p-6 border-t border-gray-200 mt-6 text-center text-xs text-gray-500">
        <p class="font-medium">{{ $contact->operational_hours ?? 'Buka Setiap Hari' }}</p>
        <p class="mt-2 font-bold text-gray-700">Balong Hardi Sumedang</p>
    </div>
</div>