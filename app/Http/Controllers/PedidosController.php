<?php

namespace App\Http\Controllers;

use App\Models\PedidosModel;
use App\Models\ProdutoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidosController extends Controller
{
    //Read
    public function exibir()
    {
        $model = new ProdutoModel();
        $modelPedidos = new PedidosModel();
        $dados = $model->all();
        $dadosPedidos = $modelPedidos->all();

        $dadosJOIN = DB::table("pedidos")
            ->join("produtos", "produtos.id", "=", "pedidos.fk_produtos")
            ->select("*", "pedidos.id AS id_pedidos")
            ->get();


        return view("Pedidos", ["produtos" => $dados, "pedidos" => $dadosJOIN]);
    }
    //Insert
    public function registrar(Request $request)
    {

        $model =  new PedidosModel();
        $produtos =  ProdutoModel::find($request->nome_produto);

        if ($produtos->quantidade > $request->quantidade_pedidos) {

            ProdutoModel::where("id", "=", $request->nome_produto)->update(
                [
                    "quantidade" => ($produtos->quantidade - $request->quantidade_pedidos)
                ]
            );


            $model->nome_cliente = $request->nome_cliente;
            $model->quant_pedido = $request->quantidade_pedidos;
            $model->preco_total =  $this->preco_total_pedido($request, $request->quantidade_pedidos);
            $model->fk_produtos = $request->nome_produto;

            $model->save();

            return to_route("listar_pedidos");
        }
        return to_route("listar_pedidos");
    }
    //Update
    public function form_altera($id, $mensagem = "")
    {

        $dadosPedido =  PedidosModel::find($id);

        $dadosProdutosFind = ProdutoModel::find($dadosPedido->fk_produtos);
        $dadosProdutosAll = ProdutoModel::all();

        return view("Alterar_pedido", [
            "produto" => $dadosProdutosFind,
            "produtoAll" => $dadosProdutosAll,
            "pedido" => $dadosPedido,
            "mensagem" => $mensagem
        ]);
    }
    public function alterar($id, Request $request)
    {
        $dadosPedido =  PedidosModel::find($id);
        $dadosProdutos = ProdutoModel::find($dadosPedido->fk_produtos);


        //Verificar se a quantidade em estoque (contando com os item já contidos no pedido) é maio ou igual a alteração do pedido
        if (($dadosProdutos->quantidade + $dadosPedido->quant_pedido) >= $request->quantidade_pedidos) {

            $produtos =  ProdutoModel::find($request->nome_produto);
            ProdutoModel::where("id", "=", $request->nome_produto)->update(
                [
                    "quantidade" => (($produtos->quantidade + $dadosPedido->quant_pedido) - $request->quantidade_pedidos)
                ]
            );


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

        $dadosProdutos = ProdutoModel::where("id", "=", $request->nome_produto)->get();


        return $quantidade * $dadosProdutos[0]->preco_uni;
    }
}
