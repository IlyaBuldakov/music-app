@extends('layouts.app')

@section('title', 'Music App | Мои альбомы')

@section('content')
    <br>
    <br>
    <div class="container">
        <h2>Мои альбомы</h2>
        <div class="shadow-sm p-3 mb-5 bg-body rounded">
            @if($albums->total() == 0)
                <p>
                    Пока здесь пусто... <br><br>
                    <a href="{{ route('albums.create') }}">
                        <button class="btn btn-primary">Добавить альбом</button>
                    </a>
                </p>
            @else
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Обложка</th>
                        <th scope="col">Название</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Исполнители</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($albums as $album)
                        <tr>
                            <th><img width="100" src="{{ $album->cover_path }}" alt="Аватар исполнителя"></th>
                            <th><p>{{ $album->name }}</p></th>
                            <th><p>{{ $album->description }}</p>
                            <th>
                                <p>
                                    {{ $album->artist->name }}
                                </p>
                            </th>
                            <th>
                                <a href="{{ route('albums.edit', ['album' => $album->id]) }}">
                                    <button class="btn btn-primary"
                                            style="position:relative; top: 5px; font-size: 15px">
                                        Изменить
                                    </button>
                                </a>
                                <form method="post" action="{{ route('albums.destroy', ['album' => $album->id]) }}"
                                      style="position:relative; top: 20px;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        Удалить
                                    </button>
                                </form>
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
