<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

//Test de suppression d'un avis avec son Id
echo "Test pour supprimer un avis<br>";
if (OpinionManager::DeleteOpinionById(23)) {
    echo "L'opinion a bien été supprimé";
} else {
    echo "L'opinion n'a pas été supprimé";
}
echo "-<br>";
