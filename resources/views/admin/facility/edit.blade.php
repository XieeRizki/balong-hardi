@extends('layouts.admin')

@section('title', 'Edit Fasilitas')

@section('content')
<style>
    .form-header {
        margin-bottom: 2rem;
    }

    .form-header h1 {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--secondary);
        margin-bottom: 0.5rem;
    }

    .form-container {
        background: white;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.08);
        max-width: 600px;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    label {
        display: block;
        font-weight: 600;
        color: var(--secondary);
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    textarea {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #E5E7EB;
        border-radius: 8px;
        font-size: 0.95rem;
        font-family: inherit;
        transition: all 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="file"]:focus,
    textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
    }

    textarea {
        resize: vertical;
        min-height: 120px;
    }

    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    input[type="checkbox"] {
        width: 1.25rem;
        height: 1.25rem;
        cursor: pointer;
        accent-color: var(--primary);
    }

    .checkbox-group label {
        margin-bottom: 0;
    }

    .error-message {
        color: var(--danger);
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .form-actions button,
    .form-actions a {
        flex: 1;
        padding: 0.875rem 1.5rem;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        text-decoration: none;
        text-align: center;
    }

    .btn-submit {
        background: linear-gradient(135deg, var(--primary) 0%, #ff8555 100%);
        color: white;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 107, 53, 0.3);
    }

    .btn-cancel {
        background-color: #E5E7EB;
        color: var(--secondary);
    }

    .btn-cancel:hover {
        background-color: #D1D5DB;
    }

    .help-text {
        font-size: 0.875rem;
        color: #6B7280;
        margin-top: 0.25rem;
    }

    .image-preview {
        margin-bottom: 1rem;
        text-align: center;
    }

    .image-preview img {
        max-width: 200px;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
</style>

<div class="form-header">
    <h1>✏️ Edit Fasilitas: {{ $facility->name }}</h1>
</div>

<div class="form-container">
    <form action="{{ route('admin.facility.update', $facility) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama Fasilitas <span style="color: var(--danger);">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name', $facility->name) }}" required>
            @error('name') <p class="error-message">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="description">Deskripsi <span style="color: var(--danger);">*</span></label>
            <textarea id="description" name="description" required>{{ old('description', $facility->description) }}</textarea>
            @error('description') <p class="error-message">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="image">Gambar Fasilitas</label>
            @if($facility->image)
                <div class="image-preview">
                    <img src="{{ asset('storage/' . $facility->image) }}" alt="{{ $facility->name }}">
                </div>
            @endif
            <input type="file" id="image" name="image" accept="image/*">
            <p class="help-text">Format: JPG, PNG. Ukuran maksimal: 2MB</p>
            @error('image') <p class="error-message">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="icon">Icon (Emoji/Unicode) <span style="opacity: 0.6;">(Opsional)</span></label>
            <input type="text" id="icon" name="icon" value="{{ old('icon', $facility->icon) }}" placeholder="Contoh: 🏊 🎢 🍽️">
            <p class="help-text">Copy emoji dari internet dan paste di sini</p>
            @error('icon') <p class="error-message">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="order">Urutan Tampil</label>
            <input type="number" id="order" name="order" value="{{ old('order', $facility->order) }}" min="0">
            <p class="help-text">Angka lebih kecil = tampil lebih depan</p>
            @error('order') <p class="error-message">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <div class="checkbox-group">
                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $facility->is_active) ? 'checked' : '' }}>
                <label for="is_active">✓ Aktifkan Fasilitas Ini</label>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
            <a href="{{ route('admin.facility.index') }}" class="btn-cancel">
                <i class="fas fa-times"></i> Batal
            </a>
        </div>
    </form>
</div>
@endsection