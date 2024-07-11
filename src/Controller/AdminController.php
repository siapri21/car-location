<?php

namespace App\Controller;

use App\Controller\AbstractController;

class AdminController extends AbstractController
{
    public function index()
    {
        $this->render('dashboard');
    }
}

// <!-- 
//  creer une vue dashoard.php
//  creer une route /dashoard
//  creer un controller AdminController.php
//  affiche la vue dashboard.php
//   ajouter un lien cliqauble pour gerer les utilisateurs dzans la vue dashboard.php
//   creer un lien  cliquable /dashboard/users qui affuche egalement une vue dashbaord-users

//   dans la vue dashboard-users.php 

//   affuche un tableau avec les utilisateurs

//   -->