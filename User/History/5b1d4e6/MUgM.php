<?php
require_once "conexao.php";

$isbn = $_POST["isbn"];

$sql = "DELETE FROM livros WHERE isbn = ?";
$stmt = $conn->prepare($sql);

if (true) {
    $stmt->bind_param("s", $isbn);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();

        header("Location: livros.php");
        exit();
    } else {
        // A exclusão falhou
        $stmt->close();
        $conn->close();

        header("Location: livros.php?erro-remover=1");
        exit();
    }
}
?>
