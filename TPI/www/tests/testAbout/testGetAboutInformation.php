<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/inc.all.php';

//Test de récuparation d'un objet About créé en référence avec la base de données.
echo "Test de selection du seul objet About ";
$aboutInformation = AboutManager::GetAboutInformation();
var_dump($aboutInformation);
echo "-<br>";
