<?php
error_reporting(E_ALL);

use vendor\core\base\App;
use vendor\core\Router;

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendore/core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');
define('CONFIG', dirname(__DIR__) . '/config');
define('CACHE', dirname(__DIR__) . '/cache');

define('LAYOUT', 'default');

require ROOT . '/vendor/libs/functions.php';
$query = rtrim($_SERVER['QUERY_STRING'], '/');


spl_autoload_register(function ($class) {
    $path = ROOT . '/' . str_replace('\\', '/', "$class.php");
    if (file_exists($path)) {
        require_once $path;
    }
});

new App;
$router = new Router;

// Не стандартные правила
$router->add("^company/?$", ['controller' => "main", 'action' => 'company']);
$router->add("^company/(?P<category>[a-z-]+)$", ['controller' => 'main', 'action' => 'company']);

// Стандартные правила
$router->add('^$', ['controller' => 'main', 'action' => 'index']);
$router->add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

$router->dispatch($query);
