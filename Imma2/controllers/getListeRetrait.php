<?php

include'../models/Retrait.php';

function getListePaiements(){
    return Retrait :: getPaiements();
}

?>