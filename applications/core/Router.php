<?php

namespace applications\core;

class Router
{
    public function __construct()
    {
    }


    public function run()
    {
        $this->match();
    }



    function match()
    {
        $url = $_SERVER["REQUEST_URI"];
        var_dump($url);
    }
}
