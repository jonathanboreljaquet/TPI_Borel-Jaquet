<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

if (isset($_SESSION["isLogged"]) && $_SESSION["isLogged"] == true) {
    $isLogged = true;
} else {
    $isLogged = false;
}

$about = AboutManager::GetAboutInformation();
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Accueil</title>
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
            <div class="col-md-4 col-lg-10 border justify-content-center border-primary rounded mt-4 p-4" style="background-color: #E0E0E0;">
                <h1>À propos de moi</h1>

                <table>
                    <tr>
                        <td>
                            <h6>Numéro de téléphone : </h6>
                        </td>
                        <td><?= $about->phoneNumber ?></td>
                    </tr>
                    <tr>
                        <td>
                            <h6>Email : </h6>
                        </td>
                        <td>
                            <?= $about->email ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h6>Tarif : </h6>
                        </td>
                        <td>
                            <?= $about->price ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h6>Description :</h6>
                        </td>
                        <td class="text-justify">
                            <?= $about->description ?>
                        </td>
                    </tr>
                    <?php
                    if ($isLogged == true) {
                        ?>
                        <tr>
                            <td>
                                <a class="btn btn-primary" href="aboutUpdate.php" role="button">Modifier</a>
                            </td>
                        </tr>
                    <?php
                }
                ?>
                </table>

            </div>
        </div>
    </div>

</body>

</html>