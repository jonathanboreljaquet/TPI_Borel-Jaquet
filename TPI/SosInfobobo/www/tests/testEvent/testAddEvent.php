<?php
/*
  Projet: SOS INFOBOBO
  Description: Fichier de test de la fonction AddEvent du manager EventManager
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';
echo "Test d'ajout d'un événement dans la table 'evenement'.<br/>";
echo "Résultat :<br/>";
if (EventManager::AddEvent(24, "2019-05-10", "2019-05-12")) {
  echo "L'insert a bien fonctionné.";
} else {
  echo "L'insert n'a pas fonctionné.";
}
