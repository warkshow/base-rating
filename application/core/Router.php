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
    private $routes = [];

    /**
     * Текущий маршрут
     * 
     * @var array
     */
    protected $route = [];

    /**
     * Добавляет маршрут в таблицу маршрута
     * 
     * @param string $regexp Регулярное выражение
     * @param array $route маршрут([controller, action, params])
     */

    public function add($regexp, $route = [])
    {
        $this->routes[$regexp] = $route;
    }

    /**
     * Возвращает таблицу маршрутов
     * 
     * @return array
     */
    public function getRoutes()
    {
        return self::$routes;
    }

    /**
     * Возвращает текущий маршрут
     * 
     * @return array
     */
    public function getRoute()
    {
        return self::$route;
    }

    /**
     * Ищет URL в таблице маршрутов
     * 
     * @param string $url Входящий URL
     * @return boolean
     */
    public function matchRoute($url)
    {
        foreach ($this->routes as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $route[$key] = $value;
                    }
                }
                if (!isset($route['action'])) {
                    $route['action'] = 'index';
                }
                $this->route = $route;
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
    public function dispatch($url)
    {
        $url = $this->removeQueryString($url);
        if ($this->matchRoute($url)) {
            $pathController = 'application\\controllers\\';
            $controller = $pathController . $this->upperCamelCase($this->route['controller'] . "Controller");
            if (class_exists($controller)) {
                $createClass = new $controller($this->route);
                $action = $this->lowerCamelCase($this->route['action'] . "Action");
                if (method_exists($createClass, $action)) {
                    $createClass->$action();
                    $createClass->getView();
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
    protected function upperCamelCase($name)
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
    protected function lowerCamelCase($name)
    {
        return lcfirst($this->upperCamelCase($name));
    }

    /**
     * Возвращает строку без GET параметров
     *
     * @param string $url
     * @return string
     */
    protected function removeQueryString($url)
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
