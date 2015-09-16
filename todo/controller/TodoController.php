<?php

namespace todo;

class TodoController {

    public $eins;

    public function summe($eins)
    {
        $this->eins = $eins;

        return $this->eins;
    }

    public function wasda()
    {
        $zahl = $this->eins;
        $zahl2 = 12;

        return $zahl+$zahl2;
    }

    public static function getDaten()
    {

        $dbConnect = new todo();

        $daten = $dbConnect->getdata();

        return $daten;
    }

    public static function saveDaten($todo, $datum)
    {
        if ($test = !DateCheckController::getDate($datum))
        {
            $daten = false;
            return $daten;
        }else{
            if(!empty($todo) && !empty($datum)) {

                $dbConnect = new todo();

                $daten = $dbConnect->saveData($todo, $datum);

            }else{
                if(empty($todo)){
                    ErrorController::setDaten(1, "$datum");
                    ErrorController::setError("Was soll ich für Dich merken ?");
                    $daten = false;
                }elseif(empty($datum)){
                    ErrorController::setDaten(2, $todo);
                    ErrorController::setError("Bitte ein Datum eingeben");
                    $daten = false;
                }
            }
        }
        return $daten;
    }

    public static function deleteDaten($id)
    {
        if($id) {
            $dbConnect = new todo();

            $daten = $dbConnect->delData($id);
        }else{
            $daten = "fehler";
        }

        return $daten;
    }

    public static function testDaten()
    {
        while (list ($key, $val) = each($_POST))
        {
            if (is_array($val))
            {
                for ($i = 0; $i < sizeof($val); $i++)
                {
                    echo $key. " = " . $val[$i];
                    echo "<br />";
                }

            }
            else
            {
                echo $key." = ".$val;
            }
            echo "<br />";
        }

    }

}


