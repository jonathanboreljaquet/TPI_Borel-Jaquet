<?php
/*
  Projet: SOS INFOBOBO
  Description: Classe EventManager contenant les fonctions en rapport avec les rendez-vous créées,
               plus préciséement de la table "evenement".
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
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
    public static function AddEvent($id_request, $dateEventStart, $dateEventEnd)
    {
        $sql = "INSERT INTO `bj_tpi_bd`.`evenement` (`id_demande`, `date_debut`, `date_fin`, `id_reparateur`) 
                VALUES (:id_request, :dateEventStart, :dateEventEnd, 1)";

        try {
            $pdo = Database::getInstance();
            $stmt = Database::prepare($sql);
            $pdo->beginTransaction();
            RequestManager::UpdateRequestStatusById($id_request, STATUS_IN_PROGRESS);
            $stmt->bindParam(':id_request', $id_request, PDO::PARAM_INT);
            $stmt->bindParam(':dateEventStart', $dateEventStart, PDO::PARAM_STR);
            $stmt->bindParam(':dateEventEnd', $dateEventEnd, PDO::PARAM_STR);
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
        $sql = "SELECT e.date_debut,e.date_fin,c.nom,c.prenom 
                FROM bj_tpi_bd.evenement as e,bj_tpi_bd.demandes as d,bj_tpi_bd.clients as c 
                WHERE d.id_demande=e.id_demande and c.id_client = d.id_client";
        $arrAllEvent = array();

        try {
            $stmt = Database::prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $event) {
                $arrEvent = array(
                    "title" => $event["nom"] . " " . $event["prenom"],
                    "start" => $event["date_debut"],
                    "end" => $event["date_fin"]
                );
                array_push($arrAllEvent, $arrEvent);
            }

            return json_encode($arrAllEvent);
        } catch (Exception $e) {
            return FALSE;
        }
    }
}
