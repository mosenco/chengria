<?php
include "session.php";
$username = $_SESSION["username"];

echo $pw;
$stmt = $conn->prepare("DELETE FROM user WHERE username = ? AND `password` = ?");     
$stmt->bind_param('ss', $username, $pw); 
/* Set our params */
$pw = sha1($_POST["pw"]);
//$content = isset($_POST['content']) ? $this->mysqli->real_escape_string($_POST['Username']) : '';
/* Execute the prepared Statement */

$stmt->execute();
unset($_SESSION);
session_destroy();
?>