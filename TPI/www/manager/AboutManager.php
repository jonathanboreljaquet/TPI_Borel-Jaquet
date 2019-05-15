<?php
class AboutManager
{
    public static function GetAboutInformation()
    {
        $sql = "SELECT id_infos_dynamiques,telephone,email,tarif,description 
                FROM bj_tpi_bd.infos_dynamiques;";
        $arrAbout = array();
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
