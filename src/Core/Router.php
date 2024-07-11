<?php

namespace App\Core;

use App\Controller\Front\CarController;
use App\Controller\Front\HomeController;
use App\Controller\Front\ConnexionController;
use App\Controller\Front\ContactController;
use App\Controller\Admin\AdminController;
use App\Controller\Admin\AdminUsersController;

class Router
{
    private array $routes; // Tableau pour stocker les routes
    private $currentController; // Variable pour stocker le contrôleur actuel

    public function __construct()
    {
        // Définir la route pour la page d'accueil
        $this->add_route('/', function () {
            // Créer une instance du HomeController
            $this->currentController = new HomeController();
            // Appeler la méthode index() du HomeController pour afficher la page d'accueil
            $this->currentController->index();
        });

        // Définir la route pour la réservation avec un paramètre ID
        $this->add_route('/reservation/{id}', function($param){
            // Créer une instance du CarController
            $this->currentController = new CarController();
            // Appeler la méthode showReservationDetails() du CarController avec le paramètre ID
            $this->currentController->showReservationDetails($param);
        });

        // Définir une route pour la page "Contactez-nous"
        $this->add_route('/contact', function () {
           $this->currentController = new ContactController();
           $this->currentController->showContactForm();
        });

          // Définir une route pour la page "Contactez-nous"
          $this->add_route('/connexion', function () {
            $this->currentController = new ConnexionController();
            $this->currentController->showConnexionForm();
         });

         $this->add_route('/connecter', function () {
            $this->currentController = new ConnexionController();
            $this->currentController->processLogin();
         });
         // Définir une route pour la page "Contactez-nous"
         $this->add_route('/dashboard', function () {
            $this->currentController = new AdminController();
            $this->currentController->index();
         });

           // Définir une route pour la page "Contactez-nous"
           $this->add_route('/dashboard/users', function () {
            $this->currentController = new AdminUsersController();
            $this->currentController->index();
         });

          // Définir une route pour la page "Contactez-nous"
          $this->add_route('/dashboard/users/modifier/{id}', function ($param) {
            $this->currentController = new AdminUsersController();
            $this->currentController->ShowUserUpdateForm($param);
         });

         $this->add_route('/connecter', function () {
            $this->currentController = new AdminUsersController();
            $this->currentController->processUsers();
         });

        // Définir une route pour afficher les détails d'une voiture avec un paramètre ID
        $this->add_route('/voiture/{id}', function () {
            // Aucune action définie pour cette route
        });
    }

    // Méthode pour ajouter une route
    private function add_route(string $route, callable $closure)
    {
        // Remplacer les slashes par des slashes échappés pour les expressions régulières
        $route = str_replace('/', '\/', $route);
        
        // Remplacer les paramètres dynamiques {param} par des groupes de capture nommés
        $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>[^\/]+)', $route);
        
        // Ajouter les délimiteurs de début et de fin de chaîne pour l'expression régulière
        $pattern = '/^' . $pattern . '$/';
        
        // Stocker le pattern de l'expression régulière et le closure associé
        $this->routes[$pattern] = $closure;
    }

    // Méthode pour exécuter la route correspondante à la requête actuelle
    public function execute()
    {
        // Récupérer l'URI de la requête
        $requestUri = $_SERVER['REQUEST_URI'];
        
        // Enlever le préfixe '/car-location' de l'URI
        $requestUri = str_replace('/car-location', '', $requestUri);
        
        // Parcourir les routes pour trouver une correspondance avec l'URI
        foreach ($this->routes as $key => $closure) {
            // Si l'URI correspond au pattern de la route
            if(preg_match($key, $requestUri, $matches)){
                // Enlever le premier élément du tableau $matches (la chaîne complète correspondante)
                array_shift($matches);
                
                // Appeler le closure avec les paramètres correspondants
                $closure($matches);
                return;
            }
        }
        
        // Si aucune route ne correspond, afficher une page 404
        require_once '../templates/error-404.php'; 
    }
}
?>
