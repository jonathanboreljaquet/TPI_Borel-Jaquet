<?php
/*
  Projet: SOS INFOBOBO
  Description: Fichier de test de la fonction SendMailToRepairer du manager MailerManager
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';
$contactFirstName = "Alfieri";
$contactSecondName = "Elena";
$contactEmail = "elena.alfieri@gmail.com";
$contactPhoneNumber = "079 324 32 12";
$contactDescription = "Mon ordinateur ne fonctionne plus, pouvez-vous m'aider ?";
echo "Test d'envoi d'un email au réparateur contenant les informations de la demande de réparation informatique d'un client.<br/>";
echo "Résultat :<br/>";
if (MailerManager::SendMailToRepairer($contactFirstName, $contactSecondName, $contactEmail, $contactPhoneNumber, $contactDescription)) {
  echo "L'envoie du mail a bien fonctionné.";
} else {
  echo "L'envoie du mail n'a pas bien fonctionné.";
}
