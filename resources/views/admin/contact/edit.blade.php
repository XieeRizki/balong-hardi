@extends('layouts.admin')
@section('title', 'Pengaturan Kontak')
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
        max-width: 800px; /* Sedikit dilebarkan untuk 2 kolom */
    }

    /* Tambahan khusus form kontak: Grid 2 Kolom */
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.25rem;
    }

    .form-group {
        margin-bottom: 1.25rem;
    }

    /* Menghilangkan margin bottom di dalam form-row agar sejajar */
    .form-row .form-group {
        margin-bottom: 0; 
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
    input[type="email"],
    input[type="url"],
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
    input[type="email"]:focus,
    input[type="url"]:focus,
    textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
    }

    textarea {
        resize: vertical;
        min-height: 100px;
        line-height: 1.6;
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

    .section-divider {
        height: 1px;
        background: var(--border);
        margin: 2rem 0 1.5rem 0;
    }

    .section-divider-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--secondary);
        margin-bottom: 1rem;
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
        max-width: 250px; /* Dibatasi agar tidak terlalu lebar */
    }

    .btn-save:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3);
    }

    @media (max-width: 768px) {
        .form-box {
            padding: 1.25rem;
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 1.25rem;
        }

        .form-row .form-group {
            margin-bottom: 0;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn-save {
            max-width: 100%;
        }
    }
</style>

<div class="form-header">
    <h1>Pengaturan Kontak</h1>
    <p>Kelola nomor telepon, alamat, dan sosial media untuk website utama</p>
</div>

<div class="form-box">
    {{-- Menggunakan style notifikasi sukses dari index blog[cite: 12] --}}
    @if(session('success'))
        <div style="margin-bottom: 1.5rem; background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.3); border-radius: 6px; padding: 0.9rem 1.1rem; color: #047857; font-size: 0.85rem;">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.contact.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="form-group">
                <label for="whatsapp">WhatsApp <span class="required">*</span></label>
                <input type="text" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $contact->whatsapp) }}" placeholder="Contoh: 628123456789" required>
                <div class="form-hint">Gunakan format 628xxx. Nomor ini untuk tombol reservasi.</div>
                @error('whatsapp')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="phone">No. Telepon</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $contact->phone) }}" placeholder="Contoh: 022-1234567">
                <div class="form-hint">Nomor telepon kantor (opsional).</div>
                @error('phone')<div class="form-error">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="form-row" style="margin-top: 1.25rem;">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $contact->email) }}" placeholder="Contoh: halo@balonghardi.com">
                @error('email')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="operational_hours">Jam Operasional</label>
                <input type="text" id="operational_hours" name="operational_hours" value="{{ old('operational_hours', $contact->operational_hours) }}" placeholder="Contoh: Senin - Minggu, 08:00 - 22:00">
                @error('operational_hours')<div class="form-error">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="form-group" style="margin-top: 1.25rem;">
            <label for="address">Alamat Lengkap</label>
            <textarea id="address" name="address" placeholder="Tuliskan alamat lengkap lokasi...">{{ old('address', $contact->address) }}</textarea>
            @error('address')<div class="form-error">{{ $message }}</div>@enderror
        </div>

        <div class="section-divider"></div>
        <h3 class="section-divider-title">Sosial Media</h3>

        <div class="form-row">
            <div class="form-group">
                <label for="instagram">Link Instagram</label>
                <input type="url" id="instagram" name="instagram" value="{{ old('instagram', $contact->instagram) }}" placeholder="https://instagram.com/balonghardi">
                @error('instagram')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="facebook">Link Facebook</label>
                <input type="url" id="facebook" name="facebook" value="{{ old('facebook', $contact->facebook) }}" placeholder="https://facebook.com/balonghardi">
                @error('facebook')<div class="form-error">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-save">
                <i class="fas fa-save"></i> Simpan Pengaturan
            </button>
        </div>
    </form>
</div>

@endsection