<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}
$email = $_SESSION['email'];
?>
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
                <li><a href="perfil.php">Perfil</a></li>
                <li><a href='cadastrar.php'>Cadastrar-se</a></li>
            </ul>
        </nav>
    </header>
    <main style="display: block; text-align: center; padding: 50px">
    <?php
        include 'conexao.php';
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email); // "s" representa uma string

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "Nome: " . $row["nome"] . "<br>";
                echo "E-mail: " . $row["email"] . "<br>";
                echo "Data de Nascimento: " . $row["dataNasc"] . "<br>";

                if(isset($_POST['acao'])){
                    $arquivo = $_FILES['file'];
        
                    $arquivoNovo = explode('.',$arquivo['name']);
        
                    if($arquivoNovo[sizeof($arquivoNovo)-1] != 'jpg'){
                        die('Você não pode fazer upload deste tipo de arquivo');
                    }
                    else{
                        move_uploaded_file($arquivo['tmp_name'],'uploads/'.$arquivo['name']);
                        $outroArquivo = $arquivo['name'];
                        $idUser = $row['id'];
                        $sqlFoto = "UPDATE usuarios SET foto='uploads/$outroArquivo' WHERE id='$idUser'";
                        if ($conn->query($sqlFoto) === TRUE) {
                            header("Location: perfil.php?arquivo='$outroArquivo'");
                            exit();
                        }
                    }
                }

                echo "Foto:<br><img src='" . $row["foto"] . "' width='200px' height='200px'><br>";
            } else {
                header("Location: login.php");
            }
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }

        $conn->close();
    ?>


    <?php 
        $sql = "SELECT * FROM usuarios WHERE id";
        include 'conexao.php';
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="acao" value="Enviar">
    </form>
    
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