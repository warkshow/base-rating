<?php

namespace vendor\core;

use PDO;

class DataBase
{
    use TSingleton;

    protected $pdo;
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

    /**
     * Выполняет произвольный запрос
     *
     * @param string $sql строка запроса
     * @param array $params параметры
     * @return array данные из базы данных
     */
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

    /**
     * Выполняет запрос с возвращаемыми параметрами
     *
     * @param string $sql строка запроса
     * @param array $params параметры
     * @return array данные из базы данных
     */
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

    /**
     * Сохраняет запросы для отладки
     *
     * @param string $sql строка запроса
     * @return void
     */
    protected function saveSql($sql)
    {
        self::$countSql++;
        self::$queries[] = $sql;
    }
}
