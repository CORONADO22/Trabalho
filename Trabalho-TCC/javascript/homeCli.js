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


//Carrinho

var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

//Fechar carrinho
span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

//Botão buscar
var search = document.getElementById("txtBusca");

search.addEventListener("keydown", function(event) {
    if(event.key === "Enter") {
        searchData();
    }
})

var unidade = document.getElementById("unidadeBuscar");
var unidadeNum = parseInt(unidade);
function searchData() {
  window.location = 'selecaoProduto.php?search='+search.value;
}