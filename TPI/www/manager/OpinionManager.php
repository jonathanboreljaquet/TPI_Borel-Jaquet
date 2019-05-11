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
            $stmt = Database::prepare($sql);
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
        $sql = "SELECT * FROM bj_tpi_bd.avis where est_valide = 1 order by date";
        $arrOpinion = array();
        try {
            $stmt = Database::prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $opinion) {
                $o = new Opinion();
                $o->id_opinion = $opinion["id_avis"];
                $o->date = $opinion["date"];
                $o->comment = $opinion["comment"];
                $o->is_validate = $opinion["est_valide"];
                $o->id_repairer = $opinion["id_reparateur"];
                array_push($arrOpinion, $o);
            }
            return $arrOpinion;
        } catch (Exception $e) {
            return FALSE;
        }
    }
    public static function GetOpinionNotValidate()
    {
        $sql = "SELECT * FROM bj_tpi_bd.avis where est_valide = 0 order by date";
        $arrOpinion = array();
        try {
            $stmt = Database::prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $opinion) {
                $o = new Opinion();
                $o->id_opinion = $opinion["id_avis"];
                $o->date = $opinion["date"];
                $o->comment = $opinion["comment"];
                $o->is_validate = $opinion["est_valide"];
                $o->id_repairer = $opinion["id_reparateur"];
                array_push($arrOpinion, $o);
            }
            return $arrOpinion;
        } catch (Exception $e) {
            return FALSE;
        }
    }
    public static function UpdateOpinionStatutById($id_opinion)
    {
        $sql = "UPDATE `bj_tpi_bd`.`avis` SET `est_valide` = '1' WHERE (`id_avis` = :id_opinion)";
        try {
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':id_opinion', $id_opinion, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return FALSE;
        }
    }
    public static function DeleteOpinionById($id_opinion)
    {
        $sql = "DELETE FROM `bj_tpi_bd`.`avis` WHERE (`id_avis` = :id_opinion);";
        try {
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':id_opinion', $id_opinion, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return FALSE;
        }
    }
}
