@extends('layouts.admin')

@section('title', 'Kelola Fasilitas')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-3xl font-bold text-secondary">Kelola Fasilitas</h1>
        <p class="text-gray-600">Manage semua fasilitas Balong Hardi</p>
    </div>
    <a href="{{ route('admin.facilities.create') }}" class="px-6 py-3 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-all">
        + Tambah Fasilitas
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-secondary text-white">
            <tr>
                <th class="px-6 py-4 text-left">Nama</th>
                <th class="px-6 py-4 text-left">Deskripsi</th>
                <th class="px-6 py-4 text-left">Status</th>
                <th class="px-6 py-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($facilities as $facility)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-semibold text-secondary">{{ $facility->name }}</td>
                    <td class="px-6 py-4 text-gray-600 truncate">{{ Str::limit($facility->description, 50) }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $facility->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $facility->is_active ? '✓ Aktif' : '✗ Nonaktif' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('admin.facilities.edit', $facility) }}" class="text-blue-600 hover:text-blue-800 font-semibold mr-4">Edit</a>
                        <form action="{{ route('admin.facilities.destroy', $facility) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-gray-600">
                        Belum ada fasilitas. <a href="{{ route('admin.facilities.create') }}" class="text-primary font-semibold">Tambah sekarang</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection