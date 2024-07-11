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
    
            $id = $_POST['id'];
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
    
            if (!empty($id) && !empty($pseudo) && !empty($email)) {
                // Mettre à jour les informations de l'utilisateur dans la base de données
                $userRepository = new ConnecterRepository();
                $updated = $userRepository->updateUser($id, $pseudo, $email);
    
                if ($updated) {
                    $session->setFlashMessage('votre modification a été bien prise en compte', 'success');
                    header('Location: /users');
                    exit();

                } else {
                    $session->setFlashMessage('modification echoué', 'danger');
                    header('Location: /users');
                    exit();
                }
            } else {
                echo "Donnée invalide";
            }
        }
    }
    
   
}
