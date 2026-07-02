@extends('layouts.admin')

@section('title', 'Kelola Galeri')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-3xl font-bold text-secondary">Kelola Galeri</h1>
        <p class="text-gray-600">Manage semua foto galeri</p>
    </div>
    <a href="{{ route('admin.galleries.create') }}" class="px-6 py-3 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-all">
        + Upload Foto
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($galleries as $gallery)
        <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition-all">
            <div class="relative h-48 overflow-hidden bg-gray-300">
                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover">
            </div>
            <div class="p-4">
                <h3 class="text-lg font-bold text-secondary mb-2">{{ $gallery->title }}</h3>
                <p class="text-sm text-gray-600 mb-4">{{ $gallery->category }}</p>
                <div class="flex gap-2">
                    <a href="{{ route('admin.galleries.edit', $gallery) }}" class="flex-1 px-3 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition-all text-center text-sm">
                        Edit
                    </a>
                    <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="flex-1" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full px-3 py-2 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 transition-all text-sm">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-12">
            <p class="text-gray-600 mb-4">Belum ada foto galeri.</p>
            <a href="{{ route('admin.galleries.create') }}" class="px-6 py-3 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-all inline-block">
                + Upload Foto Pertama
            </a>
        </div>
    @endforelse
</div>
@endsection