{{--
    Mobile menu (slide-in dari kanan). Sama kayak navbar, WA number & jam
    operasional diambil dari $contact, gak hardcode lagi.
--}}
@php
    $contact = $contact ?? \App\Models\Contact::first();
    $waNumber = $contact->whatsapp ?? '6281234567890';
@endphp

<div id="mobileMenu" class="mobile-menu">
    <!-- Close Button -->
    <div class="flex items-center justify-between p-6 border-b border-gray-100">
        <h2 class="text-xl font-bold text-secondary">MENU</h2>
        <button id="closeMenuBtn" class="p-2 hover:bg-gray-100 rounded-lg transition-colors duration-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                    'Tentang Kami' => route('home') . '#tentang',
                    'Fasilitas' => route('home') . '#fasilitas',
                    'Harga' => route('home') . '#harga',
                    'Testimoni' => route('home') . '#testimoni',
                    'Blog' => route('home') . '#blog',
                    'Kontak' => route('home') . '#kontak',
                ];
            @endphp
            @foreach ($mobileLinks as $label => $url)
                <a href="{{ $url }}" class="block px-6 py-3 text-gray-700 font-medium hover:bg-gray-50 transition-colors duration-300">
                    {{ $label }}
                </a>
            @endforeach
        </nav>
    </div>

    <!-- CTA Section -->
    <div class="p-6 border-t border-gray-100 mt-6">
        <p class="text-sm font-bold text-gray-700 mb-3">Ingin Memancing?</p>
        <p class="text-sm text-gray-600 mb-6 leading-relaxed">
            Datang ke Balong Hardi untuk pengalaman memancing terbaik dengan fasilitas lengkap dan aman.
        </p>
        <x-button href="https://wa.me/{{ $waNumber }}" variant="primary" icon="whatsapp" class="w-full mb-3">
            Hubungi Sekarang
        </x-button>
        <x-button href="https://wa.me/{{ $waNumber }}" variant="outline" icon="whatsapp" class="w-full">
            Chat WhatsApp
        </x-button>
    </div>

    <!-- Footer Info -->
    <div class="p-6 border-t border-gray-100 mt-6 text-center text-xs text-gray-500">
        <p class="font-medium">{{ $contact->operational_hours ?? 'Buka Setiap Hari' }}</p>
        <p class="mt-2 font-bold text-gray-700">Balong Hardi Sumedang</p>
    </div>
</div>