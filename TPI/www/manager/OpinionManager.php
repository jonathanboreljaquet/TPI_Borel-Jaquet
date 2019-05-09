<?php
class OpinionManager
{
    public static function AddOpinion($comment)
    {
        $sql = "INSERT INTO `bj_tpi_bd`.`avis` (`date`, `comment`, `est_valide`, `id_reparateur`) VALUES (:date, :comment, '0', '1')";
        try {
            if ($comment == "") {
                throw new Exception('aucun commentaire ');
            }
            $date = date("Y-m-d");
            $stmt = EDatabase::prepare($sql);
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return FALSE;
        }
    }
    public static function GetOpinionValidate()
    {
        $sql = "SELECT * FROM bj_tpi_bd.avis where est_valide = 1";
        $arrOpinion = array();
        try {
            $stmt = EDatabase::prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $opinion) {
                $o = new Opinion();
                $o->id_avis = $opinion["id_avis"];
                $o->date = $opinion["date"];
                $o->comment = $opinion["comment"];
                $o->est_valide = $opinion["est_valide"];
                $o->id_reparateur = $opinion["id_reparateur"];
                array_push($arrOpinion, $o);
            }
            return $arrOpinion;
        } catch (Exception $e) {
            return FALSE;
        }
    }
}
