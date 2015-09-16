<?php
/**
 * Created by PhpStorm.
 * User: preacher
 * Date: 09.09.15
 * Time: 16:19
 */

namespace todo;


require_once "model/todo.php";
require_once "controller/TodoController.php";
require_once "controller/ErrorController.php";


if(array_key_exists('sende', $_POST)){
    if(isset ($_POST["todo"]) && $_POST["todo"] > '' || isset ($_POST["date"]) && $_POST["date"] > '') {
        $result = TodoController::saveDaten($_POST["todo"], $_POST["date"]);
    }else{
        $result = false;
        ErrorController::setDaten('', '');
        ErrorController::setError("Bitte Felder ausfüllen ...");
    }

    if(isset ($_POST["id"]))
    {
        $result = TodoController::deleteDaten($_POST["id"]);
    }
}else{
    $result = true;
}



$daten = TodoController::getDaten();

var_dump(ErrorController::getDaten());

include_once "view/view.php";




