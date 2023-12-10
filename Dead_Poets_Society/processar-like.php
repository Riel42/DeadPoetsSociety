<?php
session_start();
require_once "conexao.php";

$isbn = $_POST["isbn"];
$idUsuarios = $_SESSION["id"];

echo $idUsuarios . "<br>";

$sql = "INSERT INTO likes(idUsuarios, isbnLivros, likes) VALUES 
('$idUsuarios', '$isbn', 1)";

$result = $conn->query($sql);

if($result){
    echo "inserido com sucesso";
    header('Location: livros.php?sucess=1');
}
else{
    echo "erro";
}

?>