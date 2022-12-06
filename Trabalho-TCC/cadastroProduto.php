<?php

$server = 'localhost';
$bd = 'medweg';
$user = 'root';
$pass = 'senai';

$conexao = mysqli_connect($server, $user, $pass, $bd);

/*
try{
    $connection = new PDO("pgsql: host=$server;port=5432;dbname=$bd", $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    echo "conectado ao banco de dados!";
}catch (PDOExceptio $e){
    echo "Falha ao conectar ao banco de dados. <br/>";
    die($e->getMessage());
}
*/

$cod_prod = $_POST["cod_prod_txt"];
$estoque_prod = $_POST["estoque_prod_txt"];
$preco_prod = $_POST["preco_prod_txt"];
$nome_prod = $_POST["nome_prod_txt"];
$descricao_prod = $_POST["descricao_prod_txt"];
$tipo_prod = $_POST["tipo_prod"];
$unidade_far = $_POST['unit_txt'];
$link_prod = $_POST["link_prod_txt"];


$sql = "INSERT INTO produto (cod_prod, estoque_prod, preco_prod, nome_prod, descricao_prod, tipo_prod, unidade_far, link_prod) VALUES ('$cod_prod', '$estoque_prod', '$preco_prod', '$nome_prod', '$descricao_prod', '$tipo_prod', '$unidade_far', '$link_prod')";



if (mysqli_query($conexao, $sql)) {
    /*echo "New record created successfully";*/
  } else {
    /*echo "Error: " . $sql . "<br>";*/
  }
  header("location: homeFarmacia.php");
  mysqli_close($conexao);
    
?>