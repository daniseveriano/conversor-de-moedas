<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="/exchange" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Valor a converter:</label>
            <input type="text" name="amount">
        </div>
        <div>
            <label>Moeda a ser convertida:</label>
            <select name="from">
                <option value="brl" selected>BRL</option>
                <option value="cad">CAD</option>
                <option value="usd">USD</option>
            </select>
        </div>
        <div>
            <label>Moeda para a qual se deseja converter:</label>
            <select name="to">
                <option value="brl">BRL</option>
                <option value="cad">CAD</option>
                <option value="usd" selected>USD</option>
            </select>
        </div>
        <input type="submit" value="Converter">
    </form>

    @foreach ($data as $dataItem)
        <ul>
            <li>Id: {{ $dataItem['id'] }}</li>
            <li>Valor convertido: {{ $dataItem['amount'] }}</li>
            <li>Moeda de Origem: {{ $dataItem['from'] }}</li>
            <li>Moeda de Destino: {{ $dataItem['to'] }}</li>
            <li>Data: {{ $dataItem['created_at'] }}</li>
        </ul>
    @endforeach

    @if (count($data) > 0)
        <a href="/historic">Histórico</a>
    @endif
</body>

</html>
