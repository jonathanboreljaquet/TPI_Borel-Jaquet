<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

if (isset($_POST["btnConnection"])) {
    if (isset($_POST["pseudoLogin"]) && isset($_POST["pwdLogin"])) {
        $pseudo = filter_input(INPUT_POST, "pseudoLogin", FILTER_SANITIZE_STRING);
        $pwd = filter_input(INPUT_POST, "pwdLogin", FILTER_SANITIZE_STRING);
        if (UserManager::Connection($pseudo, $pwd)) {
            $_SESSION["isLogged"] = true;
            echo "<div class='alert alert-success mb-0' role='alert'>Vous vous êtes bien connecté</div>";
            echo "<meta http-equiv='refresh' content='2;URL=about.php'>";
        } else {
            echo "<div class='alert alert-danger mb-0' role='alert'>Login ou mot de passe incorrect</div>";
        }
    }
}

?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="background-color: #272727;">
    <?php
    include "inc/navBar.php";
    ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4 col-lg-4 border justify-content-center border-primary rounded mt-4 p-4"style="background-color: #E0E0E0;">
                <div class="row justify-content-center">
                    <form action="#" method="post" style="width:100%;">
                        <h1 class="text-center" style="border-bottom:#007bff solid 1px;">Connexion</h1>
                        <div class="form-group">
                            <label for="pseudoLogin">Pseudo</label>
                            <input type="text" class="form-control" id="pseudoLogin" name="pseudoLogin" placeholder="Entrez votre pseudo" required>
                        </div>
                        <div class="form-group">
                            <label for="pwdLogin">Mot de passe</label>
                            <input type="password" class="form-control" id="pwdLogin" name="pwdLogin" placeholder="Entrez votre mot de passe" required>
                        </div>
                        <button type="submit" name="btnConnection" class="btn btn-primary">Connexion</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>