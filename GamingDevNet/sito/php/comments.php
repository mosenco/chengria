<?php 
include "session.php";

$stmt = $conn->prepare("SELECT `iduser`, `time`, `comment`, `username`, img_profilo FROM comments INNER JOIN user ON user.id=comments.iduser
WHERE idgame=?");     
$stmt->bind_param('i', $gameID); 
/* Set our params */
//$content = isset($_POST['content']) ? $this->mysqli->real_escape_string($_POST['content']) : '';
$userID = $_SESSION["id"];
$gameID = $_GET["idgame"];
/* Execute the prepared Statement */
$stmt->execute();

$stmt->store_result();
?>