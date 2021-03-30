<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/img/vinyl.png" type="image/png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Тестовое задание №1</title>
</head>
<body>
    <header>
        <div class="logo">
            <p class="logotype"><a href="/">C</a></p>
            <p class="muscat"><a href="/">musCat</a></p>
        </div>
        <form action="{{ route('albums.search') }}" class="search">
            <input type="search" name="search" placeholder="Поиск по исполнителю или названию альбома...">
            <button type="submit"></button>
        </form>
        <div class="auth">
            @guest
            <a href="/register">Регистрация</a>
            <a href="/login" class="login">Вход</a>
            @else
            <p>{{ Auth::user()->name }}</p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" class="logout">Выйти</a>
            </form>
            @endguest
        </div>
    </header>
    @yield('content')
    <footer>
        <p>Тестовое задание №1 для</p>
        <img src="{{ asset('img/icon-nutnet.svg') }}" alt="Nutnet-logo">
        <p>2021</p>
    </footer>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/logout.js') }}"></script>
    @stack('scripts')
</body>
</html>
