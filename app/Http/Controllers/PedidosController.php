<?php

namespace App\Http\Controllers;

use App\Models\PedidosModel;
use App\Models\ProdutoModel;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    //Read
    public function exibir()
    {
        $model = new ProdutoModel();
        $modelPedidos = new PedidosModel();
        $dados = $model->all();
        $dadosPedidos = $modelPedidos->all();



        return view("Pedidos", ["produtos" => $dados, "pedidos" => $dadosPedidos]);
    }
    //Insert
    public function registrar(Request $request)
    {
        $modelProdutos = new ProdutoModel();
        $dadosProdutos = $modelProdutos->all()->where("id", "=", $request->nome_produto);

        //
        $model =  new PedidosModel();

        $model->nome_cliente = $request->nome_cliente;
        $model->quant_pedido = $request->quantidade_pedidos;
        $model->preco_total =  ($dadosProdutos[0]->preco_uni * $request->quantidade_pedidos);
        $model->fk_produtos = $request->nome_produto;

        $model->save();

        return to_route("listar_pedidos");
    }
    //Update
    public function form_altera($id, $mensagem = "")
    {

        $dadosPedido =  PedidosModel::find($id);
        $dadosProdutos = ProdutoModel::find($dadosPedido->fk_produtos);

        return view("Alterar_pedido", ["produto" => $dadosProdutos, "pedido" => $dadosPedido, "mensagem" => $mensagem]);
    }
    public function alterar($id, Request $request)
    {
        $dadosPedido =  PedidosModel::find($id);
        $dadosProdutos = ProdutoModel::find($dadosPedido->fk_produtos);

        if ($dadosProdutos->quantidade > $request->quantidade_pedidos) {





            PedidosModel::where("id", "=", $id)->update(
                [
                    "nome_cliente" => $request->nome_cliente,
                    "quant_pedido" => $request->quantidade_pedidos,
                    "preco_total" => $this->preco_total_pedido($request, $request->quantidade_pedidos),
                    "fk_produtos" => $request->nome_produto
                ]
            );
            return to_route("listar_pedidos");
        }

        return $this->form_altera($id, "Não há estoque suficiente para a quantidade de unidades requeridas.");
    }
    //delete
    public function excluir($id)
    {
        PedidosModel::where("id", "=", $id)->delete();
        return to_route("listar_pedidos");
    }

    //Returnar preço total de todo o pedido feito pelo cliente
    public function preco_total_pedido(Request $request, $quantidade)
    {
        $modelProdutos = new ProdutoModel();
        $dadosProdutos = $modelProdutos->all()->where("id", "=", $request->nome_produto);


        return $quantidade * $dadosProdutos[0]->preco_uni;
    }
}
