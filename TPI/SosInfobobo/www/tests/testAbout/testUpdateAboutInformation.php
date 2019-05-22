<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';

//Test de la modification des informations personnelles du réparateur.
echo "Test d'update de la table infos_dynamiques</br>";

if(AboutManager::UpdateAboutInformation("077 456 23 32","sos@infobobo.ch","50 - 100 CHF","Bonjour je m'appel Thierry et je suis réparateur informatique !"))
{
    echo "L'update à bien été faite</br>";
}
else{
    echo "L'update à pas été faite";
}

