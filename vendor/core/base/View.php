<?php

namespace vendor\core\base;

class View
{

    /**
     * Текущий маршрут
     *
     * @var array ['controller'] ['action']
     */
    public $route = [];

    /**
     * Текущий вид
     *
     * @var string
     */
    public $view;

    /**
     * Текущий шаблон
     *
     * @var string
     */
    public $layout;

    public function __construct($route, $layout = '', $view = '')
    {
        $this->route = $route;
        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;
    }

    /**
     * Выводит страницу в браузер
     *
     * @return void
     */
    public function render($vars)
    {
        if (is_array($vars)) {
            extract($vars);
        }
        $pathView = APP . "/views/{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if (file_exists($pathView)) {
            require $pathView;
        } else {
            echo "Вид: <b>$pathView</b> не найден";
        }
        $content = ob_get_clean();
        if (false !== $this->layout) {
            $pathLayout = APP . "/views/layouts/{$this->layout}.php";
            if (file_exists($pathLayout)) {
                require $pathLayout;
            } else {
                echo "Шаблон: <b>$pathLayout не найден</b>";
            }
        }
    }
}
