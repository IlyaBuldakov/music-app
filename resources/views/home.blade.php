@extends('layouts.app')

@section('title', 'Music App | Личный кабинет')

@section('content')
    <br>
    <br>
    <div class="container">
        <div class="shadow-sm p-3 mb-5 bg-body rounded">
            <h2>Личный кабинет</h2>
            <hr>
            <p>Ваш e-mail: <strong>{{ $email }}</strong></p>
            <p>Ваше что-то ещё: <strong>42</strong></p>
            <p>И вот это, самое важное: <strong>109</strong></p>

            <a href="{{ route('artists.create') }}">
                <button class="btn btn-primary">Добавить исполнителя</button>
            </a>

            <a href="{{ route('albums.create') }}">
                <button class="btn btn-primary">Добавить альбом</button>
            </a>

            <a href="{{ route('user.artists') }}">
                <button class="btn btn-secondary">Мои исполнители</button>
            </a>
            <a href="{{ route('user.albums') }}">
                <button class="btn btn-secondary">Мои альбомы</button>
            </a>
        </div>
        <form method="post" action="{{ route('logout')}}" style="position:relative; top: -30px;">
            @csrf
            <button class="btn btn-danger" type="submit">Выход</button>
        </form>
    </div>
@endsection
