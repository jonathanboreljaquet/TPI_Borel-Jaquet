<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/functions.php';

// On construit le message de type html
$body = 
    '<html>' .
    ' <head></head>' .
    ' <body>'.
    '  <p>Un petit message envoyé avec Swift Mailer 5.</p>' .
    ' </body>' .
    '</html>';

// On envoie le message à deux personnes.
if (SendEmail('Petit test de message', $body, array('dominique.aigroz@edu.ge.ch', 'pascal.comminot@edu.ge.ch')) == false){
    echo "'Problème d'envoi d'email";
}

?>