<?php
class ClientManager
{
    public static function AddClient($firstName, $secondName, $email, $phoneNumber)
    {
        $sql = "INSERT INTO `bj_tpi_bd`.`clients` (`nom`, `prenom`, `email`, `telephone`) VALUES (:firstName, :secondName, :email, :phoneNumber);";
        $pdo = Database::getInstance();
        $stmt = Database::prepare($sql);
        $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $stmt->bindParam(':secondName', $secondName, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
        $stmt->execute();
        $last_id = $pdo->lastInsertId();
        return $last_id;
    }
}
