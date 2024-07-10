<?php

namespace App\Controller;

abstract class AbstractController
{
    protected function render(string $path, array $param = [])
    {
        extract($param);
//elle transforme les cle du tableau en variable
        ob_start();
        require_once DIR_PATH . "/templates/{$path}.php";
        $content = ob_get_clean();

        require_once DIR_PATH . '/templates/base.php';
    }
}