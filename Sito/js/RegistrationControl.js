'use strict';

function checkValue(value) {
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
   
    request.open('GET', 'php/RegistrationControl.php?' + value + '=' + usernameValue + "&subject=" + value);
    request.onload = function () {
        var obj = JSON.parse(request.responseText);
        var ris = "risultato: ";
        if (obj.status == "ok") {
            var validation = document.getElementById(value);
            if (validation.classList.contains("is-valid")) validation.classList.remove("is-valid");
            validation.classList.add("is-invalid");
            document.getElementById("response" + value + "1").innerHTML = "";
            document.getElementById("response" + value + "2").innerHTML = value + " già in uso";
        } else {
            var validation = document.getElementById(value);
            if (validation.classList.contains("is-invalid")) validation.classList.remove("is-invalid");
            validation.classList.add("is-valid");
            document.getElementById("response" + value + "1").innerHTML = value + " è disponibile";
            document.getElementById("response" + value + "2").innerHTML = "";
        }
    }
    request.send();
}



function checkValidation(value) {
    var validation = document.getElementById(value);
    if (document.getElementById(value).value != null && document.getElementById(value).value != "") {
        if (validation.classList.contains("is-invalid")) validation.classList.remove("is-invalid");
        validation.classList.add("is-valid");
    } else {
        if (validation.classList.contains("is-valid")) validation.classList.remove("is-valid");
        validation.classList.add("is-invalid");
    }
}

function acceptCondition() {
   if(document.getElementById("Condition").checked==true)
        document.getElementById("Submit").removeAttribute("disabled");
    else  document.getElementById("Submit").setAttribute("disabled","");
  
}