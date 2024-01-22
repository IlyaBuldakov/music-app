@extends('layouts.app')

@section('title', 'Music App | Изменить исполнителя')

@section('content')
    <br>
    <br>
    <div class="container">
        <h2>Изменение исполнителя {{ $artist->name }}</h2>
        <div class="shadow-sm p-3 mb-5 bg-body rounded">
            <form method="post" action="{{ route('artists.update', ['artist' => $artist->id]) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Имя исполнителя</label>
                    <input type="text" name="name" class="form-control" id="name"
                           placeholder="Введите имя исполнителя"
                           value="{{ $artist->name }}"
                           required>
                </div>
                <div class="form-group">
                    <h5>Текущий аватар исполнителя</h5>
                    <img width="100" src="{{ $artist->avatar_path }}" alt="Текущий аватар">
                    <br><br>
                    <input type="file" name="avatar">
                </div>
                <button type="submit" class="btn btn-primary">Изменить</button>
            </form>
        </div>
    </div>
@endsection
