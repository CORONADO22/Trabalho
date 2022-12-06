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

//Modal

var modal_login = document.getElementById("modal-login-first");
var modal_login_farma = document.getElementById("modal-login-first-farma");
var modal_cadastra = document.getElementById("modal-cadastrar");
var modal_cadastra_farma = document.getElementById("modal_cadastrar_farma");


//Login

var btn_login = document.getElementById("button-cadastra");

btn_login.onclick = function() {
    modal_login.style.display = "block";
}

function moveToLoginCli() {
    if(document.getElementById("cliente_login").checked = true) {
      modal_login_farma.style.display = "none";
      modal_login.style.display = "block";
      $("#cliente_login").prop("checked", true);
    }
  }
  
function moveToLoginFarma() {
if(document.getElementById("farmacia_login").checked = true) {
    modal_login.style.display = "none";
    modal_login_farma.style.display = "block";
    $("#cliente_login").prop("checked", false);
}
}

//Aparecer Login pelo carrinho

//var btn_sacola = document.getElementById("button-sacola");
var btn_historico = document.getElementById("button-historico");
//var btn_reserva = document.getElementById("button-reserva");
var btn_farma_home = document.getElementById("button-farmacia-home");
/*
btn_sacola.onclick = function() {
    modal_login.style.display = "block";
    modal.style.display = "none";
}*/
btn_historico.onclick = function() {
    modal_login.style.display = "block";
    modal.style.display = "none";
}/*
btn_reserva.onclick = function() {
    modal_login.style.display = "block";
    modal.style.display = "none";
}*/
btn_farma_home.onclick = function() {
    modal_login.style.display = "block";
    modal.style.display = "none";
}

//Login Fechar

var span_login = document.getElementsByClassName("close-login")[0];

function fechar_login_farmacia() {
    modal_login_farma.style.display = "none";
}

span_login.onclick = function() {
    modal_login.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal_login) {
      modal_login.style.display = "none";
    }
}

//Cadastro
function moveToCadastraCli() {
if(document.getElementById("cliente").checked = true) {
    modal_cadastra_farma.style.display = "none";
    modal_cadastra.style.display = "block";
    $( "#cliente" ).prop( "checked", false );
}
}

function moveToCadastraFarma() {
if(document.getElementById("farmacia").checked = true) {
    modal_cadastra_farma.style.display = "block";
    modal_cadastra.style.display = "none";
    $( "#cliente" ).prop( "checked", false );
}
}

//Fechar cadastro

var span_cadastro = document.getElementsByClassName("close-cadastro")[0];
var span_cadastro_farma = document.getElementsByClassName("close-cadastro-farma")[0];

span_cadastro_farma.onclick = function() {
    modal_cadastra_farma.style.display = "none";
  }

  span_cadastro.onclick = function() {
    modal_cadastra.style.display = "none";
  }

//Nao possuo cadastro

var btn_nao_cadastro = document.getElementsByClassName("button-nao-cadastro")[0];
var btn_nao_cadastro_farma = document.getElementsByClassName("button-nao-cadastro-farma")[0];

btn_nao_cadastro.onclick = function() {
    modal_login.style.display = "none";
    modal_cadastra.style.display = "block";
}
  
btn_nao_cadastro_farma.onclick = function() {
    modal_login_farma.style.display = "none";
    modal_cadastra.style.display = "block";
}

//Testar CPF

function TestaCPF(strCPF) {
var Soma;
var Resto;
Soma = 0;
if (strCPF == "00000000000") return false;

for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
Resto = (Soma * 10) % 11;

if ((Resto == 10) || (Resto == 11))  Resto = 0;
if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;

Soma = 0;
for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
Resto = (Soma * 10) % 11;

if ((Resto == 10) || (Resto == 11))  Resto = 0;
if (Resto != parseInt(strCPF.substring(10, 11) ) ) {
    alert('nao');
} 
else {
    alert('sim');
}
}
  
//Testar Email

function validateEmail(email) {
var re = /\S+@\S+\.\S+/;
return re.test(email);
}

//Limitar Data
var dataNasc = document.getElementById("data_nascimento");
dataNasc.max = new Date().toISOString().split("T")[0];