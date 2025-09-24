<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    public function show()
    {
        return view('auth');
    }

    public function authentication(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials  = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            return redirect()->route('profile')->with('success', 'Вы успешно авторизовались');
        }
        
        return redirect()->route('auth.show')->withErrors('Неверный логин или пароль');
    }
}
