<?php
 // Check connection
 if ($conn->connect_error) {
    die("Connection failed: ");
}


// prepare and bind
$stmt = $conn->prepare("SELECT img_profilo, email, nome, cognome, datanascita, dataiscrizione FROM user WHERE username=?");
$stmt->bind_param("s", $_SESSION["username"]);


if(!$stmt->execute()) {
    $response = "Errore durante l'operazione, riprovare";
    $stmt->close();
    $conn->close();
    return;
}

//salvo i risultati con i seguenti metodi
$stmt->store_result();
$stmt->bind_result($imgprofilo, $email, $name, $surname, $dateOfBirth, $dateOfSub); // passo variabili in cui memorizzare
$stmt->fetch();
?>