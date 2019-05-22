<?php
/*
  Projet: SOS INFOBOBO
  Description: Classe AboutManager contenant les fonctions en rapport avec les informations personnelles du réparateur,
               plus préciséement de la table "infos_dynamiques".
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
class AboutManager
{
    /**
     * Récupère les informations personnelles du réparateur dans un objet About.
     * 
     * @throws bool Retourne false s'il y a un problème
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return About $a Retourne un objet About ou FALSE s'il y a un problème
     */
    public static function GetAboutInformation()
    {
        $sql = "SELECT id_infos_dynamiques,telephone,email,tarif,description 
                FROM bj_tpi_bd.infos_dynamiques;";
        try {
            $stmt = Database::prepare($sql);
            $stmt->execute();
            $about = $stmt->fetch(PDO::FETCH_ASSOC);
            $a = new About();
            $a->id_about = intval($about["id_infos_dynamiques"]);
            $a->phoneNumber = $about["telephone"];
            $a->email = $about["email"];
            $a->price = $about["tarif"];
            $a->description = $about["description"];

            return $a;
        } catch (Exception $e) {
            return FALSE;
        }
    }
    /**
     * Modifie les informations personnelles du réparateur.
     *
     * @param string $phoneNumber Le numéro de téléphone du réparateur
     * @param string $email L'email du réparateur
     * @param string $price Le tarif de la réparation
     * @param string $description La description du réparateur
     *
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return bool Retourne TRUE ou FALSE s'il y a un problème
     */
    public static function UpdateAboutInformation($phoneNumber, $email, $price, $description)
    {
        $sql = "UPDATE `bj_tpi_bd`.`infos_dynamiques` 
                SET `telephone` =:phoneNumber, `email` = :email, `tarif` = :price, `description` = :description 
                WHERE id_infos_dynamiques=1";
        try {
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':price', $price, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->execute();
            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }
}
