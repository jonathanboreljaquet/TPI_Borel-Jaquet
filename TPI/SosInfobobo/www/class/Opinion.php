<?php
/*
  Projet: SOS INFOBOBO
  Description: Classe conteneur en référence à la table "avis".
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
 */
/**
 * @brief	Objet Opinion
 * @remark  Cet objet est utilisé comme conteneur en référence avec la table avis.
 * 
 *          Exemple d'utilisation 1
 *          $o = new Opinion();
 *          $o->id_opinion = 2;
 *          $o->date = "27/03/19";
 *          $o->comment = "Super réparation de Monsieur Borel-Jaquet, au top !";
 * 			$o->is_validate = FALSE;
 * 			$o->id_repairer = 1;
 * 
 * 
 *          Exemple d'utilisation 2
 *          $o = new Opinion(2, "27/03/19", "Super réparation de Monsieur Borel-Jaquet, au top !",FALSE,1);
 */
class Opinion
{
	/**
	 * @brief	Le Constructor appelé au moment de la création de l'objet ex: new Opinion();
	 * @param InId_opinion			L'identifant de l'avis. (Optionel) Defaut 0
	 * @param InDate				La date de l'avis. (Optionel) Defaut ""
	 * @param InComment	    		Le commentaire soumis par le client. (Optionel) Defaut ""
	 * @param InIs_validate	    	Variable indiquant si l'avis a été validé ou non. (Optionel) Defaut FALSE
	 * @param InId_repairer			L'identifiant du réparateur. (Optionel) Defaut 0
	  */
	public function __construct($InId_opinion = 0, $InDate = null, $InComment = "", $InIs_validate = FALSE, $InId_repairer = 0)
	{
		$this->id_opinion = $InId_opinion;
		$this->date = $InDate;
		$this->comment = $InComment;
		$this->is_validate = $InIs_validate;
		$this->id_repairer = $InId_repairer;
	}
	/**
	 * @var int L'identifant de l'avis
	 */
	public $id_opinion;
	/**
	 * @var string La date de l'avis
	 */
	public $date;
	/**
	 * @var string Le commentaire soumis par le client
	 */
	public $comment;
	/**
	 * @var bool Variable indiquant si l'avis a été validé ou non
	 */
	public $is_validate;
	/**
	 * @var int L'identifiant du réparateur
	 */
	public $id_repairer;
}
