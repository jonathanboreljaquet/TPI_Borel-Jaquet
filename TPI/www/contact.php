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
            echo "<div class='alert alert-success mb-0' role='alert'>Votre demande à été envoyé au réparateur</div>";
        } else {
            echo "<div class='alert alert-danger mb-0' role='alert'>Demande invalide</div>";
        }
    }
}
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Contact</title>
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