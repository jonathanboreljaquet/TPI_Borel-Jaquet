<?php
/*
  Projet: SOS INFOBOBO
  Description: Fichier de test de la fonction GetAllEventFormatJSON du manager EventManager
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';
echo "Test de récupération de tous les événements en référence à la table 'evenement' en format JSON.<br/>";
echo "Résultat :<br/>";
$eventJSON = EventManager::GetAllEventFormatJSON();
echo $eventJSON;
