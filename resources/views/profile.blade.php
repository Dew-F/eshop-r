@extends('layouts.base')

@section('title', 'Профиль')

@section('content')
    <div class="profile">
    <h1>Личный кабинет</h1>
    <p>Добрый день {{ auth()->user()->Name }}!</p>
    <p>Это личный кабинет пользователя сайта.</p>
    </div>
@endsection
