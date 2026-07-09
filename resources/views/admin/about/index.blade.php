@extends('layouts.admin')
@section('title', 'Tentang Kami')
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
        margin: 0;
    }

    .btn-create {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
        padding: 0.7rem 1.5rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.2s ease;
        white-space: nowrap;
    }

    .btn-create:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3);
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
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    td {
        padding: 0.9rem;
        border-bottom: 1px solid var(--border);
        font-size: 0.9rem;
    }

    tbody tr {
        transition: background 0.15s ease;
    }

    tbody tr:hover {
        background: rgba(249, 115, 22, 0.03);
    }

    .title-cell {
        font-weight: 600;
        color: var(--secondary);
        max-width: 200px;
    }

    .desc-cell {
        color: var(--neutral);
        font-size: 0.85rem;
        max-width: 350px;
        white-space: normal;
    }

    .image-cell {
        text-align: center;
    }

    .image-thumbnail {
        display: inline-block;
        width: 50px;
        height: 50px;
        border-radius: 6px;
        border: 1px solid var(--border);
        overflow: hidden;
        background: var(--light);
    }

    .image-thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .btn-action {
        padding: 0.5rem 0.75rem;
        border: none;
        border-radius: 5px;
        font-weight: 600;
        font-size: 0.75rem;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        transition: all 0.15s ease;
        border: 1px solid var(--border);
    }

    .btn-edit {
        background: white;
        color: var(--secondary);
        border-color: var(--secondary);
    }

    .btn-edit:hover {
        background: var(--secondary);
        color: white;
    }

    .btn-delete {
        background: white;
        color: var(--danger);
        border-color: var(--danger);
    }

    .btn-delete:hover {
        background: var(--danger);
        color: white;
    }

    .empty-state {
        text-align: center;
        padding: 3rem 2rem;
        color: var(--neutral);
    }

    .empty-state svg {
        width: 60px;
        height: 60px;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    .empty-state p {
        font-size: 0.95rem;
        margin-bottom: 1.5rem;
    }

    .alert {
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .alert-success {
        background: rgba(16, 185, 129, 0.1);
        color: #047857;
        border: 1px solid rgba(16, 185, 129, 0.3);
    }

    .alert svg {
        width: 20px;
        height: 20px;
        flex-shrink: 0;
    }

    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        align-items: center;
        justify-content: center;
    }

    .modal.show {
        display: flex;
    }

    .modal-content {
        background: white;
        border-radius: 10px;
        padding: 2rem;
        max-width: 400px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    }

    .modal-header h3 {
        margin: 0;
        color: var(--secondary);
        font-size: 1.25rem;
    }

    .modal-body {
        margin-bottom: 1.5rem;
        color: var(--neutral);
    }

    .modal-actions {
        display: flex;
        gap: 0.75rem;
        justify-content: flex-end;
    }

    .btn-modal {
        padding: 0.6rem 1.2rem;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.15s ease;
    }

    .btn-cancel {
        background: var(--light);
        color: var(--neutral);
    }

    .btn-cancel:hover {
        background: var(--border);
    }

    .btn-confirm {
        background: var(--danger);
        color: white;
    }

    .btn-confirm:hover {
        background: #DC2626;
    }

    .badge {
        display: inline-block;
        padding: 0.4rem 0.75rem;
        border-radius: 5px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .badge-count {
        background: rgba(249, 115, 22, 0.15);
        color: var(--primary);
    }
</style>

<div class="section-header">
    <div>
        <h1>Tentang Kami</h1>
        <p class="section-header-desc">Kelola konten halaman "Tentang Kami" dan manfaatnya</p>
    </div>
    <a href="{{ route('admin.about.create') }}" class="btn-create">
        <i class="fas fa-plus"></i> Tambah Tentang
    </a>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <svg fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
        </svg>
        <span>{{ $message }}</span>
    </div>
@endif

<div class="table-card">
    <div class="table-responsive">
        @if ($abouts->isNotEmpty())
            <table>
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Manfaat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($abouts as $about)
                        <tr>
                            <td class="image-cell">
                                @if ($about->image)
                                    <div class="image-thumbnail">
                                        <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}">
                                    </div>
                                @else
                                    <div class="image-thumbnail" style="background: var(--light); display: flex; align-items: center; justify-content: center;">
                                        <svg fill="var(--neutral)" viewBox="0 0 24 24" style="width: 24px; height: 24px;">
                                            <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z" />
                                        </svg>
                                    </div>
                                @endif
                            </td>
                            <td class="title-cell">{{ $about->title }}</td>
                            <td class="desc-cell">
                                {{ Str::limit(strip_tags($about->description), 60, '...') }}
                            </td>
                            <td>
                                <span class="badge badge-count">
                                    {{ $about->benefits->count() }} manfaat
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.about.edit', $about) }}" class="btn-action btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button type="button" class="btn-action btn-delete" data-id="{{ $about->id }}" onclick="openDeleteModal(this)">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-state">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p>Belum ada konten "Tentang Kami"</p>
                <a href="{{ route('admin.about.create') }}" class="btn-create">
                    <i class="fas fa-plus"></i> Buat Pertama
                </a>
            </div>
        @endif
    </div>
</div>

@if ($abouts->isNotEmpty())
    <div style="margin-top: 1.5rem;">
        {{ $abouts->links() }}
    </div>
@endif

<!-- Delete Modal -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Hapus Tentang Kami?</h3>
        </div>
        <div class="modal-body">
            <p>Apakah Anda yakin ingin menghapus konten ini? Tindakan ini tidak dapat dibatalkan.</p>
        </div>
        <form id="deleteForm" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
        <div class="modal-actions">
            <button type="button" class="btn-modal btn-cancel" onclick="closeDeleteModal()">
                Batal
            </button>
            <button type="button" class="btn-modal btn-confirm" onclick="confirmDelete()">
                Hapus
            </button>
        </div>
    </div>
</div>

<script>
    let deleteId = null;

    function openDeleteModal(btn) {
        deleteId = btn.getAttribute('data-id');
        document.getElementById('deleteModal').classList.add('show');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.remove('show');
        deleteId = null;
    }

    function confirmDelete() {
        if (deleteId) {
            const form = document.getElementById('deleteForm');
            form.action = `/admin/about/${deleteId}`;
            form.submit();
        }
    }

    // Close modal when clicking outside
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDeleteModal();
        }
    });
</script>

@endsection