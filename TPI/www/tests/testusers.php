<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/functions.php';


$results = GetAllUsers();
if ($results === false){
    echo 'Problème de récupération de tous les utilisateurs';
}
else{
    echo '<pre>';
    var_dump($results);
    echo '</pre>';

}


// Récupérer un user avec son email
$u = GetUserByEmail('dominique@aigroz.com');
if ($u === false){
    echo "Problème de récupération d'un utilisateur par email";
}
if ($u === null){
    echo "l'utilisateur n'est pas trouvé";
}
if ($u)
{
    echo '<pre>';
    var_dump($u);
    echo '</pre>';
}

// Un utilisateur qui n'existe pas
$u = GetUserByEmail('dominique1@aigroz.com');
if ($u === false){
    echo "Problème de récupération d'un utilisateur par email";
}
if ($u === null){
    echo "l'utilisateur dominique1@aigroz.com n'est pas trouvé ";
}
if ($u)
{
    echo '<pre>';
    var_dump($u);
    echo '</pre>';
}



// Ajouter un user
$u = new EUser('toto@gmail.com', 'Special', 'Toto Durand');
if (AddUser($u) === false){
    echo "Problème d'ajout d'un utilisateur";
}



// Modifier un user
$u->Name = "Tata Mère";
$u->Nickname = "Henry";
if (UpdateUser($u) === false){
    echo "Problème de mise à jour de l'utilisateur  toto@gmail.com";
}

?>