<?php
include "Session.php";
$stmt = $conn->prepare("UPDATE user SET password=? WHERE username=? AND password=?");          
$stmt->bind_param('sss', $pwNew, $_POST["Username"], $pwOld);
/* Set our params */
$content = isset($_POST['content']) ? $this->mysqli->real_escape_string($_POST['Username']) : '';
echo $content;
$pwOld = sha1($_POST["OldPw"]);
$pwNew = sha1($_POST["NewPw"]);
/* Execute the prepared Statement */
$stmt->execute();
printf("%d Row inserted.\n", $stmt->affected_rows);

//echo $_POST["Username"];
return "ok";
?>