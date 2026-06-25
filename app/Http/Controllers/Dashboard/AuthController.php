<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('dashboard.auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                $request->session()->regenerate();
                return redirect()->route('dashboard.index');
            }

            Auth::logout();
            return back()->withErrors(['email' => 'Anda tidak memiliki akses ke dashboard']);
        }

        return back()->withErrors(['email' => 'Kredensial tidak valid']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('dashboard.login');
    }
}
