@extends('layouts.app')

@section('title', 'Music App | Мои исполнители')

@section('content')
    <br>
    <br>
    <div class="container">
        <h2>Мои исполнители</h2>
        <div class="shadow-sm p-3 mb-5 bg-body rounded">
            @if($artists->total() == 0)
                <p>
                    Пока здесь пусто... <br><br>
                    <a href="{{ route('artists.create') }}">
                        <button class="btn btn-primary">Добавить исполнителя</button>
                    </a>
                </p>
            @else
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
                            <th>
                                <img width="100" src="{{ $artist->avatar_path }}" alt="Аватар исполнителя">
                            </th>
                            <th>
                                <p style="position:relative; top: 35px; font-size: 18px">{{ $artist->name }}</p>
                            </th>
                            <th>
                                <a href="{{ route('artists.edit', ['artist' => $artist->id]) }}">
                                    <button class="btn btn-primary"
                                            style="position:relative; top: 5px; font-size: 15px">
                                        Изменить
                                    </button>
                                </a>
                                <form method="post" action="{{ route('artists.destroy', ['artist' => $artist->id]) }}"
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
                {{ $artists->links() }}
            @endif
        </div>
    </div>
@endsection
