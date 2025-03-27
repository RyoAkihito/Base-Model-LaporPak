<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];


        if (Auth::attempt($infologin)) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('admin'); // Redirect ke home
            }
        } else {
            return redirect()->route('login')->withErrors('Login gagal')->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
