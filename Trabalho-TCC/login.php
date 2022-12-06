<?php

$server = 'localhost';
$bd = 'medweg';
$user = 'root';
$pass = 'senai';

$conexao = mysqli_connect($server, $user, $pass, $bd);


if(empty($_POST['email_txt']) || empty($_POST['senha_txt'])) {
    header('Location: index.html');
    exit();
}

$email_cli = $_POST["email_txt"];
$senha_cli = $_POST["senha_txt"];

$query = "select cpf_cli from cadastro_cliente where email_cli = '{$email_cli}' and senha_cli = '{$senha_cli}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
$_SESSION['email_txt'] = $email_cli ['senha_txt'] = $senha_cli;
header('Location: homeCliente.html');
exit();
} else {
 
  echo "<script>
					alert(\"E-mail recebido com Sucesso.\");
				</script>";
        header('Location: index.html');
        exit();
}


if (mysqli_query($conexao, $sql)) {
    /*echo "New record created successfully";*/
  } else {
    /*echo "Error: " . $sql . "<br>";*/
  }
  
  mysqli_close($conexao);

  header("location: homeCliente.html");
?>
