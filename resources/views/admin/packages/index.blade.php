@extends('layouts.admin')
@section('title', 'Kelola Paket')
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

    .badge-popular {
        display: inline-block;
        margin-left: 0.5rem;
        padding: 0.25rem 0.6rem;
        background: rgba(234, 179, 8, 0.15);
        color: #92400E;
        font-size: 0.7rem;
        font-weight: 700;
        border-radius: 5px;
        white-space: nowrap;
    }

    .price-cell {
        color: var(--secondary);
        font-weight: 700;
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
    select,
    textarea {
        width: 100%;
        padding: 0.65rem 0.8rem;
        border: 1px solid var(--border);
        border-radius: 6px;
        font-family: inherit;
        font-size: 0.9rem;
        transition: all 0.15s ease;
        box-sizing: border-box;
        background: white;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="file"]:focus,
    select:focus,
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
        margin-bottom: 0.6rem;
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

    .feature-list {
        background: rgba(249, 115, 22, 0.05);
        border: 1px solid var(--border);
        border-radius: 6px;
        padding: 0.8rem;
        max-height: 150px;
        overflow-y: auto;
    }

    .feature-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.6rem;
        background: white;
        border: 1px solid var(--border);
        border-radius: 4px;
        margin-bottom: 0.6rem;
        font-size: 0.9rem;
    }

    .feature-item:last-child {
        margin-bottom: 0;
    }

    .feature-remove {
        background: rgba(239, 68, 68, 0.1);
        color: #EF4444;
        border: none;
        padding: 0.3rem 0.6rem;
        border-radius: 4px;
        cursor: pointer;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .feature-remove:hover {
        background: rgba(239, 68, 68, 0.2);
    }

    .feature-input-wrapper {
        display: flex;
        gap: 0.5rem;
    }

    .feature-input-wrapper input {
        flex: 1;
    }

    .feature-add-btn {
        padding: 0.65rem 0.8rem;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        font-size: 0.85rem;
        white-space: nowrap;
    }

    .feature-add-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3);
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

        .feature-input-wrapper {
            flex-direction: column;
        }

        .feature-add-btn {
            width: 100%;
        }
    }
</style>

<div class="section-header">
    <div>
        <h1>Kelola Paket</h1>
        <p class="section-header-desc">Manage semua paket Balong Hardi</p>
    </div>
    <button class="btn-create" onclick="openModal('addModal')">
        <i class="fas fa-plus"></i> Tambah Paket
    </button>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Durasi</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th style="width: 140px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($packages as $package)
                    <tr>
                        <td>
                            <div class="name-cell">
                                <span>{{ $package->name }}</span>
                                @if($package->is_popular)
                                    <span class="badge-popular">⭐ POPULER</span>
                                @endif
                            </div>
                        </td>
                        <td>{{ $package->time_range }}</td>
                        <td>
                            <span class="price-cell">Rp {{ number_format($package->price, 0, ',', '.') }}</span>
                        </td>
                        <td>
                            <span class="badge {{ $package->is_active ? 'badge-active' : 'badge-inactive' }}">
                                {{ $package->is_active ? '✓ Aktif' : '✗ Nonaktif' }}
                            </span>
                        </td>
                        <td>
                            <div class="action-group">
                                <button onclick="openEditModal('{{ $package->id }}', '{{ $package->name }}', '{{ $package->time_range }}', '{{ $package->price }}', '{{ $package->is_popular }}', '{{ $package->is_active }}', '{{ $package->order }}')" class="btn-icon btn-edit" data-features='{{ json_encode($package->features->pluck("feature")->toArray()) }}'>
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.packages.destroy', $package) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
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
                        <td colspan="5">
                            <div class="empty-container">
                                <div class="empty-icon">📭</div>
                                <p class="empty-text">Belum ada paket</p>
                                <button class="btn-create" onclick="openModal('addModal')">
                                    <i class="fas fa-plus"></i> Tambah Paket
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($packages->hasPages())
        <div style="padding: 1rem; text-align: center; border-top: 1px solid var(--border);">
            {{ $packages->links('pagination::bootstrap-4') }}
        </div>
    @endif
</div>

<!-- Modal Add Paket -->
<div class="modal-overlay" id="addModal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal('addModal')">&times;</button>
        <div class="modal-header">
            <h2>➕ Tambah Paket</h2>
            <p>Tambahkan paket baru ke Balong Hardi</p>
        </div>

        <form action="{{ route('admin.packages.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Paket <span class="required">*</span></label>
                <input type="text" id="name" name="name" placeholder="Contoh: Paket Reguler" value="{{ old('name') }}" required>
                @error('name')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="time_range">Durasi <span class="required">*</span></label>
                <input type="text" id="time_range" name="time_range" placeholder="Contoh: 08.00 - 17.00" value="{{ old('time_range') }}" required>
                @error('time_range')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="price">Harga <span class="required">*</span></label>
                <input type="number" id="price" name="price" min="0" placeholder="Contoh: 25000" value="{{ old('price') }}" required>
                @error('price')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="order">Urutan</label>
                <input type="number" id="order" name="order" min="0" placeholder="Contoh: 1" value="{{ old('order', 0) }}">
                @error('order')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Fitur Paket</label>
                <div class="feature-input-wrapper">
                    <input type="text" id="feature_input" placeholder="Tambahkan fitur paket..." />
                    <button type="button" class="feature-add-btn" onclick="addFeature('addModal')">Tambah</button>
                </div>
                <div id="feature_list_add" class="feature-list" style="margin-top: 0.8rem; display: none;">
                </div>
                @error('features')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <div class="checkbox-wrap">
                    <input type="checkbox" id="is_popular" name="is_popular" value="1" {{ old('is_popular') ? 'checked' : '' }}>
                    <label for="is_popular">Tandai sebagai paket populer</label>
                </div>
                <div class="checkbox-wrap">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
                    <label for="is_active">Aktifkan paket ini</label>
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

<!-- Modal Edit Paket -->
<div class="modal-overlay" id="editModal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal('editModal')">&times;</button>
        <div class="modal-header">
            <h2>✏️ Edit Paket</h2>
            <p>Perbarui informasi paket</p>
        </div>

        <form action="" method="POST" id="editForm">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="edit_name">Nama Paket <span class="required">*</span></label>
                <input type="text" id="edit_name" name="name" placeholder="Contoh: Paket Reguler" required>
                @error('name')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="edit_time_range">Durasi <span class="required">*</span></label>
                <input type="text" id="edit_time_range" name="time_range" placeholder="Contoh: 08.00 - 17.00" required>
                @error('time_range')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="edit_price">Harga <span class="required">*</span></label>
                <input type="number" id="edit_price" name="price" min="0" placeholder="Contoh: 25000" required>
                @error('price')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="edit_order">Urutan</label>
                <input type="number" id="edit_order" name="order" min="0" placeholder="Contoh: 1">
                @error('order')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Fitur Paket</label>
                <div class="feature-input-wrapper">
                    <input type="text" id="edit_feature_input" placeholder="Tambahkan fitur paket..." />
                    <button type="button" class="feature-add-btn" onclick="addFeature('editModal')">Tambah</button>
                </div>
                <div id="feature_list_edit" class="feature-list" style="margin-top: 0.8rem;">
                </div>
                @error('features')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <div class="checkbox-wrap">
                    <input type="checkbox" id="edit_is_popular" name="is_popular" value="1">
                    <label for="edit_is_popular">Tandai sebagai paket populer</label>
                </div>
                <div class="checkbox-wrap">
                    <input type="checkbox" id="edit_is_active" name="is_active" value="1">
                    <label for="edit_is_active">Aktifkan paket ini</label>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-save">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <button type="button" class="btn btn-cancel" onclick="closeModal('editModal')">
                    <i class="fas fa-times"></i> Batal
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    let currentModalFeatures = {
        addModal: [],
        editModal: []
    };

    function openModal(modalId) {
        document.getElementById(modalId).classList.add('active');
        document.body.style.overflow = 'hidden';
        if (modalId === 'addModal') {
            currentModalFeatures.addModal = [];
            renderFeatures('addModal');
            document.getElementById('feature_input').value = '';
        }
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    function openEditModal(packageId, name, timeRange, price, isPopular, isActive, order) {
        const button = event.target.closest('.btn-edit');
        const featuresData = button.getAttribute('data-features');
        const features = JSON.parse(featuresData);
        
        currentModalFeatures.editModal = features;
        
        document.getElementById('editForm').action = `/admin/packages/${packageId}`;
        document.getElementById('edit_name').value = name;
        document.getElementById('edit_time_range').value = timeRange;
        document.getElementById('edit_price').value = price;
        document.getElementById('edit_order').value = order;
        document.getElementById('edit_is_popular').checked = isPopular == 1;
        document.getElementById('edit_is_active').checked = isActive == 1;
        document.getElementById('edit_feature_input').value = '';
        
        renderFeatures('editModal');
        openModal('editModal');
    }

    function addFeature(modalId) {
        const inputId = modalId === 'addModal' ? 'feature_input' : 'edit_feature_input';
        const input = document.getElementById(inputId);
        const feature = input.value.trim();
        
        if (feature === '') {
            alert('Masukkan fitur paket terlebih dahulu');
            return;
        }
        
        if (currentModalFeatures[modalId].includes(feature)) {
            alert('Fitur ini sudah ditambahkan');
            return;
        }
        
        currentModalFeatures[modalId].push(feature);
        input.value = '';
        renderFeatures(modalId);
    }

    function removeFeature(modalId, index) {
        currentModalFeatures[modalId].splice(index, 1);
        renderFeatures(modalId);
    }

    function renderFeatures(modalId) {
        const listId = modalId === 'addModal' ? 'feature_list_add' : 'feature_list_edit';
        const listContainer = document.getElementById(listId);
        const features = currentModalFeatures[modalId];
        
        if (features.length === 0) {
            listContainer.style.display = 'none';
            listContainer.innerHTML = '';
            return;
        }
        
        listContainer.style.display = 'block';
        listContainer.innerHTML = features.map((feature, index) => `
            <div class="feature-item">
                <span>${feature}</span>
                <button type="button" class="feature-remove" onclick="removeFeature('${modalId}', ${index})">
                    <i class="fas fa-trash"></i> Hapus
                </button>
            </div>
        `).join('');
        
        updateFeatureInputs(modalId);
    }

    function updateFeatureInputs(modalId) {
        const formId = modalId === 'addModal' ? 'addForm' : 'editForm';
        const form = document.querySelector(`form[id="${formId}"]`) || 
                     (modalId === 'addModal' ? document.querySelector('#addModal form') : document.getElementById('editForm'));
        
        form.querySelectorAll('input[name="features[]"]').forEach(el => el.remove());
        
        currentModalFeatures[modalId].forEach(feature => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'features[]';
            input.value = feature;
            form.appendChild(input);
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const addForm = document.querySelector('#addModal form');
        if (addForm) {
            addForm.addEventListener('submit', function() {
                updateFeatureInputs('addModal');
            });
        }

        document.getElementById('editForm').addEventListener('submit', function() {
            updateFeatureInputs('editModal');
        });
    });

    document.querySelectorAll('.modal-overlay').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal(this.id);
            }
        });
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal-overlay.active').forEach(modal => {
                closeModal(modal.id);
            });
        }
    });

    document.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            if (e.target.id === 'feature_input') {
                e.preventDefault();
                addFeature('addModal');
            } else if (e.target.id === 'edit_feature_input') {
                e.preventDefault();
                addFeature('editModal');
            }
        }
    });
</script>

@endsection