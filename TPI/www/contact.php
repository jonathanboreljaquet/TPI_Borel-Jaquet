<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';


if (isset($_POST["btnSendRequest"])) {
    if (isset($_POST["contactFirstName"]) && isset($_POST["contactSecondName"]) && isset($_POST["contactEmail"]) && isset($_POST["contactPhoneNumber"]) && isset($_POST["contactDescription"])) {
        $contactFirstName = filter_input(INPUT_POST, "contactFirstName", FILTER_SANITIZE_STRING);
        $contactSecondName = filter_input(INPUT_POST, "contactSecondName", FILTER_SANITIZE_STRING);
        $contactEmail = filter_input(INPUT_POST, "contactEmail", FILTER_SANITIZE_STRING);
        $contactPhoneNumber = filter_input(INPUT_POST, "contactPhoneNumber", FILTER_SANITIZE_STRING);
        $contactDescription = filter_input(INPUT_POST, "contactDescription", FILTER_SANITIZE_STRING);
        if (RequestManager::AddRequest($contactFirstName,$contactSecondName,$contactEmail,$contactPhoneNumber,$contactDescription)) {
            //MailerManager::SendMail(RECEIVER_MAIL_REQUEST_ADD,SUBJECT_MAIL_REQUEST_ADD,MESSAGE_MAIL_REQUEST_ADD);
            echo "<div class='alert alert-success mb-0' role='alert'>Votre demande a été envoyée au réparateur</div>";
        } else {
            echo "<div class='alert alert-danger mb-0' role='alert'>Demande invalide</div>";
        }
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
                                <input type="text" name="contactFirstName" class="form-control" id="contactFirstName" required>
                            </div>
                            <div class="form-group">
                                <label for="contactSecondName">Prénom</label>
                                <input type="text" name="contactSecondName" class="form-control" id="contactSecondName" required>
                            </div>
                            <div class="form-group">
                                <label for="contactEmail">Email</label>
                                <input type="email" name="contactEmail" class="form-control" id="contactEmail" required>
                            </div>
                            <div class="form-group">
                                <label for="contactPhoneNumber">Numéro de téléphone</label>
                                <input type="text" name="contactPhoneNumber" class="form-control" id="contactPhoneNumber" required>
                            </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="contactDescription">Description du problème</label>
                            <textarea class="form-control" style="resize:none" name="contactDescription" id="contactDescription" rows="10" required></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" name="btnSendRequest" class="btn btn-primary">Envoyer</button>
                </form>


            </div>
        </div>
    </div>


</body>

</html>