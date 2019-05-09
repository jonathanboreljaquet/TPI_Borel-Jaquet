<?php
class AboutManager
{
    public static function GetAboutInformation()
    {
        $sql = "SELECT * FROM bj_tpi_bd.infos_dynamiques;";
        $arrAbout = array();
        try {
            $stmt = EDatabase::prepare($sql);
            $stmt->execute();
            $about = $stmt->fetch(PDO::FETCH_ASSOC);
            $a = new About();
            $a->phoneNumber = $about["telephone"];
            $a->email = $about["email"];
            $a->price = $about["tarif"];
            $a->description = $about["description"];

            return $a;
        } catch (Exception $e) {
            return FALSE;
        }
    }
}
