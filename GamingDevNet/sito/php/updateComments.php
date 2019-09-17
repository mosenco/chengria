<?php 
include "session.php";

$stmt = $conn->prepare("INSERT INTO comments (iduser, idgame, comment) VALUES (?, ?, ?)");     
$stmt->bind_param('iis', $userID, $gameID, $comment); 
/* Set our params */
//$content = isset($_POST['content']) ? $this->mysqli->real_escape_string($_POST['Username']) : '';

$userID = $_SESSION["id"];
$gameID = $_POST["idGame"];
$comment = $_POST["comment"];

/* Execute the prepared Statement */
$stmt->execute();

echo $userID." ".$gameID." ".$comment;

?>