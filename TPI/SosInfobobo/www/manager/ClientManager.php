<?php
/*
  Projet: SOS INFOBOBO
  Description: Classe ClientManager contenant les fonctions en rapport avec les informations personnelles du client,
               plus préciséement de la table "clients".
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
class ClientManager
{
    /**
     * Enregistre les informations dun client dans la base de données.
     *
     * @param string $firstName Le nom du client
     * @param string $secondName Le prénom du client
     * @param string $email L'email du client
     * @param string $phoneNumber Le numéro de téléphone du client
     *
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return string $last_id Retourne l'id du client précédemment créé
     */
    public static function AddClient($firstName, $secondName, $email, $phoneNumber)
    {
        $sql = "INSERT INTO `bj_tpi_bd`.`clients` (`nom`, `prenom`, `email`, `telephone`) 
                VALUES (:firstName, :secondName, :email, :phoneNumber) ;";
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
