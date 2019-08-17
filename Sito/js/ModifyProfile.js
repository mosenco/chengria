'use strict';

function confirm(param){
    var values = param.split(', ');
    console.log(values[0]);
    console.log(values[1]);
    var username = values[0];
    var email = values[1];

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("demo").innerHTML = this.responseText;
            console.log(this.responseText);
        }
    };
    xhttp.open("POST", "php/ModifyProfile.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("Username=" + username + "&Email=" + document.getElementById('Email').value);
    reload();
}

function reload(){
    console.log("reloaded");
    location.reload();
}