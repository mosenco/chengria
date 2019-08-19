<?php 
    include 'php/session.php';  
?>


<!DOCTYPE html>
<html lang="it">
<head>
    
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
    <title>Benvenuti a GamingDevNet</title>
</head>
<body onload="LoadGameList()">
    
    
<?php 
        include 'php/navbar.php';
    
        if(empty($_SESSION["username"])){
            echo'<h1 class="display-1 font-weight-bold text-danger text-center">ACCESSO NEGATO</h1>
            <p class=" text-muted text-center">riesegui il login</p>';
            return;
        }else{
        }
    ?>
    
        
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2  bg-light m-3 p-4"> 
                <p class="font-weight-bold"> BROWSE GENRE</p>
                <div class="row">
                    <div class="col">
                        <p class="font-weight-ligh"> Feaured </p>
                        <p class="font-weight-ligh"> Action </p>
                        <p class="font-weight-ligh"> Adventures </p>
                        <p class="font-weight-ligh"> Fantasy </p>
                    </div>
                    <div class="col">
                        <p class="font-weight-ligh"> Horror </p>
                        <p class="font-weight-ligh"> RPG </p>
                        <p class="font-weight-ligh"> FPS </p>
                        <p class="font-weight-ligh"> Strategy </p>
                    </div>
                </div>
                
                <p class="font-weight-bold mt-3"> COMMUNITY </p>

                <div class="row">
                    <div class="col">
                        <p class="font-weight-ligh"> Top Players </p>
                        <p class="font-weight-ligh"> Top Developers </p>
                        <p class="font-weight-ligh"> Forum </p>
                    </div>
                    <div class="col">
                        <p class="font-weight-ligh"> Contact Us </p>
                        <p class="font-weight-ligh"> Work with Us </p>
                    </div>
                </div>

            
            </div>
            <div class="col-md"> 
               
                 

                <ul class="nav">
                    <li class="nav-item p-3">
                        <a href="ViewGame.php?game=testgame">
                            <img src="images/148910_preview.png" alt="..." class="img-thumbnail" style="width:200px; height:200px;">
                            <p>Chess Game</p>
                        </a> 
                    </li>
                    <li class="nav-item p-3">
                        <a href="ViewGame.php?game=2048">
                            <img src="images/148910_preview.png" alt="..." class="img-thumbnail" style="width:200px; height:200px;">
                            <p>2048</p>
                        </a>  
                    </li>
                </ul>
                
                
            </div>
        </div>
    </div>
        
   
    
    
    <script src="js/IndexControl.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>