<?php
include "session.php";
if($_POST["img"] == "") 
    $image = "default.jpg";
else   
    $image = $_POST["Username"]."_".$_POST["img"];

$stmt = $conn->prepare("UPDATE user SET img_profilo=? WHERE username=?");
/* Bind our params */                           
$stmt->bind_param('ss', $image, $_POST["Username"]);
/* Set our params */
//$content = isset($_POST['content']) ? $this->mysqli->real_escape_string($_POST['content']) : '';
/* Execute the prepared Statement */
$stmt->execute();
printf("%d Row inserted.\n", $stmt->affected_rows);

return "ok";
?>