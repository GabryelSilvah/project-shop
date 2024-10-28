<?php

namespace App\Http\Controllers;

use App\Models\ProdutoModel;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public $model;

    public function listar_produtos()
    {

        $dados = ProdutoModel::all();

        return view("Produtos", ["produtos" => $dados]);
    }

    public function cadastrar(Request $request)
    {
        $model = new ProdutoModel();
        $model->nome = $request->nome_produto;
        $model->quantidade = $request->quantidade;
        $model->preco_uni = $request->preco_uni;


        $model->save();
        return to_route("produtos.listar");
    }

    public function alterar_produto() {}

    public function excluir_produto() {}
}
