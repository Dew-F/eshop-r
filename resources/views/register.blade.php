@extends('layouts.base')

@section('title', 'Регистрация')

@section('content')
<div class="auth b p-10">
    <form class="reg" method="post" action="{{ route('reg.create') }}">
        @csrf
        <div class="title">Регистрация</div>
        <p>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="input b" placeholder="Введите Email" value="{{old('email') ?? ''}}" required>
        </p>
        <p>
            <label for="name">Псевдоним</label>
            <input type="text" name="username" id="name" class="input b" placeholder="Введите псевдоним" value="{{old('username') ?? ''}}" required>
        </p>
        <p>
            <label for="pass">Пароль</label>
            <input type="password" name="password" id="pass" class="input b" placeholder="Введите пароль" required>
        </p>
        <p>
            <label for="repass">Повтор пароля</label>
            <input type="password" name="password_confirmation" id="repass" class="input b" placeholder="Повторите пароль" required>
        </p>
        <p>
            <label for="rules">Соглашение с правилами</label>
            <input type="checkbox" id="rules" class="remember b" required>
        </p>
        <button type="submit" class="button">Зарегистрироваться</button>
    </form>
</div>
@endsection
