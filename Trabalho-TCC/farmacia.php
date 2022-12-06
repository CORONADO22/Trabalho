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

$unidade_far = $_POST['unidade_txt'];
$senha_far = $_POST["senha_far_txt"];
$empresa_far = $_POST['empresa_txt'];
$cidade_far = $_POST["cidade_far_txt"];
$rua_far = $_POST["rua_far_txt"];
$bairro_far = $_POST["bairro_far_txt"];
$estado_far = $_POST["estado_far_txt"];
$numero_far = $_POST["numero_far_txt"];
$telefone_far = $_POST["telefone_far_txt"];

$sql = "INSERT INTO cadastro_farmacia (unidade_far, senha_far, empresa_far, cidade_far, rua_far, bairro_far, estado_far, numero_far, telefone_far) VALUES ('$unidade_far', '$senha_far', '$empresa_far', '$cidade_far', '$rua_far', '$bairro_far', '$estado_far', '$numero_far', '$telefone_far')";

if (mysqli_query($conexao, $sql)) {
    /*echo "New record created successfully";*/
  } else {
    /*echo "Error: " . $sql . "<br>";*/
  }
  header("location: homeFarmacia.php");
  mysqli_close($conexao);
?>