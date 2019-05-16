<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';


$about = AboutManager::GetAboutInformation();
?>
<!doctype html>
<html lang="fr">

<head>
    <title>Accueil</title>
    <?php include "inc/header.php" ?> 
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