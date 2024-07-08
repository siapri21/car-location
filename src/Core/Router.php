<?php

namespace App\Core;

class Router
{
    private array $routes;

    public function __construct()
    {
        $this->add_route('/', function () {
        });
        $this->add_route('/contactez-nous', function () {
        });
        $this->add_route('/voiture/{id}', function () {
        });
    }

    private function add_route(string $route, callable $closure)
    {
        $route = str_replace('/', '\/', $route);
        $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>[^\/]+)', $route);
        $pattern = '/^' . $pattern . '$/';

        $this->routes[$pattern] = $closure;
    }

    public function execute()
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        $requestUri = str_replace('/car-location', '', $requestUri);
        
        foreach ($this->routes as $key => $closure) {
            if(preg_match($key, $requestUri, $matches)){
                array_shift($matches);
                $closure($matches);
                return;
            }
        }
        
        require_once '../templates/error-404.php'; 
    }
    
    
}