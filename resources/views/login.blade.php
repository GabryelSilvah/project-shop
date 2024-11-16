<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/login.css');}}">
    <title>Login</title>
</head>

<body>


    <main>
        <section class="container_login">
            <form action="logar" method="POST">
                @csrf
                <label for="">Email:</label>
                <input type="text" name="email">
                <label for="">Senha:</label>
                <input type="password" name="senha">
                <button type="submit">Entrar</button>
                <a href="cadastrar">Criar conta</a>
            </form>

        </section>
    </main>

</body>

</html>