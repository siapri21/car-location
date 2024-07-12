<?php

namespace App\Core;

class Session 
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function setFlashMessage(string $message , string $color="danger")  {
        $_SESSION['message'] = 
        '<div class="alert alert-' .$color.  ' alert-dismissible fade show" role="alert">' .$message.
     '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }

    public function displayFlashMessage(){
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
    }
    
   
}

public function createSession(array $data)
{
        // Affecte la valeur de 'pseudo' à la clé 'LOGGED_USERNAME' dans $_SESSION
        $_SESSION['LOGGED_USERNAME'] = $data['pseudo'];
        $_SESSION['LOGGED_ID'] = $data['id'];

        if ($data['statut'] == true ) {
            $_SESSION['LOGGED_ADMIN'] = true;
        }
 
}
// si la cle de tableau le statut vaux true ; creer une variable de session logged_admin et on lui affectera true


}