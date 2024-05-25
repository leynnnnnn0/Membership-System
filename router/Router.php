<?php

require_once 'middleware/Middleware.php';
require_once 'middleware/Guest.php';
require_once 'middleware/Auth.php';
class Router
{
    public $routes = [];

    public function add($uri, $controller, $method) 
    {
        $this->routes[] = 
        [
            "uri" => $uri,
            "controller" => $controller, 
            "method" => $method,
            "middleware" => null
        ];

        return $this;
    }

    public function get($uri, $controller) 
    {
        return $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller)
    {
        return $this->add($uri, $controller, 'POST');
    }

    public function put($uri, $controller)
    {
        return $this->add($uri, $controller, 'PUT');
    }

    public function delete($uri, $controller)
    {
        return $this->add($uri, $controller, 'DELETE');
    }

    public function only($key)
    {
       $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }

    public function route($uri, $method)
    {
        foreach($this->routes as $route) 
        {
            if($route['uri'] == $uri && $route['method'] === strtoupper(trim($method)))
            {       
                Middleware::resolve($route['middleware']);
                return require_once $route['controller'];
            }
        }
    }
}
