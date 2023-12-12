
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
    <title>Dead Poets Society - Livros</title>

    <style>
        main{text-align: center; display: flex; flex-direction: row; justify-content: center;}
        /*table, td, th{border: 1px solid black; padding: 5px; margin: 5px;}*/
        table, td, th, tr{padding: 10px;}
        .like{
            width:50px;
            height:50px;
            background-image: url(img/like.png);
            background-position: center;
            background-repeat: no-repeat;
            background-size: 50px 50px;
            border: 0;
        }
        h3{ color: red; }
    </style>

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
                <li><a href="index.php">Página Inicial</a></li>
                <li><a href="#">Livros</a></li>
                <li><a href="perfil.php">Perfil</a></li>
                <li><a href='cadastrar.php'>Cadastrar-se</a></li>
            </ul>
        </nav>
    </header>
    <main>

  <section>
    <h3>
      <?php 
        if(isset($_GET['sucess'])){
          echo "Livro curtido com sucesso!"; 

        }
      ?>
    </h3>
    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Páginas</th>
          <th>Editora</th>
          <th colspan="2">Ação</th>
        </tr>
      </thead>
      <?php
      session_start();
      require "conexao.php";
      $sql = "select * from livros order by isbn ASC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

    ?>

      <tbody>
      <tr>
        <td><?= $row['nome'] ?></td>
        <td><?= $row['descricao'] ?></td>
        <td><?= $row['paginas'] ?></td>
        <td><?= $row['editora'] ?></td>
       
        <td>
        <form action="editar-livro.php" method="GET"> 
          <input type="hidden" name="isbn" value="<?= $row['isbn'] ?>">
          <input type="submit" class="botao-editar" value="Editar">
          </form>
        </td>
        <td>
          <form action="excluir-livro.php" method="POST">
            <input type="hidden" name="isbn" value="<?= $row['isbn'];?>">
            <input type="submit" class="botao-excluir" value="Excluir">
          </form>
        </td>
      </tr>
      <?php }
                }
                ?>
      </tbody>
    </table>
  </section>

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