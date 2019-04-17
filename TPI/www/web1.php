<?php
// Initialisation des variables
$user = "";
$pswd = "";
// ContrÃ´ler si le bouton login a Ã©tÃ© cliquÃ©
if (isset($_POST['send']))
{
    // RÃ©cupÃ¨re le contenu de mes champs de saisie
        if (isset($_POST['username']))
           $user = $_POST['username'];
        if (isset($_POST['pswd']))
           $pswd = $_POST['pswd'];
        // Validation des donnÃ©es avec base de donnÃ©es ou autre
        if ($user == "toto" && $pswd == "titi")
            header("Location: info.php");
        // si câ€™est valide appelle une autre page
        else
        // si câ€™est invalide on affiche un message dâ€™erreur
            echo "Utilisateur ou Mot de passe invalide";
}
?>
 
<form name="login" action="web1.php" method="post">
<span>Nom d'utilisateur: </span><input type="text" name="username" value="<?php echo $user;?>"/>
<br/>
<span>Mot de passe: </span><input type="password" name="pswd" />
<input type="submit" name="send" value="Login" />
</form>