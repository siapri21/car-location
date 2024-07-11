<?php

namespace App\Controller\Admin;

abstract class AbstractAdminController
{
    protected function render(string $path, array $param = [])
    {
        extract($param);
//elle transforme les cle du tableau en variable
        ob_start();
        require_once DIR_PATH . "/templates/admin/{$path}.php";
        $content = ob_get_clean();

        require_once DIR_PATH . '/templates/admin/base.php';
    }
}