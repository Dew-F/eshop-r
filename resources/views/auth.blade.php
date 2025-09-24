@extends('layouts.base')

@section('title', 'Вход')

@section('content')
<div class="auth b p-10">
    <form class="form" method="post" action="{{ route('auth.authentication') }}">
        @csrf
        <div class="title">Вход в систему</div>
        <p>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="input b" placeholder="Введите Email" required>
        </p>
        <p>
            <label for="pass">Пароль</label>
            <input type="password" name="password" id="pass" class="input b" placeholder="Введите пароль" required>
        </p>
        <p>
            <label for="remember">Запомнить меня</label>
            <input type="checkbox" id="remember" class="remember b" name="remember">
        </p>
        <button type="submit" class="button">Войти</button>
        <p class="nav">
            <a class="reg" href="register">Регистрация</a>
            <a class="forget" href="">Забыли пароль?</a>
        </p>
    </form>
</div>
@endsection
