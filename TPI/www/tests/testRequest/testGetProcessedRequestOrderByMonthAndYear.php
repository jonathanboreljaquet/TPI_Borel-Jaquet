<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

//Test de récuparation des statistique triée par mois et par année .
echo "Test count de toute les demandes de statut 'TRAITEE' triée par mois et par année ";
$arrRequestProcessed = RequestManager::GetProcessedRequestOrderByMonthAndYear("2019");
var_dump($arrRequestProcessed);
echo "-<br>";
