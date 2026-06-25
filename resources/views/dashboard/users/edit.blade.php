@extends('dashboard.layouts.app')

@section('title', 'Edit User')
@section('page_title', 'Edit User')

@section('content')
<style>
    .form-container {
        background: white;
        border-radius: 10px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        max-width: 600px;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #2c3e50;
        font-size: 0.95rem;
    }

    .form-input,
    .form-select {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-family: inherit;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .form-input:focus,
    .form-select:focus {
        outline: none;
        border-color: #ECB65F;
        box-shadow: 0 0 0 3px rgba(236, 182, 95, 0.1);
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #f0f0f0;
    }

    .btn-primary {
        background: linear-gradient(135deg, #ECB65F, #d4a657);
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(236, 182, 95, 0.4);
    }

    .btn-outline {
        background: white;
        color: #ECB65F;
        padding: 0.75rem 2rem;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        border: 2px solid #ECB65F;
        cursor: pointer;
    }

    .btn-outline:hover {
        background: #ECB65F;
        color: white;
    }

    .alert {
        padding: 1rem;
        border-radius: 6px;
        margin-bottom: 1.5rem;
        border-left: 4px solid;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border-color: #f5c6cb;
    }

    .alert ul {
        margin: 0;
        padding-left: 1.5rem;
    }

    .alert li {
        margin: 0.25rem 0;
    }

    .password-info {
        font-size: 0.85rem;
        color: #7f8c8d;
        margin-top: -0.75rem;
        margin-bottom: 1rem;
    }

    .user-info {
        background: #f8f9fa;
        padding: 1rem;
        border-radius: 6px;
        margin-bottom: 1.5rem;
        border-left: 4px solid #ECB65F;
    }

    .user-info-item {
        font-size: 0.9rem;
        margin: 0.5rem 0;
    }

    .user-info-label {
        font-weight: 600;
        color: #2c3e50;
    }

    .user-info-value {
        color: #7f8c8d;
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .btn-primary {
            width: 100%;
        }
    }
</style>

@if($errors->any())
    <div class="alert alert-danger">
        <strong>⚠️ Ada kesalahan:</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-container">
    <div class="user-info">
        <div class="user-info-item">
            <span class="user-info-label">ID User:</span>
            <span class="user-info-value">#{{ $user->id }}</span>
        </div>
        <div class="user-info-item">
            <span class="user-info-label">Dibuat:</span>
            <span class="user-info-value">{{ $user->created_at->format('d M Y H:i') }}</span>
        </div>
    </div>

    <form action="{{ route('dashboard.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">👤 Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-input" required>
        </div>

        <div class="form-group">
            <label class="form-label">📧 Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-input" required>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label">🔐 Password Baru</label>
                <input type="password" name="password" class="form-input" placeholder="Isi jika ingin ganti">
                <div class="password-info">* Biarkan kosong jika tidak ingin mengubah</div>
            </div>
            <div class="form-group">
                <label class="form-label">✓ Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-input" placeholder="Ulangi password baru">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">🎭 Role</label>
            <select name="role" class="form-select" required>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="guru" {{ $user->role === 'guru' ? 'selected' : '' }}>Guru</option>
            </select>
        </div>

        <div class="form-actions">
            <a href="{{ route('dashboard.users.index') }}" class="btn-outline">← Batal</a>
            <button type="submit" class="btn-primary">✅ Perbarui User</button>
        </div>
    </form>
</div>
@endsection
