@extends('layouts.app')

@section('title', 'Music App | Регистрация')

@section('content')
    <br>
    <br>
    <div class="container">
        <h2>Регистрация</h2><br>
        <form method="post" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Электронная почта</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="Введите почту">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Повторите пароль">
            </div>
            <button type="submit" class="btn btn-primary">Регистрация</button>
        </form>
    </div>
@endsection
