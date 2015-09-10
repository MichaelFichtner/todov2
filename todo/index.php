<?php

namespace todo;

$res = '';

/**
 * Created by PhpStorm.
 * User: preacher
 * Date: 09.09.15
 * Time: 16:19
 */

require_once "model/todo.php";
require_once "controller/todoController.php";


if(isset ($_POST["todo"]) && $_POST["todo"] > '') {
    $res = test::saveDaten($_POST["todo"], $_POST["date"]);
}

if(isset ($_POST["id"]))
{
    $res = test::deleteDaten($_POST["id"]);
}

$daten = test::getDaten();
include_once "view/view.php";




