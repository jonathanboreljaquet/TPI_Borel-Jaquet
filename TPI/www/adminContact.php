<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

if (isset($_SESSION["isLogged"]) && $_SESSION["isLogged"] == true) {
    $isLogged = true;
} else {
    header("location: contact.php");
}
if (isset($_GET["status"]) && isset($_GET["id_request"])) {
    $status = filter_input(INPUT_GET, "status", FILTER_SANITIZE_STRING);
    $id_request = filter_input(INPUT_GET, "id_request", FILTER_SANITIZE_NUMBER_INT);
    if (RequestManager::UpdateRequestStatusById($id_request, $status)) {
        echo "<div class='alert alert-success mb-0' role='alert'>Statut de la demande bien modifié</div>";
    } else {
        echo "<div class='alert alert-success mb-0' role='alert'>Problème lors du changement de statut de la demande</div>";
    }
}

$arrRequest = RequestManager::GetAllRequest();
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Administration des demandes</title>
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
                <div class="row justify-content-center">
                    <h4>Listes des demandes de réparation</h4>
                </div>

                <?php
                foreach ($arrRequest as $arrRequestClient) :
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-dark rounded border-primary">
                                    <thead>
                                        <tr>
                                            <th style="width: 15%" scope="col">Nom</th>
                                            <th style="width: 15%" scope="col">Prénom</th>
                                            <th style="width: 15%" scope="col">Email</th>
                                            <th style="width: 15%" scope="col">Téléphone</th>
                                            <th style="width: 15%" scope="col">Statut</th>
                                            <th style="width: 15%" scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= $arrRequestClient[CLIENT]->firstName ?></td>
                                            <td><?= $arrRequestClient[CLIENT]->secondName ?></td>
                                            <td><?= $arrRequestClient[CLIENT]->email ?></td>
                                            <td><?= $arrRequestClient[CLIENT]->phoneNumber ?></td>
                                            <td style="color:<?= StyleManager::ColorStatus($arrRequestClient[REQUEST]->status) ?>;"><?= $arrConstStatus[$arrRequestClient[REQUEST]->status] ?></td>

                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <textarea rows="5" class=" form-control" readonly style="resize: none;"><?= $arrRequestClient[REQUEST]->description ?></textarea>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-rounded w-100">
                                                    <button type="button" class="btn btn-primary btn-xs w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius:3px;">
                                                        <span class="caret">Modifier</span>
                                                    </button>
                                                    <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="adminContact.php?status=<?= STATUS_REFUSED ?>&id_request=<?= $arrRequestClient[REQUEST]->id_request ?>">Refusée</a>
                                                        <a class="dropdown-item" href="adminContact.php?status=<?= STATUS_PROCESSED ?>&id_request=<?= $arrRequestClient[REQUEST]->id_request ?>">Traitée</a>
                                                    </div>
                                                </div>
                                            </td>


                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php
            endforeach;
            ?>


            </div>
        </div>


</body>

</html>