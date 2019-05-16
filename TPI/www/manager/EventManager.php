<?php
class EventManager
{
    /**
     * Enregistre un événement et modifie le statut d'une demande dans la base de données.
     *
     * @param string $id_request L'identifiant de la demande
     * @param string $dateEvent La date de l'événement
     * @param string $typeEvent Le type d'événement
     * @param string $hourEvent L'heure de l'événement
     *
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return bool Retourne TRUE ou FALSE s'il y a un problème
     */
    public static function AddEvent($id_request, $dateEvent, $typeEvent, $hourEvent)
    {
        $sql = "INSERT INTO `bj_tpi_bd`.`evenement` (`id_demande`, `date`, `type`, `horaire`, `id_reparateur`) 
                VALUES (:id_request, :dateEvent, :typeEvent, :hourEvent, '1')";
        try {
            $pdo = Database::getInstance();
            $stmt = Database::prepare($sql);
            $pdo->beginTransaction();
            RequestManager::UpdateRequestStatusById($id_request, STATUS_IN_PROGRESS);
            $stmt->bindParam(':id_request', $id_request, PDO::PARAM_INT);
            $stmt->bindParam(':dateEvent', $dateEvent, PDO::PARAM_STR);
            $stmt->bindParam(':typeEvent', $typeEvent, PDO::PARAM_STR);
            $stmt->bindParam(':hourEvent', $hourEvent, PDO::PARAM_STR);
            $stmt->execute();
            $pdo->commit();
            return TRUE;
        } catch (Exception $e) {
            $pdo->rollBack();
            return FALSE;
        }
    }
    /**
     * Récupère tous les événements en format JSON destiné au calendrier JavaScript FullCalendar.
     *
     * @throws bool Retourne FALSE s'il y a un problème
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return string Retourne une chaine contenant la représentation JSON des événements ou FALSE s'il y a un problème
     */
    public static function GetAllEventFormatJSON()
    {
        $sql = "SELECT e.date,e.type,e.horaire,c.nom,c.prenom 
        FROM bj_tpi_bd.evenement as e,bj_tpi_bd.demandes as d,bj_tpi_bd.clients as c 
        WHERE d.id_demande=e.id_demande and c.id_client = d.id_client";
        $arrTypeEvent = array(
            EVENT_TYPE_GIVE => "Reddition",
            EVENT_TYPE_RETURN => "Récupération"
        );
        $arrAllEvent = array();

        try {
            $stmt = Database::prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $event) {
                $arrEvent = array(
                    "title" => $event["nom"] . " " . $event["prenom"] . " pour " . $arrTypeEvent[$event["type"]],
                    "start" => $event["date"] . "T" . $event["horaire"]
                );
                array_push($arrAllEvent, $arrEvent);
            }

            return json_encode($arrAllEvent);
        } catch (Exception $e) {
            return FALSE;
        }
    }
}
