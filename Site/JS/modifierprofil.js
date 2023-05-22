const modify = document.querySelector("#modifierprofil");
const popup5 = document.querySelector(".popupmodifier");
  
    modify.addEventListener("click", function() {
    popup5.style.display = "block";
  });
  
  window.addEventListener("click", function(event) {
    if (event.target == popup5) {
      popup5.style.display = "none";
    }
  });
  
