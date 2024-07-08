<?php
require_once '../src/Entity/Test.php';
// affiche la methode display
use App\Entity\Test;

$dispaly = new Test();
echo $dispaly->display();


