<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SMKN 7 Bandar Lampung</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background-color: #f5f7fa; display: flex; align-items: center; justify-content: center; min-height: 100vh; }
        .login-card { background: white; width: 100%; max-width: 400px; padding: 2.5rem; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        h1 { font-size: 1.5rem; color: #1a1a2e; margin-bottom: 0.5rem; }
        p { color: #7f8c8d; margin-bottom: 2rem; font-size: 0.9rem; }
        .form-group { margin-bottom: 1.25rem; }
        label { display: block; margin-bottom: 0.5rem; font-weight: 600; color: #2c3e50; font-size: 0.9rem; }
        input { width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 6px; font-size: 1rem; }
        input:focus { outline: none; border-color: #ECB65F; box-shadow: 0 0 0 3px rgba(236, 182, 95, 0.1); }
        button { width: 100%; padding: 0.75rem; background: linear-gradient(135deg, #ECB65F, #d4a657); color: white; border: none; border-radius: 6px; font-weight: 700; cursor: pointer; transition: all 0.3s; }
        button:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(236, 182, 95, 0.4); }
        .error { color: #e74c3c; font-size: 0.85rem; margin-bottom: 1rem; background: #fdeaea; padding: 0.5rem; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="login-card">
        <h1>Login Admin</h1>
        <p>Masuk untuk mengelola sistem SMKN 7 Bandar Lampung.</p>

        @if($errors->any())
            <div class="error">⚠️ {{ $errors->first() }}</div>
        @endif

        <form action="{{ route('dashboard.login.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
