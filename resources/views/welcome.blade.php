@extends('layout.main')
@section('title', 'Conversor de Moedas')
@section('header')
@section('content')

    <body class="col-md-12">
        <section>
            <div id="banner" class="col-md-12">
                <h1>Taxa de câmbio em tempo real</h1>
                <h1>com precisão e facilidade</h1>
                <br>
                <h5>Conversão de moedas de forma fácil, com acesso a</h5>
                <h5>históricos de conversões para consultas futuras</h5>
                <h5>Dados atualizados em tempo real</h5>
            </div>
            @if (!Auth::check())
                <div class="grid text-center">
                    <h5>Cadastre-se e comece agora!</h5>
                    <a type="button" class="btn btn-primary btn-lg" href="/signup">Cadastrar</a>
                    <p style="margin-top: 30px; margin-bottom: 30px;">Já possui uma conta? Faça seu <a
                            href="/login">Login</a>!</p>
                </div>
            @endif
            @auth
                <div class="grid text-center">
                    <h5>Faça uma conversão agora!</h5>
                    <a type="button" class="btn btn-primary btn-lg" href="/dashboard">Ir para o Dashboard</a>
                    </p>
                </div>
            @endauth
        </section>

    @endsection
