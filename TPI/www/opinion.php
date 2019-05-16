<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

$arrOpinion = OpinionManager::GetOpinionValidate();

if (isset($_POST["btnSendOpinion"])) {
    if (isset($_POST["opinionComment"])) {
        $comment = filter_input(INPUT_POST, "opinionComment", FILTER_SANITIZE_STRING);
        if (OpinionManager::AddOpinion($comment)) {
            echo "<div class='alert alert-success mb-0' role='alert'>Votre avis est en attente de validation</div>";
        } else {
            echo "<div class='alert alert-danger mb-0' role='alert'>Avis invalide</div>";
        }
    }
}
?>
<!doctype html>
<html lang="fr">

<head>
    <title>Avis</title>
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
                    <h4>Votre avis m'intéresse</h4>
                    <form class="col-12 m-0 p-0" action="#" method="post">
                        <div class="form-group">
                            <label for="opinionComment">Commentaire :</label>
                            <textarea class="form-control" name="opinionComment" rows="5" id="opinionComment"></textarea>
                        </div>
                        <button type="submit" name="btnSendOpinion" class="btn btn-primary mb-3">Envoyer</button>
                    </form>
                </div>
                <div class="row justify-content-center mb-2">
                    <h4>Les avis précédents</h4>
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
                                        <h5><?= StyleManager::sqlDateToWritten($opinion->date);  ?></h5>
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
    </div>

</body>

</html>