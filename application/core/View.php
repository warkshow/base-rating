<?php

namespace application\core;

class View
{
    public $route  = [];
    public $view;
    public $layouts;

    /**
     * Назначение переменных
     *
     * @param array $route
     * @param string $view
     * @param string $layouts
     */
    function __construct($route, $view, $layouts)
    {
        $this->route = $route;
        if ($layouts === false) {
            $this->layouts = false;
        } else {
            $this->layouts = $layouts ?: 'default';
        }
        $this->view = $view ?: 'index';
    }
    /**
     * Отображает контент
     *
     * @param string $title Загаловок страницы
     * @param array $vars параметры
     * @return void
     */
    public function render($vars)
    {
        if (is_array($vars)) {
            extract($vars);
        }
        $pathView = 'application/views/' . lcfirst($this->route['controller']) . '/' . $this->view . '.php';
        if (file_exists($pathView)) {
            ob_start();
            require $pathView;
        } else {
            echo "Вид <b> $pathView </b> не найден";
        }
        $content = ob_get_clean();

        if (false !== $this->layouts) {
            $pathLayout = "application/views/layouts/$this->layouts.php";
            if (file_exists($pathLayout)) {
                require $pathLayout;
            } else {
                echo "Шаблон <b> $pathLayout </b> не найден.";
            }
        }
    }
    public static function Error($code)
    {
        $file = "application/views/errors/$code.php";
        if (file_exists($file)) {
            require $file;
        }
        http_response_code($code);
    }
}
