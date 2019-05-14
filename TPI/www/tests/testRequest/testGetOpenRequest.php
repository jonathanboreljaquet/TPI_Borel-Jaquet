<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

//Test de récuparation d'un tableau remplit de tableau d'objet Request avec le statut "OUVERTE" .
echo "Test de sélection de toute les demandes de statut 'OUVERTE' ";
$arrRequest = RequestManager::GetOpenRequest();
var_dump($arrRequest);
echo "-<br>";
