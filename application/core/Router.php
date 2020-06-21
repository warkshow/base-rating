<?php

namespace application\core;

use application\core\View;

class Router
{
    /**
     * Таблица маршуртов
     * 
     *  @var array
     */
    private static $routes = [];

    /**
     * Текущий маршрут
     * 
     * @var array
     */
    protected static $route = [];

    /**
     * Добавляет маршрут в таблицу маршрута
     * 
     * @param string $regexp Регулярное выражение
     * @param array $route маршрут([controller, action, params])
     */

    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    /**
     * Возвращает таблицу маршрутов
     * 
     * @return array
     */
    public static function getRoutes()
    {
        return self::$routes;
    }

    /**
     * Возвращает текущий маршрут
     * 
     * @return array
     */
    public static function getRoute()
    {
        return self::$route;
    }

    /**
     * Ищет URL в таблице маршрутов
     * 
     * @param string $url Входящий URL
     * @return boolean
     */
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $route[$key] = $value;
                    }
                }
                if (!isset($route['action'])) {
                    $route['action'] = 'index';
                }
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**
     * Перенаправляет URL по корректному маршруту
     * 
     * @param string $url Входящий URL
     * @return void
     */
    public static function dispatch($url)
    {
        $url = self::removeQueryString($url);
        debug($url);
        debug($_GET);
        if (self::matchRoute($url)) {
            $pathController = 'application\\controllers\\';
            $controller = $pathController . self::upperCamelCase(self::$route['controller'] . "Controller");
            if (class_exists($controller)) {
                $createClass = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action'] . "Action");
                if (method_exists($createClass, $action)) {
                    $createClass->$action();
                } else {
                    echo "Метод $action не найден в $createClass";
                }
            } else {
                echo "Не нашел controller: $controller";
            }
        } else {
            echo "Не найден маршрут";
        }
    }

    /**
     * Делает слова с большой буквы
     * 
     * @return string
     */
    protected static function upperCamelCase($name)
    {
        $name = str_replace('-', ' ', $name);
        $name = ucfirst($name);
        $name = str_replace(' ', '', $name);
        return $name;
    }

    /**
     * Делает первую букву большой
     * 
     * @return string
     */
    protected static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }

    /**
     * Возвращает запрашиваемый URL
     *
     * @param string $url
     * @return string
     */
    protected static function removeQueryString($url)
    {
        if ($url) {
            $params = explode('?', $url);
            if (false === strpos($params[0], '=')) {
                return rtrim($params[0], '/');
            } else {
                return '';
            }
        }
        return $url;
    }
}
