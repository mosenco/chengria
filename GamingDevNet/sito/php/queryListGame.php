<?php
include "session.php";

$id =$_POST["userid"];

$stmt = $conn->prepare("SELECT id, gamename, genre, descrgame, iconfolder, gamefolder FROM videogame WHERE userid=?");          
$stmt->bind_param('i', $id);
/* Set our params */
//$content = isset($_POST['content']) ? $this->mysqli->real_escape_string($_POST['Username']) : '';
/* Execute the prepared Statement */

$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 0){
    echo "null";
    return;
}
    

$a = array();
for ($i=0; $i<$stmt->num_rows; $i++){
    $stmt->bind_result($gameID, $gameName, $genre, $description, $image, $gameFolder); // passo variabili in cui memorizzare
    $stmt->fetch();
    $obj=new \stdClass();
    $obj->gameid = $gameID;
    $obj->gamename = $gameName;
    $obj->genre = $genre;
    $obj->description = $description;
    $obj->image = $image;
    $obj->gamefolder = $gameFolder;
    array_push($a,$obj);
}

$json = json_encode($a);
echo $json;
?>


