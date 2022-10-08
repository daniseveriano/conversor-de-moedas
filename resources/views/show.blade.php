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
        <li>Resultado: {{ $data[count($data) - 1]['result'] }}</li>
        <li>Data: {{ $data[count($data) - 1]['created_at'] }}</li>
        <li>Valor: {{ $data[count($data) - 1]['amount'] }}</li>
        <li>Moeda de Origem: {{ $data[count($data) - 1]['from'] }}</li>
        <li>Moeda de Destino: {{ $data[count($data) - 1]['to'] }}</li>
    </ul>
    <a href="{{ route('create') }}">Criar nova conversão</a>
</body>

</html>
