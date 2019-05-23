<?php
/*
  Projet: SOS INFOBOBO
  Description: Classe conteneur en référence à la table "clients".
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
 */
/**
 * @brief	Objet Client
 * @remark  Cet objet est utilisé comme conteneur en référence avec la table clients.
 * 
 *          Exemple d'utilisation 1
 *          $c = new Client();
 *          $c->id_client = 2;
 *          $c->firstName = "Coptère";
 *          $c->secondName = "Ellie";
 * 			$c->email = "elli.coptere@gmail.com";
 * 			$c->phoneNumber = "077 421 34 20";
 * 
 * 
 *          Exemple d'utilisation 2
 *          $c = new Client(2,"Coptère","Ellie","elli.coptere@gmail.com","077 421 34 20");
 */
class Client
{
	/**
	 * @brief	Le Constructor appelé au moment de la création de l'objet ex: new Client();
	 * @param InId_client	L'identifant du client. (Optionel) Defaut 0
	 * @param InFirstName   Le nom du client. (Optionel) Defaut ""
	 * @param InSecondName	Le prénom du client. (Optionel) Defaut ""
	 * @param InEmail	    L'email du client. (Optionel) Defaut ""
	 * @param InPhoneNumber	Le numéro de téléphone du client. (Optionel) Defaut ""
	  */
	public function __construct($InId_client = 0, $InFirstName = "", $InSecondName = "", $InEmail = "", $InPhoneNumber = "")
	{
		$this->id_client = $InId_client;
		$this->firstName = $InFirstName;
		$this->secondName = $InSecondName;
		$this->email = $InEmail;
		$this->phoneNumber = $InPhoneNumber;
	}
	/**
	 * @var int L'identifant du client
	 */
	public $id_client;
	/**
	 * @var string Le nom du client
	 */
	public $firstName;
	/**
	 * @var string Le prénom du client
	 */
	public $secondName;
	/**
	 * @var string L'email du client
	 */
	public $email;
	/**
	 * @var string Le numéro de téléphone du client
	 */
	public $phoneNumber;
}
