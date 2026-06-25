<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - SMKN 7 Bandar Lampung</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f5f7fa !important;
            color: #2c3e50;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: #f0f0f0; /* Increased contrast for text */
            padding: 0;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .sidebar-logo {
            font-size: 1.3rem;
            font-weight: 700;
            color: #ECB65F;
            text-decoration: none;
            display: block;
        }

        .sidebar-nav {
            padding: 1.5rem 0;
        }

        .sidebar-nav a,
        .sidebar-nav button {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            color: #ccc; /* Ensure good contrast */
            text-decoration: none;
            border: none;
            background: none;
            cursor: pointer;
            width: 100%;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .sidebar-nav a:hover,
        .sidebar-nav button:hover {
            background-color: rgba(236, 182, 95, 0.1);
            color: #ECB65F;
            padding-left: 2rem;
        }

        .sidebar-nav a.active {
            background-color: #ECB65F;
            color: #1a1a2e;
            border-left: 4px solid #d4a657;
            padding-left: 1.46rem;
        }

        .sidebar-nav i {
            margin-right: 0.75rem;
            width: 20px;
            text-align: center;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Main Content */
        .main-wrapper {
            margin-left: 260px;
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: #f5f7fa; /* Ensure background is consistent */
        }

        .topbar {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 999;
        }

        .topbar-left h2 {
            font-size: 1.5rem;
            color: #2c3e50;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ECB65F, #d4a657);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .btn-logout {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background-color: #c0392b;
        }

        .main-content {
            flex: 1;
            padding: 2rem;
            overflow-y: auto;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                overflow: hidden;
            }

            .main-wrapper {
                margin-left: 0;
            }

            .topbar {
                padding: 1rem;
            }

            .main-content {
                padding: 1rem;
            }
        }

        /* Scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(236, 182, 95, 0.3);
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(236, 182, 95, 0.5);
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <a href="{{ route('index') }}" class="sidebar-logo">SMKN 7 BANDAR LAMPUNG</a>
            </div>

            <nav class="sidebar-nav">
                <a href="{{ route('dashboard.index') }}" class="@if(request()->routeIs('dashboard.index')) active @endif">
                    <i>📊</i>
                    Dashboard
                </a>
                <a href="{{ route('dashboard.news.index') }}" class="@if(request()->routeIs('dashboard.news.*')) active @endif">
                    <i>📰</i>
                    Berita
                </a>
                <a href="{{ route('dashboard.testimonials.index') }}" class="@if(request()->routeIs('dashboard.testimonials.*')) active @endif">
                    <i>⭐</i>
                    Testimoni
                </a>
                <a href="{{ route('dashboard.users.index') }}" class="@if(request()->routeIs('dashboard.users.*')) active @endif">
                    <i>👥</i>
                    Users
                </a>
            </nav>

            <div class="sidebar-footer">
                <form action="{{ route('dashboard.logout') }}" method="POST" style="width: 100%;">
                    @csrf
                    <button type="submit" class="btn-logout" style="width: 100%;">
                        <i>🚪</i>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="main-wrapper">
            <div class="topbar">
                <div class="topbar-left">
                    <h2>@yield('page_title', 'Dashboard')</h2>
                </div>
                <div class="topbar-right">
                    <div class="user-profile">
                        <div class="user-avatar">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div>
                            <p style="margin: 0; font-weight: 600;">{{ Auth::user()->name }}</p>
                            <p style="margin: 0; font-size: 0.85rem; color: #7f8c8d;">Admin</p>
                        </div>
                    </div>
                </div>
            </div>

            <main class="main-content">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
