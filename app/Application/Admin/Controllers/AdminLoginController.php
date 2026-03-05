<?php

namespace App\Application\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminLoginController extends Controller
{
    public function showLogin()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $validUsername = config('bandungcoding.admin.username', env('ADMIN_USERNAME', 'BandungCoding'));
        $validPassword = config('bandungcoding.admin.password', env('ADMIN_PASSWORD', 'fazrifahmi123'));

        if ($request->username === $validUsername && $request->password === $validPassword) {
            session(['admin_logged_in' => true, 'admin_username' => $request->username]);
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()
            ->withInput(['username' => $request->username])
            ->withErrors(['username' => 'Username atau password salah.']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['admin_logged_in', 'admin_username']);
        $request->session()->regenerate();

        return redirect()->route('admin.login')->with('success', 'Anda berhasil keluar.');
    }
}
