<?php
/*
  Projet: SOS INFOBOBO
  Description: Fichier de test de la fonction SqlDateToWritten du manager StyleManager
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';
echo "Test d'affichage d'une date de base de données au bon format.<br/>";
echo "Résultat :<br/>";
echo "2019-05-30 devenue " . StyleManager::SqlDateToWritten("2019-05-30");
