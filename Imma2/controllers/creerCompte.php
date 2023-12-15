<?php 
include '../configuration/config.php';
include '../models/compte.php';


$numCompte = $_POST['numCompte'];
$soldeCompe = $_POST['soldeCompe'];
$devise = $_POST['devise'];
$nomBanque = $_POST['nomBanque'];
$dateDepot = $_POST['dateDepot'];
$dateRetrait = $_POST['dateRetrait'];

$compte = new Compte ($numCompte,$soldeCompe, $devise, $nomBanque,$dateDepot, $dateRetrait);
if ($compte -> creerCompte()){
    header("Location:../views/creerCompte.php");
}

?>