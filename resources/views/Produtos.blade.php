<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/menu.css'); }}">
    <link rel="stylesheet" href="{{ URL::asset('css/formulario_generico.css'); }}">
    <script src="{{asset('js/formulario_produtos.js')}}" defer></script>
    <title>Produtos</title>
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
            <button type="button" class="btn" id="button_produtos">Cadastrar</button>
            <table class="tabela_produtos">
                <tr class="cabecalho">
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Preço UNI.</th>
                    <th>Quantidade</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>

                <?php

                if (!empty($produtos)) {

                    foreach ($produtos as $produto) {
                        echo "<tr>";
                        echo "<td>" . $produto["id"] . "</td>";
                        echo "<td>" . $produto["nome"] . "</td>";
                        echo "<td>" . $produto["preco_uni"] . "</td>";
                        echo "<td>" . $produto["quantidade"] . "</td>";
                        echo "<td><a href='/alterar_produto/" . $produto["id"] . "' class='btn alterar'>Editar</a></td>";
                        echo "<td><a href='/excluir_produto/" . $produto["id"] . "' class='btn deletar'>Deletar</a></td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>


        </section>

        <!-- Formulário de cadastro de produtos -->
        <section class="container_formulaio" id="form_produtos">

            <form action="cadastrar" class="formulario" method="POST">
                @csrf
                <div class="fechar_aba" id="fechar_aba_produtos">
                </div>

                <label for="">Nome do Produto:</label>
                <input type="text" name="nome_produto" class="input_comum" required>

                <label for="">Preço unitário:</label>
                <input type="text" name="preco_uni" class="input_comum" required>

                <label for="">Quantidade:</label>
                <input type="text" name="quantidade" class="input_comum" required>

                <button type="submit">Cadastrar</button>
            </form>
        </section>

    </main>

</body>

</html>