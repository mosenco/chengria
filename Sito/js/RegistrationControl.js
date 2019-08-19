'use strict';

function checkFormat(value){
    var regex = null;
    switch(value){
        case "Username":
            regex = /^[a-zA-Z0-9]{5,15}$/;
            break;
        case "Email":
            regex = /[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;
            break;
        case "Pass":
            regex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
            break;
    }
    console.log("regex: " + regex);
    console.log(regex.test(document.getElementById(value).value));
    return regex.test(document.getElementById(value).value);
}

function checkValue(value) {
    if(!checkFormat(value)){
        var validation = document.getElementById(value);
        if (validation.classList.contains("is-valid")) 
            validation.classList.remove("is-valid");
        validation.classList.add("is-invalid");
        document.getElementById("response" + value + "1").innerHTML = "";
        document.getElementById("response" + value + "2").innerHTML = value + " non rispetta il formato";
        return;
    }

    // check if is already present in db
    if (document.getElementById(value).value == "") {
        var validation = document.getElementById(value);
        if (validation.classList.contains("is-valid")) validation.classList.remove("is-valid");
        validation.classList.add("is-invalid");
        document.getElementById("response" + value + "1").innerHTML = "";
        document.getElementById("response" + value + "2").innerHTML = "";
        return;
    }
    var usernameValue = document.getElementById(value).value; 
    var request = new XMLHttpRequest();
   
    request.open('GET', 'php/registrationControl.php?' + value + '=' + usernameValue + "&subject=" + value);
    request.onload = function () {
        var obj = JSON.parse(request.responseText);
        var ris = "risultato: ";
        var validation = document.getElementById(value);
        if (obj.status == "ok") {
            if (validation.classList.contains("is-valid")) validation.classList.remove("is-valid");
            validation.classList.add("is-invalid");
            document.getElementById("response" + value + "1").innerHTML = "";
            document.getElementById("response" + value + "2").innerHTML = value + " già in uso";
        } else {
            if (validation.classList.contains("is-invalid")) validation.classList.remove("is-invalid");
            validation.classList.add("is-valid");
            document.getElementById("response" + value + "1").innerHTML = value + " è disponibile";
            document.getElementById("response" + value + "2").innerHTML = "";
            checkAllCondition();
        }
    }
    request.send();
}


function checkValidation(value) {
    var validation = document.getElementById(value);
    if (checkFormat(value)) {
        if (validation.classList.contains("is-invalid")) validation.classList.remove("is-invalid");
        validation.classList.add("is-valid");
    } else {
        if (validation.classList.contains("is-valid")) validation.classList.remove("is-valid");
        validation.classList.add("is-invalid");
    }
}

function checkAllCondition() {
   if(document.getElementById("Condition").checked && document.getElementById('Username').classList.contains("is-valid") 
   && document.getElementById("Email").classList.contains("is-valid") && document.getElementById("Pass").classList.contains("is-valid"))
        document.getElementById("Submit").removeAttribute("disabled");
    else  document.getElementById("Submit").setAttribute("disabled","");
}