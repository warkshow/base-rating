<?php

namespace application\core;

use PDO;

class View
{
    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    public function render($title, $vars = [])
    {
        extract($vars);
        $pathFile = "application/views/$this->path.php";
        $pathLayout = "application/views/layouts/$this->layout.php";
        ob_start();
        if (file_exists($pathFile)) {
            require $pathFile;
            $content = ob_get_clean();
            require $pathLayout;
        } else {
            echo "Вида $pathFile нету";
        }
    }

    public static function errorCode($code)
    {
        http_response_code($code);
        $pathError = "application/views/errors/$code.php";
        if (file_exists($pathError)) {
            require $pathError;
        }
        exit();
    }
    public function redirect($url)
    {
        header("location: $url");
        exit();
    }

    public function message($status, $message)
    {
        exit(json_encode(['status' => $status, ' message' => $message]));
    }
}
