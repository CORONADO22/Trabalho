<?php
$server = 'localhost';
$bd = 'medweg';
$user = 'root';
$pass = 'senai';

$conexao = mysqli_connect($server, $user, $pass, $bd);

if(!empty($_GET['searchFarma'])) {
    //echo "contem algo, pesquisar";
    $data = $_GET['searchFarma'];
    //echo $data;
    $sql = "SELECT * FROM cadastro_farmacia WHERE empresa_far LIKE '%$data%' or rua_far LIKE '%$data%' ORDER BY empresa_far;";
}
else {
    //echo "nao tem nada";
    $sql = "SELECT * FROM cadastro_farmacia ORDER BY empresa_far;";
}

$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <script src="javascript/selecaoFarmacia.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <title>Seleção Farmácia</title>

</head>

<header id="header">
    <a id="logo" href="homeCliente.html"><img height="64px" src="img/logo_medweg-removebg-preview.png" alt="medweg"></a>
    <nav id="nav">
        <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
            <span id="hamburger"></span>
        </button>
        <ul id="menu" role="menu">
            <li> <a href="sobreCliente.html" style="cursor: pointer;">Sobre</a></li>
            <li> <a style="cursor: pointer;">Farmácia</a></li>
            <!--Perfil-->
            <a id="button-user" style="cursor: pointer;"><img style="width: 75%;"
                src="img/perfil-de-usuario.png" alt="user"></a>
            
            
            <!--Carrinho-->
            <a id="myBtn" style="cursor: pointer;"><img style="width: 75%;"
                    src="img/carrinho-de-compras-de-design-xadrez (1).png" alt="carrinho"></a>
            <div id="myModal" class="modal">
                <div class="modal-content">
                <span class="close">&times;</span>
                    <br>
                    <br>
                    <span class="close"></span>
                    <a class="modal-border-a" href="compraFeita.php">Histórico</a>
                </div>
            </div>
        </ul>
    </nav>
</header>

<body class="lista_prod">

<center>
    <div class="container_prod">
       <div class="header_prod">
          <b>Lista de Farmácias</b>
          <input type="text" class="input-buscar-farma" id="buscarFarma" name="input_buscar" placeholder="Buscar nome">
          <button class="button_busca_prod" name="btn-busca-prod" onclick="searchDataFarma()"><img src="img/lupa.png" alt="Buscar"></button>
        </div>

    
        <div>
          <table style="width: 100%; ">
          <thead class="thead_lista_far">
            <div>
                <tr>
                    <th>Unidade</th>
                    <th>Empresa</th>
                    <th>Rua</th>
                    <th>Número</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Telefone</th>
                    <th>Acessar Farmácia</th>
                </tr>
            </div>
            </thead>
            <tbody>
            <?php
                while($farma_data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                        echo "<td class='tr_lista_farma'>".$farma_data['unidade_far']."</td>";
                        echo "<td class='tr_lista_farma'>".$farma_data['empresa_far']."</td>";  
                        echo "<td class='tr_lista_farma'>".$farma_data['rua_far']."</td>";                 
                        echo "<td class='tr_lista_farma'>".$farma_data['numero_far']."</td>";       
                        echo "<td class='tr_lista_farma'>".$farma_data['bairro_far']."</td>";
                        echo "<td class='tr_lista_farma'>".$farma_data['cidade_far']."</td>";
                        echo "<td class='tr_lista_farma'>".$farma_data['estado_far']."</td>";
                        echo "<td class='tr_lista_farma'>".$farma_data['telefone_far']."</td>";
                        echo "<td class='tr_acessar'> <a class='btn-alterar-acesso' style='cursor: pointer;' href='selecaoProduto.php?unidade_far=$farma_data[unidade_far]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='50%' height='14' fill='currentColor' class='bi bi-arrow-right-circle' viewBox='0 0 16 16'>
                        <path fill-rule='evenodd' d='M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z'/>
                        </svg></a></td>";

                    echo "</tr>";
                }
            ?>
            </tbody>
          </table>
        </div>
      </div>
    </center>

</body>

<footer>

<div class="container-footer">
        <div class="row-footer">
            <div class="footer-col">
                <h4>Empresa</h4>
                <ul>
                    <li><a href="sobreCliente.html"> Quem somos</a></li>
                </ul>

            </div>


            <div class="footer-col">
                <h4>Obter ajuda</h4>
                <ul>
                    <li><a href="sobreCliente.html">informações de contato</a></li>
                </ul>

            </div>

            <div class="footer-col">
                <h4>Objetivo do sistema</h4>
                <ul>
                    <li><a href="sobreCliente.html">informações</a></li>
                </ul>

            </div>
            <div class="footer-col">
                <h4>Enviar e-mail de reclamação</h4>
                <div class="form-sub">

                    <form>
                        <input type="email" placeholder="Digite o seu email" required>
                        <button>Enviar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</footer>

</html>