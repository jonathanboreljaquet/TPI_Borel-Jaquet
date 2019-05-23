<?php
/*
  Projet: SOS INFOBOBO
  Description: Classe StyleManager contenant les fonctions permettant de rendre le site plus esthétique et lisible.
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
class StyleManager
{
    /**
     * Retourne la bonne couleur pour un statut.
     * 
     * @param string $status Le statut choisi
     * 
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return string $color Retourne la couleur du statut
     */
    public static function ColorStatus($status)
    {
        $color = "";
        if ($status == STATUS_IN_PROGRESS) {
            $color = "yellow";
        }
        if ($status == STATUS_OPEN) {
            $color = "white";
        }
        if ($status == STATUS_PROCESSED) {
            $color = "green";
        }
        if ($status == STATUS_REFUSED) {
            $color = "red";
        }
        return $color;
    }
    /**
     * Retourne le bon format d'une date récupérée en base de données.
     *   
     * @param string $date La date à modifier
     * 
     * @author Projet ProVélo École Entreprise
     * @return string Retourne la date en format => 10 septembre 2019
     */
    public static function SqlDateToWritten($date)
    {

        $arrMonth = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "séptembre", "octobre", "novembre", "décembre");
        //On transforme les string en int pour retirer le 0 à l'avant (05 -> 5)
        $year = (int)explode('-', $date)[0];
        $month = (int)explode('-', $date)[1] - 1;
        $day = (int)explode('-', $date)[2];
        $day .= ($day < 2);
        return "$day $arrMonth[$month] $year";
    }
    /**
     * Affiche un message d'erreur ou de confirmation avec Bootstrap.
     *   
     * @param string $type Le type de message à afficher [success/danger]
     * @param string $message Le message à afficher
     * 
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return string une balise div d'alert avec Bootstrap
     */
    public static function ShowAlert($type, $message)
    {
        switch ($type) {
            case ALERT_TYPE_SUCCESS:
                echo "<div class='alert alert-success mb-0' role='alert'>" . $message . "</div>";
                break;
            case ALERT_TYPE_FAILED:
                echo "<div class='alert alert-danger mb-0' role='alert'>" . $message . "</div>";
                break;
            default:
                return false;
        }
    }
}
