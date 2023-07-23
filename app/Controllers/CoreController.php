<?php 

namespace App\Controllers;

abstract class CoreController {

    public $router;

    /** Le constructeur du CoreCOntroller est automatiquement exécuté quand on instancie n'importe lequel de ses enfants. Donc sur toutes les pages du projet, ce constructeur sera exécuté. 
     * On pourra donc y mettre n'importe quel code qui doit etre exécuté sur toutes les pages, ici notre ACL !
    */
    public function __construct($routeName, $router)
    {
    // On range le router reçu d'altodispatcher dans la propriété $this->router. Ainsi, dans tous nos controllers on pourra accéder à cette propriété router et utilise ses outils comme generate
    $this->router = $router;

    /*$acl = [
        
       //! à redéfinir 'main-home' => ['admin', 'catalog-manager']
    ];

    // On vérifie si la route actuelle fait partie des routes protégées (donc si c'est une des clés du tableau)
    if(isset($acl[$routeName])) {

        // On récupère dans le tableau la liste des roles autorisés
        $roles = $acl[$routeName];
    
        // On appele la méthode checkAuthorization qui vérifie que l'utilisateur courant possède bien les roles autorisés
        $this->checkAuthorization($roles);

    }*/

}

    /**
     * Méthode permettant d'afficher du code HTML en se basant sur les views
     *
     * @param string $viewName Nom du fichier de vue
     * @param array $viewData Tableau des données à transmettre aux vues
     * @return void
     */
    protected function show(string $viewName, $viewData = [])
    {
        $router = $this->router;
        $viewData['currentPage'] = $viewName;

        // Absolute URL for assets
        $viewData['assetsBaseUri'] = $_SERVER['BASE_URI'] . 'assets/';
        // Absolute URL for assets for website
        // /!\ != here public/
        $viewData['baseUri'] = $_SERVER['BASE_URI'];
    
        // Array to variable
        extract($viewData);
        
        // $viewData is now avaible on each vue file
        require_once __DIR__ . '/../views/layout/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/layout/footer.tpl.php';
    }

 /**
     * Méthode permettant de rediriger vers n'importe quelle page de notre application
     *
     * @param string $routeName
     * @return void
     */
    protected function redirect($routeName)
    {
        $url = $this->router->generate($routeName);
        header('Location: ' . $url);
        exit;
    }

}