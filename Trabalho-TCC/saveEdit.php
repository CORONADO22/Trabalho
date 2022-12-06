<?php

$server = 'localhost';
$bd = 'medweg';
$user = 'root';
$pass = 'senai';

$conexao = mysqli_connect($server, $user, $pass, $bd);

if(isset($_POST['update'])) {
    $cod_prod = $_POST["cod_prod_txt"];
    $estoque_prod = $_POST["estoque_prod_txt"];
    $preco_prod = $_POST["preco_prod_txt"];
    $nome_prod = $_POST["nome_prod_txt"];
    $descricao_prod = $_POST["descricao_prod_txt"];
    $tipo_prod = $_POST["tipo_prod"];
    $link_prod = $_POST['link_prod_txt'];

    $sqlUpdate = "UPDATE produto set estoque_prod='$estoque_prod', preco_prod='$preco_prod', nome_prod='$nome_prod', descricao_prod='$descricao_prod', tipo_prod='$tipo_prod', link_prod='$link_prod' WHERE cod_prod='$cod_prod'";

    $result = $conexao->query($sqlUpdate);
}
header('Location: homeFarmacia.php');
//cod_prod, estoque_prod, preco_prod, nome_prod, descricao_prod, tipo_prod
?>