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
                    'Harga' => route('home') . '#harga',
                    'Testimoni' => route('home') . '#testimoni',
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
        <a href="https://wa.me/{{ $waNumber }}"
           target="_blank"
           class="w-full mb-3 inline-flex items-center justify-center gap-2 py-3 rounded-xl font-semibold text-white bg-green-800 hover:bg-green-900 shadow-lg transition-colors duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.263.489 1.694.625.712.227 1.36.195 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                <path d="M12.004 2c-5.514 0-9.997 4.483-9.997 9.997 0 1.762.464 3.484 1.345 4.997L2 22l5.13-1.345a9.96 9.96 0 0 0 4.874 1.24h.005c5.514 0 9.997-4.483 9.997-9.997 0-2.67-1.04-5.18-2.93-7.07A9.938 9.938 0 0 0 12.004 2zm0 18.164h-.004a8.16 8.16 0 0 1-4.156-1.14l-.298-.177-3.043.798.812-2.968-.194-.305a8.166 8.166 0 0 1-1.253-4.375c0-4.514 3.674-8.188 8.192-8.188 2.187 0 4.243.853 5.79 2.402a8.13 8.13 0 0 1 2.397 5.792c0 4.514-3.674 8.161-8.243 8.161z"/>
            </svg>
            Hubungi Sekarang
        </a>
        <a href="https://wa.me/{{ $waNumber }}"
           target="_blank"
           class="w-full inline-flex items-center justify-center gap-2 py-3 rounded-xl font-semibold text-green-800 border border-green-800 hover:bg-green-50 transition-colors duration-300">
            Chat WhatsApp
        </a>
    </div>

    <!-- Footer Info -->
    <div class="p-6 border-t border-gray-200 mt-6 text-center text-xs text-gray-500">
        <p class="font-medium">{{ $contact->operational_hours ?? 'Buka Setiap Hari' }}</p>
        <p class="mt-2 font-bold text-gray-700">Balong Hardi Sumedang</p>
    </div>
</div>