<?php
require_once "conexao.php";
$nome = $_POST["nome"];
$foto = $_POST["foto"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$confirmarSenha = $_POST["confirmarSenha"];
$dataNasc = $_POST["dataNasc"];

$foto = "img/scooby.jpg";

if($senha === $confirmarSenha){
    $sql = "INSERT INTO usuarios (nome, email, senha, dataNasc, foto) VALUES 
    ('$nome', '$email', '$senha', '$dataNasc', '$foto')";
}
else{
    header("Location: cadastrar.php?erro=1");
    exit();
}

if ($conn->query($sql) === TRUE) {
    header("Location: login.php");
    exit();
} else {
    echo "Erro ao cadastrar o usuário: " . $conn->error;
}

$conn->close();