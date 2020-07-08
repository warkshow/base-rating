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

    /**
     * Хранятся все скрипты
     * 
     * @var array
     */
    public $scripts = [];

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
        $pathView = APP . "/views/{$this->route['prefix']}{$this->route['controller']}/{$this->view}.php";
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
                $scripts = [];
                $content = $this->cutScripts($content);
                if (!empty($this->scripts[0])) {
                    $scripts = $this->scripts[0];
                }
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

    /**
     * Вырезает скрипты, и вставляет их в $scripts
     *
     * @param string $content контент страницы откуда вырезать
     * @return string возвращает контент страницы с вырезаными скриптами
     */
    protected function cutScripts($content)
    {
        $pattern = "#<script.*?>.*?</script>#si";
        preg_match_all($pattern, $content, $this->scripts);
        if (!empty($this->scripts)) {
            $content = preg_replace($pattern, '', $content);
        }
        return $content;
    }
}
