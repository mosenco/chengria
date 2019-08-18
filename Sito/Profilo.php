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
                            <th scope="row" >Username</th>
                            <td>
                                <?php
                                    echo $username;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Nome</th>
                            <td>Chenghao</td>
                        </tr>
                        <tr>
                            <th scope="row">Cognome</th>
                            <td>Xia</td>
                        </tr>
                        <tr>
                            <th scope="row">Data di nascita</th>
                            <td>18/01/1995</td>
                        </tr>
                        <tr>
                            <th scope="row">Data di iscrizione</th>
                            <td>17/08/2019</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>
                                <?php
                                echo $email;
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <input type="button" class="btn btn-danger" id="modify" value="Modifica" data-toggle="modal" data-target="#modifyModal">
    </div>
    

    <!-- Modal -->
    <div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifica i dati</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless table-hover">
                    <tbody>
                        <tr>
                            <th scope="row">Username</th>
                            <td><?php echo $username ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Nome</th>
                            <td>Chenghao</td>
                        </tr>
                        <tr>
                            <th scope="row">Cognome</th>
                            <td>Xia</td>
                        </tr>
                        <tr>
                            <th scope="row">Data di nascita</th>
                            <td>18/01/1995</td>
                        </tr>
                        <tr>
                            <th scope="row">Data di iscrizione</th>
                            <td>17/08/2019</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td><input name="Email" type="email" class="form-control" id="Email" placeholder="Email@example.com" 
                        onkeyup="checkValidation('Email')" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" 
                        title="L'Email deve avere il seguente formato: Email@example.com" value="<?php echo $email?>" required valid></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="reload()">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="confirm('<?php echo $username.', '.$email?>')">Save changes</button>
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