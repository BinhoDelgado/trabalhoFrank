<?php
try{
    $conexao = new PDO("mysql:host=localhost; dbname=devweb2","root","");
}catch(PDOException $e){
    die("Ocorreu um erro inesperado " . $e->getMessage());
}

$nome2 = $_POST['nome'];

try{
    $sql = "insert into curso (nomeCurso) values ('$nome2')";
    $conexao->exec($sql);
    echo "Salvo com sucesso !!!";
}catch(PDOException $e){
    die("Ocorreu um erro " . $e->getMessage());
}

?>