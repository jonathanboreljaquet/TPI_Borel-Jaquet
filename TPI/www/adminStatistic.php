<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

if (isset($_SESSION["isLogged"]) && $_SESSION["isLogged"] == true) {
    $isLogged = true;
} else {
    header("location: about.php");
}
if (isset($_POST["btnShowStat"])) {
    $year = filter_input(INPUT_POST, "year", FILTER_SANITIZE_STRING);
    $arrMonthStat = RequestManager::GetProcessedRequestOrderByMonthAndYear($year);
}

?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Statistique</title>
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
            <div class="col-md-4 col-lg-10 border justify-content-center border-primary rounded mt-4 p-4 " style="background-color: #E0E0E0;">
                <div class="row justify-content-center mb-2">
                    <h4>Statistique des réparations effectuée</h4>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <form method="POST" action="#">
                            <div class="form-group">
                                <label for="numericUpDownYear">Année :</label>
                                <input type="number" class="form-control" id="numericUpDownYear" name="year" value="2019">
                            </div>
                            <button type="submit" name="btnShowStat" class="btn btn-primary">Rechercher</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php if (isset($arrMonthStat)) { ?>
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
                        }
                        else{
                            echo "<h6>Aucune recherche en cours</h6>";
                        }
                         ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>