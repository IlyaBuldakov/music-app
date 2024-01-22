@extends('layouts.app')

@section('title', 'Music App | Изменить альбом')

@section('content')
    <br>
    <br>
    <div class="container">
        <h2>Изменение альбома {{ $album->name }}</h2>
        <div class="shadow-sm p-3 mb-5 bg-body rounded">
            <form method="post" action="{{ route('albums.update', ['album' => $album->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Название альбома</label>
                    <input type="text" name="name" class="form-control" id="name"
                           placeholder="Введите название альбома"
                           value="{{ $album->name }}">
                </div>
                <div class="form-group">
                    <label for="description">Описание альбома</label>
                    <input type="text" name="description" class="form-control" id="description"
                           placeholder="Введите название альбома"
                           value="{{ $album->description }}">
                </div>
                <div class="form-group">
                    <h5>Текущая обложка альбома</h5>
                    <img width="100" src="{{ $album->cover_path }}" alt="Текущая обложка">
                    <br><br>
                    <input type="file" name="cover">
                </div>
                <button type="submit" class="btn btn-primary">Изменить</button>
            </form>
        </div>
    </div>
@endsection
