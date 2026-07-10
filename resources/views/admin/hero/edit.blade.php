<!-- File: resources/views/admin/hero/edit.blade.php -->
@extends('layouts.admin')

@section('title', 'Edit Hero Banner')

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
        min-height: 90px;
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
        max-width: 100%;
        max-height: 300px;
        border-radius: 6px;
        border: 1px solid var(--border);
    }

    .section-divider {
        margin: 2rem 0;
        padding: 1.5rem 0;
        border-top: 2px solid var(--border);
    }

    .section-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--secondary);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .section-title i {
        color: var(--primary);
        font-size: 1.2rem;
    }

    .stats-container {
        background: rgba(249, 115, 22, 0.05);
        border: 1px solid rgba(249, 115, 22, 0.2);
        border-radius: 8px;
        padding: 1.25rem;
        margin-bottom: 1rem;
    }

    .stat-item {
        background: white;
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 1.25rem;
        margin-bottom: 1rem;
        position: relative;
    }

    .stat-item:last-child {
        margin-bottom: 0;
    }

    .stat-item-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .stat-item-number {
        display: inline-block;
        background: var(--primary);
        color: white;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.85rem;
    }

    .btn-remove-stat {
        background: var(--danger);
        color: white;
        border: none;
        padding: 0.4rem 0.8rem;
        border-radius: 4px;
        cursor: pointer;
        font-size: 0.8rem;
        font-weight: 600;
        transition: all 0.15s ease;
    }

    .btn-remove-stat:hover {
        background: #dc2626;
    }

    .btn-add-stat {
        background: rgba(249, 115, 22, 0.15);
        color: var(--primary-dark);
        border: 2px dashed var(--primary);
        padding: 0.9rem 1.5rem;
        border-radius: 6px;
        cursor: pointer;
        font-size: 0.9rem;
        font-weight: 600;
        transition: all 0.15s ease;
        width: 100%;
    }

    .btn-add-stat:hover {
        background: rgba(249, 115, 22, 0.25);
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
        background: var(--border);
        color: var(--secondary);
    }

    .btn-cancel:hover {
        background: #d1d5db;
    }

    .checkbox-wrap {
        display: flex;
        align-items: center;
        gap: 0.6rem;
    }

    input[type="checkbox"] {
        width: 1.1rem;
        height: 1.1rem;
        cursor: pointer;
        accent-color: var(--primary);
    }

    .checkbox-wrap label {
        margin: 0;
        font-weight: 500;
        cursor: pointer;
    }

    .grid-2col {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.25rem;
    }

    .slideshow-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
        gap: 1rem;
        margin-bottom: 1.25rem;
    }

    .slideshow-item {
        position: relative;
        border: 1px solid var(--border);
        border-radius: 8px;
        overflow: hidden;
    }

    .slideshow-item img {
        width: 100%;
        height: 100px;
        object-fit: cover;
        display: block;
    }

    .slideshow-item .checkbox-wrap {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.65);
        padding: 0.4rem 0.6rem;
    }

    .slideshow-item .checkbox-wrap label {
        color: white;
        font-size: 0.75rem;
    }

    .slideshow-empty {
        text-align: center;
        padding: 1.5rem;
        color: var(--neutral);
        background: rgba(249, 115, 22, 0.05);
        border: 1px dashed var(--border);
        border-radius: 8px;
        margin-bottom: 1.25rem;
    }

    @media (max-width: 768px) {
        .grid-2col {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column;
        }
    }
</style>

<div class="form-header">
    <h1>⚙️ Edit Hero Banner</h1>
    <p>Kelola banner utama yang ditampilkan di halaman depan website Anda</p>
</div>

<div class="form-box">
    <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- BAGIAN UTAMA HERO -->
        <div class="section-title">
            <i class="fas fa-star"></i> Informasi Hero Banner
        </div>

        <div class="form-group">
            <label>Judul Banner <span class="required">*</span></label>
            <input type="text" name="title" value="{{ old('title', $hero->title ?? '') }}"
                   class="@error('title') border-red-500 @enderror"
                   placeholder="Contoh: Selamat Datang di Balong Hardi"
                   required>
            @error('title')
                <p class="form-error">{{ $message }}</p>
            @enderror
            <p class="form-hint">Judul utama yang akan ditampilkan di banner</p>
        </div>

        <div class="form-group">
            <label>Subtitle <span class="required">*</span></label>
            <textarea name="subtitle" class="@error('subtitle') border-red-500 @enderror"
                      placeholder="Contoh: Kolam renang terlengkap dengan fasilitas modern">{{ old('subtitle', $hero->subtitle ?? '') }}</textarea>
            @error('subtitle')
                <p class="form-error">{{ $message }}</p>
            @enderror
            <p class="form-hint">Deskripsi singkat di bawah judul</p>
        </div>

        <div class="form-group">
            <label>Gambar Hero (Fallback)</label>
            @if($hero->image)
                <div class="image-preview-box">
                    <img src="{{ asset('storage/' . $hero->image) }}" alt="{{ $hero->title }}">
                    <p class="form-hint" style="margin-top: 0.75rem;">Gambar saat ini</p>
                </div>
            @endif
            <input type="file" name="image" accept="image/*"
                   class="@error('image') border-red-500 @enderror">
            @error('image')
                <p class="form-error">{{ $message }}</p>
            @enderror
            <p class="form-hint">Dipakai kalau Gambar Slideshow di bawah kosong. Format: JPG, PNG, WebP (Max 2MB).</p>
        </div>

        <!-- BAGIAN GAMBAR SLIDESHOW -->
        <div class="section-divider">
            <div class="section-title">
                <i class="fas fa-images"></i> Gambar Slideshow
            </div>
            <p class="form-hint" style="margin-bottom: 1rem;">
                Upload beberapa foto -- nanti otomatis ganti-ganti (slideshow) di background hero.
                Kalau cuma 1 foto, otomatis statis (gak ada animasi geser).
            </p>

            @if($hero->images && $hero->images->count() > 0)
                <div class="slideshow-grid">
                    @foreach($hero->images as $img)
                        <div class="slideshow-item">
                            <img src="{{ asset('storage/' . $img->image) }}">
                            <div class="checkbox-wrap">
                                <input type="checkbox" name="delete_images[]" value="{{ $img->id }}" id="delimg{{ $img->id }}">
                                <label for="delimg{{ $img->id }}">Hapus</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="slideshow-empty">
                    <p style="margin:0;">Belum ada gambar slideshow. Upload minimal 2 foto biar animasinya kelihatan.</p>
                </div>
            @endif

            <div class="form-group" style="margin-bottom: 0;">
                <label>Tambah Gambar Baru</label>
                <input type="file" name="images[]" accept="image/*" multiple>
                <p class="form-hint">Tahan Ctrl (Windows) / Cmd (Mac) buat pilih beberapa foto sekaligus.</p>
            </div>
        </div>

        <!-- BAGIAN BUTTON CTA -->
        <div class="section-divider">
            <div class="section-title">
                <i class="fas fa-hand-pointer"></i> Call-to-Action Button
            </div>

            <div class="grid-2col">
                <div class="form-group">
                    <label>Teks Button</label>
                    <input type="text" name="button_text"
                           value="{{ old('button_text', $hero->button_text ?? '') }}"
                           class="@error('button_text') border-red-500 @enderror"
                           placeholder="Contoh: Pesan Sekarang">
                    @error('button_text')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Link Button</label>
                    <input type="text" name="button_link"
                           value="{{ old('button_link', $hero->button_link ?? '') }}"
                           class="@error('button_link') border-red-500 @enderror"
                           placeholder="Contoh: #paket atau https://...">
                    @error('button_link')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- BAGIAN STATISTIK -->
        <div class="section-divider">
            <div class="section-title">
                <i class="fas fa-chart-bar"></i> Statistik
            </div>
            <p class="form-hint" style="margin-bottom: 1rem;">Tambahkan statistik yang ingin ditampilkan di banner (opsional)</p>

            <div class="stats-container" id="statsContainer">
                @forelse($hero->stats ?? [] as $index => $stat)
                    <div class="stat-item" data-index="{{ $index }}">
                        <div class="stat-item-header">
                            <span class="stat-item-number">{{ $index + 1 }}</span>
                            <button type="button" class="btn-remove-stat" onclick="removeStat(this)">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </div>
                        <div class="grid-2col">
                            <div class="form-group">
                                <label>Label Statistik</label>
                                <input type="text" name="stats[{{ $index }}][label]"
                                       value="{{ $stat->label }}"
                                       placeholder="Contoh: Pengunjung/Bulan">
                            </div>
                            <div class="form-group">
                                <label>Nilai Statistik</label>
                                <input type="text" name="stats[{{ $index }}][value]"
                                       value="{{ $stat->value }}"
                                       placeholder="Contoh: 50K+">
                            </div>
                            <div class="form-group">
                                <label>Icon (Optional)</label>
                                <input type="text" name="stats[{{ $index }}][icon]"
                                       value="{{ $stat->icon }}"
                                       placeholder="Contoh: fas fa-users">
                                <p class="form-hint">Gunakan Font Awesome class</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div id="emptyStats" style="text-align: center; padding: 2rem; color: var(--neutral);">
                        <p><i class="fas fa-inbox" style="font-size: 2rem; margin-bottom: 0.5rem; display: block;"></i></p>
                        <p>Belum ada statistik. Klik tombol "Tambah Statistik" untuk menambahkan.</p>
                    </div>
                @endforelse
            </div>

            <button type="button" class="btn-add-stat" onclick="addStat()">
                <i class="fas fa-plus"></i> Tambah Statistik
            </button>
        </div>

        <!-- FORM ACTIONS -->
        <div class="form-actions">
            <button type="submit" class="btn btn-save">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-cancel">
                <i class="fas fa-times"></i> Batal
            </a>
        </div>
    </form>
</div>

@if ($errors->any())
    <div style="margin-top: 1.5rem; background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.3); border-radius: 6px; padding: 1rem; color: var(--danger);">
        <p style="font-weight: 700; margin: 0 0 0.5rem 0;"><i class="fas fa-exclamation-circle"></i> Ada kesalahan:</p>
        <ul style="margin: 0; padding-left: 1.5rem;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div style="margin-top: 1.5rem; background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.3); border-radius: 6px; padding: 1rem; color: #047857;">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
@endif

<script>
    let statCount = {{ count($hero->stats ?? []) }};

    function addStat() {
        const container = document.getElementById('statsContainer');
        const emptyState = document.getElementById('emptyStats');

        if (emptyState) {
            emptyState.remove();
        }

        const statHtml = `
            <div class="stat-item" data-index="${statCount}">
                <div class="stat-item-header">
                    <span class="stat-item-number">${statCount + 1}</span>
                    <button type="button" class="btn-remove-stat" onclick="removeStat(this)">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </div>
                <div class="grid-2col">
                    <div class="form-group">
                        <label>Label Statistik</label>
                        <input type="text" name="stats[${statCount}][label]"
                               placeholder="Contoh: Pengunjung/Bulan">
                    </div>
                    <div class="form-group">
                        <label>Nilai Statistik</label>
                        <input type="text" name="stats[${statCount}][value]"
                               placeholder="Contoh: 50K+">
                    </div>
                    <div class="form-group">
                        <label>Icon (Optional)</label>
                        <input type="text" name="stats[${statCount}][icon]"
                               placeholder="Contoh: fas fa-users">
                        <p class="form-hint">Gunakan Font Awesome class</p>
                    </div>
                </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', statHtml);
        statCount++;
        updateStatNumbers();
    }

    function removeStat(btn) {
        btn.closest('.stat-item').remove();
        updateStatNumbers();

        const container = document.getElementById('statsContainer');
        if (container.children.length === 0) {
            container.innerHTML = `
                <div id="emptyStats" style="text-align: center; padding: 2rem; color: var(--neutral);">
                    <p><i class="fas fa-inbox" style="font-size: 2rem; margin-bottom: 0.5rem; display: block;"></i></p>
                    <p>Belum ada statistik. Klik tombol "Tambah Statistik" untuk menambahkan.</p>
                </div>
            `;
        }
    }

    function updateStatNumbers() {
        document.querySelectorAll('.stat-item').forEach((item, index) => {
            const numberBadge = item.querySelector('.stat-item-number');
            if (numberBadge) {
                numberBadge.textContent = index + 1;
            }
        });
    }
</script>

@endsection