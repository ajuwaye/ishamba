<?php 
Class Depot{
    private $nom;
    private $montant;
    private $dateDepot;

    public function __construct($nom,$montant,$dateDepot)
    {  
        $this->nom = $nom;
        $this->montant = $montant;
        $this->dateDepot= $dateDepot;

    }

    public function enregistrerDepot() 
    {
        global $db;
        $result = false;

        $nom = $this->nom;
        $montant= $this->montant;
        $dateDepot= $this->dateDepot;

        $requete = "INSERT INTO depot 
        ( nom,montant,dateDepot) VALUES 
         (:nom,:montant,:dateDepot)";

$statment = $db->prepare($requete);

$execution = $statment->execute(
    [
        ':nom' =>$nom,
        ':montant' =>$montant,
        ':dateDepot' =>$dateDepot
        
    ]);
    if ($execution) {
        $result = true;
     }
 return $result;
}

static function getPaiements(){
  global $db;
  $requete = 'SELECT * FROM Depot WHERE 1';
  $statment = $db->prepare($requete);
  $execution = $statment->execute([]);
  $depots = [];
  if ($execution){
      while ($data = $statment -> fetch()){
          $depot = new Depot 
          ($data['nom'],$data['montant'],$data['dateDepot']);

          array_push($depots,$depot);
        }
        return $depots;
    }
    else return [];
}
// public function get(){
//     global $db;
//     $requete ='SELECT  idCont FROM contribuable WHERE nom =:nom AND email =:email';
//     $statment =$db->prepare($requete);
//     $execution =$statment->execute(
//         [
            
//             //':num'=>$this -> getNom(),
//             ':email'=>$this -> getEmail()
//         ]
//     );
//     if ($execution){
//         if ($data =$statment->fetch()){
//             $idCont = $data['idCont'];
//             return $idCont;
//         }else return null;
//     }else return null;
//   }

  
public function getNom()
    {
        return $this->nom;
    }
    
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
}

public function getMontant()
    {
        return $this->montant;
    }
    
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
}


public function getDateDepot()
    {
        return $this->dateDepot;
    }
    
    public function setDateDepot($dateDepot)
    {
        $this->dateDepot = $dateDepot;

        return $this;
}

}
?>