<?php 
include '../configuration/config.php';
include '../models/Utilisateur.php';


$idUtil = $_POST['idUtil'];
$pass_word = $_POST['pass_word'];
$typeCompte = $_POST['typeCompte'];
$dateAjout = $_POST['dateAjout'];
$dateModif = $_POST['dateModif'];
$statutCompte = $_POST['statutCompte'];

$utilisateur = new Utilisateur ($idUtil,$pass_word, $typeCompte, $dateAjout,$dateModif, $statutCompte);
if ($utilisateur -> enregistrerUtilisateur()){
    header("Location:../views/enregistrerUtilisateur.php");
}

?>