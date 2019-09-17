<?php include 'php/session.php';
if(empty($_SESSION["username"])) 
    header('refresh:0;url=index.php');
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/comments.css">
    <title>GamingDevNet - <?php echo $_GET["game"]?>></title>

</head>

<!-- uso onload per eseguire lo script viewgameQuery appena si carica il body -->
<body>
    <?php 
        include 'php/navbar.php';
    ?>

    <div class="container">

        <!-- visualizzo il gioco con iframe -->
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" id="game" width="100%"
                src="games/<?php echo $_GET["game"]?>"></iframe>
        </div>


        <div class="row">
            <!-- Colonna che riporta i dati del creatore e del gioco-->
            <div class="col-4 m-3">
                <p class="font-weight-bold">Creatore</p>
                <p class="font-weight-light" id="userName"><?php echo $_GET["creator"];?></p>
                <p class="font-weight-bold">Nome Gioco</p>
                <p class="font-weight-light" id="gameName"><?php echo htmlspecialchars($_GET["gamename"]);?></p>
                <p class="font-weight-bold">Descrizione</p>
                <p class="font-weight-light" id="descrGame"><?php echo htmlspecialchars($_GET["descr"]);?></p>
                <p class="font-weight-bold">Genere</p>
                <p class="font-weight-light" id="descrGame"><?php echo htmlspecialchars($_GET["genre"]);?></p>
                <!-- form per scaricare il gioco in formato zip -->
                <form method="GET" action="php/download.php">
                    <input type="hidden" name="game" value="<?php echo htmlspecialchars($_GET["game"]);?>" required>
                    <input class="btn btn-danger" type="submit" method="GET" value="Download Source">
                </form>

            </div>
            <br>
            <div class="col">

                <div class="container">
                    <div class="row">
                        <div class="col-11">
                            <div class="widget-area no-padding blank">
                                <div class="status-upload">
                                            <form>
                                            <textarea id="comment" placeholder="Aggiungi un commento!!!"></textarea>
                                            </form>
                                            <button class="btn btn-success green" onclick="confirmComment()"><i class="fa fa-share"></i>
                                            Invia</button>
                                            
                                </div><!-- Status Upload  -->
                            </div><!-- Widget Area -->
                        </div>
                    </div>

                    <?php 
                    
                    include 'php/comments.php';
                    
                    for ($i=0; $i<$stmt->num_rows; $i++){

                        $stmt->bind_result($userID, $time, $comment, $user, $avatar); // passo variabili in cui memorizzare
                        $stmt->fetch();
                        // da gestire meglio
                        //$date = date_create($time);
                        //$date = date_format($date,"d/m/Y, H:m:s");
                        echo '<div class="row">
                        <div class="col-11">
                            <div class="card card-white post">
                                <div class="post-heading">
                                    <div class="float-left image">
                                        <img src="avatars/' . $avatar . '" class="img-circle avatar"
                                            alt="user profile image">
                                    </div>
                                    <div class="float-left meta">
                                        <div class="title h5">
                                            <a href="#"><b>' . $user . '</b></a>
                                            
                                        </div>
                                        <h6 class="text-muted time">' . $time . '</h6>
                                    </div>
                                </div>
                                <div class="post-description">
                                    <p>' . htmlspecialchars($comment) . '</p>

                                </div>
                            </div>
                        </div>

                    </div>'; 

                    }
                    
                    ?>
                    
                </div>

            </div>


            <p class="d-none" id="idgame"><?php echo $_GET["idgame"]?></p>
            <script src="js/viewGameControl.js"></script>

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous">
            </script>
</body>

</html>