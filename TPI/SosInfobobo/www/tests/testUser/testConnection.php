<?php
/*
  Projet: SOS INFOBOBO
  Description: Fichier de test de la fonction Connection du manager UserManager
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';
echo "Test de connexion d'un utilisateur au site web réussit avec les bonnes informations.<br/>";
if (UserManager::Connection("infobobo", "qwert")) {
  echo "Le login a bien fonctionné.<br/>";
}
echo "-<br/>";
echo "Test de connexion d'un utilisateur au site web échoué avec les mauvaises informations.<br/>";
if (!UserManager::Connection("infoboboFALSE", "qwert")) {
  echo "Login ou mot de passe eronné.<br/>";
}
