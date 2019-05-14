<?php
class EventManager
{
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
            return true;
        } catch (Exception $e) {
            $pdo->rollBack();
            return FALSE;
        }
    }
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
                    "start" => $event["date"] ."T". $event["horaire"]
                );
                array_push($arrAllEvent, $arrEvent);
            }

            return json_encode($arrAllEvent);
        } catch (Exception $e) {
            return FALSE;
        }
    }

    /*
var data = [{
                "title": "Conference",
                "start": "2019-05-11",
                "end": "2019-05-13"
            },
            {
                "title": "Meeting",
                "start": "2019-05-14T06:30"
            },
        ]

    */
}
