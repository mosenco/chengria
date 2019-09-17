'use strict';


function confirmComment(){
  console.log(document.getElementById("comment").value);
  var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        location.reload();
        console.log(this.responseText);
      }
    }
   
    xhttp.open("POST", "php/updateComments.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("idGame="+document.getElementById("idgame").innerHTML + "&comment=" + document.getElementById("comment").value);
}