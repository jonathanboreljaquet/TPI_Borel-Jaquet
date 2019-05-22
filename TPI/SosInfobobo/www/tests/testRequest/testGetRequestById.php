<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

//Test de récuparation d'un tableau contenant un objet Request et Client grâce à l'id de la demande.
echo "Test de sélection d'une demande de réparation informatique (demande et client) grâce à l'id de la demande ";
$arrRequest = RequestManager::GetRequestById(24);
var_dump($arrRequest);
echo "-<br>";
