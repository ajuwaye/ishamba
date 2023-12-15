<?php

include'../models/Depot.php';

function getListePaiements(){
    return Depot :: getPaiements();
}

?>