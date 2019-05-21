<?php
/*
  Projet: SOS INFOBOBO
  Description: Page d'administration des statistiques de réparation effectuée du réparateur.
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

UserManager::VerificateRoleUser();
if (isset($_POST["btnShowStat"])) {
    $year = filter_input(INPUT_POST, "year", FILTER_SANITIZE_STRING);
    $arrMonthStat = RequestManager::GetProcessedRequestOrderByMonthAndYear($year);
} else {
    $arrMonthStat = RequestManager::GetProcessedRequestOrderByMonthAndYear(date('Y'));
}

?>
<!doctype html>
<html lang="fr">

<head>
    <title>Statistiques</title>
    <?php include "inc/header.php" ?>
</head>

<body style="background-color: #272727;">
    <?php
    include "inc/navBar.php";
    ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4 col-lg-10 border justify-content-center border-primary rounded mt-4 p-4 " style="background-color: #E0E0E0;">
                <div class="row justify-content-center mb-2">
                    <h4>Statistiques des réparations effectuées</h4>
                    <hr style="width: 100%; color: black; height: 1px; background-color:black;" />
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <form method="POST" action="#">
                            <div class="form-group">
                                <label for="numericUpDownYear">Année :</label>
                                <input type="number" class="form-control" id="numericUpDownYear" name="year" value="<?= ((isset($_POST["btnShowStat"]) ? $year : date('Y'))) ?>">
                            </div>
                            <button type="submit" name="btnShowStat" class="btn btn-primary">Rechercher</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php if (!empty($arrMonthStat)) { ?>
                            <div class="table-responsive">
                                <table class="table table-dark rounded border-primary">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mois</th>
                                            <th scope="col">Nombre de réparation effectuée</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($arrMonthStat as $request) : ?>
                                            <tr>
                                                <td><?= $arrMonth[$request["month"]] ?></td>
                                                <td><?= $request["nbRequest"] ?></td>
                                            </tr>

                                        <?php endforeach; ?>


                                    </tbody>
                                </table>
                            </div>
                        <?php
                    } else {
                        echo "<h6>Aucune réparation éfféctué</h6>";
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>