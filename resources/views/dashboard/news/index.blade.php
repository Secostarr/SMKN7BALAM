@extends('dashboard.layouts.app')

@section('title', 'Kelola Berita')
@section('page_title', 'Kelola Berita')

@section('content')


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
