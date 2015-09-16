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

    private $datum;
    private $match_us = "^(19|20)[0-9]{2}[.](0[1-9]|1[012])[.](0[1-9]|[12][0-9]|3[01])$";
    private $match_de = "^(0[1-9]|[12][0-9]|3[01])[.](0[1-9]|1[012])[.](19|20)[0-9]{2}$";

    public function __construct($date)
    {
        if(ctype_digit(str_replace(".","", $date)))
        {
            $this->datum = $date;
        }
        else{
            var_dump("Fehler");
        }
    }


}