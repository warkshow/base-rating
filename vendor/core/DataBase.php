<?php

namespace vendor\core;

use PDO;

class DataBase
{
    protected $pdo;

    protected static $instance;

    public static $countSql = 0;
    public static $queries = [];

    protected function __construct()
    {
        $config = require CONFIG . '/dataBaseConfig.php';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        $this->pdo = new PDO($config["dsn"], $config['user'], $config['password'], $options);
    }

    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function execute($sql, $params = [])
    {
        $this->saveSql($sql);
        $statement = $this->pdo->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $statement->bindValue($key, $value);
            }
        }
        return $statement->execute();
    }

    public function query($sql, $params = [])
    {
        $this->saveSql($sql);
        $statement = $this->pdo->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $statement->bindValue($key, $value);
            }
        }
        $result = $statement->execute();
        if ($result !== false) {
            return $statement->fetchAll();
        }
        return [];
    }
    protected function saveSql($sql)
    {
        self::$countSql++;
        self::$queries[] = $sql;
    }
}
