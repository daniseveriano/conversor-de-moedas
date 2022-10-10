<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous" defer>
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body class="position-relative">
    @yield('header')
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a href="/" class="navbar-brand">
                    <img src="{{ asset('img/logo.svg') }}" alt="Logo" style="width: 50px">
                    Convert
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="{{ route('index') }}" class="nav-link">Home</a>
                        </li>
                        @if (!Auth::check())
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Login</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('signup') }}" class="nav-link">Cadastro</a>
                            </li>
                        @endif
                        @auth
                            <li class="nav-item">
                                <a href="{{ route('create') }}" class="nav-link">Dashboard</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false" style="color: #000">
                                    Olá, {{ Auth::user()->name }}!
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                    <li><a class="dropdown-item" href="{{ route('edit', Auth::user()->id) }}">Edite seu cadastro</a></li>
                                </ul>
                            @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    @yield('content')
    @if (session('msg'))
        <div class="alert alert-success alert-dismissible fade show position-absolute top-50 start-50 translate-middle" role="alert">
            <strong>{{ session('msg') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <footer>
        <p>Desenvolvido por <strong><a href="https://github.com/daniseveriano/conversor-de-moedas" target="_blank"
                    noopener noreferrer>Dani Severiano</a></strong> - © Todos os direitos reservados</p>
    </footer>
</body>

</html>
