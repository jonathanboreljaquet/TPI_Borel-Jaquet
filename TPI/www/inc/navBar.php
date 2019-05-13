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
            <li class="nav-item <?= (strpos($_SERVER['PHP_SELF'], PAGE_ABOUT)) ? "active" : ""; ?>">
                <a class="nav-link" href=<?= PAGE_ABOUT ?>>Accueil</a>
            </li>
            <li class="nav-item <?= (strpos($_SERVER['PHP_SELF'], PAGE_CONTACT)) ? "active" : ""; ?>">
                <a class="nav-link" href=<?= PAGE_CONTACT ?>>Contact</a>
            </li>
            <li class="nav-item <?= (strpos($_SERVER['PHP_SELF'], PAGE_OPINION)) ? "active" : ""; ?>">
                <a class="nav-link" href=<?= PAGE_OPINION ?>>Avis</a>
            <li class="nav-item <?= (strpos($_SERVER['PHP_SELF'], PAGE_CONNECTION)) ? "active" : ""; ?>">
                <?= ($isLogged == false) ? '<a class="nav-link" href="'.PAGE_CONNECTION.'">Connexion</a>' : '<a class="nav-link" href="disconnection.php">Deconnexion</a>'; ?>
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
                        <a class="dropdown-item <?= (strpos($_SERVER['PHP_SELF'], PAGE_ADMIN_CONTACT)) ? "active" : ""; ?>" href=<?= PAGE_ADMIN_CONTACT ?>>Demande</a>
                        <a class="dropdown-item <?= (strpos($_SERVER['PHP_SELF'], PAGE_ADMIN_ABOUT)) ? "active" : ""; ?>" href=<?= PAGE_ADMIN_ABOUT ?>>Avis</a>
                        <a class="dropdown-item" href="#">Statistique</a>
                    </div>
                </div>
            <?php
        }
        ?>
        </ul>
    </div>
</nav>