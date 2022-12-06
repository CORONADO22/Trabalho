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


$nome_cli = $_POST["nome_txt"];
$cpf_cli = $_POST["cpf_txt"];
$data_nasc_cli = $_POST["data_nascimento_txt"];
$email_cli = $_POST["email_txt"];
$senha_cli = $_POST["senha_txt"];
$celular_cli = $_POST["telefone_txt"];
$cidade_cli = $_POST["cidade_txt"];
$estado_cli = $_POST["estado_txt"];


$sql = "INSERT INTO cadastro_cliente (nome_cli, cpf_cli, data_nasc_cli, email_cli, senha_cli, celular_cli, cidade_cli, estado_cli) VALUES ('$nome_cli', '$cpf_cli', '$data_nasc_cli', '$email_cli', '$senha_cli', '$celular_cli', '$cidade_cli', '$estado_cli')";

if (mysqli_query($conexao, $sql)) {
    /*echo "New record created successfully";*/
  } else {
    /*echo "Error: " . $sql . "<br>";*/
  }
  header("location: homeCliente.html");
  mysqli_close($conexao);

?>