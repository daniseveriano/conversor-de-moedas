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
        <li>Data: {{ $response['date'] }}</li>
        <li>Valor a Converter: {{ $response['query']['amount'] }}</li>
        <li>Moeda de Origem: {{ $response['query']['from'] }}</li>
        <li>Moeda de Destino: {{ $response['query']['to'] }}</li>
        <li>Resultado: {{ $response['result'] }}</li>
    </ul>
    @foreach ($data as $dataItem)
        <ul>
            <li>Id: {{ $dataItem['id'] }}</li>
            <li>Valor convertido: {{ $dataItem['amount'] }}</li>
            <li>Moeda de Origem: {{ $dataItem['from'] }}</li>
            <li>Moeda de Destino: {{ $dataItem['to'] }}</li>
            <li>Data: {{ $dataItem['created_at'] }}</li>
        </ul>
    @endforeach
    <a href="/">Criar nova conversão</a>
</body>

</html>
