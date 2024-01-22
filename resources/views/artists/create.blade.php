@extends('layouts.app')

@section('title', 'Music App | Добавить исполнителя')

@section('content')
    <br>
    <br>
    <div class="container">
        <div class="shadow-sm p-3 mb-5 bg-body rounded">
            <form method="post" action="{{ route('artists.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Имя исполнителя</label>
                    <input type="text" name="name" class="form-control" id="name"
                           placeholder="Введите имя исполнителя" required>
                </div>
                <div class="form-group">
                    <input type="file" name="avatar">
                </div>
                <button type="submit" class="btn btn-primary">Создать</button>
            </form>
        </div>
    </div>
@endsection
