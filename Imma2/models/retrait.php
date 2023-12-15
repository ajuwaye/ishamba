<?php 
Class Retrait{
    private $nom;
    private $montant;
    private $dateRetrait;

    public function __construct($nom,$montant,$dateRetrait)
    {  
        $this->nom = $nom;
        $this->montant = $montant;
        $this->dateRetrait= $dateRetrait;

    }

    public function enregistrerRetrait() 
    {
        global $db;
        $result = false;

        $nom = $this->nom;
        $montant= $this->montant;
        $dateRetrait= $this->dateRetrait;

        $requete = "INSERT INTO retrait 
        ( nom,montant,dateRetrait) VALUES 
         (:nom,:montant,:dateRetrait)";

$statment = $db->prepare($requete);

$execution = $statment->execute(
    [
        ':nom' =>$nom,
        ':montant' =>$montant,
        ':dateRetrait' =>$dateRetrait
        
    ]);
    if ($execution) {
        $result = true;
     }
 return $result;
}

static function getPaiements(){
  global $db;
  $requete = 'SELECT * FROM Retrait WHERE 1';
  $statment = $db->prepare($requete);
  $execution = $statment->execute([]);
  $retraits = [];
  if ($execution){
      while ($data = $statment -> fetch()){
          $retrait = new Retrait 
          ($data['nom'],$data['montant'],$data['dateRetrait']);

          array_push($retraits,$retrait);
        }
        return $retraits;
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


public function getDateRetrait()
    {
        return $this->dateRetrait;
    }
    
    public function setDateRetrait($dateRetrait)
    {
        $this->dateRetrait = $dateRetrait;

        return $this;
}

}
?>