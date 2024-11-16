<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/formulario_generico.css'); }}">
    <link rel="stylesheet" href="{{ URL::asset('css/menu.css'); }}">
    <title>Alterar Produto</title>
</head>

<body>


    <header>
        <nav class="menu">
            <ul>
                <li><a href="/produtos">Produtos</a></li>
                <li><a href="/listar_pedidos">Pedidos</a></li>
                <li><a href="/encerrar_sessao">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main>
  
        <!-- Formulário de cadastro de produtos -->
        <section class="container_formulaio" id="form_produtos" style="display: flex;">

           

            <form action="<?php echo $pedido['id']; ?>" class="formulario" method="POST">
                @csrf


                <label for="">Nome do Produto:</label>

                <select name="nome_produto" id="">
                    <option value="<?php echo $produto['id']; ?>"><?php echo $produto["nome"]; ?></option>
                    <?php


                    if (!empty($produtos)) {
                        foreach ($produtos as $produto) {

                            echo " <option value='" . $produto["id"] . "'>" . $produto["nome"] . "</option>";
                        }
                    }


                    ?>
                </select>



                <label for="">Nome do Cliente</label>
                <input type="text" name="nome_cliente" class="input_comum" value="<?php echo $pedido['nome_cliente']; ?>" required>

                <label for="">Quantidade:</label>
                <input type="text" name="quantidade_pedidos" class="input_comum" value="<?php echo $pedido['quant_pedido']; ?>" required>

                <button type="submit">Concluír Pedido</button>

                <?php
            if (!empty($mensagem)) {

                echo "<p>" . $mensagem . "</p>";
            }

            ?>
            </form>

            
        </section>
    </main>

    <footer>

    </footer>
</body>

</html>