<?php
try{
    $conexao = new PDO("mysql:host=localhost; dbname=devweb2","root","");
}catch(PDOException $e){
    die("Ocorreu um erro inesperado " . $e->getMessage());
}

$nome1 = $_POST['nome1'];

try{
    $sql = "insert into area (nomearera) values ('$nome1')";
    $conexao->exec($sql);
    echo "Salvo com sucesso !!!";
}catch(PDOException $e){
    die("Ocorreu um erro " . $e->getMessage());
}

?>