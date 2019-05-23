<?php
/*
  Projet: SOS INFOBOBO
  Description: Fichier de test de la fonction AddClient du manager ClientManager
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';
echo "Test d'ajout d'un client dans la table 'clients' et retourne son identifiant.<br/>";
echo "Résultat :<br/>";
echo ClientManager::AddClient("Borel", "Jonathan", "jonathan.brljq@eduge.ch", "077 421 39 90");
