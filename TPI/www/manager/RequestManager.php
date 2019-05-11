<?php
class RequestManager
{
    public static function AddRequest($firstName, $secondName, $email, $phoneNumber, $description)
    {
        $sql = "INSERT INTO `bj_tpi_bd`.`demandes` (`id_client`, `description`, `statut`) VALUES (:idClient, :description, :statut);";
        $statut = "OUVERTE";
        try {
            $pdo = Database::getInstance();
            $stmt = Database::prepare($sql);
            $pdo->beginTransaction();
            $idClient = ClientManager::AddClient($firstName, $secondName, $email, $phoneNumber);
            $stmt->bindParam(':idClient', $idClient, PDO::PARAM_INT);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':statut', $statut, PDO::PARAM_STR);
            $stmt->execute();
            $pdo->commit();
            return true;
        } catch (Exception $e) {
            $pdo->rollBack();
            return FALSE;
        }
    }
}
