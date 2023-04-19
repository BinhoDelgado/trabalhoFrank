<?php
try{
    $conexao = new PDO("mysql:host=localhost; dbname=devweb2","root","");
}catch(PDOException $e){
    die("Ocorreu um erro inesperado " . $e->getMessage());
}
$idArea = $_POST['idArera'];
$nome = $_POST['nome'];

try{
    $sql = "update area set nomeArera = '$nome' where idArea=" . $idArea;
    $conexao->exec($sql);
    echo "Salvo com sucesso !!!";
}catch(PDOException $e){
    die("Ocorreu um erro " . $e->getMessage());
}
header('Location: ../../view/area/buscarArea.php');
?>