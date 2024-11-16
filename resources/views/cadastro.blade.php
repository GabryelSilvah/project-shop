<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/login.css');}}">
    <title>Cadastra-se</title>
</head>

<body>
    <main>
        <section class="container_login">
            <form action="cadastrar_user" method="POST">
                @csrf
                <label for="">Email:</label>
                <input type="text" name="email">

                <label for="">Senha:</label>
                <input type="password" name="senha">
   
                <label for="">Confirmar Senha:</label>
                <input type="password" name="confirmar_senha">

                <button type="submit">Cadastrar</button>
                <a href="login">Voltar</a>
            </form>
        </section>
    </main>
</body>

</html>