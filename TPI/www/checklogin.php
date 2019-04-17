<?php
// Initialisation des variables
$user = "";
$pswd = "";
// Récupération du contenu des champs passés en paramètres
if (isset($_POST['username']))
    $user = $_POST['username'];
if (isset($_POST['password']))
    $pswd = $_POST['password'];
// Validation des données avec base de données ou autre
if ($user == "toto" && $pswd == "titi")
    // si c'est valide 
    echo '{ "ReturnCode": 1, "Message": "Nom et mot de passe correspondent."}';
else
    // si c'est invalide on renvoie le code d'erreur et le message d'erreur
    echo '{ "ReturnCode": 0, "Message": "Nom et/ou mot de passe invalide."}';
?>
 
