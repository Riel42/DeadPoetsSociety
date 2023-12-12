<?php
require_once "conexao.php";

$isbn = $_POST["isbn"];

// Deletar registros de likes relacionados ao ISBN na tabela livros
$sql_delete_likes = "DELETE FROM likes WHERE isbnLivros = ?";
$stmt_delete_likes = $conn->prepare($sql_delete_likes);

if ($stmt_delete_likes) {
    $stmt_delete_likes->bind_param("i", $isbn);

    if ($stmt_delete_likes->execute()) {
        $stmt_delete_likes->close();

        // Agora podemos deletar o livro da tabela livros
        $sql_delete_book = "DELETE FROM livros WHERE isbn = ?";
        $stmt_delete_book = $conn->prepare($sql_delete_book);

        if ($stmt_delete_book) {
            $stmt_delete_book->bind_param("i", $isbn);

            if ($stmt_delete_book->execute()) {
                $stmt_delete_book->close();
                $conn->close();

                header("Location: livros.php");
                exit();
            } else {
                echo "Erro ao excluir o livro: " . $conn->error;
                $stmt_delete_book->close();
                $conn->close();
                exit();
            }
        } else {
            echo "Erro na preparação da consulta para excluir o livro: " . $conn->error;
            $conn->close();
            exit();
        }
    } else {
        echo "Erro ao excluir os registros de likes: " . $conn->error;
        $stmt_delete_likes->close();
        $conn->close();
        exit();
    }
} else {
    echo "Erro na preparação da consulta para excluir os registros de likes: " . $conn->error;
    $conn->close();
    exit();
}
?>
