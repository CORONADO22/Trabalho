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


/*Carrossel*/



/*Mover páginas*/

function moveToCadastra(){
  window.open("Login.html", '_self');
}


function moveToSobre(){
  window.open("Sobre.html", '_self');
}

function moveToIndex() {
  window.open("index.html", '_self');
}


// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Get the modal
var modal_login = document.getElementById("modal-login-first");

// Get the button that opens the modal
var btn_login = document.getElementById("button-cadastra");
var btn_sacola = document.getElementById("button-sacola");
var btn_historico = document.getElementById("button-historico");
var btn_reserva = document.getElementById("button-reserva");
var btn_farma_home = document.getElementById("button-farmacia-home");

// Get the <span> element that closes the modal
var span_login = document.getElementsByClassName("close-login")[0];

// When the user clicks on the button, open the modal
btn_login.onclick = function() {
  modal_login.style.display = "block";
}
btn_sacola.onclick = function() {
  modal_login.style.display = "block";
  modal.style.display = "none";
}
btn_historico.onclick = function() {
  modal_login.style.display = "block";
  modal.style.display = "none";
}
btn_reserva.onclick = function() {
  modal_login.style.display = "block";
  modal.style.display = "none";
}
btn_farma_home.onclick = function() {
  modal_login.style.display = "block";
  modal.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
span_login.onclick = function() {
  modal_login.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal_login) {
    modal_login.style.display = "none";
  }
}