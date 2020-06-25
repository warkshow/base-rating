<?php

namespace application\core;

use application\core\Registry;

class App
{
    public static $app;
    public function __construct()
    {
        self::$app = Registry::instance();
    }
}
