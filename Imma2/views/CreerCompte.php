<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>creation d'un compte </title>
    <?php include_once "../includes/include1.php"?>
    <?php include_once "../includes/include2.php"?>
    <?php include_once "../configuration/config.php"?>
</head>
<body>
<?php include_once "../controllers/getListeCompte.php" ?>  
<div class="text-center"><h5>CREER UN COMPTEBANCAIRE</h5><hr></div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="../controllers/creerCompte.php" method="POST">
                <section class="row" style="margin: 15px;">
                <div class="col-sm-6">
                <div>
                <label class="from-label">num</label>
                <input name="numCompte" type="number" class="form-control" required>
                </div>                              
                <br>
                <div>
                <label class="from-label">solde</label>
                <input name="soldeCompe" type="text" class="form-control" required>
                </div>
                <br>
                <div>
                <label class="from-label">devise</label>
                <input name="devise" type="text" class="form-control" required>
                </div>
                <br>
                <div>
                <label class="from-label"> nomBanque</label>
                <input name="nomBanque" type="text" class="form-control" required>
                </div>
                <br>
                <div>
                <label class="from-label"> dateDepot</label>
                <input name="dateDepot" type="Date" class="form-control" required>
                </div>
                <br>
                <div>
                <label for=""> dateRetrait</label>
                <input name="dateRetrait" type="Date" class="form-control" required>
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
        <h2 class="text-center">LES COMPTES</h2>
        <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                    <tr>
                        <th>num</th>
                        <th>solde</th>
                        <th>devise</th>
                        <th>nombanque</th>
                        <th>dateDepot</th>
                        <th>dateRetrait</th>   
                    </tr>
                    </thead>
                <tbody>

                <?php
                    $comptes = getListeComptes();
                    for($i =0;$i <count($comptes); $i++){
                        $numCompte = $comptes[$i]->getNumCompte();
                        $soldeCompe = $comptes[$i]->getSoldecompe();
                        $devise=$comptes[$i]->getDevise();
                        $nomBanque = $comptes[$i]->getNomBanque();
                        $dateDepot=$comptes[$i]->getDateDepot();
                        $dateRetrait=$comptes[$i]->getDateRetrait();
                        echo <<<_END
                            <tr>
                            <td>$numCompte</td>
                            <td>$soldeCompe</td>
                            <td>$devise</td>
                            <td>$nomBanque</td>
                            <td>$dateDepot</td>
                            <td>$dateRetrait</td>
                            </tr>
                        _END;
                     }
                    ?>

    <div>
    <a href="./EnregistrerDepot.php">suivant</a>
    </div>
        <tbody>

</body>
</html>