<?php 



if(isset($_SESSION) && !empty($_SESSION["username"])) {
    $response = "Sei già loggato";
    ob_start();
    header("refresh:3;url=index.php");
    ob_end_flush();
    
}else{


    include "../db/mysql_credentials.php";

    // Create connection
    $conn = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: ");
    }



    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO user (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    // set parameters and execute
    if(!isset($_POST["Username"]) || empty($_POST["Username"]) 
    || !isset($_POST["Pass"]) || empty($_POST["Pass"])
    || !isset($_POST["Email"]) || empty($_POST["Email"])) {
        $stmt->close();
        $conn->close();
        $response = "Registrazione fallita<br> Riprova";
        return;
    }

    $username = htmlspecialchars($_POST["Username"],ENT_QUOTES);
    $email = htmlspecialchars($_POST["Email"],ENT_QUOTES);
    $password = sha1($_POST["Pass"]);
    $checkUsername=trim($username," @!£$%&/()=?^*+].;,\[\"\']§°#");
    $checkEmail=trim($email," !£$%&/()=?^*+]\[\"\']§°#");
    if($username!=$checkUsername || $email!=$checkEmail) {
        $stmt->close();
        $conn->close();
        $response = "Registrazione fallita<br> Caratteri speciali non ammessi";
        return;
    }

    if(!$stmt->execute()) {
        $stmt->close();
        $conn->close();
        $response = "Nome utente o email già esistente<br> Riprova";
    return;}



    $stmt->close();
    $conn->close();
    $response = "Registrazione avvenuta con successo<br> Verrai indirizzato alla pagina del login";
    header("Refresh:3; url=../Login.php");

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
    
    
    
    <p class="display-3 font-weight-bold text-danger text-center">   
    
    '.$response.'
    
    </p>
    
    
   
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>'
?>