<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/produtos", [ProdutoController::class, "listar_produtos"])->name("produtos.listar");
Route::post("/cadastrar", [ProdutoController::class, "cadastrar"]);
