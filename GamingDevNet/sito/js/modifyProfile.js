'use strict';

function confirm(){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    console.log(document.getElementById('fileToUpload').value);

    xhttp.open("POST", "php/modifyProfile.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("Email=" + document.getElementById('Email').value + "&Name=" + document.getElementById("Name").value +
    "&Surname=" + document.getElementById("Surname").value + "&dateOfBirth=" + document.getElementById("DateOfBirth").value);
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

    xhttp.open("POST", "php/modifyPassword.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("Username=" + username + "&OldPw=" + document.getElementById("password1").value + 
    "&NewPw=" + document.getElementById("password2").value);
    reload();
}


function confirmImage(username){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };

    xhttp.open("POST", "php/modifyImage.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("Username=" + username + "&img=" + document.forms['imageChange']['fileToUpload'].files[0].name);
    reload();
}

function checkEqualPw(pw1, pw2){
    return pw1 == pw2;
}

function reload(){
    console.log("reloaded");
    location.reload();
}


function deleteAccount(){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            alert("Account cancellato con successo!");
        }
    };

    xhttp.open("POST", "php/deleteAccount.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("pw=" + document.getElementById("toDeletePassword").value);
    reload();
}