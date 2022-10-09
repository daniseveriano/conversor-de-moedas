@extends('layout.main')
@section('title', 'Dashboard')
@section('header')
@section('content')

    <body>
        <div class="container-fluid mb-3">
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
            <table class="table text-center ">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Data:</th>
                        <th scope="col">Moeda de Origem:</th>
                        <th scope="col">Moeda de Destino:</th>
                        <th scope="col">Valor convertido:</th>
                        <th scope="col">Resultado da conversão:</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dataItem)
                        @if ($dataItem['user_id'] == Auth::user()->id)
                            <tr>
                                <th scope="row">{{ $dataItem['id'] }}</th>
                                <td>{{ $dataItem['created_at']->format('d/m/Y') }}</td>
                                <td>{{ $dataItem['from'] }}</td>
                                <td>{{ $dataItem['to'] }}</td>
                                <td>{{ 'R$ ' . number_format($dataItem['amount'], 2, ',', '.') }}</td>
                                <td class="table-success">{{ 'R$ ' . number_format($dataItem['result'], 2, ',', '.') }}</td>
                                <td>
                                    <form action="/dashboard/{{ $dataItem->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger"
                                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">Deletar</button>
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Aviso</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Tem certeza que deseja excluir este registro?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Fechar</button>
                                                        <button type="submit" class="btn btn-danger">Deletar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        @if (session('danger'))
            <div class="alert alert-success alert-dismissible fade show position-absolute top-50 start-50 translate-middle">
                <p>{{ session('msg') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </body>

@endsection
