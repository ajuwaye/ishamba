<?php 
include '../configuration/config.php';
include '../models/Depot.php';


$nom = $_POST['nom'];
$montant = $_POST['montant'];
$dateDepot = $_POST['dateDepot'];

$depot = new Depot ($nom, $montant,$dateDepot);
if ($depot -> enregistrerDepot() ){
    header("Location:../views/EnregistrerDepot.php");
}

?>