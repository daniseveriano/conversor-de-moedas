<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if (Auth::check())
        <h3>O usuário logado é {{ Auth::user()->name }}</h3>
    @endif
    <p>Seja bem-vindo ao nosso sistema de conversão de moedas!</p>
    <p>Conversão entre BRL, CAD e USD em tempo real!</p>
    <p>Cadastre-se para ter acesso a todas as nossas funcionalidades!</p>
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('signup') }}">Cadastro</a>
    @if (Auth::check())
    <a href="{{ route('create') }}">Dashboard</a>
    @endif
    @if (Auth::check())
    <a href="{{ route('logout') }}">Logout</a>
    @endif
</body>

</html>
