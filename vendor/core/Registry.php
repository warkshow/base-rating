<?php

namespace vendor\core;

class Registry
{
    use TSingleton;
    /**
     * Список объектов
     *
     * @var array
     */
    public static $objects = [];

    public function __construct()
    {
        require CONFIG . '/config.php';
        foreach ($config['components'] as $name => $component) {
            self::$objects[$name] = new $component;
        }
    }

    public function __get($name)
    {
        if (is_object(self::$objects[$name])) {
            return self::$objects[$name];
        }
    }
    public function __set($name, $object)
    {
        if (!isset(self::$objects[$name])) {
            self::$objects[$name] = new $object;
        }
    }

    /**
     * Получает список зарегистрированных
     *
     * @return void
     */
    public function getList()
    {
        debug(self::$objects);
    }
}
