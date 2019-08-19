<?php include 'php/Session.php';
if(empty($_SESSION["username"])) 
    header('refresh:0;url=index.php');
$username = $_SESSION['username'];
include 'php/RetrieveData.php';
?>

<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>GamingDevNet - Profilo</title>
</head>

<body>
    <?php 
        include 'php/Navbar.php';
    ?>
    <div class="container">
        <div class="row">
            <div class="col m-5">
                <h1 class="text-center">Gestisci il tuo profilo utente</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-borderless table-hover">
                    <tbody>
                        <tr>
                            <th scope="row"><img height="60" width="60" src="avatars/<?php echo $imgprofilo; ?>"></th>

                        </tr>
                        <tr>
                            <th scope="row">Username</th>
                            <td id="Username">
                                <?php if(isset($username)) echo $username;
                                else echo '/';?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Nome</th>
                            <td><?php if(isset($name)) echo $name;
                            else echo '/';?></td>
                        </tr>
                        <tr>
                            <th scope="row">Cognome</th>
                            <td><?php if(isset($surname)) echo $surname;
                            else echo '/';?></td>
                        </tr>
                        <tr>
                            <th scope="row">Data di nascita</th>
                            <td><?php if(isset($dateOfBirth)) echo $dateOfBirth;
                            else echo '/'?></td>
                        </tr>
                        <tr>
                            <th scope="row">Data di iscrizione</th>
                            <td><?php if(isset($dateOfSub)) echo $dateOfSub;
                            else echo '/';?></td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>
                                <?php if(isset($email)) echo $email;
                                else echo '/';?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <input type="button" class="btn btn-danger" id="modify" value="Modifica dati" data-toggle="modal"
            data-target="#modifyModal">
        <input type="button" class="btn btn-danger" id="modifyImage" value="Modifica Avatar" data-toggle="modal"
            data-target="#modifyImageModal">
        <input type="button" class="btn btn-danger" id="modifyPassword" value="Modifica password" data-toggle="modal"
            data-target="#modifyPasswordModal">
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modifyModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifica i tuoi dati</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless table-hover">
                        <tbody>
                            <tr>
                                <th scope="row">Immagine profilo</th>
                                <td><input type="file" name="fileToUpload" id="fileToUpload" value="default"></td>
                            </tr>
                            <tr>
                                <th scope="row">Nome</th>
                                <td><input name="Name" type="text" class="form-control" id="Name" placeholder="Nome"
                                        value="<?php if(isset($name)) echo $name;?>" required valid></td>
                            </tr>
                            <tr>
                                <th scope="row">Cognome</th>
                                <td><input name="Surname" type="text" class="form-control" id="Surname"
                                        placeholder="Cognome" value="<?php if(isset($surname)) echo $surname;?>"
                                        required valid></td>
                            </tr>
                            <tr>
                                <th scope="row">Data di nascita</th>
                                <td><input name="DateOfBirth" type="date" class="form-control" id="DateOfBirth"
                                        placeholder="Data di nascita"
                                        value="<?php if(isset($dateOfBirth)) echo $dateOfBirth;?>" required valid></td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td><input name="Email" type="email" class="form-control" id="Email"
                                        placeholder="Email@example.com" onkeyup="checkValidation('Email')"
                                        pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
                                        title="L'Email deve avere il seguente formato: Email@example.com"
                                        value="<?php echo $email?>" required valid></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="reload()">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                        onclick="confirm('<?php echo $username; ?>')">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal image -->
    <div class="modal fade" id="modifyImageModal" tabindex="2" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form target="_blank" name="imageChange" action="php/UploadToAvatars.php" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifica la tua immagine profilo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-borderless table-hover">
                            <tbody>


                                Seleziona un'immagine:<br>
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <br>
                                <input type="submit" value="Controlla se è possibile" name="submit" class="btn btn-secondary">

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            onclick="reload()">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" value="Upload Image"
                            onclick="confirmImage('<?php echo $username;?>')">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal password -->
    <div class="modal fade" id="modifyPasswordModal" tabindex="2" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifica la tua password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless table-hover">
                        <tbody>
                            <tr>
                                <th scope="row">Password attuale</th>
                                <td>
                                    <input name="password1" type="password" class="form-control" id="password1"
                                        placeholder="Password attuale" required valid></td>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Password nuova</th>
                                <td><input name="password2" type="password" class="form-control" id="password2"
                                        placeholder="Password nuova" required valid></td>
                            </tr>
                            <tr>
                                <th scope="row">Conferma password nuova</th>
                                <td><input name="password3" type="password" class="form-control" id="password3"
                                        placeholder="Conferma password" required valid></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="reload()">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                        onclick="confirmPassword('<?php echo $username;?>')">Save changes</button>
                </div>
            </div>
        </div>
    </div>



    <script src="js/RegistrationControl.js"></script>
    <script src="js/ModifyProfile.js"></script>

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