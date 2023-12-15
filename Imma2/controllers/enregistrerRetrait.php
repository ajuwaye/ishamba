<?php 
include '../configuration/config.php';
include '../models/Retrait.php';


$nom = $_POST['nom'];
$montant = $_POST['montant'];
$dateRetrait = $_POST['dateRetrait'];

$retrait = new Retrait ($nom, $montant,$dateRetrait);
if ($retrait -> enregistrerRetrait() ){
    header("Location:../views/EnregistrerRetrait.php");
}

?>