<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

//Test d'ajout d'un client, tout en retournant son id fraichement créé.
echo "Test d'insert d'un client<br>";
echo "ID : <br>";
echo ClientManager::AddClient("Borel","Jonathan","jonathan.brljq@eduge.ch","077 421 39 90");
    echo "l'insert c'est bien passé.<br>";

