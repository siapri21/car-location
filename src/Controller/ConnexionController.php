<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Core\Session;
use App\Repository\ConnecterRepository;

class ConnexionController extends AbstractController
{
    public function showConnexionForm()
    {
        $this->render('connexion');
    }

    public function processLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $session = new Session();

            // Check if all required fields are set and not empty
            if (!isset($_POST['email']) || 
                !isset($_POST['pswd']) || 
                !isset($_POST['name']) || 
                empty($_POST['email']) || 
                empty($_POST['name']) || 
                empty($_POST['pswd'])) {
                $session->setFlashMessage('Veuillez remplir tous les champs', 'danger');
                header('Location: ' . SITE_NAME . '/connexion');
             
            }

            $email = trim($_POST['email']);
            $pwd = trim($_POST['pswd']);
            $name = trim($_POST['name']);

            $userRepository = new ConnecterRepository();
            $user = $userRepository->getUserByEmail($email);

            // Check if the user exists
            if ($user === false) {
                $session->setFlashMessage('Veuillez verifier vos identifiants', 'warning');
                header('Location: ' . SITE_NAME . '/connexion');
                exit;
            }

            // Verify password
            if ($user['mot_de_passe'] !== $pwd) {
                $session->setFlashMessage('Veuillez verifier vos identifiants', 'warning');
                header('Location: ' . SITE_NAME . '/connexion');
                exit;
            }

            // Verify name
            if ($user['nom'] !== $name) {
                $session->setFlashMessage('Veuillez verifier vos identifiants', 'warning');
                header('Location: ' . SITE_NAME . '/connexion');
                exit;
            }

            // Success, user is logged in
            $session->setFlashMessage('Vous êtes connecté', 'primary');
            header('Location: ' . SITE_NAME . '/');
            exit;
        } else {
            header('Location: ' . SITE_NAME . '/connexion');
            exit;
        }
    }
}
