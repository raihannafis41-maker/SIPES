<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ControllerAuthAdmin extends Controller
{
    public function showLogin()
    {
        return view('auth.loginadmin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $user = ModelUser::where('username', $request->username)
            ->where('role', 'admin')
            ->where('aktif', true)
            ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()
                ->withInput()
                ->with('error', 'Username atau password admin salah.');
        }

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.admin');
    }
}