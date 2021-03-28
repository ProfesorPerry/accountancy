<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>System Księgowości</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="text-center">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}">System księgowości</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Start <span class="sr-only">(current)</span></a>
            </li>

            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('login') }}">Zaloguj się</a>
                </li>
            @endguest

            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin') }}">Panel administracyjny</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="document.querySelector('#logout-form').submit()">Wyloguj</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>

<div class="container mt-5">
    @yield('content')
</div>

<form id="logout-form" class="d-none" action="{{ url('logout') }}" method="post">
    @csrf
</form>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
