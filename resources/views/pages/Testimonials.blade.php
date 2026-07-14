@extends('layouts.app')

@section('title', 'Testimoni - Balong Hardi Sumedang')

@section('content')

    {{-- Page Header --}}
    <section class="py-16 md:py-20 bg-light border-b border-gray-200">
        <div class="container-max">
            <div data-aos="fade-up">
                <x-section-title
                    badge="Testimoni"
                    title="Pengalaman Pengunjung"
                    subtitle="Dengarkan cerita dari pengunjung setia Balong Hardi"
                />
            </div>
        </div>
    </section>

    {{-- Testimoni --}}
    @if ($testimonials->isNotEmpty())
        <section class="py-20 md:py-32 bg-white">
            <div class="container-max">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($testimonials as $testimonial)
                         <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" class="card-modern p-8">
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
    @else
        <section class="py-20 bg-white">
            <div class="container-max text-center text-gray-500">
                Belum ada testimoni yang tersedia saat ini.
            </div>
        </section>
    @endif

@endsection