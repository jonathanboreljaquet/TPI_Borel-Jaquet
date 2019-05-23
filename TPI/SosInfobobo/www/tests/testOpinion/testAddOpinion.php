<?php
/*
  Projet: SOS INFOBOBO
  Description: Fichier de test de la fonction AddOpinion du manager OpinionManager
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';
echo "Test d'ajout d'un avis dans la table 'avis'.<br/>";
echo "Résultat :<br/>";
if (OpinionManager::AddOpinion("Le service était parfait, très satisfait")) {
  echo "L'insert a bien fonctionné.";
} else {
  echo "L'insert n'a pas fonctionné.";
}
