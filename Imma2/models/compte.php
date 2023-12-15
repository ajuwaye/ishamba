<?php 
class Compte{
    

    private $numCompte;
    private $soldeCompe;
    private $devise;
    private $nomBanque;
    private $dateDepot;
    private $dateRetrait;

    public function __construct($numCompte,$soldeCompe,$devise,$nomBanque,$dateDepot,$dateRetrait)
    {  
        
        $this->numCompte = $numCompte;
        $this->soldeCompe = $soldeCompe;
        $this->devise = $devise;
        $this->nomBanque = $nomBanque;
        $this->dateDepot = $dateDepot;
        $this->dateRetrait = $dateRetrait;

    }
    public function creerCompte() 
    {
        global $db;
        $result = false;

        $numCompte = $this->numCompte;
        $soldeCompe = $this->soldeCompe;
        $devise = $this->devise;
        $nomBanque = $this->nomBanque;
        $dateDepot = $this->dateDepot;
        $dateRetrait = $this->dateRetrait;

        $requete = "INSERT INTO Compte (
        numCompte, soldeCompe, devise, nomBanque,dateDepot, dateRetrait) VALUES (
        :numCompte, :soldeCompe, :devise,:nomBanque, :dateDepot, :dateRetrait)";

        $statment = $db->prepare($requete);

        $execution = $statment->execute(
            [
                ':numCompte' =>$numCompte,
                ':soldeCompe' =>$soldeCompe,
                ':devise' =>$devise,
                ':nomBanque' =>$nomBanque,
                'dateDepot' =>$dateDepot,
                ':dateRetrait' =>$dateRetrait
            ]);

        if ($execution) {
            $result = true;
        }
        return $result;
    }

    static function getComptes(){
        global $db;
        $requete = 'SELECT * FROM Compte WHERE 1';
        $statment = $db->prepare($requete);
        $execution = $statment->execute([]);
        $comptes = [];
        if ($execution){
            while ($data = $statment -> fetch()){
                $compte = new Compte 
                ($data['numCompte'],$data['soldeCompe'],$data['devise'],$data['nomBanque'],$data['dateDepot'],$data['dateRetrait']);
                array_push($comptes,$compte);
            }
            return $comptes;
        }
        else return [];
    }
    public function getNumero(){
        global $db;
        $requete ='SELECT numero FROM compte WHERE numCompte =:numCompte ';
        $statment = $db->prepare($requete);
        $execution = $statment->execute(
            [
                
                ':numCompte'=>$this -> getNumCompte()
            ]
            );
            if ($execution){
                if ($data =$statment->fetch()){
                    $numCompte= $data['numCompte'];
                    return $numCompte;
                }else return null;
            }else return null;

    }

    public function getNumCompte()
    {
        return $this->numCompte;
    }
    
    public function setNumCompte($numCompte)
    {
        $this->numCompte = $numCompte;

        return $this;
    }
    public function getSoldeCompe()
    {
        return $this->soldeCompe;
    }
    
    public function setSoldeCompe($soldeCompe)
    {
        $this->soldeCompe = $soldeCompe;

        return $this;
    }

    public function getDevise()
    {
        return $this->devise;
    }
    
    public function setDevise($devise)
    {
        $this->devise = $devise;

        return $this;
    }
    public function getNomBanque()
    {
        return $this->nomBanque;
    }
    
    public function setNomBanque($nomBanque)
    {
        $this->nomBanque = $nomBanque;

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