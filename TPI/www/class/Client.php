<?php
/**
 * @brief	Objet Client
 * @remark  Cet objet est utilisé comme conteneur en référence avec la table Clients
 * 
 *          Exemple d'utilisation 1
 *          $c = new Client();
 *          $c->id_client = "2";
 *          $c->nom = "Coptère";
 *          $c->prenom = "Ellie";
 * 			$c->email = "elli.coptere@gmail.com";
 * 			$c->telephone = "077 421 34 20";
 * 
 * 
 *          Exemple d'utilisation 2
 *          $c = new Client(2,"Coptère","Ellie","elli.coptere@gmail.com",077 421 34 20);
 */
class Client
{
	/**
	 * @brief	Le Constructor appelé au moment de la création de l'objet ex: new Client();
	 * @param InId_client	L'identifant du client. (Optionel) Defaut 0
	 * @param InNom			Le nom du client. (Optionel) Defaut ""
	 * @param InPrenom	    Le prenom du client. (Optionel) Defaut ""
	 * @param InEmail	    L'email du client. (Optionel) Defaut ""
	 * @param InTelephone	Le numéro de téléphone du client. (Optionel) Defaut ""
	  */
	public function __construct($InId_client = 0, $InNom = "", $InPrenom = "", $InEmail = "", $InTelephone = "")
	{
		$this->id_client = $InId_client;
		$this->nom = $InNom;
		$this->prenom = $InPrenom;
		$this->email = $InEmail;
		$this->telephone = $InTelephone;
	}
	/**
	 * @var int L'identifant du client
	 */
	public $id_client;
	/**
	 * @var string Le nom du client
	 */
	public $nom;
	/**
	 * @var string Le prenom du client
	 */
	public $prenom;
	/**
	 * @var string L'email du client
	 */
	public $email;
	/**
	 * @var string Le numéro de téléphone du client
	 */
	public $telephone;
}
