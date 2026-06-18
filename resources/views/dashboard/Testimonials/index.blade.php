<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Testimoni - Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}?v={{ time() }}">
</head>
<body class="dashboard-page">

    <nav>
        <div class="container nav-container">
            <a href="/" class="logo">SMKN 7 Bandar Lampung</a>
            <ul>
                <li><a href="/" style="color: var(--dark);">Lihat Website</a></li>
                <li>
                    <form action="/logout" method="POST" style="display:inline; margin: 0;">
                        @csrf
                        <button type="submit" class="btn-logout">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="dashboard-wrapper">
        <div class="dashboard-layout container">
            
            <main class="dashboard-main panel">
                
                <div class="header-action">
                    <h1 style="color: var(--dark); font-size: 1.8rem; font-weight: 800;">Kelola Testimoni</h1>
                    <div>
                        <a href="{{ route('dashboard.index') }}" class="btn-outline" style="margin-right: 8px;">Kembali</a>
                        <a href="{{ route('dashboard.testimonials.create') }}" class="btn-primary" style="padding: 0.6rem 1.2rem; display: inline-block;">+ Tambah Testimoni</a>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table-dashboard">
                    <thead>
                        <tr>
                            <th style="width: 25%;">Nama Alumni</th>
                            <th style="width: 20%;">Peran/Angkatan</th>
                            <th style="width: 40%;">Isi Testimoni</th>
                            <th style="text-align: right; width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($testimonial as $testi)
                        <tr>
                            <td style="font-weight: 600; color: var(--dark);">{{ $testi->name }}</td>
                            <td>{{ $testi->role ?? '-' }}</td>
                            <td>{{ Str::limit($testi->content, 50) }}</td>
                            <td style="text-align: right; gap: 8px; display: flex; justify-content: flex-end;">
                                <a href="{{ route('dashboard.testimonials.edit', $testi) }}" class="action-btn btn-edit">Edit</a>
                                <form action="{{ route('dashboard.testimonials.destroy', $testi) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn btn-delete" onclick="return confirm('Hapus testimoni ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="text-align: center; color: #888; padding: 2rem;">Belum ada testimoni.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div style="margin-top: 1.5rem;">
                    {{ $testimonial->links() }}
                </div>

            </main>
        </div>
    </div>

</body>
</html>