<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/inc.all.php';

//Test d'ajout d'opinion dans la base, texte simple.
echo "Test d'insert réspecant les normes.<br>";
if(OpinionManager::AddOpinion("Le service étais parfait, très satisfait")){
    echo "l'insert c'est bien passé.<br>";
}
echo "-<br>";
//Test d'ajout d'opinion dans la base, pas de texte.
echo "Test d'insert réspecant pas les normes, formulaire pas remplis.<br>";
if(OpinionManager::AddOpinion("")){
    echo "l'insert c'est bien passé.<br>";
}
else{
    echo "l'insert à pas fonctionné";
}
