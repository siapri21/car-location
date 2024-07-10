<?php
require_once '../src/Core/Autoloader.php';
require_once '../src/Core/Router.php';
require_once '../config/env.php';
// affiche la methode display


use App\Core\Autoloader;
use App\Core\Database;
use App\Core\Router;

Autoloader::autoload();
Database::initConnection();

//afichage du router
$router = new Router();
$router->execute();

