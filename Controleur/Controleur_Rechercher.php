<?php
require('../Modele/Events.php');
    $type=$_POST["type"];
    $motCles=$_POST["tags"];
    if(empty($type)){
        echo"tous les champs ne sont pas remplis";
    }
    else{
        rechercheEvents($type, $motCles);
        header("Location: ../eventcoming.php");
    }
?>