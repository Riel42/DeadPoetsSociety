<?php
require_once "conexao.php";

// ...
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$paginas = $_POST["paginas"];
$isbn = $_POST["isbn"];
$editora = $_POST["editora"];

$sql = "DELETE FROM livros WHERE isbn = ?;";

$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("ssssi", $nome, $descricao, $paginas, $editora, $isbn);
    
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        
        header("Location: livros.php");
        exit(); // Encerra a execução após o redirecionamento
    } else {
        // A execução da consulta SQL falhou
        $stmt->close();
        $conn->close();
        
        header("Location: livros.php?erro=1&isbn=$isbn");
        exit(); // Encerra a execução após o redirecionamento
    }
} else {
    // A preparação da consulta SQL falhou
    $conn->close();
    
    header("Location: livros.php?erro=1&isbn=$isbn");
    exit(); // Encerra a execução após o redirecionamento
}


?>
