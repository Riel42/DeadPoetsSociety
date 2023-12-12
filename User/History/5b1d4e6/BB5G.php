<?php
require_once "conexao.php";

$isbn = $_POST["isbn"];

$sql = "DELETE FROM livros WHERE isbn = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("s", $isbn);

    if ($stmt->execute()) {
        $conn->close();
        header("Location: livros.php");
        exit();
    } else {
        // A exclusão falhou
        $conn->close();
        header("Location: livros.php?erro-remover=1");
        exit();
    }
} else {
    // A preparação da consulta SQL falhou
    $conn->close();
    header("Location: livros.php?erro=1&isbn=$isbn");
    exit();
}
?>
