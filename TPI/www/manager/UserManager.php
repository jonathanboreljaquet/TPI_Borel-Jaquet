<?php
class UserManager
{
    /**
     * Valide la connexion d'un réparateur au site web
     * 
     * @param string $pseudo Le pseudo du réparateur
     * @param string $pwd Le mot de passe du réparateur
     * 
     * @throws bool Retourne FALSE s'il y a un problème
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return bool Retourne TRUE si le pseudo et le mot de passe sont corrects
     */
    public static function Connection($pseudo, $pwd)
    {
        $sql = "SELECT mdp 
                FROM reparateur 
                WHERE pseudo=:pseudo and mdp=:mdp";
        $salt = "TPIBJ";
        $passwordSha1 = sha1($salt . $pwd);
        try {
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
            $stmt->bindParam(':mdp', $passwordSha1, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result == null) {
                return FALSE;
            }
            if ($passwordSha1 == $result["mdp"]) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $e) {
            return FALSE;
        }
    }
}
