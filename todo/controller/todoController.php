<?php

namespace todo;

class test {

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
        if($todo && $datum) {
            $dbConnect = new todo();

            $daten = $dbConnect->saveData($todo, $datum);
        }else{
            $daten = "fehler";
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

}


