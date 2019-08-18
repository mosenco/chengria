<?php
 // Check connection
 if ($conn->connect_error) {
    die("Connection failed: ");
}

/*
// prepare and bind
$stmt = $conn->prepare("SELECT img_profilo, email FROM user WHERE username=?");
$stmt->bind_param("s", $_SESSION["Username"]);


if(!$stmt->execute()) {
    $response = "Errore durante l'operazione, riprovare";
    $stmt->close();
    $conn->close();
    return;
}

//salvo i risultati con i seguenti metodi
$stmt->store_result();
$stmt->bind_result($imgprofilo, $email); // passo variabili in cui memorizzare
$stmt->fetch();

echo "email =".$email;
*/


// da trasformare in prepared statement
$sql = "SELECT img_profilo, email FROM user WHERE username='" . $_SESSION["username"] . "'";
$result = $conn->query($sql);

$imgprofilo = "";
$email = "";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $imgprofilo = $row["img_profilo"];
        $email = $row["email"];
    }
} else {
    echo "0 results";
}


?>