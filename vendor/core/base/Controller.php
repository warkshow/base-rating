<?php

namespace vendor\core\base;

class Controller
{
    public $route = [];
    public $view;
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

    public function getView()
    {
        $viewObject = new View($this->route, $this->layout, $this->view);
        $viewObject->render($this->vars);
    }
    public function set($vars)
    {
        $this->vars = $vars;
    }
}
