<?php

namespace application\core;

use application\core\View;

abstract class Controller
{
    /**
     * Текущий маршут
     *
     * @var array
     */
    public $route = [];
    /**
     * Вид
     *
     * @var string
     */
    public $view;
    /**
     * Шаблон
     *
     * @var string
     */
    public $layout;
    /**
     * Пользовательские данные
     *
     * @var array
     */
    public $vars = [];

    /**
     * Метаданные 
     *
     * @var array массив с метаданными
     */
    public $meta = [];
    public $title = 'Главная старница';
    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];
    }
    public function getView()
    {
        $createView = new View($this->route, $this->view, $this->layout);
        $createView->render($this->vars);
    }
    public function setParam($vars = [])
    {
        $this->vars = $vars;
    }
    protected function setMeta($title = '', $desc = '', $keywords = '')
    {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }
}
