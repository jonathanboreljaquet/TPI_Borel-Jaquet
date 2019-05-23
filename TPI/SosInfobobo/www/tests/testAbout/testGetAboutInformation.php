<?php
/*
  Projet: SOS INFOBOBO
  Description: Fichier de test de la fonction GetAboutInformation du manager AboutManager
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';
echo "Test de récupération et d'affichage du seul objet About créé en référence avec la table 'infos_dynamiques'.<br>";
echo "Résultat :<br/>";
$aboutInformation = AboutManager::GetAboutInformation();
var_dump($aboutInformation);
