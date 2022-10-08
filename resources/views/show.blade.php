<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <ul>
        <li>Resultado: {{ 'R$ ' . number_format($data[count($data) - 1]['result'], 2, ',', '.') }}</li>
        <li>Data: {{ $data[count($data) - 1]['created_at']->format('d/m/Y') }}</li>
        <li>Valor: {{ 'R$ ' . number_format($data[count($data) - 1]['amount'], 2, ',', '.') }}</li>
        <li>Moeda de Origem: {{ $data[count($data) - 1]['from'] }}</li>
        <li>Moeda de Destino: {{ $data[count($data) - 1]['to'] }}</li>
    </ul>
    <a href="{{ route('create') }}">Criar nova conversão</a>

    @if (Auth::check())
        <a href="{{ route('create') }}">Dashboard</a>
    @endif
    <a href="{{ route('logout') }}">Logout</a>
</body>

</html>
