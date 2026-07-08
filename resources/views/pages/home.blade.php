@extends('layouts.app')

@section('title', 'Home - Balong Hardi Sumedang | Tempat Pemancingan Terbaik')

@section('content')

    {{-- Hero, About, dan Map sudah full komponen, tinggal lempar data dari HomeController --}}
    <x-hero :hero="$hero" />
    <x-about :about="$about" />

    {{-- Fasilitas: section masih di sini, tapi tiap card sudah pakai <x-facility-card> --}}
    @if ($facilities->isNotEmpty())
        <section id="fasilitas" class="py-20 md:py-32 bg-light">
            <div class="container-max">
                <x-section-title
                    badge="Fasilitas Kami"
                    title="Lengkap & Nyaman"
                    subtitle="Semua yang Anda butuhkan untuk pengalaman memancing yang maksimal"
                />

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($facilities as $facility)
                        <x-facility-card :facility="$facility" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Harga / Paket --}}
    @if ($packages->isNotEmpty())
        <section id="harga" class="py-20 md:py-32 bg-white">
            <div class="container-max">
                <x-section-title
                    badge="Paket & Harga"
                    title="Paket Terjangkau"
                    subtitle="Pilih paket yang sesuai dengan kebutuhan dan budget Anda"
                />

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto mb-12">
                    @foreach ($packages as $package)
                        <div class="card-modern p-8 flex flex-col relative {{ $package->is_popular ? 'ring-2 ring-primary shadow-2xl md:scale-105' : '' }}">
                            @if ($package->is_popular)
                                <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-primary text-white px-4 py-1.5 rounded-full text-sm font-bold">
                                    Paling Populer
                                </div>
                            @endif

                            <h3 class="text-2xl font-bold text-secondary mb-2 {{ $package->is_popular ? 'mt-2' : '' }}">
                                {{ $package->name }}
                            </h3>
                            <p class="text-gray-600 text-sm mb-6">{{ $package->time_range }}</p>
                            <p class="text-5xl font-bold text-primary mb-8">
                                {{ $package->formatted_price }} <span class="text-lg text-gray-600">/orang</span>
                            </p>

                            @if ($package->features->isNotEmpty())
                                <ul class="space-y-4 mb-auto">
                                    @foreach ($package->features as $feature)
                                        <li class="flex items-start space-x-3">
                                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-gray-600 font-medium">{{ $feature->feature }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            <x-button
                                href="https://wa.me/{{ $contact->whatsapp ?? '' }}?text={{ urlencode('Halo, saya mau tanya soal ' . $package->name) }}"
                                variant="{{ $package->is_popular ? 'primary' : 'outline' }}"
                                icon="whatsapp"
                                class="w-full mt-8"
                            >
                                Pesan Sekarang
                            </x-button>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Testimoni --}}
    @if ($testimonials->isNotEmpty())
        <section id="testimoni" class="py-20 md:py-32 bg-light">
            <div class="container-max">
                <x-section-title
                    badge="Testimoni"
                    title="Pengalaman Pengunjung"
                    subtitle="Dengarkan cerita dari pengunjung setia Balong Hardi"
                />

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($testimonials as $testimonial)
                        <div class="card-modern p-8">
                            <div class="flex items-center mb-4 space-x-1">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="w-5 h-5 {{ $i < $testimonial->rating ? 'text-yellow-400' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.92-.755 1.678-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.56-1.84-.198-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                            <p class="text-gray-700 mb-6 leading-relaxed italic">&ldquo;{{ $testimonial->message }}&rdquo;</p>
                            <div class="flex items-center space-x-3">
                                @if ($testimonial->avatar)
                                    <img src="{{ asset('storage/' . $testimonial->avatar) }}"
                                         alt="{{ $testimonial->name }}"
                                         class="w-12 h-12 rounded-full object-cover">
                                @endif
                                <div>
                                    <p class="font-bold text-secondary">{{ $testimonial->name }}</p>
                                    @if ($testimonial->city)
                                        <p class="text-sm text-gray-600">{{ $testimonial->city }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Blog --}}
    @if ($blogPosts->isNotEmpty())
        <section id="blog" class="py-20 md:py-32 bg-white">
            <div class="container-max">
                <x-section-title
                    badge="Blog & Tips"
                    title="Tips & Artikel Memancing"
                    subtitle="Pelajari tips memancing, teknik, dan cerita menarik dari para penggemar memancing"
                />

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($blogPosts as $post)
                        <div class="card-modern overflow-hidden group">
                            <div class="relative h-48 overflow-hidden bg-gray-200">
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}"
                                         alt="{{ $post->title }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-30"></div>
                            </div>
                            <div class="p-6">
                                @if ($post->category)
                                    <p class="text-sm text-primary font-bold mb-3 uppercase tracking-wider">{{ $post->category }}</p>
                                @endif
                                <h3 class="text-xl font-bold text-secondary mb-3 group-hover:text-primary transition-colors duration-300">
                                    {{ $post->title }}
                                </h3>
                                @if ($post->excerpt)
                                    <p class="text-gray-600 text-sm mb-4 leading-relaxed">{{ $post->excerpt }}</p>
                                @endif
                                <a href="{{ route('blog.show', $post) }}" class="text-primary font-bold flex items-center space-x-2 hover:space-x-3 transition-all duration-300">
                                    <span>Baca Selengkapnya</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Kontak (form reservasi + info + map) --}}
    <section id="kontak" class="py-20 md:py-32 bg-white">
        <div class="container-max">
            <x-section-title
                badge="Reservasi Sekarang"
                title="Ajukan Permintaan Reservasi"
                subtitle="Isi form di bawah untuk melakukan reservasi memancing di Balong Hardi Sumedang"
            />

            {{-- Form Reservasi - Simplified --}}
            <div class="bg-light rounded-2xl p-5 md:p-8 border border-gray-200 mb-12">
                <form id="waContactForm" class="space-y-3">
                    {{-- Row 1: Nama & Tanggal --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-secondary mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" id="waName" required placeholder="Nama Anda"
                                   class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-opacity-20 transition-all duration-200 font-medium">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-secondary mb-1">Tanggal Reservasi <span class="text-red-500">*</span></label>
                            <input type="date" id="waDate" required min="{{ now()->format('Y-m-d') }}"
                                   class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-opacity-20 transition-all duration-200 font-medium">
                        </div>
                    </div>

                    {{-- Row 2: Jumlah Orang & Paket --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-secondary mb-1">Jumlah Orang <span class="text-red-500">*</span></label>
                            <input type="number" id="waGuests" min="1" value="1" required
                                   class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-opacity-20 transition-all duration-200 font-medium">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-secondary mb-1">Jenis Paket <span class="text-red-500">*</span></label>
                            <select id="waPackage" required
                                    class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-opacity-20 transition-all duration-200 font-medium">
                                <option value="">-- Pilih paket --</option>
                                @foreach ($packages as $package)
                                    <option value="{{ $package->name }} ({{ $package->formatted_price }})">{{ $package->name }} - {{ $package->formatted_price }} /orang</option>
                                @endforeach
                                <option value="Paket Grup">Paket Grup (Custom)</option>
                            </select>
                        </div>
                    </div>

                    {{-- Row 3: Catatan Tambahan --}}
                    <div>
                        <label class="block text-xs font-bold text-secondary mb-1">Catatan Tambahan</label>
                        <textarea id="waMessage" rows="2" placeholder="Cth: Sewa alat pancing lengkap, butuh pemandu, dll"
                                  class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-opacity-20 transition-all duration-200 font-medium resize-none"></textarea>
                    </div>

                    {{-- Submit Button --}}
                    <div class="flex items-center justify-between gap-4 pt-1">
                        <p class="text-xs text-gray-500">* Tim kami akan merespons dalam 1x24 jam kerja</p>
                        <button type="submit"
                                class="shrink-0 py-2.5 px-6 bg-gradient-to-r from-primary to-primary-dark text-white font-bold text-sm rounded-lg hover:shadow-lg transition-all duration-300 flex items-center justify-center gap-2 group">
                            <i class="fas fa-paper-plane group-hover:translate-x-1 transition-transform duration-300"></i>
                            Kirim Reservasi
                        </button>
                    </div>
                </form>
            </div>

            {{-- Info Cards Row --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                {{-- Info Card 1: Telepon --}}
                @if ($contact?->phone)
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 border border-blue-200">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-white text-lg"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-blue-900 mb-2">Telepon</p>
                                <p class="text-gray-700 font-bold">{{ $contact->phone }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Info Card 2: WhatsApp --}}
                @if ($contact?->whatsapp)
                    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 border border-green-200">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fab fa-whatsapp text-white text-lg"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-green-900 mb-2">WhatsApp</p>
                                <a href="https://wa.me/{{ $contact->whatsapp }}" class="text-green-700 font-bold hover:text-green-900 transition-colors">
                                    +{{ $contact->whatsapp }}
                                </a>
                                <p class="text-xs text-green-700 mt-1 font-medium">Respons Cepat 24/7</p>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Info Card 3: Lokasi --}}
                @if ($location?->address)
                    <div class="bg-gradient-to-br from-red-50 to-red-100 rounded-2xl p-6 border border-red-200">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-red-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-white text-lg"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-red-900 mb-2">Lokasi</p>
                                <p class="text-gray-700 font-medium">{{ $location->address }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Info Card 4: Jam Operasional --}}
                @if ($contact?->operational_hours)
                    <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-2xl p-6 border border-yellow-200">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-yellow-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-clock text-white text-lg"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-yellow-900 mb-2">Jam Operasional</p>
                                <p class="text-gray-700 font-bold">{{ $contact->operational_hours }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <x-map :location="$location" />

    {{-- Final CTA --}}
    <section class="py-20 md:py-32 bg-gradient-primary text-white">
        <div class="container-max">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Siap Memancing?</h2>
                <p class="text-lg md:text-xl text-white text-opacity-90 mb-10 leading-relaxed">
                    Jangan tunda lagi! Kunjungi Balong Hardi sekarang dan nikmati pengalaman memancing terbaik dengan fasilitas lengkap dan harga terjangkau.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <x-button href="https://wa.me/{{ $contact->whatsapp ?? '' }}" variant="outline-white" icon="whatsapp" class="!bg-white !text-primary !border-white">
                        Chat via WhatsApp
                    </x-button>
                    <x-button href="#kontak" variant="outline-white">
                        Hubungi Kami
                    </x-button>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script>
        document.getElementById('waContactForm')?.addEventListener('submit', function (e) {
            e.preventDefault();

            const waNumber = '{{ $contact->whatsapp ?? '' }}';
            const name = document.getElementById('waName').value.trim();
            const dateInput = document.getElementById('waDate').value;
            const guests = document.getElementById('waGuests').value;
            const pkg = document.getElementById('waPackage').value;
            const message = document.getElementById('waMessage').value.trim();

            // Validasi
            if (!name) {
                alert('Nama lengkap harus diisi!');
                document.getElementById('waName').focus();
                return;
            }
            if (!dateInput) {
                alert('Tanggal reservasi harus dipilih!');
                document.getElementById('waDate').focus();
                return;
            }
            if (!pkg) {
                alert('Paket harus dipilih!');
                document.getElementById('waPackage').focus();
                return;
            }

            // Format tanggal
            const formattedDate = new Date(dateInput + 'T00:00:00').toLocaleDateString('id-ID', {
                weekday: 'long', day: 'numeric', month: 'long', year: 'numeric'
            });

            // Buat pesan WhatsApp
            let text = `*🎣 PERMINTAAN RESERVASI BALONG HARDI*\n`;
            text += `━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n`;
            text += `*Nama:* ${name}\n`;
            text += `*Tanggal:* ${formattedDate}\n`;
            text += `*Jumlah Orang:* ${guests} orang\n`;
            text += `*Paket:* ${pkg}\n`;
            if (message) text += `*Catatan:* ${message}\n`;
            text += `\n━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n`;
            text += `Mohon konfirmasi ketersediaan. Terima kasih! 🙏`;

            window.open(`https://wa.me/${waNumber}?text=${encodeURIComponent(text)}`, '_blank');
        });
    </script>
@endsection