@extends('dashboard.layouts.app')

@section('title', 'Kelola Testimoni')
@section('page_title', 'Kelola Testimoni')

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

    .role-badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        background: #e8f4f8;
        color: #16a085;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 600;
    }
</style>

@if(session('success'))
    <div class="alert alert-success">
        ✅ {{ session('success') }}
    </div>
@endif

<div class="panel">
    <div class="panel-header">
        <h3 class="panel-title">⭐ Daftar Testimoni</h3>
        <div style="display: flex; gap: 0.5rem;">
            <a href="{{ route('dashboard.index') }}" class="btn-outline">← Kembali</a>
            <a href="{{ route('dashboard.testimonials.create') }}" class="btn-primary">+ Tambah Testimoni</a>
        </div>
    </div>

    @if($testimonial->count() > 0)
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th style="width: 25%;">Nama Alumni</th>
                        <th style="width: 20%;">Peran/Angkatan</th>
                        <th style="width: 40%;">Isi Testimoni</th>
                        <th style="width: 15%; text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonial as $testi)
                        <tr>
                            <td>
                                <div style="font-weight: 600; color: #2c3e50;">{{ $testi->name }}</div>
                            </td>
                            <td>
                                @if($testi->role)
                                    <span class="role-badge">{{ $testi->role }}</span>
                                @else
                                    <span style="color: #95a5a6;">-</span>
                                @endif
                            </td>
                            <td>
                                <div style="color: #555; font-size: 0.9rem;">{{ Str::limit($testi->content, 60) }}</div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('dashboard.testimonials.edit', $testi) }}" class="action-btn btn-edit">✏️ Edit</a>
                                    <form action="{{ route('dashboard.testimonials.destroy', $testi) }}" method="POST" style="display:inline; margin:0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn btn-delete" onclick="return confirm('Hapus testimoni ini?')">🗑️ Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center; color: #888; padding: 2rem;">Belum ada testimoni.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($testimonial->hasPages())
            <div class="pagination">
                {{ $testimonial->links() }}
            </div>
        @endif
    @else
        <div class="empty-state">
            <div class="empty-state-icon">⭐</div>
            <h4 style="margin: 1rem 0; font-size: 1.1rem;">Belum ada testimoni</h4>
            <p>Mulai dengan menambahkan testimoni dari alumni untuk membangun kredibilitas sekolah.</p>
            <a href="{{ route('dashboard.testimonials.create') }}" class="btn-primary" style="margin-top: 1rem;">+ Tambah Testimoni Pertama</a>
        </div>
    @endif
</div>
@endsection
