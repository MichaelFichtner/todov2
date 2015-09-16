<?php
/**
 * Created by PhpStorm.
 * User: preacher
 * Date: 16.09.15
 * Time: 15:27
 */

namespace todo;


class DateCheckController
{
    protected static $datum;
    protected static $res;
    protected static $match_us = "^(19|20)[0-9]{2}[.](0[1-9]|1[012])[.](0[1-9]|[12][0-9]|3[01])$^";
    protected static $match_de = "^(0[1-9]|[12][0-9]|3[01])[.](0[1-9]|1[012])[.](19|20)[0-9]{2}$^";


    public static function getDate($date)
    {
        self::$datum = $date;
        if(ctype_digit(str_replace(".","", $date))){
            if (strlen($date) == 10){
                return true;
            }else{
                ErrorController::setDaten("","");
                ErrorController::setError("min. 8 Zeichen");
                return false;
            }
        }else{
            ErrorController::setDaten("","");
            ErrorController::setError("Nur Zahlen erlaubt !");
            return false;
        }
    }

    public static function dateCheck($var)
    {
       //var_dump($var);
        if(preg_match(self::$match_de, $var)) {
            return "de";
        }elseif(preg_match(self::$match_us, $var)){
            return "us";
        }else{
            ErrorController::setDaten("","");
            ErrorController::setError("Bitte ein Korrektes Datum eingeben. (tt.mm.yyyy o. yyyy.mm.tt)");
            return false;
        }
    }

}