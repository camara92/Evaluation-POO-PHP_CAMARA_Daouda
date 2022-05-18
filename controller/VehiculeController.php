<?php

require_once "modele/VehiculeManager.php";
class VehiculeController {
    private $vehiculeManager;


    public function __construct(){
        $this->vehiculeManager = new VehiculeManager();
        $this->vehiculeManager->loadVehicule();        
    }

    public function displayVehicules(){
        $vehicules = $this->vehiculeManager->getVehicule();
        require_once "View/vehicules.view.php";
    }

    public function newVehiculeForm(){
        require_once "view/new.vehicule.view.php";
    }
    public function newVehiculeValidation(){
        // require_once "view/new.game.view.php";
       // echo 'Daouda'; 
        //var_dump($_POST);
        $this->vehiculeManager->newVehiculeDB($_POST['marque'], $_POST['modele'], $_POST['couleur'], $_POST['immatriculation']); 
        header('Location :'. URL ."vehicules");
    }

    public function editVehiculeForm($id_vehicule){
        $vehicule = $this->vehiculeManager->getVehiculeById($id_vehicule);
        require_once "view/edit.vehicule.view.php"; 

    }
public function deleteVehicule($id_vehicule){
    $this->vehiculeManager->deleteVehiculeBD($id_vehicule);
    header("Location :".URL ."vehicules");
}
// public function deleteVehiculeBD($id_vehicule){
//     $req="DELETE from vehicule where id_vehicule = :id_vehicule";
//     $statut = $this->getBdd()->prepare($req); 
//     $statut->bindValue(":id_vehicule", $id_vehicule, PDO::PARAM_INT);
//     $result = $statut->execute(); 
//     $statut->closeCursor(); 
//     if($result){
//         $vehicule= $this->getVehiculeById($id_vehicule);
//         unset($vehicule); 
//     }
// }

}

