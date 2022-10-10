<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastrar</title>
        <link rel="stylesheet" href="./css/styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}" defer></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

<body class="column">
    <section class="container text-center col-sm-4 mb-3" id="box">
        <h1 class="mb-3">Cadastre-se</h1>
        <form action="{{ route('register') }}" method="POST" class="column justify-content-md-center mb-3" novalidate>
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingPassword" name="name" placeholder="Password"
                    required>
                <label for="floatingPassword">Digite seu nome</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="email"
                    placeholder="name@example.com" required>
                <label for="floatingInput">Digite seu e-mail</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password"
                    required>
                <label for="floatingPassword">Digite sua senha</label>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Cadastrar</button>
            </div>
        </form>
        @if ($errors->any())
            <div
                class="alert alert-danger alert-dismissible fade show position-absolute top-50 start-50 translate-middle">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="list-style: none;">{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('danger'))
            <div
                class="alert alert-danger alert-dismissible fade show position-absolute top-50 start-50 translate-middle">
                <p>{{ session('danger') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <p>Já possui uma conta? Faça seu <a href="{{ route('login') }}">Login</a>!</p>
    </section>
</body>

</html>
