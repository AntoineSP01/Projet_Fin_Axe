const own = document.querySelector(".own");
const like = document.querySelector(".like");

const bouton_own = document.querySelector("#bouton_own");
const bouton_like = document.querySelector("#bouton_like");

bouton_own.addEventListener("click", function(){
    own.style.display = "block";
    bouton_own.style.backgroundColor = 'var(--main-button-color)';
    like.style.display = "none";  
    bouton_like.style.backgroundColor = 'var(--main-bg-color_2)';
})

bouton_like.addEventListener("click", function(){
    own.style.display = "none";
    bouton_own.style.backgroundColor = 'var(--main-bg-color_2)';
    like.style.display = "block";  
    bouton_like.style.backgroundColor = 'var(--main-button-color)';
})