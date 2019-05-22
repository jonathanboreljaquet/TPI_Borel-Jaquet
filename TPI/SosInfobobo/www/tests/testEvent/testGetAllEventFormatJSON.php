<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

//Test de récupération de mes événement en JSON
echo "Test de récupération des tout les événement en format JSON";
$eventJSON = EventManager::GetAllEventFormatJSON();
echo $eventJSON;
echo "-<br>";
