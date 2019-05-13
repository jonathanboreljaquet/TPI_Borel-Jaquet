<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';


if (isset($_SESSION["isLogged"]) && $_SESSION["isLogged"] == true) {
    $isLogged = true;
} else {
    header("location: about.php");
}




if (isset($_POST["btnUpdateAbout"])) {
    $newPhoneNumber = filter_input(INPUT_POST, "newAboutPhoneNumber", FILTER_SANITIZE_STRING);
    $newEmail = filter_input(INPUT_POST, "newAboutEmail", FILTER_SANITIZE_STRING);
    $newPrice = filter_input(INPUT_POST, "newAboutPrice", FILTER_SANITIZE_STRING);
    $newDescription = filter_input(INPUT_POST, "newAboutDescription", FILTER_SANITIZE_STRING);

    if (AboutManager::UpdateAboutInformation($newPhoneNumber,$newEmail,$newPrice,$newDescription)) {
        echo "<div class='alert alert-success mb-0' role='alert'>Informations bien modifié</div>";
        echo "<meta http-equiv='refresh' content='2;URL=about.php'>";
    } else {
        echo "<div class='alert alert-danger mb-0' role='alert'>Problème lors du changement d'informations</div>";
    }
}
$about = AboutManager::GetAboutInformation();
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Modification d'informations</title>
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
        <div class="row justify-content-center" style="color: black;">
            <div class="col-md-4 col-lg-4 border justify-content-center border-primary rounded mt-4 p-4" style="background-color: #E0E0E0;">
                <div class="row justify-content-center">
                    <h1>Modification de mes informations</h1>
                </div>
                <div class="row justify-content-center">
                    <form action="#" method="POST" class="w-100">
                        <div class="form-group">
                            <label for="newAboutPhoneNumber">Numéro de téléphone</label>
                            <input type="text" name="newAboutPhoneNumber" class="form-control" id="newAboutPhoneNumber" value="<?= $about->phoneNumber ?>">
                        </div>
                        <div class="form-group">
                            <label for="newAboutEmail">Email</label>
                            <input type="email" name="newAboutEmail" class="form-control" id="newAboutEmail" value="<?= $about->email ?>">
                        </div>
                        <div class="form-group">
                            <label for="newAboutPrice">Price</label>
                            <input type="text" name="newAboutPrice" class="form-control" id="newAboutPrice" value="<?= $about->price ?>">
                        </div>
                        <div class="form-group">
                            <label for="newAboutDescription">Description</label>
                            <textarea class="form-control" style="resize:none" name="newAboutDescription" id="newAboutDescription" rows="4"><?= $about->description  ?></textarea>
                        </div>
                        <button type="submit" name="btnUpdateAbout" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>

</html>