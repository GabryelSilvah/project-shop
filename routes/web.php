<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\PedidosController;

Route::get("/", [AutenticacaoController::class, "form_login"])->middleware("Logado");
Route::get("/login", [AutenticacaoController::class, "form_login"])->name("login")->middleware("Logado");
Route::post("/logar", [AutenticacaoController::class, "autenticar"])->middleware("Logado");
Route::get("/cadastrar", [AutenticacaoController::class, "form_cadastro"])->middleware("Logado");
Route::post("/cadastrar_user", [AutenticacaoController::class, "registrar_usuario"])->middleware("Logado");

Route::get("/produtos", [ProdutoController::class, "listar_produtos"])->name("produtos.listar")->middleware("Login");
Route::post("/cadastrar", [ProdutoController::class, "cadastrar"])->middleware("Login");
Route::get("/alterar_produto/{id}", [ProdutoController::class, "form_alterar_produto"])->middleware("Login");
Route::post("/alterar_produto/{id}", [ProdutoController::class, "update"])->middleware("Login");
Route::get("/excluir_produto/{id}", [ProdutoController::class, "delete"])->middleware("Login");

//Pedidos
Route::get("/listar_pedidos", [PedidosController::class, "exibir"])->name("listar_pedidos")->middleware("Login");
Route::post("/fazer_pedido", [PedidosController::class, "registrar"])->middleware("Login");
Route::get("/alterar_pedido/{id}", [PedidosController::class, "form_altera"])->middleware("Login");
Route::post("/alterar_pedido/{id}", [PedidosController::class, "alterar"])->middleware("Login");
Route::get("/excluir_pedido/{id}", [PedidosController::class, "excluir"])->middleware("Login");

Route::get("/encerrar_sessao", [AutenticacaoController::class, "sair"])->middleware("Login");
