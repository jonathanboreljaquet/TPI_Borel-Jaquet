<?php
if (isset($_SESSION["isLogged"]) == true && $_SESSION["isLogged"] == true) {
    $isLogged = true;
} else {
    $isLogged = false;
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Infobobo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">A propos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="opinion.php">Avis</a>
            <li>
                <?= $action = ($isLogged == false) ? '<a class="nav-link" href="connection.php">Connexion</a>' : '<a class="nav-link" href="disconnection.php">Deconnexion</a>'; ?>
            </li>
            <?php
            if ($isLogged == true) {
                ?>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Administration
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Calendrier</a>
                        <a class="dropdown-item" href="#">Demande</a>
                        <a class="dropdown-item" href="#">Avis</a>
                        <a class="dropdown-item" href="#">Statistique</a>
                    </div>
                </div>
            <?php
        }
        ?>
        </ul>
    </div>
</nav>