@extends('template')
@section('titulo', 'Contato')

@section('conteudo')

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f3f4f6;
    }

    .welcome-container {
        min-height: 80vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .welcome-box {
        background-color: white;
        padding: 2rem 3rem;
        border-radius: 1rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .welcome-box h2 {
        font-size: 1.8rem;
        color: #1f2937;
        font-weight: 600;
    }
</style>

<div class="welcome-container">
    <div class="welcome-box">
        <h2>Bem-vindo(a), {{ session('usuario_nome') }}</h2>
    </div>
</div>

@endsection
