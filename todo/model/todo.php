<?php

namespace todo;
use \PDO;

/**
 * Created by PhpStorm.
 * User: preacher
 * Date: 09.09.15
 * Time: 22:16
 */
class todo
{

    protected $conn;

    public function __construct()
    {
        try {
            $server = 'mysql:dbname=todo;host=127.0.0.1; port=3306';
            $user = 'root';
            $password = '123';

            $this->conn = new PDO($server, $user, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(\PDOException $e){
            echo "ERROR: " . $e->getMessage();
            exit;
        }

    }

    public function getdata()
    {
        try {
            $query = 'SELECT id, toto, DATE_FORMAT (datum, "%d.%m.%Y") AS datum FROM todov1;';

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            $res = $stmt->fetchAll();

            return $res;
        }
        catch(\PDOException $e){
            ErrorController::setDaten("","");
            ErrorController::setError("Datenbankfehler Nr.: ".$e->getCode());
            return false;
        }
    }

    public function saveData($todo, $datum)
    {
        if (DateCheckController::dateCheck($datum) == "de")
        {
            $date = new \DateTime($datum);
            $datumEnglisch = $date->format('Y-m-d');
            //var_dump(DateCheckController::dateCheck($datum));
        }elseif(DateCheckController::dateCheck($datum) == "us"){
            $datumEnglisch = $datum;
            //var_dump(DateCheckController::dateCheck($datum));
        }else{
            return false;
        }

        try {
            $query = 'INSERT INTO todov1 (toto, datum) VALUES ("' . $todo . '", "' . $datumEnglisch . '")';

            $stmt = $this->conn->exec($query);

            $this->conn = null;

            return $stmt;
        }
        catch(\PDOException $e){
            ErrorController::setDaten("","");
            ErrorController::setError("Datenbankfehler Nr.: ".$e->getCode());
            return false;
        }
    }

    public function delData($ids)
    {
        foreach ($ids as $id) {
            $query = 'DELETE FROM todov1 WHERE id IN ("' . $id . '")';

            $stmt = $this->conn->exec($query);
        }
        $this->conn = null;

        return $stmt;
    }

}