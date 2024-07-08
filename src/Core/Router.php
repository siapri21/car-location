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


}