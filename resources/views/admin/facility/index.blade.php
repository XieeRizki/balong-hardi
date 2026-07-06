@extends('layouts.admin')

@section('title', 'Kelola Fasilitas')

@section('content')
<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .page-header h1 {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--secondary);
    }

    .page-header p {
        color: #6B7280;
        font-size: 0.95rem;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 0.95rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary) 0%, #ff8555 100%);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 107, 53, 0.3);
    }

    .btn-secondary {
        background-color: #E5E7EB;
        color: var(--secondary);
    }

    .btn-secondary:hover {
        background-color: #D1D5DB;
    }

    .btn-danger {
        background-color: var(--danger);
        color: white;
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
    }

    .btn-danger:hover {
        background-color: #d93859;
    }

    .btn-edit {
        background-color: var(--accent);
        color: white;
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
    }

    .btn-edit:hover {
        background-color: #0090c8;
    }

    .table-container {
        background: white;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.08);
        overflow: hidden;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background: linear-gradient(135deg, var(--secondary) 0%, #0f2744 100%);
        color: white;
    }

    th {
        padding: 1.25rem;
        text-align: left;
        font-weight: 600;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    td {
        padding: 1.25rem;
        border-bottom: 1px solid #E5E7EB;
        font-size: 0.95rem;
    }

    tbody tr {
        transition: all 0.3s ease;
    }

    tbody tr:hover {
        background-color: #F9FAFB;
    }

    .status-badge {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-size: 0.875rem;
        font-weight: 600;
    }

    .status-active {
        background-color: rgba(6, 214, 160, 0.15);
        color: #047857;
    }

    .status-inactive {
        background-color: rgba(239, 71, 111, 0.15);
        color: #991b1b;
    }

    .action-cell {
        display: flex;
        gap: 0.5rem;
    }

    .action-cell form {
        display: inline;
    }

    .empty-state {
        text-align: center;
        padding: 3rem 1.5rem;
    }

    .empty-state i {
        font-size: 3rem;
        color: #D1D5DB;
        margin-bottom: 1rem;
    }

    .empty-state p {
        color: #6B7280;
        margin-bottom: 1.5rem;
    }

    .pagination {
        padding: 1.5rem;
        display: flex;
        justify-content: center;
        gap: 0.5rem;
    }

    .pagination a, .pagination span {
        padding: 0.5rem 0.75rem;
        border: 1px solid #E5E7EB;
        border-radius: 6px;
        text-decoration: none;
        color: var(--secondary);
        transition: all 0.3s ease;
    }

    .pagination a:hover {
        background-color: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    .pagination .active span {
        background-color: var(--primary);
        color: white;
        border-color: var(--primary);
    }
</style>

<div class="page-header">
    <div>
        <h1>🏊 Kelola Fasilitas</h1>
        <p>Manage semua fasilitas Balong Hardi</p>
    </div>
    <a href="{{ route('admin.facility.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i>
        Tambah Fasilitas
    </a>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($facilities as $facility)
                <tr>
                    <td>
                        <strong>{{ $facility->name }}</strong>
                        @if($facility->icon)
                            <span style="margin-left: 0.5rem;">{{ $facility->icon }}</span>
                        @endif
                    </td>
                    <td>
                        <p style="color: #6B7280; margin: 0;">{{ Str::limit($facility->description, 60) }}</p>
                    </td>
                    <td>
                        <span class="status-badge {{ $facility->is_active ? 'status-active' : 'status-inactive' }}">
                            {{ $facility->is_active ? '✓ Aktif' : '✗ Nonaktif' }}
                        </span>
                    </td>
                    <td style="text-align: center;">
                        <div class="action-cell" style="justify-content: center;">
                            <a href="{{ route('admin.facility.edit', $facility) }}" class="btn btn-edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.facility.destroy', $facility) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        <div class="empty-state">
                            <i class="fas fa-inbox"></i>
                            <p>Belum ada fasilitas</p>
                            <a href="{{ route('admin.facility.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Tambah Fasilitas Sekarang
                            </a>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @if($facilities->hasPages())
        <div class="pagination">
            {{ $facilities->links('pagination::bootstrap-4') }}
        </div>
    @endif
</div>
@endsection