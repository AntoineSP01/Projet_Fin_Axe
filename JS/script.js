
const popup = document.querySelector(".popup");

  setTimeout(function() {
    popup.style.display = "block";
  }, 1000);


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
      popup.style.display = "none";
    });
    
    window.addEventListener("click", function(event) {
      if (event.target == popup2) {
        popup2.style.display = "none";
        popup.style.display = "block";
      }
    });



