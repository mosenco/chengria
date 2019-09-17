<?php include 'php/session.php';
if(empty($_SESSION["username"])) 
    header('refresh:0;url=index.php');
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>GamingDevNet - Carica il tuo gioco!></title>
</head>

<body>
    <?php 
        include 'php/navbar.php';
    ?>

     <!-- Upload di zip --->
    <div class="container">
        <div class="row m-5">
            <div class="col">
                <form enctype="multipart/form-data" method="POST" action="php/uploadToGames.php" id="uploadzipform">
                    <div class="row">

                    <!-- colonna per il caricamento della icona del gioco -->
                        <div class="col">
                            <div class="form-group">
                            <input id="formicon" class="form-control-file" type="file" aria-describedby="iconhelp" name="formicon"/>
                                <small id="iconhelp" class="form-text text-muted">Carica una icona per il gioco. Max 5 MB</small>
                            </div>
                        </div>

                        <!-- caricamento gioco formato zip -->
                        <div class="col">
                            <div class="form-group">
                                <input id="formzip" class="form-control-file" type="file" aria-describedby="ziphelp" name="zip_file" accept="zip/*"/>
                                <small id="ziphelp" class="form-text text-muted">Carica il gioco in formato zip</small>
                            </div>
                        </div>
                    </div>

                    <!-- input vari da inserire -->
                    <div class="form-group">
                        <input id="gamename" class="form-control" type="text" name="gamename" placeholder="Inserisci il nome del gioco">
                    </div>
                    <div class="form-group">
                        <label for="genreselect">Seleziona Genere</label>
                        <select name="genre" class="form-control" id="genreselect">
                        <option value="zero">genere non selezionato</option>
                        <option value="action">action</option>
                        <option value="adventures">adventures</option>
                        <option value="fantasy">fantasy</option>
                        <option value="horror">horror</option>
                        <option value="rpg">RPG</option>
                        <option value="fps">FPS</option>
                        <option value="strategy">strategy</option>
                        <option value="other">other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="4" name="comment" form="uploadzipform" maxlength="500" placeholder="Descrivi il gioco"></textarea>
                    </div>
                    <input type="submit" class="btn btn-danger" id="Submit"   value="Caricalo ora!">
                    <button onclick="checkForm()" type="button" class="btn btn-secondary">Check Validation</button>
                </form>
            </div>
        </div>
    </div>
    
    <Script src="js/uploadControl.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>