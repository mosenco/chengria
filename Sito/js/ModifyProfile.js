'use strict';

function confirm(username){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    console.log(document.getElementById('fileToUpload').value);

    xhttp.open("POST", "php/ModifyProfile.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("Username=" + username + "&Email=" + document.getElementById('Email').value + "&Avatar=" + 
    document.getElementById('fileToUpload').value + "&Nome=" + document.getElementById("Name").value +
    "&Cognome=" + document.getElementById("Surname").value + "&DataNascita");
    //reload();
}

function confirmPassword(username){
    if (!checkEqualPw(document.getElementById("password3").value, document.getElementById("password2").value)){
        alert("Hai inserito 2 password nuove diverse!!");
        return;
    }

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };

    xhttp.open("POST", "php/ModifyPassword.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("Username=" + username + "&OldPw=" + document.getElementById("password1").value + 
    "&NewPw=" + document.getElementById("password2").value);
    //reload();
}

function checkEqualPw(pw1, pw2){
    return pw1 == pw2;
}

function reload(){
    console.log("reloaded");
    location.reload();

}