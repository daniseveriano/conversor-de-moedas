<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Edite seus dados</h1>
    <form action="/user/update" method="PUT">
        @csrf
        @method('PUT')
        <label for="name">Nome Completo</label>
        <input type="text" name="name" placeholder="Nome completo" value="{{ Auth::user()->name }}">
        <label for="email">E-mail</label>
        <input type="email" name="email" placeholder="E-mail" value="{{ Auth::user()->email }}">
        <label for="password">Senha</label>
        <input type="password" name="password" placeholder="Senha">
        <button type="submit">Editar</button>
    </form>
    @auth
        <a href="{{ route('create') }}">Dashboard</a>
    @endauth
    <a href="{{ route('logout') }}">Logout</a>
</body>

</html>
