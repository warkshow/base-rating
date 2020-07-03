<?php

namespace vendor\core\base;

use vendor\core\DataBase;

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
     * Получает все поля из запроса
     *
     * @return array Возвращает данные из базы данных если найдено
     */
    public function findAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->query($sql);
    }


    /**
     * Запрос одной записи
     *
     * @param array $params Входные данные ['username'= 'foo']
     * @param string $field по какому полю искать
     * @return array Возвращает данные из базы данных если найдено
     */
    public function findOne($params, $field = '')
    {
        $field = $field ?: $this->pk;
        $sql = "SELECT * FROM {$this->table} WHERE $field = :$field LIMIT 1";
        return $this->pdo->query($sql, $params);
    }

    /**
     * Выполняет произвольный SQL
     *
     * @param string $sql SQL запрос
     * @param array $params параметры
     * @return array Возвращает данные из базы данных если найдено
     */
    public function findBySql($sql, $params = [])
    {
        return $this->pdo->query($sql, $params);
    }

    /**
     * Запрос ...(дописать надо)
     * 
     * @param array $params ['user' => '%foo%']
     * @param string $table таблица в которой произвести поиск
     * @return array Возвращает данные из базы данных если найдено
     */
    public function findLike($params, $table = '')
    {
        $table = $table ?: $this->table;
        $key = "`" . implode("`, `", array_keys($params)) . "`";
        $value = ":" . implode(", :", array_keys($params));
        $sql = "SELECT * FROM $table WHERE $key LIKE $value";

        return $this->pdo->query($sql, $params);
    }

    /**
     * Запрос последней записи
     *
     * @param string $field по какому полю искать
     * @return array Возвращает данные из базы данных если найдено
     */
    public function findOneLast($field = '')
    {
        $field = $field ?: $this->pk;
        $sql = "SELECT * FROM {$this->table} ORDER BY $field DESC LIMIT 1";
        return $this->pdo->query($sql);
    }

    /**
     * Поиск последних записей
     *
     * @param int $count количество возращаемых записей
     * @param string $field по какому полю возвращать
     * @return array Возвращает данные из базы данных если найдено
     */
    public function findLast($count, $field = '')
    {
        $field = $field ?: $this->pk;
        $sql = "SELECT * FROM {$this->table} ORDER BY $field DESC LIMIT $count";
        return $this->pdo->query($sql);
    }

    /**
     * Выбирает значение в диапозоне 
     *
     * @param string $field Поле по которому искать
     * @param string $leftOperand левый операнд
     * @param string $rightOperand правый операнд
     * @param string $table таблица в которой поиск ведется
     * @return array Возвращает данные из базы данных если найдено
     */
    public function findByBetween($field, $leftOperand, $rightOperand, $table = '')
    {
        $field = $field ?: $this->pk;
        $table = $table ?: $this->table;
        // ["left"=>"100"] ["right"=>"300"]
        $sql = "SELECT * FROM $table WHERE $field BETWEEN $leftOperand AND $rightOperand";
        return $this->pdo->query($sql);
    }

    /**
     * Вставляет данные в базу данных
     *
     * @param array $param входные данные и поля ["username" => "foo"]
     * @return boolean
     */
    public function insert($param)
    {
        $key = "(`" . implode("`, `", array_keys($param)) . "`)";
        $value = "(:" . implode(", :", array_keys($param)) . ")";
        $sql = "INSERT INTO {$this->table} $key VALUES $value";

        return $this->pdo->execute($sql, $param);
    }

    /**
     * Обновляет запись в Базе Данных
     *
     * @param array $params Параметры которые изменить, ['username'=> 'user1']
     * @param int $id ID поля в котором нужно изменить
     * @param string $field название поля в котором изменить
     * @param string $table в какой таблице нужно изменить
     * @return boolean
     */
    public function update($params, $id, $field = '', $table = '')
    {
        $table = $table ?: $this->table;
        $field = $field ?: $this->pk;
        $key = "`" . implode("`, `", array_keys($params)) . "`";
        $value = ":" . implode(", :", array_keys($params));
        $sql = "UPDATE $table SET $key = $value WHERE $table.$field = $id";
        return $this->pdo->execute($sql, $params);
    }

    //DELETE FROM `users` WHERE `users`.`id` = 14
    /**
     * Удаляет запись по ID
     *
     * @param int $id ID записи которую нужно удалить
     * @param string $field поля по которому считается ID
     * @param string $table таблица в которой удалять запись
     * @return boolean
     */
    public function delete($id, $field = '', $table = '')
    {
        $field = $field ?: $this->pk;
        $table = $table ?: $this->table;
        $sql = "DELETE FROM $table WHERE $table.$field = $id";

        return $this->pdo->execute($sql);
    }
}
