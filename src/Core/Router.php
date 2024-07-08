<?php

namespace App\Core;

use App\Controller\CarController;
use App\Controller\HomeController;

class Router
{
    private array $routes; 
    
    private $currentController;



    public function __construct()
    {
        $this->add_route('/', function () {
            $this->currentController = new HomeController();
            $this->currentController->index();
        });

        $this->add_route('/reservation/{id}', function($param){
            $this->currentController = new CarController();
            $this->currentController->showReservationDetails($param);
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