<?php

namespace application\lib;

use PDO;

/**
 * Класс для работы с базой данных
 */
class DataBase
{
    protected $pdo;
    protected static $instance;
    public static $countSQL = 0;
    public static $queries = [];
    protected function __construct()
    {
        $config = require 'application/config/database.php';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        $this->pdo = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';charset=utf8', $config['user'], $config['password'], $options);
    }
    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    /**
     * Выполняет какую-то команду без возвращения данных из БД
     *
     * @param string $sql Запрос к БД
     * @return boolean
     */
    public function execute($sql, $params = [])
    {
        $this->saveSQL($sql);
        self::$countSQL++;
        self::$queries[] = $sql;
        $statement =  $this->pdo->prepare($sql);
        return $statement->execute($params);
    }

    public function query($sql, $params = [])
    {
        $this->saveSQL($sql);
        $statement = $this->pdo->prepare($sql);
        $result = $statement->execute($params);
        if ($result !== false) {
            return $statement->fetchAll();
        } else {
            return [];
        }
    }

    protected function saveSQL($sql)
    {
        self::$countSQL++;
        self::$queries[] = $sql;
    }
}
