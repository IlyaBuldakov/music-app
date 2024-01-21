@extends('layouts.app')

@section('title', 'Music App | Войти')

@section('content')
    <br>
    <br>
    <div class="container">
        <h2>Вход в личный кабинет</h2><br>
        <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Электронная почта</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="Введите почту">
                <small id="emailHelp" class="form-text text-muted">Введённый при регистрации.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль">
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
@endsection
