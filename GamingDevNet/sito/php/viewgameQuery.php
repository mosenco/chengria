<?php
    include "session.php";

    $id = $_POST["idGame"];

    $stmt = $conn->prepare("SELECT gamename, genre, descrgame, userid FROM videogame WHERE id=?");          
    $stmt->bind_param('i', $id);

    
    $stmt->execute();
    $stmt->store_result();

    $stmt->bind_result($gameName, $genre, $description, $userid); // passo variabili in cui memorizzare
    $stmt->fetch();
    $obj=new \stdClass();
    $obj->gamename = $gameName;
    $obj->genre = $genre;
    $obj->description = $description;


    $json = json_encode($obj);
    echo $json;

    
?>