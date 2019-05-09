<?php
/**
 * @brief	Objet About
 * @remark  Cet objet est utilisé comme conteneur en référence avec la table infos_dynamiques
 * 
 *          Exemple d'utilisation 1
 *          $a = new About();
 *          $a->phoneNumber = "077 421 34 20";
 *          $a->email = "sos@infobobo.ch";
 *          $a->price = "50 - 100 CHF";
 * 			$a->descriptiom = "Bonjour, je m'appel Thierry Borel-Jaquet et je suis la solut..";
 * 			
 * 
 * 
 *          Exemple d'utilisation 2
 *          $a = new About("077 421 34 20","sos@infobobo.ch",50 - 100 CHF","Bonjour, je m'appel Thierry Borel-Jaquet et je suis la solut..");
 */
class About
{
    /**
     * @brief	Le Constructor appelé au moment de la création de l'objet ex: new About();
     * @param InPhoneNumber	  Le numéro de téléphone du réparateur. (Optionel) Defaut ""
     * @param InEmail         L'email du réparateur. (Optionel) Defaut ""
     * @param InPrice	      Le prix du potentiel service. (Optionel) Defaut ""
     * @param InDescription	  La description du réparateur et de ses services. (Optionel) Defaut ""
	  */
    public function __construct($InPhoneNumber = "", $InEmail = "", $InPrice = "", $InDescription = "")
    {
        $this->phoneNumber = $InPhoneNumber;
        $this->email = $InEmail;
        $this->price = $InPrice;
        $this->description = $InDescription;
    }
    /**
     * @var string Le numéro de téléphone du réprateur
     */
    public $phoneNumber;
    /**
     * @var string L'email du réparateur
     */
    public $email;
    /**
     * @var string Le prix du potentiel service
     */
    public $price;
    /**
     * @var string La description du réparateur et de ses services
     */
    public $description;
}
