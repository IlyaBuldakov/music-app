@extends('layouts.app')

@section('title', 'Music App | Альбомы')

@section('content')
    <br>
    <br>
    <div class="container">
        <h2>Список всех альбомов</h2>
        <div class="shadow-sm p-3 mb-5 bg-body rounded">
            @if($albums->total() == 0)
                <p>Ничего не найдено...</p>
                <a href="{{ route('albums.index') }}"><button class="btn btn-primary">Попробовать ещё</button></a>
            @else
                <form action="{{ route('albums.filter') }}" method="get">
                    <strong>Фильтрация</strong><br>
                    <input type="text" name="albumName" placeholder="Введите название альбома">
                    <button type="submit" class="btn btn-primary" style="margin-bottom: 5px;">Фильтр</button>
                </form>
                <br>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Обложка</th>
                        <th scope="col">Название</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Исполнитель</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($albums as $album)
                        <tr>
                            <th><img width="100" src="{{ $album->cover_path }}" alt="Аватар исполнителя"></th>
                            <th><p>{{ $album->name }}</p></th>
                            <th><p>{{ $album->description }}</p></th>
                            <th>
                                <p>
                                    {{ $album->artist->name }}
                                </p>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $albums->links() }}
            @endif
        </div>
    </div>
@endsection
