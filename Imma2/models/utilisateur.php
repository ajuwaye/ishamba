<?php 
Class Utilisateur{
    private $idUtil;
    private $pass_word;
    private $typeCompte;
    private $dateAjout;
    private $dateModif;
    private $statutCompte;

    public function __construct($idUtil, $pass_word, $typeCompte, $dateAjout, $dateModif, $statutCompte)
    {  
        $this->idUtil = $idUtil;
        $this->pass_word = $pass_word;
        $this->typeCompte = $typeCompte;
        $this->dateAjout = $dateAjout;
        $this->dateModif= $dateModif;
        $this->statutCompte = $statutCompte;

    }

    public function enregistrerUtilisateur() 
    {
        global $db;
        $result = false;

        $idUtil = $this->idUtil;
        $pass_word= $this->pass_word;
        $typeCompte= $this->typeCompte;
        $dateAjout= $this->dateAjout;
        $dateModif= $this->dateModif;
        $statutCompte= $this->statutCompte;

        $requete = "INSERT INTO utilisateur ( idUtil,pass_word,typeCompte,dateAjout,dateModif,statutCompte) VALUES (:idUtil,:pass_word,:typeCompte,:dateAjout,:dateModif,:statutCompte)";
        
        $statement = $db->prepare($requete);

        $execution = $statement->execute([
                ':idUtil' =>$idUtil,
                ':pass_word' =>$pass_word,
                ':typeCompte' =>$typeCompte,
                ':dateAjout' =>$dateAjout,
                ':dateModif' =>$dateModif,
                ':statutCompte' =>$statutCompte
            ]);
        if ($execution) {
            $result = true;
        }
        return $result;
    }

// public function getIdUtilisateur(){
//     global $db;
//     $requete ="SELECT pass_word FROM utilisateur WHERE  pass_word =:pass_word";
//     $state =$db->prepare($requete);
//     $execution =$state->execute(
//         [
//             'idUtil'=>$this->getIdUtil(),
//             'pass_word'=>$this->getPass_word(),
//             'typeCompte'=>$this->getTypeCompte(),
//             'dateAjout'=>$this->getDateAjout(),
//             'dateModif'=>$this->getDateModif(),
//             'statutCompte'=>$this->getStatutCompte(),
//         ]
//         );

//     if ($execution){
//         if ($data =$state->fetch()){
//             $idUtil = $data['idUtil'];
//             return $idUtil;
//         }else return null;
//     }else return null;
//   }
  static function getUtilisateurs(){
    global $db;
    $requete ='SELECT*FROM utilisateur WHERE 1';
    $statement = $db->prepare($requete);
    $execution = $statement->execute([]);
    $utilisateurs = [];
  if ($execution){
      while ($data = $statement -> fetch()){
          $utilisateur = new Utilisateur
          ($data['idUtil'],$data['pass_word'],$data['typeCompte'],$data['dateAjout'],$data['dateModif'],$data['statutCompte']);
          
          array_push($utilisateurs,$utilisateur);
        }
        return $utilisateurs;
    }
    else return [];
}
  public function getIdUtil()
    {
        return $this->idUtil;
    }
    
    public function setIdUtil($idUtil)
    {
        $this->$idUtil = $idUtil;

        return $this;
}
public function getPass_word()
    {
        return $this->pass_word;
    }
    
    public function setPass_word($pass_word)
    {
        $this->pass_word = $pass_word;

        return $this;
}

public function getTypeCompte()
    {
        return $this->typeCompte;
    }
    
    public function setTypeCompte($typeCompte)
    {
        $this->typeCompte = $typeCompte;

        return $this;
}
public function getDateAjout()
    {
        return $this->dateAjout;
    }
    
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;

        return $this;
}

public function getDateModif()
    {
        return $this->dateModif;
    }
    
    public function setDateModif($dateModif)
    {
        $this->dateModif = $dateModif;

        return $this;
}
public function getStatutCompte()
    {
        return $this->statutCompte;
    }
    
    public function setStatutCompte($statutCompte)
    {
        $this->statutCompte = $statutCompte;

        return $this;
}
}
?>