'use strict';




  function queryGame(){

    console.log(document.getElementById("query").value);
    var url = "index.php?gameQuery=" + document.getElementById("query").value;
    document.getElementById("link").href=url;
  }

  function selectGame(value){

    if(value == "featured"){
      var c = document.getElementById("listgame").children;
      for(var i=0; i<c.length; i++){
        c[i].style.display = "block";
        
      }
    }else{
      var c = document.getElementById("listgame").children;


      for(var i=0; i<c.length; i++){
        
        if(c[i].id == value){
          c[i].style.display = "block";
        }else{
          c[i].style.display = "none";
        }

    }
  }

    



  }