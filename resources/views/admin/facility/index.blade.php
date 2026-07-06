@extends('layouts.admin')
@section('title', 'Fasilitas')
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

    .name-cell {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        font-weight: 600;
        color: var(--secondary);
    }

    .icon-emoji {
        font-size: 1.25rem;
    }

    .desc-cell {
        color: var(--neutral);
        font-size: 0.85rem;
        max-width: 300px;
    }

    .badge {
        display: inline-block;
        padding: 0.4rem 0.75rem;
        border-radius: 5px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .badge-active {
        background: rgba(16, 185, 129, 0.15);
        color: #047857;
    }

    .badge-inactive {
        background: rgba(239, 68, 68, 0.15);
        color: #7F1D1D;
    }

    .action-group {
        display: flex;
        gap: 0.5rem;
        justify-content: center;
    }

    .btn-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.3rem;
        padding: 0.5rem 0.8rem;
        border: 1px solid;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.15s ease;
    }

    .btn-edit {
        background: rgba(59, 130, 246, 0.1);
        color: #3B82F6;
        border-color: rgba(59, 130, 246, 0.2);
    }

    .btn-edit:hover {
        background: rgba(59, 130, 246, 0.15);
        border-color: rgba(59, 130, 246, 0.3);
    }

    .btn-delete {
        background: rgba(239, 68, 68, 0.1);
        color: #EF4444;
        border-color: rgba(239, 68, 68, 0.2);
    }

    .btn-delete:hover {
        background: rgba(239, 68, 68, 0.15);
        border-color: rgba(239, 68, 68, 0.3);
    }

    .empty-container {
        text-align: center;
        padding: 3rem 1.5rem;
    }

    .empty-icon {
        font-size: 3rem;
        color: #D1D5DB;
        margin-bottom: 1rem;
    }

    .empty-text {
        color: var(--neutral);
        font-size: 0.95rem;
        margin: 0 0 1.5rem 0;
    }

    /* Modal Styles */
    .modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 2000;
        animation: fadeIn 0.2s ease;
    }

    .modal-overlay.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .modal-content {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        max-width: 500px;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
        animation: slideUp 0.3s ease;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        position: relative;
    }

    .modal-header {
        margin-bottom: 1.5rem;
    }

    .modal-header h2 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--secondary);
        margin: 0 0 0.25rem 0;
    }

    .modal-header p {
        font-size: 0.85rem;
        color: var(--neutral);
        margin: 0;
    }

    .modal-close {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: none;
        border: none;
        font-size: 1.5rem;
        color: var(--neutral);
        cursor: pointer;
        width: 2rem;
        height: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        transition: all 0.2s ease;
    }

    .modal-close:hover {
        background: var(--border);
        color: var(--secondary);
    }

    .form-group {
        margin-bottom: 1.1rem;
    }

    label {
        display: block;
        font-weight: 700;
        color: var(--secondary);
        margin-bottom: 0.4rem;
        font-size: 0.85rem;
    }

    .required {
        color: var(--danger);
        margin-left: 0.2rem;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    textarea {
        width: 100%;
        padding: 0.65rem 0.8rem;
        border: 1px solid var(--border);
        border-radius: 6px;
        font-family: inherit;
        font-size: 0.9rem;
        transition: all 0.15s ease;
        box-sizing: border-box;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="file"]:focus,
    textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
    }

    textarea {
        resize: vertical;
        min-height: 80px;
    }

    .form-hint {
        font-size: 0.75rem;
        color: var(--neutral);
        margin-top: 0.3rem;
    }

    .form-error {
        font-size: 0.75rem;
        color: var(--danger);
        margin-top: 0.3rem;
    }

    .checkbox-wrap {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    input[type="checkbox"] {
        width: 1rem;
        height: 1rem;
        cursor: pointer;
        accent-color: var(--primary);
    }

    .checkbox-wrap label {
        margin: 0;
        font-weight: 500;
        font-size: 0.9rem;
        cursor: pointer;
    }

    .form-actions {
        display: flex;
        gap: 0.6rem;
        margin-top: 1.5rem;
    }

    .btn {
        flex: 1;
        padding: 0.75rem;
        border: none;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.85rem;
        cursor: pointer;
        text-decoration: none;
        text-align: center;
        transition: all 0.15s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
    }

    .btn-save {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
    }

    .btn-save:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3);
    }

    .btn-cancel {
        background: var(--border);
        color: var(--secondary);
    }

    .btn-cancel:hover {
        background: #D1D5DB;
    }

    @media (max-width: 768px) {
        .section-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .btn-create {
            width: 100%;
            justify-content: center;
        }

        th, td {
            padding: 0.7rem;
            font-size: 0.8rem;
        }

        th {
            font-size: 0.75rem;
        }

        .modal-content {
            padding: 1.5rem;
            margin: 1rem;
        }

        .modal-header h2 {
            font-size: 1.1rem;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }
    }
</style>

<div class="section-header">
    <div>
        <h1>🏊 Fasilitas</h1>
        <p class="section-header-desc">Kelola semua fasilitas Balong Hardi</p>
    </div>
    <button class="btn-create" onclick="openModal('addModal')">
        <i class="fas fa-plus"></i> Tambah
    </button>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th style="width: 140px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($facilities as $facility)
                    <tr>
                        <td>
                            <div class="name-cell">
                                @if($facility->icon)
                                    <span class="icon-emoji">{{ $facility->icon }}</span>
                                @endif
                                <span>{{ $facility->name }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="desc-cell">{{ Str::limit($facility->description, 50) }}</div>
                        </td>
                        <td>
                            <span class="badge {{ $facility->is_active ? 'badge-active' : 'badge-inactive' }}">
                                {{ $facility->is_active ? '✓ Aktif' : '✗ Nonaktif' }}
                            </span>
                        </td>
                        <td>
                            <div class="action-group">
                                <a href="{{ route('admin.facility.edit', $facility) }}" class="btn-icon btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.facility.destroy', $facility) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin hapus?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-icon btn-delete" style="border: none; padding: 0.5rem 0.8rem;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <div class="empty-container">
                                <div class="empty-icon">📭</div>
                                <p class="empty-text">Belum ada fasilitas</p>
                                <button class="btn-create" onclick="openModal('addModal')">
                                    <i class="fas fa-plus"></i> Tambah Fasilitas
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($facilities->hasPages())
        <div style="padding: 1rem; text-align: center; border-top: 1px solid var(--border);">
            {{ $facilities->links('pagination::bootstrap-4') }}
        </div>
    @endif
</div>

<!-- Modal Add Fasilitas -->
<div class="modal-overlay" id="addModal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal('addModal')">&times;</button>
        <div class="modal-header">
            <h2>➕ Tambah Fasilitas</h2>
            <p>Tambahkan fasilitas baru ke Balong Hardi</p>
        </div>

        <form action="{{ route('admin.facility.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Nama Fasilitas <span class="required">*</span></label>
                <input type="text" id="name" name="name" placeholder="Contoh: Kolam Renang Utama" value="{{ old('name') }}" required>
                @error('name')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="description">Deskripsi <span class="required">*</span></label>
                <textarea id="description" name="description" placeholder="Jelaskan detail fasilitas..." required>{{ old('description') }}</textarea>
                @error('description')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="image">Gambar Fasilitas</label>
                <input type="file" id="image" name="image" accept="image/*">
                <div class="form-hint">JPG, PNG · Maks 2MB</div>
                @error('image')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="icon">Icon (Emoji)</label>
                <input type="text" id="icon" name="icon" placeholder="Contoh: 🏊 🎢 🍽️" value="{{ old('icon') }}">
                <div class="form-hint">Copy emoji dan paste di sini</div>
                @error('icon')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="order">Urutan Tampil</label>
                <input type="number" id="order" name="order" min="0" value="{{ old('order', 0) }}">
                <div class="form-hint">Angka lebih kecil = tampil lebih depan</div>
                @error('order')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <div class="checkbox-wrap">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
                    <label for="is_active">Aktifkan fasilitas ini</label>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-save">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <button type="button" class="btn btn-cancel" onclick="closeModal('addModal')">
                    <i class="fas fa-times"></i> Batal
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside
    document.querySelectorAll('.modal-overlay').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal(this.id);
            }
        });
    });

    // Close modal on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal-overlay.active').forEach(modal => {
                closeModal(modal.id);
            });
        }
    });
</script>

@endsection
