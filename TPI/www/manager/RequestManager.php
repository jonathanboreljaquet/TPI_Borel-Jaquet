<?php
class RequestManager
{
    /**
     * Enregistre une demande de réparation et un client dans la base de données.
     *
     * @param string $firstName Le nom du client 
     * @param string $secondName Le prénom du client
     * @param string $email L'email du client
     * @param string $phoneNumber Le numéro de téléphonme du client
     * @param string $description La description de la demande de réparation
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
     * Récupère toutes les demandes de réparation de la base de données.
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
                ORDER BY statut ASC";
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
     * Modifie le statut d'une demande de réparation.
     *
     * @param string $id_request L'id de la demande
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
     * Récupère toutes les demandes de réparation de statut "ouverte" de la base de données.
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
     * Récupère les demandes de statut "traitée" de la base de données triée par mois et par année.
     *
     * @param string $year L'année à afficher
     * 
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return array $result Retourne un tableau associatif représentant le nombre de réparation 
     *                       effectué par mois dans une année ou FALSE s'il y a un problème
     */
    public static  function GetProcessedRequestOrderByMonthAndYear($year)
    {
        $sql = "SELECT MONTH( e.date ) AS month, YEAR( e.date ) AS year, COUNT( * ) as nbRequest
                FROM bj_tpi_bd.demandes as d, bj_tpi_bd.evenement as e
                WHERE d.id_demande = e.id_demande and d.statut ='TRAITEE' and YEAR( e.date ) =:year
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
