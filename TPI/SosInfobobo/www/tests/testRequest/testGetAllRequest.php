<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

//Test de récuparation d'un tableau remplit de tableau avec un objet Request et Client.
echo "Test de sélection de toute les demandes complete(demande et client) ";
$arrRequest = RequestManager::GetAllRequest();
var_dump($arrRequest);
echo "-<br>";
