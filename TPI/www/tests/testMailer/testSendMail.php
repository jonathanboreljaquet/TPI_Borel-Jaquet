<!DOCTYPE html>
<?php
/**
 * @remark Mettre le bon chemin d'accès à votre fichier contenant les constantes
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

?>
<html>
<!-- Cet exemple démontre comment envoyer un email avec SwiftMailer 5

     Le fichier contenant les paramètres d'envoi d'email doit être 
     mis à jour avec les données du serveur et du compte utilisé
     pour envoyer des emails.

     Il faut impérativement activer ssl dans le fichier php.ini
     Retrouver la ligne 
     ;extension=openssl
     et décommenter
     extension=openssl

     Redémarrer le serveur apache
-->

<head>
    <meta charset="utf-8">
    <title>Mailing - Sample</title>
</head>

<body>
    <?php MailerManager::SendMail("jonathan.brljq@eduge.ch", "Changement de statut de votre demande", "Votre demande de réparation informatique vient d'être changé en -> Ouverte"); ?>
</body>

</html>