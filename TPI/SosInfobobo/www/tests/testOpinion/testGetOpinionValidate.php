<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

//Test de récuparation d'un ou plusieurs objet Opinion créé en référence avec la base de données.
echo "Test de sélection de tout les avis validé";
$arrOpinion = OpinionManager::GetOpinionValidate();
var_dump($arrOpinion);
echo "-<br>";
