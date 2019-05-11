<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

//Test transaction, création client puis création d'une demande
echo "Test transaction, insert client puis insert demande.<br>";
if (RequestManager::AddRequest("Ackermann", "Gawen", "gawen@gmail.com", "078 323 23 21", "Mon pc ne s'allume plus")) {
    echo "L'insertion du client et de la demande à bien fonctionner";
}
