@extends('layouts.admin')
@section('title', 'Tambah Tentang Kami')
@section('content')

<style>
    .form-header h1 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--secondary);
        margin: 0 0 0.3rem 0;
    }

    .form-header p {
        font-size: 0.85rem;
        color: var(--neutral);
        margin: 0 0 1.5rem 0;
    }

    .form-box {
        background: white;
        border: 1px solid var(--border);
        border-radius: 10px;
        padding: 1.5rem;
        max-width: 800px;
    }

    .form-group {
        margin-bottom: 1.25rem;
    }

    label {
        display: block;
        font-weight: 700;
        color: var(--secondary);
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
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
        padding: 0.75rem 0.9rem;
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
        min-height: 120px;
        font-family: 'Courier New', monospace;
    }

    .form-hint {
        font-size: 0.8rem;
        color: var(--neutral);
        margin-top: 0.35rem;
    }

    .form-error {
        font-size: 0.8rem;
        color: var(--danger);
        margin-top: 0.35rem;
    }

    .image-preview-box {
        margin: 0.75rem 0;
        text-align: center;
    }

    .image-preview-box img {
        max-width: 200px;
        max-height: 200px;
        border-radius: 6px;
        border: 1px solid var(--border);
    }

    .benefits-section {
        border-top: 2px solid var(--light);
        padding-top: 1.5rem;
        margin-top: 2rem;
    }

    .benefits-section h3 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--secondary);
        margin: 0 0 1rem 0;
    }

    .benefit-item {
        background: var(--light);
        padding: 1.25rem;
        border-radius: 8px;
        margin-bottom: 1rem;
        border: 1px solid var(--border);
    }

    .benefit-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .benefit-number {
        font-weight: 700;
        color: var(--primary);
        font-size: 0.9rem;
    }

    .btn-remove-benefit {
        background: var(--danger);
        color: white;
        padding: 0.4rem 0.75rem;
        border: none;
        border-radius: 5px;
        font-size: 0.8rem;
        cursor: pointer;
        transition: all 0.15s ease;
    }

    .btn-remove-benefit:hover {
        background: #DC2626;
    }

    .benefit-item input[type="text"] {
        margin-bottom: 0.75rem;
    }

    .add-benefit-btn {
        background: white;
        border: 2px dashed var(--primary);
        color: var(--primary);
        padding: 0.85rem 1.25rem;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        width: 100%;
        transition: all 0.15s ease;
    }

    .add-benefit-btn:hover {
        background: rgba(249, 115, 22, 0.05);
    }

    .form-actions {
        display: flex;
        gap: 0.75rem;
        margin-top: 2rem;
    }

    .btn {
        flex: 1;
        padding: 0.85rem;
        border: none;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.9rem;
        cursor: pointer;
        text-decoration: none;
        text-align: center;
        transition: all 0.15s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-save {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
    }

    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3);
    }

    .btn-cancel {
        background: white;
        color: var(--secondary);
        border: 2px solid var(--secondary);
    }

    .btn-cancel:hover {
        background: var(--secondary);
        color: white;
    }

    .alert {
        padding: 0.9rem;
        border-radius: 6px;
        margin-bottom: 1rem;
        border-left: 4px solid var(--danger);
    }

    .alert-error {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger);
    }
</style>

<div class="form-header">
    <h1>Tambah Konten Tentang Kami</h1>
    <p>Isi informasi lengkap tentang perusahaan dan manfaatnya</p>
</div>

<div class="form-box">
    <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div class="form-group">
            <label for="title">Judul <span class="required">*</span></label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Contoh: Tentang Balong Hardi" required>
            @error('title') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description">Deskripsi <span class="required">*</span></label>
            <textarea id="description" name="description" placeholder="Jelaskan tentang perusahaan, visi, misi, dan keunggulan Balong Hardi..." required>{{ old('description') }}</textarea>
            <p class="form-hint">Gunakan garis baru untuk paragraf terpisah</p>
            @error('description') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <!-- Image -->
        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(this)">
            <p class="form-hint">Maksimal 2MB. Format: JPG, PNG, WebP</p>
            <div id="imagePreview" class="image-preview-box"></div>
            @error('image') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <!-- Benefits Section -->
        <div class="benefits-section">
            <h3>Manfaat / Keunggulan <span class="required">*</span></h3>
            <div id="benefitsList">
                <!-- Benefits akan ditambahkan di sini -->
            </div>
            <button type="button" class="add-benefit-btn" onclick="addBenefit()">
                <i class="fas fa-plus"></i> Tambah Manfaat
            </button>
        </div>

        <!-- Form Actions -->
        <div class="form-actions">
            <a href="{{ route('admin.about.index') }}" class="btn btn-cancel">
                <i class="fas fa-times"></i> Batal
            </a>
            <button type="submit" class="btn btn-save">
                <i class="fas fa-save"></i> Simpan
            </button>
        </div>
    </form>
</div>

<script>
    let benefitCount = 0;

    // Add benefit item
    function addBenefit() {
        const benefitsList = document.getElementById('benefitsList');
        const benefitItem = document.createElement('div');
        benefitItem.className = 'benefit-item';
        benefitItem.id = `benefit-${benefitCount}`;
        benefitItem.innerHTML = `
            <div class="benefit-header">
                <span class="benefit-number">Manfaat ${benefitCount + 1}</span>
                <button type="button" class="btn-remove-benefit" onclick="removeBenefit(${benefitCount})">
                    <i class="fas fa-trash"></i> Hapus
                </button>
            </div>
            <div class="form-group">
                <label>Judul Manfaat</label>
                <input type="text" name="benefits[${benefitCount}][title]" placeholder="Contoh: Kolam Luas & Terawat" required>
            </div>
            <div class="form-group">
                <label>Deskripsi (Opsional)</label>
                <input type="text" name="benefits[${benefitCount}][description]" placeholder="Deskripsi singkat tentang manfaat ini">
            </div>
        `;
        benefitsList.appendChild(benefitItem);
        benefitCount++;
    }

    // Remove benefit item
    function removeBenefit(id) {
        const element = document.getElementById(`benefit-${id}`);
        if (element) {
            element.remove();
        }
    }

    // Preview image
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = `<img src="${e.target.result}" alt="Preview">`;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Load old benefits if exist (for form re-population on error)
    window.addEventListener('load', function() {
        const benefitsList = document.getElementById('benefitsList');
        if (benefitsList.children.length === 0) {
            // Add one empty benefit by default
            addBenefit();
        }
    });
</script>

@endsection