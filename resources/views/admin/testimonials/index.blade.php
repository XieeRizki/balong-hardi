@extends('layouts.admin')

@section('title', 'Kelola Testimoni')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-3xl font-bold text-secondary">Kelola Testimoni</h1>
        <p class="text-gray-600">Manage semua testimoni pelanggan</p>
    </div>
    <a href="{{ route('admin.testimonials.create') }}" class="px-6 py-3 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-all">
        + Tambah Testimoni
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-secondary text-white">
            <tr>
                <th class="px-6 py-4 text-left">Nama</th>
                <th class="px-6 py-4 text-left">Jabatan</th>
                <th class="px-6 py-4 text-left">Rating</th>
                <th class="px-6 py-4 text-left">Status</th>
                <th class="px-6 py-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($testimonials as $testimonial)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-semibold text-secondary">{{ $testimonial->name }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $testimonial->role ?? '-' }}</td>
                    <td class="px-6 py-4">
                        <span class="text-lg">{{ str_repeat('⭐', $testimonial->rating ?? 5) }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $testimonial->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $testimonial->is_active ? '✓ Aktif' : '✗ Nonaktif' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="text-blue-600 hover:text-blue-800 font-semibold mr-4">Edit</a>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-600">
                        Belum ada testimoni. <a href="{{ route('admin.testimonials.create') }}" class="text-primary font-semibold">Tambah sekarang</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="mt-8">
    {{ $testimonials->links() }}
</div>
@endsection