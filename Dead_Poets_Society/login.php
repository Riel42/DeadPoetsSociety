
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Gabryel Miranda dos Reis">
    <meta name="description" content="Página de log-in do clube de leitura Dead Poets Society">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>Dead Poets Society - Tela de Login</title>
</head>
<body>
    <header>
        <div class="logo">
            <figure>
                <img src="img/logo.png" width="100px" height="100px" style="padding: 5px">
            </figure>
        </div>
        <div class="nome">
            <h1 style="color: white">Dead Poets Society</h1>
        </div>
        <nav class="navs">
            <ul>
                <li><a href="index.html">Página Inicial</a></li>
                <li><a href="livros.php">Livros</a></li>
                <li><a href='cadastrar.php'>Cadastrar-se</a></li>
            </ul>
        </nav>
    </header>
    <main style="display: block; text-align: center; padding: 50px">
        <h1>Faça seu Login aqui!</h1>
        <form action="processar-login.php" method="POST">

            <label for="email">E-mail: </label>
            <input type="email" id="email" name="email" placeholder="Digite o seu e-mail" required><br>

            <label for="senha">Senha: </label>
            <input type="password" id="senha" name="senha" placeholder="Digite a sua senha" required><br>
            <?php if (isset($_GET['erro'])){?> <!-- Se há um valor = isset -->
                <label for="invalido" class="erro" style="color: red">E-mail ou senha inválida</label><br>
            <?php }?>
            <input type="submit" class="botao-cadastrar" value="Entrar"/>
    </form>
    <br>
    <hr>
    <p style="text-align: center">Ainda não tem um cadastro? <a href="cadastrar.php">Clique aqui.</a></p>
    <br>
    <picture>
        <img src="https://usagif.com/wp-content/uploads/cat-typing-12.gif" alt="GIF de um gatinho cinza fofo digitando em seu notebook">
    </picture>
    </main>
    <hr>
    <footer>
        <div class="foot">
            <address>Esse site foi criado no IFSP - Campus Guarulhos</address>
            <b>Filosofia de Copyleft - Código-fonte disponível no <a href="https://github.com/Riel42/DeadPoetsSociety">GitHub</a></b>
        </div>
    </footer>
</body>
</html>