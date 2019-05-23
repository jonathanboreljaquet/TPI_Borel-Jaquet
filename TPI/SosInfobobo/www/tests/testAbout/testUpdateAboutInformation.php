<?php
/*
  Projet: SOS INFOBOBO
  Description: Fichier de test de la fonction UpdateAboutInformation du manager AboutManager
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';
echo "Test de modification des informations personnelles du réparateur en référence avec la table 'infos_dynamiques'.<br/>";
echo "Résultat :<br/>";
if (AboutManager::UpdateAboutInformation("077 456 23 32", "sos@infobobo.ch", "50 - 100 CHF", "Bonjour je m'appelle Thierry et je suis réparatrice informatique !")) {
  echo "L'update a bien fonctionné.";
} else {
  echo "L'update n'a pas fonctionné.";
}
