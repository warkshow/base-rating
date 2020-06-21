<?php

namespace application\core;

abstract class Controller
{
    public $currentRoute = [];
    public function __construct($route)
    {
        $this->currentRoute = $route;
    }
}
