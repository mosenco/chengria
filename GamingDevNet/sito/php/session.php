<?php
    if (file_exists("db/mysql_credentials.php"))
        include "db/mysql_credentials.php";
    else
        include "../db/mysql_credentials.php";
    $conn = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);
if(session_id() == '') {
    session_start();
}
    if ($conn->connect_error) {
        die("Connection failed: ");
    }

    if(empty($_SESSION["username"])){
        $conn->close();
        session_unset();
        session_destroy(); 
    }
?>