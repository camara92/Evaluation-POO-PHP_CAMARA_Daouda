<?php

require_once "modele/AssociationsManager.php";
class AssociationController
{
    private $associationManager;


    public function __construct()
    {
        $this->associationManager = new AssociationManager();
        $this->associationManager->loadAssociations();
    }

    public function displayAssociations()
    {
        $associations = $this->associationManager->getAssociations();
        require_once "View/associations.view.php";
    }
    public function newAssociationForm()
    {
        require_once "view/new.association.view.php";
    }
    public function newAssociationValidation()
    {
        // require_once "view/new.association.view.php";
        // echo 'Daouda'; 
        //var_dump($_POST);
        $this->associationManager->newAssociationDB($_POST['id_vehicule'], $_POST['id_conducteur']);

        header('Location:' . URL . 'associations');
    }

    //delete partie 
   
    public function deleteAssociation($id_association)
    {
        $this->associationManager->deleteAssociationBD($id_association);
        // header("Location :".URL ."vehicules");
        header('Location:' . URL . 'associations');
    }



    //edit paertie 
    public function editAssociationForm($id_association)
    {
        $association = $this->associationManager->getAssociationById($id_association);
        require_once "view/edit.association.view.php";
    }
}


  


// $associations = $associationManager->getGames();

// $associationManager->loadGames();
