<?php

namespace App\Core;

use App\Core\Router;

class Session 
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function setFlashMessage(string $message , string $color = "warning")  {
        $_SESSION['message'] = 
        '<div class="alert alert-' . $color . 'alert-dismissible fade show" role="alert">' . $message .
     '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }

    public function displayFlashMessage(){
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
    }
    unset($_SESSION['message']);
    
   
}
}