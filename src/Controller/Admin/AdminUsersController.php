<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AbstractAdminController;
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

    public function processUsers(){
        
    }
}