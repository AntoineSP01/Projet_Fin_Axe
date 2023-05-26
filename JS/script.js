
const popup = document.querySelector(".popup");
const button_conninscr = document.querySelector(".button_conn_inscr");
const button_conninscr_1 = document.querySelector(".button_conn_inscr_1");
const button_conninscr_2 = document.querySelector(".button_conn_inscr_2");

button_conninscr.addEventListener("click", function() {
  popup.style.display = "block";
});
button_conninscr_1.addEventListener("click", function() {
  popup.style.display = "block";
});
button_conninscr_2.addEventListener("click", function() {
  popup.style.display = "block";
});

window.addEventListener('scroll', function(e) {
  setTimeout(function() {
    popup.style.display = "block";
  }, 2000);
});


const button1 = document.querySelector(".popup-buttonconnexion");
const popup1 = document.querySelector(".popupconnexion");
  
button1.addEventListener("click", function() {
  popup1.style.display = "block";
});

window.addEventListener("click", function(event) {
  if (event.target == popup1) {
    popup1.style.display = "none";
  }
});


const button2 = document.querySelector(".popup-buttoninscription");
const popup2 = document.querySelector(".popupinscription");

button2.addEventListener("click", function() {
  popup2.style.display = "block";
});

window.addEventListener("click", function(event) {
  if (event.target == popup2) {
    popup2.style.display = "none";
  }
});

const sinscrire = document.querySelector(".inscription");
sinscrire.addEventListener("click", function() {
  popup1.style.display = "none";
  popup2.style.display = "block";
});


const connecter = document.querySelector(".connexion");
connecter.addEventListener("click", function() {
  popup1.style.display = "block";
  popup2.style.display = "none";
});
