<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="css/form.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="img/logo-ifsp-removebg.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Dead Poets Society - Editar Produto</title>
</head>

<body>
  <main>
    <section class="container-form">
    <?php
require "conexao.php";
$id = $_GET['isbn']; // Alterado de $id = $_GET['isbn'];
$sql = "SELECT * FROM livros WHERE isbn = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id); // Usar $id no bind_param

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();}
?>

      <form action="processar-editar-livro.php" method="POST">

        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" placeholder="<?php echo $row['nome']; ?>" value="<?php echo $row['nome']; ?>" required>


        <label for="descricao">Descrição</label>
        <input type="text" id="descricao" name="descricao" placeholder="<?php echo $row['descricao']; ?>" value="<?php echo $row['descricao']; ?>" required>

        <label for="paginas">Páginas</label>
        <input type="text" id="paginas" name="paginas" placeholder="<?php echo $row['paginas']; ?>" value="<?php echo $row['paginas']; ?>" required>

        <label for="editora">Editora</label>
        <input type="text" id="editora" name="editora" placeholder="<?php echo $row['editora']; ?>" value="<?php echo $row['editora']; ?>" required>


        <input type="hidden" name="isbn" value="<?= $row['isbn'] ?>">

        <input type="submit" name="editar" class="botao-cadastrar" value="Editar produto" />
      </form>

    </section>
  </main>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
</body>

</html>