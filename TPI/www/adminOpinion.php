<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

if (isset($_SESSION["isLogged"]) && $_SESSION["isLogged"] == true) {
    $isLogged = true;
} else {
    header("location: opinion.php");
}

if (isset($_GET["type"]) && isset($_GET["id_opinion"])) {
    $type = filter_input(INPUT_GET, "type", FILTER_SANITIZE_STRING);
    $id_opinion = filter_input(INPUT_GET, "id_opinion", FILTER_SANITIZE_NUMBER_INT);
    if ($type == "accept") {
        if (OpinionManager::UpdateOpinionStatutById($id_opinion)) {
            echo "<div class='alert alert-success mb-0' role='alert'>Avis validé</div>";
        } else {
            echo "<div class='alert alert-success mb-0' role='alert'>Problème lors de la validation de l'avis</div>";
        }
    } else if ($type == "refuse") {
        if (OpinionManager::DeleteOpinionById($id_opinion)) {
            echo "<div class='alert alert-success mb-0' role='alert'>Avis refusé</div>";
        } else {
            echo "<div class='alert alert-success mb-0' role='alert'>Problème lors du refus de l'avis</div>";
        }
    }
}

$arrOpinion = OpinionManager::GetOpinionNotValidate();
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Validation d'avis</title>
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
                    <h4>Avis en attente de validation</h4>
                </div>
                <?php
                foreach ($arrOpinion as $opinion) :
                    ?>
                    <div class="row justify-content-center">
                        <div class="col-12 media border-bottom border-dark  mb-2">
                            <div class="media-body">
                                <p class="text-justify mb-1">
                                    <?= htmlspecialchars_decode($opinion->comment) ?>
                                </p>
                                <div class="row justify-content-end">
                                    <div class="col-md-4 col-lg-2">
                                        <h5><?= $opinion->date ?></h5>
                                    </div>
                                    <div class="col-md-4 col-lg-2">
                                        <a class="btn btn-success w-100" href="adminOpinion.php?type=accept&id_opinion=<?= $opinion->id_opinion ?>" role="button">Valider</a>
                                        <a class="btn btn-danger w-100" href="adminOpinion.php?type=refuse&id_opinion=<?= $opinion->id_opinion ?>" role="button">Refuser</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            endforeach;
            ?>
            </div>
        </div>
    </div>

</body>

</html>