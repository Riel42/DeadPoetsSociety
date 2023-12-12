<?php
require_once "conexao.php";

$isbn = $_POST["isbn"];

$sql = "DELETE FROM livros WHERE isbn = ?";

$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("i", $isbn);
    
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        
        header("Location: livros.php");
        exit();
    } else {
        // A execução da consulta SQL falhou
        echo "Erro ao excluir o livro: " . $conn->error;
        $stmt->close();
        $conn->close();
        exit();
    }
} else {
    // A preparação da consulta SQL falhou
    echo "Erro na preparação da consulta: " . $conn->error;
    $conn->close();
    exit();
}
?>
