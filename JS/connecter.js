const button3 = document.querySelector(".faireunmessage");
const button_3 = document.querySelector(".popup_tweet");

const popup3 = document.querySelector(".popuptweeter");
  
  button3.addEventListener("click", function() {
    popup3.style.display = "block";
  });

  button_3.addEventListener("click", function() {
    popup3.style.display = "block";
  });
  
  window.addEventListener("click", function(event) {
    if (event.target == popup3) {
      popup3.style.display = "none";
    }
  });
  
