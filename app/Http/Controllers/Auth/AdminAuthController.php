<?php

// app/Http/Controllers/Auth/AdminAuthController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    /**
     * Tampilkan form login admin.
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Proses login admin.
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Coba autentikasi
        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            // Regenerate session untuk mencegah session fixation
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        // Jika gagal, kembali dengan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email'));
    }

    /**
     * Proses logout admin.
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}

