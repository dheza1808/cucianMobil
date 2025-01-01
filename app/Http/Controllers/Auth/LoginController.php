<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string',
        ]);
        $user = DB::table('users')->where('username', $request->username)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $request->session()->put('user_id', $user->id);
            return redirect()->route('cars.index')->with('success', 'Login berhasil!');
        }
        return back()->withErrors(['login_error' => 'Username atau password salah.'])->withInput();
    }

    public function logout(Request $request)
{
    $request->session()->forget('user_id');
    $request->session()->flush();
    return redirect()->route('login')->with('success', 'Logout berhasil!');
}

}
