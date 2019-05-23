<?php
/*
  Projet: SOS INFOBOBO
  Description: Page de création d'avis pour le client.
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';
$arrOpinion = OpinionManager::GetOpinionValidate();
if (isset($_POST["btnSendOpinion"])) {
    if (!empty($_POST["opinionComment"])) {
        $comment = filter_input(INPUT_POST, "opinionComment", FILTER_SANITIZE_STRING);
        if (OpinionManager::AddOpinion($comment)) {
            StyleManager::ShowAlert(ALERT_TYPE_SUCCESS, "Votre avis est en attente de validation");
        } else {
            StyleManager::ShowAlert(ALERT_TYPE_FAILED, "Avis invalide");
        }
    } else {
        StyleManager::ShowAlert(ALERT_TYPE_FAILED, "Le champ commentaire n'a pas été rempli");
    }
}
?>
<!doctype html>
<html lang="fr">

<head>
    <title>Avis</title>
    <?php include "inc/header.php" ?>
</head>

<body>
    <?php include "inc/navBar.php"; ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="section col-md-4 col-lg-10 border justify-content-center border-primary rounded mt-4 p-4">
                <div class="row justify-content-center">
                    <h4>Votre avis m'intéresse</h4>
                    <hr />
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
                    <hr />
                </div>
                <?php
                if (!empty($arrOpinion)) {
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
                                            <h5><?= StyleManager::SqlDateToWritten($opinion->date);  ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                endforeach;
            } else {
                echo "<h6>Aucun avis validé</h6>";
            }
            ?>
            </div>
        </div>
    </div>
</body>

</html>