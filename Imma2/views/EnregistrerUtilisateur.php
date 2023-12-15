<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement d'un Utilisateur</title>
    <?php include_once "../includes/include1.php"?>
    <?php include_once "../includes/include2.php"?>
    <?php include_once "../configuration/config.php" ?>
</head>
<body>
<?php include_once "../controllers/getListeUtilisateur.php" ?>  
<div class="text-center"><h5>ENREGISTRER UN UTILISATEUR</h5><hr></div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="../controllers/enregistrerUtilisateur.php" method="POST">
                <section class="row" style="margin: 15px;">
                <div class="col-sm-6">
                <div>
                <label class="from-label">idUtil</label>
                <input name="idUtil" type="number" class="form-control" required>
                </div>               
                <br>
                <div>
                <label class="from-label"> password</label>
                <input name="pass_word" type="text" class="form-control" required>
                </div>
                <br>
                <div>
                <label class="from-label"> type</label>
                <input name="typeCompte" type="text" class="form-control" required>
                </div>               
                <br>
                <div>
                <label for=""> dateAjout</label>
                <input name="dateAjout" type="Date" class="form-control" required>
                </div>
                <br>
                <div>
                <label for=""> dateModif</label>
                <input name="dateModif" type="Date" class="form-control" required>
                </div>               
                <br>
                <div>
                <label class="from-label"> statutCompte</label>
                <input name="statutCompte" type="text" class="form-control" required>
                </div>
                <br>
                <div>
                <button type="submit" value="Envoyer" class="btn btn-block" style="background-color:rgb(8, 134, 238) ">Enregistrer </button>
                </div>     
            </div>
            </form>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                        </div>
                        <div class="col-4"></div>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
            <div class="mx-2">
        <h2 class="text-center">LES UTILISATEURS</h2>
        <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                    <tr>
                        <th>idUtil</th>
                        <th>password</th>
                        <th>type</th>
                        <th>dateAjout</th>
                        <th>dateModif</th>
                        <th>statutCompte</th>    
                    </tr>
                    </thead>
                <tbody>

                <?php
                    $utilisateurs = getListeUtilisateurs();
                    for($i =0;$i <count($utilisateurs); $i++){
                        $idUtil = $utilisateurs[$i]->getIdUtil();
                        $pass_word = $utilisateurs[$i]->getPass_word();
                        $typeCompte = $utilisateurs[$i]->getTypeCompte();
                        $dateAjout=$utilisateurs[$i]->getDateAjout();
                        $dateModif=$utilisateurs[$i]->getDateModif();
                        $statutCompte=$utilisateurs[$i]->getStatutCompte();
                        echo <<<_END
                            <tr>
                            <td>$idUtil</td>
                            <td>$pass_word</td>
                            <td>$typeCompte</td>
                            <td>$dateAjout</td>
                            <td>$dateModif</td>
                            <td>$statutCompte</td>
                            </tr>
                        _END;
                     }
                    ?>

                <tbody>
    <div>
    <a href="./CreerCompte.php">suivant</a>
    </div>

</body>
</html>