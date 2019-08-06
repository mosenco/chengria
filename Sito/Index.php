<?php 
    include 'php/session.php';  
    if(empty($_SESSION["username"])){
        echo'slog';
        include 'IndexVisitor.php';
    }else{
        echo'log';
        include 'IndexUser.php';
    }
    
?>
    
  