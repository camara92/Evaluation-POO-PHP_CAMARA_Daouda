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


        public function newAssociationDB($title, $nbplayers){
            $req = "INSERT INTO associations (title, nbplayers) VALUES  (:title, :nbplayers)";
            $stat = $this->getBdd()->prepare($req);
            $stat->bindValue(":title", $title, PDO::PARAM_STR);
            $stat->bindValue(":nbplayers", $nbplayers, PDO::PARAM_INT);
            $result= $stat->execute(); 
            $stat->closeCursor(); 

            if($result){
                $association= new Association($this->getBdd()->lastInsertId(), $title, $nbplayers); 
                $this->addAssociation($association); 

            }
        }
    
            //edit function 

            public function getAssociationById($id_association){
                foreach($this->vehicule as $vehicule){
                    if($vehicule->getId_association()==$id_association){
                        return $vehicule; 
                    }
                }
            }
    
    }


/**
 * Gestion de l’entité
association et des associations
dans notre app
 */
