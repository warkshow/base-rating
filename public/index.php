<?php

use warks\core\base\App;
use warks\core\Router;

define('DEBUG', true);

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/baserating/core');
define("LIBS", dirname(__DIR__) . '/vendor/baserating/libs');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');
define('LANGS', dirname(__DIR__) . '/app/languages');
define('CONFIG', dirname(__DIR__) . '/config');
define('TEMP', dirname(__DIR__) . '/tmp');
define('CACHE', dirname(__DIR__) . '/tmp/cache');

define('ADMIN', 'http://base-rating.eu');

define('LAYOUT', 'default');

require ROOT . '/vendor/baserating/libs/functions.php';
require ROOT . '/vendor/autoload.php';
$query = rtrim($_SERVER['QUERY_STRING'], '/');

new App;
$router = new Router;

// Не стандартные правила
$router->add("^company/?$", ["controller" => "company", "action" => "index"]);
$router->add("^company/search/?$", ["controller" => "company", "action" => "search"]);
$router->add("^company/add-company/?$", ["controller" => "company", "action" => "addCompany"]);
$router->add("^company/(?P<category>[a-z-]+)/?$", ["controller" => "company", "action" => "category"]);
$router->add("^company/(?P<category>[a-z-]+)/(?P<company_id>[0-9-]+)/?$",
             ["controller" => "company", "action" => "show"]);

// Админ правила
$router->add("^admin$", ["controller" => "user", "action" => "index", "prefix" => "admin"]);
$router->add("^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$", ["prefix" => "admin"]);

// Стандартные правила
$router->add("^$", ["controller" => "main", "action" => "index"]);
$router->add("^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$");

$router->dispatch($query);
