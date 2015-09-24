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
    protected static $date;
    protected static $todo;
    protected static $res;
    protected static $match_us = "^(19|20)[0-9]{2}[.](0[1-9]|1[012])[.](0[1-9]|[12][0-9]|3[01])$^";
    protected static $match_de = "^(0[1-9]|[12][0-9]|3[01])[.](0[1-9]|1[012])[.](19|20)[0-9]{2}$^";


    /**
     * @param $date
     * @param $todo zur Fehlererzeugung
     * @return bool|string
     */
    public static function getDate($date, $todo)
    {
        self::$date = $date;
        self::$todo = $todo;
        if(ctype_digit(str_replace(".","", $date))){ // nummerisch ?
            if (strlen($date) == 10){               // anzahl zeichen = 10
                return self::dateCheck(self::$date);       // test auf Datum Format
            }else{
                ErrorController::setDaten(2, $todo);
                ErrorController::setError("min. 8 Zeichen");
                return false;
            }
        }else{
            //
            ErrorController::setDaten(2, $todo);
            ErrorController::setError("Nur Zahlen erlaubt !");
            return false;
        }
    }

    /**
     * @param $date
     * @return bool|string
     */
    public static function dateCheck($date)
    {

        if(preg_match(self::$match_de, $date)) {
            $dateCheck = new \DateTime($date);
            $date = $dateCheck->format('Y-m-d');
            return $date;
        }elseif(preg_match(self::$match_us, $date)){
            return $date;
        }else{
            ErrorController::setDaten(2, self::$todo);
            ErrorController::setError("Bitte ein Korrektes Datum eingeben. (tt.mm.yyyy o. yyyy.mm.tt)");
            return false;
        }
    }

}