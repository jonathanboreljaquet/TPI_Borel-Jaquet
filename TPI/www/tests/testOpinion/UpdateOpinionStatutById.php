<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

//Test de modification du statut de validation d'un avis
echo "Test pour valider un avis<br>";
if (OpinionManager::UpdateOpinionStatutById(19)) {
    echo "L'opinion a bien été validé";
} else {
    echo "L'opinion n'a pas bien été validé";
}
echo "-<br>";
