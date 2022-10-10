<!DOCTYPE html>
<html lang="pt-BR">

@extends('layout.main')
@section('title', 'Resultado')
@section('header')
@section('content')

    <body>
        <div class="row" style="display: flex; background-color: rgba(128, 128, 128, 0.295); padding: 10% 10%;">
            <div class="col-sm-6">
                <div class="card">
                    <table class="card-body table text-center"
                        style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                        <tr>
                            <th scope="col" colspan="2" class="fs-3">Câmbio:</th>
                        </tr>
                        <tr>
                            <td colspan="2" class="table-active fs-1 fw-bold">
                                {{ number_format($data[count($data) - 1]['result'], 2, ',', '.') }}</td>
                        <tr>
                            <th scope="col">Moeda de Origem:</th>
                            <th scope="col">Moeda de Destino:</th>
                        </tr>
                        <tr>
                            <td class="fs-2">{{ $data[count($data) - 1]['from'] }}</td>
                            <td class="fs-2">{{ $data[count($data) - 1]['to'] }}</td>
                        <tr>
                        <tr>
                            <th scope="col">Data de Criação:</th>
                            <th scope="col">Data de Referência:</th>
                        </tr>
                        <tr>
                            <td class="fs-4">{{ $data[count($data) - 1]['created_at']->format('d/m/Y') }}</td>
                            <td class="fs-4">{{ $data[count($data) - 1]['date']->format('d/m/Y') }}</td>
                        <tr>
                    </table>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card" style="height: 100%;">
                    <table class="card-body table text-center"
                        style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                        <tr>
                            <th class="fs-3" scope="col" colspan="2">Cotação do Dia
                                {{ $data[count($data) - 1]['date']->format('d/m/Y') }}</th>
                        <tr>
                        <tr>
                            <th scope="col" colspan="2">Moeda de Referência: <strong
                                    style="color: red">{{ $data[count($data) - 1]['from'] }}</strong></th>
                            <div>
                        <tr>
                            <td class="fs-5" style="text-align: left">Dólar Americano - USD</td>
                            <td class="fs-5 fw-bold">{{ number_format($data[count($data) - 1]['latest_usd'], 2, ',', '.') }}
                            </td>
                        <tr>
                        <tr>
                            <td class="fs-5" style="text-align: left">Dólar Canadense - CAD</td>
                            <td class="fs-5 fw-bold">{{ number_format($data[count($data) - 1]['latest_cad'], 2, ',', '.') }}
                            </td>
                        <tr>
                        <tr>
                            <td class="fs-5" style="text-align: left">Real Brasileiro - BRL</td>
                            <td class="fs-5 fw-bold">{{ number_format($data[count($data) - 1]['latest_brl'], 2, ',', '.') }}
                            </td>
                        <tr>
                    </table>
                </div>
            </div>
        </div>
    </body>

@endsection
