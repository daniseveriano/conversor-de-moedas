<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar</title>
</head>

<body>
    <h1>Cadastre-se</h1>
    <form action="{{ route('register.user') }}" method="post">
        @csrf
        <label for="name">Nome Completo</label>
        <input type="text" name="name" placeholder="Nome completo">
        <label for="email">E-mail</label>
        <input type="email" name="email" placeholder="E-mail">
        <label for="password">Senha</label>
        <input type="password" name="password" placeholder="Senha">
        <input type="submit" value="Cadastrar">
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('danger'))
        <p>{{ session('danger') }}</p>
    @endif
    <a href="/login">Login</a>
</body>

</html>
