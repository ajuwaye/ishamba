<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>depot </title>
    <?php include_once "../includes/include1.php"?>
    <?php include_once "../includes/include2.php"?>
    <?php include_once "../configuration/config.php" ?>
</head>
<body>
<?php include_once "../controllers/getListePaiement.php" ?>  
<div class="text-center"><h5>EFFECTUER LE DEPOT</h5><hr></div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="../controllers/enregistrerDepot.php" method="POST">
                <section class="row" style="margin: 15px;">
                <div class="col-sm-6">
                <div>
                <label class="from-label">nom</label>
                <input name="nom" type="text" class="form-control" required>
                </div>                              
                <br>
                <div>
                <label class="from-label">montant</label>
                <input name="montant" type="number" class="form-control" required>
                </div>
                <br>
                <div>
                <label for=""> dateDepot</label>
                <input name="dateDepot" type="Date" class="form-control" required>
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
        <h3 class="text-center">LES Depots</h3>
        <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                    <tr>
                        <th>nom</th>
                        <th>montant</th>
                        <th>dateDepot</th>
                    </tr>
                    </thead>
                <tbody>

                <?php
                    $depots = getListePaiements();
                    for($i =0;$i <count($depots); $i++){
                        $nom = $depots[$i]->getNom();
                        $montant=$depots[$i]->getMontant();
                        $dateDepot=$depots[$i]->getDateDepot();
                        echo <<<_END
                            <tr>
                            <td>$nom</td>
                            <td>$montant</td>
                            <td>$dateDepot</td>
                            </tr>
                        _END;
                    }
                    
                ?>

                <tbody>
                <div>
    <a href="./EnregistrerRetrait.php">suivant</a>
    </div>

</body>
</html>