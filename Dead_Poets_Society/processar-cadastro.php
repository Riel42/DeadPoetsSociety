<?php
require_once "conexao.php";
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$confirmarSenha = $_POST["confirmarSenha"];
$dataNasc = $_POST["dataNasc"];

if($senha === $confirmarSenha){
    $sql = "INSERT INTO usuarios (nome, email, senha, dataNasc) VALUES 
    ('$nome', '$email', '$senha', '$dataNasc')";
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