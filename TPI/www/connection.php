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
    <title>Connexion</title>
    <?php include "inc/header.php" ?> 
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