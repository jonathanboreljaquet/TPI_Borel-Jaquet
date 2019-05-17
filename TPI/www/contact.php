<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';


if (isset($_POST["btnSendRequest"])) {
    if (!empty($_POST["contactFirstName"]) && !empty($_POST["contactSecondName"]) && !empty($_POST["contactEmail"]) && !empty($_POST["contactPhoneNumber"]) && !empty($_POST["contactDescription"])) {
        $contactFirstName = filter_input(INPUT_POST, "contactFirstName", FILTER_SANITIZE_STRING);
        $contactSecondName = filter_input(INPUT_POST, "contactSecondName", FILTER_SANITIZE_STRING);
        $contactEmail = filter_input(INPUT_POST, "contactEmail", FILTER_SANITIZE_STRING);
        $contactPhoneNumber = filter_input(INPUT_POST, "contactPhoneNumber", FILTER_SANITIZE_STRING);
        $contactDescription = filter_input(INPUT_POST, "contactDescription", FILTER_SANITIZE_STRING);
        if (RequestManager::AddRequest($contactFirstName, $contactSecondName, $contactEmail, $contactPhoneNumber, $contactDescription)) {
            //MailerManager::SendMail(RECEIVER_MAIL_REQUEST_ADD,SUBJECT_MAIL_REQUEST_ADD,MESSAGE_MAIL_REQUEST_ADD);
            StyleManager::ShowAlert(ALERT_TYPE_SUCCESS,"Votre demande de réparation informatique a été envoyée au réparateur");
        } else {
            StyleManager::ShowAlert(ALERT_TYPE_FAILED,"Demande invalide");
        }
    } else {
        StyleManager::ShowAlert(ALERT_TYPE_FAILED,"Tous les champs n'ont pas été remplis");
    }
}
?>
<!doctype html>
<html lang="fr">

<head>
    <title>Contact</title>
    <?php include "inc/header.php" ?>
</head>

<body style="background-color: #272727;">
    <?php
    include "inc/navBar.php";
    ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="ccol-md-4 col-lg-10 border justify-content-center border-primary rounded mt-4 p-4 " style="background-color: #E0E0E0;">
                <div class="row justify-content-center">
                    <h4>Faire une demande de réparation</h4>
                </div>
                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        <form action="#" method="POST" class="w-100">
                            <div class="form-group">
                                <label for="contactFirstName">Nom</label>
                                <input type="text" value="<?= ((isset($_POST["contactFirstName"]) ? $_POST["contactFirstName"] : "")) ?>" name="contactFirstName" class="form-control" id="contactFirstName">
                            </div>
                            <div class="form-group">
                                <label for="contactSecondName">Prénom</label>
                                <input type="text" value="<?= ((isset($_POST["contactSecondName"]) ? $_POST["contactSecondName"] : "")) ?>" name="contactSecondName" class="form-control" id="contactSecondName">
                            </div>
                            <div class="form-group">
                                <label for="contactEmail">Email</label>
                                <input type="email" value="<?= ((isset($_POST["contactEmail"]) ? $_POST["contactEmail"] : "")) ?>" name="contactEmail" class="form-control" id="contactEmail">
                            </div>
                            <div class="form-group">
                                <label for="contactPhoneNumber">Numéro de téléphone</label>
                                <input type="text" value="<?= ((isset($_POST["contactPhoneNumber"]) ? $_POST["contactPhoneNumber"] : "")) ?>" name="contactPhoneNumber" class="form-control" id="contactPhoneNumber">
                            </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="contactDescription">Description du problème</label>
                            <textarea class="form-control" style="resize:none" name="contactDescription" id="contactDescription" rows="10"><?= ((isset($_POST["contactDescription"]) ? $_POST["contactDescription"] : "")) ?></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" name="btnSendRequest" class="btn btn-primary">Envoyer</button>
                <small id="emailHelp" class="form-text text-muted">Tous les champs sont obligatoires.</small>
                </form>


            </div>
        </div>
    </div>


</body>

</html>