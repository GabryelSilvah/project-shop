<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\PedidosController;

Route::get("/login", [AutenticacaoController::class, "form_login"])->name("login");
Route::post("/logar", [AutenticacaoController::class, "autenticar"]);
Route::get("/cadastrar", [AutenticacaoController::class, "form_cadastro"]);
Route::post("/cadastrar_user", [AutenticacaoController::class, "registrar_usuario"]);
Route::get("/produtos", [ProdutoController::class, "listar_produtos"])->name("produtos.listar");
Route::post("/cadastrar", [ProdutoController::class, "cadastrar"]);
Route::get("/alterar_produto/{id}", [ProdutoController::class, "form_alterar_produto"]);
Route::post("/alterar_produto/{id}", [ProdutoController::class, "update"]);
Route::get("/excluir_produto/{id}", [ProdutoController::class, "delete"]);

//Pedidos
Route::get("/listar_pedidos", [PedidosController::class, "exibir"])->name("listar_pedidos");
Route::post("/fazer_pedido", [PedidosController::class, "registrar"]);
Route::get("/alterar_pedido/{id}", [PedidosController::class, "form_altera"]);
Route::post("/alterar_pedido/{id}", [PedidosController::class, "alterar"]);
Route::get("/excluir_pedido/{id}", [PedidosController::class, "excluir"]);

Route::get("/encerrar_sessao", [AutenticacaoController::class, "sair"]);
