<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body>
    <h1>Entrar</h1>
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
        <p>{{session('danger')}}</p>
    @endif
    
    <form action="{{ route('auth') }}" method="post">
        @csrf
        <label for="email">E-mail</label>
        <input type="email" id="name" name="email">
        <label for="password">Senha</label>
        <input type="password" id="password" name="password">
        <input type="submit" value="Entrar">
    </form>
    <p>Não possui uma conta? <a href="{{ route('signup') }}">Cadastre-se!</a></p>
</body>

</html>
