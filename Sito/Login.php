<?php include 'php/session.php';
if(!empty($_SESSION["username"])) 
    header('refresh:0;url=index.php');
?>

<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>GamingDevNet - Login</title>
</head>

<body>


    <?php 
        include 'php/Navbar.php';
    ?>
    <div class="container">
        <div class="row">
            <div class="col m-5">
                <h1 class="text-center">EFFETTUA IL LOGIN</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form method="POST" action="php/LoginResponse.php">
                    <div class="form-group">
                        <label>Username</label>
                        <input name="Username" type="text" class="form-control" id="idusername" placeholder="Username"
                            pattern="[A-Za-z0-9]{5,15}" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="Pass" type="password" class="form-control" id="idpassword" placeholder="Password"
                            required>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-danger" value="Login">
                    <br>
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>

    <script src="js/RegistrationControl.js"></script>

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