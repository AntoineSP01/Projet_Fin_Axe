const button4 = document.querySelector("#dustbin");
const popup4 = document.querySelector(".popupsupprimer");
const deletebutton = document.getElementById("deletebutton");
const exit = document.getElementById("exit");

  function openpopup(id){
    deletebutton.setAttribute("href", "supprimer_tweet.php?tweet_id=" + id);
    popup4.style.display = "block";
  }
  
  window.addEventListener("click", function(event) {
    if (event.target == popup4) {
      popup4.style.display = "none";
    }
  });

  exit.addEventListener("click", function() {
    popup4.style.display = "none";
  });