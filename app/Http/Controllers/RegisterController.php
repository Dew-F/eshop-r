<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    public function show()
    {
        return view('register');
    }

    public function create(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'email.unique' => 'Пользователь с таким email уже зарегистрирован',
            'password.confirmed' => 'Пароли не совпадают',
            'password.min' => 'Пароль должен содержать как минимум 8 символов',
        ]);
        
        User::create([
            'Name' => $request->username,
            'Email' => $request->email,
            'Password' => $request->password,
            'RoleID' => 1,
        ]);
        
        return redirect()->route('auth.show')->with('success', 'Вы успешно зарегистрировались');
    }
}
