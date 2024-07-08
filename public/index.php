<?php
require_once '../src/Entity/Test.php';
require_once '../src/Core/Autoloader.php';
require_once '../src/Core/Router.php';
// affiche la methode display

use App\Entity\Test;
use App\Core\Autoloader;
use App\Core\Router;

Autoloader::autoload();

$dispaly = new Test();
echo $dispaly->display();

//afichage du router
$router = new Router();
$router->execute();

