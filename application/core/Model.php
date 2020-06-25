<?php

namespace application\core;

use application\libs\DataBase;

abstract class Model
{
    protected $pdo;
    protected $table;
    protected $pk = 'id';

    public function __construct()
    {
        $this->pdo = DataBase::instance();
    }

    public function query($sql)
    {
        return $this->pdo->execute($sql);
    }

    /**
     * Выбирает все поля из таблицы
     *
     * @return array Возвращает поля из запроса
     */
    public function findAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->query($sql);
    }

    /**
     * Поиск одной записи
     *
     * @param string $id что искать
     * @param string $field По какому полю поиск
     * @return array
     */
    public function findOne($id, $field = '')
    {
        $field = $field ?: $this->pk;
        $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
        return $this->pdo->query($sql, [$id]);
    }

    /**
     * Произвольный SQL запрос
     *
     * @param string $sql SQL запрос
     * @param array $params Параметры
     * @return array
     */
    public function findBySQL($sql, $params = [])
    {
        return $this->pdo->query($sql, $params);
    }
    /**
     * Поиск через LIKE 
     *
     * @param string $str что искать 
     * @param string $field где искать
     * @param string $table в какой таблице
     * @return void
     */
    public function findLike($str, $field, $table = '')
    {
        $table = $table ?: $this->table;
        $sql = "SELECT * FROM $table WHERE $field LIKE ?";
        return $this->pdo->query($sql, ["%$str%"]);
    }
}
