@extends('dashboard.layouts.app')

@section('title', 'Buat User Baru')
@section('page_title', 'Buat User Baru')

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
        margin-top: 0.25rem;
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
    <form action="{{ route('dashboard.users.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label class="form-label">👤 Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-input" placeholder="Masukkan nama lengkap..." required>
        </div>

        <div class="form-group">
            <label class="form-label">📧 Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-input" placeholder="admin@smkn7.sch.id" required>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label">🔐 Password</label>
                <input type="password" name="password" class="form-input" placeholder="Minimal 8 karakter" required>
                <div class="password-info">Minimal 8 karakter</div>
            </div>
            <div class="form-group">
                <label class="form-label">✓ Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-input" placeholder="Ulangi password" required>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">🎭 Role</label>
            <select name="role" class="form-select" required>
                <option value="" disabled selected>Pilih role...</option>
                <option value="admin">Admin</option>
                <option value="guru">Guru</option>
            </select>
        </div>

        <div class="form-actions">
            <a href="{{ route('dashboard.users.index') }}" class="btn-outline">← Batal</a>
            <button type="submit" class="btn-primary">✅ Simpan User</button>
        </div>
    </form>
</div>
@endsection
