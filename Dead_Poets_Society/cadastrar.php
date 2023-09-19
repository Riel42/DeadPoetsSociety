
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
                <li><a href="#">Livros</a></li>
                <li><a href='cadastrar.php'>Cadastrar-se</a></li>
            </ul>
        </nav>
    </header>
    <main style="display: block; text-align: center; padding: 50px">
        <h1>Tela de cadastro</h1>
        <form action="processar-cadastro.php" method="post">

            <label for="nome">Nome: </label>
            <input type="text" id="nome" name="nome" placeholder="Digite um nome de usuário" required><br>
            
            <label for="email">E-mail: </label>
            <input type="email" id="email" name="email" placeholder="Digite seu email" required><br>

            <label for="senha">Senha: </label>
            <input type="password" id="senha" name="senha" placeholder="Digite uma senha" required><br>

            <label for="confirmarSenha">Confirme a sua senha: </label><br>
            <input type="password" id="confirmarSenha" name="confirmarSenha" placeholder="Confirme sua senha" required><br>

            <?php if (isset($_GET['erro'])){?>
                <label for="invalido" class="erro" style="color: red">As senhas estão incorretas</label><br>
            <?php }?>

            <label for="dataNasc">Data de nascimento: </label><br>
            <input type="date" id="dataNasc" name="dataNasc" required><br>
            
            <input type="submit" name="cadastro" class="cadastrar" value="Cadastrar usuario"/>
        </form>
        <br>
        <hr>
        <p style="text-align: center">Já possui um cadastro? <a href="login.php">Clique aqui.</a></p>
    <br>
    </main>
    <hr>
    <footer>
        <div class="foot">
            <address>Esse site foi criado no IFSP - Campus Guarulhos</address>
            <b>Filosofia de Copyleft - Código-fonte disponível no <a href="#">GitHub</a></b>
        </div>
    </footer>
</body>
</html>