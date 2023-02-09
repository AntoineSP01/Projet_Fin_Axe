// Bouton pour le mode nuit.

const h1 = document.querySelector("h1");
const body = document.querySelector("body");
const button2 = document.querySelector("#btn2");

button2.addEventListener("click", function() {
    if (body.style.backgroundColor == "rgb(34, 34, 34)"){
        body.style.backgroundColor = "#decab1";
        body.style.color = "#222222";
        h1.style.color = "#222222";
    } else {
        body.style.backgroundColor = "#222222";
        body.style.color = "#FFFFFF";
        h1.style.color = "#FFFFFF";
   }
})

// Boutons pour ajouter ou supprimer totalement les croissants

const button_add = document.querySelector("#btn1");
const button_remove = document.querySelector("#btn3");
const list = document.querySelector("#list");

button_add.addEventListener("click", function() {
    const li = document.createElement("li");
    const text = document.createTextNode("Croissant");

    li.append(text);
    list.append(li);
})

button_remove.addEventListener("click", function() {
    const li = document.createElement("li");
    const text = document.createTextNode("Croissant");

    li.remove(text);
    list.remove(li);
})

// Boutons pour animer les deux boutons ajouter et effacer

const button = document.querySelector("#btn4");
const bouton = document.querySelectorAll('.but button');

button.addEventListener("click", function() {
  for (let i = 1; i < 2; i++) {
    bouton[i].classList.toggle("animateText");
  }
  for (let i = 0; i < 1; i++) {
    bouton[i].classList.toggle("animateText2");
  
}})