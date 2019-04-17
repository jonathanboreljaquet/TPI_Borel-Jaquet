<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/db/database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/EUser.php';
// Pour les emails
require_once $_SERVER['DOCUMENT_ROOT'].'/config/mailparam.php';
// Inclure le fichier swift_required.php localisé dans le répertoire swiftmailer5
require_once $_SERVER['DOCUMENT_ROOT'].'/swiftmailer5/lib/swift_required.php';

/**
 * @brief Retourne le tableau des utilisateurs de type EUser
 * @return [array of EUser] Le tableau de EUser
 */
function GetAllUsers()
{
	// On crée un tableau qui va contenir les objets EUser
	$arr = array();

    $s = "SELECT `EMAIL`, `NICKNAME`, `NAME` FROM `USERS`";
	$statement = EDatabase::prepare($s,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	try {
		$statement->execute();
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}
	// On parcoure les enregistrements 
	while ($row=$statement->fetch(PDO::FETCH_ASSOC,PDO::FETCH_ORI_NEXT)){
		// On crée l'objet EUser en l'initialisant avec les données provenant
		// de la base de données
		$u = new EUser($row['EMAIL'], $row['NICKNAME'], $row['NAME']);
		// On place l'objet EUser créé dans le tableau
		array_push($arr, $u);
	}        
	// On retourne le tableau contenant les utilisateurs sous forme EUser
	return $arr;
}


/**
 * @brief Retourne un utilisateur en fonction de son email
 * @param string email L'email de l'utilisateur qu'on recherche
 * @return [EUser] L'utilisateur de type EUser.
 * 				   false si une erreur est survenue.
 * 				   null si l'utilisateur est pas trouvé
 */
function GetUserByEmail($email)
{
	// On initialize le retourn à null
	$u = null;

    $s = "SELECT `EMAIL`, `NICKNAME`, `NAME` FROM `USERS` WHERE `EMAIL` = :e";
	$statement = EDatabase::prepare($s,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	try {
		$statement->execute(array(':e' => $email));
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}
	// On récupère le premier enregistrement
	if ($row=$statement->fetch(PDO::FETCH_ASSOC,PDO::FETCH_ORI_NEXT)){
		// On crée l'objet EUser en l'initialisant avec les données provenant
		// de la base de données
		$u = new EUser($row['EMAIL'], $row['NICKNAME'], $row['NAME']);
	}        
	// On retourne l'utilisateur sous forme EUser
	return $u;
}


/**
 * @brief Ajoute un utilisateur 
 * @param [EUser] L'objet EUser qu'on doit insérer dans la base
 * @return  boolean True ok, false si une erreur est survenue.
 */
function AddUser($u)
{
    $s = "INSERT INTO `USERS` (`EMAIL`, `NICKNAME`, `NAME`) VALUES(:e, :n, :m)";
	$statement = EDatabase::prepare($s);
	try {
		$statement->execute(array(':e' => $u->Email,
								  ':n' => $u->Nickname,
								  ':m' => $u->Name));
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}
	// Ok
	return true;
}



/**
 * @brief Modifie un utilisateur 
 * @param [EUser] L'objet EUser qu'on doit modifier dans la base
 * @return  boolean True ok, false si une erreur est survenue.
 */
function UpdateUser($u)
{
    $s = "UPDATE `USERS` SET `NICKNAME`=:n, `NAME`=:m WHERE `EMAIL` = :e";
	$statement = EDatabase::prepare($s);
	try {
		$statement->execute(array(':e' => $u->Email,
								  ':n' => $u->Nickname,
								  ':m' => $u->Name));
	}
	catch (PDOException $e) {
        echo 'Problème de mise à jour dans la base de données: '.$e->getMessage();
		return false;
	}
	// Ok
	return true;
}

/**
 * Envoyer un email
 * @param string title Le titre du message
 * @param string msg Le corps du message
 * @param [array of string] Un tableau de destinataires
 * @param string type Le type de message. (Optionel) Défaut "text/html"
 * @return boolean True message envoyé, False problème.
 */
function SendEmail($title, $msg, $persons, $type="text/html")
{
	// On doit créer une instance de transport smtp avec les constantes
	// définies dans le fichier mailparam.php
	$transport = Swift_SmtpTransport::newInstance(EMAIL_SERVER, EMAIL_PORT, EMAIL_TRANS)
	->setUsername(EMAIL_USERNAME)
	->setPassword(EMAIL_PASSWORD);

	try {
		// On crée un nouvelle instance de mail en utilisant le transport créé précédemment
		$mailer = Swift_Mailer::newInstance($transport);
		// On crée un nouveau message
		$message = Swift_Message::newInstance();
		// Le sujet du message
		$message->setSubject($title);
		// Qui envoie le message 
		$message->setFrom(array('email@mon compte' => 'Nom que vous voulez voir apparaître'));
		// A qui on envoie le message
		$message->setTo($persons);
	
		// On assigne le message et on dit de quel type.
		$message->setBody($msg,$type);
		// Maintenant il suffit d'envoyer le message
		$result = $mailer->send($message);
	
	} catch (Swift_TransportException $e) {
		echo "Problème d'envoi de message: ".$e->getMessage();
		return false;
	}
	// Ok
	return true;
}
?>
