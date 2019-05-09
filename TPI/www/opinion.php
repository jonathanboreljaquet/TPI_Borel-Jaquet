<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/inc.all.php';

$arrOpinion = OpinionManager::GetOpinionValidate();

if (isset($_POST["btnSend"])) {
    if (isset($_POST["comment"])) {
        $comment = filter_input(INPUT_POST, "comment", FILTER_SANITIZE_STRING);
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
    <meta charset="utf-8">
    <title>Avis</title>
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
            <div class="col-10 border justify-content-center border-primary rounded mt-4 p-4 "style="background-color: #E0E0E0;">
                <div class="row justify-content-center">
                    <h4>Votre avis m'intéresse</h4>
                    <form class="col-12 m-0 p-0" action="#" method="post">
                        <div class="form-group">
                            <label for="comment">Commentaire :</label>
                            <textarea class="form-control" name="comment" rows="5" id="comment"></textarea>
                        </div>
                        <button type="submit" name="btnSend" class="btn btn-primary mb-3">Envoyer</button>
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
                                    <div class="col-2">
                                        <h5><?= $opinion->date ?></h5>
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