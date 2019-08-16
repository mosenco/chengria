<?php 
    include 'php/session.php';  
    if(empty($_SESSION["username"])){
        include 'IndexVisitor.php';
    }else{
        include 'IndexUser.php';
    }
    
?>
    
  