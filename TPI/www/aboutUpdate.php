<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/inc.all.php';


if (isset($_SESSION["isLogged"]) == true && $_SESSION["isLogged"] == true) {
    $isLogged = true;
} else {
    header("location: about.php");
}
if (isset($_POST["btnUpdateAbout"])) {
    $oldPhoneNumber = filter_input(INPUT_POST, "aboutPhoneNumber", FILTER_SANITIZE_STRING);
    $oldEmail = filter_input(INPUT_POST, "aboutEmail", FILTER_SANITIZE_STRING);
    $oldPrice = filter_input(INPUT_POST, "aboutPrice", FILTER_SANITIZE_STRING);
    $oldDescription = filter_input(INPUT_POST, "aboutDescription", FILTER_SANITIZE_STRING);
} else {
    header("location: about.php");
}

$about = AboutManager::GetAboutInformation();
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Accueil</title>
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
            <div class="col-4 border justify-content-center border-primary rounded mt-4 p-4" style="background-color: #E0E0E0;">
                <div class="row justify-content-center">
                    <h1>Modification de mes informations</h1>
                </div>
                <div class="row justify-content-center">
                    <form action="#" method="POST" class="w-100">
                        <div class="form-group">
                            <label for="aboutPhoneNumber">Numéro de téléphone</label>
                            <input type="text" name="aboutPhoneNumber" class="form-control" id="aboutPhoneNumber" value="<?= $oldPhoneNumber ?>">
                        </div>
                        <div class="form-group">
                            <label for="aboutEmail">Email</label>
                            <input type="email" name="aboutEmail" class="form-control" id="aboutEmail" value="<?= $oldEmail ?>">
                        </div>
                        <div class="form-group">
                            <label for="aboutPrice">Price</label>
                            <input type="text" name="aboutPrice" class="form-control" id="aboutPrice" value="<?= $oldPrice ?>">
                        </div>
                        <div class="form-group">
                            <label for="aboutDescription">Description</label>
                            <textarea class="form-control" style="resize:none" name="aboutDescription" id="aboutDescription" rows="4"><?= $oldDescription  ?></textarea>
                        </div>
                        <button type="submit" name="btnUpdateAbout" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>

</html>