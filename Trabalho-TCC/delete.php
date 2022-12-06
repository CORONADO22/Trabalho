<?php

$server = 'localhost';
$bd = 'medweg';
$user = 'root';
$pass = 'senai';

$conexao = mysqli_connect($server, $user, $pass, $bd);

//include_once('cadastroProduto.php');

if(!empty($_GET['cod_prod'])) {

    $cod_prod = $_GET['cod_prod'];

    $sqlSelect = "SELECT * FROM produto WHERE cod_prod=$cod_prod";

    $result = $conexao->query($sqlSelect);
    //print_r($result);

    if($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM produto WHERE cod_prod=$cod_prod";
        $resultDelete = $conexao->query($sqlDelete);
    }
    
}
header('Location: homeFarmacia.php');

?>