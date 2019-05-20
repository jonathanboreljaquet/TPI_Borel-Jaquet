<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

UserManager::VerificateRoleUser();

if (isset($_GET["status"]) && isset($_GET["id_request"]) && isset($_GET["clientEmail"])) {
    $status = filter_input(INPUT_GET, "status", FILTER_SANITIZE_STRING);
    $clientEmail = filter_input(INPUT_GET, "clientEmail", FILTER_SANITIZE_STRING);
    $id_request = filter_input(INPUT_GET, "id_request", FILTER_SANITIZE_NUMBER_INT);
    if (RequestManager::UpdateRequestStatusById($id_request, $status)) {
        //MailerManager::SendMail($clientEmail, SUBJECT_MAIL_REQUEST_STATUS_UPDATE, MESSAGE_MAIL_REQUEST_STATUS_UPDATE . $arrConstStatus[$status]);
        StyleManager::ShowAlert(ALERT_TYPE_SUCCESS, "Statut de la demande bien modifié");
    } else {
        StyleManager::ShowAlert(ALERT_TYPE_FAILED, "Problème lors du changement de statut de la demande");
    }
}

$arrRequest = RequestManager::GetAllRequest();
?>
<!doctype html>
<html lang="fr">

<head>
    <title>Administration des demandes</title>
    <?php include "inc/header.php" ?>
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
                    <hr style="width: 100%; color: black; height: 1px; background-color:black;" />
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
                                                        <a class="dropdown-item" href="adminContact.php?status=<?= STATUS_REFUSED ?>&id_request=<?= $arrRequestClient[REQUEST]->id_request ?>&clientEmail=<?= $arrRequestClient[CLIENT]->email ?>">Refusée</a>
                                                        <a class="dropdown-item" href="adminContact.php?status=<?= STATUS_PROCESSED ?>&id_request=<?= $arrRequestClient[REQUEST]->id_request ?>&clientEmail=<?= $arrRequestClient[CLIENT]->email ?>">Traitée</a>
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