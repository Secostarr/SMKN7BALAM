@extends('dashboard.layouts.app')

@section('title', 'Kelola Users')
@section('page_title', 'Kelola Users')

@section('content')
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
