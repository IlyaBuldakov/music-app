@extends('layouts.app')

@section('title', 'Music App | Исполнители')

@section('content')
    <br>
    <br>
    <div class="container">
        <h2>Список всех исполнителей</h2>
        <div class="shadow-sm p-3 mb-5 bg-body rounded">
            @if($artists->total() == 0)
                <p>Пока здесь пусто...</p>
            @else
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Аватар</th>
                        <th scope="col">Имя</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($artists as $artist)
                        <tr>
                            <th><img width="100" src="{{ $artist->avatar_path }}" alt="Аватар исполнителя"></th>
                            <th><p style="position:relative; top: 35px; font-size: 18px">{{ $artist->name }}</p></th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $artists->links() }}
            @endif
        </div>
    </div>
@endsection
