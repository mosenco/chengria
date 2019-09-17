"use strict";
document.getElementById("Submit").disabled= true;
var requiredIcon = 1;
var requiredZip = 1;
var requiredName = 1;
var requiredGenre = 1;

function checkForm(){

    if(document.getElementById("formicon").value){
        requiredIcon = 0;
    }
    if(document.getElementById("formzip").value){
        requiredZip = 0;
    }

    if(document.getElementById("gamename").value){
        requiredName = 0;
    }

    if(document.getElementById("genreselect").value != "zero"){
        requiredGenre = 0;
    }

    if(requiredIcon == 0 &&
        requiredZip == 0 &&
        requiredName == 0 &&
        requiredGenre == 0){
        document.getElementById("Submit").disabled = false;
    }


}