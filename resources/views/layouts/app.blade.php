<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light">
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="/"><strong>Music App</strong> Справочник</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('artists.index') }}">
                    Список исполнителей
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('albums.index') }}">
                    Список альбомов
                </a>
            </li>
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('loginForm') }}">
                        <strong>Войти</strong>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('registerForm') }}">
                        <strong>Регистрация</strong>
                    </a>
                </li>
            @endguest
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <strong>Личный кабинет</strong>
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</nav>

@yield('content')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
</body>
</html>
