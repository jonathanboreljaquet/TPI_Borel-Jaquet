<?php
/*
  Projet: SOS INFOBOBO
  Description: Fichier de test de la fonction ColorStatus du manager StyleManager
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';
echo "Test de récupération de la bonne couleur assigné à un statut.<br/>";
echo "Statut 'En cours'<br/>";
echo StyleManager::ColorStatus(STATUS_IN_PROGRESS) . "<br/>";
echo "Statut 'Traitee'<br/>";
echo StyleManager::ColorStatus(STATUS_PROCESSED) . "<br/>";
echo "Statut 'Refusee'<br/>";
echo StyleManager::ColorStatus(STATUS_REFUSED) . "<br/>";
echo "Statut 'Ouverte'<br/>";
echo StyleManager::ColorStatus(STATUS_OPEN);
