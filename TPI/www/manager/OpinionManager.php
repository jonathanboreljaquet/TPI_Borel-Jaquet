<?php
class OpinionManager
{
    /**
     * Enregistre un avis non validé dans la base de données.
     *
     * @param string $comment Le commentaire de l'avis
     *
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return bool Retourne TRUE ou FALSE s'il y a un problème
     */
    public static function AddOpinion($comment)
    {
        $sql = "INSERT INTO `bj_tpi_bd`.`avis` (`date`, `comment`, `est_valide`, `id_reparateur`) 
                VALUES (:date, :comment, '0', '1')";
        try {
            if ($comment == "") {
                throw new Exception('aucun commentaire ');
            }
            $date = date("Y-m-d");
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
            $stmt->execute();
            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }
    /**
     * Récupère tous les avis validés de la base de données dans un tableau d'objet Opinion.
     *
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return array[Opinion] $arrOpinion Retourne un tableau d'objet Opinion ou FALSE s'il y a un problème
     */
    public static function GetOpinionValidate()
    {
        $sql = "SELECT id_avis,date,comment,est_valide,id_reparateur
                FROM bj_tpi_bd.avis 
                WHERE est_valide = 1 
                ORDER BY date DESC";
        $arrOpinion = array();
        try {
            $stmt = Database::prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $opinion) {
                $o = new Opinion();
                $o->id_opinion = intval($opinion["id_avis"]);
                $o->date = $opinion["date"];
                $o->comment = $opinion["comment"];
                $o->is_validate = boolval($opinion["est_valide"]);
                $o->id_repairer = intval($opinion["id_reparateur"]);
                array_push($arrOpinion, $o);
            }
            return $arrOpinion;
        } catch (Exception $e) {
            return FALSE;
        }
    }
    /**
     * Récupère tous les avis non validé de la base de données dans un tableau d'objet Opinion.
     *
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return array[Opinion] $arrOpinion Retourne un tableau d'objet Opinion ou FALSE s'il y a un problème
     */
    public static function GetOpinionNotValidate()
    {
        $sql = "SELECT id_avis,date,comment,est_valide,id_reparateur 
                FROM bj_tpi_bd.avis 
                WHERE est_valide = 0 
                ORDER BY date ASC";
        $arrOpinion = array();
        try {
            $stmt = Database::prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $opinion) {
                $o = new Opinion();
                $o->id_opinion =  intval($opinion["id_avis"]);
                $o->date = $opinion["date"];
                $o->comment = $opinion["comment"];
                $o->is_validate = boolval($opinion["est_valide"]);
                $o->id_repairer = intval($opinion["id_reparateur"]);
                array_push($arrOpinion, $o);
            }
            return $arrOpinion;
        } catch (Exception $e) {
            return FALSE;
        }
    }
    /**
     * Valide un avis dans la base de données.
     *
     * @param string $id_opinion L'identifiant de l'avis
     *
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return bool Retourne TRUE ou FALSE s'il y a un problème
     */
    public static function ValidateOpinionById($id_opinion)
    {
        $sql = "UPDATE `bj_tpi_bd`.`avis` 
                SET `est_valide` = '1' 
                WHERE (`id_avis` = :id_opinion)";
        try {
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':id_opinion', $id_opinion, PDO::PARAM_STR);
            $stmt->execute();
            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }
    /**
     * Supprime un avis dans la base de données.
     *
     * @param string $id_opinion L'identifiant de l'avis
     *
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return bool Retourne TRUE ou FALSE s'il y a un problème
     */
    public static function DeleteOpinionById($id_opinion)
    {
        $sql = "DELETE 
                FROM `bj_tpi_bd`.`avis` 
                WHERE (`id_avis` = :id_opinion);";
        try {
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':id_opinion', $id_opinion, PDO::PARAM_STR);
            $stmt->execute();
            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }
}
