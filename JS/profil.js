const own = document.querySelector(".own");
const like = document.querySelector(".like");

const bouton_own = document.querySelector("#bouton_own");
const bouton_like = document.querySelector("#bouton_like");

bouton_own.addEventListener("click", function(){
    own.style.display = "block";
    bouton_own.style.backgroundColor = '#FFF6DE';
    like.style.display = "none";  
    bouton_like.style.backgroundColor = '#96A086';
})

bouton_like.addEventListener("click", function(){
    own.style.display = "none";
    bouton_own.style.backgroundColor = '#96A086';
    like.style.display = "block";  
    bouton_like.style.backgroundColor = '#FFF6DE';
})