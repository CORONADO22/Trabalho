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


//Botão buscar
var search = document.getElementById("input_buscar_farma");

search.addEventListener("keydown", function(event) {
    if(event.key === "Enter") {
        searchData();
    }
})

function searchData() {
    window.location = 'selecaoFarmacia.php?search='+search.value;
}

function getUnidade() {
    const textUnidade = localStorage.getItem(unidade);
}

function setUnidade() {
    localStorage.setItem(unit, getUnidade);
}