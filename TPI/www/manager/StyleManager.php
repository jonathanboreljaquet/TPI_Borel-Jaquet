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
}
