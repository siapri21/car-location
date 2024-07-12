<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AbstractAdminController;
use App\Core\Session;
use App\Repository\ConnecterRepository;

class AdminUsersController extends AbstractAdminController
{
    public function index()
    {
        $userRepository = new ConnecterRepository();
        $cars = $userRepository->getAllCar();
    
        $this->render('dashboard-cars', ['vehicules' => $cars]);
    }

    public function showUsers()
    {
        $userRepository = new ConnecterRepository();
        $users = $userRepository->getAllUsers();

        $this->render('dashboard-users', ['users' => $users]);
    }


   
    public function ShowUserUpdateForm ($param){
        
        $userRepository = new ConnecterRepository();
        $user = $userRepository->getUserById($param['id']);

        $this->render('user-update-form', ['user' => $user]); 
    }


    public function processUsers()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $session = new Session();

            // Vérification des champs
            if (!isset($_POST['email']) || !isset($_POST['pseudo']) || !isset($_POST['id']) ||
                empty($_POST['email']) || empty($_POST['pseudo']) || empty($_POST['id'])) {

            }

            // Initialisation des variables
            $id = $_POST['id'];
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];

            // Mise à jour des informations de l'utilisateur dans la base de données
            $userRepository = new ConnecterRepository();
            $user = $userRepository->updateUser($id, $pseudo, $email);

            if ($user) {
                $session->setFlashMessage('Votre modification a été bien prise en compte', 'success');
                header('Location: /users');
                exit();
            } else {
                $session->setFlashMessage('Modification échouée', 'danger');
                header('Location: /users');
                exit();
            }
        } else {
            echo "Données invalides";
        }

   
        }
    
    
   

    }