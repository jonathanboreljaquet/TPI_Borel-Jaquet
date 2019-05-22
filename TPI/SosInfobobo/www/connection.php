<?php
/*
  Projet: SOS INFOBOBO
  Description: Page de connexion du réparateur
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';

if (isset($_POST["btnConnection"])) {
    if (!empty($_POST["pseudoLogin"]) && !empty($_POST["pwdLogin"])) {
        $pseudo = filter_input(INPUT_POST, "pseudoLogin", FILTER_SANITIZE_STRING);
        $pwd = filter_input(INPUT_POST, "pwdLogin", FILTER_SANITIZE_STRING);
        if (UserManager::Connection($pseudo, $pwd)) {
            $_SESSION["isLogged"] = true;
            header("location:".PAGE_ABOUT);
        } else {
            StyleManager::ShowAlert(ALERT_TYPE_FAILED,"Mot de passe ou pseudo incorrect");
        }
    } else {
        StyleManager::ShowAlert(ALERT_TYPE_FAILED,"Tous les champs n'ont pas été remplis");
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
            <div class="col-md-4 col-lg-4 border justify-content-center border-primary rounded mt-4 p-4" style="background-color: #E0E0E0;">
                <div class="row justify-content-center">
                    <form action="#" method="post" style="width:100%;">
                        <h1 class="text-center">Connexion</h1>
                        <hr style="width: 100%; color: black; height: 1px; background-color:black;" />
                        <div class="form-group">
                            <label for="pseudoLogin">Pseudo</label>
                            <input type="text" value="<?= ((isset($_POST["pseudoLogin"]) ? $_POST["pseudoLogin"] : "")) ?>" class="form-control" id="pseudoLogin" name="pseudoLogin" placeholder="Entrez votre pseudo">
                        </div>
                        <div class="form-group">
                            <label for="pwdLogin">Mot de passe</label>
                            <input type="password" class="form-control" id="pwdLogin" name="pwdLogin" placeholder="Entrez votre mot de passe">
                        </div>
                        <button type="submit" name="btnConnection" class="btn btn-primary">Connexion</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>