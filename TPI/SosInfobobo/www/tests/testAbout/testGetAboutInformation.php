<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';

//Test de récupération d'un objet About créé en référence avec la base de données.
echo "Test d'affichage du seul objet About";
echo "<br>-";
$aboutInformation = AboutManager::GetAboutInformation();
var_dump($aboutInformation);

