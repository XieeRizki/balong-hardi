@extends('layouts.admin')

@section('title', 'Reservasi')

@section('content')

<style>
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .section-header h1 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--secondary);
        margin: 0;
    }

    .section-header-desc {
        font-size: 0.85rem;
        color: var(--neutral);
        margin: 0.2rem 0 0 0;
    }

    .table-card {
        background: white;
        border-radius: 10px;
        border: 1px solid var(--border);
        overflow: hidden;
    }

    .table-responsive {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background: linear-gradient(135deg, var(--secondary) 0%, #111827 100%);
        color: white;
    }

    th {
        padding: 0.9rem;
        text-align: left;
        font-weight: 700;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    td {
        padding: 0.9rem;
        border-bottom: 1px solid var(--border);
        font-size: 0.9rem;
        vertical-align: top;
    }

    tbody tr:hover {
        background: rgba(249, 115, 22, 0.03);
    }

    .name-cell {
        font-weight: 600;
        color: var(--secondary);
    }

    .msg-cell {
        color: var(--neutral);
        font-size: 0.85rem;
        max-width: 220px;
    }

    select.status-select {
        padding: 0.4rem 0.6rem;
        border-radius: 6px;
        border: 1px solid var(--border);
        font-size: 0.8rem;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-delete {
        padding: 0.45rem 0.75rem;
        border: 1px solid rgba(239, 68, 68, 0.3);
        border-radius: 5px;
        font-weight: 600;
        font-size: 0.75rem;
        cursor: pointer;
        background: white;
        color: #EF4444;
        transition: all 0.15s ease;
    }

    .btn-delete:hover {
        background: #EF4444;
        color: white;
    }

    .alert {
        padding: 1rem 1.25rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        font-size: 0.85rem;
        background: rgba(16, 185, 129, 0.1);
        color: #047857;
        border: 1px solid rgba(16, 185, 129, 0.3);
    }

    .empty-state {
        text-align: center;
        padding: 3rem 2rem;
        color: var(--neutral);
    }
</style>

<div class="section-header">
    <div>
        <h1>Reservasi</h1>
        <p class="section-header-desc">Daftar reservasi yang masuk dari website</p>
    </div>
</div>

@if (session('success'))
    <div class="alert"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
@endif

<div class="table-card">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Orang</th>
                    <th>Paket</th>
                    <th>Catatan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reservations as $reservation)
                    <tr>
                        <td class="name-cell">{{ $reservation->name }}</td>
                        <td>{{ $reservation->reservation_date->format('d M Y') }}</td>
                        <td>{{ $reservation->guests }}</td>
                        <td>{{ $reservation->package_name ?? '-' }}</td>
                        <td class="msg-cell">{{ $reservation->message ?: '-' }}</td>
                        <td>
                            <form action="{{ route('admin.reservations.update-status', $reservation) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" class="status-select" onchange="this.form.submit()">
                                    <option value="pending" {{ $reservation->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $reservation->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="cancelled" {{ $reservation->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('admin.reservations.destroy', $reservation) }}" method="POST" onsubmit="return confirm('Hapus reservasi ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-delete"><i class="fas fa-trash"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            <div class="empty-state">Belum ada reservasi masuk.</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div style="margin-top: 1.5rem;">
    {{ $reservations->links() }}
</div>

@endsection