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
        }
        catch(\PDOException $e){
            echo "ERROR: " . $e->getMessage();
            exit;
        }

    }

    public function getdata()
    {
        $query = 'SELECT * FROM todov1';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $res = $stmt->fetchAll();

        return $res;
    }

    public function saveData($todo, $datum)
    {
        $query = 'INSERT INTO todov1 (toto, datum) VALUES ("'.$todo.'", "'.$datum.'")';

        $stmt = $this->conn->exec($query);

        $this->conn = null;

        return $stmt;

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