<?php


$server = 'localhost';
$bd = 'medweg';
$user = 'root';
$pass = 'senai';

$conexao = mysqli_connect($server, $user, $pass, $bd);


if(empty($_POST['unidade_txt']) || empty($_POST['senha_far_txt'])) {
    header('Location: index.html');
    exit();
}

$unidade_far = $_POST["unidade_txt"];
$senha_far = $_POST["senha_far_txt"];

$query = "select unidade_far from cadastro_farmacia where unidade_far = '{$unidade_far}' and senha_far = '{$senha_far}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
$_SESSION['unidade_txt'] = $unidade_far ['senha_far_txt'] = $senha_far;
header('Location: homeFarmacia.php');
exit();
} else {
 header('Location: index.html');
 exit();
}



if (mysqli_query($conexao, $sql)) {
    /*echo "New record created successfully";*/
  } else {
    /*echo "Error: " . $sql . "<br>";*/
  }
  
  mysqli_close($conexao);

  header("location: homeFarmacia.php");
    
?>