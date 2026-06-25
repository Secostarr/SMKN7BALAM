<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Dashboard - SMKN7</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body class="min-h-screen bg-light flex flex-col">

    <nav class="bg-primary nav-container">
        <div class="container nav-container">
            <a href="{{ route('index') }}" class="logo">SMKN 7 Bandar Lampung</a>
        </div>
    </nav>

    <div class="login-wrapper">
        <div class="login-card">
            <h1 class="text-2xl font-bold">Login Admin</h1>
            <p class="text-sm text-muted">Masuk untuk mengelola berita dan pengumuman.</p>

            @if($errors->any())
                <div class="text-red-600 mb-4">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('dashboard.login.post') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block mb-2 font-semibold">Email</label>
                    <input type="email" name="email" class="form-input" required>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 font-semibold">Password</label>
                    <input type="password" name="password" class="form-input" required>
                </div>
                <button class="btn-primary">Login</button>
            </form>

            <p class="text-xs text-muted mt-4">Gunakan kredensial admin untuk mengakses dashboard.</p>
        </div>
    </div>

</body>
</html>