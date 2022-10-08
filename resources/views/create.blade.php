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
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Valor a converter:</label>
            <input type="text" name="amount" required>
        </div>
        <div>
            <label>Moeda de origem:</label>
            <select name="from">
                <option value="brl" selected>BRL</option>
                <option value="cad">CAD</option>
                <option value="usd">USD</option>
            </select>
        </div>
        <div>
            <label>Moeda de destino:</label>
            <select name="to">
                <option value="brl">BRL</option>
                <option value="cad">CAD</option>
                <option value="usd" selected>USD</option>
            </select>
        </div>
        <div>
            <label>Data de referência:</label>
            <input type="date" name="date" required>
        </div>
        <input type="submit" value="Converter">
    </form>
    <br>
    <h5>Histórico de Conversões</h5>
    @foreach ($data as $dataItem)
        <ul>
            <li>Id: {{ $dataItem['id'] }}</li>
            <li>Data: {{ $dataItem['created_at'] }}</li>
            <li>Moeda de Origem: {{ $dataItem['from'] }}</li>
            <li>Moeda de Destino: {{ $dataItem['to'] }}</li>
            <li>Valor convertido: {{ $dataItem['amount'] }}</li>
            <li>Conversão: {{ $dataItem['result'] }}</li>
        </ul>
    @endforeach

    <a href="{{ route('logout') }}">Logout</a>
</body>

</html>
