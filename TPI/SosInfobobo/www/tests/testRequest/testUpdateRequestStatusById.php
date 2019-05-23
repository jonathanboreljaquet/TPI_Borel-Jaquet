<?php
/*
  Projet: SOS INFOBOBO
  Description: Fichier de test de la fonction UpdateRequestStatusById du manager RequestManager
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';
echo "Test de modification du statut d'une demande de réparation informatique grâce à son identifiant.<br/>";
echo "Résultat :<br/>";
if (RequestManager::UpdateRequestStatusById(24, "REFUSEE")) {
  echo "L'update a bien fonctionné.";
} else {
  echo "L'update n'a pas fonctionné.";
}
