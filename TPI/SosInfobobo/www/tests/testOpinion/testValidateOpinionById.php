<?php
/*
  Projet: SOS INFOBOBO
  Description: Fichier de test de la fonction ValidateOpinionById du manager OpinionManager
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';
echo "Test de validation d'un avis grâce à son identifiant dans la table 'avis'.<br/>";
echo "Résultat :<br/>";
if (OpinionManager::ValidateOpinionById(31)) {
  echo "La validation a bien fonctionné.";
} else {
  echo "La validation n'a pas fonctionné.";
}
