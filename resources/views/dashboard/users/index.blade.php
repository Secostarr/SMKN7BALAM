<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola User - Dashboard</title>
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
                    <h1 style="color: var(--dark); font-size: 1.8rem; font-weight: 800;">Kelola User</h1>
                    <div>
                        <a href="{{ route('dashboard.index') }}" class="btn-outline" style="margin-right: 8px;">Kembali</a>
                        <a href="{{ route('dashboard.users.create') }}" class="btn-primary" style="padding: 0.6rem 1.2rem; display: inline-block;">+ Buat User Baru</a>
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
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th style="text-align: right;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $u)
                        <tr>
                            <td style="font-weight: 600; color: var(--dark);">{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td style="text-align: right; gap: 8px; display: flex; justify-content: flex-end;">
                                <a href="{{ route('dashboard.users.edit', $u) }}" class="action-btn btn-edit">Edit</a>
                                
                                <form action="{{ route('dashboard.users.destroy', $u) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn btn-delete" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" style="text-align: center; color: #888; padding: 2rem;">Belum ada user yang terdaftar.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div style="margin-top: 1.5rem;">
                    {{ $users->links() }}
                </div>

            </main>
        </div>
    </div>

</body>
</html>