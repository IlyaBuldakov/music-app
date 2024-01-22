@extends('layouts.app')

@section('title', 'Music App | Альбомы')

@section('content')
    <br>
    <br>
    <div class="container">
        <h2>Альбомы исполнителя {{ $name }}</h2>
        <div class="shadow-sm p-3 mb-5 bg-body rounded">
            @if($albums->count() == 0)
                <p><strong>{{ $name }}</strong> пока не выпустил ни одного альбома... или мы не в курсе</p>
            @else
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Аватар</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Описание</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($albums as $album)
                        <tr>
                            <th><img width="100" src="{{ $album->cover_path }}" alt="Аватар исполнителя"></th>
                            <th><p>{{ $album->name }}</p></th>
                            <th><p>{{ $album->description }}</p></th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
