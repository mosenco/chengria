<?php 
header('Access-Control-Allow-Origin: *');  
$obj = new \stdClass();

include "../db/mysql_credentials.php";

// Create connection
$conn = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ");
}

// prepare and bind
if($_GET["subject"]=="Username") 
$stmt = $conn->prepare("SELECT COUNT(*) FROM user WHERE username=?");
else  $stmt = $conn->prepare("SELECT COUNT(*) FROM user WHERE email=?");

$stmt->bind_param("s", $valueSubject);

// set parameters and execute
if(!isset($_GET[$_GET["subject"]]) || empty($_GET[$_GET["subject"]]) ) {
    $stmt->close();
    $conn->close();
    return;
}

//trim per aiutare gli utenti sbadati che fanno copia incolla

$valueSubject = trim(strip_tags(htmlspecialchars($_GET[$_GET["subject"]]))," ");

if(!$stmt->execute()) {
    $stmt->close();
    $conn->close();
    return;
}

//salvo i risultati cn i seguenti metodi
$stmt->store_result();
$stmt->bind_result($count); // passo variabili in cui memorizzare
$stmt->fetch();

if($count!= 1) {
    $obj->status="no";
    echo json_encode($obj);
    $stmt->close();
    $conn->close();
return;}

    $obj->status="ok";
    echo json_encode($obj);
