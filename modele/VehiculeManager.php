<?php
     require_once "Manager.php";
     require_once "Vehicule.php";
     class VehiculeManager extends Manager {

        private $vehicule;
    
        public function addVehicule($vehicule){
            $this->vehicule[] = $vehicule;
        }
    
        public function getVehicule(){
            return $this->vehicule;
        }
    
        public function loadVehicule(){
            $req = $this->getBdd()->prepare("SELECT * FROM vehicule");
            $req->execute();
            $vehicules = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor(); 

            foreach($vehicules as $vehicule){

                $u= new Vehicule($vehicule['id_vehicule'], $vehicule['marque'], $vehicule['modele'],$vehicule['couleur'], $vehicule['immatriculation']); 
                $this->addVehicule($u); 
            }
    
           // var_dump($myVehicules);
    
        }

        //insertion dans base de données 
        public function newVehiculeDB($marque, $modele, $couleur, $immatriculation){
            $req = "INSERT INTO vehicule (marque, modele, couleur, immatriculation) VALUES  (:marque, :modele, :couleur, :immatriculation)";
            $stat = $this->getBdd()->prepare($req);
            $stat->bindValue(":marque", $marque, PDO::PARAM_STR);
            $stat->bindValue(":modele", $modele, PDO::PARAM_STR);
            $stat->bindValue(":couleur", $couleur, PDO::PARAM_STR);
            $stat->bindValue(":immatriculation", $immatriculation, PDO::PARAM_STR);
            $result= $stat->execute(); 
            $stat->closeCursor(); 

            if($result){
                $Vehicule= new Vehicule($this->getBdd()->lastInsertId(), $marque, $modele, $couleur, $immatriculation); 
                $this->addVehicule($Vehicule); 

            }
        }

        //edit function 

        public function getVehiculeById($id_vehicule){
            foreach($this->vehicule as $vehicule){
                if($vehicule->getId_vehicule()==$id_vehicule){
                    return $vehicule; 
                }
            }
        }

        public function editVehiculeDB($id_vehicule, $marque, $modele, $couleur, $immatriculation){
            $req= "UPDATE vehicule SET marque =:marque, modele = :modele, couleur =:couleur, immatriculation =:immatriculation where id_vehicule =:id_vehicule";
            $status =$this->getBdd()->prepare($req);
            $status->bindValue(":id_vehicule", $id_vehicule, PDO::PARAM_INT);
            $status->bindValue(":marque", $marque, PDO::PARAM_STR);
            $status->bindValue(":modele", $modele, PDO::PARAM_STR);
            $status->bindValue(":couleur", $couleur, PDO::PARAM_STR);
            $status->bindValue(":immatriculation", $immatriculation, PDO::PARAM_STR);

            $result= $status->execute();
            $status->closeCursor();
            if($result){
               $this->getVehiculeById($id_vehicule)->setId_vehicule($id_vehicule);
                $this->getVehiculeById($id_vehicule)->setMarque($marque);
                $this->getVehiculeById($id_vehicule)->setModele($modele);
                $this->getVehiculeById($id_vehicule)->setCouleur($couleur);
                $this->getVehiculeById($id_vehicule)->setImmatriculation($immatriculation);
            }
        }
        public function deleteVehiculeBD($id_vehicule){
            $req="DELETE from vehicule where id_vehicule = :id_vehicule";
            $statut = $this->getBdd()->prepare($req); 
            $statut->bindValue(":id_vehicule", $id_vehicule, PDO::PARAM_INT);
            $result = $statut->execute(); 
            $statut->closeCursor(); 
            if($result){
                $vehicule= $this->getVehiculeById($id_vehicule);
                unset($vehicule); 
            }
        }
    
    
    }