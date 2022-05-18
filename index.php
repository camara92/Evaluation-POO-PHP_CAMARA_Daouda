<?php

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));
//debuter  la racine du projet : explication amateur 
// echo URL;
require_once "controller/ConducteurController.php";
require_once "controller/VehiculeController.php";
require_once "controller/AssociationController.php";

$conducteurController = new ConducteurController();

$vehiculeController = new VehiculeController();
$associationController = new AssociationController();
if (empty($_GET['page'])) {
    require_once "view/home.view.php";
} else {

    $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
    $urlvehicule = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
    $urlassociation = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
    // var_dump($url); 

    // switch($_get['page']); on l'a remplacé par la variable $url puis nos conditions de routages dynamiques 

    switch ($url[0]) {
        case 'accueil':
            require_once("./view/home.view.php");
            break;
        case 'conducteurs':
            if (empty($url[1])) {
                $conducteurController->displayConducteurs();
            } elseif ($url[1] === "add") {
                $conducteurController->newConducteurForm();
            } elseif ($url[1] === "cvalid") {
                $conducteurController->newConducteurValidation();
            } elseif (($url[1] === "add")) {
                echo "Créer un conducteur";
            } elseif (($url[1] === "edit")) {
                echo "Modifier un conducteur";
            } elseif (($url[1] === "delete")) {
                // echo "Supprimer un conducteur";
                $conducteurController->deleteConducteur($urlconducteur[2]);
            }
            break;
            //  case 'vehicules': require_once ("./view/vehicules.view.php");
            //  break; 
        case 'vehicules':
            if (empty($urlvehicule[1])) {
                $vehiculeController->displayVehicules();
            } elseif ($url[1] === "add") {
                $vehiculeController->newVehiculeForm();
            } elseif ($url[1] === "vvalid") {
                $vehiculeController->newVehiculeValidation();
            } elseif (($urlvehicule[1] === "add")) {
                echo "Créer un véhicule";
            } elseif (($urlvehicule[1] === "edit")) {
                // echo "Modifier un véhicule";
                $vehiculeController->editVehiculeForm($urlvehicule);
            } elseif (($urlvehicule[1] === "delete")) {
                // echo "Supprimer un véhicule ";
                $vehiculeController->deleteVehicule($urlvehicule[2]);
            }
            break;
            //  case 'prout': echo "Daouda";
            //  break; 


            //association des vehicules 

        case 'associations':
            if (empty($urlassociation[1])) {
                $associationController->displayassociations();
            } elseif ($url[1] === "add") {
                $associationController->newAssociationForm();
            } elseif ($url[1] === "avalid") {
                $associationController->newAssociationValidation();
            } elseif (($urlassociation[1] === "add")) {
                echo "Créer une association ";
            } elseif (($urlassociation[1] === "edit")) {
                // echo "Modifier un véhicule";
                $associationController->editAssociationForm($urlassociation);
            } elseif (($urlassociation[1] === "delete")) {
                // echo "Supprimer une association  ";
                $associationController->deleteAssociation($urlassociation[2]);
            }
            break;
            //  case 'prout': echo "Daouda";
            //  break; 
    }
}



//  define("URL" , str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http") . 
// "://".$_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ));

// echo URL;