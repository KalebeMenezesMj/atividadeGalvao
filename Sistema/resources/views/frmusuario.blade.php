@extends('template')
@section('titulo', 'Add Usuario')

@section('conteudo')

<style>
    /* * ===================================================================
     * ESTILO REUTILIZADO DA PÁGINA DE LOGIN PARA CONSISTÊNCIA VISUAL
     * ===================================================================
    */

    /* --- 1. Definição de Variáveis (Paleta de Cores) --- */
    :root {
        --cor-primaria: #2563eb;
        --cor-primaria-hover: #1d4ed8;
        --cor-fundo: #f3f4f6;
        --cor-texto-principal: #1f2937;
        --cor-texto-secundario: #374151;
        --cor-borda: #d1d5db;
        --cor-sombra: rgba(0, 0, 0, 0.1);
        --cor-foco-sombra: rgba(59, 130, 246, 0.3);
    }

    /* --- 2. Layout Geral --- */
    .container-form { /* Nome ligeiramente diferente para evitar conflitos, se necessário */
        min-height: 80vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: var(--cor-fundo);
        background-image: linear-gradient(170deg, #f3f4f6 0%, #e5e7eb 100%);
        padding: 40px 20px;
    }

    /* --- 3. Caixa do Formulário (Form Box) --- */
    .form-box {
        background-color: white;
        padding: 2.5rem;
        border-radius: 1rem;
        box-shadow: 0 4px 6px -1px var(--cor-sombra), 0 2px 4px -2px var(--cor-sombra);
        width: 100%;
        max-width: 450px; /* Um pouco maior para acomodar os campos */
        border: 1px solid #e5e7eb;
    }

    .form-box h2 {
        text-align: center;
        color: var(--cor-texto-principal);
        margin-bottom: 2rem;
        font-size: 1.75rem;
    }

    /* --- 4. Elementos do Formulário (Inputs, Labels, Botão) --- */
    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--cor-texto-secundario);
        font-weight: 600;
    }

    .form-group input {
        width: 100%;
        padding: 0.85rem;
        border: 1px solid var(--cor-borda);
        border-radius: 0.5rem;
        box-sizing: border-box;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .form-group input:focus {
        border-color: var(--cor-primaria);
        outline: none;
        box-shadow: 0 0 0 3px var(--cor-foco-sombra);
    }

    .form-button {
        width: 100%;
        padding: 0.85rem;
        background-color: var(--cor-primaria);
        color: white;
        border: none;
        border-radius: 0.5rem;
        cursor: pointer;
        font-weight: bold;
        font-size: 1rem;
        margin-top: 1rem; /* Espaçamento adicional no topo */
        transition: background-color 0.2s ease, transform 0.2s ease;
    }

    .form-button:hover {
        background-color: var(--cor-primaria-hover);
        transform: translateY(-2px);
    }
</style>

<main class="container-form">
    <div class="form-box">
        <h2>Cadastrar Novo Usuário</h2>

        <form action="/addusuario" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="fnome" id="nome" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="femail" id="email" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="fsenha" id="senha" required>
            </div>

            <button type="submit" class="form-button">Cadastrar</button>
        </form>
    </div>
</main>
@endsection