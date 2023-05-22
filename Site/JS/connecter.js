const button3 = document.querySelector(".menu");
const popup3 = document.querySelector(".popuptweeter");
  
  button3.addEventListener("click", function() {
    popup3.style.display = "block";
  });
  
  window.addEventListener("click", function(event) {
    if (event.target == popup3) {
      popup3.style.display = "none";
    }
  });
  
