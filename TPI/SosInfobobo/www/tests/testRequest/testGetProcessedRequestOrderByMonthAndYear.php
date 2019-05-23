<?php
/*
  Projet: SOS INFOBOBO
  Description: Fichier de test de la fonction GetProcessedRequestOrderByMonthAndYear du manager RequestManager
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';
echo "Test de récupération des statistiques triée par mois et par année choisie en parametre de statut 'TRAITEE'.<br/>";
echo "Résultat :<br/>";
$arrRequestProcessed = RequestManager::GetProcessedRequestOrderByMonthAndYear("2019");
var_dump($arrRequestProcessed);
