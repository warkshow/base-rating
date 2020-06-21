<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

use application\core\Router;

spl_autoload_register(function ($class) {
    $path = str_replace("\\", "/", "$class.php");
    if (file_exists($path)) {
        require_once $path;
    }
});


function debug($param)
{
    echo "<pre>";
    var_dump($param);
    echo "</pre>";
}
$query = rtrim($_SERVER["REQUEST_URI"], '/');
session_start();
$router = new Router;
// debug($_GET);

// Стандартные правила
$router::add('^$', ['controller' => 'Main', 'action' => 'index']);
$router::add('^(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)$');

$router::dispatch($query);
