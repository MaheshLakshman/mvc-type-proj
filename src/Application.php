<?php

namespace App;

use App\Router;

class Application
{
    public $route;

    public function __construct()
    {
        $this->route = new Router;
    }

    public function run()
    {
        echo $this->route->resolve();
    }
}