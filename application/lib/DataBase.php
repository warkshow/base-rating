<?php

namespace application\lib;

use PDO;

class DataBase
{
    protected $db;
    function __construct()
    {
        $config = require 'application/config/database.php';
        $this->db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . '', $config['user'], $config['password']);
    }

    private function query($sql, $params = [])
    {
        $statement = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $statement->bindValue(":$key", $value);
            }
        }
        $statement->execute();
        return $statement;
    }
    public function row($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function column($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }
}
