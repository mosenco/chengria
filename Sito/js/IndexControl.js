function LoadGameList(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("test").innerHTML = this.responseText;
      }
    }
    xhttp.open("POST", "php/queryListGame.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("nome=cacca");
  }