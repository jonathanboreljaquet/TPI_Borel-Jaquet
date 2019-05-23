<?php
/*
  Projet: SOS INFOBOBO
  Description: Fichier de test de la fonction GetRequestById du manager RequestManager
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';
echo "Test de récupération d'une demande de réparation informatique grâce à son indentifiant dans un tableau contenant un objet Client et Request.<br/>";
echo "Résultat :<br/>";
$arrRequest = RequestManager::GetRequestById(27);
var_dump($arrRequest);
