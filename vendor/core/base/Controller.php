<?php

namespace vendor\core\base;

class Controller
{
    /**
     * Текущий маршрут
     *
     * @var array
     */
    public $route = [];

    /**
     * Текущий вид
     *
     * @var string вид
     */
    public $view;

    /**
     * Текущий шаблон
     *
     * @var string шаблон
     */
    public $layout;

    /**
     * Пользовательские данные
     *
     * @var array
     */
    public $vars = [];
    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];
    }

    /**
     * Выводит текущий вид и шаблон
     *
     * @return void
     */
    public function getView()
    {
        $viewObject = new View($this->route, $this->layout, $this->view);
        $viewObject->render($this->vars);
    }

    /**
     * Задает пользовательские данные
     *
     * @param array $vars пользовательские данные
     * @return void
     */
    public function set($vars)
    {
        $this->vars = $vars;
    }

    /**
     * Провервка на Ajax запрос
     *
     * @return boolean
     */
    public function isAjax()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpsRequest';
    }
}
