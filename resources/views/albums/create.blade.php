@extends('layouts.app')

@section('title', 'Music App | Добавить альбом')

@section('content')
    <br>
    <br>
    <div class="container">
        <h2>Создание нового альбома</h2>
        <div class="shadow-sm p-3 mb-5 bg-body rounded">
            @if($artists->total() == 0)
                <p>Сначала добавьте хотя бы одного исполнителя</p>
                <a href="{{ route('artists.create') }}">
                    <button class="btn btn-primary">Добавить исполнителя</button>
                </a>
            @else
                <form method="post" action="{{ route('albums.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <h5>Выберите исполнителя</h5>
                        <br>
                        <div class="list-group">
                            @foreach($artists as $artist)
                                <a class="list-group-item list-group-item-action">
                                    <input type="checkbox" name="artistCheckbox" value="{{ $artist->id }}">
                                    {{ $artist->name }}
                                </a>
                            @endforeach
                        </div><br>
                        {{ $artists->links() }}
                    </div>
                    <div class="form-group">
                        <label for="name">Название альбома</label>
                        <input type="text" name="name" class="form-control" id="name"
                               placeholder="Введите название альбома" required>
                    </div>
                    <div class="form-group">
                        <p class="lead">
                            Если фотография не будет выбрана локально,
                            ей автоматически станет официальная фотография обложки с
                            <a href="https://last.fm">Last FM</a> при условии, что введенный исполнитель и альбом существуют
                        </p>
                        <input type="file" name="cover">
                    </div>
                    <div class="form-group">
                        <label for="description">Описание альбома</label>
                        <input type="text" name="description" class="form-control" id="description"
                               placeholder="Введите описание альбома" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Создать</button>
                </form>
            @endif
        </div>
    </div>
@endsection
