<?php
if(empty($_SESSION["username"])){
    
    echo '<nav id="navigazione" class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
        
        <a class="navbar-brand" href="index.php">
            <img src="images/icongdn.png" width="30" height="30" class="d-inline-block align-top" alt="">
            GamingDevNet
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav ">

                <a class="nav-item nav-link" href="#cosafacciamo">Scopri GamingDevNet</a>
                <a class="nav-item nav-link" href="#chisiamo">Chi siamo</a>
                <a class="nav-item nav-link" href="#dovesiamo">Dove siamo</a>
                <a class="nav-item nav-link" href="#contatti">Contatti</a>
                <a class="nav-item nav-link" href="login.php">Login</a>
                <a href="registration.php"><button type="button" class="btn btn-danger">Registrati</button></a>
            </div>
        </div>
    </nav>';
}else{
    echo '<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
        
        <a class="navbar-brand" href="index.php">
            <img src="images/icongdn.png" width="30" height="30" class="d-inline-block align-top" alt="">
            GamingDevNet
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav ">
                <a class="nav-item nav-link" href="upload.php">Carica gioco</a>
                <a class="nav-item nav-link" href="profilo.php">Profilo</a>
                <a class="nav-item nav-link" href="php/logout.php">Esci</a>
            </div>
        </div>
    </nav>';
}
    
?>