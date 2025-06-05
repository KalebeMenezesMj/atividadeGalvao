<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Usuario;
use App\Models\Demanda; // ADICIONADO: Importação do modelo de Demanda
//use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AppController extends Controller
{
    public function produtos(){
        $produtos = Produto::all();
        return view('produtos', ['prods'=>$produtos]);
    }

    public function sobre()
    {
        $frame = "(Laravel)";
        $vantagens = ["Sintaxe Simples", "sintaxe consisa", "sintaxe modular"];
        return view('sobre', ['frm' => $frame, 'vtg' => $vantagens]);
    }
    public function contato(){
        return view('contato');
    }

    public function home()
    {
        $cards = [
            [
                'imagem' => 'https://static-00.iconduck.com/assets.00/laravel-icon-497x512-uwybstke.png',
                'nome' => 'Nuvem',
                'texto' => 'Plataforma de infraestrutura totalmente gerenciada para implantação e hospedagem PHP.',
                'preco' => 'A partir de US$ 0,00/mês'
            ],
            [
                'imagem' => 'https://static-00.iconduck.com/assets.00/laravel-icon-249x256-4gdjrenn.png',
                'nome' => 'Forja',
                'texto' => 'Gerenciamento de servidores para aplicativos no DigitalOcean, Vultr, Amazon, Hetzner e muito mais',
                'preco' => 'A partir de US$ 12,00/mês'
            ],
            [
                'imagem' => 'https://static-00.iconduck.com/assets.00/laravel-icon-497x512-uwybstke.png',
                'nome' => 'Vigília Noturna',
                'texto' => 'Monitoramento e insights incomparáveis sobre o desempenho do seu aplicativo Laravel.',
                'preco' => 'Preços em breve'
            ],
            [
                'imagem' => 'https://static-00.iconduck.com/assets.00/laravel-icon-249x256-4gdjrenn.png',
                'nome' => 'Nova',
                'texto' => 'A maneira mais simples e rápida de criar painéis de administração prontos para produção.',
                'preco' => 'A partir de $ 99,00'
            ]
        ];
        return view('home',['cards'=>$cards]);
    }

    public function frmproduto(){
        return view('frmproduto');
    }

    public function addproduto(Request $request){
        $prod = new Produto();

        $prod->nome = $request->nome;
        $prod->preco = $request->preco;
        $prod->quantidade = $request->quantidade;
        
        if($request->hasFile('imagem')){
            $path = $request->file('imagem')->store('imagens','public');
            $prod->imagem = $path;
        }

        // CORRIGIDO: Faltava salvar o produto e redirecionar.
        $prod->save();
        return redirect('/produtos')->with('sucesso', 'Produto cadastrado com sucesso!');
    }

    // ===================================================
    // INÍCIO DO CÓDIGO PARA GERENCIAR AS DEMANDAS
    // ===================================================

    /**
     * Mostra a página de listagem de todas as demandas.
     */
    public function demandas()
{
    $demandas = Demanda::latest()->get();
    return view('produtos', ['demandas' => $demandas]); // <-- Correção aqui
}

    /**
     * Mostra o formulário para cadastrar uma nova demanda.
     */
    public function frmdemanda()
    {
        // Este nome de view ('demandas.create') é uma sugestão. 
        // Use o nome do seu arquivo Blade de formulário de demanda.
        return view('demandas.create'); 
    }

    /**
     * Salva a nova demanda no banco de dados.
     */
    public function adddemanda(Request $request)
    {
        // 1. Validação
        $dadosValidados = $request->validate([
            'nome_cliente' => 'required|string|max:255',
            'empresa_contratante' => 'required|string|max:255',
            'endereco' => 'required|string',
            'engenheiro_responsavel' => 'required|string|max:255',
            'contato_vistoria' => 'required|string|max:255',
            'data_abertura' => 'required|date',
        ]);

        // 2. Criação
        Demanda::create($dadosValidados);

        // 3. Redirecionamento para a página de produtos (a "gambiarra" solicitada)
        return redirect('/produtos')->with('sucesso', 'Demanda cadastrada com sucesso!');
    }

    // ===================================================
    // FIM DO CÓDIGO PARA GERENCIAR AS DEMANDAS
    // ===================================================


    public function frmusuario(){
        return view('frmusuario');
    }

    public function addusuario(request $request){
        $usuario = new Usuario();
        $usuario->nome = $request->fnome;
        $usuario->email = $request->femail;
        $usuario->senha = Hash::make($request->fsenha);
        $usuario->save();

        return redirect('/');
    }

    public function usuarios(){
        $usuarios = Usuario::all();
        return view('usuarios',['users'=>$usuarios]);
    }
    
    //editar usuario

    public function frmeditusuario($id){
        $usuario = Usuario::findOrFail($id);
        return view('frmeditusuario', ['user'=>$usuario]);
    }

    //atualizar

    public function atualizarusuario(Request $request, $id){
        $usuario = Usuario::findOrFail($id);
        
        $dados = [
            'nome' => $request->fnome,
            'email' => $request->femail
        ];
        if(!empty($request->fsenha)){
            $dados['senha'] = Hash::make($request->fsenha);
        }
        $usuario->update($dados);
        return redirect('usuarios');
       }


    public function excluirusuario($id){
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect('usuarios');
    }

    public function frmlogin(){
        return view('frmlogin');
    }

    public function logar(Request $request){
        $user = Usuario::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->senha, $user->senha)){
            return redirect('/frmlogin');
        }

        Session::put('usuario_id', $user->id);
        Session::put('usuario_nome', $user->nome);

        return redirect('/dashboard'); // Alterado para redirect, que é melhor prática.
    }

    public function dashboard(){
        if(!session()->has('usuario_id')){
            return redirect('/frmlogin');
        }
        return view('dashboard');
    }

    public function logout(){
        Session::flush();
        return redirect('/');
    }

}