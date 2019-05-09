<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/inc.all.php';

echo "Test de connexion réussi.<br>";
if(UserManager::Connection("infobobo","qwert")){
    echo "Le login a bien fonctionné<br>";
}

echo "-<br>";
echo "Test de connexion echoué, pseudo eronné.<br>";
if(!UserManager::Connection("infoboboFALSE","qwert")){
    echo "Login ou mot de passe eronné<br>";
}
echo "-<br>";
echo "Test de connexion echoué, mot de passe eronné.<br>";
if(!UserManager::Connection("infobobo","qwertFALSE")){
    echo "Login ou mot de passe eronné<br>";
}

?>