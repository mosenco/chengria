<?php
include "session.php";

if($_POST["Avatar"] != ""){
    include "uploadToAvatars.php";
}

$stmt = $conn->prepare("UPDATE user SET email=? WHERE username=?");
/* Bind our params */                           
$stmt->bind_param('ss', $_POST["Email"], $_POST["Username"]);
/* Set our params */
//$content = isset($_POST['content']) ? $this->mysqli->real_escape_string($_POST['content']) : '';
/* Execute the prepared Statement */
$stmt->execute();
printf("%d Row inserted.\n", $stmt->affected_rows);

return "ok";
?>