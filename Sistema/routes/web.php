<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

/*
|--------------------------------------------------------------------------
| Rotas da Aplicação
|--------------------------------------------------------------------------
|
| Ficheiro de rotas consolidado e organizado.
|
*/

// --- Rotas Públicas / Institucionais ---
Route::get('/', [AppController::class, 'home'])->name('home');
Route::get('/sobre', [AppController::class, 'sobre'])->name('sobre');
Route::get('/contato', [AppController::class, 'contato'])->name('contato');


// --- Rotas de Autenticação ---
Route::get('/frmlogin', [AppController::class, 'frmlogin'])->name('login');
Route::post('/logar', [AppController::class, 'logar']);
Route::get('/logout', [AppController::class, 'logout'])->name('logout');
Route::get('/dashboard', [AppController::class, 'dashboard'])->name('dashboard');


// --- Rotas de DEMANDAS ---
// Rota principal que exibe a lista de DEMANDAS na URL /produtos (conforme "gambiarra" solicitada)
Route::get('/produtos', [AppController::class, 'demandas'])->name('demandas.index');

// Rota para exibir o formulário de criação de demanda
Route::get('/demandas/cadastrar', [AppController::class, 'frmdemanda'])->name('demandas.create');

// Rota para salvar a nova demanda no banco de dados
Route::post('/demandas', [AppController::class, 'adddemanda'])->name('demandas.store');


// --- Rotas de USUÁRIOS (CRUD Completo) ---
// Lista todos os usuários
Route::get('/usuarios', [AppController::class, 'usuarios'])->name('usuarios.index');

// Exibe o formulário para criar um novo usuário
Route::get('/frmusuario', [AppController::class, 'frmusuario'])->name('usuarios.create');

// Salva o novo usuário
Route::post('/addusuario', [AppController::class, 'addusuario'])->name('usuarios.store');

// Exibe o formulário para editar um usuário
Route::get('/frmeditusuario/{id}', [AppController::class, 'frmeditusuario'])->name('usuarios.edit');

// Atualiza os dados de um usuário
Route::put('/atualizarusuario/{id}', [AppController::class, 'atualizarusuario'])->name('usuarios.update');

// Exclui um usuário
Route::delete('/excluirusuario/{id}', [AppController::class, 'excluirusuario'])->name('usuarios.destroy');


// --- Rotas de PRODUTOS (Funcionalidades de Cadastro) ---
// Estas rotas permitem continuar cadastrando produtos, mesmo que a listagem principal tenha sido alterada.
Route::get('/frmproduto', [AppController::class, 'frmproduto'])->name('produtos.create');
Route::post('/addproduto', [AppController::class, 'addproduto'])->name('produtos.store');