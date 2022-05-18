<?php
     require_once "Manager.php";
     require_once "Conducteur.php";
     class ConducteurManager extends Manager {

        private $conducteurs;
    
        public function addConducteur($conducteur){
            $this->conducteurs[] = $conducteur;
        }
    
        public function getConducteurs(){
            return $this->conducteurs;
        }
    
        public function loadConducteurs(){
            $req = $this->getBdd()->prepare("SELECT * FROM conducteur");
            $req->execute();
            $myConducteurs = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor(); 

            foreach($myConducteurs as $conducteur){

                $g= new Conducteur($conducteur['id_conducteur'], $conducteur["prenom"], $conducteur['nom']); 
                $this->addConducteur($g); 
            }
    
           // var_dump($myConducteurs);
           
    
        }


        public function newConducteurDB($prenom, $nom){
            $req = "INSERT INTO conducteur (prenom, nom) VALUES  (:prenom, :nom)";
            $stat = $this->getBdd()->prepare($req);
            $stat->bindValue(":prenom", $prenom, PDO::PARAM_STR);
            $stat->bindValue(":nom", $nom, PDO::PARAM_STR);
            $result= $stat->execute(); 
            $stat->closeCursor(); 

            if($result){
                $conducteur= new Conducteur($this->getBdd()->lastInsertId(), $prenom, $nom); 
                $this->addConducteur($conducteur); 

            }
        }
    
           //delete function 

    public function deleteConducteurBD($id_conducteur)
    {
        $req = "DELETE from conducteur where id_conducteur = :id_conducteur";
        $statut = $this->getBdd()->prepare($req);
        $statut->bindValue(":id_conducteur", $id_conducteur, PDO::PARAM_INT);
        $result = $statut->execute();
        $statut->closeCursor();
        if ($result) {
            $conducteur = $this->getconducteurById($id_conducteur);
            unset($conducteur);
        }
    }



         //edit function 

         public function getConducteurById($id_conducteur){
            foreach($this->conducteur as $conducteur){
                if($conducteur->getId_conducteur()==$id_conducteur){
                    return $conducteur; 
                }
            }
        }
    
    }


/**
 * Gestion de l’entité
conducteur et des conducteurs
dans notre app
 */
