<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

//Test de la modification des informations personnels.
echo "Test d'update de la table Avis</br>";

if(AboutManager::UpdateAboutInformation("077 456 23 32","sos@infobobo.ch","50 - 100 CHF","Bonjour je m'appel Thierry et je suis le réparateur informatique !"))
{
    echo "L'update à bien été faite</br>";
}
else{
    echo "L'update à pas été faite";
}

