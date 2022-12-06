<?php
$server = 'localhost';
$bd = 'medweg';
$user = 'root';
$pass = 'senai';

$conexao = mysqli_connect($server, $user, $pass, $bd);

if(!empty($_GET['search'])) {
    //echo "contem algo, pesquisar";
    $data = $_GET['search'];
    //echo $data;
    $sql = "SELECT * FROM produto WHERE nome_prod LIKE '%$data%' or unidade_far LIKE '$data' ORDER BY nome_prod;";
}
else {
    //echo "nao tem nada";
    $sql = "SELECT * FROM produto ORDER BY nome_prod;";
}

$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <script src="javascript/homeFarma.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <title>Tela Principal</title>

</head>

<header id="header">
    <a id="logo" href="homeFarmacia.php"><img height="64px" src="img/logo_medweg-removebg-preview.png" alt="medweg"></a>
    <nav id="nav">
        <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
            <span id="hamburger"></span>
        </button>
        <ul id="menu" role="menu">
            <li> <a href="sobreFarma.html" style="cursor: pointer;">Sobre</a></li>
            <li> <a style="cursor: pointer;" onclick="cadastrar_produto()">Cadastrar Produto</a></li>
            <!--Perfil-->
            <a id="button-user" style="cursor: pointer;"><img style="width: 75%;"
                src="img/perfil-de-usuario.png" alt="user"></a>
                <div id="myModal" class="modal">
                <div class="modal-content">

               </div>
            </div>
        </ul>
    </nav>

    <div class="box-prod" id="modal-cadastrar-produto">
        <form action="cadastroProduto.php" method="POST">
            <span class="close-cadastro-produto" onclick="fechar_cadastro_prod()">&times;</span>
            <br><br>
            <legend><b>Cadastro de Produto</b></legend>
            <br>
            <br>
            <div class="inputBox">
                <input type="combobox" name="unit_txt" id="unit" class="inputUser" required>
                <label for="unit" class="labelInput">Unidade</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="cod_prod_txt" id="cod_prod" class="inputUser" required>
                <label for="cod_prod" class="labelInput">Código do Produto</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="nome_prod_txt" id="nome" class="inputUser"  required>
                <label for="nome" class="labelInput">Nome</label>
            </div>
            <br><br>
            <label for="tipo_prod" >Tipo do Produto: </label>
            <br>

            <div>
                <input type="radio" id="Alimento" name="tipo_prod" value="Alimento" class="edit-btn" required>
                <label for="">Alimento</label>
            </div>
            
            <div>
                <input type="radio" id="Beleza" name="tipo_prod" value="Beleza" class="edit-btn" required>
                <label for="">Beleza</label>
            </div>
            
            <div>
                <input type="radio" id="Medicamento" name="tipo_prod" value="Medicamento" class="edit-btn" required>
                <label for="">Medicamento</label>
            </div>
            
            <div>
                <input type="radio" id="Higiene" style="float='left'" name="tipo_prod" value="Higiene" class="edit-btn" required>
                <label for="">Higiene</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="preco_prod_txt" id="preco" class="inputUser" required>
                <label for="preco" class="labelInput">Preço</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="estoque_prod_txt" id="estoque" class="inputUser" required>
                <label for="estoque" class="labelInput">Estoque</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="descricao_prod_txt" id="descricao" class="inputUser" required>
                <label for="descricao" class="labelInput">Descrição</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="link_prod_txt" id="link" class="inputUser" required>
                <label for="link" class="labelInput">Link da Imagem</label>
            </div>
            <br><br>
            <input type="submit" name="submit" id="submit" class="butt-enviar">
        </form>
    </div>
</header>

<body class="lista_prod">

<center>
    <div class="container_prod">
       <div class="header_prod">
          <b style="">Lista de Produtos</b>
          <input type="text" class="input-buscar" id="input_buscar" name="input_buscar" placeholder="Buscar nome ou tipo dos produtos">
          
          <button class="button_busca_prod" name="btn-busca-prod"><img src="img/lupa.png" alt="Buscar" onclick="searchData()"></button>
        </div>

    
        <div>
          <table style="width: 100%; ">
          <thead class="thead_lista_far">
            <div>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Tipo Produto</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Descrição</th>
                    <th>Unidade Farmácia</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </div>
            </thead>
            <tbody>
            <?php
                while($prod_data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                        echo "<td class='tr_lista'>".$prod_data['cod_prod']."</td>";
                        echo "<td class='tr_lista'>".$prod_data['nome_prod']."</td>";  
                        echo "<td class='tr_lista'>".$prod_data['tipo_prod']."</td>";                 
                        echo "<td class='tr_lista'>R$".$prod_data['preco_prod']."</td>";       
                        echo "<td class='tr_lista'>".$prod_data['estoque_prod']."</td>";
                        echo "<td class='tr_lista'>".$prod_data['descricao_prod']."</td>";
                        echo "<td class='tr_lista'>".$prod_data['unidade_far']."</td>";
                        echo "<td class='tr_editar'> <a class='btn-alterar' style='cursor: pointer;' href='editarProd.php?cod_prod=$prod_data[cod_prod]'>
                        
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='btn-editar' viewBox='0 0 16 16'>
                        <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
                      </svg></a>
                      </td>";
                      echo "<td class='tr_excluir'> <a class='btn-alterar' style='cursor: pointer;' href='delete.php?cod_prod=$prod_data[cod_prod]'>
                      
                      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                      <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                    </svg></a>
                    </td>";

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
                    <li><a href="sobreFarma.html"> Quem somos</a></li>
                </ul>

            </div>


            <div class="footer-col">
                <h4>Obter ajuda</h4>
                <ul>
                    <li><a href="sobreFarma.html">informações de contato</a></li>
                </ul>

            </div>

            <div class="footer-col">
                <h4>Objetivo do sistema</h4>
                <ul>
                    <li><a href="sobreFarma.html">informações</a></li>
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