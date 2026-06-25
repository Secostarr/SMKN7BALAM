@extends('dashboard.layouts.app')

@section('title', 'Buat User Baru')
@section('page_title', 'Buat User Baru')

@section('content')

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
