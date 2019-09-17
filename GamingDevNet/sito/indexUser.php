<?php 
    include 'php/session.php';  
?>


<!DOCTYPE html>
<html lang="it">
<head>
    
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Benvenuti a GamingDevNet</title>
</head>
<body>
    
    
<?php 
        include 'php/navbar.php';
    
        if(empty($_SESSION["username"])){
            echo'<h1 class="display-1 font-weight-bold text-danger text-center">ACCESSO NEGATO</h1>
            <p class=" text-muted text-center">riesegui il login</p>';
            return;
        }else{
        }
    ?>

    <div id="wallpaperindex" class="container-fluid p-5">
        <h1 class="display-5 font-weight-bold text-white m-5 p-5 text-center">DIVERTITEVI SU GAMINGDEVNET</h1>
    </div>
    
        
    <div class="container">
        <div class="row m-5">
            <div class="col">


            <h3 class=" display-5 font-weight-bold text-center text-danger m-5"> BROWSE GENRE</h3>
                
                <ul class="nav justify-content-center">
                    <li class="navitem">
                        <a onclick="selectGame('featured')" href="javascript:;" class="text-center list-group-item list-group-item-action list-group-item-light">
                            <img id="iconmenu" class="img-fluid" src="images/stars.svg">
                            Featured
                        </a>
                    </li>
                    <li class="navitem">
                        <a onclick="selectGame('action')" href="javascript:;" class="text-center list-group-item list-group-item-action list-group-item-light">
                            <img id="iconmenu" class="img-fluid" src="images/swords.svg">
                            Action
                        </a>
                    </li>
                    <li class="navitem">
                        <a onclick="selectGame('adventures')" href="javascript:;" class="text-center list-group-item list-group-item-action list-group-item-light">
                            <img id="iconmenu" class="img-fluid" src="images/mountain-peak.svg">
                            Adventures
                        </a>
                    </li>
                    <li class="navitem">
                        <a onclick="selectGame('fantasy')" href="javascript:;" class="text-center list-group-item list-group-item-action list-group-item-light">
                            <img id="iconmenu" class="img-fluid" src="images/magic-ball.svg">
                            Fantasy
                        </a>
                    </li>
                    <li class="navitem">
                        <a onclick="selectGame('horror')" href="javascript:;" class="text-center list-group-item list-group-item-action list-group-item-light">
                            <img id="iconmenu" class="img-fluid" src="images/ghost.svg">
                            Horror
                        </a>
                    </li>
                    <li class="navitem">
                        <a onclick="selectGame('rpg')" href="javascript:;" class="text-center list-group-item list-group-item-action list-group-item-light">
                        <img id="iconmenu" class="img-fluid" src="images/shield.svg">
                            RPG
                        </a>
                    </li>
                    <li class="navitem">
                        <a onclick="selectGame('fps')" href="javascript:;" class="text-center list-group-item list-group-item-action list-group-item-light">
                        <img id="iconmenu" class="img-fluid" src="images/gun.svg">
                            FPS
                        </a>
                    </li>
                    <li class="navitem">
                        <a onclick="selectGame('strategy')" href="javascript:;" class="text-center list-group-item list-group-item-action list-group-item-light">
                            <img id="iconmenu" class="img-fluid" src="images/intellectual.svg">
                            Strategy
                        </a>
                    </li>
                    <li class="navitem">
                        <a onclick="selectGame('other')" href="javascript:;" class="text-center list-group-item list-group-item-action list-group-item-light">
                            <img id="iconmenu" class="img-fluid" src="images/box.svg">
                            Others
                        </a>
                    </li>
                </ul>

            </div>
        </div>



        <div class="row">
            
            <div class="col"> 
                <div class="d-flex justify-content-center">
                    <div class="searchbar">
                    <input class="search_input" type="text" id="query" name="query" placeholder="Cerca...">
                    <a id="link" href="#" class="search_icon"><i onmouseover="queryGame()" class="fas fa-search"></i></a>
                    </div>
                </div>

                <ul class="nav justify-content-center" id="listgame">
                <?php 
                    include 'php/games.php';
                    if ($stmt->num_rows == 0)
                        echo "Nessun gioco è stato trovato...";
                    for ($i=0; $i<$stmt->num_rows; $i++){
                        $stmt->bind_result($gameID, $gameName, $genre, $description, $user, $image, $gameFolder); // passo variabili in cui memorizzare
                        $stmt->fetch();

                        echo '<li class="nav-item p-3" id="' . htmlspecialchars($genre) . '">
                            <a class="text-decoration-none" href="viewGame.php?game=' . htmlspecialchars(substr($gameFolder, 0, -4)) . '&idgame=' . $gameID . 
                            '&gamename=' . htmlspecialchars($gameName) . '&genre=' . $genre . '&descr=' . htmlspecialchars($description) . 
                            '&creator='. $user . '">
                            <img src="avatars/' . $image . '" alt="..." class="img-thumbnail" style="width:200px; height:200px;">
                            <p class="font-weight-bold text-danger m-0 p-0">' . htmlspecialchars($gameName) . '</p>
                            <p aria-describedby="creator" class="text-dark font-weight-light m-0 p-0">' . $genre . '</p>
                            <small id="creator" class="font-weight-light font-italic form-text text-muted m-0 p-0">Created by'.$user.'</small>
                            </a> 
                            </li>';
                    }
                ?>
                
                </ul>
                
                
            </div>
        </div>
    </div>
        
   
    
    
    <script src="js/indexControl.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>