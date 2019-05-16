<?php
class StyleManager
{
    /**
     * Retourne la bonne couleur pour un statut
     * 
     * @param string $status Le statut choisit
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
     * Retourne le bon format d'une date récupéré en base
     *   
     * @param string $date La date à modifier
     * 
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
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
}
