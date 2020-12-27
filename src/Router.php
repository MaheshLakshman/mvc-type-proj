<?php

namespace App;

use App\Request;

class Router
{
    protected $routes = [];

    public $request;

    public $response;

    public function __construct()
    {
        $this->request = new Request;
        $this->response = new Response;
    }

    public function get(string $path, $callback)
    {
        return $this->routes['get'][$path] = $callback;
    }

    public function post(string $path, $callback)
    {
        return $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $method = $this->request->getMethod();
        $url = $this->request->getUrl();
        $callback = $this->routes[$method][$url] ?? false;

        if($callback === false)
        {
            $this->response->toResponse(404);
            return "Invalid Url";
        }

        if(is_string($callback))
        {
            return $callback;
        }

        if(is_array($callback))
        {
            $callback[0] = new $callback[0];
        }
        return call_user_func($callback);
    }
}

