<?php
/**
 * Created by PhpStorm.
 * User: preacher
 * Date: 13.09.15
 * Time: 20:54
 */

namespace todo;


class ErrorController
{

    protected static $daten = '';
    protected static $error = '';

    /**
     * @return mixed
     */
    public static function getDaten()
    {
        return self::$daten;
    }

    /**
     * @param mixed $daten
     */
    public static function setDaten($ident, $daten)
    {
        self::$daten[] = $ident;
        self::$daten[] = $daten;
    }

    /**
     * @return mixed
     */
    public static function getError()
    {
        return self::$error;
    }

    /**
     * @param mixed $error
     */
    public static function setError($error)
    {
        self::$error = $error;
    }


}