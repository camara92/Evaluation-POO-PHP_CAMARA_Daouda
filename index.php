<?php

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));
//debuter  la racine du projet : explication amateur 
// echo URL;
//require_once "controller/GameController.php";
require_once "controller/VehiculeController.php";

//$gameController = new GameController();
// $userController = new UserController();
$vehiculeController = new VehiculeController();
if (empty($_GET['page'])) {
    require_once "view/home.view.php";
} else {

    $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
    $urlvehicule = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
    // var_dump($url); 

// switch($_get['page']); on l'a remplacé par la variable $url puis nos conditions de routages dynamiques 

    switch ($url[0]) {
        case 'accueil':
            require_once("./view/home.view.php");
            break;
        case 'games':
            if (empty($url[1])) {
                $gameController->displayGames();

             } elseif ($url[1]==="add") {
                    $gameController->newGameForm();
                
            }
            elseif ($url[1]==="gvalid") {
                $gameController->newGameValidation();
            
        }
            
            elseif (($url[1] === "add")) {
                echo "Créer un jeu";
            } elseif (($url[1] === "edit")) {
                echo "Modifier un jeu";
            } elseif (($url[1] === "delete")) {
                echo "Supprimer un jeu";
            }
            break;
            //  case 'vehicules': require_once ("./view/vehicules.view.php");
            //  break; 
        case 'vehicules':
            if (empty($urlvehicule[1])) {
                $vehiculeController->displayVehicules();
            } 
            
            elseif ($url[1]==="add") {
                $vehiculeController->newVehiculeForm();
            
        }
        elseif ($url[1]==="vvalid") {
            $vehiculeController->newVehiculeValidation();
        
    }
       
            
            
            
            elseif (($urlvehicule[1] === "add")) {
                echo "Créer un véhicule";
            } elseif (($urlvehicule[1] === "edit")) {
                // echo "Modifier un véhicule";
                $vehiculeController->editVehiculeForm($urlvehicule);
            } elseif (($urlvehicule[1] === "delete")) {
                echo "Supprimer un véhicule ";
            }
            break;
            //  case 'prout': echo "Daouda";
            //  break; 
    }

    //partie routage pour utilisateurs 

}



//  define("URL" , str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http") . 
// "://".$_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ));

// echo URL;