@extends('dashboard.layouts.app')

@section('title', 'Kelola Users')
@section('page_title', 'Kelola Users')

@section('content')
<style>
    .panel {
        background: white;
        border-radius: 10px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .panel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f0f0f0;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .panel-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #2c3e50;
        margin: 0;
    }

    .btn-primary {
        background: linear-gradient(135deg, #ECB65F, #d4a657);
        color: white;
        padding: 0.7rem 1.5rem;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        display: inline-block;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(236, 182, 95, 0.4);
    }

    .btn-outline {
        background: white;
        color: #ECB65F;
        padding: 0.7rem 1.5rem;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        border: 2px solid #ECB65F;
        cursor: pointer;
        display: inline-block;
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

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-color: #c3e6cb;
    }

    .table-responsive {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table thead {
        background-color: #f8f9fa;
        border-bottom: 2px solid #e9ecef;
    }

    table th {
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        color: #495057;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    table td {
        padding: 1rem;
        border-bottom: 1px solid #e9ecef;
    }

    table tbody tr:hover {
        background-color: #f8f9fa;
    }

    .action-btn {
        display: inline-block;
        padding: 0.5rem 1rem;
        margin-right: 0.5rem;
        border-radius: 4px;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-edit {
        background-color: #3498db;
        color: white;
    }

    .btn-edit:hover {
        background-color: #2980b9;
    }

    .btn-delete {
        background-color: #e74c3c;
        color: white;
    }

    .btn-delete:hover {
        background-color: #c0392b;
    }

    .empty-state {
        text-align: center;
        padding: 3rem 1rem;
        color: #7f8c8d;
    }

    .empty-state-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .pagination {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 2rem;
        flex-wrap: wrap;
    }

    .pagination a,
    .pagination span {
        padding: 0.5rem 0.75rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        text-decoration: none;
        color: #ECB65F;
        transition: all 0.3s ease;
    }

    .pagination a:hover {
        background-color: #ECB65F;
        color: white;
    }

    .pagination .active {
        background-color: #ECB65F;
        color: white;
        border-color: #ECB65F;
    }

    .user-email {
        color: #95a5a6;
        font-size: 0.9rem;
    }
</style>

@if(session('success'))
    <div class="alert alert-success">
        ✅ {{ session('success') }}
    </div>
@endif

<div class="panel">
    <div class="panel-header">
        <h3 class="panel-title">👥 Daftar Users</h3>
        <div style="display: flex; gap: 0.5rem;">
            <a href="{{ route('dashboard.index') }}" class="btn-outline">← Kembali</a>
            <a href="{{ route('dashboard.users.create') }}" class="btn-primary">+ Buat User Baru</a>
        </div>
    </div>

    @if($users->count() > 0)
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $u)
                        <tr>
                            <td>
                                <div style="font-weight: 600; color: #2c3e50;">{{ $u->name }}</div>
                            </td>
                            <td>
                                <div class="user-email">{{ $u->email }}</div>
                            </td>
                            <td>
                                <span style="display: inline-block; padding: 0.25rem 0.75rem; background: #ECB65F; color: white; border-radius: 12px; font-size: 0.8rem; font-weight: 600;">
                                    {{ ucfirst($u->role ?? 'user') }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('dashboard.users.edit', $u) }}" class="action-btn btn-edit">✏️ Edit</a>
                                    <form action="{{ route('dashboard.users.destroy', $u) }}" method="POST" style="display:inline; margin:0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn btn-delete" onclick="return confirm('Yakin ingin menghapus user ini?')">🗑️ Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center; color: #888; padding: 2rem;">Belum ada user yang terdaftar.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
            <div class="pagination">
                {{ $users->links() }}
            </div>
        @endif
    @else
        <div class="empty-state">
            <div class="empty-state-icon">👤</div>
            <h4 style="margin: 1rem 0; font-size: 1.1rem;">Belum ada user</h4>
            <p>Mulai dengan membuat user admin baru untuk mengelola website.</p>
            <a href="{{ route('dashboard.users.create') }}" class="btn-primary" style="margin-top: 1rem;">+ Buat User Pertama</a>
        </div>
    @endif
</div>
@endsection
