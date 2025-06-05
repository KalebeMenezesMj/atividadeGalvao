@extends('template')
@section('titulo', 'Editar Usuario')

@section('conteudo')
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f4f4f4;">
        <form action="/atualizarusuario/{{$user->id}}" method="POST" enctype="multipart/form-data" style="width: 500px; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);" >
            @csrf
            @method('put')
            <div style="margin-bottom: 15px;">
                <label for="nome">Nome</label>
                <input type="text" name="fnome" id="nome" class="form-control" required value="{{$user->nome}}">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="email">Email</label>
                <input type="email" name="femail" id="email" class="form-control" required value="{{$user->email}}">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="senha">Senha</label>
                <input type="password" name="fsenha" id="senha" class="form-control" placeholder="deixe em branco para manter a senha atual">
            </div>

            <input type="submit" value="Atualizar">
        </form>
    </div>
@endsection
