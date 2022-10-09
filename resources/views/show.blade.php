<!DOCTYPE html>
<html lang="pt-BR">

@extends('layout.main')
@section('title', 'Resultado')
@section('header')
@section('content')

    <body>
        <div class="container">
            <table class="table text-center"
                style="display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 20px 0; border: 1px solid grey">
                <tr>
                    <th scope="col" colspan="2">Resultado:</th>
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
            {{-- <ul>
                <li>Resultado: {{ 'R$ ' . number_format($data[count($data) - 1]['result'], 2, ',', '.') }}</li>
                <li>Data: {{ $data[count($data) - 1]['created_at']->format('d/m/Y') }}</li>
                <li>Valor: {{ 'R$ ' . number_format($data[count($data) - 1]['amount'], 2, ',', '.') }}</li>
                <li>Moeda de Origem: {{ $data[count($data) - 1]['from'] }}</li>
                <li>Moeda de Destino: {{ $data[count($data) - 1]['to'] }}</li>
            </ul>
            <a href="{{ route('create') }}">Criar nova conversão</a> --}}
        </div>
    </body>

@endsection
