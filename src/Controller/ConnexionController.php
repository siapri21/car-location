<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Repository\ConnecterRepository;

class ConnexionController extends AbstractController
{
    public function showConnexionForm()
    {
        $this->render('connexion');    

    }

    public function processLogin()
    {
        var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($POST['email']) || 
            !isset($POST['pswd']) || 
            !isset($POST['name']) ||
            empty($POST['email']) || 
            empty($POST['name']) || 
            empty($POST['pswd'])) {
                echo 'erreur';
            }

            $email = trim($_POST['email']);
            $pswd = trim($_POST['pswd']);
            $name= trim($_POST['name']);


            $connectRepository = new ConnecterRepository;
           $user= $connectRepository->getUserByEmail($email);

           if ($user==false) {
            echo 'cet utilisateur';

           }
        
           if ($user['mot de passe'] !==$pswd) {
            echo 'il y a une erreur';
           }

        }
}

}