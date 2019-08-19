<?php include 'php/session.php';
 if(!empty($_SESSION["username"])) 
 header('refresh:0;url=index.php');
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
    <title>GamingDevNet - Registrazione</title>
</head>
<body onload="acceptCondition()">
    
    <?php 
        include 'php/navbar.php';
    ?>
    
    <div class="container">
        <div class="row">
            <div class="col m-5">
                <h1 class="text-center">CREA UN ACCOUNT</h1>
            </div>
        </div>
        <div class="row m-5">
            <div class="col">
                <form method="POST" action="php/registrationResponse.php">
                    <div class="form-group">
                        <label>Username</label>
                        <input name="Username" type="text" class="form-control" id="Username" placeholder="Inserisci il tuo Username" 
                        onkeyup="checkValue('Username')" pattern="[A-Za-z0-9]{5,20}" 
                        title="L'Username deve contenere solo caratteri alfanumerici, se hai più di un nome scegline uno soltanto. 
                        Deve essere lungo 5-20. Esempio:Marco1990" required valid>
                        <div id="responseUsername1" class="accepted"></div>
                        <div id="responseUsername2" class="refused"></div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="Email" type="email" class="form-control" id="Email" placeholder="Email@example.com" 
                        onkeyup="checkValue('Email')" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" 
                        title="L'Email deve avere il seguente formato: Email@example.com" required valid>
                        <div id="responseEmail1" class="accepted"></div>
                        <div id="responseEmail2" class="refused"></div>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="Pass" type="password" class="form-control" id="Pass" placeholder="Inserisci Password" onkeyup="checkValidation('Pass')" 
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La Password deve contenere almeno un carattere maiuscolo,almeno uno minuscolo e un numero. 
                        Deve essere lungo almeno 8. Esempio:Alibaba957842057" required valid>
                    </div>
                    <br>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="Condition" onclick="checkAllCondition()">
                            <label class="form-check-label" >Accetto <a href=condizioni.html target="_blank">Termini e Condizioni</a></label>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-danger" id="Submit"   value="Registrati" disabled>
                    <br>
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>
    
    <script src="js/RegistrationControl.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>