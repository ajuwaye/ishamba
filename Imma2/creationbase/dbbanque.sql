CREATE TABLE IF NOT EXISTS compte(
    numCompte INT  NOT NULL ,
    soldeCompe INT NOT NULL,
    devise VARCHAR (50) NOT NULL, 
    nomBanque VARCHAR (60) NOT NULL,
    dateDepot DATE NOT NULL,
    dateRetrait DATE NOT NULL,
    PRIMARY KEY (numCompte)
);
CREATE TABLE IF NOT EXISTS depot(
   nom VARCHAR (60) NOT NULL, 
   montant  INT NOT NULL, 
   dateDepot DATE NOT NULL
);
CREATE TABLE IF NOT EXISTS retrait(
    nom VARCHAR (60) NOT NULL, 
    montant INT NOT NULL, 
    dateRetrait DATE NOT NULL
);
CREATE TABLE IF NOT EXISTS utilisateur(
    idUtil   INT  NOT NULL AUTO_INCREMENT,
    pass_word VARCHAR (60) NOT NULL,
    typeCompte VARCHAR (60) NOT NULL, 
    dateAjout DATE NOT NULL,
    dateModif DATE NOT NULL,
    statutCompte VARCHAR (60) NOT NULL,
    PRIMARY KEY (idUtil)
);
