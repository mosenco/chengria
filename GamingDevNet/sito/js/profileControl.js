'use strict';

function getMyGame(){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //console.log(this.responseText);
        var response = JSON.parse(this.responseText);

        if(response == null) return;

        for(var i=0; i<response.length; i++){
          var gamefolder = response[i].gamefolder;
          
          document.getElementById("mylistgame").innerHTML += "<li class='nav-item p-3'>"+
          "<a class='text-decoration-none' href='viewGame.php?game="+gamefolder.slice(0, -4)+"&idgame="+response[i].gameid+"'>"+
          "<img src='avatars/"+response[i].image+"' class='img-thumbnail' style='width:200px; height:200px;'>"+
          "<p class='font-weight-bold text-danger m-0 p-0'>"+response[i].gamename+"</p>"+
          "<p aria-describedby='creator' class='text-dark font-weight-light m-0 p-0'>"+response[i].genre+"</p>"+
          "</a>"+ 
          "</li>"
        }
      }
    }
    xhttp.open("POST", "php/queryListGame.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("userid="+document.getElementById("iduser").innerHTML);



}