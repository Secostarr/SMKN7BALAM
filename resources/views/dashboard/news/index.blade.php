@extends('dashboard.layouts.app')

@section('title', 'Kelola Berita')
@section('page_title', 'Kelola Berita')

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

    .news-thumb {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 6px;
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
</style>

<div class="panel">
    <div class="panel-header">
        <h3 class="panel-title">📰 Daftar Berita</h3>
        <a href="{{ route('dashboard.news.create') }}" class="btn-primary">+ Buat Berita Baru</a>
    </div>

    @if($news->count() > 0)
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Tanggal Terbit</th>
                        <th style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $item)
                        <tr>
                            <td>
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" class="news-thumb" alt="thumb">
                                @else
                                    <div style="width: 60px; height: 60px; background: #e9ecef; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #95a5a6;">
                                        📷
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div style="font-weight: 600; color: #2c3e50;">{{ $item->title }}</div>
                                <div style="font-size: 0.85rem; color: #95a5a6; margin-top: 0.25rem;">{{ Str::limit($item->content, 50) }}</div>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($item->published_at ?? $item->created_at)->format('d M Y') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('dashboard.news.edit', $item) }}" class="action-btn btn-edit">✏️ Edit</a>
                                    <form action="{{ route('dashboard.news.destroy', $item) }}" method="POST" style="display:inline; margin:0;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="action-btn btn-delete" type="submit" onclick="return confirm('Hapus berita ini?')">🗑️ Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($news->hasPages())
            <div class="pagination">
                {{ $news->links() }}
            </div>
        @endif
    @else
        <div class="empty-state">
            <div class="empty-state-icon">📭</div>
            <h4 style="margin: 1rem 0; font-size: 1.1rem;">Belum ada berita</h4>
            <p>Mulai dengan membuat berita baru untuk mempopulerkan informasi sekolah.</p>
            <a href="{{ route('dashboard.news.create') }}" class="btn-primary" style="margin-top: 1rem;">+ Buat Berita Pertama</a>
        </div>
    @endif
</div>
@endsection
