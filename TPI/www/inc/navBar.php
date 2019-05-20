<?php
if (isset($_SESSION["isLogged"]) == true && $_SESSION["isLogged"] == true) {
    $isLogged = true;
} else {
    $isLogged = false;
}

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <img src="img/INFOBOBO.png" width="100" height="54" alt="">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item <?= (strpos($_SERVER['PHP_SELF'], PAGE_ABOUT)) ? "active" : ""; ?>">
                <a class="nav-link" href=<?= PAGE_ABOUT ?>><span class="fa fa-home"></span> Accueil</a>
            </li>
            <li class="nav-item <?= (strpos($_SERVER['PHP_SELF'], PAGE_CONTACT)) ? "active" : ""; ?>">
                <a class="nav-link" href=<?= PAGE_CONTACT ?>>Contact</a>
            </li>
            <li class="nav-item <?= (strpos($_SERVER['PHP_SELF'], PAGE_OPINION)) ? "active" : ""; ?>">
                <a class="nav-link" href=<?= PAGE_OPINION ?>>Avis</a>
            </li>
            <li>
                <?php
                if ($isLogged == true) {
                    ?>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fa fa-user"></span> Administration
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item <?= (strpos($_SERVER['PHP_SELF'], PAGE_ADMIN_CALENDAR)) ? "active" : ""; ?>" href=<?= PAGE_ADMIN_CALENDAR ?>>Calendrier <span class="fa fa-calendar"></span></a>
                            <a class="dropdown-item <?= (strpos($_SERVER['PHP_SELF'], PAGE_ADMIN_CONTACT)) ? "active" : ""; ?>" href=<?= PAGE_ADMIN_CONTACT ?>>Demande</a>
                            <a class="dropdown-item <?= (strpos($_SERVER['PHP_SELF'], PAGE_ADMIN_ABOUT)) ? "active" : ""; ?>" href=<?= PAGE_ADMIN_ABOUT ?>>Avis</a>
                            <a class="dropdown-item <?= (strpos($_SERVER['PHP_SELF'], PAGE_ADMIN_STATISTIC)) ? "active" : ""; ?>" href=<?= PAGE_ADMIN_STATISTIC ?>>Statistique</a>
                        </div>
                    </div>
                <?php
            }
            ?>
            </li>
            <li class="nav-item <?= (strpos($_SERVER['PHP_SELF'], PAGE_CONNECTION)) ? "active" : ""; ?>">
                <?= ($isLogged == false) ? '<a class="nav-link" href="' . PAGE_CONNECTION . '"><span class="fas fa-sign-in-alt"></span> Connexion</a>' : '<a class="nav-link" href="disconnection.php"><span class="fas fa-sign-out-alt"></span> Deconnexion</a>'; ?>
            </li>

        </ul>
    </div>
</nav>