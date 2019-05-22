<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

//Test d'insertion d'un événement
echo "Test insert dans la table événement.<br>";
if (EventManager::AddEvent(2,"2019-05-07","REDD","02:00")) {
    echo "L'insertion de l'événement à bien fonctionner";
}
else{
    echo "L'insert n'a pas fonctionné";
}
