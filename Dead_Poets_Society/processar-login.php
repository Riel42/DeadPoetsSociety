<?php
require_once "conexao.php";

$email = $_POST["email"]; //receberá o e-mail
$senha = $_POST["senha"]; //receberá a senha

$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($result->num_rows == 1) { //Se encontrar um resultado
    session_start();
    $_SESSION["usuario"] = true;
    $_SESSION["email"] = $email;
    $_SESSION["id"] = $row['id'];
    
    header("Location: index.php?id={$row['id']}"); //redirecione para index.php
    exit();
} else {
    header("Location: login.php?erro=1"); //Crie uma variável que recebe o valor 1
    exit();
}

$conn->close();
?>
