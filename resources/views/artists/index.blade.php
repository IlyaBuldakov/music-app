@extends('layouts.app')

@section('title', 'Music App | Исполнители')

@section('content')
    <br>
    <br>
    <div class="container">
        <h2>Список всех исполнителей</h2>
        <div class="shadow-sm p-3 mb-5 bg-body rounded">
            @if($artists->total() == 0)
                <p>Ничего не найдено...</p>
                <a href="{{ route('artists.index') }}"><button class="btn btn-primary">Попробовать ещё</button></a>
            @else
                <form action="{{ route('artists.filter') }}" method="get">
                    <strong>Фильтрация</strong><br>
                    <input type="text" name="artistName" placeholder="Введите имя исполнителя">
                    <button type="submit" class="btn btn-primary" style="margin-bottom: 5px;">Фильтр</button>
                </form>
                <br>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Аватар</th>
                        <th scope="col">Имя</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($artists as $artist)
                        <tr>
                            <th><img width="100" src="{{ $artist->avatar_path }}" alt="Аватар исполнителя"></th>
                            <th><p>{{ $artist->name }}</p></th>
                            <th><a href="{{ route('artists.albums', ['artistId' => $artist->id]) }}"><button class="btn btn-primary">Альбомы</button></a></th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $artists->links() }}
            @endif
        </div>
    </div>
@endsection
