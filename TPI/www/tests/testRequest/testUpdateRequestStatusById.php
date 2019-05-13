<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

//Test de modification du champs statut de la table demandes.
echo "Test d'update du champ statut de la table demandes en donnant l'id et le nouveau statut</br>";

if(RequestManager::UpdateRequestStatusById(2,"REFUSEE"))
{
    echo "L'update à bien été faite</br>";
}
else{
    echo "L'update à pas été faite";
}

