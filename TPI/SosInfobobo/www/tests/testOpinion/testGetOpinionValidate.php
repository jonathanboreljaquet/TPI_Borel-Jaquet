<?php
/*
  Projet: SOS INFOBOBO
  Description: Fichier de test de la fonction GetOpinionValidate du manager OpinionManager
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';
echo "Test de récupération et d'affichage de tous les avis validés dans des objets Opinion créés en référence avec la table 'avis'.<br/>";
echo "Résultat :<br/>";
$arrOpinion = OpinionManager::GetOpinionValidate();
var_dump($arrOpinion);
