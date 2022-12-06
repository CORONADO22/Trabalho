<?php

$server = 'localhost';
$bd = 'medweg';
$user = 'root';
$pass = 'senai';

$conexao = mysqli_connect($server, $user, $pass, $bd);

$num_tel_comp = $_POST['telefone_comp'];
$num_casa_comp = $_POST['numero_comp'];
$nome_rua_comp = $_POST['rua_comp'];
$prim_nome_comp = $_POST['nome_comp'];
$sobrenome_comp = $_POST['sobrenome_comp'];
$forma_paga = $_POST['paymentMethod'];
$cpf_comp = $_POST['cpf_comp'];
$cep_comp = $_POST['cep_comp'];
$email_comp = $_POST['email_comp'];
$nome_bairro_comp = $_POST['bairro_comp'];
$numero_cartao = $_POST['numero_cartao'];
$codigo_cartao = $_POST['codigo_cartao'];
$data_expira = $_POST['data_expira'];
$contin_unico_reser = $_POST['tipo_reserva'];
$data_reser = $_POST['data_reserva'];

$sql = "INSERT INTO compra_cli_far (cpf_cli, num_tel_comp, num_casa_comp, nome_rua_comp, prim_nome_comp, sobrenome_comp, forma_paga, cpf_comp, cep_comp, email_comp, nome_bairro_comp, numero_cartao, codigo_cartao, data_expira, contin_unico_reser, data_reser) VALUES ('$cpf_comp', '$num_tel_comp', '$num_casa_comp', '$nome_rua_comp', '$prim_nome_comp', '$sobrenome_comp', '$forma_paga', '$cpf_comp', '$cep_comp', '$email_comp', '$nome_bairro_comp', '$numero_cartao', '$codigo_cartao', '$data_expira', '$contin_unico_reser', '$data_reser')";

if (mysqli_query($conexao, $sql)) {
    /*echo "New record created successfully";*/
} else {
    /*echo "Error: " . $sql . "<br>";*/
}
header("location: homeCliente.html");
mysqli_close($conexao);

?>