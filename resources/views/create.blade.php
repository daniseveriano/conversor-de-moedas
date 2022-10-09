@extends('layout.main')
@section('title', 'Dashboard')
@section('header')
@section('content')

    <body>
        <div class="container-fluid mb-3">
            <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data"
                style="display: flex; flex-direction: column; justify-content: center; padding: 20px 30% 0">
                @csrf
                <div class="form-floating col-md-12 mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="amount" placeholder="2.00" required>
                    <label for="floatingInput">Valor a converter</label>
                </div>
                <div class="d-flex" mb-3>
                    <div class="form-floating d-flex flex-column" style="width: 50%">
                        <select id="floatingSelect" aria-label="Floating label select example" class="form-select"
                            name="from">
                            <option value="usd">Dólar Americano - USD</option>
                            <option value="brl">Real Brasileiro - BRL</option>
                            <option value="cad">Dólar Canadense - CAD</option>
                        </select>
                        <label for="floatingSelect">Moeda de origem</label>
                    </div>
                    <div class="form-floating d-flex flex-column" style="width: 50%">
                        <select id="floatingSelect" aria-label="Floating label select example" class="form-select"
                            name="to">
                            <option value="brl">Real Brasileiro - BRL</option>
                            <option value="cad">Dólar Canadense - CAD</option>
                            <option value="usd">Dólar Americano - USD</option>
                        </select>
                        <label for="floatingSelect">Moeda de destino</label>
                    </div>
                </div>
                <div style="margin-top: 15px;">
                    <label for="exampleFormControlInput1" class="form-label" aria-placeholder="10/10/2022">Data de
                        referência:</label>
                    <input class="form-control" id="exampleFormControlInput1" type="date" name="date" required>
                </div>
                <button class="btn btn-primary btn-lg" type="submit" style="margin-top: 20px;">Converter</button>
            </form>
            <br>
            <h5 style="margin-top: 20px;">Histórico de Conversões</h5>
            <table class="table text-center ">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Data de Criação:</th>
                        <th scope="col">Data de Referência:</th>
                        <th scope="col">Moeda de Origem:</th>
                        <th scope="col">Moeda de Destino:</th>
                        <th scope="col">Valor convertido:</th>
                        <th scope="col">Resultado da conversão:</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dataItem)
                        @if ($dataItem->user_id == Auth::user()->id)
                            <tr>
                                <th scope="row">{{ $dataItem->id }}</th>
                                <td>{{ date('d/m/Y', strtotime($dataItem->created_at)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($dataItem->date)) }}</td>
                                <td>{{ $dataItem->from }}</td>
                                <td>{{ $dataItem->to }}</td>
                                <td>{{ number_format($dataItem->amount, 2, ',', '.') }}</td>
                                <td class="table-info">{{ number_format($dataItem->result, 2, ',', '.') }}</td>
                                <td>
                                    <form action="/dashboard/{{ $dataItem->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger"
                                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">Deletar</button>
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
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
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {{ $data->links() }}
                </ul>
            </nav>
        </div>
        @if (session('danger'))
            <div class="alert alert-success alert-dismissible fade show position-absolute top-50 start-50 translate-middle">
                <p>{{ session('msg') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </body>

@endsection
