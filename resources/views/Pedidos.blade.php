<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/menu.css'); }}">
    <link rel="stylesheet" href="{{ URL::asset('css/formulario_generico.css'); }}">
    <script src="{{asset('js/formulario_produtos.js')}}" defer></script>
    <title>Pedidos</title>
</head>

<body>

    <nav class="menu">
        <ul>
            <li><a href="/produtos">Produtos</a></li>
            <li><a href="/listar_pedidos">Pedidos</a></li>
            <li><a href="/encerrar_sessao">Sair</a></li>
        </ul>
    </nav>

    <main>
        <section class="container_produtos">
            <button type="button" class="btn" id="button_produtos">Fazer Pedido</button>
            <table class="tabela_produtos">
                <tr class="cabecalho">
                    <th>Produto</th>
                    <th>Nome Cliente</th>
                    <th>Preço Total</th>
                    <th>Quant. pedido</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>

                <?php

                if (!empty($pedidos)) {

                    foreach ($pedidos as $pedido) {
                        echo "<tr>";
                        echo "<td>" . $pedido->nome . "</td>";
                        echo "<td>" . $pedido->nome_cliente . "</td>";
                        echo "<td>" . $pedido->preco_total . ",00</td>";
                        echo "<td>" . $pedido->quant_pedido . "</td>";
                        echo "<td><a href='/alterar_pedido/" . $pedido->id_pedidos . "' class='btn alterar'>Editar</a></td>";
                        echo "<td><a href='/excluir_pedido/" . $pedido->id_pedidos . "' class='btn deletar'>Deletar</a></td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>


        </section>

        <!-- Formulário de cadastro de produtos -->
        <section class="container_formulaio" id="form_produtos">

            <form action="fazer_pedido" class="formulario" method="POST">
                @csrf
                <div class="fechar_aba" id="fechar_aba_produtos">
                </div>

                <label for="">Nome do Produto:</label>



                <select name="nome_produto" id="">
                    <option value="0">Selecione o produto</option>
                    <?php


                    if (!empty($produtos)) {
                        foreach ($produtos as $produto) {
                            
                            echo " <option value='" . $produto["id"] . "'>" . $produto["nome"] . "</option>";
                        }
                    }


                    ?>
                </select>



                <label for="">Nome do Cliente</label>
                <input type="text" name="nome_cliente" class="input_comum" required>

                <label for="">Quantidade:</label>
                <input type="text" name="quantidade_pedidos" class="input_comum" required>

                <button type="submit">Concluír Pedido</button>
            </form>
        </section>

    </main>

</body>

</html>