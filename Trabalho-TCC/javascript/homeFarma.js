//Menu

const btnMobile = document.getElementById('btn-mobile');

function toggleMenu(event) {
    if(event.type === 'touchstart') event.preventDefault();
  const nav = document.getElementById('nav');
  nav.classList.toggle('active');
  const active = nav.classList.contains('active');
  event.currentTarget.setAttribute('aria-expanded', active);
  if(active) {
     event.currentTarget.setAttribute('aria-label', 'Fechar Menu');
  } else {
    event.currentTarget.setAttribute('aria-label', 'Abrir Menu');
  }
}

btnMobile.addEventListener('click', toggleMenu);
btnMobile.addEventListener('touchstart', toggleMenu);


//homeFarmacia.php?cod_prod=$prod_data[cod_prod]
//window.location = window.location.homeFarmacia.php?cod_prod=$prod_data[cod_prod] + "document.getElementById('modal-cadastrar-produto').style.display = 'block';"


//Cadastro Produto
function cadastrar_produto() {
    document.getElementById("modal-cadastrar-produto").style.display = "block";
}

//Fechar cadastro produto

function fechar_cadastro_prod() {
 document.getElementById("modal-cadastrar-produto").style.display = "none"; 
}

function editarProd(event) {
    console.log(event)
    document.getElementById("modal-editar-produto").style.display = "block";
  
}

//Botão buscar
var search = document.getElementById("input_buscar");

search.addEventListener("keydown", function(event) {
    if(event.key === "Enter") {
        searchData();
    }
})

function searchData() {
    window.location = 'homeFarmacia.php?search='+search.value;
}