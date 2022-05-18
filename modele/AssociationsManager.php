<?php
     require_once "Manager.php";
     require_once "Associations.php";
     class AssociationManager extends Manager {

        private $associations;
    
        public function addAssociation($association){
            $this->associations[] = $association;
        }
    
        public function getAssociations(){
            return $this->associations;
        }
    
        public function loadAssociations(){
            $req = $this->getBdd()->prepare("SELECT * FROM association_vehicule_conducteur");
            $req->execute();
            $myAssociations = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor(); 

            foreach($myAssociations as $association){

                $g= new Association($association['id_association'], $association["id_vehicule"], $association['id_association']); 
                $this->addAssociation($g); 
            }
    
           // var_dump($myAssociations);
           
    
        }


        public function newAssociationDB($id_vehicule, $id_conducteur){
            $req = "INSERT INTO association_vehicule_conducteur (id_vehicule, id_conducteur) VALUES  (:id_vehicule, :id_conducteur)";
            $stat = $this->getBdd()->prepare($req);
            $stat->bindValue(":id_vehicule", $id_vehicule, PDO::PARAM_INT);
            $stat->bindValue(":id_conducteur", $id_conducteur, PDO::PARAM_INT);
            $result= $stat->execute(); 
            $stat->closeCursor(); 

            if($result){
                $association= new Association($this->getBdd()->lastInsertId(), $id_vehicule, $id_conducteur); 
                $this->addAssociation($association); 

            }
        }
    
            //edit function 

            public function getAssociationById($id_association){
                foreach($this->associations as $association){
                    if($association->getId_association()==$id_association){
                        return $association; 
                    }
                }
            }
    
    }


/**
 * Gestion de l’entité
association et des associations
dans notre app
 */
