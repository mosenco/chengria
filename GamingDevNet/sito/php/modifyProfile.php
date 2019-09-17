<?php
include "session.php";

$stmt = $conn->prepare("UPDATE user SET email=?, nome=?, cognome=?, datanascita=? WHERE username=?");
/* Bind our params */                           
$stmt->bind_param('sssss', $email, $name, $surname, $dateOfBirth, $_SESSION["username"]);
/* Set our params */
$email = $_POST['Email'];
$name = $_POST['Name'];
$surname = $_POST['Surname'];
$dateOfBirth = $_POST['dateOfBirth'];
/* Execute the prepared Statement */
$stmt->execute();
printf("%d Row inserted.\n", $stmt->affected_rows);

echo $email;
echo $name;
echo $surname;
echo $dateOfBirth;
?>