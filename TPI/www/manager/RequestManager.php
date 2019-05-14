<?php
class RequestManager
{

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
            return true;
        } catch (Exception $e) {
            $pdo->rollBack();
            return FALSE;
        }
    }
    public static function GetAllRequest()
    {
        $sql = "SELECT clients.id_client,demandes.id_demande, nom, prenom, email,telephone,description,statut
                FROM clients, demandes
                WHERE clients.id_client = demandes.id_client 
                ORDER BY statut";
        $arrRequest = array();
        try {
            $stmt = Database::prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $requestClient) {
                $arrClientRequest = array();
                $c = new Client();
                $c->id_client = $requestClient["id_client"];
                $c->firstName = $requestClient["nom"];
                $c->secondName = $requestClient["prenom"];
                $c->email = $requestClient["email"];
                $c->phoneNumber = $requestClient["telephone"];
                array_push($arrClientRequest, $c);

                $r = new Request();
                $r->id_request = $requestClient["id_demande"];
                $r->id_client = $requestClient["id_client"];
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
            return true;
        } catch (Exception $e) {
            return FALSE;
        }
    }
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
                $c->id_client = $requestClient["id_client"];
                $c->firstName = $requestClient["nom"];
                $c->secondName = $requestClient["prenom"];
                $c->email = $requestClient["email"];
                $c->phoneNumber = $requestClient["telephone"];
                array_push($arrClientRequest, $c);

                $r = new Request();
                $r->id_request = $requestClient["id_demande"];
                $r->id_client = $requestClient["id_client"];
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
}
