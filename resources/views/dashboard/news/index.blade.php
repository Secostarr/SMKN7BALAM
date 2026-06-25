<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin - SMKN 7 Bandar Lampung</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body class="dashboard-page">

    <nav>
        <div class="container nav-container">
            <a href="/" class="logo">SMKN 7 Bandar Lampung</a>
            <ul>
                <li><a href="/" style="color: var(--dark);">Lihat Website</a></li>
                <li>
                    <form action="/logout" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn-logout">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="dashboard-wrapper">
        <div class="dashboard-layout">

            <main class="dashboard-main">
                
                <div style="background: linear-gradient(135deg, var(--primary, #f6b64d) 0%, #eab308 100%); border-radius: 12px; padding: 2rem; color: var(--dark); margin-bottom: 2rem; box-shadow: var(--shadow-md);">
                    <h1 style="font-size: 2rem; margin-bottom: 0.5rem; font-weight: 800;">Selamat Datang di Kelola Berita</h1>
                    <p style="font-size: 1.1rem; opacity: 0.9;">Kelola konten situs, berita, dan pengumuman sekolah dari sini dengan mudah.</p>
                </div>

                <div class="mt-6 panel">
                    <div class="flex" style="justify-content:space-between;align-items:center;margin-bottom:12px;">
                        <h3 style="margin:0">Daftar Berita</h3>
                        <a href="{{ route('dashboard.news.create') }}" class="btn-primary">Buat Berita Baru</a>
                    </div>

                    <table class="table-dashboard">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Tanggal Terbit</th>
                                <th style="width:160px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($news as $item)
                            <tr>
                                <td>
                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" class="news-list-thumb" alt="thumb">
                                    @endif
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>{{ \Illuminate\Support\Carbon::parse($item->published_at ?? $item->created_at)->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('dashboard.news.edit', $item) }}" class="action-btn btn-edit">Edit</a>
                                    <form action="{{ route('dashboard.news.destroy', $item) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="action-btn btn-delete" type="submit" onclick="return confirm('Hapus berita?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">{{ $news->links() }}</div>
                </div>
            </main>

        </div>
    </div>

</body>
</html>