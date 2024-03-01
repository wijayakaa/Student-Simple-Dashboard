<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class loginController extends Controller
{
    public function index()
    {
        return view('Login.index', [
            "title" => "Login"
        ]);
    }
    public function loginStore(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/student/all')->with('success', 'Login berhasil !');
        } else {
            $request->session()->flash('failed', 'Login Gagal !');
        }
    }
    
    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/Login/index')->with('success', 'Logout berhasil !');
}
}