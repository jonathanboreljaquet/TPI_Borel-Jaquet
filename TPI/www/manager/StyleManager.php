<?php
class StyleManager
{
    public static function ColorStatus($status)
    {
        if($status==STATUS_IN_PROGRESS){
            return "yellow";
        }
        if($status==STATUS_OPEN){
            return "white";
        }
        if($status==STATUS_PROCESSED){
            return "green";
        }
        if($status==STATUS_REFUSED){
            return "red";
        }
    }
}
