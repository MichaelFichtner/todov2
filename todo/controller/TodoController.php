<?php

namespace todo;

class TodoController {

    public static function getDaten()
    {

        $dbConnect = new todo();

        $daten = $dbConnect->getdata();

        return $daten;
    }

    /**
     * @param $todo
     * @param $datum
     * @return bool|int
     * $todo muss noch Validiert werden !
     */
    public static function saveDaten($todo, $datum)
    {

            if(!empty($todo) && !empty($datum)) {

                //$valTodo='';
                $valDate=DateCheckController::getDate($datum, $todo);
                if($valDate){
                    $dbConnect = new todo();
                    $daten = $dbConnect->saveData($todo, $valDate);
                }else{
                    $daten = false;
                }


            }else{
                if(empty($todo)){
                    if ($valDate=!DateCheckController::getDate($datum, $todo))
                    {
                        $daten = false;
                    }
                    else{
                    ErrorController::setDaten(1, $datum);
                    ErrorController::setError("Was soll ich für Dich merken ?");
                    $daten = false;}
                }elseif(empty($datum)){
                    ErrorController::setDaten(2, $todo);
                    ErrorController::setError("Bitte ein Datum eingeben");
                    $daten = false;
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


