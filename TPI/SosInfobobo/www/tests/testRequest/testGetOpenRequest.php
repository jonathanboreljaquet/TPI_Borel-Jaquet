<?php
/*
  Projet: SOS INFOBOBO
  Description: Fichier de test de la fonction GetOpenRequest du manager RequestManager
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';
echo "Test de récupération de toutes les demandes de réparation informatique de type 'Ouverte' dans un tableau contenant des tableaux d'objet Client et Request.<br/>";
echo "Résultat :<br/>";
$arrRequest = RequestManager::GetOpenRequest();
var_dump($arrRequest);
