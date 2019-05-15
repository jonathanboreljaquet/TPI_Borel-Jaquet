<?php
/**
 * @brief	Objet Request
 * @remark  Cet objet est utilisé comme conteneur en référence avec la table demandes
 * 
 *          Exemple d'utilisation 1
 *          $r = new Request();
 *          $r->id_request = 2;
 *          $r->id_client = 4;
 *          $r->description = "Bonjour, mon ordinateur à fréquemment des écrans bleus, est-ce dans vos compétences ?";
 * 			$r->status = "OUVERTE";
 * 
 * 
 *          Exemple d'utilisation 2
 *          $r = new Request(1, 4, "Bonjour, mon ordinateur à...","OUVERTE");
 */
class Request
{
    /**
     * @brief	Le Constructor appelé au moment de la création de l'objet ex: new Request();
     * @param InId_request			L'identifant de la demande. (Optionel) Defaut 0
     * @param InId_client			L'identifiant du client. (Optionel) Defaut 0
     * @param InDescription	    	La description du problème. informatique. (Optionel) Defaut ""
     * @param InStatus	            Le statut de la demande. (Optionel) Defaut ""
     */
    public function __construct($InId_request = 0, $InId_client = 0, $InDescription = "", $InStatus = "")
    {
        $this->id_request = $InId_request;
        $this->id_client = $InId_client;
        $this->description = $InDescription;
        $this->status = $InStatus;
    }
    /**
     * @var int L'identifant de la demande
     */
    public $id_request;
    /**
     * @var int l'identifiant du client
     */
    public $id_client;
    /**
     * @var string La description du problème informatique
     */
    public $description;
    /**
     * @var string  Le statut de la demande
     */
    public $status;
}
