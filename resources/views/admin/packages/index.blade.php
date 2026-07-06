@extends('layouts.admin')

@section('title', 'Kelola Paket')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-3xl font-bold text-secondary">Kelola Paket</h1>
        <p class="text-gray-600">Manage semua paket Balong Hardi</p>
    </div>
    <a href="{{ route('admin.packages.create') }}" class="px-6 py-3 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-all">
        + Tambah Paket
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-secondary text-white">
            <tr>
                <th class="px-6 py-4 text-left">Nama</th>
                <th class="px-6 py-4 text-left">Durasi</th>
                <th class="px-6 py-4 text-left">Harga</th>
                <th class="px-6 py-4 text-left">Status</th>
                <th class="px-6 py-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($packages as $package)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-semibold text-secondary">
                        {{ $package->name }}
                        @if($package->is_popular)
                            <span class="ml-2 px-2 py-1 bg-yellow-200 text-yellow-800 text-xs font-bold rounded">⭐ POPULER</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $package->time_range }}</td>
                    <td class="px-6 py-4 text-gray-600 font-semibold">Rp {{ number_format($package->price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $package->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $package->is_active ? '✓ Aktif' : '✗ Nonaktif' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('admin.packages.edit', $package) }}" class="text-blue-600 hover:text-blue-800 font-semibold mr-4">Edit</a>
                        <form action="{{ route('admin.packages.destroy', $package) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-600">
                        Belum ada paket. <a href="{{ route('admin.packages.create') }}" class="text-primary font-semibold">Tambah sekarang</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="mt-8">
    {{ $packages->links() }}
</div>
@endsection