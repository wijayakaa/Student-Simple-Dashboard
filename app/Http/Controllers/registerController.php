<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function index()
    {
        return view('Register.index', [
            "title" => "register"
        ]);
    }
    public function registerStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:Users',
            'password' => 'required|min:5|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);
        $request->session()->flash('success','register berhasil,silahkan login !');

        return redirect('/Login/index');

    }
    public function logout()
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/student/all')->with('success', 'Logout berhasil !');
    }
}
