<?php 
session_start();

if(isset($_SESSION) &&  !empty($_SESSION["username"])) {
    
    ob_start();
    header("refresh:3;url=../index.php");
    ob_end_flush();
    $response = "Sei già loggato";
    
}else{
    $response = "Caricamento...";

    include "../db/mysql_credentials.php";

    // Create connection
    $conn = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: ");
    }

    // prepare and bind
    $stmt = $conn->prepare("SELECT id , img_profilo FROM user WHERE username=? and password=?");
    $stmt->bind_param("ss", $username, $password);

    // set parameters and execute
    if(!isset($_POST["Username"]) || empty($_POST["Username"]) 
    || !isset($_POST["Pass"]) || empty($_POST["Pass"])) {
        $response = "errore  di autenticazione";

        $stmt->close();
        $conn->close();
        return;
    }

    //trim per aiutare gli utenti sbadati che fanno copia incolla
    $username = trim($_POST["Username"]," ");
    $password = sha1(trim($_POST["Pass"]," "));

    if(!$stmt->execute()) {
        $response = "Errore durante l'operazione, riprovare";
        $stmt->close();
        $conn->close();
        return;
    }

    //salvo i risultati con i seguenti metodi
    $stmt->store_result();
    $stmt->bind_result($id,$imgprofilo); // passo variabili in cui memorizzare
    $stmt->fetch();

    //check sulla correttezza dei dati
    if($stmt->num_rows != 1) {
        $response = "Username o password sbagliato";
        $stmt->close();
        $conn->close();
    return;}

    // Recupero il parametro 'user-agent' relativo all'utente corrente.
    $user_browser = $_SERVER['HTTP_USER_AGENT']; 
    $_SESSION['id'] = $id;
    $_SESSION['username'] = $username;
    if($imgprofilo!= null || $imgprofilo!="") $_SESSION['imgprofilo'] = $imgprofilo;
    else $_SESSION['imgprofilo']='img/logomindshared.png';
    //$_SESSION['login_string'] = hash('sha512', $password.$user_browser);

    $stmt->close();
    $conn->close();
    header('refresh:0;url= ../index.php');
}
echo '<!DOCTYPE html>
<html lang="it">
<head>
    
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
    <title>GamingDevNet - Response Message</title>
</head>
<body>
    
    
    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
        
        <a class="navbar-brand" href="../index.php">
            <img src="../images/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            Bootstrap
        </a>
        
    </nav>
    
    <h1 class="display-1 font-weight-bold text-danger text-center">   
    
    '.$response.'
    
    </h1>
    
    
   
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>'
?>