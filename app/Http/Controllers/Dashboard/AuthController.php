<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('dashboard.auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        // Try database users first
        $user = \App\Models\User::where('email', $data['email'])->first();
        if ($user && \Illuminate\Support\Facades\Hash::check($data['password'], $user->password)) {
            // only allow admin role
            if (isset($user->role) && $user->role === 'admin') {
                session(['is_admin' => true, 'user_id' => $user->id]);
                
                auth()->login($user); 
                
                return redirect()->route('dashboard.index');
            }
        }

        // Fallback to env admin (backwards compatibility)
        $adminEmail = env('ADMIN_EMAIL');
        $adminPass = env('ADMIN_PASSWORD');

        if ($data['email'] === $adminEmail && $data['password'] === $adminPass) {
            session(['is_admin' => true]);
            return redirect()->route('dashboard.index');
        }

        return back()->withErrors(['email' => 'Kredensial salah']);
    }

    public function logout(Request $request)
    {
        // Logout dari sistem bawaan Laravel
        auth()->logout(); 
        
        // Hancurkan semua session dan buat token CSRF baru (Paling Aman)
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('dashboard.login');
    }
}
