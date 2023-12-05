<?php
session_start();
require_once "conexao.php";

$isbn = $_POST["isbn"];
$idUsuarios = $_SESSION["id"];

echo $idUsuarios;

$sql = "INSERT INTO likes(idUsuarios, isbnLivros, likes) VALUES 
('$idUsuarios', '$isbn', 1)";

$result = $conn->query($sql);

if($result){
    echo "inserido com sucesso";
}
else{
    echo "erro";
}

?>