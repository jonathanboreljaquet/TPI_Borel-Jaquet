<?php
/*
  Projet: SOS INFOBOBO
  Description: Classe RequestManager contenant les fonctions en rapport avec les demandes de réparation 
               informatiques créées par les clients, plus précisément de la table "demandes".
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
class RequestManager
{
    /**
     * Enregistre une demande de réparation informatique et le client l'ayant créé dans la base de données.
     *
     * @param string $firstName Le nom du client 
     * @param string $secondName Le prénom du client
     * @param string $email L'email du client
     * @param string $phoneNumber Le numéro de téléphone du client
     * @param string $description La description du problème informatique du client
     * 
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return bool Retourne TRUE ou FALSE s'il y a un problème
     */
    public static function AddRequest($firstName, $secondName, $email, $phoneNumber, $description)
    {
        $sql = "INSERT INTO `bj_tpi_bd`.`demandes` (`id_client`, `description`, `statut`) 
                VALUES (:id_client, :description, :statut);";
        $status = STATUS_OPEN;

        try {
            $pdo = Database::getInstance();
            $stmt = Database::prepare($sql);
            $pdo->beginTransaction();
            $id_client = ClientManager::AddClient($firstName, $secondName, $email, $phoneNumber);
            $stmt->bindParam(':id_client', $id_client, PDO::PARAM_INT);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':statut', $status, PDO::PARAM_STR);
            $stmt->execute();
            $pdo->commit();
            return TRUE;
        } catch (Exception $e) {
            $pdo->rollBack();
            return FALSE;
        }
    }
    /**
     * Récupère toutes les demandes de réparation informatique de la base de données.
     *
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return array[Client[],Request[]] $arrRequest Retourne un tableau contenant des tableaux d'objet Client et Request
     *                                    ou FALSE s'il y a un problème
     */
    public static function GetAllRequest()
    {
        $sql = "SELECT clients.id_client,demandes.id_demande, nom, prenom, email,telephone,description,statut
                FROM clients, demandes
                WHERE clients.id_client = demandes.id_client 
                ORDER BY statut ASC, id_demande DESC";
        $arrRequest = array();
        try {
            $stmt = Database::prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $requestClient) {
                $arrClientRequest = array();
                $c = new Client();
                $c->id_client = intval($requestClient["id_client"]);
                $c->firstName = $requestClient["nom"];
                $c->secondName = $requestClient["prenom"];
                $c->email = $requestClient["email"];
                $c->phoneNumber = $requestClient["telephone"];
                array_push($arrClientRequest, $c);
                $r = new Request();
                $r->id_request = intval($requestClient["id_demande"]);
                $r->id_client = intval($requestClient["id_client"]);
                $r->description = $requestClient["description"];
                $r->status = $requestClient["statut"];
                array_push($arrClientRequest, $r);
                array_push($arrRequest, $arrClientRequest);
            }
            return $arrRequest;
        } catch (Exception $e) {
            return FALSE;
        }
    }
    /**
     * Récupère une demande de réparation informatique avec les informations du client l'ayant créé 
     * de la base de données grâce à son identifiant.
     *
     * @param string $id_request L'identifiant de la demande
     * 
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return array[Client,Request] Retourne un tableau contenant un objet Client et Request
     *                               ou FALSE s'il y a un problème
     */
    public static function GetRequestById($id_request)
    {
        $sql = "SELECT clients.id_client,demandes.id_demande, nom, prenom, email,telephone,description,statut
                FROM clients, demandes
                WHERE clients.id_client = demandes.id_client and demandes.id_demande =:id_request ";
        $arrClientRequest = array();
        try {
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':id_request', $id_request, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $c = new Client();
            $c->id_client = intval($result["id_client"]);
            $c->firstName = $result["nom"];
            $c->secondName = $result["prenom"];
            $c->email = $result["email"];
            $c->phoneNumber = $result["telephone"];
            array_push($arrClientRequest, $c);
            $r = new Request();
            $r->id_request = intval($result["id_demande"]);
            $r->id_client = intval($result["id_client"]);
            $r->description = $result["description"];
            $r->status = $result["statut"];
            array_push($arrClientRequest, $r);
            return $arrClientRequest;
        } catch (Exception $e) {
            return FALSE;
        }
    }
    /**
     * Modifie le statut d'une demande de réparation informatique grâce à son identifiant.
     *
     * @param string $id_request L'identifiant de la demande
     * @param string $status Le nouveau statut de la demande
     * 
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return bool Retourne TRUE ou FALSE s'il y a un problème
     */
    public static function UpdateRequestStatusById($id_request, $status)
    {
        $sql = "UPDATE `bj_tpi_bd`.`demandes` 
                SET `statut` = :status 
                WHERE (`id_demande` = :id_request)";
        try {
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':id_request', $id_request, PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->execute();
            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }
    /**
     * Récupère toutes les demandes de réparation informatique de statut "Ouverte" de la base de données.
     *
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return array[Client,Request] $arrRequest Retourne un tableau d'objet Client et Request
     *                               ou FALSE s'il y a un problème
     */
    public static  function GetOpenRequest()
    {
        $sql = "SELECT clients.id_client,demandes.id_demande, nom, prenom, email,telephone,description,statut
                FROM clients, demandes
                WHERE clients.id_client = demandes.id_client
                AND demandes.statut = 'OUVERTE' ";
        $arrRequest = array();
        try {
            $stmt = Database::prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $requestClient) {
                $arrClientRequest = array();
                $c = new Client();
                $c->id_client = intval($requestClient["id_client"]);
                $c->firstName = $requestClient["nom"];
                $c->secondName = $requestClient["prenom"];
                $c->email = $requestClient["email"];
                $c->phoneNumber = $requestClient["telephone"];
                array_push($arrClientRequest, $c);

                $r = new Request();
                $r->id_request = intval($requestClient["id_demande"]);
                $r->id_client = intval($requestClient["id_client"]);
                $r->description = $requestClient["description"];
                $r->status = $requestClient["statut"];
                array_push($arrClientRequest, $r);
                array_push($arrRequest, $arrClientRequest);
            }
            return $arrRequest;
        } catch (Exception $e) {
            return FALSE;
        }
    }
    /**
     * Récupère toutes les demandes de réparation informatique de statut "Traitée" de la base de données triée par mois et par année.
     *
     * @param string $year L'année choisie
     * 
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return array $result Retourne un tableau associatif représentant le nombre de réparation 
     *                       effectué par mois dans une année ou FALSE s'il y a un problème
     */
    public static  function GetProcessedRequestOrderByMonthAndYear($year)
    {
        $sql = "SELECT MONTH( e.date_fin ) AS month, YEAR( e.date_fin ) AS year, COUNT( * ) as nbRequest
        FROM bj_tpi_bd.demandes as d, bj_tpi_bd.evenement as e
        WHERE d.id_demande = e.id_demande and d.statut ='TRAITEE' and YEAR( e.date_fin ) =:year
        GROUP BY year, month
        ORDER BY month ASC";
        try {
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':year', $year, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            return FALSE;
        }
    }
}
