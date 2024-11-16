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
                <li><a href="/pedidos">Pedidos</a></li>
                <li><a href="/encerrar_sessao">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <!-- Formulário de alteração de produtos -->
        <section class="container_formulaio" id="form_produtos" style="display: flex;">

            <form action="" class="formulario" method="POST">
                @csrf
             

                <label for="">Nome do Produto:</label>
                <input type="text" name="nome_produto" class="input_comum" value="<?php echo $edit_produto['nome'] ?>" required>

                <label for="">Preço unitário:</label>
                <input type="text" name="preco_uni" class="input_comum" value="<?php echo $edit_produto['preco_uni'] ?>" required>

                <label for="">Quantidade:</label>
                <input type="text" name="quantidade" class="input_comum" value="<?php echo $edit_produto['quantidade'] ?>" required>


                <button type="submit">Alterar</button>
                <a href="/produtos" style="text-decoration: none;color:black">Voltar</a>
            </form>
        </section>
    </main>

    <footer>

    </footer>
</body>

</html>