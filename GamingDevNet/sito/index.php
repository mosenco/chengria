<?php 
    include 'php/session.php';  
    if(empty($_SESSION["username"])){
        include 'indexVisitor.php';
    }else{
        include 'indexUser.php';
    }
    
?>
    
  