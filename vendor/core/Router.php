<?php

namespace vendor\core;

use vendor\core\base\View;

class Router
{
    /**
     * Таблица маршрутов
     *
     * @var array Все маршруты
     */
    protected $routes = [];
    /**
     * Текущий маршрут
     *
     * @var array Текущий маршрут
     */
    protected $route = [];

    /**
     * Добавление маршрутов
     *
     * @param string $regexp Регулярное выражение
     * @param array $route Добавленный маршрут
     * @return void
     */
    public function add($regexp, $route = [])
    {
        $this->routes[$regexp] = $route;
    }
    /**
     * Отдает таблицу маршрутов
     *
     * @return array Таблицы маршрутов
     */
    public function getRoutes()
    {
        return $this->routes;
    }
    /**
     * Возвращает текущий маршрут
     *
     * @return array Текущий маршрут
     */
    public function getRoute()
    {
        return $this->route;
    }
    /**
     * Ищет URL в таблице маршрутов
     *
     * @param string $url Текущий URL
     * @return boolean
     */
    protected function matchRoute($url)
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
                $route['controller'] = $this->upperCamelCase($route['controller']);
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

            $controllerPath = 'app\controllers\\';
            $controller = $controllerPath . $this->upperCamelCase($this->route['controller']) . "Controller";

            if (class_exists($controller)) {
                $controllerObject = new $controller($this->route);
                $action = $this->lowerCamelCase($this->route['action']) . "Action";
                if (method_exists($controllerObject, $action)) {
                    $controllerObject->$action();
                    $controllerObject->getView();
                } else {
                    echo "Метод <b>$controller::$action</b> не найден";
                }
            } else {
                echo "Контроллер <b>$controller</b> не найден";
            }
        } else {
            View::Errors(404);
        }
    }

    /**
     * Изменяет первые буквы слова на большие и объединяет их
     *
     * @param string $name строка которую преобразовать
     * @return string
     */
    protected function upperCamelCase($name)
    {
        $name = str_replace('-', ' ', $name);
        $name = ucwords($name);
        $name = str_replace(' ', '', $name);
        return $name;
    }

    /**
     * Преобразует первую букву строки в маленькую
     *
     * @param string $name
     * @return string
     */
    protected function lowerCamelCase($name)
    {
        $name = $this->upperCamelCase($name);
        $name = lcfirst($name);
        return $name;
    }

    /**
     * Обрезает возможные GET параметры
     *
     * @return void
     */
    protected function removeQueryString($url)
    {
        if ($url) {
            $params = explode('&', $url, 2);
            if (false === strpos($params[0], '=')) {
                return rtrim($params[0], '/');
            } else {
                return '';
            }
        }
    }
}
