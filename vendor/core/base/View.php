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

    /**
     * Хранит мета теги
     *
     * @var array
     */
    public static $meta;

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

    /**
     * Вывод ошибок пользователю
     *
     * @param int $code код ошибки
     * @return void
     */
    public static function Errors($code)
    {
        http_response_code($code);
        $file =  APP . "/views/errors/$code.php";
        if (file_exists($file)) {
            require $file;
        } else {
            echo "Ошибка";
        }
    }

    /**
     * Задает мета теги
     *
     * @param string $title загаловок страницы
     * @param string $desc описание страницы
     * @param string $keywords ключивые слова страницы
     * @return void
     */
    public static function setMeta($title = '', $desc = '', $keywords = '')
    {
        self::$meta['title'] = $title;
        self::$meta['desc'] = $desc;
        self::$meta['keywords'] = $keywords;
    }

    /**
     * Выводит мета теги (title, description и keywords)
     *
     * @return void
     */
    public static function getMeta()
    {
        echo "<title>" . self::$meta['title'] . "</title>";
        echo "<meta name='description' content='" . self::$meta['desc'] . "'>";
        echo "<meta name='keywords' content='" . self::$meta['keywords'] . "'>";
    }
}
