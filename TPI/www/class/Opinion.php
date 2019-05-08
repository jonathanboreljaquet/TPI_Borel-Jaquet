<?php
/**
 * @brief	Objet Opinion
 * @remark  Cet objet est utilisé comme conteneur en référence avec la table Avis
 * 
 *          Exemple d'utilisation 1
 *          $o = new Opinion();
 *          $o->id_avis = "2";
 *          $o->date = "27/03/19";
 *          $o->comment = "Bonjour, mon ordinateur à fréquemment des écrans bleus, est-ce dans vos compétences ?";
 * 			$o->est_valide = "FALSE";
 * 			$o->id_reparateur = "1";
 * 
 * 
 *          Exemple d'utilisation 2
 *          $o = new Opinion("2", "27/03/19", "Bonjour\, mon ordinateur à...",FALSE,1);
 */
class Opinion
{
	/**
	 * @brief	Le Constructor appelé au moment de la création de l'objet ex: new Opinion();
	 * @param InId_avis			L'identifant de l'avis. (Optionel) Defaut 0
	 * @param InDate			La date de l'avis. (Optionel) Defaut null
	 * @param InComment	    	Le commentaire soumit par le client. (Optionel) Defaut ""
	 * @param InEst_valide	    Variable indiquant si l'avis à été validé ou non (Optionel) Defaut FALSE
	 * @param InId_reparateur	L'identifiant du réparateur. (Optionel) Defaut 0
	  */
	public function __construct($InId_avis = 0, $InDate = null, $InComment = "", $InEst_valide = FALSE, $InId_reparateur = 0)
	{
		$this->id_avis = $InId_avis;
		$this->date = $InDate;
		$this->comment = $InComment;
		$this->est_valide = $InEst_valide;
		$this->id_reparateur = $InId_reparateur;
	}
	/**
	 * @var int L'identifant de l'avis
	 */
	public $id_avis;
	/**
	 * @var DateTime La date de l'avis
	 */
	public $date;
	/**
	 * @var string Le commentaire soumit par le client
	 */
	public $comment;
	/**
	 * @var bool Variable indiquant si l'avis à été validé ou non
	 */
	public $est_valide;
	/**
	 * @var int L'identifiant du réparateur
	 */
	public $id_reparateur;
}
