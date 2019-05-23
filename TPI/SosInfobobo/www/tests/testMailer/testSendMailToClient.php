<?php
/*
  Projet: SOS INFOBOBO
  Description: Fichier de test de la fonction SendMailToClient du manager MailerManager
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';
$c = new Client();
$c->firstName = "Alfieri";
$c->secondName = "Elena";
$c->email = "muq47833@cndps.com";
$c->phoneNumber = "079 324 32 12";
$d = new Request();
$d->description = "Mon ordinateur ne fonctionne plus, pouvez-vous m'aider ?";
echo "Test d'envoi d'un email au client contenant les informations de sa demande de réparation informatique
      ainsi que son nouveau statut.<br/>";
echo "Résultat :<br/>";
if (MailerManager::SendMailToClient(STATUS_IN_PROGRESS, $c, $d)) {
  echo "L'envoie du mail a bien fonctionné.";
} else {
  echo "L'envoie du mail n'a pas bien fonctionné.";
}
