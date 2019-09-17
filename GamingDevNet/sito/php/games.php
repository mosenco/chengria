<?php 
include "session.php";
if(isset($_GET["gameQuery"])) 
    $gameQuery = $_GET["gameQuery"];
else 
    $gameQuery = "";
    
$gameQuery = "%" . $gameQuery . "%";

$stmt = $conn->prepare("SELECT videogame.id, `gamename`, `genre`, `descrgame`, `username`, `iconfolder`, `gamefolder` FROM videogame INNER JOIN user ON userid = user.id 
WHERE gamename LIKE ?");     
$stmt->bind_param('s', $gameQuery); 
/* Set our params */
//$content = isset($_POST['content']) ? $this->mysqli->real_escape_string($_POST['Username']) : '';
/* Execute the prepared Statement */
$stmt->execute();

$stmt->store_result();
?>