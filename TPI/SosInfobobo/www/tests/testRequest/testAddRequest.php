<?php
/*
  Projet: SOS INFOBOBO
  Description: Fichier de test de la fonction AddRequest du manager RequestManager
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';
echo "Test d'ajout d'une demande de réparation informatique dans la table 'evenement'.<br/>";
echo "Résultat :<br/>";
if (RequestManager::AddRequest("Borel", "Jonathan", "jonathan.brljq@eduge.ch", "077 421 39 90", "Mon ordinateur ne fonctionne plus, pouvez-vous m'aider ?")) {
  echo "L'insert a bien fonctionné.";
} else {
  echo "L'insert n'a pas fonctionné.";
}
