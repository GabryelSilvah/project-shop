<?php

namespace App\Http\Controllers;

use App\Models\ProdutoModel;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public $model;

    public function listar_produtos(Request $request)
    {
        if (!empty($request->session()->get("usuario_logado"))) {

            $dados = ProdutoModel::all();

            return view("Produtos", ["produtos" => $dados]);
        }
        return view("login");
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

    public function form_alterar_produto(Request $request)
    {

        $dados = ProdutoModel::find($request->id);

        return view("Alterar", ["edit_produto" => $dados]);
    }

    public function update($id, Request $request)
    {

        ProdutoModel::where("id", "=", $id)->update(
            [
                "nome" => $request->nome_produto,
                "quantidade" => $request->quantidade,
                "preco_uni" => $request->preco_uni
            ]
        );

        return to_route("produtos.listar");
    }

    public function delete($id)
    {
        ProdutoModel::where("id", "=", $id)->delete();
        return to_route("produtos.listar");
    }
}
