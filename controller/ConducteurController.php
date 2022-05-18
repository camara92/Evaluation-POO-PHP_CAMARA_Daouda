<?php

require_once "modele/ConducteurManager.php";
class ConducteurController {
    private $conducteurManager;


    public function __construct(){
        $this->conducteurManager = new ConducteurManager();
        $this->conducteurManager->loadConducteurs();        
    }

    public function displayConducteurs(){
        $conducteurs = $this->conducteurManager->getConducteurs();
        require_once "View/conducteurs.view.php";
    }
    public function newConducteurForm(){
        require_once "view/new.conducteur.view.php";
    }
    public function newConducteurValidation(){
        // require_once "view/new.game.view.php";
       // echo 'Daouda'; 
        //var_dump($_POST);
        $this->conducteurManager->newConducteurDB($_POST['prenom'], $_POST['nom']); 
        header('Location :'. URL ."conducteurs");
    }
    public function editConducteurForm($id_conducteur){
        $conducteur = $this->conducteurManager->getconducteurById($id_conducteur);
        require_once "view/edit.conducteur.view.php"; 

    }


}


  


// $conducteurs = $conducteurManager->getGames();

// $conducteurManager->loadGames();
