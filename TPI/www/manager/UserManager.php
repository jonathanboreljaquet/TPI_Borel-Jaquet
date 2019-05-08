<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/db/database.php';
class UserManager
{
    public static function Connection($pseudo, $pwd)
    {
        $sql = "SELECT mdp FROM reparateur where pseudo=:pseudo";
        $salt = "TPIBJ";
        try {
            $stmt = EDatabase::prepare($sql);
            $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $passwordSha1 = sha1($salt . $pwd);
            if ($result==null){
                return FALSE;
            }
            if ($passwordSha1 == $result[0]["mdp"]) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $e) {
            echo "PDOException Error: " . $e->getMessage();
            return FALSE;
        }
    }
}
